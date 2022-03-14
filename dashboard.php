
<?php
require_once "partial/db.php";
session_start();

  if(!isset($_SESSION['user'])){
   header('Location:login.php');
   }
   include_once "partial/function.php";
$userStatement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$userStatement ->bindValue(':id',$_SESSION['user']['id']);
$userStatement ->execute();
$user = $userStatement->fetch(PDO::FETCH_ASSOC);

$postStatement = $pdo->prepare('SELECT * FROM posts WHERE user_id = :user_id ORDER BY created_at DESC ');
$postStatement ->bindValue(':user_id',$_SESSION['user']['id']);
$postStatement->execute();
$posts = $postStatement->fetchAll(PDO::FETCH_ASSOC);



$errors=[];
$company_name ='';
$office_phone ='';
$office_email ='';
$office_address ='';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $company_name = $_POST['company_name'];
    $office_phone = $_POST['office_phone'];
    $office_email = $_POST['office_email'];
    $office_address = $_POST['office_address'];


if(!$company_name ){
    $errors[]="Job title is required";

  }

  if(!$office_phone ){
    $errors[]="Job description is required";

  }
  if(!$office_email ){
    $errors[]="Job Category is required";

  }
  if(!$office_address ){
    $errors[]="Job type is required";

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
      <div class="ms-5">
        <div class="row">
          <div class="col-md-3 bg-success py-5">
            <h1 class="text-white text-center"><a href=""  class="text-white">Posts</a></h1>
            <h3 class="text-white text-center"><?php echo count($posts)?></h3>

          </div>
          <div class="col-md-3 bg-primary py-5 ms-5">
            <h1 class="text-white text-center"><a href=""  class="text-white">Candidate</a></h1>
            <h3 class="text-white text-center">03</h3>

          </div>
        </div>
      </div>
      <div class="mt-5 d-flex ms-5">


    </section>
  



  </div>



 


  <?php include_once "include/footer.php"?>