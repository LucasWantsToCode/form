<template>
  <div>
    <sidebar-component></sidebar-component>
    <div class="relative md:ml-64 bg-blueGray-100">
        <navbar-component></navbar-component>
        <div class="relative bg-gray-900 md:pt-32 pb-8">
            <div class="px-4 md:px-10 mx-auto w-full">
                <img src="../assets/img/logo.png" alt="logo" class="w-32 h-32 ">
                <a class="text-2xl -sm:hidden sm:hidden font-bold leading-relaxed lg:inline-block md:hidden mr-4 py-2 whitespace-nowrap uppercase text-white" href="javascript:void(0)">
                    Ministère Du Tourisme et des Transports aériens | Formation au Qatar Aeronautical College
                </a>
            </div>
        </div>
        <div class="my-8 py-2 overflow-x-auto sm:mx-2 sm:px-6 lg:mx-3 lg:px-8">
          
          <div class="container justify-center mx-auto flex flex-row">
          <div class="overflow-x-auto shadow-md">
            <h1 class="text-xl">Le nombre de candidatures est de <span class="text-2xl">{{ forms.length}}</span></h1>
          <div class="relative w-1/2 mb-3">
                <input type="text" v-model="data.searchItem"
                  class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                  placeholder="Rechercher" style="transition: all 0.15s ease 0s;" />
              </div>
            <div class="inline-block min-w-full align-middle">
              
              <div class="overflow-hidden">
                <table class="min-w-full table-fixed dark:divide-gray-700 divide-y divide-green-400 ">
                  <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="py-4 px-2 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400"> 
                          ID
                          <span @click="sortData(3)">
                              <i class="fa fa-caret-up" aria-hidden="true"></i>
                          </span>
                        </th>
                        <th scope="col" class="py-4 px-2 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400"> Nom et Prénom</th> 
                        <th scope="col" class="py-4 px-2 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400" 
                            v-for="(column, index) in columns" :key="index">
                            <span class="mr-1">{{ column }}</span>
                            <span @click="sortData(index)">
                                <i class="fa fa-caret-up" aria-hidden="true"></i>
                            </span>
                        </th>
                        <th scope="col" class="py-4 px-2 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400"> Email </th>
                        <th scope="col" class="py-4 px-2 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400"> Téléphone </th>
                        <th scope="col" class="py-4 px-2 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400"> Action </th>
                        <th scope="col" class="py-4 px-2 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400"> Télécharger </th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" v-for="(candidate, index) in filterCandidates" :key="index">
                      <td class="p-4 w-4 dark:text-white">
                        <div class="flex items-center">
                        {{ candidate.id }}
                        </div>
                      </td>
                      <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{ candidate.firstName }} &nbsp;&nbsp;{{ candidate.lastName }}</td>
                      <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{ calculateAge(new Date(candidate.birthdate)) }}</td>
                      <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{ candidate.mention_bac }}</td>
                      <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{ candidate.englishLevel }}</td>
                      <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{ candidate.email }}</td>
                      <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{ candidate.phone }}</td>
                      <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" @click="deleteCandidate(candidate.id)">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                      </td>
                      <td class="py-4 px-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <button @click="downloadDoc(candidate.piece_photo)" class="px-2 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 
                          hover:bg-blue-700 hover:text-white focus:outline-none">Pièce</button>
                        <button @click="downloadDoc(candidate.doc_bac)" class="px-2 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 
                           hover:bg-blue-700 hover:text-white focus:outline-none">Diplome</button>
                        <button @click="downloadDoc(candidate.resume)" class="px-2 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 
                             hover:bg-blue-700 hover:text-white focus:outline-none">Cv</button>
                      </td>

                      <td class="py-4 px-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <button @click="downloadDocZip(candidate.email)" class="px-2 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 
                             hover:bg-blue-700 hover:text-white focus:outline-none">Zip</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="flex flex-col items-center content-center ">
              <!-- Buttons -->
              <div class="inline-flex mt-2 xs:mt-0">
                <button @click="prevPage" class="py-2 px-4 text-sm font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Précedent
                </button>
                <button @click="nextPage" class="py-2 px-4 text-sm font-medium text-white bg-gray-800 rounded-r border-0 border-l border-gray-700 hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Suivant
                </button>
              </div>
            </div>
        </div>
    </div>
  </div>
</template>
<script setup>
    import Swal from "sweetalert2";
    import { computed, onMounted, reactive, ref } from "vue";
    import NavbarComponent from "../components/admin/Navbar.vue";
    import SidebarComponent from "../components/admin/Sidebar.vue";
    import useForm from "../composables/useForm";
    import TableLite from "vue3-table-lite";
import { Toast } from "../alert/SweetAlert";

    
    const { getForms, forms, delCandidate, downloadDocument, linkUrl, downloadDocumentZip } = useForm()

    onMounted(() => getForms())

    const deleteCandidate = async (id) => {
      Swal.fire({
				title: "Etes-vous sûr?",
				text: "La suppréssion est définitive!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Oui, Supprimer!",
				cancelButtonText: "Annuler",
			}).then(async (result) => {
				if (result.isConfirmed) {
					try {
						await delCandidate(id);
              forms.value = forms.value.filter((cat) => cat.id !== id)
              Swal.fire("Supprimé!", "Candidature supprimée", "success");
					} catch (err) {
						Swal.fire("Erreur!", err, "error");
					}
				}
			});
    }

  const columns = [
    'Age',
    'Mention Bac',
    'Niveau en Anglais'
  ]

  const data = reactive({
    searchItem: ""
  })
  const currentSort = ref('id')
  const currentSortDir = ref('desc')
  const currentPage = ref(1)
  const pageSize = ref(5)


  const filterCandidates = computed(() =>{
    if(data.searchItem !== ""){
      return forms.value.filter((cat) => {
        return cat.firstName.toUpperCase().match(data.searchItem.toUpperCase())}
      )
    }
    return forms.value.sort((a,b) => {
      let modifier = 1;
      if(currentSortDir.value === 'desc') modifier = -1;
      if(a[currentSort.value] < b[currentSort.value]) return -1 * modifier;
      if(a[currentSort.value] > b[currentSort.value]) return 1 * modifier;
      return 0;
    }).filter((row, index) => {
        let start = (currentPage.value-1)*pageSize.value;
        let end = currentPage.value*pageSize.value;
        if(index >= start && index < end) return true;
      })
  })

  const sortData = (index) => {
    if(index === 0) index = 'birthdate'
    if(index === 1) index = 'mention_bac'
    if(index === 2) index = 'englishLevel'
    if(index === 3) index = 'id'
    if(index === currentSort.value) {
      currentSortDir.value = currentSortDir.value ==='asc'?'desc':'asc';
    }
      currentSort.value = index;
  }

  const nextPage = () => {
      if((currentPage.value*pageSize.value) < forms.value.length) currentPage.value++
    }
  const prevPage = () => {
      if(currentPage.value > 1) currentPage.value--
    }

  const calculateAge = (birthday) => { // birthday is a date
    var ageDifMs = Date.now() - birthday.getTime()
    var ageDate = new Date(ageDifMs); // miliseconds from epoch
    return Math.abs(ageDate.getUTCFullYear() - 1970);
  }

  const downloadDoc = async (path) => {
    if(path === null) return Toast.fire({
          icon: "warning",
          title: "Le document n'existe pas",
    });
     
    const res = await downloadDocument({ file_path : path})
    const link = document.createElement('a')
    link.href = res;
    link.setAttribute('download', path.split("/")[1].split("_")[1])
    document.body.appendChild(link)
    link.click();
  }
  
  const downloadDocZip = async (path) => {
    if(path === null) return Toast.fire({
          icon: "warning",
          title: "Le document n'existe pas",
    });

    const res = await downloadDocumentZip({ file_path : path})
    const link = document.createElement('a')
    link.href = res;
    link.setAttribute('download', "Candidature.zip")
    document.body.appendChild(link)
    link.click();
      
  }
</script>