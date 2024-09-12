<?php

// 두수를 전달해주면 합을 반환해주는 함수
// 함수 정의

/**
 * 두 수를 더해서 반환
 */
function my_sum($num1, $num2) {
    return $num1 + $num2;
}

my_sum(3, 5); // 함수 호출

time();


// 두수를 받아서 -, *, /, %의 결과를 리턴하는 함수를 만들어 주세요.
function my_sub($a, $b) {
    return $a - $b;
}
echo my_sub(5, 3);

function my_multi($a, $b) {
    return $a * $b;
}
echo my_multi(5, 3);

function my_div($a, $b) {
    return $a / $b;
}
echo my_div(5, 3);

function my_remind($a, $b) {
    return $a % $b;
}
echo my_remind(5, 3);
echo "\n\n";
// ----------------------
// 가변 길이 아규먼트

// 전달되는 모든 숫자를 더해서 반환
// // ... 을 이용하는 방법 (**주의 : php5.6 이상에서 사용가능)
function my_sum_all(...$numbers) {
    $sum = 0;

    foreach($numbers as $val) {
        $sum += $val;
    }

    return $sum;

    // return array_sum($numbers);
}

// 5.5버전 이하일때 가변 길이 아규먼트 사용법
// function my_sum_all() {
//     $numbers = func_get_args();

//     return array_sum($numbers);
// }

echo my_sum_all(4, 5);

// 일반 파라미터와 가변 파라미터를 같이 쓸경우
function test($param_str, ...$arr_str) {
    $str = "";
    foreach($arr_str as $val) {
        $str .= $val;
    }
    $str .= $param_str;
    echo $str;
}
test("젤뒤", "a", "B", "c");

