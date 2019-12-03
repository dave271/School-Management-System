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
        <?php include "sidebar.php"; ?><br>
        <h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br>
        <hr><br>
        <div class="content">

            <h3>Add Classes</h3><br>

            <div class="lbox1">
                <?php
                if (isset($_POST["submit"])) {
                    $sq = "insert into hclass(TID,CLA,SEC,SUB) values ('{$_SESSION["TID"]}','{$_POST["cla"]}','{$_POST["sec"]}','{$_POST["sub"]}')";
                    if ($db->query($sq)) {
                        echo "<div class='success'>Insert Success..</div>";
                    } else {
                        echo "<div class='error'>Insert Failed..</div>";
                    }
                }


                ?>


                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

                    <label>Class</label><br>

                    <select name="cla" required class="input3">
                        <?php
                        $sl = "select DISTINCT(CNAME) from class";
                        $r = $db->query($sl);
                        if ($r->num_rows > 0) {
                            echo "<option value=''>Select</option>";
                            while ($ro = $r->fetch_assoc()) {
                                echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
                            }
                        }
