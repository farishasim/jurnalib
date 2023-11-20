<template>
    <div class="flex items-center p-4 bg-white rounded-lg shadow-2xl shadow-gray-500/20 focus:outline-2 focus:outline-cyan-500 focus-within:shadow-sky-500/20">
        <div
            class="flex-shrink-0 w-10 h-10 bg-cyan-50 dark:bg-red-800/20 flex items-center justify-center rounded-full"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 23 23"
                stroke-width="1.5"
                class="w-6 h-6 fill-cyan-500"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M 10 0.1875 C 4.578125 0.1875 0.1875 4.578125 0.1875 10 C 0.1875 15.421875 4.578125 19.8125 10 19.8125 C 12.289063 19.8125 14.394531 19.003906 16.0625 17.6875 L 16.9375 18.5625 C 16.570313 19.253906 16.699219 20.136719 17.28125 20.71875 L 21.875 25.34375 C 22.589844 26.058594 23.753906 26.058594 24.46875 25.34375 L 25.34375 24.46875 C 26.058594 23.753906 26.058594 22.589844 25.34375 21.875 L 20.71875 17.28125 C 20.132813 16.695313 19.253906 16.59375 18.5625 16.96875 L 17.6875 16.09375 C 19.011719 14.421875 19.8125 12.300781 19.8125 10 C 19.8125 4.578125 15.421875 0.1875 10 0.1875 Z M 10 2 C 14.417969 2 18 5.582031 18 10 C 18 14.417969 14.417969 18 10 18 C 5.582031 18 2 14.417969 2 10 C 2 5.582031 5.582031 2 10 2 Z M 4.9375 7.46875 C 4.421875 8.304688 4.125 9.289063 4.125 10.34375 C 4.125 13.371094 6.566406 15.8125 9.59375 15.8125 C 10.761719 15.8125 11.859375 15.433594 12.75 14.8125 C 12.511719 14.839844 12.246094 14.84375 12 14.84375 C 8.085938 14.84375 4.9375 11.695313 4.9375 7.78125 C 4.9375 7.675781 4.933594 7.574219 4.9375 7.46875 Z"                            />
            </svg>
        </div>
        
        <div class="w-full">
            <div class="flex items-center space-x-2">
                <input 
                    v-model="searchQuery" 
                    @input="handleChange"
                    type="text" 
                    placeholder="Enter journal name..." 
                    class="w-full py-2 px-4 border-none focus:ring-0 rounded" />
                <!-- <button 
                    @click="handleSearch" 
                    class="py-2 px-4 bg-gradient-to-b from-blue-500 to-cyan-400 text-white rounded cursor-pointer motion-safe:hover:scale-[1.05]">Search</button> -->
            </div>
        </div>
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
        handleChange() {
            this.$emit("change", this.searchQuery);
        }
    },
};
</script>