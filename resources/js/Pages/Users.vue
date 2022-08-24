<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head, Link} from '@inertiajs/inertia-vue3';
// import Pagination from "@/Components/Pagination";
Echo.channel('admin').listen('MessageSend', e => {
    console.log(e)
})

</script>

<template>
    <Head title="Users"/>

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <button
                    type="button"
                    data-mdb-ripple="true"
                    data-mdb-ripple-color="light"
                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"

                >
                    <Link :href="route('chat')">User Chat</Link>
                </button>
                <button type="button"
                        class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                    <Link :href="route('chat')">Admin Chat</Link>
                </button>
            </h2>
        </template>
        <div class="container mx-auto">
            <table class="table border w-full">
                <thead>
                <tr>
                    <th class="border p-3">ID</th>
                    <th class="border p-3">Name</th>
                    <th class="border p-3">Email</th>
                    <th class="border p-3">Roles</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in $page.props.users.data" :key="user.id">
                    <td class="border p-3">{{ user.id }}</td>
                    <td class="border p-3">{{ user.name }}</td>
                    <td class="border p-3">{{ user.email }}</td>
                    <td class="border p-3">
                        <span v-for="role in user.roles" :key="role.id">
                            {{ role.name }}
                        </span>
                    </td>
                </tr>
                </tbody>
            </table>

            <!--            <Pagination class="mt-6" :links="users.links" />-->
        </div>


    </BreezeAuthenticatedLayout>
</template>
