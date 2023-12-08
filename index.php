<?php
    require_once "session.php";
    require_once "database.php";

    error_reporting(E_ERROR | E_PARSE);

?>
<style>
    #menu-bar {
        width: 100%;
        padding: 1 em !important;
        display: flex;
        backgrond-color: rgb(202, 7, 7);
    }

    #menu-bar #welcome {
        background: rgb(219, 210, 200) !important;
    }
</style>
<html>
<head>
    <meta charset="UTF-8">
    <title>Demo đề thi</title>
    <link rel="stylesheet" href="Css/style.css" />
</head>
<body>
    <?php 
        
        if (!isset($_SESSION["email"])) 
            echo "
            <div>
                <a href = 'login.php'><button class = \"nut-bam\">Đăng nhập</button></a>
                <a href = 'signup.php'><button class = \"nut-bam\">Đăng kí</button></a>
            </div>";
        else{
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

                $sql_dethi = sprintf("SELECT * from `dethi`");
                $result = $mysqli -> query($sql_dethi);
                
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                            echo "<div style='margin: 0.5em; border: 1px solid red; border-radius: 1em; padding-top: 0.5em;width: max-content;'><form method = 'GET' action = 'exam.php'>";
                            echo "Tên đề thi: " . $row["tendethi"]."<br>";
                            echo "Ghi chú: " . $row["ghichu"]."<br>";
                            echo "<input type='hidden' value='".$row["iddethi"]."' name='iddethi'>";
                            echo "<button type = 'submit'>Làm bài</button>";
                            echo "<br>";
                            echo "</form></div>";
                    }
                }
            }

            
        }  
    ?>

    
</body>
</html>