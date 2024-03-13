<?php
session_start();
include "../../dao/pdo.php";
include "../../dao/users.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'login':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user_id = $_POST['user_id'];
                $user_password = $_POST['user_password'];
                $check_user = check_user($user_id, $user_password);
                // chuan bi
                if ($user_id == "") {
                    $errors['user_id'] = "Username không được để trống";
                }
                if ($user_password == "") {
                    $errors['user_password'] = "Password không được để trống";
                }
                if (!isset($errors)) {
                    if (is_array($check_user)) {
                        extract($check_user);
                        $_SESSION['user_kh'] = $check_user;
                        $thongbao = "Đăng nhập thành công";
                        if (isset($thongbao)) {
                            echo '<script type="text/javascript">
              
              window.onload = function () { alert("' . $thongbao . '"); }
                    </script>';
                        }
                        header("location: http://localhost/cozastore/view/index.php?act=home");
                    } else {
                        $thongbao = "Tài khoản không tồn tại";
                        include 'login.php';
                    }
                } else {
                    include 'login.php';
                }
            }
            if (isset($thongbao)) {
                echo '<script type="text/javascript">
              
              window.onload = function () { alert("' . $thongbao . '"); }
              </script>';
            }
            break;
        case "signup":
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user_id = $_POST['user_id'];
                $user_password = $_POST['user_password'];
                $user_password1 = $_POST['user_password1'];
                // chuan bi
                if ($user_id == "") {
                    $errors['user_id'] = "Username không được để trống";
                }
                if ($user_password == "") {
                    $errors['user_password'] = "Password không được để trống";
                }
                if ($user_password1 == "") {
                    $errors['user_password1'] = "Password nhập lại không đúng";
                }
                if (!isset($errors)) {
                     user_insert($user_id, "", "", $user_password, "", 0, "", "");
                        $thongbao = "Đăng ký thành công. Vui lòng đăng nhập";
                        if (isset($thongbao)) {
                            echo '<script type="text/javascript">
              
              window.onload = function () { alert("' . $thongbao . '"); }
                    </script>';
                        }
                        include 'login.php';
                } else {
                    include 'signup.php';
                }
            }
            if (isset($thongbao)) {
                echo '<script type="text/javascript">
              
              window.onload = function () { alert("' . $thongbao . '"); }
              </script>';
            }
            break;
            case "home":
                header("location: http://localhost/cozastore/view/index.php?act=home");
                break;
        default:
            include 'login.php';
    }
} else {
    include "login.php";
}
