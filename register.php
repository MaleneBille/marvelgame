<?php require_once('includes/db.php');?>
<?php require_once('includes/header.php');?>

<div class="container d-flex justify-content-center mb-2">
<?php

$flag = false; 

if(isset($_POST['submit'])){

// RENSER FOR KARAKTERER, SOM KAN BRUGES TIL SQL ANGREB
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass1 = mysqli_real_escape_string($conn, $_POST['password']);
$pass2 = mysqli_real_escape_string($conn, $_POST['password2']);

// CHECKER OM DE TO PASSWORD STEMMER OVERENS
if($pass1 == $pass2){
   $flag = true;   
}

// SALT OG HASH AF PASSWORD - ØGER SIKKERHED VED AT GØRE DET SVÆRT AT FINDE
if($flag == true){
        $salt = "kpwdjfbgpkajhrgoåihargåouh¨028g" . $pass1 . "kjshdgflkjhsdæfgkjh";

        $hashed = hash('sha512', $salt);

        $sql ="INSERT INTO users(username, email, password) VALUES('$username', '$email', '$hashed')";

        if ($conn->query($sql) === TRUE) {
            echo "You are now a member of the Marvel team!";
        } else {
            echo "There was an error - please check your input fields!";
        }
  
    }
}
?>
 </div>

<!-- REGISTER FORM --> 
<div class="container">
    <div class="row game-text">
        <div class="col-8">
            <h1>Join the Marvel team</h1>
        </div>
    </div>
</div>

<div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-5">
                <form action="register.php" method="POST" id="checkform" class="needs-validation" novalidate>
                    
                    <div class=" form-group">
                    <input placeholder="Username" type="text" class="form-control" name="username" id="username" required>
                        <!-- VALIDATION -->
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                        <div class="invalid-feedback">
                        Please provide a valid username
                        </div>
                    </div>

                    <div class=" form-group">
                    <input placeholder="E-mail" type="text" class="form-control" name="email" id="email" required>
                        <!-- VALIDATION -->
                        <div class="valid-feedback">
                        Perfect!
                        </div>
                        <div class="invalid-feedback">
                        Please provide a valid e-mail
                        </div>    
                    </div>
                    
                    <div class="form-group">
                    <input placeholder="Password" type="password" class="form-control" name="password" id="pass1" required>
                        <!-- VALIDATION -->
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                        <div class="invalid-feedback">
                        Please provide a valid password
                        </div>    
                    </div>
                    
                    <div class=" form-group">
                    <input placeholder="Repeat password" type="password" class="form-control" name="password2" id="pass2" required>
                        <!-- VALIDATION -->
                        <div class="valid-feedback">
                        Perfect!
                        </div>
                        <div class="invalid-feedback">
                        Please repeat your password
                        </div>    
                    </div>

                    <!-- CHECKBOX -->
                    <div class="row justify-content-center">
                        <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="permission" id="permission" required> 
                        <div class="invalid-feedback">
                        </div>
                        <label class="form-check-label" for="permission">Yes, I am a true superhero!</label>
                        </div>
                        <input type="hidden" name="" value="">
                        <input type="hidden" name="" value="">
                    </div>
                    
                    <!-- BUTTON -->
                    <div class="row mb-4 justify-content-center">
                        <input name="submit" type="submit" id="sendlogin" class="button-send" value="Create user" />
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once('includes/footer.php');?>
