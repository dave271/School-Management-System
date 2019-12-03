<?php
include "database.php";
session_start();
if (!isset($_SESSION["AID"])) {
    echo "<script>window.open('index.php?mes=Access Denied...','_self');</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php include "navbar.php"; ?><br>
    <img src="images/2.jpg" style="margin-left:90px;width:1400px;height:360px" class="sha">
    <div class="sidebar">
        <?php include "sidebar.php"; ?>
    </div>
    <div class="content">
        <h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br>
        <hr><br>
        <h3> School Information</h3><br>

    </div>

    <div class="footer">
        <footer>
            <p>Copyright &copy; David Ikenna </p>
        </footer>
    </div>
    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $(".error").fadeTo(1000, 100).slideUp(1000, function() {
                $(".error").slideUp(1000);
            });


        });
    </script>
</body>

</html>