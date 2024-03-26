<template>
  <a-form
      :model="formState"
      name="basic"
      :label-col="{ span: 8 }"
      :wrapper-col="{ span: 16 }"
      class="login-form"
      @finish="onFinish"
      @finishFailed="onFinishFailed"
  >
    <a-form-item
        label="Email"
        name="email"
        :rules="[{ required: true, message: 'Please input your email!' }]"
    >
      <a-input v-model:value="formState.email">
        <template #prefix>
          <UserOutlined class="site-form-item-icon" />
        </template>
      </a-input>
    </a-form-item>

    <a-form-item
        label="Password"
        name="password"
        :rules="[{ required: true, message: 'Please input your password!' }]"
    >
      <a-input-password v-model:value="formState.password">
        <template #prefix>
          <LockOutlined class="site-form-item-icon" />
        </template>
      </a-input-password>
    </a-form-item>

    <a-form-item style="margin-left: 25vh">
      <a-button @click.prevent="login(formState)" :disabled="disabled" type="primary" html-type="submit" class="login-form-button">
        Log in
      </a-button>
      Or
      <router-link :to="{name:'login.registration'}">register now!</router-link>
    </a-form-item>
  </a-form>
</template>
<script setup>
import {UserOutlined, LockOutlined} from '@ant-design/icons-vue';
import { reactive, computed } from 'vue';
import axios from "axios";
import {useRouter} from "vue-router";

const router = useRouter()
const formState = reactive({
  email: '',
  password: '',
  remember: true,
});
const onFinish = values => {
  console.log('Success:', values);
};
const onFinishFailed = errorInfo => {
  console.log('Failed:', errorInfo);
};
const disabled = computed(() => {
  return !(formState.email && formState.password);
});
async function login(formState){
  try {
    const response = await axios.post('http://127.0.0.1:8000/api/auth/login', formState);
    localStorage.setItem('access_token',response.data.access_token)
    await router.push({name:'settings'})
  } catch (error) {
    console.error('Error sending data:', error);
  }
}

</script>
<style scoped>
#components-form-demo-normal-login .login-form {
  max-width: 300px;
}
#components-form-demo-normal-login .login-form-forgot {
  float: right;
}
#components-form-demo-normal-login .login-form-button {
  width: 100%;
}
</style>