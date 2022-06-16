import { ref } from 'vue'
import axiosClient from '../api/useAxios'
import useUserStore from '../store'


export default function useAuth() {
    const store = useUserStore()
    const errors = ref([])
    
    const submitForm = async (data) => {
        errors.value = ''
        try {
            const response = await axiosClient.post('/login', data)
            store.user.data = response.data.user
            store.user.token = response.data.token
            store.storeToken()
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    } 

    const disconnect = async () => {
        try {
            await axiosClient.post('/logout')
            store.destroyToken()
        }catch (e){

        }
    }

    return {
        submitForm,
        errors,
        disconnect
    }
}