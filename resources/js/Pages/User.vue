<script setup>

import { Link, Head ,usePage} from '@inertiajs/vue3';
import MainNavLayout from '@/Layouts/MainNavLayout.vue';
import FriendshipRequestButton from '@/Components/FriendshiprequestButton.vue';
import CreatePostBox from '@/Components/CreatePostBox.vue';
import Post from '@/Components/Post.vue';


import AccountPlus from 'vue-material-design-icons/AccountPlus.vue'
import Camera from 'vue-material-design-icons/Camera.vue'
import Pen from 'vue-material-design-icons/Pen.vue'


import { useGeneralStore } from '@/stores/general';
import { storeToRefs } from 'pinia';

const useGeneral = useGeneralStore()
const { isCropperModal, isImageDisplay } = storeToRefs(useGeneral)

 defineProps({ posts: Object, user: Object, friendshipRequest: Object,  friends: Array}) 



 const auth = usePage().props.auth.user




</script>

<template>
    <Head title="User" />
    <MainNavLayout>
       <div class="w-full min-h-[100vh] pb-20 bg-[#F1F2F5]">
           <div class="w-full bg-white">
                  <div class="max-w-[1100px] pt-[56px] mx-auto pb-1">
                    <img class=" rounded-b-xl" src="https://picsum.photos/id/45/2000/320">
                    <div id="ProfileInfo" class="flex md:flex-row flex-col items-center justify-between px-4">
                        <div class="flex md:flex-row flex-col gap-4 md:-mt-6 -mt-16 items-center">
                            <div class="relative ">
                                  <img :src="
                                   user.image
                                  " 
                                  class="rounded-full  w-[165px] h-[165px] border-white border-4">
                                  <button
                                  v-if="$page.props.auth.user.id === user.id"
                                  @click="isCropperModal= true"
                                  class="absolute right-0 top-[100px] bg-gray-200 hover:bg-gray-300 p-1.5 rounded-full cursor-pointer"
                                  >
                                     <Camera :size="25" />
                                  </button>
                            </div>
                           <div class="md:mt-4 text-center md:text-left -mt-3">
                                <div class="text-[28px] font-extrabold pt-1">
                                  {{  user.name  }}
                                </div>
                                <div class="text-[17px] font-bold text-gray-600 mb-1.5 text-center md:text-left">{{ friends.length }} amigos
</div>
                                <div class="flex md:justify-start justify-center md:-ml-1">
                                    <img v-for="(friend, index) in friends" :key="friend.id"
         :class="`rounded-full -ml-${index === 0 ? 1 : 2}  z-[${10 - index}] w-[40px] h-[40px] border-white border-2`"
         :src="friend.image" :alt="friend.name"
    >


                              
                                </div>
                           </div> 

                        </div>

                        <Link
                        v-if="$page.props.auth.user.id === user.id"
                         :href="route('profile.edit')"
                         class="
                         flex
                         justify-center
                         w-7/12
                         md:w-[160px]
                         items-baseline
                         md:my-0
                         my-4
                         bg-gray-200
                         hover:bg-gray-300
                         rounded-lg
                         cursor-pointer
                         "
                        >
                        
                        <button class="flex items-center px-5 py-2 font-bold">
                            <Pen class="-ml-2 mr-1" :size="22"/>Editar perfil

                        </button>
                        </Link> 

                        <FriendshipRequestButton v-else
  :friendshipRequest="friendshipRequest"

  :user="user"
  :auth="auth"
/>


           </div>
                    <div class="flex border-t h-[50px] py-[4px]">
                        <button class="w-[85px]">
                            <div
                            class="
                            flex
                            items-center
                            text-[15px]
                            justify-center
                            h-[45px]
                            text-blue-500
                            hover:bg-[#F2F2F2]
                            w-full
                            font-bold
                            rounded-lg
                            cursor-pointer
                            "
                            >
                            Posts
                            </div>
                            <div class="border-b-4 border-b-blue-400 rounded-md"></div>         
                        </button>
                        <button class="flex items-center text-[15px] justify-center h-[48px] p-1 hover:bg-[#F2F2F2] w-[85px] font-bold rounded-lg mx-1 cursor-pointer">
                           Sobre
                        </button>
                        <button class="flex items-center text-[15px] justify-center h-[48px] p-1 hover:bg-[#F2F2F2] w-[85px] font-bold rounded-lg mx-1 cursor-pointer">
                           Amigos
                        </button>
                        <button class="flex items-center text-[15px] justify-center h-[48px] p-1 hover:bg-[#F2F2F2] w-[85px] font-bold rounded-lg mx-1 cursor-pointer">
                           Vídeos
                        </button>
                        <button class="flex items-center text-[15px] justify-center h-[48px] p-1 hover:bg-[#F2F2F2] w-[85px] font-bold rounded-lg mx-1 cursor-pointer">
                           Fotos
                        </button>
                        <button class="flex items-center text-[15px] justify-center h-[48px] p-1 hover:bg-[#F2F2F2] w-[85px] font-bold rounded-lg mx-1 cursor-pointer">
                          Check-ins
                        </button>
                    </div>
                  </div>
           </div>
           <div class="flex-cols md:flex w-full max-w-[1100px] justify-between h-[calc(100%-56px)] md:px-0 px-2 mx-auto">
                <div id="LeftSection" class="w-full md:w-5/12 mt-4 mr-4">
                    <div class="bg-white p-3 rounded-lg shadow-lg">
                        <div class="font-extrabold pb-2 text-xl">Introdução</div>
                       <div class="pb-5">
                        <button class="w-full bg-gray-200 hover:bg-gray-300 rounded-lg p-2 font-bold">
                            Adicionar bio
                        </button>
                       </div>
                       <div class="pb-5">
                        <button class="w-full bg-gray-200 hover:bg-gray-300 rounded-lg p-2 font-bold">
                          Editar detalhes
                        </button>
                       </div>
                       <div class="pb-5">
                        <button class="w-full bg-gray-200 hover:bg-gray-300 rounded-lg p-2 font-bold">
                           Adicionar hobbies
                        </button>
                       </div>
                       <div class="pb-5">
                        <button class="w-full bg-gray-200 hover:bg-gray-300 rounded-lg p-2 font-bold">
                           Adicionar feature
                        </button>
                       </div>
                    </div>
                    <div class="bg-white p-3 mt-4 rounded-lg shadow-lg">
                         <div class="font-extrabold pb-2 text-xl">Fotos</div>
                         <div class="flex flex-wrap items-center justify-start w-full">
                            <span v-for="photo in posts.data" :key="photo" 
                           class="w-1/3"
                           v-show="photo.image !== null"
                            >
                             <img 
                             v-if="photo.image"
                             @click="isImageDisplay = photo.image"
                             class=" aspect-square object-cover p-1 rounded-lg cursor-pointer" 
                             :src="photo.image" 
                             >
                         
                            </span>
                         </div>
                    </div>
                       
                </div>
                <div id="PostsSection" class="w-full md:w-7/12 overflow-auto">
                    <CreatePostBox
                    v-if="$page.props.auth.user.id === user.id"
                    :image="user.image"
                   :placeholder="'O que você está pensando ' + user.name"
                />
                <div v-for="post in posts.data" :key="post">
                  <Post  :user="post.user" :post="post" :comments="post.comments"/>
                </div>
               
              
                </div>
           </div>
     </div>
    </MainNavLayout>
 </template>

