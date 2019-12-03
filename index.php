<?php
include "database.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body class="back">
    <?php include "navbar.php"; ?>
    <img src="images/1.jpg" style="width:800px">
    <div class="login">
        <h1 class="heading">Admin Login</h1>
        <div class="log">
            <?php
            if (isset($_POST["login"])) {
                $sql = "select * from admin where ANAME='{$_POST["aname"]}' and APASS='{$_POST["apass"]}'";
                $res = $db->query($sql);
                if ($res->num_rows > 0) {
                    $ro = $res->fetch_assoc();
                    $_SESSION["AID"] = $ro["AID"];
                    $_SESSION["ANAME"] = $ro["ANAME"];
                    echo "<script>window.open('admin_home.php','_self');</script>";
                } else {
                    echo "<div class='error'>Invalid Username or Password</div>";
                }
            }
            if (isset($_GET["mes"])) {
                echo "<div class='error'>{$_GET["mes"]}</div>";
            }
            ?>

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <label>User Name</label><br>
                <input type="text" name="aname" required class="input"><br><br>
                <label>Password</label><br>
                <input type="password" name="apass" required class="input"><br>
                <button type="submit" class="btn" name="login">Login</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <footer>
            <p>Copyright &copy; David Ikenna</p>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".error").fadeTo(1000, 100).slideUp(1000, function() {
                $(".error").slideUp(1000);
            });

            $(".success").fadeTo(1000, 100).slideUp(1000, function() {
                $(".success").slideUp(1000);
            });
        });
    </script>


</body>

</html>