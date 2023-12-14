<script setup>
import { computed, toRefs } from 'vue';
import { usePage } from '@inertiajs/vue3';

import ThumbUpOutline from 'vue-material-design-icons/ThumbUpOutline.vue'

import ThumbUp from 'vue-material-design-icons/ThumbUp.vue'

const props = defineProps(['post'])
const { post } = toRefs(props)

const emit = defineEmits(['like'])

const user = usePage().props.auth.user

const isHeartActiveComputed = computed(() =>
  post.value.likes.some(like => like.user_id === user.id && like.post_id === post.value.id)
);
</script>

<template>
   <button
    @click="$emit('like', { post, user })"
    class="flex -mt-[14px] transition-transform duration-300 ease-in-out transform hover:scale-110"
  >
    <ThumbUpOutline
      v-if="!isHeartActiveComputed"
      :size="16"
    />
    <ThumbUp
      v-else
      fillColor="#1D72E2"
      :size="16"
    />
  </button> 
    
</template>
