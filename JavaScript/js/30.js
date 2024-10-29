// ------------
// Date 객체
// ------------
const dayToKorean = day => {
    const ARR_DAY = ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'];
    return ARR_DAY[day];
    // switch(day) {
    //     case 0:
    //         return '일요일';
    //     case 1:
    //         return '월요일';
    //     case 2:
    //         return '화요일';
    //     case 3:
    //         return '수요일';
    //     case 4:
    //         return '목요일';
    //     case 5:
    //         return '금요일';
    //     default:
    //         return '토요일';
    // }
}

const addLpadZero = (num, length) => {
    return String(num).padStart(length, '0');
}

// 현재 날짜 및 시간 획득
const NOW = new Date();

// getFullYear() : 연도만 가져오는 메소드(yyyy)
const YEAR = NOW.getFullYear();

// getMonth() : 월을 가져오는 메소드, 0 ~ 11 반환
// const MONTH = String(NOW.getMonth() + 1).padStart(2, '0');
const MONTH = addLpadZero(NOW.getMonth() + 1, 2);

// getDate() : 일을 가져오는 메소드
const DATE = addLpadZero(NOW.getDate(), 2);

// getHours() : 시를 가져오는 메소드
const HOUR = addLpadZero(NOW.getHours(), 2);

// getMinutes() : 분을 가져오는 메소드
const MINUTES = addLpadZero(NOW.getMinutes(), 2);

// getSeconds() : 초를 가져오는 메소드
const SECOND = addLpadZero(NOW.getSeconds(), 2);

// getMilliseconds() : 미리초를 가져오는 메소드
const MILLISECONDS = addLpadZero(NOW.getMilliseconds(), 3);

// getDay() : 요일을 가져오는 메소드, 0(일) ~ 6(토) 리턴
const DAY = NOW.getDay();

const FOMAT_DATE = `${YEAR}-${MONTH}-${DATE} ${HOUR}:${MINUTES}:${SECOND}.${MILLISECONDS}, ${dayToKorean(DAY)}`;
console.log(FOMAT_DATE);

// getTime() : UNIX Timestamp를 반환 (미리초 단위)
console.log(NOW.getTime());

// 두 날짜의 차를 구하는 방법 
const TAGET_DATE = new Date('2025-03-13 18:10:00');
const DIFF_DATE = Math.floor(Math.abs(NOW - TAGET_DATE) / 86400000);
// 1000 * 60 * 60 * 24 = 86400000 (일 단위)


// 2024-01-01 13:00:00과 2025-05-30 00:00:00은 몇개월 후 입니까?
const TAGET_DATE2 = new Date('2024-01-01 13:00:00');
const TAGET_DATE3 = new Date('2025-05-30 00:00:00');
const DIFF_DATE2 = Math.floor(Math.abs(TAGET_DATE2 - TAGET_DATE3) / (1000 * 60 * 60 * 24 * 30));