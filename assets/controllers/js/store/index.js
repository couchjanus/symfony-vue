//
import Vue from 'vue';
import Vuex from 'vuex';
import auth from './auth';

Vue.use(Vuex);

export default new Vuex.Store({
    state:{
        isLoading: false
    },
    mutations:{
        setLoading(state, newLoadingState){
            state.isLoading = newLoadingState;
        }
    },
    getters:{

    },
    actions:{

    },
    modules:{
        auth
    }

});
