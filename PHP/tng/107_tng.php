<?php

// 나의 급여를 2500만원으로 변경해주세요.

require_once("../Ex/my_db.php");

$conn = null;

try {
    $conn = my_db_conn();

    // transaction 시작
    $conn->beginTransaction();

    // ---------------
    // 기존 급여 수정
    $sql =
        " UPDATE salaries "
        ." SET "
        ."      end_at = DATE(NOW()) "
        ."      ,updated_at = NOW() "
        ." WHERE "
        ."      emp_id = :emp_id "
        ."  AND end_at IS NULL "
    ;
    $arr_prepare = [
        "emp_id" => 100015
    ];

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);

    if(!$result_flg) {
        throw new Exception("Update exec Error : salaries");
    }

    if($stmt->rowCount() !== 1) {
        throw new Exception("Update Row Count Error : salaries");
    }

    // --------------
    // 새로운 급여 이력 추가
    $sql =
    " INSERT INTO salaries( "
    ."      emp_id "
    ."      ,salary "
    ."      ,start_at "
    ." ) "
    ." VALUES( "
    ."      :emp_id "
    ."      ,:salary "
    ."      ,DATE(NOW()) "
    ." ) "
    ;
    $arr_prepare = [
        "emp_id" => 100015
        ,"salary" => 25000000
    ];

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);

    if(!$result_flg) {
        throw new Exception("Insert exec Error : salaries");
    }

    if($stmt->rowCount() !== 1) {
        throw new Exception("Insert Row Count Error : salaries");
    }

    // commit
    $conn->commit();
} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}
