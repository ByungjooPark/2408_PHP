// 타이머 함수
// -------------------

// setTimeout(callback, ms) : 일정 시간이 흐른 후에 콜백 함수를 실행
// setTimeout(() => {
//     console.log('시간초과');
// }, 5000);

// C > B > A 순으로 출력, 총 3초 소요
// setTimeout(() => console.log('A'), 3000);
// setTimeout(() => console.log('B'), 2000);
// setTimeout(() => console.log('C'), 1000);

// A > B > C 순으로 출력, 총 6초 소요
// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000);
// 콜백 지옥
// 비동기 처리를 동기 처리 처럼 만들기위해서 위처럼 콜백 지옥 현상이 생긴다.

// clearTimeout(타이머ID) : 해당 타이머ID의 처리를 제거
const TIMER_ID = setTimeout(() => console.log('타이머'), 10000);
console.log(TIMER_ID);
clearTimeout(TIMER_ID);


// setInterval(callback, ms) : 일정 시간 마다 콜백함수를 실행
// const INTERVAL_ID = setInterval(() => {
//     console.log('인터벌');
// }, 1000);

// clearInterval(id) : 해당 id의 인터벌을 제거
// clearInterval(INTERVAL_ID);
// setTimeout(() => clearInterval(INTERVAL_ID), 10000);

(() => {
    const H1 = document.createElement('h1');
    H1.textContent = '두둥등장';
    H1.classList.add('blue');
    H1.style.fontSize = '5rem';

    document.body.appendChild(H1);
})();

setInterval(() => {
    const H1 = document.querySelector('h1');
    H1.classList.toggle('blue');
    H1.classList.toggle('red');
}, 200);


const KAMOKI1 = '( • ᴗ • )';
const KAMOKI2 = '( • ᴗ - )<span style="color: yellow;"> ✧</span>';

(()=>{
    const P = document.createElement('P');
    P.innerHTML = KAMOKI1;
    P.style.fontSize = '5rem';
    document.body.appendChild(P);
})();
setInterval(() => {
    const P = document.querySelector('P');
    if(P.innerHTML === KAMOKI1) {
        P.innerHTML = KAMOKI2;
    } else {
        P.innerHTML = KAMOKI1;
    }
}, 500);
