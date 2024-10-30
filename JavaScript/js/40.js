function inlineEventBtn() {
    alert('무한루프');
}


function changeTitle() {
    const TITLE = document.querySelector('h1');
    TITLE.classList.add('title-click');
}

// addEventListener()
const BTN_LISTENER = document.querySelector('#btn1');
BTN_LISTENER.addEventListener('click', callAlert);

// removeEventListener() 
BTN_LISTENER.removeEventListener('click', callAlert);

function callAlert() {
    alert('이벤트 리스너 실행');
}

const BTN_TOGGLE = document.querySelector('#btn_toggle');
BTN_TOGGLE.addEventListener('click', () => {
    const TITLE = document.querySelector('h1');
    TITLE.classList.toggle('title-click');
});

// --------------
const H2 = document.querySelector('h2');
H2.addEventListener('click', testyong);

function testyong() {
    alert('테스트용');
    // H2.removeEventListener('click', testyong);
}

const TITLE = document.querySelector('h1');
TITLE.addEventListener(
    'mouseenter'
    , () => {
        H2.removeEventListener('click', testyong);
        console.log('tt');
    }
    ,{once: true} // option : once가 true일 경우 한번만 실행
);

// 이벤트 객체
const H3 = document.querySelector('h3');
H3.addEventListener('mouseup', (e) => {
    e.target.style.color = 'red';
});
H3.addEventListener('mousedown', (e) => {
    e.target.style.color = 'green';
});
H3.addEventListener('mouseenter', e => {
    e.target.style.color = 'blue';
});
H3.addEventListener('mouseleave', e => {
    e.target.style.color = 'orange';
});

// 모달
const BTN_MODAL = document.querySelector('#btn_modal');
BTN_MODAL.addEventListener('click', () => {
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.remove('display-none');
});
const MODAL_CLOSE = document.querySelector('#modal_close');
MODAL_CLOSE.addEventListener('click', () => {
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.add('display-none');
});

// 팝업
const NAVER = document.querySelector('#naver');
NAVER.addEventListener('click', () => {
    open('https://www.naver.com', '_blank', 'top=0 width=500 height=500');
    open('https://www.google.com', '_blank', 'top=200 left=500 width=500 height=500');
    open('https://www.daum.net', '_blank', 'top=500 left=1000 width=500 height=500');
});