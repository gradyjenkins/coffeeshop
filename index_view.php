<!DOCTYPE html>
<html>
<head>
  <link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div id="container">
    <div id="logo" align="center">
      <h1>Grady's Coffee Shop</h1>
      <img src="http://cdn1.theodysseyonline.com/files/2016/01/03/635873939628620546815575054_hc%20coffee%20shop_1.jpg" height="300" width="300">
    </div>
    
    <div id="login" align="center">
      <h3>Please login!</h3>
      
      <form action="index.php" method="post">
      
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" name="login" value=" Login "><br>
      </form>
      
      <a href="createaccount.php">Create Account</a> 
    </div>
  </div>
</body>
</html>