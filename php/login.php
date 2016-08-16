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
    $db = new mysqli('localhost', 'root', 'password', 'service_provider');
    $sql = "SELECT * FROM table_name WHERE email='" . $username . "' AND password='" . $password . "'"; //->Change the query according to the database table
    $result = $db->query($sql);
    if($resultmysqli->num_row > 0) {
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
