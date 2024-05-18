import axios from 'axios';
import { defineStore } from 'pinia';

export const useDealStagesStore = defineStore('deal_stages', {
    state: () => ({
        deal_stages: null
    }),
    getters: {
        getDealStages: state => state.deal_stages
    },
    actions: {
        async fetchDealStage(params) {
            try {
                const response = await axios.get(`/deal-stage/list`, {
                    params: params
                });
                console.log(response)
                this.deal_stages = response.data
            } catch (error) {

            }
        }
    }
});
