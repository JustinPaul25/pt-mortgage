<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import LeadModalContent from '@/Components/LeadModalContent.vue'
import Modal from '@/Components/Modal.vue';
import { ref } from 'vue';

const showDealModal = ref(false);
const singleDeal = ref();

const showModal = (deal) => {
    showDealModal.value = true;
    singleDeal.value = deal;
};

const closeModal = () => {
    showDealModal.value = false;
};

defineProps({
    deals: Object
})
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Leads</h2>
        </template>

        <Modal :show="showDealModal" @close="closeModal" :maxWidth="'deal-custom'">
            <LeadModalContent :deal="singleDeal"/>
        </Modal>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-4 mx-auto">
                      <div class="w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                          <thead>
                            <tr class="bg-gray-800">
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800 rounded-tl rounded-bl">#</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Deal ID</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Deal Owner</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800 rounded-tr rounded-br">Date Submitted</th>
                            </tr>
                          </thead>
                          <tbody v-if="deals.data.length">
                            <tr v-for="deal in deals.data" :key="deal.id" class="cursor-pointer border-b-2 hover:bg-gray-400 hover:text-white" @click="showModal(deal)">
                              <td class="px-4 py-3">{{ deal.id }}</td>
                              <td class="px-4 py-3">{{ deal.deal_id }}</td>
                              <td class="px-4 py-3">{{ deal.deal_owner }}</td>
                              <td class="px-4 py-3">{{ deal.date_submitted }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="flex mt-4 w-full mx-auto">
                        <Pagination :pagination="deals.meta"/>
                      </div>
                    </div>

                </section>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
