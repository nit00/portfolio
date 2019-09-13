<?php
if(isset($_POST["submit"])){  
	$link = mysqli_connect("localhost", "root", "", "login");
   if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_POST['name']);
$email = mysqli_real_escape_string($link, $_POST['form2']);
$pass = mysqli_real_escape_string($link, $_POST['pass']);
$repass = mysqli_real_escape_string($link, $_POST['repass']);
if (empty($name)) { echo "Username is required"; }
  if (empty($email)) { echo "Email is required"; }
  if (empty($pass)) { echo "Password is required"; }

if(!empty($_POST['form2']) && !empty($_POST['pass'])) {  
    $email=$_POST['form2'];  
    $pass=$_POST['pass'];  
  
    $query="SELECT * FROM signup WHERE Email='".$email."'" ;
    $results = mysqli_query($link, $query);
  
   $numrows=mysqli_num_rows($results); 
  
    if($numrows==0)  
    {  
    	$pwd=md5($pass);

    $sql ="INSERT INTO signup (Email,Password) VALUES('$email','$pwd')";  
    
 
        if(mysqli_query($link,$sql)&&($pass==$repass)){  
         header('Location:image.html');
    //echo "Account Successfully Created";  
    } else {  
    echo '<script type="text/javascript">

           alert("Password did not match"); 
           window.location = "signup.html"

</script>';
    }  
  
    } else {  
   
    echo '<script type=text/javascript> 
          
          alert("Email exists");
    window.location= "signup.html"
    </script>';

    }  
  
} 
else {  
  echo '<script type=text/javascript> 
          
          alert("All Fields are required!");
    window.location= "signup.html"
    </script>';
}  
}  
// close connection
mysqli_close($link);
?>  

<!--// attempt insert query execution
$sql = "INSERT INTO data (Name, Email, Password, Repassword) VALUES ('$name', '$email', '$pass', '$repass')";
if(mysqli_query($link, $sql)){
   echo "Data successfully Saved.";
} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// close connection
mysqli_close($link);
?>-->
