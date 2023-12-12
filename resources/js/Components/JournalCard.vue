<script setup>
import Badge from '@/Components/Badge.vue';

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
    <div class="flex bg-white rounded-lg shadow-2xl shadow-gray-500/20">
        <div class="w-[90%]">
            <h2 class="mb-3 text-lg sm:text-xl font-medium">{{ title }}</h2>
            <p class="italic">{{ publisher }}</p>
            <p>{{ country }}</p>
        </div>
        <div class=" w-20 md:w-[15%] grid place-items-center">
            <!-- <h3>Scimago:</h3> -->
            <Badge v-if="scimago === 'Q1'" class="bg-gradient-to-br from-blue-500 to-red-400" :content="scimago" />
            <Badge v-else-if="scimago === 'Q2'" class="bg-gradient-to-br from-amber-500 to-yellow-300" :content="scimago" />
            <Badge v-else-if="scimago === 'Q3'" class="bg-gradient-to-br from-slate-500 to-slate-300" :content="scimago" />
            <Badge v-else-if="scimago === 'Q4'" class="bg-gradient-to-br from-yellow-900 to-amber-600" :content="scimago" />
            <Badge v-else class="bg-gradient-to-br from-black to-gray-500" :content="scimago" />
        </div>
        <div v-if="scopus" class="sm:w-1/6 grid place-items-center">
            <h3>Scopus:</h3>
            <Badge class="bg-gradient-to-br from-emerald-500 to-cyan-500" :content="scopus" />
        </div>
    </div>
</template>