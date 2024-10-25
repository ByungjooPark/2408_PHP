// -----------
// 함수 선언식
// 호이스팅에 영향받는다.
// 재할당 가능하므로 함수명 중복 안되게 조심해야 함
// -----------
console.log(mySum(4, 5));

function mySum(a, b) {
    return a + b;    
}

// function mySum(a, b, c) {
//     return a + b + c;
// }

// --------------
// 함수 표현식
// 호이스팅에 영향을 받지 않는다.
// 재할당을 방지
// --------------

// console.log(myPlus(4, 5));

const myPlus = function(a, b) {
    return a + b;
}

// --------------
// 화살표 함수
// --------------
// 파라미터 2개 이상일 경우 (소괄호 생략 불가)
const arrowFnc = (a, b) => a + b;
function test1(a, b) {
    return a + b;
}

// 파라미터가 1개일 경우 (소괄호 생략 가능)
const arrowFnc2 = a => a;
function test2(a) {
    return a;
}

// 파라미터가 없는 경우 (소괄호 생략 불가)
const arrowFnc3 = () => 'test';
function test3() {
    return 'test';
}

// 처리가 여러줄일 경우
const arrowFnc4 = (a, b) => {
    if(a < b) {
        return 'b가 더 큼';
    } else {
        return 'a가 더 큼';
    }
}
function test4(a, b) {
    if(a < b) {
        return 'b가 더 큼';
    } else {
        return 'a가 더 큼';
    }
}


// ---------------
// 즉시실행 함수
// ---------------
const execFnc = (function(a, b) {
    return a + b;
})(5, 6);

// ----------------
// 콜백 함수
// 다른 함수의 파라미터로 전달되어 특정 조건에 따라 호출되는 함수
// ----------------
function myCallBack() {
    console.log('myCallBack');
}

function myChkPrint(callBack, flg) {
    if(flg) {
        callBack();
    }
}

myChkPrint(myCallBack, true);

myChkPrint(() => 'ttt', true);