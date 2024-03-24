<template>
  <a-layout style="min-height: 100vh">
    <a-layout-sider v-model:collapsed="collapsed" collapsible>
      <div class="logo"/>
      <a-menu v-model:selectedKeys="selectedKeys" theme="dark" mode="inline">
        <a-menu-item key="1">
          <ClockCircleOutlined/>
          <router-link :to="{name: 'button'}"><span>Button</span></router-link>
        </a-menu-item>
        <a-menu-item key="2">
          <SettingOutlined/>
          <router-link :to="{name: 'settings'}"><span>Settings</span></router-link>
        </a-menu-item>
      </a-menu>
    </a-layout-sider>
    <a-layout style="background-image: url('src/assets/images/1660127783_12-kartinkin-net-p-oboi-kotiki-multyashnie-krasivo-12.jpg');
background-size: cover;">
      <div style="display: flex; flex-direction: row; justify-content: center;
  align-items: start; height: 10vh; position: relative;">
      <div style="display: flex; flex-direction: row; justify-content: end; align-items: start; height: 10vh;">
        <div style="color: #49c5b6">
          <b id="currentTime"></b>
        </div>
        <div style="color: #49c5b6; margin-left: 10%">
          <b id="currentDay"></b>
        </div>
      </div>
      </div>
      <router-view></router-view>
    </a-layout>
  </a-layout>
</template>
<script lang="ts" setup>
import {ClockCircleOutlined, SettingOutlined} from '@ant-design/icons-vue';
import {ref} from 'vue';

const collapsed = ref<boolean>(false);
const selectedKeys = ref<string[]>(['1']);

function updateDateTime() {
  const currentTimeElement = document.getElementById('currentTime');
  const currentDayElement = document.getElementById('currentDay');

  if (currentTimeElement && currentDayElement) {
    const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const now = new Date();

    currentTimeElement.textContent = now.toLocaleTimeString();
    currentDayElement.textContent = days[now.getDay()];
  }
}

updateDateTime();
setInterval(updateDateTime, 1000);
</script>

<style scoped>
#components-layout-demo-side .logo {
  height: 32px;
  margin: 16px;
  background: rgba(0, 0, 0, 0);
}

.site-layout .site-layout-background {
  background: #fff;
}

[data-theme='dark'] .site-layout .site-layout-background {
  background: #141414;
}
</style>