<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PENCARIAN BARANG HILANG</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
<link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  
  <!-- Bootstr<ap CSS File -->
  <link href="<?php echo base_url().'depan/lib/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url().'depan/lib/font-awesome/css/font-awesome.min.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'depan/lib/animate/animate.min.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'depan/lib/ionicons/css/ionicons.min.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'depan/lib/owlcarousel/assets/owl.carousel.min.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'depan/lib/lightbox/css/lightbox.min.css'?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url().'depan/css/style.css'?>" rel="stylesheet">

  
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">
      <div id="logo" class="pull-left">
      	<a class="h5co"><img src="assets/logo-akakom-horizontal1.png" width="300px" height="100px"> </a>

     <h3>BERITA SEPUTARAN BARANG HILANG</h3>
      

      </div>
 
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="<?php echo base_url().'pendaftaran'?>">SIGN UP</a></li>
          
          <li><a href="<?php echo base_url().'user/user'?>">LOGIN USER</a></li>
          <li><a href="<?php echo base_url().'Administrator'?>">LOGIN ADMIN</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
      
    </div>
    

  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="<?php echo base_url().'theme/images/gambar-pelapor.jpg'?>" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Pencarian Barang Hilang</h2>
		   					<h3><p>Ayo Buat Laporan Kehilangan Dan Temuan Anda </p></h3>
           
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="<?php echo base_url().'theme/images/pelapor1.jpg'?>" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
               <h2>Pencarian Barang Hilang</h2>
               <h3><p>Ayo Buat Laporan Kehilangan Dan Temuan Anda </p></h3>

         
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="<?php echo base_url().'theme/images/pelapor2.jpg'?>" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Pencarian Barang Hilang</h2>
                <h3><p>Ayo Buat Laporan Kehilangan Dan Temuan Anda </p></h3>

                
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="<?php echo base_url().'theme/images/pelapor3.jpg'?>" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
               <h2>Pencarian Barang Hilang</h2>
               <h3><p>Ayo Buat Laporan Kehilangan Dan Temuan Anda </p></h3>


              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="<?php echo base_url().'theme/images/pelapor4.jpg'?>" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
               <h2>Pencarian Barang Hilang</h2>
               <h3><p>Ayo Buat Laporan Kehilangan Dan Temuan Anda </p></h3>

               
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

   

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>NEWS BERITA KEHILANGAN DAN TEMUAN</h3>
          <p>BERITA SEPUTAR BARANG HILANG STMIK AKAKOM YOGYAKARTA
			</p>
        </header>

        <div class="row about-cols">


          					<?php foreach($data->result() as $row):?>
                       
          


          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url().'assets/images/'.$row->tulisan_gambar?>" alt="" class="img-fluid">
                <header class="section-header">
          <h3><?php echo $row->tulisan_kategori_nama;?></h3>
        </header>
              </div>
              <h2 class="title"><?php echo substr( $row->tulisan_judul,0,200);?></a></h2>
              <p>
              <?php echo substr( $row->tulisan_isi,0,5000);?>
              </p>
            </div>
          </div>
          <?php endforeach;?>


       

        </div>

      </div>
      <div> 
      </div>
    </section><!-- #about -->

    
   
   

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    
  <div>
    <strong> 
      <ul>
        <br><h5>GET CONNECTED WITH SOCIAL MEDIA</h5></br>
        &emsp;&ensp;&emsp;&emsp;&emsp;&emsp;<i><a href='mailto:wisnuandrian44@gmail.com' target='_blank'><i class= "fa fa-google" style="font-size:48px;color: white;"></i></a></i>&emsp;&ensp;
        <i><a href='https://www.instagram.com/wisnu_andrian_' target='_blank'><i class= "fa fa-instagram" style="font-size:48px;color:white"></i></a></i>&emsp;&ensp;
        <i><a href='https://wa.me/6287836741009' target='_blank'><i class= "fa fa-whatsapp" style="font-size:48px;color:grean"></i></a></i>
      </ul>
    </strong>
  </div>
    
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>PENCARIAN BARANG HILANG</strong>. All Rights Reserved 
      </div>
      
        
      
    
     
      
    </div>
  </footer><!-- #footer -->
  
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  

  <!-- JavaScript Libraries -->
  <script src="<?php echo base_url().'depan/lib/jquery/jquery.min.js'?>"></script>
  <script src="<?php echo base_url().'depan/lib/jquery/jquery-migrate.min.js'?>"></script>
  <script src="<?php echo base_url().'depan/lib/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
  <script src="<?php echo base_url().'depan/lib/easing/easing.min.js'?>"></script>
  <script src="<?php echo base_url().'depan/lib/superfish/hoverIntent.js'?>"></script>
  <script src="<?php echo base_url().'depan/lib/superfish/superfish.min.js'?>"></script>
  <script src="<?php echo base_url().'depan/lib/wow/wow.min.js'?>"></script>
  <script src="<?php echo base_url().'depan/lib/waypoints/waypoints.min.js'?>"></script>
  <script src="<?php echo base_url().'depan/lib/counterup/counterup.min.js'?>"></script>
  <script src="<?php echo base_url().'depan/lib/owlcarousel/owl.carousel.min.js'?>"></script>
  <script src="<?php echo base_url().'depan/lib/isotope/isotope.pkgd.min.js'?>"></script>
  <script src="<?php echo base_url().'depan/lib/lightbox/js/lightbox.min.js'?>"></script>
  <script src="<?php echo base_url().'depan/lib/touchSwipe/jquery.touchSwipe.min.js'?>"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<?php echo base_url().'depan/contactform/contactform.js'?>"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url().'depan/js/main.js'?>"></script>

</body>
</html>
