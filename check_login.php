<?php 
session_start();
// print_r($_POST);
// exit();

     if(isset($_POST['username'])){
        //connection
                  include("condb.php");
        //รับค่า 
                  $username = mysqli_real_escape_string($con,$_POST['username']);
                  $password = mysqli_real_escape_string($con,$_POST['password']);
      //  query login
                  $sql_login = "SELECT * FROM tbl_login
                  WHERE username = '".$username."' AND password = '".$password."'
                  ";
                  $result = mysqli_query($con, $sql_login);
                  //  echo $sql_login;
                  //  exit();

                   if(mysqli_num_rows($result)==1){
                        $row = mysqli_fetch_array($result);
                        $_SESSION["user_id"] = $row["user_id"];
                        $_SESSION["user_level"] = $row["user_level"];
                        $_SESSION["u_name"] = $row["u_name"];
                        $_SESSION["u_lastname"] = $row["u_lastname"];
                        $_SESSION["user_status"] = $row["user_status"];

                        if ($row["user_level"] == "admin"){
                              Header("Location: admin/");
                        }elseif ($row["user_level"] == "employee"){
                              Header("Location: employee/");
                        }elseif ($row["user_level"] == "worker"){
                               Header("Location: worker/");
                   }else{
                        echo "<script>";
                        echo "alert(\" username หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                        echo "</script>";
                           
                  }        
            }
      }     
?>