<?php
include "database.php";
session_start();
if (!isset($_SESSION["AID"])) {
    echo "<script>
    window.open('index.php?mes=Access Denied...', '_self');
</script>";
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
    <div id="section">
        <?php include "sidebar.php"; ?><br>
        <h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br>
        <hr><br>
        <div class="content1">

            <h3> Add Class Details</h3><br>

            <?php
            if (isset($_POST["submit"])) {
                $sq = "insert into class(CNAME,CSEC) values('{$_POST["cname"]}','{$_POST["sec"]}')";
                if ($db->query($sq)) {
                    echo "<div class='success'>Insert Success..</div>";
                } else {
                    echo "<div class='error'>Insert failed..</div>";
                }
            }

            ?>

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <label>Class Name</label><br>
                <select name="cname" required class="input2">
                    <option value="">Select</option>
                    <option value="Nursery 1">Nursery 1</option>
                    <option value="Nursery 2">Nursery 2</option>
                    <option value="Nursery 3">Nursery 3</option>
                    <option value="Primary 1">Primary 1</option>
                    <option value="Primary 2">Primary 2</option>
                    <option value="Primary 3">Primary 3</option>
                    <option value="Primary 4">Primary 4</option>
                    <option value="Primary 5">Primary 5</option>
                    <option value="Primary 6">Primary 6</option>

                </select><br><br>
                <label>Section </label><br>
                <select name="sec" required class="input2">
                    <option value="">Select</option>
                    <option value="-">-</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>

                </select>
                <button type="submit" class="btn" name="submit">Add Class Details</button>
            </form>


        </div>


        <div class="tbox">
            <h3 style="margin-top:30px;"> Class Details</h3><br>
            <?php
            if (isset($_GET["mes"])) {
                echo "<div class='error'>{$_GET["mes"]}</div>";
            }

            ?>
            <table border="1px">
                <tr>
                    <th>S.No</th>
                    <th>Class Name</th>
                    <th>Section</th>
                    <th>Delete</th>
                </tr>
                <?php
                $s = "select * from class";
                $res = $db->query($s);
                if ($res->num_rows > 0) {
                    $i = 0;
                    while ($r = $res->fetch_assoc()) {
                        $i++;
                        echo "
										<tr>
											<td>{$i}</td>
											<td>{$r["CNAME"]}</td>
											<td>{$r["CSEC"]}</td>
											<td><a href='delete.php?id={$r["CID"]}' class='btnr'>Delete</a></td>
										</tr>
										";
                    }
                }
                ?>

            </table>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>