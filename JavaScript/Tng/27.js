// 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];
let copyArr1 = [...ARR1];
copyArr1.sort((a, b) => a - b);
// 1. forEach(), includes() 이용 중복제거
let duplicationArr = [];
copyArr1.forEach(val => {
    if(!duplicationArr.includes(val)) {
        duplicationArr.push(val);
    }
});
// 2. filter(), indexOf() 이용 중복제거
// [3, 3, 5, 5, 6, 7, 8, 40, 80, 92, 100]
let duplicationArr2 = copyArr1.filter((val, idx) => {
    return copyArr1.indexOf(val) === idx;
});
// 3. Set 객체 중복제거
let duplicationArr3 = Array.from(new Set(copyArr1));

// ---------------------------------

// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요.
const ARR2 = [5, 7, 3, 4, 5, 1, 2];

const ODD = ARR2.filter(num => num % 2 !== 0);
const EVEN = ARR2.filter(num => num % 2 === 0);

const ODD2 = [];
const EVEN2 = [];

ARR2.forEach(val => {
    if(val % 2 === 0) {
        if(!EVEN2.includes(val)) {
            EVEN2.push(val);
        }
    } else {
        if(!ODD2.includes(val)) {
            ODD2.push(val);
        }
    }
});