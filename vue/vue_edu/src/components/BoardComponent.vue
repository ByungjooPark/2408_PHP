<template>
    <h1 @click="addCnt">{{ cnt }}</h1>
    <hr>
    <input type="text" v-model="tel">
    <span :style="color">{{ msg }}</span>
</template>
<script setup>
import { ref, watch } from 'vue';

// Watchers
const tel = ref('');
const msg = ref('X');
const color = ref('color: red;');

watch(tel, (val) => {
    const regex = /^[0-9]{10,11}$/;
    if(!regex.test(val)) {
        msg.value = 'X';
        color.value = 'color: red;';
    } else {
        msg.value = 'O';
        color.value = 'color: green;';
    }
});

// ---------------
const cnt = ref(0);

const addCnt = () => {
    cnt.value++;
}
</script>
<style>
    
</style>