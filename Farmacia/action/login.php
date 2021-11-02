<?php
echo $mypassword = base64_encode($_POST['password']);
echo $myusername = $_POST['username'];
$role = $_POST['role'];

if ($role == "shops") {
	include '../config/db_config.php';

$sql = "SELECT * FROM shops WHERE shop_username = '$myusername' and shop_password = '$mypassword'";
//VALIDA 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) { //el fetch_assoc 
		/*
        Devuelve un array asociativo que corresponde a la fila recuperada y mueve el puntero de datos 
        interno hacia adelante. mysql_fetch_assoc() 
        es equivalente a llamar a mysql_fetch_array() con MYSQL_ASSOC como segundo parámetro opcional
        */
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['shop_id'] = $row['shop_id'];
        $_SESSION['shop_name'] = $row['shop_name'];	
		$_SESSION['shop_currency'] = $row['shop_currency'];
        $_SESSION['shop_email'] = $row['shop_email'];	
		$_SESSION['shop_username'] = $myusername;
        $_SESSION['shop_no'] = $row['shop_no'];	
		$_SESSION['shop_logo'] = $row['shop_logo'];
		$_SESSION['role'] = $role;
		$_SESSION['shoptimezone'] = $row['shop_timezone'];
		header("location:../admin/index.php");
    }
} else {
    header("location:../?err=Account not found in database");
}
$conn->close();
}else{
	include '../config/db_config.php';

$sql = "SELECT * FROM users WHERE user_id = '$myusername' and password = '$mypassword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
		
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['fullname'] = $row['fullname'];	
        $_SESSION['myemail'] = $row['email'];	
		$_SESSION['gender'] = $row['gender'];
        $_SESSION['shop_no'] = $row['shop'];	
		$_SESSION['avatar'] = $row['avatar'];
		$_SESSION['role'] = $role;
		$_SESSION['myphone'] = $row['phone'];
		header("location:../standard_user/index.php");
    }
} else {
header("location:../?err=Account not found in database");
}
$conn->close();
	
}


?>