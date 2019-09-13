<?php  
if(isset($_POST["submit"])){  
   $link = mysqli_connect("localhost", "root", "", "login");
   if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
} 
if(!empty($_POST['form2']) && !empty($_POST['pass'])) {  
    $email=$_POST['form2'];  
    $pass=$_POST['pass'];  
  
  $pass=md5($pass);
    $query=mysqli_query($link,"SELECT * FROM signup WHERE Email='".$email."' AND Password='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['Email'];  
    $dbpassword=$row['Password'];  
    }  
  
    if($email == $dbusername && $pass == $dbpassword)  
    {  
   session_start();  
    $_SESSION['sess_user']=$email; 
      $_SESSION['success'] = "You are now logged in";
  echo "Success";
    /* Redirect browser */  
    header("Location:search.html");  
    }  
    } else {  
      echo '<script type="text/javascript">

           alert("Invalid UsernameOr Password"); 
           window.location = "login.html"

</script>';
    }  
  
} else {  
    echo "All fields are required!";  
}  
} 
mysqli_close($link)
?>  