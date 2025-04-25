<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Predicteam</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body class="main-layout">
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="" /></div>
      </div>
      <div id="mySidepanel" class="sidepanel">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
         <a class="active" href="index.php">Home</a>
         <a href="about.php">About</a>
         <a href="games.php">Game Guide</a>
         <a href="contact.php">Contact</a>
      </div>
      <header>
         <div class="head-top">
            <div class="container-fluid">
               <div class="row d_flex">
                  <div class="col-sm-3">
                     <div class="logo">
                        <a href="index.php"><img width="57%" style="position: relative; bottom: 6vh"src="images/newgameorg.png" /></a>
                     </div>
                  </div>
                  <div class="col-sm-9">
                     <ul class="email text_align_right">
                        <li> <button style="position: relative; bottom: 5vh"class="openbtn" onclick="openNav()"><img src="images/menu_btn.png"></button></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <div class="banner_main">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="club">
                     <figure><img class="sm_n0" src="images/bbnner.png"> <img class="tes_n0" src="images/banner1.jpg"> </figure>
                     <div class="poa_t">
                        <h1>Prediction Game</h1>
                        <p>"Guess the cricket match outcomes and test your predictions in this fun cricket game!"</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="footbol">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="bluid">
                                    <div class="foot_img">
                                       <figure><img src="images/cricketball2.png" alt="#"/></figure>
                                    </div>
                                    <div class="snippets"><h3>PLAY YOUR OWN TOURNAMENT!</h3></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="bluid">
                                    <div class="foot_img">
                                       <figure><img src="images/group3.png" alt="#"/></figure>
                                    </div>
                                    <div class="snippets"><h3>ENGAGE WITH YOUR FAMILY AND FRIENDS!</h3></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="bluid">
                                    <div class="foot_img">
                                       <figure><img src="images/fav.png" alt="#"/></figure>
                                    </div>
                                    <div class="snippets"><h3>SUPPORT YOUR FAVOURITE TEAM!</h3></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                     </a>
                  </div>
                  <div class="button_container">
                     <a class="read_more" href="signup.php?type=signUp">Sign up </a>
                     <a class="read_more" href="signup.php?type=signIn">Login </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="sports">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="titlepage text_align_center">
                     <h2>Game Guide</h2>
                  </div>
               </div>
            </div>
            <div class="row d_flex">
               <div class="col-md-3">
                  <div class="sports_main text_align_center">
                     <figure><img src="images/2.jpg" alt="#"/></figure>
                     <div class="sports_text">
                        <h3 class="dark3">Predict Matches</h3>
                        <p>Make your game predictions and compete against others to showcase your sports expertise.</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="sports_main text_align_center">
                     <figure><img class="dorder" src="images/1.jpg" alt="#"/></figure>
                     <div class="sports_text">
                        <h3 class="dark3">Join Groups</h3>
                        <p>Connect with fellow fans <br> by creating or joining groups <br>for your favorite<br> tournaments.</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="sports_main text_align_center">
                     <figure><img src="images/3.jpg" alt="#"/></figure>
                     <div class="sports_text">
                        <h3 class="dark3">Leaderboard</h3>
                        <p>Keep an eye on the leaderboard to track your ranks and enjoy the thrill of competition!</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_center">
                     <h2>About Our Game</h2>
                     <div class="about_class">
                        <p>Welcome to <strong>Predicteam</strong>, your go-to destination for sports prediction and interactive gaming! At Predicteam, we invite you to unleash the strategist in you by predicting match outcomes and cheering for your favorite teams. Whether you're a sports enthusiast or just love the thrill of predicting winners, Predicteam offers a unique platform where you can not only showcase your sports intuition but also create bonds by forming groups with family and friends. Imagine the excitement of starting your own tournaments and engaging in friendly competitions. Join Predicteam and elevate your sports experience – because here, every prediction counts, and every team has its supporters!</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
               </div>
            </div>
         </div>
      </div>
      <footer>
         <div class="footer">
            <div class="copyright text_align_center">
               <div class="container">
                  <div class="row">
                     <div class="col-md-8 offset-md-2">
                        <p>© 2020 All Rights Reserved.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>
