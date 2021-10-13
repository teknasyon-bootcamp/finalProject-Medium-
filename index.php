<?php
    require_once("includes/db.class.php");
    include("includes/functions.php");
    session_start();
    if ($_SESSION):
      header('location:userpage.php'); 	
      exit();	
    
    
     else:?>
      <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/medium.css">
    <title>ekşisözlük</title>
</head>
<body>
    <div class="bg-medium-blue border-bottom-dark pb-2 fixed-top">
        <div class="container">
            <nav class=" navbar navbar-expand-lg navbar-light my-2  ">
                <a class="navbar-brand " href="#">
                    <img  src="logoimage/medium_logo.svg" alt="" width="160px"> 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">

                    <li style="font-size: 14px;" class="nav-item active ">
                      <a class="nav-link" href="denem.php">Our Story </a>
                    </li>
                    <li style="font-size: 14px;"class="nav-item active">
                      <a class="nav-link" href="#">Membership</a>
                    </li>
                    <li style="font-size: 14px;" class="nav-item active">
                      <a class="nav-link" href="#">Write</a>
                    </li>
                    <li style="font-size: 14px;" class="nav-item active">
                        <a class="nav-link" href="#">Sign In</a>
                      </li>
                    <li class="nav-item ml-3">
                    <a style="font-size: 14px;background-color: rgba(25, 25, 25, 1);"  class=" btn btn-dark border border-dark text-light rounded-pill" href="loginpage.php">Get started</a>
                    </li>
         
                  </ul>
                </div>
            </nav>

        </div>
    </div>
    <div class="bg-medium-blue border-bottom-dark pt-5 my-5 ">
        <div class="container ">
            <div class="row">
                <div class="col-6">
                    <h1 style="font-size:66px ; font-weight: 500;" >
                        Medium is a place to write, read, and connect
                    </h1>
                    <p class="lead">
                         It's easy and free to post your thinking on any topic and connect with millions of readers.
                    </p>
                    <a style="background-color: #fff;" href="#" class="btn btn-light border border-dark rounded-pill ">Start Writing</a>
                </div>
                <div class="col-6 mt-4">
                    <img class="float-right" src="https://miro.medium.com/max/436/4*BIK9VGjeCj2TaTDw4id2nA.png" alt="" width="385px">
                </div>
            </div>

        </div>
        <?php                 
      $list=listPostsIndex(2); //trendlerde eklenen son 6 postun username'i için
     //echo($list[0]["username"]);
      
    
      $allPosts=allPosts(); //tüm postlar
      $randAllPosts=randomAllPosts();//tüm postlar random şekilde
      $author=getAuthor(2);  //verilen post id'e göre ilgili postun username i
     // echo($author);
     
        
      
      ?>
      
      <?php if($_SESSION):?>
        Welcome <?php echo $_SESSION["username"]?>
        <span><a href="logout.php">Çıkış yap</a></span>
      <?php else:?>
      <?php endif ?>

    </div>
      <!--databasedeki verileri listeleme yaptığım yer  -->    

  
        <!--databasedeki verileri listeleme yaptığım yer  -->
    

    <div class="container mt-5 ">
      <div class="row">
        <div class="col-12">
          <h6><svg width="28" height="29" viewBox="0 0 28 29" fill="none" class="iw y"><path fill="#fff" d="M0 .8h28v28H0z">
          </path><g opacity="0.8" clip-path="url(#trending_svg__clip0)"><path fill="#fff" d="M4 4.8h20v20H4z"></path><circle cx="14" 
            cy="14.79" r="9.5" stroke="#000"></circle>
            <path d="M5.46 18.36l4.47-4.48M9.97 13.87l3.67 3.66M13.67 17.53l5.1-5.09M16.62 11.6h3M19.62 11.6v3" stroke="#000" 
            stroke-linecap="round"></path></g><defs><clipPath id="trending_svg__clip0">
            <path fill="#fff" transform="translate(4 4.8)" d="M0 0h20v20H0z"></path></clipPath></defs></svg> <small class="ml-2 trendingMedium font-weight-bold"> TRENDING ON MEDIUM</small></h6> 
        </div>
        <article class="col-sm-4">
          <div class="row">
            <div class="col-1">
              <h6 class="trendingNumber">
                01

              </h6>
            </div>
            <div class="col-11 mt-2 ">
              <img class="rounded ml-4 " src="https://miro.medium.com/fit/c/25/25/1*eHrwe-Sf5SCc7C2kMOcMag.png" alt="" width="20px">
              <span class="ml-1"><a class="trendingSectionTextColor" href="#">    
              <?php                    
                $list=listPostsIndex(0);
                echo($list[0]["username"]);

                ?></a> <span style="color: rgb(117, 117, 117);font-size: 13px;">in</span>
               <a class="trendingSectionTextColor" href="#">The Virago</a></span>
              <a href="#"><h5  class="trendingTitle ml-4 pt-2"><strong>
                <?php
                  $test=$allPosts[0]["title"];
                  echo $test;
                
                ?></strong> </h5></a>
              <ul class="list-inline ml-4 trendingDate">
                <li class="list-inline-item">                  
                  <?php
                  $test=$allPosts[0]["created_at"];
                  $dt=new DateTime($test);
                  echo $dt->format('Y-m-d');
                
                ?></li>
                <li class="list-inline-item"><?php echo rand(3,9) ?> min read</li>
                <li class="list-inline-item">
                  <svg style="    fill: rgb(117, 117, 117); " class="star-15px_svg__svgIcon-use mb-1" width="15" height="15" viewBox="0 0 15 15" 
                  aria-label="Member only content"><path d="M7.44 2.32c.03-.1.09-.1.12 0l1.2 3.53a.29.29 0 0 0 .26.2h3.88c.11 0 .13.04.04.1L9.8 8.33a.27.27 0 0 0-.1.29l1.2 3.53c.03.1-.01.13-.1.07l-3.14-2.18a.3.3 0 0 0-.32 0L4.2 12.22c-.1.06-.14.03-.1-.07l1.2-3.53a.27.27 0 0 0-.1-.3L2.06 6.16c-.1-.06-.07-.12.03-.12h3.89a.29.29 0 0 0 .26-.19l1.2-3.52z"></path></svg>
                </li>
              </ul>
            </div>
          </div>

        </article>
        <article class="col-sm-4">
          <div class="row">
            <div class="col-1">
              <h6 class="trendingNumber">
                02

              </h6>
            </div>
            <div class="col-11 mt-2">
              <img class="rounded ml-4 " src="https://miro.medium.com/fit/c/25/25/1*88Z0O0wD4KOrk6Y5EceZog.png" alt="" width="20px">
              <span class="ml-1"><a class="trendingSectionTextColor" href="#">                
              <?php                    
                $list=listPostsIndex(1);
                echo($list[0]["username"]);

                ?></a> <span style="color: rgb(117, 117, 117);font-size: 13px;">in</span>
               <a class="trendingSectionTextColor" href="#">One Zero</a></span>
              <a href="#"><h5  class="trendingTitle ml-4 pt-2"><strong>                
                <?php
                  $test=$allPosts[1]["title"];
                  echo $test;
                
                ?></strong> </h5></a>
              <ul class="list-inline ml-4 trendingDate">
                <li class="list-inline-item">                  
                  <?php
                  $test=$allPosts[1]["created_at"];
                  $dt=new DateTime($test);
                  echo $dt->format('Y-m-d');
                
                ?></li>
                <li class="list-inline-item"><?php echo rand(3,9) ?> min read</li>
                <li class="list-inline-item">
                  <svg style="    fill: rgb(117, 117, 117); " class="star-15px_svg__svgIcon-use mb-1" width="15" height="15" viewBox="0 0 15 15" 
                  aria-label="Member only content"><path d="M7.44 2.32c.03-.1.09-.1.12 0l1.2 3.53a.29.29 0 0 0 .26.2h3.88c.11 0 .13.04.04.1L9.8 8.33a.27.27 0 0 0-.1.29l1.2 3.53c.03.1-.01.13-.1.07l-3.14-2.18a.3.3 0 0 0-.32 0L4.2 12.22c-.1.06-.14.03-.1-.07l1.2-3.53a.27.27 0 0 0-.1-.3L2.06 6.16c-.1-.06-.07-.12.03-.12h3.89a.29.29 0 0 0 .26-.19l1.2-3.52z"></path></svg>
                </li>
              </ul>
            </div>
          </div>

        </article>
        <article class="col-sm-4">
          <div class="row">
            <div class="col-1">
              <h6 class="trendingNumber">
                03

              </h6>
            </div>
            <div class="col-11 mt-2">
              <img class="rounded-circle ml-4 " src="https://miro.medium.com/fit/c/25/25/1*WO6i2p_xtKnDvT2BUu5E7g.jpeg" alt="" width="20px">
              <span class="ml-1"><a class="trendingSectionTextColor" href="#">                
              <?php                    
                $list=listPostsIndex(2);
                echo($list[0]["username"]);

                ?></a></span>
              <a href="#"><h5  class="trendingTitle ml-4 pt-2"><strong>                
                <?php
                  $test=$allPosts[2]["title"];
                  echo $test;
                
                ?></strong> </h5></a>
              <ul class="list-inline ml-4 trendingDate">
                <li class="list-inline-item">                  
                  <?php
                  $test=$allPosts[2]["created_at"];
                  $dt=new DateTime($test);
                  echo $dt->format('Y-m-d');
                
                ?></li>
                <li class="list-inline-item"><?php echo rand(3,9) ?> min read</li>
                <li class="list-inline-item">
                  <svg style="    fill: rgb(117, 117, 117); " class="star-15px_svg__svgIcon-use mb-1" width="15" height="15" viewBox="0 0 15 15" 
                  aria-label="Member only content"><path d="M7.44 2.32c.03-.1.09-.1.12 0l1.2 3.53a.29.29 0 0 0 .26.2h3.88c.11 0 .13.04.04.1L9.8 8.33a.27.27 0 0 0-.1.29l1.2 3.53c.03.1-.01.13-.1.07l-3.14-2.18a.3.3 0 0 0-.32 0L4.2 12.22c-.1.06-.14.03-.1-.07l1.2-3.53a.27.27 0 0 0-.1-.3L2.06 6.16c-.1-.06-.07-.12.03-.12h3.89a.29.29 0 0 0 .26-.19l1.2-3.52z"></path></svg>
                </li>
              </ul>
            </div>
          </div>

        </article>
        <article class="col-sm-4 mt-3">
          <div class="row">
            <div class="col-1 mb-5">
              <h6 class="trendingNumber">
                04

              </h6>
            </div>
            <div class="col-11 mt-2 mb-5">
              <img class="rounded-circle ml-4 " src="https://miro.medium.com/fit/c/25/25/1*oNJ4N6cxMmHMI58kp6NusQ.jpeg" alt="" width="20px">
              <span class="ml-1"><a class="trendingSectionTextColor" href="#">                
              <?php                    
                $list=listPostsIndex(3);
                echo($list[0]["username"]);

                ?></a></span>
               <a href="#"><h5  class="trendingTitle ml-4 pt-2"><strong>                
                 <?php
                  $test=$allPosts[3]["title"];
                  echo $test;
                
                ?></strong> </h5></a>
              <ul class="list-inline ml-4 trendingDate">
                <li class="list-inline-item">                  
                  <?php
                  $test=$allPosts[3]["created_at"];
                  $dt=new DateTime($test);
                  echo $dt->format('Y-m-d');
                
                ?></li>
                <li class="list-inline-item"><?php echo rand(3,9) ?> min read</li>
                <li class="list-inline-item">
                  <svg style="    fill: rgb(117, 117, 117); " class="star-15px_svg__svgIcon-use mb-1" width="15" height="15" viewBox="0 0 15 15" 
                  aria-label="Member only content"><path d="M7.44 2.32c.03-.1.09-.1.12 0l1.2 3.53a.29.29 0 0 0 .26.2h3.88c.11 0 .13.04.04.1L9.8 8.33a.27.27 0 0 0-.1.29l1.2 3.53c.03.1-.01.13-.1.07l-3.14-2.18a.3.3 0 0 0-.32 0L4.2 12.22c-.1.06-.14.03-.1-.07l1.2-3.53a.27.27 0 0 0-.1-.3L2.06 6.16c-.1-.06-.07-.12.03-.12h3.89a.29.29 0 0 0 .26-.19l1.2-3.52z"></path></svg>
                </li>
              </ul>
            </div>
          </div>

        </article>
        <article class="col-sm-4 mt-3 ">
          <div class="row">
            <div class="col-1 mb-5">
              <h6 class="trendingNumber">
                05

              </h6>
            </div>
            <div class="col-11 mt-2 mb-5">
              <img class="rounded ml-4 " src="https://miro.medium.com/fit/c/25/25/0*DJ27iZ6v22LZx8AE.jpg" alt="" width="20px">
              <span class="ml-1"><a class="trendingSectionTextColor" href="#">                
              <?php                    
                $list=listPostsIndex(4);
                echo($list[0]["username"]);

                ?></a></span>
              <a href="#"><h5  class="trendingTitle ml-4 pt-2"><strong>                
                <?php
                  $test=$allPosts[4]["title"];
                  echo $test;
                
                ?></strong> </h5></a>
              <ul class="list-inline ml-4 trendingDate">
                <li class="list-inline-item">                  
                  <?php
                  $test=$allPosts[4]["created_at"];
                  $dt=new DateTime($test);
                  echo $dt->format('Y-m-d');
                
                ?></li>
                <li class="list-inline-item"><?php echo rand(3,9) ?> min read</li>
                <li class="list-inline-item">
                  <svg style="    fill: rgb(117, 117, 117); " class="star-15px_svg__svgIcon-use mb-1" width="15" height="15" viewBox="0 0 15 15" 
                  aria-label="Member only content"><path d="M7.44 2.32c.03-.1.09-.1.12 0l1.2 3.53a.29.29 0 0 0 .26.2h3.88c.11 0 .13.04.04.1L9.8 8.33a.27.27 0 0 0-.1.29l1.2 3.53c.03.1-.01.13-.1.07l-3.14-2.18a.3.3 0 0 0-.32 0L4.2 12.22c-.1.06-.14.03-.1-.07l1.2-3.53a.27.27 0 0 0-.1-.3L2.06 6.16c-.1-.06-.07-.12.03-.12h3.89a.29.29 0 0 0 .26-.19l1.2-3.52z"></path></svg>
                </li>
              </ul>
            </div>
          </div>

        </article>
        <article class="col-sm-4 mt-3">
          <div class="row">
            <div class="col-1 mb-5">
              <h6 class="trendingNumber">
                06

              </h6>
            </div>
            <div class="col-11 mt-2 mb-5">
              <img class="rounded ml-4 " src="https://miro.medium.com/fit/c/25/25/1*iETPsI-y6GMmx-AJEQRBnw@2x.png" alt="" width="20px">
              <span class="ml-1"><a class="trendingSectionTextColor" href="#">                
              <?php                    
                $list=listPostsIndex(5);
                echo($list[0]["username"]);

                ?></a> <span style="color: rgb(117, 117, 117);font-size: 13px;">in</span>
               <a class="trendingSectionTextColor" href="#">.NET</a></span>
               <a href="#"><h5  class="trendingTitle ml-4 pt-2"><strong>                
                 <?php
                  $test=$allPosts[5]["title"];
                  echo $test;
                
                ?></strong> </h5></a>
              <ul class="list-inline ml-4 trendingDate">
                <li class="list-inline-item">                  
                  <?php
                  $test=$allPosts[5]["created_at"];
                  $dt=new DateTime($test);
                  echo $dt->format('Y-m-d');
                
                ?></li>
                <li class="list-inline-item"><?php echo rand(3,9) ?> min read</li>
                <li class="list-inline-item">
                  <svg style="    fill: rgb(117, 117, 117); " class="star-15px_svg__svgIcon-use mb-1" width="15" height="15" viewBox="0 0 15 15" 
                  aria-label="Member only content"><path d="M7.44 2.32c.03-.1.09-.1.12 0l1.2 3.53a.29.29 0 0 0 .26.2h3.88c.11 0 .13.04.04.1L9.8 8.33a.27.27 0 0 0-.1.29l1.2 3.53c.03.1-.01.13-.1.07l-3.14-2.18a.3.3 0 0 0-.32 0L4.2 12.22c-.1.06-.14.03-.1-.07l1.2-3.53a.27.27 0 0 0-.1-.3L2.06 6.16c-.1-.06-.07-.12.03-.12h3.89a.29.29 0 0 0 .26-.19l1.2-3.52z"></path></svg>
                </li>
              </ul>
            </div>
          </div>

        </article>

      </div>


    </div>
    <div class="border-top-dark">
      <div class="container">
        <div class="row">
          <section class="col-sm-8 mt-5">
            <?php foreach ($randAllPosts as $post):?>
            <article class="row mb-3">
              <div class="col-8">
                <img class="rounded-circle ml-4 " src="https://miro.medium.com/fit/c/25/25/1*WO6i2p_xtKnDvT2BUu5E7g.jpeg" alt="" width="24px">
                <span class="ml-1"><a class="trendingSectionTextColor" href="#"><?php
                $author=getAuthor($post["id"]);
                echo $author;
                ?></a></span>
                <a href="#"><h6 class="trendingTitle ml-4 articlesTitle pt-2"><strong><?php echo $post["title"]
                ?></strong> </h6></a> 
                <p class="ml-4 articlesParagraph">It works every time.</p>
                <ul class="list-inline ml-4 trendingDate">
                  <li class="list-inline-item">                  <?php
                  $test=$post["created_at"];
                  $dt=new DateTime($test);
                  echo $dt->format('Y-m-d');
                
                ?></li>
                  <li class="list-inline-item">6 min read</li>
                  <li class="list-inline-item"><a class="articlesTopicTitleButton" href="$">
                  <?php
                  echo $post["topic"] ;
                  ?></a></li>
                  <li class="list-inline-item">
                    <svg style="    fill: rgb(117, 117, 117); " class="star-15px_svg__svgIcon-use mb-1" width="15" height="15" viewBox="0 0 15 15" 
                    aria-label="Member only content"><path d="M7.44 2.32c.03-.1.09-.1.12 0l1.2 3.53a.29.29 0 0 0 .26.2h3.88c.11 0 .13.04.04.1L9.8 8.33a.27.27 0 0 0-.1.29l1.2 3.53c.03.1-.01.13-.1.07l-3.14-2.18a.3.3 0 0 0-.32 0L4.2 12.22c-.1.06-.14.03-.1-.07l1.2-3.53a.27.27 0 0 0-.1-.3L2.06 6.16c-.1-.06-.07-.12.03-.12h3.89a.29.29 0 0 0 .26-.19l1.2-3.52z"></path></svg>
                  </li>
                </ul>
  
              </div>
              <div class="col-4">
               <a href="#"> <img class="mr-4" src="https://miro.medium.com/fit/c/250/168/1*EUDj9zUwPsZrepY4lF9AyQ.jpeg" alt="" width="200"></a>
              </div>
            </article>
            <?php endforeach?>
            <article class="row mb-3">
              <div class="col-8">
                <img class="rounded ml-4 " src="https://miro.medium.com/fit/c/25/25/1*aPis1XKDqBxBUk6JoUiayA.png" alt="" width="24px">
                <span class="ml-1"><a class="trendingSectionTextColor" href="#">Garfield Hylton</a> <span style="color: rgb(117, 117, 117);font-size: 13px;">in</span>
                 <a class="trendingSectionTextColor" href="#">Momentum </a></span>
                <a href="#"> <h6 class="trendingTitle ml-4 articlesTitle pt-2"><strong>Racist White Gamers Came For This Black Woman Writer. Here’s What Happened.</strong> </h6></a> 
                <p class="ml-4 articlesParagraph">I spoke with Ash Parrish, a former Kotaku employee, about what it’s like to be a Black woman at one of the world’s most popular gaming…</p>
                <ul class="list-inline ml-4 trendingDate">
                  <li class="list-inline-item">Aug 21</li>
                  <li class="list-inline-item">8 min read</li>
                  <li class="list-inline-item"><a class="articlesTopicTitleButton" href="$">Race</a></li>
                  <li class="list-inline-item">
                    <svg style="    fill: rgb(117, 117, 117); " class="star-15px_svg__svgIcon-use mb-1" width="15" height="15" viewBox="0 0 15 15" 
                    aria-label="Member only content"><path d="M7.44 2.32c.03-.1.09-.1.12 0l1.2 3.53a.29.29 0 0 0 .26.2h3.88c.11 0 .13.04.04.1L9.8 8.33a.27.27 0 0 0-.1.29l1.2 3.53c.03.1-.01.13-.1.07l-3.14-2.18a.3.3 0 0 0-.32 0L4.2 12.22c-.1.06-.14.03-.1-.07l1.2-3.53a.27.27 0 0 0-.1-.3L2.06 6.16c-.1-.06-.07-.12.03-.12h3.89a.29.29 0 0 0 .26-.19l1.2-3.52z"></path></svg>
                  </li>
                </ul>
  
              </div>
              <div class="col-4">
               <a href="#">  <img class="mr-4" src="https://miro.medium.com/fit/c/250/168/1*-6T8wMBdzmW8a7Va2-9H8A.jpeg" alt="" width="200"></a>
              </div>
            </article>
            <article class="row mb-3">
              <div class="col-8">
                <img class="rounded ml-4 " src="https://miro.medium.com/fit/c/25/25/1*8ndrLe4Ldljn8ba1A-FbFA.png" alt="" width="24px">
                <span class="ml-1"><a class="trendingSectionTextColor" href="#">Ella Alderson</a> <span style="color: rgb(117, 117, 117);font-size: 13px;">in</span>
                 <a class="trendingSectionTextColor" href="#">Predict </a></span>
                <a href="#">
                  <h6 class="trendingTitle ml-4 articlesTitle pt-2"><strong>This Long-Awaited Technology May Finally Change the World</strong> </h6>
                </a>
                 
                <p class="ml-4 articlesParagraph">Solid-state batteries are poised to emerge in the coming years</p>
                <ul class="list-inline ml-4 trendingDate">
                  <li class="list-inline-item">May 30</li>
                  <li class="list-inline-item">6 min read</li>
                  <li class="list-inline-item"><a class="articlesTopicTitleButton" href="$">Science</a></li>
                  <li class="list-inline-item">
                    <svg style="    fill: rgb(117, 117, 117); " class="star-15px_svg__svgIcon-use mb-1" width="15" height="15" viewBox="0 0 15 15" 
                    aria-label="Member only content"><path d="M7.44 2.32c.03-.1.09-.1.12 0l1.2 3.53a.29.29 0 0 0 .26.2h3.88c.11 0 .13.04.04.1L9.8 8.33a.27.27 0 0 0-.1.29l1.2 3.53c.03.1-.01.13-.1.07l-3.14-2.18a.3.3 0 0 0-.32 0L4.2 12.22c-.1.06-.14.03-.1-.07l1.2-3.53a.27.27 0 0 0-.1-.3L2.06 6.16c-.1-.06-.07-.12.03-.12h3.89a.29.29 0 0 0 .26-.19l1.2-3.52z"></path></svg>
                  </li>
                </ul>
  
              </div>
              <div class="col-4">
               <a href="#"> <img class="mr-4" src="https://miro.medium.com/fit/c/250/168/1*GlIDBz93SkiY0H9Ib7rObQ.jpeg" alt="" width="200"> </a> 
              </div>
            </article>
  
          </section>
          <aside class="col-sm-4 topicsList mt-5">
            <p>DISCOVER MORE OF WHAT MATTERS TO YOU</p>
            <ul class="list-inline  aside-buttons mt-2 ">
              <li class="list-inline-item">
                <a class="btn btn-sm btn-outline-secondary" href="#">Self</a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-sm btn-outline-secondary" href="#">Relationships</a>
  
              </li>
              <li class="list-inline-item">
                <a class="btn btn-sm btn-outline-secondary" href="#">Data Science</a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-sm btn-outline-secondary" href="#">Programming</a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-sm btn-outline-secondary" href="#">Productivity</a>
  
              </li>
              <li class="list-inline-item">
                <a class="btn btn-sm btn-outline-secondary" href="#">Javascript</a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-sm btn-outline-secondary" href="#">Machine Learning</a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-sm btn-outline-secondary" href="#">Politics</a>
  
              </li>
              <li class="list-inline-item">
                <a class="btn btn-sm btn-outline-secondary" href="#">Health</a>
              </li>
            </ul>
          </aside>
        </div>
      </div>
    </div>

    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php endif; ?>
    
