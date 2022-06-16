<template>
  <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 "
  >
    <div
      class="container px-4 mx-auto flex flex-wrap items-center justify-between"
    >
      <div
        class="w-full relative flex justify-end lg:w-auto lg:static lg:block lg:justify-start"
      >
        <button
          class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
          type="button"
          @click="toggleNavbar()"
        >
          <i class="text-white fas fa-bars"></i>
        </button>
      </div>
      <div
        class="lg:flex justify-end flex-grow items-center bg-white lg:bg-transparent lg:shadow-none" :class="{'hidden': !showMenu, 'block': showMenu}">
        <Menu as="div" class="ml-3 relative" v-if="store.user.token">
            <div>
              <MenuButton class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                <span class="sr-only">Open user menu</span>
                <h4 class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold">{{ store.user.data.name}}</h4>
              </MenuButton>
            </div>
            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
              <MenuItems class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                <MenuItem v-slot="{ active }">
                  <form @submit.prevent="logout">
                    <button type="submit" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Déconnexion</button>
                  </form>
                </MenuItem>
              </MenuItems>
            </transition>
          </Menu>
      </div>
    </div>
  </nav>
</template>
<script setup>
  import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
  import { ref } from 'vue';
  import useAuth from '../../composables/useAuth';
  import { useRouter, useRoute } from 'vue-router'
  import useUserStore from '../../store';

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