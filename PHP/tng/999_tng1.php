<?php
// 구구단
// **** 2단 ****
// 2 X 1 = 2
// 2 X 2 = 4
// ...

$dan = 9;

// for($i = 2; $i <= $dan; $i++) {
//     echo "**** ".$i."단 ****\n";
//     for($z = 1; $z <= $dan; $z++) {
//         echo $i." X ".$z." = ".($i * $z)."\n";
//     }
// }

// --------------------------------------
// function
// 두수를 더해서 반환하는 함수
// function my_sum(int $num1, int $num2 = 1): int {
//     return $num1 + $num2;
// }

// echo my_sum(1);

// -----------------
// 예외처리
// try {
//     // 처리하고자 하는 로직
//     5 / 0;
// } catch(Throwable $th) {
//     // 예외 발생시 할 처리
//     echo $th->getMessage();
// } finally {
//     // 예외의 발생여부와 상관없이 항상 실행 할 처리
//     echo "파이널리";
// }

// echo "처리끝";

// ----------------
// try {
//     echo "바깥쪽 try\n";
//     5 / 0;

//     try {
//         5 / 0;
//         echo "안쪽 try\n";
//     } catch(Throwable $th) {
//         echo "안쪽 catch\n";
//     }
// } catch(Throwable $th) {
//     echo "바깥쪽 catch\n";
// }

// -------------------
// 강제 예외 발생
// try {
//     throw new Exception("강제예외 발생");

//     echo "try";
// } catch(Throwable $th) {
//     echo $th->getMessage();
// }

// ------------
// 형변환
$num = 1;
var_dump((string)$num);