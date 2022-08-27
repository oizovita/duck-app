<template>
    <div class="flex h-screen antialiased text-gray-800">
        <div class="flex flex-row h-full w-full overflow-x-hidden">
            <ChatSidebar :rooms="rooms" :users="users" @changeRoom="changeRoom"></ChatSidebar>
            <div class="flex flex-col flex-auto h-full p-6">
                <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4">
                    <MessageField></MessageField>
                    <Input></Input>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Room from "@/Components/Chat/Room.vue";
import ChatSidebar from "@/Components/Chat/Sidebar.vue";
import Input from "@/Components/Chat/Input.vue";
import MessageField from "@/Components/Chat/MessageField.vue";

export default {
    components: {
        MessageField,
        Input,
        ChatSidebar,
        Room
    },
    props:{
        user: Object,
        rooms: Array
    },
    methods: {
        changeRoom: function() {

        }
    }
}
</script>

<style scoped>

</style>
