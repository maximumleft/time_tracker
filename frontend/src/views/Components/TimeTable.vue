<template>
  <a-table
      :columns="columns"
      :data-source="formState.data"
  >
  </a-table>
</template>
<script setup>
import api from "../../api.js"
import { onMounted, reactive} from 'vue';
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
