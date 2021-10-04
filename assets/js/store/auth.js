import store from './index';
import HttpService from "@/services/httpService";

export default {
    namespaced: true,
    state:{
        token: null,
        user: null
    },
    getters:{

    },
    mutations:{

    },
    actions:{

        async register(_, form){
            store.commit('setLoading', true)
            return await HttpService.register(form)
                .then(()=>{
                    store.commit('setLoading', false)
                })
                .catch((e)=>{
                    store.commit('setLoading', false)
                    console.log(e)
                })
        },

    }
}