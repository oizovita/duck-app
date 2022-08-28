<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use App\Attributes\Route as RouteAttribute;
use ReflectionClass;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(app_path('Http/Controllers')));
            foreach ($rii as $file) {
                if ($file->isDir()) {
                    continue;
                }

                $class = str_replace(
                    '.php',
                    '',
                    str_replace(
                        '/',
                        '\\',
                        substr_replace($file->getPathname(), "App", 0, strpos($file->getPathname(), 'app') + 7)
                    )
                );

                $reflectionClass = new ReflectionClass($class);

                $classAttributes = collect($reflectionClass->getAttributes(RouteAttribute::class));

                if ($classAttributes->isNotEmpty()) {
                    $arguments = collect($classAttributes->first()->getArguments());

                    Route::match($arguments->get('method'), $arguments->get('path'), $class)
                        ->middleware($arguments->get('middleware', []));
                }

                foreach ($reflectionClass->getMethods() as $method) {
                    $methodAttributes = collect($method->getAttributes(RouteAttribute::class));

                    if ($methodAttributes->isEmpty()) {
                        continue;
                    }

                    $arguments = collect($methodAttributes->first()->getArguments());
                    $route = Route::match(
                        $arguments->get('method'),
                        $arguments->get('path'),
                        $class.'@'.$method->getName()
                    )
                        ->middleware($arguments->get('middleware', []));

                    if ($arguments->get('name')) {
                        $route->name($arguments->get('name'));
                    }
                }
            }
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
