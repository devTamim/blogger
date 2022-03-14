<?php

session_start();

  if(!isset($_SESSION['user'])){
   header('Location:login.php');
   }

   $connect=mysqli_connect("localhost","root","","jobboard");
   $candidateStatement="SELECT candidates.name,candidates.email,candidates.phone,candidates.image,posts.title FROM candidates JOIN posts WHERE candidates.post_id=posts.id";
   $candidates=mysqli_query($connect,$candidateStatement);


?>

<?php include_once "include/header.php"?>

<div class="sidebar-backdrop"></div>

<?php include_once "include/sidebar.php"?>
<section class="user-dashboard">
      <div class="dashboard-outer">
        <div class="upper-title-box">
          <h3>Manage Jobs</h3>
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
                  
                          <th>Candidate Info</th>
                       
                          <th>Image</th>
                          
                          <th>Phone</th>
                          <th></th>
                        </tr>
                      </thead>

                      <tbody>
                        
                   
                      <?php foreach ($candidates as $post) : ?>
                        <tr>
                          <td>
                            <h6>Name: <?php echo $post['name']?></h6>
                            <p class="mb-0">Email : <?php echo $post['email']?></p>
                            <p>Phone : <?php echo $post['phone']?></p>
                           
                            
                          </td>
 
                         
                   
                          <td> <img style="height:100px" src="<?php echo $post['image']?>" alt="" ></td>
                          <td class="status"><?php echo $post['phone']?></td>
                          
                          <td>
                            <div class="option-box">
                              <ul class="option-list">
               
                               
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