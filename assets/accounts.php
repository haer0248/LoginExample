<?php

include('sql.inc.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") { // 只接受 POST
    try {
        $username = $_POST['username'];
        $password = $_POST['password'];
        switch ($_POST['action']) {
            case 'login':
                if (!$_POST['username']) throw new Exception("使用者名稱必填", 1);
                if (!$_POST['password']) throw new Exception("密碼必填", 1);

                /**
                 * 從資料庫撈資料
                 */
                $result = $db->query("SELECT * FROM `account` WHERE `username` = '{$username}'")->fetch();
                if (password_verify($password, $result['password'])) { // 密碼驗證
                    $_SESSION['id'] = $result['No'];
                    $_SESSION['username'] = $result['username'];

                    throw new Exception("帳號登入成功", 0);
                } else {
                    throw new Exception("登入失敗，帳號或密碼錯誤", 1);
                }

                break;
            case 'register':
                if (!$_POST['username']) throw new Exception("使用者名稱必填", 1);
                if (!$_POST['password']) throw new Exception("密碼必填", 1);

                /**
                 * 從資料庫撈資料，因為是註冊，要先確定沒有人註冊這個帳號
                 */
                $result = $db->query("SELECT * FROM `account` WHERE `username` = '{$username}'")->fetch();
                if ($result['No']) {
                    throw new Exception("註冊失敗，帳號已存在", 1);
                } else {
                    /**
                     * 建立 hash 密碼
                     */
                    $hash = password_hash($password, PASSWORD_DEFAULT );
                    /**
                     * 將資料存入 database
                     */
                    if ($db->query("INSERT INTO `account`(`username`, `password`) VALUES ('{$username}', '{$hash}')")) {
                        throw new Exception("帳號建立成功", 0);
                    }
                }

                break;

            default:
                throw new Exception("傳輸資料錯誤", 1);
                break;
        }
    } catch (\Throwable $th) {
        $return['status'] = 'error';
        if ($th->getCode() == 0) {
            $return['status'] = 'success';
            $return['message'] = $th->getMessage();
        } else if ($th->getCode() == 1) {
            $return['message'] = '錯誤：' . $th->getMessage();
        } else {
            $return['message'] = '處理帳號驗證時發生錯誤';
            $return['info'] = $th->getMessage();
        }
    }
} else {
    $return['status'] = 'error';
    $return['message'] = '傳輸方式錯誤';
}
/**
 * 存入提示
 */
$_SESSION['alert'] = $return;

/**
 * 導回首頁
 */

 Header('Location: ../');