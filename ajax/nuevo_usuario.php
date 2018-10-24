<?php
include('is_logged.php');

            require_once ("../config/db.php");
			require_once ("../config/conexion.php");
			
				
                $firstname = mysqli_real_escape_string($con,(strip_tags($_POST["firstname"],ENT_QUOTES)));
				$lastname = mysqli_real_escape_string($con,(strip_tags($_POST["lastname"],ENT_QUOTES)));
				$user_name = mysqli_real_escape_string($con,(strip_tags($_POST["user_name"],ENT_QUOTES)));
                $user_email = mysqli_real_escape_string($con,(strip_tags($_POST["user_email"],ENT_QUOTES)));
				$user_password = $_POST['user_password_new'];
				$date_added=date("Y-m-d H:i:s");
               
				$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
					
               
					
                    $sql = "INSERT INTO users (firstname, lastname, user_name, user_password_hash, user_email, date_added)
                            VALUES('".$firstname."','".$lastname."','" . $user_name . "', '" . $user_password_hash . "', '" . $user_email . "','".$date_added."');";
                            
                    $query_new_user_insert = mysqli_query($con,$sql);

                    
                    if ($query_new_user_insert) {
                        echo "La cuenta ha sido creada con éxito.";
                    } else {
                        echo"Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
                    }
                
            
     
				
			

?>