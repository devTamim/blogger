<?php

include_once "partial/function.php";
require_once "partial/db.php";
$id= $_GET['id'] ?? null;
if(!$id){
  header('Location:index.php');
  exit();
}
$errors=[];
$name ='';
$phone ='';
$email ='';
$address ='';
$image ='';
$cv ='';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $image = $_FILES['image']['name'];
    $cv = $_FILES['cv']['name'];


if(!$name ){
    $errors[]="name is required";

  }

  if(!$phone ){
    $errors[]="phone is required";

  }
  if(!$email ){
    $errors[]="email is required";

  }
  if(!$address ){
    $errors[]="address is required";

  }
  // if(!$image ){
  //   $errors[]="image is required";

  // }
  // if(!$cv ){
  //   $errors[]="CV is required";

  // }
  if(!is_dir('image')){
    mkdir('image');
  }
  // if(!is_dir('cv')){
  //   mkdir('cv');
  // }

  // if(empty($errors)){
  //   $cv = $_FILES['cv'] ?? null;
  //   $cvPath = '';
  //   if($cv && $cv['tmp_name']){

  //     $cvPath='cv/'.$cv['name'];

  //     mkdir(dirname($cvPath));
      
  //     move_uploaded_file($image['tmp_name'],$cvPath);
  //   } 
  // }
  
  if(empty($errors)){
    $image = $_FILES['image'] ?? null;

    if($image && $image['tmp_name']){

      $imagePath='image/'.randomString(8).'/'.$image['name'];

      mkdir(dirname($imagePath));
      
      move_uploaded_file($image['tmp_name'],$imagePath);
    } 
  }
  if(empty($errors)){
    $statement = $pdo->prepare("INSERT INTO candidates (post_id,name,phone,email,image,cv,address)VALUES(:post_id, :name, :phone, :email, :image, :cv,:address)");
    $statement->bindValue(':name',$name);
    $statement->bindValue(':phone',$phone);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':image',$imagePath);

    $statement->bindValue(':cv',$imagePath);
    $statement->bindValue(':address',$address);
    $statement->bindValue(':post_id',$id);
    $statement->execute();
  
    header('Location:index.php');
    // $_SESSION['status']="Post deleted successfully";
    // $_SESSION['status_code']="success";
    
  
    }
}
?>
<?php include_once "partial/header.php"?>
<div class="mt-5 d-flex justify-content-center ms-5">
<div class="col-md-10">
<h3>Compnay Information</h3>
<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $key => $error): ?>
         <div><?php echo $error ?></div>

        <?php endforeach; ?>
    </div>
    <?php endif; ?>
<form action="" method="post" enctype="multipart/form-data">

<div class="row">
    <div class="col-md-6">
        <div class="form-group my-3">
            <label class="mb-2" for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="" placeholder="Enter name" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group my-3">
            <label class="mb-2" for="">phone</label>
            <input type="number" name="phone" class="form-control" id="" placeholder="Enter your phone" >
        </div>
    </div>
 
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group my-3">
            <label class="mb-2" for="exampleInputEmail1">Email</label>
            <input type="text" name="email" class="form-control" id="" placeholder="Enter your email" value="">
        </div>
    </div>
    <div class="col-md-6">
       
        <div class="form-group my-3">
            <label class="mb-2" for="">Upload your CV</label>
            <input type="file" name="cv" class="form-control" id="">
        </div>
    </div>
 
</div>
  <div class="form-group my-3">
    <label class="mb-2" for="exampleInputPassword1">Image</label>
    <input type="file" name="image" class="form-control" id="">
  </div>
  <div class="form-group my-3">
    <label class="mb-2" for="exampleInputPassword1">Address</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="address"></textarea>
  </div>
  <!-- <div class="form-group my-3">
    <label for="exampleInputPassword1">Conform Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Conform Password">
  </div> -->

  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
</div>

    </section>
  



  </div>
<?php include_once "partial/footer.php"?>