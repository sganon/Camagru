<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Camagru - Sign Up</title>
    <link rel="stylesheet" href="/SignUp/style.css">
</head>
<body>
  <div class="form">
    <ul class="tab-group">
        <li class="tab active"><a href="/index.php?signup=true">Sign Up</a></li>
        <li class="tab"><a href="/index.php">Log In</a></li>
    </ul>
    <div class="tab-content">
      <div id="signup">   
        <h1>Sign Up for Free</h1>
        <!-- <form> -->
        <div class="top-row">
          <div class="field-wrap">
            <label>
              First Name<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" id="firstname"/>
          </div>
          <div class="field-wrap">
            <label>
              Last Name<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" id="lastname"/>
          </div>
        </div>
        <div class="field-wrap">
          <label>
            Login<span class="req">*</span>
          </label>
          <input type="text"required autocomplete="off" id="login"/>
        </div>
        <div class="field-wrap">
          <label>
            Email Address<span class="req">*</span>
          </label>
          <input type="email"required autocomplete="off" id="email"/>
        </div>     
        <div class="field-wrap">
          <label>
            Set A Password<span class="req">*</span>
          </label>
          <input type="password"required autocomplete="off" id="pwd"/>
        </div>
        <button class="button button-block" onclick="signUp()"/>Get Started</button>
        <!-- </form> -->
      </div>
    </div><!-- tab-content -->  
  </div> <!-- /form -->
  <script src="/SignUp/signup.js"></script>
</body>
</html>