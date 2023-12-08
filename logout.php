<?php
    require_once "session.php";
    session_unset();
    header("Location: index.php");
?>