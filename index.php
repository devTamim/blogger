<?php

require_once "partial/db.php";

// $search = $_GET['search'] ?? null;
// if($search){
//   $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
//   $statement -> bindValue(':title',"%$search%");

// } 
// else{
//  
// }
$statement = $pdo->prepare('SELECT * FROM categories ORDER BY created_at DESC');

$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);

$postStatement = $pdo->prepare('SELECT * FROM posts ORDER BY created_at DESC');

$postStatement->execute();
$posts = $postStatement->fetchAll(PDO::FETCH_ASSOC);

	// $supported_image = array('gif','jpg','jpeg','png');

  //  $src_file_name = 'abskwlfd.png';

  //  $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));

  //     //echo $ext; 
	// // Using strtolower to overcome case sensitive

	// if (in_array($ext, $supported_image))

	//  {

	//    echo "it's image";

	//  }

	// else 

	// {

	//    echo 'not image';

	// }


?>

<?php include_once "partial/header.php"?>

      <!-- nav end  -->

      <!-- hero Section start-->
      <section class="hero">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="media/images/slider-1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="media/images/slider-2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="media/images/slider-3.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

      </section>



      <!-- hero section end -->
   
    <!-- Main section -->
    <!-- Categories section start -->
    <section class="container py-5 mb-5">
    <div class="row">
   
      <div class="col-md-8 mt-5 ">
      <?php foreach ($posts as $i=> $post) : ?>
       <img class="img-fluid" src="<?php echo $post['image']?> " alt="">
    
      <div class="shadow-lg p-3 mb-5 bg-body rounded">
      <div class="bga-primary date rounded">
         <p class="text-center fw-bold fs-4 text-white mb-0 pt-3"><?php echo  date("d",strtotime($post['created_at'])) ?></p>
         <p class="text-center fw-bold fs-6 text-white pb-2"><?php echo  date("M",strtotime($post['created_at'])) ?></p>
       </div>
      <h3 class="blog-title mb-4 ms-3"><a class="" href="postDetails.php ? id=<?php echo $post['id']?>"><?php echo $post['title']?> </a></h3>
       <p class="text-muted ms-3"><?php echo substr_replace($post['description'], "...", 200)?> </p>
       <p class="ms-3"><a class=" hover text-decoration-none primary" href=""><i class="fa fa-user" aria-hidden="true"></i>
       <span class="text-muted">Travel ,life style</span></a></p>
      </div>
      <?php  endforeach; ?>
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

