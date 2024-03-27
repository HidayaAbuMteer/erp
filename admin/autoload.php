<?php

/**
 * AUTO LOAD WITH HEADER
 */

include_once 'includes/config.php';

include_once 'includes/functions.php';

include_once 'includes/csrf.php';
$csrf = new CSRF_Protect('_csrf', "Admin_User"); // Change "Public_Users" to any name

if(!login_check_admin()){
    echo '<meta http-equiv="refresh" content ="0; url=auth/login"/>';
    die();
}

include_once 'header.php';
