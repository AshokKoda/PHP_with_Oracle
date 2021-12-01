<?php session_start(); ?>
<!---------------------------------PHP CODE---------------------------------->
<?php
 if(!isset($_SESSION['empname']))
 {
     header("location:index.php");
 }
 ?>
 <!---------------------------------PHP CODE---------------------------------->

 <!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!---------------------------------PHP CODE---------------------------------->
        <?php
        include_once("connect.php");
        if(isset($_POST['add']))
        {
            $erpdate = $_POST['erpdate'];
            $erpshift = $_POST['erpshift'];
            $erpdis = $_POST['erpdis'];
            $login_id = $_SESSION['empid'];

            $data = $_POST;
            if(empty($data['erpdate']) || empty($data['erpshift']) || empty($data['erpdis'])) {
                die('Please fill all required fields!');
            }
            else
            {
                $query = oci_parse($conn, "INSERT INTO erpdata(erpdate, erpshift, erpdis, login_id) VALUES('$erpdate', '$erpshift', '$erpdis', '$login_id')");
                $result = oci_execute($query);
                if ($result)
                {
                    echo "<div class='alert alert-success'><b>Data was saved successfully!.</b></div>";
                    header("location:main.php");
                    exit();
                }
                else
                {
                    echo "<div class='alert alert-danger'><b>Unable to save data.</b></div>";
                    exit();
                }
            }
        }
        ?>
        <!---------------------------------PHP CODE---------------------------------->
    </body>
</html>