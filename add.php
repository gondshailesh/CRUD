<?php
require'header.php';

if(isset($_POST['add_students'])){


    $name=$_POST['name'];
    $lastName=$_POST['last_name'];
    $age=$_POST['age'];

    if($name =="" || empty($name)){
        header('location:CREATE.PHP?message=you need to fill in the First name');
    } else if($lastName =="" || empty($lastName)){
        header('location:CREATE.PHP?message=you need to fill in the Last Name');
    }else if($age =="" || empty($age)){
        header('location:CREATE.PHP?message=you need to fill in the  Age');
    } else {
        $query="INSERT INTO `student`(`name`,`last_name`,`age` ) VALUES ('$name','$lastName','$age')"; 
        $result=(mysqli_query($conn,$query));
        if(!$result){
            die("Query Failed".mysqli_error());
        }else{
            header('location:CREATE.PHP?successful=You have successfully Added Student');
        }
    }
}

require'footer.php';

?>