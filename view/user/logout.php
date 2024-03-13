<?php
session_start();
unset($_SESSION['user_kh']);
header("location: index.php?act=home");
die;