const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"users":{"uri":"users","methods":["GET","HEAD"]},"chat":{"uri":"chat","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"]},"password.update":{"uri":"reset-password","methods":["POST"]},"logout":{"uri":"logout","methods":["POST"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
