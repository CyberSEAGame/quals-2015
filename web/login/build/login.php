<?php
function my_filter_input($mode, $name) {
  $a = filter_input($mode, $name);
  if ($a)
    return $a;
  else
    return false;
}

function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, "utf-8");
}

ini_set("display_errors", 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.gc_maxlifetime', 60 * 60 * 10);
session_start();

$wd = dirname($_SERVER["SCRIPT_NAME"]);
$name = my_filter_input(INPUT_POST, "name");
$password = my_filter_input(INPUT_POST, "password");
if ($name && $password) {
  $db = new SQLite3(__DIR__ . "/60afe379481d6be5c2ba9b34f281aac5.db");
  $query = "select * from users where name='{$name}' and password='{$password}'";
  $result = $db -> query($query);
  if ($row = $result -> fetchArray(SQLITE3_ASSOC)) {
    $_SESSION["name"] = $row["name"];
    header("Location: {$wd}/index.php");
  } else {
    $msg = "Login failed.";
  }
} else if($_SERVER["REQUEST_METHOD"] === "POST") {
  $msg = "Both username and password are required.";
}
?>
<!doctype html>

<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <title>'Login</title>
    <style>
      * {
        font-family: osaka-mono, consolas;
      }
      form {
        position: fixed;
        top: 50%;
        left: 50%;
        -webkit-transform-origin: 100% 100%;
        -moz-transform-origin: 100% 100%;
        transform: translate(-50%,-50%);
        -webkit-transform: translate(-50%,-50%);
        -moz-transform: translate(-50%,-50%);
        text-align: center;
        display: block;
        width: 200px;
        height: 200px;
        border: double 1px #FFF;
        border-radius: 10px;
        background-color: #FAFAFA;
        box-shadow: 0 0 10px 10px #DFDFDF;
        padding: 30px;
      }

      input[type=text], input[type=password] {
        width: 100px;
        margin-bottom: 20px;
      }

      h1 {
        margin: 10px;
      }

      span.error {
        display: block;
        margin: 0;
        color: red;
        font-style: italic;
      }
    </style>
  </head>

  <body class="login">
    <div id="wrap_login">
      <div id="form_box">
        <form method="POST">
          <h1>Login</h1>
<?php
  if (isset($msg)):
?>
          <span class="error"><?php echo h($msg) ?></span>
<?php
  endif;
?>
          Username:<input type="text" name="name" value="<?php echo h(isset($name) ? $name : ""); ?>" />
          <br>
          Password:<input type="password" name="password" />
          <br>
          <input type="submit" value="Login" />
        </form>
      </div>
    </div>
  </body>
</html>
