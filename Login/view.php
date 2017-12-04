<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Camagru - Login</title>
    <link rel="stylesheet" href="/SignUp/style.css">
</head>
<body>
<body>
<div class="form">
  <ul class="tab-group">
      <li class="tab"><a href="/index.php?signup=true">Sign Up</a></li>
      <li class="tab active"><a href="/index.php">Log In</a></li>
  </ul>
  <div class="tab-content">
    <div id="signup">   
      <h1>Welcome Back</h1>
      <form action="./" method="post">
      <div class="field-wrap">
        <label>
          Email Address<span class="req">*</span>
        </label>
        <input type="email"required autocomplete="off"/>
      </div>     
      <div class="field-wrap">
        <label>
          Password<span class="req">*</span>
        </label>
        <input type="password"required autocomplete="off"/>
      </div>
      <p class="forgot"><a href="#">Forgot Password?</a></p>
      <button type="submit" class="button button-block"/>Get Started</button>
      </form>
    </div>
  </div><!-- tab-content -->  
</div> <!-- /form -->
</body>
</body>
</html>