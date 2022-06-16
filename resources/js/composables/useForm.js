import { ref } from "vue";
import { Toast } from "../alert/SweetAlert";
import axiosClient from '../api/useAxios'


export default function useForm() {
    const errors = ref([])
    const forms = ref([])
    let linkUrl = ''
    
    const submitForm = async (data) => {
        errors.value = ''

        try {
          const res = await axiosClient.post('/form', data)
          return res
        } catch (e) {
            if (e.response.status === 422) {
                Toast.fire({
                    icon: "error",
                    title: e.response.data.message,
                  });
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const getForms = async () => {
        errors.value = ''
        try {
           const response = await axiosClient.get('/forms')
           forms.value = response.data
        } catch (e) {
            console.log(e)
        }
    }

    const delCandidate = async (id) => {
        try {
            await axiosClient.delete(`/form/${id}`)
        }catch(e){
            console.log(e)
        }
    }

    const downloadDocument = async (path) => {
        try {
            const response = await axiosClient.post('/candidate', path, {responseType: 'blob'})
            const url = window.URL.createObjectURL(new Blob([response.data]))
            linkUrl = url
            return linkUrl

        }catch(e) {
            console.error(e)
        }
    }

    const downloadDocumentZip = async (path) => {
        try {
            const response = await axiosClient.post('/candidate/zip', path, {responseType: 'arraybuffer'})
            const url = window.URL.createObjectURL(new Blob([response.data]))
            linkUrl = url
            return linkUrl
        }catch(e) {
            console.error(e)
        }
    }

    return {
        submitForm,
        errors,
        getForms,
        forms,
        delCandidate,
        downloadDocument,
        linkUrl,
        downloadDocumentZip
    }
}