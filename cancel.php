<?php
include ('php/config.php');
// session_start();
if(!empty($_GET))
{
//   $_SESSION[''] = $_GET['user_name'];
//   $_SESSION['name'] = $_GET['user_name'];
//   $_SESSION['date'] = $_GET['date'];
//   $_SESSION['amount'] = $_GET['amount'];
//   $_SESSION['payment_status'] = $_GET['payment_status'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>success</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-3">
      
<div class="alert alert-success">
  <strong>Success!</strong> payment has successful
</div>

  <table class="table table-striped">
  
    <tbody>
      <tr>
        <td>Transcation Id</td>
        <td>1</td>
       
      </tr>
      <tr>
        <td>sona</td>
        <td>Angdembe</td>
      
      </tr>
      <tr>
        <td>amount</td>
        <td>$1</td>
       
      </tr>
      <tr>
        <td>payment status</td>
        <td>Completed</td>
 
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>
