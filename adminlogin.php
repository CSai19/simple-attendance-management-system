<!DOCTYPE html>
<html>
<head>
   <style type="text/css">
  .login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #4da6ff;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  border: 1px solid black;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #ff9933;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #ffffff;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #ffffff;
  color:#000000;
}
   </style>
</head>

<header>
   <h1 style="font-size:60px; color: #ff0000 " ><center>Admin Login</center></h1>
</header>

<body id="b" style="background-image: url(back.jpg); background-size: 100% 100%">
<br>

<div class="login-page" style="text-align:center;">
  <div class="form">
      <form class="login-form" action="admincheck.php" method="POST">
      <input type="text" placeholder="username" name="username" required /><br><br>
      <input type="password" placeholder="password" name="password" required /><br><br>
      <button>Login</button><br>
       
    </form>
  </div>
</div>
</body>
<html>
