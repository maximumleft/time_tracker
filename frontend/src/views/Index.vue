<script setup lang="ts">

import TimeTable from "@/views/Components/TimeTable.vue";
</script>

<template>
  <a-layout-content style="display: flex; flex-direction: column; justify-content: center;
  align-items: center; height: 90vh; position: relative;">

    <a-button type="primary" style="width: 200px; height: 50px; font-size: 20px;
  background-color: #49c5b6 ;color: black; margin-left: auto;
  margin-right: auto;">Начать/Закончить
    </a-button>
    <div style="margin-top: 3%">
      <time-table></time-table>
    </div>
    <div
        style="display: flex; justify-content: center; align-items: end; color:white; font-size: 7pt; margin-top: auto; margin-bottom: 1%">
      <span>Created by Maks</span>
    </div>

  </a-layout-content>
</template>

<style scoped>

</style>