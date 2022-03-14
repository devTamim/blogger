<?php include_once "partial/header.php"?>
<?php
require_once "partial/db.php";
session_start();
if(isset($_SESSION['user'])){
  header('Location:dashboard.php');
}
$errors=[];

$email ='';
$password ='';

if($_SERVER['REQUEST_METHOD']==='POST'){
 $password = $_POST['password'];
 $email = $_POST['email'];

if(! $email ){
    $errors[]="Email is required";

  }
 else if(! $password ){
    $errors[]="Password is required";

  }
  else{

    $select_stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email LIMIT 1");
    $select_stmt->execute([':email'=>$email]);
    $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
    if($select_stmt->rowCount()>0){
      if(password_verify($password,$row["password"])){
          $_SESSION['user']['name']=$row["name"];
          $_SESSION['user']['email']=$row["email"];
          $_SESSION['user']['id']=$row["id"];
          header('Location:dashboard.php');

      }else{
        $errors[]="Wrong Email or password";
      }

    }else{
      $errors[]="Wrong Email or password";
    }
  }
}


?>
<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $key => $error): ?>
         <div><?php echo $error ?></div>

        <?php endforeach; ?>
    </div>
    <?php endif; ?>
<div class="container d-flex justify-content-center mt-5">
<div class="col-md-6 shadow-sm p-5">
<h3>Log In form</h3>
<form action="" method="post">
    

  <div class="form-group my-3">
    <label for="">Email</label>
    <input type="email" name="email" class="form-control" id="" placeholder="Enter email">

  </div>
  <div class="form-group my-3">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>


  <button type="submit" class="btn btn-primary">Login</button> 
</form>
</div>
</div>