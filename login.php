<?php require_once('includes/db.php');?>
<?php require_once('includes/header.php');?>

<?php

$output = "";

// 
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $salt = "kpwdjfbgpkajhrgoåihargåouh¨028g" . $password . "kjshdgflkjhsdæfgkjh";

    $hashed = hash('sha512', $salt);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$hashed'"; 

     $result = mysqli_query($conn,$sql) or die(mysql_error());

     // BESKED TIL BRUGER OM LOGIN STATUS.
     $rows = mysqli_num_rows($result);
        if($rows==1){
         $_SESSION['username'] = $username;
         echo "<p class='pl-4'>You are now logged in.</p>";

    }

}
?>

<div class="container">
    <div class="row game-text">
        <div class="col-8">
            <h1>Please sign in</h1>
        </div>
    </div>
</div>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">

<!-- NAVN OG E-MAIL -->
  <form class="needs-validation" method="POST" action="login.php" novalidate>
    <div class="form-group input-box">
      <input type="text" class="form-control pl-0" placeholder="Username" name="username" required>
      <div class="valid-feedback"></div>
        <div class="invalid-feedback">
          OOPS! You need to write your username
        </div>
      </div>
    <div class="form-group input-box">
      <input type="text" class="form-control pl-0" placeholder="Password" name="password" required>
      <div class="invalid-feedback">
        OOPS! You need to write your password
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
  </div>

  <!-- Button -->
    <div class="row mb-4 justify-content-center">
      <input name="submit" type="submit" id="sendlogin" class="button-send" value="Login" />
    </div>
  </form>
</div>
</div>
</div>

<?php require_once('includes/footer.php');?>