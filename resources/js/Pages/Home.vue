<script setup>
import { Head } from '@inertiajs/vue3';
import SearchBar from '@/Components/SearchBar.vue'
import JournalCard from '@/Components/JournalCard.vue';

defineProps({
    journalList: {
        type: Array,
    },
    query: {
        type: String,
        default: '',
    },
});
</script>

<template>
    <Head title="Welcome">
        <link rel="icon" href="favicon.png" type="image/x-icon">
    </Head>

    <div
        class="flex justify-center items-start min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-cyan-500 selection:text-white"
    >

        <div class="sm:w-3/4 w-full p-6 lg:p-8 my-6 lg:my-8 z-20">
            <div class="grid place-items-center text-center">
                <div class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-400">
                    <h1 class="font-serif text-4xl sm:text-5xl font-extrabold">J U R N A L I B</h1>
                    <p class="font-serif text-xl">Journal Ranking Library</p>
                </div>
            </div>

            <div class="mt-12 mb-6 sm:my-12">
                <SearchBar 
                    @search="text => {query = text; console.log(query)}" />
            </div>

            <div v-if="query !== '' && journalList !== null" class="grid grid-cols-1">
                <JournalCard class="mt-4 p-4"
                    v-for="journal in journalList.filter((e, i) => {
                        if (query.includes(' ')) {
                            return e[0].toLowerCase().includes(query.toLowerCase())
                        }
                        let words = e[0].toLowerCase().split(' ');
                        return words.find((word,i) => word.startsWith(query.toLowerCase())) != undefined
                    }).slice(0,100)"
                    :title="journal[0]"
                    :scimago="journal[1]"
                    :publisher="journal[2]"
                    :country="journal[3]"
                />
            </div>

        </div>

        <div class="fixed bottom-0 sm:left-0 p-6 text-end z-10">
            <div class="ms-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-end sm:ms-0">
                By Irfan & Faris
            </div>
        </div>

    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
