<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");

function my_db_conn() {
    $option = [
        PDO::ATTR_EMULATE_PREPARES      => false
        ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
    ];

    return new PDO(MY_MARIADB_DSN, MY_MARIADB_USER, MY_MARIADB_PASSWORD, $option);
}

/**
 * boards select 페이지네이션
 */
function my_boards_select_pagination(PDO $conn, array $arr_param) {
    // SQL
    $sql = 
        " SELECT "
        ."      * "
        ." FROM "
        ."      boards "
        ." WHERE "
        ."      deleted_at IS NULL "
        ." ORDER BY "
        ."      created_at DESC "
        ."      , id DESC "
        ." LIMIT :list_cnt OFFSET :offset "
    ;

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    return $stmt->fetchAll();
}

/**
 * boards 테이블 유효 게시글 총 수 획득
 */
function my_boards_total_count(PDO $conn) {
    $sql =
        " SELECT "
        ."      COUNT(*) cnt "
        ." FROM "
        ."      boards "
        ." WHERE "
        ."      deleted_at IS NULL "
    ;

    $stmt = $conn->query($sql);
    $result = $stmt->fetch();
    
    return $result["cnt"];
}

/**
 * boards 테이블 insert 처리
 */
function my_boards_insert(PDO $conn, array $arr_param) {
    $sql =
        " INSERT INTO boards ( "
        ."      title "
        ."      ,content "
        ." ) "
        ." VALUES ( "
        ."      :title "
        ."      ,:content "
        ." ) "
    ;

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    $result_cnt = $stmt->rowCount();

    if($result_cnt !== 1) {
        throw new Exception("Insert Count 이상");
    }
    
    return true;
}

/**
 * id로 게시글 조회
 */
function my_boards_select_id(PDO $conn, array $arr_param) {
    $sql =
        " SELECT "
        ."      * "
        ." FROM "
        ."      boards "
        ." WHERE "
        ."      id = :id "
    ;

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);
    
    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    return $stmt->fetch();
}

/**
 * boards 테이블 update
 */
function my_boards_update(PDO $conn, array $arr_param) {
    $sql =
        " UPDATE boards "
        ." SET "
        ."      title = :title "
        ."      ,content = :content "
        ."      ,updated_at = NOW() "
        .(isset($arr_param["img"]) ? "      ,img = :img" : "")
        ." WHERE "
        ."      id = :id "
    ;

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    if($stmt->rowCount() !== 1) {
        throw new Exception("Update Count 이상");
    }

    return true;
}


/**
 * boards 테이블 레코드 삭제
 */
function my_boards_delete_id(PDO $conn, array $arr_param) {
    $sql =
        " UPDATE boards "
        ." SET "
        ."      updated_at = NOW() "
        ."      ,deleted_at = NOW() "
        ." WHERE "
        ."      id = :id "
    ;

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }
    if($stmt->rowCount() !== 1) {
        throw new Exception("Delete Count 이상");
    }
    return true;
}