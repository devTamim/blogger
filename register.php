
<?php
session_start();

require_once "partial/db.php";


$errors=[];
$name ='';
$email ='';
$password ='';

if($_SERVER['REQUEST_METHOD']==='POST'){
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];


  if(! $name ){
    $errors[]="Name is required";

  }

  if(! $email ){
    $errors[]="Email is required";

  }
  if(! $password ){
    $errors[]="Password is required";

  }
  if(strlen($password ) < 6){
    $errors[]="Must be at least 6 charecters";

  }
  if(empty($errors)){


      $select_stmt = $pdo->prepare("SELECT name,email FROM users WHERE email=:email");
      $select_stmt->execute([':email'=>$email]);
      $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

      

      
      if(isset($row['email'])==$email){
        $errors[]="Email Address allready exists";

      }
      else{
          $hashPass=password_hash($password,PASSWORD_DEFAULT);
          $statement = $pdo->prepare("INSERT INTO users (name,email,password)
 
        VALUES( :name, :email, :password)");
            $statement->bindValue(':name',$name);
            $statement->bindValue(':email',$email);
            $statement->bindValue(':password',$hashPass);
            $statement->execute();
            
            header('Location:login.php');
      }


 
}
}

?>

<?php include_once "partial/header.php"?>
<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $key => $error): ?>
         <div><?php echo $error ?></div>

        <?php endforeach; ?>
    </div>
    <?php endif; ?>
<div class="container d-flex justify-content-center mt-5">
<div class="col-md-6 shadow-sm p-5">
<h3>Register form</h3>
<form action="" method="post">
    
  <div class="form-group my-3">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="" placeholder="Enter name" value="<?php echo $name ?>">

  </div>
  <div class="form-group my-3">
    <label for="">Email</label>
    <input type="email" name="email" class="form-control" id="" placeholder="Enter email" value="<?php echo $email ?>">

  </div>
  <div class="form-group my-3">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <!-- <div class="form-group my-3">
    <label for="exampleInputPassword1">Conform Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Conform Password">
  </div> -->

  <button type="submit" class="btn btn-primary">Submit</button> <a class="text-decoration-none" href="login.php">Log in</a>
</form>
</div>
</div>

<?php include_once "partial/footer.php"?>