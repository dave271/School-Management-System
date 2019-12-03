<?php
include "database.php";
session_start();
if (!isset($_SESSION["AID"])) {
    echo "<script>window.open('index.php?mes=Access Denied..','_self');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
    <?php include "navbar.php"; ?><br>
    <img src="images/2.jpg" style="margin-left:90px;width:1400px;height:360px" class="sha">
    <div id="section">
        <?php include "sidebar.php"; ?><br>
        <div class="content">
            <h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br>
            <hr><br>
            <h3>School Information</h3><br>
            <img src="images/3.jpg" class="imgs">
            <p class="para">
                Our school offers a unique educational experience for all students by providing a
                curriculum which is unique. Our curriculum is a rich blend of the Nigerian curriculum
                and other major curricula in the world. It is robust and relevant to the real world,
                reflecting the knowledge and skills that pupils need to compete successfully as global
                citizens.
            </p>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>