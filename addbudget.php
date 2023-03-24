<?php session_start();
if (!isset($_SESSION['user_name']))
    header("Location:../login.php");
?>
<html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">       
    <style>
            body{
                font-family: 'Poppins', sans-serif;
            }
            .popup {
    background-color: #59d434;
    width: 60%;
    height: 35%;
    padding: 30px 40px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
    border-radius: 8px;
    display: none;
    font-family: "Poppins",sans-serif;
}
    </style>
</head>

<body>
<link rel="stylesheet" href="css/addbudget.css">
    <div class="popup container">
        <a href="budget-index.php"><button id="close" class="closebutton" style="width:80px; height:80px;">&times;</button></a>
        <h1 style="font-weight:700; font-size: 35;">Add a Budget</h1>
        <br />
        <div class="container">
        <form action="budgetconnect.php" method="post">
            <span style="font-weight: 600;">Amount</span><br><input type="number" placeholder="Amount" id="amount"
                name="amount" min=1><br><br>
            <span style="font-weight: 600;">Category</span><br>
            <select id="category" name="category">
                <option value="General">General</option>
                <option value="Transport">Transport</option>
                <option value="Food">Food</option>
                <option value="Shopping">Shopping</option>
                <option value="Rent">Rent</option>
                <option value="Petrol">Petrol</option>
                <option value="Medicine">Medicine</option>
                <option value="Entertainment">Entertainment</option>
            </select>
            <br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
    </div>
    <!--Script-->
    <script type="text/javascript">
        window.addEventListener("load", function () {
            setTimeout(
                function open(event) {
                    document.querySelector(".popup").style.display = "block";
                },
                0
            )
        });
    </script>
</body>

</html>