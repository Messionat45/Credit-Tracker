<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log in</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div id="home-button">
      <button><a id="home" href="index.html">Home</a></button>
    </div>

    <div id="loginContainer">
      <div id="loginheader"><h1>LOG IN</h1></div>

      <form action="loginvalidate.php" method="post">
        <div class="loginform">
          <div>
            <label for="">Email:</label>
          </div>
          <div>
            <input class="logininput" type="email" name="email" />
          </div>
        </div>

        <div class="loginform">
          <div>
            <label for="">Password:</label>
          </div>
          <div>
            <input class="logininput" type="password" name="password" />
          </div>
        </div>

        <div id="loginbtn">
          <button><a id="login">Log In</a></button>
        </div>
      </form>

      <?php
      if(isset($error)) {
          echo "<div  class='error'>$error</div>";
      }
      ?>
    </div>
  </body>
</html>
