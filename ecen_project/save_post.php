<!-- save_post.php -->
<?php
  session_start();

  if (isset($_POST['id'])) {
    $_SESSION['id'] = $_POST['id'];
    $_SESSION['edit'] = $_POST['name'];
  } elseif (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
  }
?>