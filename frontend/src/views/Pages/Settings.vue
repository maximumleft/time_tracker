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
      <a-input v-model:value="formState.username" />
    </a-form-item>

    <a-form-item
        label="Email"
        name="email"
        :rules="[{ message: 'Please input your email!' }]"
    >
      <a-input v-model:value="formState.email" />
    </a-form-item>

    <a-form-item
        label="Password"
        name="password"
        :rules="[{ message: 'Please input your password!' }]"
    >
      <a-input-password v-model:value="formState.password" />
    </a-form-item>

    <a-form-item :wrapper-col="{ offset: 8, span: 16 }" style="margin-left: 30%">
      <a-button :disabled="disabled" type="primary" html-type="submit" class="login-form-button">
        Update
      </a-button>
    </a-form-item>
  </a-form>
  </div>

</template>
<script lang="ts" setup>
import {computed, reactive} from 'vue';

interface FormState {
  email: string;
  username: string;
  password: string;
}

const formState = reactive<FormState>({
  email: 'qqq',
  username: 'www',
  password: 'eee',
});
const onFinish = (values: any) => {
  console.log('Success:', values);
};

const onFinishFailed = (errorInfo: any) => {
  console.log('Failed:', errorInfo);
};
const disabled = computed(() => {
  return !(formState.email && formState.password && formState.username);
});
</script>
<style scoped lang="css">
body{
  width: 50%;
}
</style>
