import { defineStore } from "pinia";


const useUserStore = defineStore('main', {
    state: () => ({
        user: {
            data: {},
            token: null
        },
        showLoader: false
    }),
    actions: {
        storeToken(){
            return localStorage.setItem('user_token_key', JSON.stringify(this.user))
        },

        destroyToken(){
            if(localStorage.getItem('user_token_key')){
                return localStorage.removeItem('user_token_key')
            }
        },

        isLoggedIn(){
            if(localStorage.getItem('user_token_key')){
                const data = JSON.parse(localStorage.getItem('user_token_key')) 
                this.user.token = data.token
                this.user.data = data.data
                return true
            }
            return false
        }
    },
})

export default useUserStore