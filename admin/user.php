<?php
    //*** Start a session
    session_start();
    //*** Start the buffer
    ob_start();

        //Connect to the database
        require "../db.php";
    
        try {
            $dbh = new PDO("mysql:host=$hostname;
                           dbname=caseym_Aviation", $username, $password);
           
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

 
    //See if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // Isset used for buttons
        //echo "Form was submitted.";
        
        //Flag variable for valid data. Depending on what fails determines what saves
        $validEmail = true;
        $validPassword = true;
    
    
        
        if (!empty($_POST['email'])){
            
            $email = $_POST['email'];
            // Sanitize email
            $emailSanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (filter_var($emailSanitized, FILTER_VALIDATE_EMAIL))
            {
                if(strpos($emailSanitized, "@greenriver.edu")=== false && strpos($emailSanitized, "@mail.greenriver.edu")=== false){
                    $emailErr="<p class='error'>Email address is not the correct Green River email.</p>";
                    echo $emailSanitized;
                    $validEmail = false;
                }
            }
            else
            {
                $emailErr = "<p class='error'>Email address invalid!</p>";
                $validEmail = false;
            }
           
        }else{
            $validEmail = false;
            }  
        
        //Password
        if (!empty($_POST['password'])) {
            $password= $_POST['password'];
            if (strlen($password) < 8){
                $passErr = "<p class='error'>Password needs to be a minimum of 8 characters long.</p>";
                $validPassword = false;
            }
        }else{
            $validPassword = false;
        }
        

        //Depending on what is valid, determines what is updated
        if( $validEmail && $validPassword){
            //Both email and password update
            $sql = "UPDATE UserInfo SET email = :email, password = :password where id = '1'";
            $statement = $dbh->prepare($sql);
            $statement->bindParam(':email',$_POST['email']);
            $statement->bindParam(':password',$_POST['password']);
            $statement->execute();
            echo"Email and password has changed!";
        }
        else if (!$validEmail && $validPassword){
            //Password updates only WHERE sectitle = :key
            $sql = "UPDATE UserInfo SET password = :password where id = '1'";
            $statement = $dbh->prepare($sql);
            $statement->bindParam(':password',$_POST['password']);
            $statement->execute();
            echo"Password has changed!";
        }
        else if ($validEmail && !$validPassword){
            //Email updates only
            $sql = "UPDATE UserInfo SET email = :email where id = '1'";
            $statement = $dbh->prepare($sql);
            $statement->bindParam(':email',$_POST['email']);
            $statement->execute();
            echo"Email address has changed!";
        }
        
        
    }
    
?>
<h2>User Account</h2>
<p>This is our universal login that anyone in the aviation class can use.</p>
<?php

    //Display contacts from database
    $sql = "SELECT email, password FROM UserInfo";
    $result = $dbh->query($sql);
    foreach ($result as $row)
    {
        $userEmail = $row['email'];
        $userPass = $row['password'];
    }

?>
 <div class="row">
        <div class="panel panel-info col-md-5" >
                <div class="panel-heading">
                    <h3 class="panel-title">Current Email:</h3>
                </div>
                <div class="panel-body">
                    <?php printf("<p>%s</p>", $userEmail); ?>
                </div>
                <div class="panel-heading">
                    <h3 class="panel-title">Current Password:</h3>
                </div>
                <div class="panel-body">
                    <?php printf("<p>%s</p>", $userPass); ?>
                </div>

        </div>
        <div class="col-md-5">
            <form role="form" action="adminMenu.php?page=user" method="post">
              
              <div class="form-group">
                <label for="email">Email Address:</label><?php echo "<span class='alert-danger' >".$emailErr."</span>"; ?>
                <input type="email" class="form-control" name="email" id="email">
              </div>
              <div class="form-group">
                <label for="password">Password</label><?php echo "<span class='alert-danger' >".$passErr."</span>"; ?>
                <input type="password" class="form-control" name="password" id="password">
                    <p class="help-block">Minimal requirement of 8 or more characters.</p>
              </div>
                <div class="form-group">
              <button type="submit" class="btn btn-primary">Change User Account</button>
                </div>
            </form>
        </div>
 </div>
<?php
 //Flush buffer
 ob_flush();
?>