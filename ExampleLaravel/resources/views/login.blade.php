<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Sign In </h2>
    <h2 class="inactive underlineHover">Sign Up </h2>

    <!-- Icon -->
    <div class="fadeIn first">
    </div>

    <!-- Login Form -->
    <form action="{{url('login')}}" method="post">
        @csrf
        <input type="email" id="email" class="fadeIn second" name="email" placeholder="email" required>
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
        <input type="submit" class="fadeIn fourth" value="Log In">
        <input type="button" onclick="document.getElementById('id01').style.display='block'" class="fadeIn fourth" value="Register" style="background-color: #faebcc;">
    </form>

    <div id="id01" class="w3-modal">
        <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <form action="{{url('register')}}" method="post">
                @csrf
                <input type="text" id="login" class="fadeIn second" name="name" placeholder="name" required>
                <input type="email" id="email" class="fadeIn third" name="email" placeholder="email" required>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
                <input type="text" id="nik" class="fadeIn third" name="nik" placeholder="nik" required>
                <input type="submit" class="fadeIn fourth" value="Submit">
            </form>
        </div>
        </div>
    </div>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
</body>
</html>