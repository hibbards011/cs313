<?php
  // This will change will part of the website is active
  $is_page = 1;
  $page = $_SERVER['REQUEST_URI'];

  // Where is the user?
  if (strpos($page, 'finished_projects.php') !== false) {
    $is_page = 2;
  } elseif (strpos($page, 'details.php') !== false || strpos($page, 'edit.php') !== false ||
    strpos($page, 'add_new_project') !== false) {
    $is_page = 3;
  } elseif (strpos($page, 'sign_up.php') !== false) {
    $is_page = 4;
  } elseif (strpos($page, 'profile.php') !== false) {
    $is_page = 4;
  } else {
    $is_page = 1;
  }
?>
<?php
  // Hurry and grab the database!
  require_once "../db/dbConnector.php";
  $db = loadDatabase();

  // And the login script
  include_once "login.php";

  $name = "Sign Up";
  $is_login = 0;

  // Check if we are logged in!
  if (isset($_SESSION["username"])) {
    $name = $_SESSION["name"];
    $is_login = 1;
  }
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">BYU-I ECEN</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class=<?php echo ($is_page === 1) ? "active" : "" ?>>
          <a href="index.php">Current Projects</a>
        </li>
        <li class=<?php echo ($is_page === 2) ? "active" : "" ?>>
          <a href="finished_projects.php">Completed Projects</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class=<?php echo ($is_page === 4) ? "active" : ""; ?>>
          <a href="<?php echo ($is_login === 1) ? "profile.php": "sign_up.php"?>">
            <span class="glyphicon glyphicon-user"></span>
            &nbsp;<?php echo $name; ?>
          </a>
        </li>
        <li>
          <a class="<?php echo ($is_login === 1) ? "logout": "login"?>" href="#">
          <span class="glyphicon glyphicon-log-<?php echo ($is_login === 1) ? "out": "in" ?>"></span>
           &nbsp;<?php echo ($is_login === 1) ? "Logout": "Login"; ?>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Show this modal to login the user! -->
<div class="container">
  <div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="h4-header"><span class="glyphicon glyphicon-log-in"></span> Login</h4>
        </div>
        <div class="modal-body">
          <form role="form" action="" method="post">
            <div class="login-error">
              <p>Username or Password is Invalid</span></p>
              <br />
            </div>
            <div class="form-group">
              <label for="usrname">Username:</label>
              <input name="usrname" type="text" class="form-control" id="usrname" placeholder="Enter username or email">
            </div>
            <div class="form-group">
              <label for="psw">Password:</label>
              <input name="pssword" type="password" class="form-control" id="password" placeholder="Enter password">
            </div>
            <button name="submit" type="submit" class="btn btn-default btn-success" id="submit">Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-defualt btn-danger big-button" data-dismiss="modal">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="modal fade" id="check-faculty" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header orange">
          <button type="button" class="orange close" data-dismiss="modal">&times;</button>
          <h3 class="h4-header orange"><span class="glyphicon glyphicon-lock"></span> You must enter a password to verify you are a faculty member</h3>
        </div>
        <div class="modal-body">
          <form role="form" action="" method="post">
            <div class="pass-error">
              <p>Password is Invalid</span></p>
              <br />
            </div>
            <div class="form-group">
              <label for="psw">Password:</label>
              <input name="verify_password" type="password" class="form-control" placeholder="Enter password">
            </div>
            <button name="submit_password" type="submit" class="btn btn-default btn-success" id="submit_password">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-danger big-button" data-dismiss='modal'>Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>