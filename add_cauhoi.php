<?php
    require_once "database.php";
    require_once "session.php";
?>
<html>
    <head>
        <title>Thêm/Sửa câu hỏi</title>
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
        <a href = 'add_cauhoi.php'><button class="nut-bam"> Thêm câu hỏi</button></a><br/>
        <a ><button id='welcome' class="nut-bam">Xin chào, <?php echo $_SESSION['email']; ?></button></a>
        <a href = 'logout.php'><button id ='welcome' class="nut-bam"> Đăng xuất </button></a><br/>
    </div>
    
    <body>
    <form method = "POST" action ="add_question.php">
        <label>Nội dung câu hỏi: </label>
        <input type ="text" name = "noidungcauhoi">

        <label>Mức độ: </label>
        <input type ="text" name = "mucdo">

        <label>Số lượng đáp án: </label>
        <input type ="number" name = "soluongdapan">
        
		<button type = "submit">Thêm</button></a><br/>
    </form>
    <div>
            <style>
            table, th, td {border:1px solid black;}
            </style>
            <table style="width:100%">
                <tr>
                    <th>Nội dung câu hỏi</th>
                    <th>Mức độ</th>
                    <th>Mã đáp án</th>
                    <th>Nội dung đáp án</th>
                    <th>Điểm đáp án</th><br>
                    <th>Thao tác</th>
                </tr>
                <?php   
                    $prev=-1;
                    $sql2 = "SELECT * FROM `cauhoi` natural join `cauhoi-dapan` natural join `dapan`";
                    $result2 = $mysqli->query($sql2);
                    if (mysqli_num_rows($result2) > 0){
                        while($row = mysqli_fetch_assoc($result2)){
                            if ($prev != $row['MACAUHOI']) {
                                echo "<tr>";
                                    echo "<td>".$row['NOIDUNGCAUHOI']."</td>";
                                    echo "<td>".$row['MUCDO']."</td>";
                                    echo "<td>".$row['MADA']."</td>";
                                    echo "<td>".$row['NOIDUNGDAPAN']."</td>";
                                    echo "<td>".$row['TRANGTHAI']."</td>";
                                    echo "<td><a href='sua_cauhoi.php?MADA=".$row['MADA']."'><button type = 'submit'>Chỉnh sửa</button></a>   <a href='xoa_cauhoi.php?MACH=".$row['MACAUHOI']."'><button type = 'submit'>Xóa câu hỏi</button></a></td>";
                                echo "</tr>";
                            } else {
                                echo "<tr>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td>".$row['MADA']."</td>";
                                    echo "<td>".$row['NOIDUNGDAPAN']."</td>";
                                    echo "<td>".$row['TRANGTHAI']."</td>";
                                    echo "<td><a href='sua_cauhoi.php?MADA=".$row['MADA']."'><button type = 'submit'>Chỉnh sửa</button></a>  <a href='xoa_cauhoi.php?MACH=".$row['MACAUHOI']."'><button type = 'submit'>Xóa câu hỏi</button></a></td>";
                                echo "</tr>";
                            }
                            $prev = $row['MACAUHOI'];
                        }
                    }
                    ?>
            </table>
        </div>
    <body>
</html>