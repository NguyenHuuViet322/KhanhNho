<?php
    require_once "database.php";
    require_once "session.php";

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
    
    error_reporting(E_ERROR | E_PARSE);
    $sum = 0;  
    if (isset($_POST['nopbai'])){
        for($i = 1; $i <= $_POST['soluong']; $i++) {
            $sql_dapan = "SELECT * FROM  `cauhoi` 
                        natural join `cauhoi-dapan` 
                        natural join `dapan`  WHERE `MACAUHOI` = '".$_POST["ch".$i]."'";
            $result_dapan = $mysqli->query($sql_dapan);
            $diemCau=0;
            if (mysqli_num_rows($result_dapan) > 0) {
                while($row_dapan = mysqli_fetch_assoc($result_dapan)) {
                    if ($_POST[$row_dapan['MADA']]) {
                        if($row_dapan["TRANGTHAI"] > 0){
                            $diemCau+=$row_dapan["TRANGTHAI"];
                        } else {
                            $diemCau = -99999;
                        }
                    }
                }
            }
            if ($diemCau < 0) $diemCau = 0;
            $sum+= $diemCau;
        }
        echo $sum;echo "/".$_POST['tongdiem']." Điểm";
        echo "<a href='index.php'><button>Về trang chủ</button></a>";
    } else {
        $diem=0;
        $sum=0;
        $sql = "SELECT * FROM `cauhoi` JOIN `dethi-cauhoi` WHERE `iddethi`='".$_GET['iddethi']."' AND `MACAUHOI`=`idcauhoi`";
        $result = $mysqli->query($sql);
        
        echo "<form method = 'POST'>";
            $prev = "";
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $i = 1;
            while($row = mysqli_fetch_assoc($result)) {
                if ($row["MACAUHOI"] != $prev) {
                    echo "Câu hỏi ".$i.": " . $row["NOIDUNGCAUHOI"]."<br>";
                    echo "<input type='hidden'  name='ch".$i."' value='".$row["MACAUHOI"]."'>";
                    $sql1 = "SELECT * FROM `cauhoi` natural join `cauhoi-dapan` natural join `dapan` WHERE `MACAUHOI` = '".$row["MACAUHOI"]."'";
                    $result1 = $mysqli->query($sql1);
                    if (mysqli_num_rows($result1) > 0){
                            $count = 65;
                        while($row1 = mysqli_fetch_assoc($result1)){
                            echo "<input type='checkbox'  name=".$row1['MADA'].">";
                            echo chr($count);echo ". ";echo "<label for=".$row1['MADA'].">".$row1['NOIDUNGDAPAN']."</label><br>";
                            $count ++;
                            $sum += $row1['TRANGTHAI'];
                        }
                        echo "<br>";
                    }
                    $prev = $row1["MACAUHOI"];
                    }
                    $i++;
                }
                echo "<input type='hidden' name='tongdiem' value='".$sum."'>";
                echo "<input type='hidden' name='soluong' value='".($i-1)."'>";
                echo "<button type = 'submit' name = 'nopbai'>Nộp bài</button>";
            } else {
                echo "0 results";
            }
        echo "</form>";
    }
?>