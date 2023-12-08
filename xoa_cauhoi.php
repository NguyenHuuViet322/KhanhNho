<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);

    $sql_save = "DELETE FROM `cauhoi` WHERE `MACAUHOI`=".$_GET['MACH'];
    $mysqli -> query($sql_save);

    $sql_save2 = "DELETE FROM `cauhoi-dapan` WHERE `MACAUHOI`=".$_GET['MACH'];
    $mysqli -> query($sql_save2);

    echo "<script>alert('Cập nhật thành công');window.location.href = 'add_cauhoi.php';</script>";
?>