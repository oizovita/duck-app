<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
// import Pagination from "@/Components/Pagination";
Echo.channel('admin').listen('MessageSend', e => {
    console.log(e)
})

</script>

<template>
    <Head title="Users" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
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
