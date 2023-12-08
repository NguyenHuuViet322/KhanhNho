<?php
    require_once "database.php";
    require_once "session.php";

    $sql = "SELECT * FROM `cauhoi`";
    $result = $mysqli->query($sql);

    if (isset($_POST['submit'])) {
        $add_dethi_sql = "INSERT INTO `dethi`(`tendethi`, `ghichu`) VALUES ('".$_POST['tendethi']."','".$_POST['ghichu']."')";
        $result_add_de_thi = $mysqli->query($add_dethi_sql);
        $iddethi = $mysqli->insert_id;

        foreach($_POST['ques'] as $dapan){
            $add_dethi_sql = "INSERT INTO `dethi-cauhoi`(`iddethi`, `idcauhoi`) VALUES ('".$iddethi."','".$dapan."')";
            $result_add_de_thi = $mysqli->query($add_dethi_sql);
        }

        echo "<script>alert('Cập nhật thành công');</script>";
    }

    $sql_dethi = "SELECT * FROM `dethi`";
    $result2 = $mysqli->query($sql_dethi);
?>
<html>
    <head>
        <title>Thêm đề thi</title>
        <link rel="stylesheet" href="Css/style.css" />
        <script src="element.js"></script>
    </head>

    <style>
        #info {
            display: flex;
            padding: 1em;
            border: 1px solid red;
            border-radius: 1em;
            margin-bottom: 1em;
        }

        img {
            max-height: 100px;
        }

        #inner-info {
            padding: 1em !important;
        }
    </style>

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

    <div id='menu-bar'>
        <a href = 'index.php'><button class="nut-bam"> Trang chủ </button></a><br/>
        <a href = 'add_dethi.php'><button class="nut-bam"> Tạo đề thi</button></a><br/>
        <a href = 'add_cauhoi.php'><button class="nut-bam"> Thêm câu hỏi</button></a><br/>
        <a><button id='welcome' class="nut-bam">Xin chào, <?php echo $_SESSION['email']; ?></button></a>
        <a href = 'logout.php'><button id ='welcome' class="nut-bam"> Đăng xuất </button></a><br/>
    </div>
    
    <body>
    <form method = "POST" action ="add_dethi.php">
        <label>Tên đề thi: </label>
        <input type ="text" name = "tendethi">

        <label>Ghi chú: </label>
        <input type ="text" name = "ghichu">

        <label>Chọn câu hỏi: </label>
        <?php
            if (mysqli_num_rows($result) > 0){
                while($cauhoi = mysqli_fetch_assoc($result)){
                    echo "<input style='width:auto' type='checkbox' name='ques[]' value='".$cauhoi['MACAUHOI']."'>
                          <label style='display:unset'>".$cauhoi["NOIDUNGCAUHOI"]."</label><br>";
                }
            }
        ?>
        
		<button style="margin-top:10px;" name='submit' type = "submit">Thêm</button></a><br/>
    </form>

    <style>
            table, th, td {border:1px solid black;}
            </style>
            <table style="width:100%">
                <tr>
                    <th>Mã đề thi</th>
                    <th>Tên đề thi</th>
                    <th>Ghi chú</th>
                    <th>Thao tác</th>
                </tr>
                <?php   
                    if (mysqli_num_rows($result2) > 0){
                        while($row = mysqli_fetch_assoc($result2)){
                            echo "<tr>";
                                echo "<td>".$row['iddethi']."</td>";
                                echo "<td>".$row['tendethi']."</td>";
                                echo "<td>".$row['ghichu']."</td>";
                                echo "<td><a href='exam.php?iddethi=".$row['iddethi']."'><button>Làm bài</button></a>  <a href='xoa_dethi.php?iddethi=".$row['iddethi']."'><button>Xóa đề thi</button></a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
            </table>
    <body>
</html>