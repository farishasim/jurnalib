<script setup>

// defineProps({
//     handleSearch: {
//         type: Method,
//     },
// })

</script>

<template>
    <div class="flex items-center space-x-2">
        <input v-model="searchQuery" type="text" placeholder="Enter your search..." class="w-full py-2 px-4 border-2 border-grey-300 focus:border-cyan-600 focus:ring-0 rounded" />
        <button @click="handleSearch" class="py-2 px-4 bg-gradient-to-b from-blue-500 to-cyan-400 text-white rounded cursor-pointer motion-safe:hover:scale-[1.05]">Search</button>
    </div>
</template>

<script>
export default {
data() {
    return {
        searchQuery: "",
    };
},
methods: {
    handleSearch() {
    // Emit the searchQuery as an event
    this.$emit("search", this.searchQuery);
    },
},
};
</script>