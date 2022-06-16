<template>
  <div>
    <navbar-component></navbar-component>
    <main>
      <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" id="hero">
          <span
            id="blackOverlay"
            class="w-full h-full absolute opacity-75 bg-black"
          ></span>
        </div>
        <div class="container relative mx-auto">
          <div class="items-center flex flex-wrap content-center">
            <div class="w-full px-4 ml-auto mr-auto text-center">
              <div class="px-12 py-32">
                <h1 class="text-white font-semibold text-5xl">
                  Ministère Du Tourisme et des Transports Aériens
                </h1>
                <p class="mt-4 text-gray-300 text-3xl">
                  Formation au Qatar Aeronautical College
                </p>

                <div class="flex gap-5 justify-center mt-5 text-center">
                  <a href="#contact" class="bg-pink-600 text-white active:bg-gray-700 text-sm font-bold uppercase px-3 py-3 shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1">
                    Nous contacter
                  </a>
                  <router-link to="/form" class="bg-pink-600 text-white active:bg-gray-700 text-sm font-bold uppercase px-3 py-3 shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1">
                    Candidature
                  </router-link>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden" style="height: 70px;">
          <svg class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0" >
            <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </div>
      <section class="pb-20 bg-gray-300 -mt-24">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap">
            <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
              <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                <div class="px-4 py-5 flex-auto">
                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 
                  shadow-lg rounded-full bg-red-400">
                    <i class="fas fa-award"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full md:w-4/12 px-4 text-center">
              <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                <div class="px-4 py-5 flex-auto">
                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 
                  shadow-lg rounded-full bg-blue-400">
                    <i class="fas fa-retweet"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="pt-6 w-full md:w-4/12 px-4 text-center">
              <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                <div class="px-4 py-5 flex-auto">
                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 
                  shadow-lg rounded-full bg-green-400">
                    <i class="fas fa-fingerprint"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex flex-wrap items-center mt-32">
            <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
              <div
                class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100"
              >
                <i class="fas fa-user-friends text-xl"></i>
              </div>
              <h3 class="text-3xl mb-2 font-semibold leading-normal">
                Faites nous confiance
              </h3>
              <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700">
                Soumettez votre candidature pour la formation en aviation civile au Qatar.
              </p>
            </div>
            <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
              <div class="relative flex flex-col min-w-0 break-words  w-full mb-6 shadow-lg rounded-lg bg-pink-600">
                <img alt="..." src="../assets/img/cover.png" class="w-full align-middle rounded-t-lg" style="height: 350px"/>
                <blockquote class="relative p-8 mb-4">
                  <svg preserveAspectRatio="none"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="absolute left-0 w-full block" style="height: 95px; top: -94px;">
                    <polygon points="-30,95 583,95 583,65" class="text-pink-600 fill-current"></polygon>
                  </svg>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="pb-20 relative block bg-gray-900">
        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20" style="height: 80px;">
          <svg class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
            <polygon class="text-gray-900 fill-current border-b-0" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
        <div class="container mx-auto px-4 lg:pt-24 lg:pb-64">
          <div class="flex flex-wrap text-center justify-center">
            <div class="w-full lg:w-6/12 px-4" id="contact">
              <h2 class="text-4xl font-semibold text-white">Contact</h2>
              <p class="text-lg leading-relaxed mt-4 mb-4 text-white">Appelez nous directement au +221 776137142  ou +221 783023994</p>
            </div>
          </div>
        </div>
      </section>
      <section class="relative block py-24 lg:pt-0 bg-gray-900">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
            <div class="w-full lg:w-6/12 px-4">
              <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300">
                <div class="flex-auto p-5 lg:p-10">
                  <h4 class="text-2xl font-semibold">Contactez-nous au besoin</h4>
                  <p class="leading-relaxed mt-1 mb-4 text-gray-600">
                    Remplissez juste le formulaire pour nous laisser un message.
                  </p>
                  <form @submit.prevent="sendMessage">
                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="email" >Email</label>
                      <input type="email" v-model="form.email"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="Email" style="transition: all 0.15s ease 0s;"/>
                    </div>
                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="message" >Message</label
                      ><textarea rows="4" cols="80" v-model="form.message"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="Typez votre message..."></textarea>
                    </div>
                    <div class="text-center mt-6">
                      <button
                        class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                        type="submit" style="transition: all 0.15s ease 0s;">
                        Envoyez le Message
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer-component></footer-component>
  </div>
</template>
<script setup>
import NavbarComponent from "../components/Navbar.vue";
import FooterComponent from "../components/Footer.vue";
import { reactive } from "vue";
import { Toast } from "../alert/SweetAlert";
import axiosClient from "../api/useAxios";

const form = reactive({
  email: '',
  message: ''
})

const sendMessage = async () => {
  if(form.email.trim() != '' && form.message.trim() != ''){
    try {
      const res = await axiosClient.post('/contact')
      if(res.data) {
        Toast.fire({
          icon: "error",
          title: "Nous avons bien reçu votre message",
        });
      }
    }catch(e) {
        Toast.fire({
        icon: "success",
        title: "Un problème est survenu",
      });
    }
  }else if(form.email.trim() === ''){
    Toast.fire({
      icon: "error",
      title: "Veuillez saisir votre adresse email",
    });
  }else {
    Toast.fire({
      icon: "error",
      title: "Le message est obligatoire",
    });
  }
}
</script>

<style scoped>
  #hero {
    background-image: url("../assets/img/hero.jpeg");
  }
</style>
