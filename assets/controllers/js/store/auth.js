import store from './index';
import HttpService from '@/services/httpService';

export default {
    namespace: true,
    state:{
        user:null,
        token:null
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
                .cache(e=>{
                    store.commit('setLoading', false);
                    console.log(e);
                })
        }
    }
}