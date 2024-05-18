<script setup>
const emit = defineEmits(['change-page']);

defineProps({
    pagination: Object
})

const changePage = (value) => {
    emit('change-page', value)
}
</script>

<template>
    <div class="flex items-center w-full justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-between sm:hidden">
          <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
          <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
          <div>
            <p class="text-sm text-gray-700">
              Showing
              <span class="font-medium">{{ pagination.from }}</span>
              to
              <span class="font-medium">{{ pagination.to }}</span>
              of
              <span class="font-medium">{{ pagination.total }}</span>
              results
            </p>
          </div>
          <div>
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                <button @click="changePage(pagination.current_page - 1)" :disabled="pagination.current_page == 1" :class="`relative inline-flex items-center px-4 py-2 text-sm font-semibold ring-gray-300 hover:bg-gray-50 text-gray-900' ring-1 ring-inset  focus:z-20 focus:outline-offset-0`">
                    Prev
                </button>
                <template v-for="(link, index) in pagination.links" :key="link.label">
                    <button v-if="index != Object.keys(pagination.links).length - 1 && index != 0" @click="changePage(link.label)" :class="`relative inline-flex items-center px-4 py-2 text-sm font-semibold ${ !link.active ? 'ring-gray-300 hover:bg-gray-50 text-gray-900':'bg-gray-900 text-gray-50'} ring-1 ring-inset  focus:z-20 focus:outline-offset-0`">
                        {{ link.label }}
                    </button>
                </template>
                <button @click="changePage(pagination.current_page + 1)" :disabled="Object.keys(pagination.links).length - 1 == pagination.current_page + 1" :class="`relative inline-flex items-center px-4 py-2 text-sm font-semibold ring-gray-300 hover:bg-gray-50 text-gray-900' ring-1 ring-inset  focus:z-20 focus:outline-offset-0`">
                    Prev
                </button>
            </nav>
          </div>
        </div>
      </div>
</template>
