
<?php
include_once "partial/function.php";
require_once "partial/db.php";
session_start();
// $_SESSION['status']="Post deleted successfully";
// $_SESSION['status_code']="success";

$id= $_GET['id'] ?? null;

if(!$id){
    header('Location:index.php');
    exit();
}
$statement = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
$statement ->bindValue(':id',$id);
$statement ->execute();
$post = $statement->fetch(PDO::FETCH_ASSOC);

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
    $imagePath = $post['image'] ;


    if($image && $image['tmp_name']){
      if($post['image']){

        unlink($post['image']);
    }

      $imagePath='image/'.randomString(8).'/'.$image['name'];

      mkdir(dirname($imagePath));
      
      move_uploaded_file($image['tmp_name'],$imagePath);
    } 
  }
  





  if(empty($errors)){
  $statement = $pdo->prepare("UPDATE posts SET title= :title, description= :description,image= :image WHERE id=:id");
  $statement->bindValue(':title',$title);
  $statement->bindValue(':description',$description);

  $statement->bindValue(':image',$imagePath);
  $statement->bindValue(':id',$id);

  $statement->execute();

  header('Location:jobIndex.php');
  $_SESSION['status']="Post deleted successfully";
  $_SESSION['status_code']="success";
  

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
     <h1 class="m-5">Update post <?php echo $post['title']?></h1>

    <div class="m-5">
    <form action="" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Job Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $post['title']?>">

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Job Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description"><?php echo $post['description']?></textarea>
  </div>
   <div class="row">
   <div class="mb-3 col-md-12">
            <label for="exampleInputEmail1" class="form-label">Categories</label>
        <select class="form-select" aria-label="Default select example" name="category">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>


    


    <?php if($post['image']): ?>

<img src="<?php echo $post['image']?>" alt="" style="height:120px;padding-bottom:10px; width:120px" >

<?php endif; ?>
    <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ThumbNail</label>
            <input type="file" class="form-control" id="image" name="image">

    </div>
    </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    </section>
    <?php include_once "include/footer.php"?>