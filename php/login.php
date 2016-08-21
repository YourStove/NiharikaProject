<?php

$result = array();
if(isset($_POST['username']) && isset($_POST['password'])) {
  if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    //Do the login checking here
    $dbc = new mysqli('localhost', 'root', 'password', 'service_provider');
    $sql = "SELECT * FROM user WHERE username='" . $username . "' AND user_pwd='" . $password . "'"; //->Change the query according to the database table
    $result = mysqli_query($dbc, $sql);
    if(mysqli_num_rows($result) > 0) {
      //User successfully logged in
      //Login pass
      $result = array(
        'status' => true,
        'msg' => 'Login Successful.'
      );
    } else {
      //Login Fail
      $result = array(
        'status' => false,
        'msg' => 'Login Fail. Please provide the correct credentials.'
      );
    }
  } else {
    $result = array(
      'status' => false,
      'msg' => 'Please submit all the details.'
    );
  }
} else {
  $result = array(
    'status' => false,
    'msg' => 'Please submit all the details.'
  );
}
echo json_encode($result);
?>
