<?php
// 가위 바위 보 게임
// 게임 실행 시 "가위", "바위", "보" 중 하나를 입력
// 컴퓨터는 랜덤으로 "가위", "바위", "보" 중 하나를 출력
// 결과를 출력
//      유저 : 가위
//      컴퓨터 : 바위
//      졌습니다. or 이겼습니다.
// ---------------------------------------------------------------------------

define("ARR_BASE", ["scissors", "rock", "paper"]);// 베이스 배열
define("INFO_MESSAGE", "%s 중 하나를 입력해 주세요.\n"); // 안내 메세지 포맷
define("RESULT_MESSAGE", "유저 : %s\n컴퓨터 : %s\n%s"); // 출력 메세지 포맷
define("WIN_MESSAGE", "이겼습니다."); // 출력 메세지 포맷
define("LOSE_MESSAGE", "졌습니다."); // 출력 메세지 포맷
define("DRAW_MESSAGE", "비겼습니다."); // 출력 메세지 포맷
$answer = ""; // 결과 메세지 저장용

// 안내 메세지, 유저에게 입력값 제시
echo sprintf(INFO_MESSAGE, implode(", ", ARR_BASE));

fscanf(STDIN, "%s\n", $input);
$user = trim($input); // 유저, 입력값 좌우 공백 제거
$com = ARR_BASE[array_rand(ARR_BASE)]; // 컴퓨터, 랜덤 획득

if($user === ARR_BASE[0]) { // 유저가 가위일 경우
    if($com === ARR_BASE[0]) {
        // 가위 vs 가위
        $answer = DRAW_MESSAGE;
    } else if($com === ARR_BASE[1]) {
        // 가위 vs 바위
        $answer = LOSE_MESSAGE;
    } else {
        // 가위 vs 보
        $answer = WIN_MESSAGE;
    }
} else if($user === ARR_BASE[1]) { // 유저가 바위일 경우
    if($com === ARR_BASE[0]) {
        // 바위 vs 가위
        $answer = WIN_MESSAGE;
    } else if($com === ARR_BASE[1]) {
        // 바위 vs 바위
        $answer = DRAW_MESSAGE;
    } else {
        // 바위 vs 보
        $answer = LOSE_MESSAGE;
    }
} else { // 유저가 보일 경우
    if($com === ARR_BASE[0]) {
        // 보 vs 가위
        $answer = LOSE_MESSAGE;
    } else if($com === ARR_BASE[1]) {
        // 보 vs 바위
        $answer = WIN_MESSAGE;
    } else {
        // 보 vs 보
        $answer = DRAW_MESSAGE;
    }
}

// 결과 출력
echo sprintf(RESULT_MESSAGE, $user, $com, $answer);