<script setup>

import { ref, toRefs } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
     user: Object,
     auth: Object,
    
    friendshipRequest: Object,
});


const { user,  auth, friendshipRequest } = toRefs(props)

const sendSolicitation = (id) => {
    router.post('/send/' + id, {
        user_id : auth.id,
        friend_id: id,
      
     
    },
    {
   
        preserveScroll: true,
    })
}
const rejectFriendshipRequest = (id)  => {
       router.delete('/reject/' + id ,{
        preserveScroll: true
       })
}

const acceptFriendshipRequest = (id) => {
  
    router.post('/accept/' + id ,{
      
        preserveScroll: true
       })
}


</script>

<template>
    
                           <div v-if="!friendshipRequest ">
    <button @click="sendSolicitation(user.id)"  class="flex justify-center md:w-[200px] p-2 md:my-0 my-4 font-bold text-white bg-blue-500 hover:bg-blue-600 rounded-lg cursor-pointer">
        Enviar Solicitação
    </button>
</div>
<div v-else-if="friendshipRequest.accepted == '1'">
    <div class="flex justify-center md:w-[325px] p-2 md:my-0 my-4 font-bold text-white bg-green-500 hover:bg-green-600 rounded-lg cursor-pointer">
        Vocês são amigos
    </div>
</div>
<div v-else-if="friendshipRequest.user_id === $page.props.auth.user.id"  class="flex justify-center md:w-[325px] p-2 md:my-0 my-4 font-bold text-white bg-blue-500 hover:bg-blue-600 rounded-lg cursor-pointer">
    Solicitação enviada com sucesso
</div>

<div v-else>
    <div class="flex space-x-4">
        <button @click="acceptFriendshipRequest(friendshipRequest.id)"
        :disabled="isAccepting"
         class="flex justify-center  md:w-[200px] p-2 md:my-0 my-4 font-bold text-white bg-green-500 hover:bg-green-600 rounded-lg cursor-pointer">
            Aceitar Solicitação
        </button>
        <button @click="rejectFriendshipRequest(friendshipRequest.id)" class="flex justify-center md:w-[200px]  p-2  md:my-0 my-4 font-bold text-white bg-red-500 hover:bg-red-600 rounded-lg cursor-pointer">
            Rejeitar Solicitação
        </button>
    </div>
    </div>
</template>
