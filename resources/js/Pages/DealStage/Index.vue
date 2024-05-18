<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { watchDebounced } from '@vueuse/core';
import Pagination from '@/Components/Pagination.vue';
import LeadModalContent from '@/Components/LeadModalContent.vue'
import { ref, onMounted } from 'vue';
import { useDealStagesStore } from '@/Store/useDealStagesStore';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import _ from 'lodash';

const dealStagesStore = useDealStagesStore();
const search = ref('');
const page = ref(1);

const changePage = (val) => {
    page.value = val
    dealStagesStore.fetchDealStage({ page: val, search: search.value })
}

watchDebounced(search, () => {
    page.value = 1
    dealStagesStore.fetchDealStage({ page: 1, search: search.value })
}, { debounce: 500 })


onMounted(() => {
    dealStagesStore.fetchDealStage({ page: page.value, search: search.value })
});
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Leads</h2>
        </template>

        <div class="py-5">
            <div class="mx-auto sm:px-6 lg:px-8">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 pb-4 mx-auto">
                        <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                            <div class="md:flex">
                                <div class="w-full p-3">
                                    <div class="relative">
                                        <span class="absolute fa fa-search text-gray-400 top-4 left-4">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                        </span>
                                        <input v-model="search" type="text" class="bg-white h-14 w-full px-12 rounded-lg focus:outline-none hover:cursor-pointer focus:border-gray-800 focus:ring-gray-800">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                    <tr class="bg-gray-800">
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800 rounded-tl rounded-bl">
                                            #</th>
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">
                                            Deal ID</th>
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">
                                            Deal Name</th>
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">
                                            New Stage</th>
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800 rounded-tr rounded-br">
                                            Date Updated</th>
                                    </tr>
                                </thead>
                                <tbody v-if="dealStagesStore.getDealStages">
                                    <tr v-for="deal in dealStagesStore.getDealStages.data" :key="deal.id"
                                        class="cursor-pointer border-b-2 hover:bg-gray-400 hover:text-white">
                                        <td class="px-4 py-3">{{ deal.id }}</td>
                                        <td class="px-4 py-3">{{ deal.deal_id }}</td>
                                        <td class="px-4 py-3">{{ deal.deal_name }}</td>
                                        <td class="px-4 py-3">{{ deal.new_stage }}</td>
                                        <td class="px-4 py-3">{{ deal.date_updated }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-if="dealStagesStore.getDealStages" class="flex mt-4 w-full mx-auto">
                            <Pagination :pagination="dealStagesStore.getDealStages.meta" @change-page="changePage" />
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
