<template>
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
        name="name"
        :rules="[{ required: true, message: 'Please input your name!' }]"
    >
      <a-input v-model:value="formState.name" />
    </a-form-item>

    <a-form-item
        label="Email"
        name="email"
        :rules="[{ required: true, message: 'Please input your email!' }]"
    >
      <a-input v-model:value="formState.email" />
    </a-form-item>

    <a-form-item
        label="Password"
        name="password"
        :rules="[{ required: true, message: 'Please input your password!' }]"
    >
      <a-input-password v-model:value="formState.password" />
    </a-form-item>

    <a-form-item
        label="Confirm password"
        name="password_confirmation"
        :rules="[{ required: true, message: 'Please confirm your password!' }]"
    >
      <a-input-password v-model:value="formState.password_confirmation" />
    </a-form-item>

    <a-form-item name="remember" :wrapper-col="{ offset: 8, span: 16 }">
      <a-checkbox v-model:checked="formState.remember">Remember me</a-checkbox>
    </a-form-item>

    <a-form-item :wrapper-col="{ offset: 8, span: 16 }">
      <a-button @click.prevent="sendDataToServer(formState)" :disabled="disabled" type="primary" html-type="submit" class="login-form-button">
        Registr
      </a-button>
    </a-form-item>
  </a-form>
</template>
<script lang="ts" setup>
import {computed, reactive} from 'vue';
import axios from 'axios'
interface FormState {
  email: string;
  name: string;
  password: string;
  password_confirmation: string;
  remember: boolean;
}

const formState = reactive<FormState>({
  email: '',
  name: '',
  password: '',
  password_confirmation: '',
  remember: true,
});
const onFinish = (values: any) => {
  console.log('Success:', values);
};

const onFinishFailed = (errorInfo: any) => {
  console.log('Failed:', errorInfo);
};
const disabled = computed(() => {
  return !(formState.email && formState.password && formState.password_confirmation && formState.name);
});
async function sendDataToServer(formState: FormState): Promise<void> {
  try {
    const response = await axios.post('http://127.0.0.1:8000/api/users', formState);
    console.log('Data sent successfully:', response.data);
  } catch (error) {
    console.error('Error sending data:', error);
  }
}
</script>
<style scoped lang="css">
body{
  width: 50%;
}
</style>
