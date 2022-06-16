<template>
  <div>
    <navbar-component></navbar-component>
    <main>
      <section class="absolute w-full h-screen">
        <div
          class="absolute top-0 w-full bg-gray-900 h-auto"
          style="background-size: 100%; background-repeat: no-repeat; height: 300vh"
          :style="{'background-image': 'url(' + require('../assets/img/register_bg_2.png').default + ')'}"
        ></div>
        <div class="container mx-auto px-4 h-full py-32">
          <div class="flex content-center justify-center h-full">
            <div class="w-full lg:w-8/12 px-4 mt-32 h-full">
              <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg bg-gray-300 border-0">
                <div class="mb-0 px-6 py-6">
                  <div class="text-center mb-3">
                    <h6 class="text-gray-600 text-lg font-bold">
                      Formulaire de candidature
                    </h6>
                  </div>
                  <div class="relative flex py-2 items-center" >
                    <div class="flex-grow border-t border-gray-400"></div>
                    <span class="flex-shrink mx-4 text-gray-400">Informations Personnelles</span>
                    <div class="flex-grow border-t border-gray-400"></div>
                  </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  <form @submit.prevent="apply" enctype="multipart/form-data">
                    <div class="flex-row lg:flex md:flex relative mb-3">
                        <div class="lg:w-1/2 md:w-1/2 w-full mr-3">
                            <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password" >Nom<abbr title="required">*</abbr></label>
                            <input type="text" v-model="form.lastName"
                              class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                              placeholder="Nom" style="transition: all 0.15s ease 0s;"/>
                        </div>
                        <div class="lg:w-1/2 md:w-1/2 w-full">
                            <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password" >Prénom<abbr title="required">*</abbr></label>
                            <input type="text" v-model="form.firstName"
                              class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                              placeholder="Prénom" style="transition: all 0.15s ease 0s;"/>
                        </div>
                    </div>
                    
                    <div class="flex-row lg:flex md:flex relative mb-3">
                        <div class="lg:w-1/2 md:w-1/2 w-full mr-3">
                            <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password" >Date de Naissance<abbr title="required">*</abbr></label>
                            <input type="date" v-model="form.birthdate"
                              class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                              placeholder="Nom" style="transition: all 0.15s ease 0s;"/>
                        </div>
                        <div class="lg:w-1/2 md:w-1/2 w-full">
                            <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password" >Lieu de Naissance<abbr title="required">*</abbr></label>
                            <input type="text" v-model="form.birthPlace"
                              class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                              placeholder="Lieu de Naissance" style="transition: all 0.15s ease 0s;"/>
                        </div>
                    </div>

                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Adresse<abbr title="required">*</abbr></label>
                      <textarea type="text" v-model="form.address"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="Adresse" style="transition: all 0.15s ease 0s;" />
                    </div>

                    <div class="flex-row lg:flex md:flex relative mb-3">
                        <div class="lg:w-1/2 md:w-1/2 w-full mr-3">
                            <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password" >Email<abbr title="required">*</abbr></label>
                            <input type="email" v-model="form.email"
                              class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                              placeholder="Email" style="transition: all 0.15s ease 0s;"/>
                        </div>
                        <div class="lg:w-1/2 md:w-1/2 w-full">
                            <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password" >Téléphone<abbr title="required">*</abbr></label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm"> +221 </span>
                              </div>
                              <input type="text" v-model="form.phone" 
                              class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full pl-12"
                              style="transition: all 0.15s ease 0s;" />
                              
                            </div>
                        </div>
                    </div>

                    <div class="relative flex py-2 items-center" >
                      <div class="flex-grow border-t border-gray-400"></div>
                      <span class="flex-shrink mx-4 text-gray-400">Études</span>
                      <div class="flex-grow border-t border-gray-400"></div>
                    </div>

                    <div class="flex-row lg:flex md:flex relative mb-3">
                      <div class="lg:w-1/2 md:w-1/2 w-full mr-3">
                          <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password" >Niveau d'études<abbr title="required">*</abbr></label>
                          <input type="text" v-model="form.studyLevel"
                            class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                            placeholder="Niveau d'étude" style="transition: all 0.15s ease 0s;"/>
                      </div>
                      <div class="lg:w-1/2 md:w-1/2 w-full">
                          <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password" >Série Bac<abbr title="required">*</abbr></label>
                          <input type="text" v-model="form.serie" maxlength="2"
                            class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                            placeholder="Ex: S1" style="transition: all 0.15s ease 0s;"/>
                      </div>
                    </div>

                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Mention au Bac<abbr title="required">*</abbr></label>
                      <input type="text" v-model="form.mention_bac"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="Votre mention au bac" style="transition: all 0.15s ease 0s;" />
                    </div>

                    <div class="flex-row lg:flex md:flex relative mb-3">
                      <div class="lg:w-1/2 md:w-1/2 w-full mr-3">
                          <label class="text-gray-800 font-semibold block my-3 text-md">Niveau en anglais<abbr title="required">*</abbr></label>
                          <select class="w-full bg-gray-100 px-4 py-2 focus:outline-none" required="required" v-model="form.englishLevel" id="englishLevel">
                              <option value="beginner">Débutant</option>
                              <option value="interm">Intermediaire</option>
                              <option value="fluent">Courant</option>
                              <option value="advanced">Avancé</option>
                          </select>
                      </div>
                      <div class="lg:w-1/2 md:w-1/2 w-full">
                          <label class="text-gray-800 font-semibold block my-3 text-md">Formation souhaitée<abbr title="required">*</abbr></label>
                          <select class="w-full bg-gray-100 px-4 py-2 focus:outline-none" required="required" v-model="form.training" id="englishLevel">
                              <option value="Pilot Training">Pilotage avion</option>
                              <option value="Aircraft Maintenance">Maintenance avion</option>
                              <option value="Airport Operation">Opérations aéropotuaires</option>
                              <option value="Air Traffic Control">Contrôle aérien</option>
                              <option value="Advanced Aviation Management">Gestion aéroportuaire</option>
                              <option value="Meteorology">Météorologie</option>
                          </select>
                      </div>
                    </div>

                    <div class="relative flex py-2 items-center" >
                      <div class="flex-grow border-t border-gray-400"></div>
                      <span class="flex-shrink mx-4 text-gray-400">Vie Professionnelle</span>
                      <div class="flex-grow border-t border-gray-400"></div>
                    </div>

                    <div class="flex-row lg:flex md:flex relative my-3">
                      <label for="">Statut<abbr title="required">*</abbr>: </label>
                      <label class="inline-flex items-center cursor-pointer" >
                        <input id="customCheckLogin" type="radio" v-model="form.job_status" value="employed" class="form-checkbox border-0 text-gray-800 ml-1 w-5 h-5"
                          style="transition: all 0.15s ease 0s;"/><span class="ml-2 text-sm font-semibold text-gray-700">Salarié</span>
                      </label>

                      <label class="inline-flex items-center cursor-pointer" >
                        <input id="customCheckLogin" type="radio" v-model="form.job_status" value="student" class="form-checkbox border-0 text-gray-800 ml-1 w-5 h-5"
                          style="transition: all 0.15s ease 0s;"/><span class="ml-2 text-sm font-semibold text-gray-700">Étudiant</span>
                      </label>

                      <label class="inline-flex items-center cursor-pointer" >
                        <input id="customCheckLogin" type="radio" v-model="form.job_status" value="unemployed" class="form-checkbox border-0 text-gray-800 ml-1 w-5 h-5"
                          style="transition: all 0.15s ease 0s;"/><span class="ml-2 text-sm font-semibold text-gray-700">Chercheur d'emploi</span>
                      </label>
                    </div>
                    
                    <div class="relative w-full mb-3" v-if="form.job_status==='employed'">
                      <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Nom de votre entreprise</label>
                      <input type="text" v-model="enterprise"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="Nom de votre entreprise" style="transition: all 0.15s ease 0s;" />
                    </div>

                    <div class="relative flex py-2 items-center" >
                      <div class="flex-grow border-t border-gray-400"></div>
                      <span class="flex-shrink mx-4 text-gray-400">Pièce d'identité</span>
                      <div class="flex-grow border-t border-gray-400"></div>
                    </div>

                    <div class="flex-row lg:flex md:flex relative mb-3 gap-6">
                      <label for="">Possédez-vous une pièce d'identité <abbr title="required">*</abbr>: </label>

                      <label class="inline-flex items-center cursor-pointer" >
                        <input id="customCheckLogin" type="radio" v-model="form.piece" value="yes" class="form-checkbox border-0 text-gray-800 ml-1 w-5 h-5"
                          style="transition: all 0.15s ease 0s;"/><span class="ml-2 text-sm font-semibold text-gray-700">Oui</span>
                      </label>

                      <label class="inline-flex items-center cursor-pointer" >
                        <input id="customCheckLogin" type="radio" v-model="form.piece" value="no" class="form-checkbox border-0 text-gray-800 ml-1 w-5 h-5"
                          style="transition: all 0.15s ease 0s;"/><span class="ml-2 text-sm font-semibold text-gray-700">Non</span>
                      </label>
                    </div>

                    <div v-if="form.piece==='yes'">
                      <div class="flex-row lg:flex md:flex relative mb-3">
                        <div class="lg:w-1/2 md:w-1/2 w-full mr-3">
                            <label class="text-gray-800 font-semibold block my-3 text-md">Type de pièce d'identité<abbr title="required">*</abbr></label>
                            <select class="w-full bg-gray-100 px-4 py-2 focus:outline-none" required="required" v-model="form.id_type" id="englishLevel">
                                <option value="passport">Passeport</option>
                                <option value="cni">Carte nationale d'identité</option>
                            </select>
                        </div>
                        <div class="lg:w-1/2 md:w-1/2 w-full">
                            <label class="text-gray-800 font-semibold block my-3 text-md" for="grid-password" >Numéro de la pièce</label>
                            <input type="text" v-model="form.piece_no"
                              class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                              placeholder="Numéro de la pièce" style="transition: all 0.15s ease 0s;"/>
                        </div>
                      </div>

                      <div class="relative w-full mb-3">
                        <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Téléchargez votre pièce d'identité</label>
                        <input type="file" @change="addPiecePhoto"
                          class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                          style="transition: all 0.15s ease 0s;" />
                      </div>
                    </div>

                    <div class="flex-row lg:flex md:flex relative my-3">
                      <div class="lg:w-1/2 md:w-1/2 w-full mr-3">
                          <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Téléchargez votre CV <span> *</span></label>
                          <input type="file" @change="addResume"
                            class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                            style="transition: all 0.15s ease 0s;" />
                      </div>
                      <div class="lg:w-1/2 md:w-1/2 w-full">
                          <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Téléchargez le bac <span> *</span></label>
                          <input type="file" @change="addBac"
                            class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                            style="transition: all 0.15s ease 0s;" />
                      </div>
                    </div>

                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Téléchargez d'autres diplômes</label>
                      <input type="file" @change="addOtherDiploma"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white text-sm shadow focus:outline-none focus:ring w-full"
                        style="transition: all 0.15s ease 0s;" />
                    </div>
                    <div class="text-center mt-6" v-if="showLoading">
                      <button disabled class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                        type="submit" style="transition: all 0.15s ease 0s;">
                        Soumettre en cours
                      </button>
                    </div>

                    <div class="text-center mt-6" v-else>
                      <button class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                        type="submit" style="transition: all 0.15s ease 0s;">
                        Soumettre
                      </button>
                    </div>
                  </form>
                  <TheLoader v-if="showLoading"/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
</template>

<script setup>
import { computed, reactive, ref } from "vue";
import NavbarComponent from "../components/Navbar.vue";
import useForm from '../composables/useForm.js'
import Swal from 'sweetalert2'
import { Toast } from "../alert/SweetAlert";
import TheLoader from '../components/TheLoader.vue'
import useUserStore from "../store";

  const store = useUserStore()

  const showLoading = computed(() => store.showLoader)

  const { errors, submitForm } = useForm()
  const initialForm = {
    firstName: null,
    lastName: null,
    birthdate: null,
    birthPlace: null,
    email: null,
    phone: null,
    address: null,
    studyLevel: null,
    serie : null,
    englishLevel: null,
    training: null,
    job_status: null,
    enterprise: null,
    piece_no:  null,
    piece_photo: null,
    doc_bac: null,
    other_doc: null,
    resume: null,
    id_type: null,
    mention_bac: null
  }
  const form = reactive({...initialForm})
  
  const piece = ref('no')

  const addPiecePhoto = (event) =>{
    let photo = event.target.files[0];
    if (photo.size > 5000000) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'La taille de l\'image ne doit pas dépasser 5 Mo'
        })
        photo = null
    } else {
        form.piece_photo = event.target.files[0];
    }
  }
  const addResume = (event) =>{
    let photo = event.target.files[0];
    if (photo.size > 5000000) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'La taille du document ne doit pas dépasser 5 Mo'
        })
        photo = null
    } else {
      form.resume = event.target.files[0];
    }
  }
  const addBac = (event) =>{
    let photo = event.target.files[0];
    if (photo.size > 5000000) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'La taille du document ne doit pas dépasser 5 Mo'
        })
        photo = null
    } else {
      form.doc_bac = event.target.files[0];
    }
  }
  const addOtherDiploma = (event) =>{
    let photo = event.target.files[0];
    if (photo.size > 5000000) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'La taille du document ne doit pas dépasser 5 Mo'
        })
        photo = null
    } else {
      form.other_doc = event.target.files[0];
    }
  }

  const formValidation = (form) => {     
    if(form.firstName.trim() !== ''  && form.address.trim() !== '' && form.serie.trim() !== '' 
    && form.lastName.trim() !== '' && form.doc_bac && form.phone 
    && form.email && form.lastName.trim() !== '' && form.mention_bac.trim() !== ''
    && form.studyLevel !== null && form.englishLevel !== null && form.training !== null 
    && form.job_status !== null && form.doc_bac !== null && form.resume !== null) {
      return true
    }
    return false
  }

  const calculateAge = (birthday) => { // birthday is a date
    var ageDifMs = Date.now() - new Date(birthday).getTime()
    var ageDate = new Date(ageDifMs); // miliseconds from epoch
    let age = Math.abs(ageDate.getUTCFullYear() - 1970);
    if(age < 16){
      Toast.fire({
        icon: "warning",
        title: "Vous devez avoir au moins 16 ans",
      });
      return false;
    }

    return true
  }

  const phoneValidation = (dataf) => {
      if(dataf.match(/^[0-9\s]*$/) !== null && parseInt(dataf) != 0){
        let data = dataf.trim()
        if(data.trim().length === 9){
          if(data[0] == 7 && (data[1] == 7 || data[1] == 0 || data[1] == 8 || data[1] == 6 || data[1] == 5)){
            return true
          }
          else if(data[0] == 3){
            return true 
          }
          else{
            Toast.fire({
              icon: "error",
              title: "Veuillez entrer un numéro valide",
            });
            return false
          }
        }
        else{
          Toast.fire({
            icon: "error",
            title: "Le numéro doit comporter 9 caractères",
          });
          return false
        }
      }else{
        Toast.fire({
          icon: "error",
          title: "Le numéro ne doit contenir que des chiffres",
        });
        return false
      }
  }

  const apply = async () => {
    if(formValidation(form)){
      if(calculateAge(form.birthdate)){
        store.showLoader = true
        try {
          const res = await submitForm({...form})
          if(res.status === 201){
            Toast.fire({
              icon: "success",
              title: "Candidature envoyée",
            });
            Object.assign(form, initialForm)
          }
        }                                                                                                                                                                                 
        catch(e) {
          store.showLoader = false
          //console.log(e)
          /*Toast.fire({
            icon: "error",
            title: e,//"Impossible de soumettre votre candidature",
          });*/
        }
        store.showLoader = false
      }
    }else {
      Toast.fire({
          icon: "warning",
          title: "Veuillez remplir les champs obligatoires",
        });
    }
  }
</script>
