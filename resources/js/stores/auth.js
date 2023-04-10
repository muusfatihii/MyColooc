import { defineStore } from "pinia";

export const useAuthStore = defineStore('auth',({

    state: ()=>({

        isAuthenticated: false,
        isadmin: false,
        iduser: '',
        name: '',
        solde: 0

    })

}))