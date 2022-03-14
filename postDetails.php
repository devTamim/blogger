<?php

require_once "partial/db.php";
$id= $_GET['id'] ?? null;

if(!$id){
    header('Location:index.php');
    exit();
}
$statement = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
$statement ->bindValue(':id',$id);
$statement ->execute();
$post = $statement->fetch(PDO::FETCH_ASSOC);

$statement = $pdo->prepare('SELECT * FROM categories ORDER BY created_at DESC');

$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);

$postStatement = $pdo->prepare('SELECT * FROM posts ORDER BY created_at DESC');

$postStatement->execute();
$posts = $postStatement->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include_once "partial/header.php"?>

 <!-- bradcam area -->
   <div class="container pt-5">
       <h1 class="text-center mt-5"><?php echo $post['title']?></h1>
           <p class="text-center mt-3 text-muted">    
               
           <span><a class="text-decoration-none text-muted" href="">Home</a></span>
           <span>/</span>
           <span>Blog details</span>
          
          </p>

   </div>
 <!-- bradcam area end -->

    <section class="container py-5 mb-5">
    <div class="row">
   
      <div class="col-md-8 mt-5 ">
    
       <img class="img-fluid" src="<?php echo $post['image']?> " alt="">
    
      <div class="shadow-lg p-3 mb-5 bg-body rounded">
      <div class="bga-primary date rounded">
         <p class="text-center fw-bold fs-4 text-white mb-0 pt-3"><?php echo  date("d",strtotime($post['created_at'])) ?></p>
         <p class="text-center fw-bold fs-6 text-white pb-2"><?php echo  date("M",strtotime($post['created_at'])) ?></p>
       </div>
      <h3 class="blog-title mb-4 ms-3"><a class="" href=""><?php echo $post['title']?> </a></h3>
       <p class="text-muted ms-3"><?php echo $post['description']?> </p>
       <p class="ms-3"><a class=" hover text-decoration-none primary" href=""><i class="fa fa-user" aria-hidden="true"></i>
       <span class="text-muted">Travel ,life style</span></a></p>
      </div>
    
      </div>
 
      <div class="col-md-4">
   <aside>
           <div class="bg-light py-5 px-4 mt-5">
            <form action="">
              <div class="input-group ">
              <input type="text" class="form-control py-4" placeholder="Search">
              <button class="bga-primary border-none text-white" type="button"><i class="fa fa-search px-3" aria-hidden="true"></i></button>
            </div>
            </form>
          </div>

          <div class="bg-light mt-5 py-5 px-4">
             <h5 class="category-title border-bottom pb-4">Category </h5>
             <?php foreach ($categories as $i=> $category) : ?>
             <p class="fs-6 text-muted border-bottom pb-4"><a class="hover text-decoration-none text-muted" href=""><?php echo $category['title']?> <span>(20)</span></a></p>
             <?php  endforeach; ?>
          </div>

          <div class="bg-light mt-5 py-5 px-4">
          <h5 class="category-title border-bottom pb-4">Recent Post </h5>
          <div>
    
            <div class="row mt-5">
            <?php foreach ($posts as $i=> $post) : ?>
              <div class="col-md-4 mt-3">
                <img class="img-fluid" src="<?php echo $post['image']?>" alt="">
              </div>
              <div class="col-md-8 mt-3">
                
                <h6 class="category-title"><a class="hover text-decoration-none text-dark " href="postDetails.php ? id=<?php echo $post['id']?>"><?php echo $post['title']?></a></h6>
                <p class="text-muted"><?php echo  date("d.M.Y",strtotime($post['created_at'])) ?></p>
              </div>
              <?php  endforeach; ?>
            </div>
     
          </div>
          </div>
   </aside>

        
      </div>
    </div>
  
    </section>
       <!-- Categories section end -->

       <!-- Featured Jobs start -->
 
       <!-- Featured Jobs end -->

       <?php include_once "partial/footer.php"?>

    <!-- Main section end -->

