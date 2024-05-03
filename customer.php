<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Water Payment Calculator</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }
    .container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        color: #333;
    }
    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="submit"] {
        background-color: #4caf50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Water Payment Calculator</h1>
    <form id="waterForm">
        <label for="units">Total Units (in liters):</label>
        <input type="text" id="units" name="units" required><br>
        <label for="date">Current Date:</label>
        <input type="date" id="date" name="date" required><br>
        <label for="fine">Fine/Penalty:</label>
        <input type="text" id="fine" name="fine" required><br>
        <input type="text" id="totalPayment" name="totalPayment" placeholder="Total Payment" readonly><br> <!-- This input field will display the total payment -->
        <input type="submit" value="Calculate Payment">
    </form>
</div>

<script>
    document.getElementById("waterForm").addEventListener("submit", function(event) {
        event.preventDefault();
        
        var units = parseInt(document.getElementById("units").value);
        var date = new Date(document.getElementById("date").value);
        var fine = parseFloat(document.getElementById("fine").value);
        var currentDate = new Date();
        
        var daysLate = Math.ceil((currentDate - date) / (1000 * 3600 * 24));
        var unitPrice = 100; // Rs 100 per unit
        var totalAmount = units * unitPrice;
        var totalFine = fine;
        
        if (daysLate > 0) {
            totalFine += (totalAmount * 0.05 * daysLate);
        }
        
        var totalPayment = totalAmount + totalFine;
        
        document.getElementById("totalPayment").value = "Rs " + totalPayment.toFixed(2); // Set the value of the input field to the total payment
    });
</script>
</body>
</html>
