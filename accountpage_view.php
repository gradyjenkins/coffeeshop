<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
  <link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div id="container">
    <div id="header" align="center">
      <h1>Welcome to your account page!</h1>
    </div>
    <div id="options-tab" align="center">
      <ul id="menu">
        <button><li>List Current Products</li></button>
        <button><li>Place an Order</li></button>
        <button><li>View Previous Orders</li></button>
      </ul>
    </div>
    <div id="account-info">
      <form>
        <ul>
          <li>First Name:</li><input type="text" name="first-name">
          <li>Last Name:</li><input type="text" name="last-name">
          <li>Address:</li><input type="text" name="address">
          <li>Password:</li><input type="password" name="password">
          <li>New Password:</li><input type="password" name="new-password">
          <li>Phone Number:</li><input type="text" name="phone-number">
          <li>Email:</li><input type="text" name="email-address">
          <br>
          <button>Update Account Information</button>
        </ul>
    </div>
  </div>
</body>
</html