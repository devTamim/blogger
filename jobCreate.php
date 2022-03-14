
<?php
session_start();


  if(!isset($_SESSION['user'])){
   header('Location:login.php');
   }
include_once "partial/function.php";
require_once "partial/db.php";

$statement = $pdo->prepare('SELECT * FROM categories ORDER BY created_at DESC');

$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);

$errors=[];
$title ='';
$description ='';
$category ='';

if($_SERVER['REQUEST_METHOD']==='POST'){
 $title = $_POST['title'];
 $description = $_POST['description'];
 $category = $_POST['category'];


  if(! $title ){
    $errors[]="Job title is required";

  }

  if(! $description ){
    $errors[]="Job description is required";

  }
  if(! $category ){
    $errors[]="Job Category is required";

  }


  


  if(!is_dir('image')){
    mkdir('image');
  }

  if(empty($errors)){
    $image = $_FILES['image'] ?? null;

    $imagePath = '';
    if($image && $image['tmp_name']){

      $imagePath='image/'.randomString(8).'/'.$image['name'];

      mkdir(dirname($imagePath));
      
      move_uploaded_file($image['tmp_name'],$imagePath);
    } 
  }
  





  if(empty($errors)){
  $statement = $pdo->prepare("INSERT INTO posts (user_id,category_id,title,description,image)
 
            VALUES(:user_id, :category_id, :title, :description,:image)");
  $statement->bindValue(':user_id',$_SESSION['user']['id']);
  $statement->bindValue(':category_id',$category);
  $statement->bindValue(':title',$title);
  $statement->bindValue(':description',$description);
  $statement->bindValue(':image',$imagePath);


  $statement->execute();
  $_SESSION['status']="Post deleted successfully";
  $_SESSION['status_code']="success";
  header('Location:jobIndex.php');

  }
  

  }
  


?>

<?php include_once "include/header.php"?>
    <!--End Main Header -->

    <!-- Sidebar Backdrop -->
    <div class="sidebar-backdrop"></div>

    <!-- User Sidebar -->
    <?php include_once "include/sidebar.php"?>
    <!-- End User Sidebar -->

    <!-- Dashboard -->
    <section class="user-dashboard">
    <?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $key => $error): ?>
         <div><?php echo $error ?></div>

        <?php endforeach; ?>
    </div>
    <?php endif; ?>
     <h1 class="m-5">Post a New Job</h1>

    <div class="m-5">
    <form action="" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Job Title</label>
    <input type="text" class="form-control" name="title">

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Job Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description"></textarea>
  </div>
   <div class="row">
   <div class="mb-3 col-md-12">
            <label for="exampleInputEmail1" class="form-label">Categories</label>
        <select class="form-select" aria-label="Default select example" name="category">
            <option selected>Open this select menu</option>
            <?php foreach ($categories as $i=> $category) : ?>
            <option value="<?php echo $category['id']?>"><?php echo $category['title']?></option>
           
            <?php endforeach; ?>
        </select>
    </div>

   </div>

 
   


    <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">

    </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    </section>
    
    <?php include_once "include/footer.php"?>
