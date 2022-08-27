<template>
    <div class="flex flex-col py-8 pl-6 pr-2 w-64 bg-white flex-shrink-0">
        <div class="flex flex-row items-center justify-center h-12 w-full">
            <div
                class="flex items-center justify-center rounded-2xl text-indigo-700 bg-indigo-100 h-10 w-10"
            >
                <svg
                    class="w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                    ></path>
                </svg>
            </div>
            <div class="ml-2 font-bold text-2xl">Chat</div>
        </div>
        <div class="flex flex-col mt-8">
            <div class="flex flex-row items-center justify-between text-xs">
                <span class="font-bold">Rooms</span>
            </div>
            <div class="flex flex-col space-y-1 mt-4 -mx-2">
                <button @click="$emit('changeRoom')" v-for="room in rooms" :key="room.id"
                        class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2">
                    <div class="ml-2 text-sm font-semibold">{{ room.name }}}</div>
                </button>
            </div>
            <div class="flex flex-row items-center justify-between text-xs mt-6">
                <span class="font-bold">Users</span>
                <span class="flex items-center justify-center bg-gray-300 h-4 w-4 rounded-full">4</span>
            </div>
            <div class="flex flex-col space-y-1 mt-4 -mx-2 h-70 overflow-y-auto">
                <button v-for="user in users" :key="user.id"
                        class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2">
                    <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                        H
                    </div>
                    <div class="ml-2 text-sm font-semibold">{{ user }}}</div>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ChatSidebar",
    props: {
        rooms: Array,
        users: Array
    }
}
</script>

<style scoped>

</style>
