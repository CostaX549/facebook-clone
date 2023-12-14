<script setup>

import { Head, usePage, Link} from '@inertiajs/vue3';


import MainNavLayout from '@/Layouts/MainNavLayout.vue';
import CreatePostBox from '@/Components/CreatePostBox.vue';
import Post from '@/Components/Post.vue';



import Magnify from 'vue-material-design-icons/Magnify.vue'
import TelevisionPlay from 'vue-material-design-icons/TelevisionPlay.vue'
import StorefrontOutline from 'vue-material-design-icons/StorefrontOutline.vue'
import AccountGroup from 'vue-material-design-icons/AccountGroup.vue'
import AccountMultiple from 'vue-material-design-icons/AccountMultiple.vue'
import Flag from 'vue-material-design-icons/Flag.vue'
import ClockTimeTwoOutline from 'vue-material-design-icons/ClockTimeTwoOutline.vue'
import Restore from 'vue-material-design-icons/Restore.vue'
import VideoImage from 'vue-material-design-icons/VideoImage.vue'
import DotsHorizontal from 'vue-material-design-icons/DotsHorizontal.vue'


defineProps({ posts: Object, users: Object })



const user = usePage().props.auth.user


</script>

<template>
    <Head title="Posts" />

 <MainNavLayout>
    <div class="fixed w-full h-[100%] bg-[#F1F2F5]">
          <div class="grid grid-rows-3 grid-flow-col w-full max-w-[1600px] mt-[56px] h-[calc(100%-56px)] mx-auto px-4 ">
               <div id="LeftSection" class="xl:w-[345px] lg:block hidden">
                   <div class="pt-4 max-w-[320px] pr-4">
                    <Link
                    :href="route('user.show', { id: user.id })"
                     class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] p-2 rounded-md">
                        <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" :src="user.image">
                        <div class="text-[15px] text-gray-800 font-extrabold pl-3">
                         {{ user.name }}
                        </div>
                    </Link>
                    <button  class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md">
                      <AccountMultiple :size="40" fillColor="#5BD7C6"/>
                      <div  class="text-[15px] text-gray-800 font-extrabold pl-3">
                        Amigos
                      </div>
                    </button>
                    <button  class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md">
                      <Flag :size="40" fillColor="#F2682C"/>
                      <div  class="text-[15px] text-gray-800 font-extrabold pl-3">
                        Páginas
                      </div>
                    </button>
                    <button  class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md">
                      <ClockTimeTwoOutline :size="40" fillColor="#21AAFA"/>
                      <div  class="text-[15px] text-gray-800 font-extrabold pl-3">
                        Mais Recentes
                      </div>
                    </button>
                    <button  class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md">
                      <AccountGroup :size="40" fillColor="#20A9FD"/>
                      <div  class="text-[15px] text-gray-800 font-extrabold pl-3">
                        Grupos
                      </div>
                    </button>
                    <button  class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md">
                      <StorefrontOutline :size="40" fillColor="#48C0D8"/>
                      <div  class="text-[15px] text-gray-800 font-extrabold pl-3">
                        Mercado Online
                      </div>
                    </button>
                    <button  class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md">
                      <TelevisionPlay :size="40" fillColor="#9739CF"/>
                      <div  class="text-[15px] text-gray-800 font-extrabold pl-3">
                        Assistir
                      </div>
                    </button>
                    <button  class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md">
                      <Restore :size="40" fillColor="#32B4D0"/>
                      <div  class="text-[15px] text-gray-800 font-extrabold pl-3">
                       Memórias
                      </div>
                    </button>
                   </div>
               </div>

               <div id="PostsSection" class="row-span-6 max-w-[600px] lg:mx-0 mx-auto overflow-auto">
                <CreatePostBox
                    :image="user.image"
                   :placeholder="'O que você está pensando ' + user.name"
                />
                <div v-for="post in posts.data" :key="post">
                
                  <Post  :user="post.user" :post="post" :comments="post.comments"/>
                </div>
                
               </div>

               <div id="RightSection" class="pl-4 lg:block hidden">
                    <div class="max-w-[340px] min-w-[250px] mx-auto pt-4">
                       <div class="flex items-center justify-between border-b border-b-gray-300">
                            <div class="font-semibold">Contatos</div>
                            <div class="flex items-center">
                                 <div class="p-2 hover:bg-gray-300 rounded-full cursor-pointer">
                                 <VideoImage :size="23" fillColor="#050505"/>
                                 </div>
                                 <div class="p-2 hover:bg-gray-300 rounded-full cursor-pointer">
                                 <Magnify :size="23" fillColor="#050505"/>
                                 </div>
                                 <div class="p-2 hover:bg-gray-300 rounded-full cursor-pointer">
                                 <DotsHorizontal :size="23" fillColor="#050505"/>
                                 </div>
                            </div>
                       </div>
                       <div class="h-[calc(100vh-115px)] overflow-auto pt-2">
                        <Link v-for="user in users"  :key="user.id"  :href="route('user.show', { id: user.id })">
                           <div   class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md">
                        
                               <img class="rounded-full ml-1 min-w-[38px] max-h-[38px]" :src="user.image">
                               <div class="text-[15px] text-gray-800 font-extrabold pl-3">{{  user.name }}</div>
                              
                           </div>
                          </Link>
                       </div>
                    </div>
               </div>
          </div>
    </div>
 </MainNavLayout>
</template>
