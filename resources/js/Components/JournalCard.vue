<script setup>

defineProps({
    title: {
        type: String,
    },
    publisher: {
        type: String,
    },
    scimago: {
        type: String,
    },
    scopus: {
        type: String,
    },
    country: {
        type: String,
    },
    publisher: {
        type: String
    }
})

</script>

<template>
    <div class="mt-4 p-4 flex bg-white rounded-lg shadow-2xl shadow-gray-500/20">
        <div class="w-[90%]">
            <h2 class="mb-3 text-xl font-medium">{{ title }}</h2>
            <p class=" italic">{{ publisher }}</p>
            <p>{{ country }}</p>
        </div>
        <div class="w-1/6 grid place-items-center">
            <h3>Scimago:</h3>
            <div class="flex mt-2 w-7/12 justify-center items-center aspect-square rounded-md bg-gradient-to-br from-blue-500 to-cyan-400">
                <p class="text-white text-xl font-extrabold">{{ scimago }}</p>
            </div>
        </div>
        <div class="w-1/6 grid place-items-center">
            <h3>Scopus:</h3>
            <div class="flex mt-2 w-7/12 justify-center items-center aspect-square rounded-md bg-gradient-to-br from-blue-500 to-cyan-400">
                <p class="text-white text-xl font-extrabold">{{ scopus }}</p>
            </div>
        </div>
    </div>
</template>