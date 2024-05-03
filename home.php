

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
    <div class="nav" >
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
        <!-- <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
        
        <input type="hidden" name="business"value="sb-bkbf330670793@business.example.com">
        <input type="hidden" name="date"value="<?php echo $data ['currentDate'];?>">
        <input type="hidden" name="amount"value="<?php echo $data ['amount'];?>">
        <input type="hidden" name="currency_code"value="USD">
         <input type="hidden" name="cmd" value="_xclick">
         <input type="hidden" name="return" value="http://localhost/ee/index.php/success.php">
         <input type="hidden" name="return" value="http://localhost/ee/index.php/cancel.php"> -->



            <div class="main-box top">
            <div class="top"  style="display: flex; justify-content: center; text-align:cente">
                <div class="box" style="width: 40%;" >
                    <p  style="display: flex; justify-content: center; text-align:cente">Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
                    <div >
                        <p  style="display: flex; justify-content: center; text-align:cente">Your email is <b><?php echo $res_Email ?></b>.</p>
                    </div>
                </div>
            </div>
            <div class="bottom"  style="display: flex; justify-content: center; text-align:cente">
                <div class="box" style="width: 40% ">
                    <h2>Water Payment Calculator</h2>
                    
        <p>Counter : <b><?php echo $res_Counter ?></b>.</p>
<div>
<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
        <label for="units">Total Units (in liters):</label>
        <input type="number" id="units" name="units" required><br>
        
        <!-- <label for="currentDate">Current Date:</label>
        <input type="date" id="currentDate" name="currentDate" required><br>
        
        <label for="billDate">Bill Given Date:</label>
        <input type="date" id="billDate" name="billDate" required><br>
         -->
        <!-- <label for="fineAmount">Fine Amount :</label>
        <input type="number" id="fineAmount" name="fineAmount" required><br>

        <label for="previousAmount">Previous Amount:</label>
        <input type="number" id="previousAmount" name="previousAmount" required><br> -->

        <label for="totalAmount">Total Amount:</label>
        <input type="text" id="totalAmount" name="totalAmount" placeholder="Total Amount" readonly><br>

       
        <input type="hidden" name="business"value="sb-bkbf330670793@business.example.com">
        <input type="hidden" name="date"value="<?php echo $data ['currentDate'];?>">
        <input type="hidden" name="amount"value="<?php echo $data ['amount'];?>">
        <input type="hidden" name="currency_code"value="USD">
         <input type="hidden" name="cmd" value="_xclick">
         <input type="hidden" name="return" value="http://localhost/ee/success.php">
         <input type="hidden" name="cancel_return" value="http://localhost/ee/cancel.php"> 
 <button type="submit" style="background-color: lightgreen; margin: 0 auto; width: 10%">Pay</button>
    </form>
    </form>
</div>

<script>
document.getElementById("waterForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    var units = parseInt(document.getElementById("units").value);

    var fineAmountInput = document.getElementById("fineAmount");
    var previousAmountInput = document.getElementById("previousAmount");
    var totalAmountInput = document.getElementById("totalAmount");
    var currentDate = new Date(document.getElementById("currentDate").value);
    var billDate = new Date(document.getElementById("billDate").value);
    var previousAmount = parseFloat(previousAmountInput.value) || 0;

    var currentDateInMs = currentDate.getTime();
    var billDateInMs = billDate.getTime();
    var differenceInDays = Math.ceil((currentDateInMs - billDateInMs) / (1000 * 3600 * 24));
    var totalAmount = units * 100; // Assuming 1 unit = Rs 100

    // Apply 4% fine if the difference is more than 30 days
    var finePercentage = (differenceInDays > 30) ? 0.04 : 0;
    var fineAmount = totalAmount * finePercentage;
    
    // Calculate total payment considering previous amount
    var totalPayment = totalAmount + fineAmount - previousAmount;

    amountInput.value = (units === 1) ? 100 : totalAmount; // Automatically set Rs 100 if units is 1
    fineAmountInput.value = "Rs " + fineAmount.toFixed(2);
    totalAmountInput.value = "Total Amount: Rs " + totalPayment.toFixed(2);
});
</script>















</div>
</div>
</div>
</div>
</main>
</body>
</html>
