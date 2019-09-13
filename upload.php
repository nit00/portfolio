<?php
 
    /*-- we included connection files--*/
    $host ="localhost";
    $uname = "root";
    $pwd = "";
    $db_name = "login";
 
    /*--- we created a variables to display the error message on design page ------*/
    $error = "";
 
    if (isset($_POST["submit"]) == "Submit")
    {  
        $uploadOk = 1;
 
        $file_tmp = $_FILES["image"]["tmp_name"];
        $file_name = $_FILES["image"]["name"];
 
        /*image name variable that you will insert in database ---*/
        $image_name = $_POST["user"];
 
        //image directory where actual image will be store
        $file_path = "uploads/".$file_name;
 
        $target_file = $file_path . basename($file_name);   
 
    /*---------------- php textbox validation checking ------------------*/
    if($image_name == "")
    {
        $error = "Please enter Image name.";
    }
 
    /*-------- now insertion of image section has start -------------*/
    
        if(file_exists($file_path))
        {
            $error = "Sorry,The <b>".$file_name."</b> image already exist.";
            $uploadOk = 0;
        }
            else
            {
                $result = mysqli_connect($host, $uname, $pwd) or die("Connection error: ". mysqli_error());
                 echo uniqid(fif);
                mysqli_select_db($result, $db_name) or die("Could not Connect to Database: ". mysqli_error());
                mysqli_query($result,"INSERT INTO images (filename,username) VALUES('$file_path','$image_name')") or die ("image not inserted".mysqli_error());
                move_uploaded_file($file_tmp,$file_path);
                header("Location:details.html");
                 
}


 header("Location:index.html");
}
mysqli_close($result);
?>