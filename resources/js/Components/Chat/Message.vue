<template>
    <div v-if="own" class="col-start-1 col-end-8 p-3 rounded-lg">
        <div class="flex flex-row items-center">
            <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                A
            </div>
            <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                <div>{{ text }}</div>
            </div>
        </div>
    </div>
    <div v-else class="col-start-6 col-end-13 p-3 rounded-lg">
        <div class="flex items-center justify-start flex-row-reverse">
            <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                A
            </div>
            <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                <div>{{ text }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Message",
    props: {
        user: Object,
        text: String,
        own: Boolean
    },
}
</script>

<style scoped>

</style>
