import { defineStore } from "pinia";

export const useAuthStore = defineStore('auth',({

    state: ()=>({

        isAuthenticated: false,

    }),
    getters:{
        valueisAuthenticated: (state) => state.isAuthenticated,
    }

}))