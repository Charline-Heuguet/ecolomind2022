import { createStore } from 'vuex'

export default createStore({
  state: {
    userIsConnect : false, //par defaut, l'utilisateur n'est pas connecté (false)
  },
  getters: {
  },
  mutations: {
    setConnectionState(state, newState){
      state.userIsConnect = newState;
    }
  },
  actions: {

    onUserConnection(context){
      context.commit('setConnectionState', true);
    },

    onUserDisconnection(context){
      context.commit('setConnectionState', false);
    }
  },
  modules: {
  }
})
