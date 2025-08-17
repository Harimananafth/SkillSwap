<script setup>
import Landingpage from '@/components/landingpage.vue'
import { useRoute } from 'vue-router'

const route = useRoute()
</script>

<template>
  <Landingpage v-if="route.path === '/'" />
  <div v-else>
    <div class="content">
      <RouterView />
    </div>
  </div>
</template>

<style scoped></style>