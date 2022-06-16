<template>
  <div>
    <navbar-component></navbar-component>
    <main>
      <section class="absolute w-full h-full">
        <div
          class="absolute top-0 w-full h-full bg-gray-900"
          style="background-size: 100%; background-repeat: no-repeat; height: 150vh"
          :style="{'background-image': 'url(' + require('../../assets/img/register_bg_2.png').default + ')'}"
        ></div>
        <div class="container mx-auto px-4 h-full">
          <div class="flex content-center items-center justify-center h-full mt-24">
            <div class="w-full lg:w-4/12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0"
              >
                <div class="rounded-t mb-0 px-6 py-6">
                  <div class="text-center mb-3">
                    <h6 class="text-gray-600 text-sm font-bold">
                      Se Connecter
                    </h6>
                  </div>
                  <hr class="mt-6 border-b-1 border-gray-400" />
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  <form @submit.prevent="login">
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="grid-password"
                        >Email</label
                      ><input
                        type="email" v-model="form.email"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="Email"
                        style="transition: all 0.15s ease 0s;"
                      />
                    </div>
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="grid-password"
                        >Mot de passe</label
                      ><input
                        type="password" v-model="form.password"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="Mot de passe"
                        style="transition: all 0.15s ease 0s;"
                      />
                    </div>
                    <div>
                      <label class="inline-flex items-center cursor-pointer"
                        ><input
                          id="customCheckLogin"
                          type="checkbox"
                          class="form-checkbox border-0 rounded text-gray-800 ml-1 w-5 h-5"
                          style="transition: all 0.15s ease 0s;"
                        /><span class="ml-2 text-sm font-semibold text-gray-700"
                          >Se souvenir de moi</span
                        ></label
                      >
                    </div>
                    <div class="text-center mt-6">
                      <button
                        class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                        type="submit"
                        style="transition: all 0.15s ease 0s;"
                      >
                        Connexion
                      </button>
                    </div>
                  </form>
                </div>
                <TheLoader v-if="showLoading"/>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
</template>
<script setup>
  import { reactive, computed } from "vue";
  import useAuth from '../../composables/useAuth.js'
  import NavbarComponent from "../../components/Navbar.vue";
  import { Toast } from "../../alert/SweetAlert.js";
  import { useRouter, useRoute } from 'vue-router'
  import useUserStore from '../../store'
  import TheLoader from '../../components/TheLoader.vue'

  const { submitForm, errors } = useAuth()
  const router = useRouter()
  const store = useUserStore()
  const showLoading = computed(() => store.showLoader)

  const form = reactive({
    email: '',
    password: ''
  })

  const login = async () => {
    try{
      await submitForm({...form})
      Toast.fire({
        icon: "success",
          title: "Vous êtes connecté",
      })
      store.user.data = form.email
      router.push({name: "Dashboard"})
    }catch(e) {
      Toast.fire({
        icon: "error",
          title: "impossible de vous connecter",
      })
    }
  }

</script>