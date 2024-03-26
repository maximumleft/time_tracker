<template>
  <table class="table table-hover text-nowrap">
    <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="user in formState.data">
      <td>{{user.id}}</td>
      <td>{{user.name}}</td>
      <td>{{user.email}}</td>
    </tr>
    </tbody>
  </table>
</template>
<script setup>
import api from "../../api.js"
import {onMounted, reactive} from 'vue';
import {useRouter} from "vue-router";
const router = useRouter()
const formState = reactive({
  data: [],
});
const columns = [
  {
    title: 'Name',
    dataIndex: 'name',
  },
  {
    title: 'Email',
    dataIndex: 'email',
  },

];
let data = [];

onMounted(() => {
  getUsers();
});
async function getUsers(){
  try {
    const response = await api.get('http://127.0.0.1:8000/api/auth/users');
    console.log('ok');
    formState.data = response.data.data
  } catch (error) {
    console.error('Error get Users:', error.response.status);
    if(error.response.status === 401){
      await router.push({name:'login'})
    }
  }
}
</script>
<style scoped>
th.column-money,
td.column-money {
  text-align: right !important;
}
</style>