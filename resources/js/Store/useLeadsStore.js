import axios from 'axios';
import { defineStore } from 'pinia';

export const useLeadsStore = defineStore('leads', {
    state: () => ({
        leads: null
    }),
    getters: {
        getLeads: state => state.leads
    },
    actions: {
        async fetchLeads(params) {
            try {
                const response = await axios.get(`/leads/list`, {
                    params: params
                });
                console.log(response)
                this.leads = response.data
            } catch (error) {

            }
        }
    }
});
