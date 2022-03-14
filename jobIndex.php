<?php
require_once "partial/db.php";
session_start();

  if(!isset($_SESSION['user'])){
   header('Location:login.php');
   }
  
   $postStatement = $pdo->prepare('SELECT * FROM posts  ORDER BY created_at DESC ');
   $postStatement->execute();
   $posts = $postStatement->fetchAll(PDO::FETCH_ASSOC);



?>

<?php include_once "include/header.php"?>

<div class="sidebar-backdrop"></div>

<?php include_once "include/sidebar.php"?>
<section class="user-dashboard">
      <div class="dashboard-outer">
        <div class="upper-title-box">
          <h3>Manage Posts</h3>
          <div class="text">Ready to jump back in?</div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>My Job Listings</h4>

      
                </div>

                <div class="widget-content">
                  <div class="table-outer">
                    <table class="default-table manage-job-table">
                      <thead>
                        <tr>
                  
                          <th>Title</th>
                          <th>Image</th>
                       
                          <th>Created At</th>
                          
                         
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        
                   
                      <?php foreach ($posts as $i=> $post) : ?>
                        <tr>
                          <td>
                            <h6><a href="candidateIndex.php ? id=<?php echo $post['id']?>"><?php echo $post['title']?></a></h6>
                            
                          </td>
                      <td>
                        <img style="height:80px;" src="<?php echo $post['image']?>" alt="">
                      </td>
                         
                          <td><?php echo  date("d/m/Y",strtotime($post['created_at'])) ?></td>
                         
                          <td>
                            <div class="option-box">
                              <ul class="option-list">
                                <a class="btn btn-primary text-white" href="jobEdit.php ? id=<?php echo $post['id']?>">Edit</a>
                                <!-- <input type="hidden" class="delete_id_value " value="<?php echo $post['id']?>">
                                <a class="delete_btn btn btn-primary text-white" href="javascript:void(0)">Edit</a> -->
                                <form action="jobDelete.php" method="post" style="display:inline-block">
                                      <input type="hidden" name="id" value="<?php echo $post['id']?>">
                                      <button type="submit" class="btn btn-danger ms-2">Delete</button>
                                </form> 
                               
                              </ul>
                            </div>
                          </td>
                        </tr>
                        <?php  endforeach; ?>
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>



<?php include_once "include/footer.php"?>