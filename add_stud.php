<?php
include "database.php";
session_start();
if (!isset($_SESSION["TID"])) {
    echo "<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php include "navbar.php"; ?><br>

    <div id="section">
        <?php include "sidebar.php"; ?><br><br><br>
        <h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br>
        <hr><br>
        <div class="content">

            <h3>Set Exam Time Table Details</h3><br>
            <?php
            if (isset($_POST["submit"])) {
                $edate = $_POST["da"] . '-' . $_POST["mo"] . '-' . $_POST["ye"];
                $target = "student/";
                $target_file = $target . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                    $sq = "insert into student(RNO,NAME,FNAME,DOB,GEN,PHO,MAIL,ADDR,SCLASS,SSEC,SIMG,TID) values('{$_POST["rno"]}','{$_POST["name"]}','{$_POST["fname"]}','{$edate}','{$_POST["gen"]}','{$_POST["pho"]}','{$_POST["email"]}','{$_POST["addr"]}','{$_POST["cla"]}','{$_POST["sec"]}','{$target_file}','{$_SESSION["TID"]}')";

                    if ($db->query($sq)) {
                        echo "<div class='success'>Insert Success</div>";
                    } else {
                        echo "<div class='error'>Insert Failed</div>";
                    }
                }
            }






            ?>

            <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div class="lbox">
                    <label> ID</label><br>
                    <?php
                    $no = "S101";
                    $sql = "select * from student order by ID desc limit 1";
                    $res = $db->query($sql);
                    if ($res->num_rows > 0) {
                        $row1 = $res->fetch_assoc();
                        $no = substr($row1["RNO"], 1, strlen($row1["RNO"]));
                        $no++;
                        $no = "S" . $no;
                    }
