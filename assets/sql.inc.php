<?php
session_start();

try {
    $db = new PDO("mysql:host=localhost;dbname=yourdbname;charset=utf8mb4", "root", "");
} catch (\Throwable $th) {
    /**
     * 顯示錯誤，記得註解關掉
     */
    echo "資料庫連線時發生錯誤：" . $th->getMessage();
}