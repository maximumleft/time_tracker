<template>
  <a-result status="404" title="404" sub-title="Sorry, the page you visited does not exist.">
    <template #extra>
      <router-link class="btn btn-primary" :to="{name: 'button'}">Back Home</router-link>
    </template>
  </a-result>
</template>


