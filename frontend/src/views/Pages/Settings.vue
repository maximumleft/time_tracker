<template>
  <div style=" width: 30%; height: 15%; margin-left: 30%; margin-top: 10%;">


    <a-form
        :model="formState"
        name="basic"
        :label-col="{ span: 8 }"
        :wrapper-col="{ span: 16 }"
        autocomplete="off"
        @finish="onFinish"
        @finishFailed="onFinishFailed"
    >
      <a-form-item
          label="Username"
          name="username"
          :rules="[{ message: 'Please input your username!' }]"
      >
        <a-input v-model:value="formState.name"/>
      </a-form-item>

      <a-form-item
          label="Email"
          name="email"
          :rules="[{ message: 'Please input your email!' }]"
      >
        <a-input style="background-color: white" disabled v-model:value="formState.email"/>
      </a-form-item>

      <a-form-item :wrapper-col="{ offset: 8, span: 16 }" style="margin-left: 30%">
        <a-button @click.prevent="updateData" type="primary" html-type="submit" class="login-form-button">
          Update
        </a-button>
      </a-form-item>

      <a href="#" @click.prevent="logout">
        Log Out
      </a>
    </a-form>
  </div>

</template>
<script lang="ts" setup>
import {onMounted, ref} from 'vue';
import api from "../../api.js"
import {useRouter} from "vue-router";


const router = useRouter()
const formState = ref({
  id: 0,
  name: '',
  email: '',
});


async function getUser() {
  try {
    const response = await api.post('http://127.0.0.1:8000/api/auth/me');
    formState.value = response.data
  } catch (error) {
    console.error('Error get User')
  }
}

async function updateData() {
  try {
    await api.patch(`http://127.0.0.1:8000/api/auth/user/${formState.value.id}`, formState.value);
    console.log('data has been changed');
  } catch (error) {
    console.error('Error update User')
  }
}

async function logout() {
  try {
    await api.post('http://127.0.0.1:8000/api/auth/logout')
        .then((res: any) => {
          localStorage.removeItem('access_token')
          console.log(111);
          router.push({name:'login'})
        });
  } catch (error) {
    console.error('Error logout User', error)
  }
}

const onFinish = (values: any) => {
  console.log('Success:', values);
};

const onFinishFailed = (errorInfo: any) => {
  console.log('Failed:', errorInfo);
};
onMounted(() => {
  getUser();
});
</script>
<style scoped lang="css">
body {
  width: 50%;
}
</style>
