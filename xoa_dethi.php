<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);

    $sql_save = "DELETE FROM `dethi` WHERE `iddethi`=".$_GET['iddethi'];
    $mysqli -> query($sql_save);

    $sql_save2 = "DELETE FROM `dethi-cauhoi` WHERE `iddethi`=".$_GET['iddethi'];
    $mysqli -> query($sql_save2);

    echo "<script>alert('Cập nhật thành công');window.location.href = 'add_dethi.php';</script>";
?>