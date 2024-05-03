

<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>

        <div class="right-links">
            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Counter = $result['Counter'];
                $res_id = $result['Id'];
            }
            
            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            ?>
            <a href="php/logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
                </div>
                <div class="box">
                    <p>Your email is <b><?php echo $res_Email ?></b>.</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>And your counter is <b><?php echo $res_Counter ?></b>.</p> 
                </div>
            </div>
        </div>
        <div class="main-box calculator">
            <h2>Water Payment Calculator</h2>
            <form id="waterForm">
                <label for="units">Total Units (in liters):</label>
                <input type="number" id="units" name="units" required><br>
                <label for="currentDate">Current Date:</label>
                <input type="date" id="currentDate" name="currentDate" required><br>
                <label for="billDate">Bill Given Date:</label>
                <input type="date" id="billDate" name="billDate" required><br>
                <input type="text" id="totalAmount" name="totalAmount" placeholder="Total Amount" readonly><br>
                <input type="submit" value="Calculate Total Amount">
            </form>
        </div>
    </main>
    <script>
        document.getElementById("waterForm").addEventListener("submit", function(event) {
            event.preventDefault();
            
            var units = parseInt(document.getElementById("units").value);
            var currentDate = new Date(document.getElementById("currentDate").value);
            var billDate = new Date(document.getElementById("billDate").value);
            var currentDateInMs = currentDate.getTime();
            var billDateInMs = billDate.getTime();
            var differenceInDays = Math.ceil((currentDateInMs - billDateInMs) / (1000 * 3600 * 24));
            var totalAmount = units * 1000; // Assuming 1 unit = 1000 liters
            
            // Apply 4% fine if the difference is more than 30 days
            var finePercentage = (differenceInDays > 30) ? 0.04 : 0;
            var fineAmount = totalAmount * finePercentage;
            var totalPayment = totalAmount + fineAmount;
            
            document.getElementById("totalAmount").value = "Total Amount: Rs " + totalPayment.toFixed(2);
        });
    </script>
</body>
</html>
