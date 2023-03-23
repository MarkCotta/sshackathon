<?php session_start();
if (!isset($_SESSION['user_name']))
    header("Location:../login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeSpend | Budget</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://kit.fontawesome.com/2291efdc8d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="bootstrap/fonts/bootstrap-icons.css" type="text/css">

    <script type="text/javascript" src="bootstrap/js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .Progress {
            color: rgb(0, 0, 0);
            width: 82px;
            font-size: 18px;
            font-family: Inter;
            font-weight: 800;
            position: relative;
            margin-left: 15px;
        }

        .progressbar {
            border-radius: 10px;
            color: black;
            background: greenyellow;
        }

        .Progress p {
            font-size: 13;
        }

        .container-sm {
            max-width: 50%;
        }

    </style>
</head>

<body>
    <div class="container">
        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample">
            Menu
        </a>
        <!-- <button class="js-push-btn" style="display: none;">
        Subscribe Push Messaging
        </button>
        <script src="main.js"></script> -->

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="d-grid gap-3">
                    <span class="row"><a href="../transactions-html/index1.php"><button class="menu-button1"
                                style="width:100%; height:45px;"><span
                                    class="menutext">Transactions</span></button></a></span>
                    <span class="row"><a href="../budget-html/index1.php"><button class="menu-button1"
                                style="width:100%; height:45px;" style="background-color:#65f9c5;"><span
                                    class="menutext">Budgets</span></button></a></span>
                    <span class="row"><a href="../report-html/index1.php"><button class="menu-button1"
                                style="width:100%; height:45px;"><span
                                    class="menutext">Report</span></button></a></span>
                    <span class="row"><a href="../activities-html/index1.php"><button class="menu-button1"
                                style="width:100%; height:45px;"><span
                                    class="menutext">Activities</span></button></a></span>
                    <span class="row"><a href="../reminders-html/index1.php"><button class="menu-button1"
                                style="width:100%; height:45px;"><span class="menutext">
                                    Reminders
                                </span></button></a></span>
                    <span class="row"><a href="../educate-html/index1.php"><button class="menu-button1"
                                style="width:100%; height:45px;"><span
                                    class="menutext">Educate</span></button></a></span>
                    <span class="row"><a href="../help-html/index1.php"><button class="menu-button1"
                                style="width:100%; height:45px;"><span class="menutext">Help</span></button></a></span>
                    <span class="row"><a href="../shopping-html/index1.php"><button class="menu-button1"
                                style="width:100%; height:45px;"><span class="menutext">Shopping
                                    List</span></button></a></span>
                    <div><a href="../register.php"><span style="color: red; font-size: 20; ">Log Out</span></a></div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container"
                style="width:100%; max-width:500px; background-color:lightblue; border:solid lightblue; border-radius:10px;">
                <canvas id="myChart<?php echo $i; ?>" style=""></canvas>

            </div>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'safespend-2');
            $var = $_SESSION['user_name'];
            $sql = "SELECT * from Budget join keeps on BID=Budget_ID where emailkeeps='$var'";
            $result = mysqli_query($conn, $sql);
            $i = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <hr width="90%">
                    <?php
                    $spentamt = $row['Spent_amount'];
                    $totalamt = $row['Total_amount'];
                    $category = $row['category'];
                    if ($totalamt != 0)
                        $percentage = (float) $spentamt / (float) $totalamt * 100;
                    else
                        $percentage = 0;
                    $percentage = round($percentage, 2); ?>

                    <div class="card"
                        style="background-color:lightblue; border:solid lightblue; border-radius:10px; height:200px;">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-4" style="display:flex; align-items:center;">
                                    <h3>
                                        <?php echo $spentamt . '/' . $totalamt; ?>
                                    </h3>
                                </div>
                                <div class="col-8">
                                    <canvas id="myChart<?php echo $i; ?>" style="max-width:600px;"></canvas>

                                    <script>
                                        var xValues = ["Spent", "Remaining"];

                                        var yValues = ["<?php echo $spentamt; ?>", "<?php echo ($totalamt - $spentamt); ?>"]
                                        var barColors = ["#E21818", "#804374"];
                                        new Chart("myChart<?php echo $i; ?>", {
                                            type: "pie",
                                            data: {
                                                labels: xValues,
                                                datasets: [
                                                    {
                                                        backgroundColor: barColors,
                                                        data: yValues,
                                                    },
                                                ],
                                            },
                                            options: {
                                                responsive: true,
                                                maintainAspectRatio: false,
                                                title: {
                                                    display: true,
                                                    text: "<?php echo $category; ?>",
                                                },

                                            },
                                        });

                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- <h3>

                        <?php
                        if ($spentamt > $totalamt) {
                            echo '<span style="color:red;">Budget_for_' . $category . '_exceeded ' . $percentage . '% Used </span>';
                        } else {
                            echo '<span style="color:green;"> ' . $row['category'] . ': ' . $percentage . '% </span>';
                            echo '<progress class="progressbar" value="' . $spentamt . '" max="' . $totalamt . '"></progress>';
                        }
                        ?>
                    </h3> -->

                    </div>
                    <?php
                    $i++;


                }
                ?>

                <?php
                echo '<hr width="90%">';
            }
            ?>
            <!-- <div class="container" style="margin:0%;">
                <table border="5" cellspacing="2" cellpadding="2" width="70%"
                    style="border:5px solid black; border-radius:10px;">
                    <tr height="60px">
                        <th bgcolor="#AEF28A">
                            <font face="Arial">Budget ID</font>
                            </td>
                        <th bgcolor="#AEF28A" width="20%">
                            <font face="Arial">Total Amount</font>
                            </td>
                        <th bgcolor="#AEF28A" width="22%">
                            <font face="Arial">Spent Amount</font>
                            </td>
                        <th bgcolor="#AEF28A">
                            <font face="Arial">Remaining Amount</font>
                            </td>
                        <th bgcolor="#AEF28A">
                            <font face="Arial">Category</font>
                            </td>
                        <th bgcolor="#AEF28A">
                            <font face="Arial"><button type="submit" name="budget_delete_multiple_btn"
                                    style="width: 100px;height: 30px;background-color: red;border-radius: 10px;border-color: #f5f5fb;">Delete</button>
                            </font>
                        </th>
                    </tr>
                    <?php
                    $mysqli = new mysqli('localhost', 'root', '', 'safespend-2');
                    $var = $_SESSION['user_name'];
                    $query = "SELECT * FROM budget join keeps on BID = Budget_ID where Emailkeeps = '$var'";

                    echo '';

                    if ($result = $mysqli->query($query)) {
                        while ($row = $result->fetch_assoc()) {
                            $field1name = $row["BID"];
                            $field2name = (int) $row["Total_amount"];
                            $field3name = (int) $row["Spent_amount"];
                            $field4name = $field2name - $field3name;
                            $field5name = $row["category"];
                            echo '<tr> 
                                    <td>' . $field1name . '</td> 
                                    <td>' . "Rs. " . $field2name . '</td> ';

                            if ($field2name < $field3name)
                                echo '<td bgcolor="red">' . "Rs. " . $field3name . '</td> ';
                            else if (($field3name > ((8 / 10) * $field2name)) && ($field3name <= $field2name))
                                echo '<td bgcolor="#FFA600">' . "Rs. " . $field3name . '</td> ';
                            else
                                echo '<td bgcolor="#8EFF00">' . "Rs. " . $field3name . '</td> ';

                            echo '<td>' . "Rs. " . $field4name . '</td> 
                                    <td>' . $field5name . '</td> ';
                            ?>
                            <td><input type="checkbox" name="budget_delete_id[]" value="<?= $field1name; ?>"></td>
                            </tr>
                            <?php
                        }

                        $result->free();
                    }
                    ?>
                </table>
            </div> -->
        </div>

    </div>
</body>

</html>