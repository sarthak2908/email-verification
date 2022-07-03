<?php
require("connect.php");
if(isset($_GET['email']) && isset($_GET['code2']))
{   
    $query="SELECT * FROM `comic_book` WHERE `email`='$_GET[email]' AND `code`='$_GET[code2]'";
    $result=mysqli_query($con,$query);

        if(mysqli_num_rows($result)==1)
        {
           $result_fetch=mysqli_fetch_assoc($result);
           if($result_fetch['verify']==0)
           {
                $update="UPDATE `comic_book` SET `verify`='1' WHERE `email`=$result_fetch[email]' ";
                if(mysqli_query($con,$update))
                {
                    echo"
                    <script>alert('Email verification sucessfull');
                    window.location.href='index.php';
                    </script>;
                    "; 
                }
           }
           else{
            echo"
            <script>alert('Email already verified');
            window.location.href='index.php';
            </script>;
            ";
           }
        }
    
    else
    {
        echo"
                    <script>alert('Cannot run query');
                    window.location.href='index.php';
                    </script>;
                    ";
                
    }
}

?>  