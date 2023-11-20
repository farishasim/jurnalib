<script setup>
defineProps(['content'])
</script>

<template>
    <div class="flex mt-2 w-7/12 justify-center items-center aspect-square rounded-md">
        <p class="text-white text-xl font-extrabold">{{ content }}</p>
    </div>
</template>