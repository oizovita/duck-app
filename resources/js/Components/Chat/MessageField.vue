<template>
    <div class="flex flex-col h-full overflow-x-auto mb-4">
        <div class="flex flex-col h-full">
            <div class="grid grid-cols-12 gap-y-2">
                <Message v-for="message in messages" :text='message'></Message>
            </div>
        </div>
    </div>
</template>

<script>
import Message from "@/Components/Chat/Message.vue";

export default {
    name: "MessageField",
    components:{
        Message
    },
    props: {
        messages: Array
    },
    data() {
        return {
            messages: [],
        }
    },
    created() {
        Echo.private('admin')
            .listen('MessageSend', (e) => {
                this.addMessage(e.message);
            });
    },
    methods: {
        addMessage(message) {
            let date = new Date();
            let timestamp = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
            this.messages.push(timestamp + ' ' + message);
        },
    }
}
</script>

<style scoped>

</style>
