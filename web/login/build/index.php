<?php
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, "utf-8");
}

ini_set("display_errors", 0);

session_start();

$wd = dirname($_SERVER["SCRIPT_NAME"]);
if (!isset($_SESSION["name"])) {
  header("Location: {$wd}/login.php");
}
?>
<!doctype html>

<html>

  <head>
    <meta charset="utf-8" />
    <title>'Login</title>
    <style>
      body {
        width: 500px;
        margin: auto;
        margin-top: 50px;
        margin-bottom: 50px;
      }
      
      textarea {
        display: block;
        width: 400px;
        height: 60px;
        resize: none;
      }
      
      span.name {
        display: block;
        margin-top: 20px;
      }
      
      hr {
        margin-bottom: 10px;
      }
      
      p.comment {
        margin-bottom: 50px;
      }
    </style>
  </head>

  <body>
    Hello, <?php echo h($_SESSION["name"]); ?><br>
    You've just acquired the flag. take it.
    <div id="flag">
      flag{7d51d6200cee22287af07af518369ace}
    </div>
  </body>

</html>
