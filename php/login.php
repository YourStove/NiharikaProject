<?php

$username=$POST['username'];
$password=$POST['password'];
mysql_connect("localhost","root","");
mysql_select_db("service_provider");

$result = array();
if(isset($_POST['username']) && isset($_POST['password'])) {
  if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    //Do the login checking here
    //...

    if(true) {
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
