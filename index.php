<?php
include('assets/_header.php'); 

if ($_SESSION['alert']) {
    echo '
    <script>
    Swal.fire({
        title: "通知",
        text: "'.$_SESSION['alert']['message'].'",
        icon: "'.$_SESSION['alert']['status'].'",
    });
    </script>';
    unset($_SESSION['alert']);
}

if ($link == 'logout') {
    unset($_SESSION['username']);
    unset($_SESSION['id']);
    session_destroy();

    $_SESSION['alert']['message'] = '登出成功';
    $_SESSION['alert']['status'] = 'success';
    Header('Location: ../');
}

if (!$_SESSION['username']) {
    if (!$link || $link == 'login') {
        include('assets/login.html');
    } else if ($link == 'register') {
        include('assets/register.html');
    } else {
        include('assets/404.html');
    }
} else {
    echo '
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="empty">
                <div class="empty-header">200</div>
                <p class="empty-title">恭喜你來到這了, '.$_SESSION['username'].'</p>
                <p class="empty-subtitle">
                    這樣會了沒 : ) ?
                </p>
                <div class="empty-action">
                    <a href="../logout" class="btn btn-primary">
                    <!-- Download SVG icon from http://tabler-icons.io/i/arrow-left -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l14 0" />
                        <path d="M5 12l6 6" />
                        <path d="M5 12l6 -6" />
                    </svg>
                    登出重來
                    </a>
                </div>
            </div>
        </div>
    </div>
    ';
}

include('assets/_footer.php'); 
?>