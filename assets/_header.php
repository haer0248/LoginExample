<?php 
require 'assets/sql.inc.php';

/**
 * 取得使用者目前網址
 */
$getNowUrl = explode('?', urldecode($_SERVER['REQUEST_URI']));
$getNowUrlWithoutQuery = explode('/', urldecode($getNowUrl[0]));
$link = str_replace('/', '', @$getNowUrlWithoutQuery[1]);
$link2 = str_replace('/', '', @$getNowUrlWithoutQuery[2]);
$link3 = str_replace('/', '', @$getNowUrlWithoutQuery[3]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Example</title>
    <link rel="stylesheet" href="https://cdn.haer0248.me/tabler-b10.min.css">
    <link rel="stylesheet" href="https://dash.mc-list.xyz/assets/@sweetalert2/theme-dark/dark.min.css">
    <script src="https://dash.mc-list.xyz/assets/@sweetalert2/script.min.js"></script>
</head>
<body class="theme-dark">
    