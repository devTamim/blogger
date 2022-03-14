
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap css -->
    <!-- <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- bootstrap css start -->
    <style>
      .primary{
        color:#fe5c51 !important;
      }
      .blog-title{
        font-weight: 600;
        margin-top:-50px;
        
      }
      .blog-title a{
        text-decoration:none;
        color:#444
      }
      .blog-title a:hover{
        color:#fe5c51;
      }
   
      .bga-primary{
        background-color:#fe5c51;
      }
      .date{
        width:100px;
        position: relative;
        bottom:50px;
        left:30px;
      
      }
      .category-title{
        font-weight: 600;
      }
      .hover:hover{
        color:#fe5c51 !important;
      }


    </style>
    <link rel="stylesheet" href="css/style.css" />

    <title>Document</title>
  </head>
  <body>
    <header>
      <!-- nav start  -->
      <nav
        class="navbar navbar-expand-lg navbar-light bg-white shadow-sm p-3 bg-body rounded"
      >
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="media/images/logo.png" alt="" height="60px" />
            <span class="ps-2">Blog <span class="primary">Buzz</span></span></a
          >
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  me-auto ms-5 mb-2 mb-lg-0 py-2">
              <li class="nav-item ps-3">
                <a
                  class="nav-link active"
                  aria-current="page"
                  href="#"
                  >Home</a
                >
              </li>
              <li class="nav-item ps-3">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item ps-3">
                <a class="nav-link" href="#">Blogs</a>
              </li>
              <li class="nav-item ps-3">
                <a class="nav-link" href="#">Contact us</a>
              </li>
            </ul>
         
            <div class="bg-light px-3 py-2 rounded-pill">
              <small>
                <a href="login.php" class="text-decoration-none">Login</a> /
                <a href="register.php" class="text-decoration-none">Register</a>
                <a href="logout.php" class="text-decoration-none">logout</a>
                </small
              >
            </div>
            
          </div>
        </div>
      </nav>
      </header>