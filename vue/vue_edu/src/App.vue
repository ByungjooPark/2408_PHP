<template>
  <!-- Component Event -->
  <p>부모쪽 cnt : {{ cnt }}</p>
  
  <EventComponent
    :cnt = "cnt"
    @eventAddCnt = "addCnt"
    @eventAddCntParam = "addCntParam"
    @eventResetCnt = "resetCnt"
  />

  <hr>
  <!-- Props -->
  <ChildComponent
    :data = "data"
    :count = "cnt"
  >
    <!-- slot -->
    <h3>부모쪽에서 작성한 것들</h3>
    <p>아아아아아 {{ cnt }}</p>
  </ChildComponent>
  

  <hr>
  <!-- 자식 컴포넌트 호출 -->
  <BoardComponent />

  <hr>
  <!-- 리스트 랜더링 -->
  <!-- v-for -->
  <!-- 단순 반복 -->
  <div v-for="val in 5" :key="val">
    <p>{{ val }}</p>
  </div>
  <!-- 구구단 -->
  <!-- <div v-for="dan in 9" :key="dan">
    <span>{{ `${dan} 단` }}</span>
    <div v-for="val in 9" :key="val">
      <span>{{ `${dan} * ${val} = ${(dan * val)}` }}</span>
    </div>
  </div> -->

  <div v-for="(item, key) in data" :key="item">
    <p>{{ `${key}번째 ${item.name} - ${item.age} - ${item.gender}` }}</p>
  </div>

  <!-- 조건부 랜더링 -->
  <!-- v-if -->
  <h1 v-if="cnt === 7">럭키비키자나☆</h1>
  <h1 v-else-if="cnt >= 5">5보다 이상입니다.</h1>
  <h1 v-else-if="cnt < 0">음수입니다.</h1>
  <h1 v-else>나머지</h1>

  <!-- v-show -->
  <h1 v-show="flgShow">브이 쇼</h1>
  <button @click="flgShow = !flgShow">브이쇼 토글</button>

  <h1>{{ cnt }}</h1>
  <button @click="addCnt">증가</button>
  <button @click="disCnt">감소</button>
  <hr>
  <h2>이름 : {{ userInfo.name }}</h2>
  <h2 :class="ageColor">나이 : {{ userInfo.age }}</h2>
  <h2>성별 : {{ userInfo.gender }}</h2>
  <button @click="changeName">이름 변경</button>
  <button @click="changeAgeBlue">나이 파란색으로</button>
  <hr>
  <input type="text" v-model="transgender">
  <button @click="userInfo.gender = transgender">성별 변경</button>
  <p>{{ transgender }}</p>
  <hr>
</template>

<script setup>
import BoardComponent from './components/BoardComponent.vue';
import ChildComponent from './components/ChildComponent.vue';
import EventComponent from './components/EventComponent.vue';
import { reactive, ref } from 'vue';

const data = reactive([
    {name: '홍길동', age: 20, gender: '남자'}
    ,{name: '김영희', age: 12, gender: '여자'}
    ,{name: '둘리', age: 41, gender: '수컷'}
]);

// -----------------------
const flgShow = ref(true);

const transgender = ref('');

// -------------------

const ageColor = ref('');

function changeAgeBlue() {
  ageColor.value = 'blue';
}

// ------ reactive -------
const userInfo = reactive({
  name: '홍길동'
  ,age: 20
  ,gender: 'undefind'
});

function changeName() {
  userInfo.name = '갑순이';
}

// ----- ref -----
const cnt = ref(0);

function addCnt() {
  cnt.value++;
}
function disCnt() {
  cnt.value--;
}
function addCntParam(num) {
  cnt.value += num;
}
function resetCnt() {
  cnt.value = 0;
}

</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

.blue {
  color: #0000ff;
}
</style>
