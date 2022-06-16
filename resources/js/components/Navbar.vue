<template>
  <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 "
  >
    <div
      class="container px-4 mx-auto flex flex-wrap items-center justify-between"
    >
      <div
        class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
      >
        <router-link
          class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
          to="/"
          ><img src="../assets/img/logo.png" alt="logo" class="w-40 h-40 "></router-link
        ><button
          class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
          type="button"
          @click="toggleNavbar()"
        >
          <i class="text-white fas fa-bars"></i>
        </button>
      </div>
      <div
        class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none" :class="{'hidden': !showMenu, 'block': showMenu}">
        <ul class="flex flex-col lg:flex-row list-none mr-auto">
          <li class="flex items-center" v-if="store.isLoggedIn">
            <router-link
              class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold" to="/admin">
              <i class="lg:text-gray-300 text-gray-500 fa fa-home text-lg leading-lg mr-2"></i>
              Admin
            </router-link>
          </li>
          <li class="flex items-center">
            <router-link
              class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold" to="/form">
              <i class="lg:text-gray-300 text-gray-500 far fa-file-alt text-lg leading-lg mr-2"></i>
              Candidature
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
<script setup>
  import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
  import { ref } from 'vue';
  import useAuth from '../composables/useAuth';
  import { useRouter, useRoute } from 'vue-router'
  import useUserStore from '../store';

  const showMenu = ref(false);
  const router = useRouter()

  const toggleNavbar = () => {
    showMenu.value = !showMenu.value;
  }

  const store = useUserStore()
  const { disconnect } = useAuth()

  const logout = async () => {
    await disconnect()
    router.push({name: 'Home'})
  }

</script>