

<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);

    $sql_addquestion = "INSERT INTO `cauhoi`(`NOIDUNGCAUHOI`, `MUCDO`) 
                        VALUES ('".$_POST['noidungcauhoi']."','".$_POST['mucdo']."')";
    $mysqli -> query($sql_addquestion);

    if ($_SESSION["email"] == "admin") {
        echo "
            <div id='menu-bar'>
                <a href = 'index.php'><button class=\"nut-bam\"> Trang chủ </button></a><br/>
                <a href = 'add_cauhoi.php'><button class=\"nut-bam\"> Thêm câu hỏi</button></a><br/>
                <a href = 'add_dethi.php'><button class=\"nut-bam\"> Thêm đề thi</button></a><br/>
                <a ><button id='welcome' class=\"nut-bam\">Xin chào, ".$_SESSION["email"]."</button></a>
                <a href = 'logout.php'><button id ='welcome' class=\"nut-bam\"> Đăng xuất </button></a><br/>
            </div>";
    } else {
        echo "<div id='menu-bar' style='margin-bottom: 20px;'>
            <a href = 'index.php'><button class=\"nut-bam\"> Trang chủ </button></a><br/>
            <a ><button id='welcome' class=\"nut-bam\">Xin chào, ".$_SESSION["email"]."</button></a>
            <a href = 'logout.php'><button id ='welcome' class=\"nut-bam\"> Đăng xuất </button></a><br/>
        </div>";
    }
    
    $i = 1;
    echo "<form method = 'POST' action = 'save_question.php'>";
    while ( $i <= $_POST["soluongdapan"]){
        echo "<input type ='hidden' name = 'madapan".$i."' value='".$mysqli->insert_id."DA".$i."'>"."</br>";

		echo "<label>Nội dung đáp án: </label>";
		echo "<input type='text' name='noidungdapan".$i."'>"."</br>";

        echo "<label>Điểm đáp án: </label>";
		echo "<input type='number' name='trangthai".$i."'>"."</br>"."</br>"."</br>";

        $i = $i + 1;

    }
    echo "<input type='hidden' name='mach' value='".$mysqli->insert_id."'>";
    echo "<input type='hidden' name='soluongdapan' value='".($i-1)."'>";
    echo "<input type='submit' value='Submit'>";
    echo "</form>";

?>

