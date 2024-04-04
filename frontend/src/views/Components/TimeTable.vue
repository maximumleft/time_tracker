<template>
  <div>
    <a-table
        :columns="columns"
        :data-source="formState.displayedData"
        :pagination="false"
    >
    </a-table>
    <a-pagination
        style="margin-top: 20px; margin-left: 20px;"
        :current="currentPage"
        :total="formState.data.length"
        :default-page-size="6"
        @change="handleChangePage"
    />
  </div>
</template>
<script setup>
import api from "../../api.js"
import { onMounted, reactive} from 'vue';
import {useRouter} from "vue-router";
const router = useRouter()
const formState = reactive({
  data: [],
  displayedData: [],
});

let currentPage = 1;
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
    formState.data = response.data.data;
    formState.displayedData = formState.data.slice(0, 6); // Первая страница с 6 элементами
  } catch (error) {
    console.error('Error get Users:', error.response.data.message);
  }
}

function handleChangePage(page) {
  currentPage = page;
  const startIndex = (page - 1) * 6;
  const endIndex = startIndex + 6;
  formState.displayedData = formState.data.slice(startIndex, endIndex);
}


</script>
