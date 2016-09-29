<?php session_start();
if (isset($_SESSION['nama_user_pelanggan'])) {
	# code...
	$nama_user_pelanggan = $_SESSION['nama_user_pelanggan'];
}
else {
	$nama_user_pelanggan = "";
}
include 'config/db.php';

include 'sanitasi.php';

$nama_destination = stringdoang($_GET['nama_destination']);
$id = angkadoang($_GET['id_destination']);


// buat prepared statements
$stmt = $db->prepare("SELECT COUNT(*) AS status_ada,nama_destination,deskripsi_destination,judul_caption_1,judul_caption_2,judul_caption_3,isi_caption_1,isi_caption_2,isi_caption_3 FROM destination WHERE id_destination = ?");

// cek query
if (!$stmt) {
 die('Query Error : '.$db->errno.
 ' - '.$db->error);
}




// hubungkan "data" dengan prepared statements
$stmt->bind_param("s", $id);

// jalankan query
$stmt->execute();

// hubungkan hasil query

/* bind result variables */

    $stmt->bind_result($status_ada,$nama_destination, $deskripsi_destination,$judul_caption_1,$judul_caption_2,$judul_caption_3,$isi_caption_1,$isi_caption_2,$isi_caption_3);
    $stmt->fetch();

if ($status_ada === '0' OR $status_ada === 0 ) {
    # code...

    header('location:index.php');
}


 ?>
<html>
<head>

	<!-- Memasukkan atau mengincludekan file bootstrap css ke halaman website-->

  <link rel="stylesheet" type="text/css" href="css/chosen.min.css">



    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */
        
        /* Navigation*/
        
        .navbar {
            background-color: transparent;
        }
        
        .scrolling-navbar {
            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }
        
        .top-nav-collapse {
            background-color: #1C2331;
        }
        
        footer.page-footer {
            background-color: #1C2331;
           
        }
        
        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #1C2331;
            }
        }
        /*Call to action*/
        
        .flex-center {
            color: #fff;
        }
        
     
        .form-control-select {
    width: 100%;


    border-radius: 4px;
    background-color: white;
}
  /* Carousel*/
        
        .carousel {
            height: 50%;
        }
        
        @media (max-width: 776px) {
            .carousel {
                height: 100%;
            }
        }
        
        .carousel-item,
        .active {
            height: 100%;
        }
        
        .carousel-inner {
            height: 100%;
        }
        
        .carousel-item:nth-child(1) {
            background-image: url("http://mdbootstrap.com/images/slides/slide%20(6).jpg");
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.4;
        }
        
        .carousel-item:nth-child(2) {
            background-image: url("http://mdbootstrap.com/images/slides/slide%20(11).jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .carousel-item:nth-child(3) {
            background-image: url("http://mdbootstrap.com/images/slides/slide%20(7).jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        /*Caption*/
        
        .flex-center {
            color: #fff;
        }
    </style>


<body>


    <!--Navbar-->
    <nav class="navbar navbar-dark navbar-fixed-top scrolling-navbar">

        <!-- Collapse button-->
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
            <i class="fa fa-bars"></i>
        </button>

        <div class="container">

            <!--Collapse content-->
            <div class="collapse navbar-toggleable-xs" id="collapseEx">
                <!--Navbar Brand-->
                <a class="navbar-brand" href="index.php" >ENDESO</a>
                <!--Links-->
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
              
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <?php if ($nama_user_pelanggan === ''): ?>
                             <li class="nav-item">
                        <a class=" nav-link btn btn-info" href="#" data-toggle="modal" data-target="#modal_login" >Login</a>
                    </li>

                    <?php endif ?>
                    <?php if ($nama_user_pelanggan != ''): ?>
                     <li class="nav-item">
                        <a class="nav-link" href="#" ><?php echo $nama_user_pelanggan; ?></a>
                    </li>

                         <li class="nav-item">
                        <a class="btn btn-info" href="#" data-toggle="modal" data-target="#modal_logout" >Logout</a>
                    </li>
                    
                    <?php endif ?>
               
                </ul>
               
            </div>
            <!--/.Collapse content-->

        </div>

    </nav>
    <!--/.Navbar-->

    <!--Mask-->
    <div class="view hm-black-strong">
         <!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-2" data-slide-to="1"></li>
        <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <!--First slide-->
        <div class="carousel-item active">
            <!--Mask color-->
            <div class="view hm-black-light">
                <img src="http://mdbootstrap.com/images/slides/slide%20(11).jpg" class="img-fluid" alt="">
                <div class="full-bg-img">
                </div>
            </div>
            <!--Caption-->
            <div class="carousel-caption">
                <div class="animated fadeInDown">
                    <h3 class="h3-responsive"><?php echo $judul_caption_1 ?></h3>
                    <p><?php echo $isi_caption_1 ?></p>
                </div>
            </div>
            <!--Caption-->
        </div>
        <!--/First slide-->

        <!--Second slide-->
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view hm-black-strong">
                <img src="http://mdbootstrap.com/images/slides/slide%20(15).jpg" class="img-fluid" alt="">
                <div class="full-bg-img">
                </div>
            </div>
            <!--Caption-->
            <div class="carousel-caption">
                <div class="animated fadeInDown">
                    <h3 class="h3-responsive"><?php echo $judul_caption_2; ?></h3>
                    <p><?php echo $isi_caption_2; ?></p>
                </div>
            </div>
            <!--Caption-->
        </div>
        <!--/Second slide-->

        <!--Third slide-->
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view hm-black-slight">
                <img src="http://mdbootstrap.com/images/slides/slide%20(13).jpg" class="img-fluid" alt="">
                <div class="full-bg-img">
                </div>
            </div>
            <!--Caption-->
            <div class="carousel-caption">
                <div class="animated fadeInDown">
                    <h3 class="h3-responsive"><?php echo $judul_caption_3; ?></h3>
                    <p><?php echo $isi_caption_3; ?></p>
                </div>
            </div>
            <!--Caption-->
        </div>
        <!--/Third slide-->
    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="left carousel-control" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="icon-prev" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-2" role="button" data-slide="next">
        <span class="icon-next" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
       
       <br>
<div class="container">
    <!--Panel-->
<div class="card">
    <div class="card-header danger-color-dark white-text">
        Find Host
    </div>
    <div class="card-block">
        <h4 class="card-title">Look For Host In <?php echo $nama_destination; ?></h4>
        <div class="row">
            <form action="find_host.php" method="get" accept-charset="utf-8">
                
               <input type="hidden" name="nama_destination" value="<?php echo $nama_destination; ?>">
            <input type="hidden" name="id_destination" value="<?php echo $id; ?>">
          
            <div class="col-sm-3">
                <div class="md-form">
    <input placeholder="Check In" type="text" id="date-picker-example" name="check_in" class="form-control datepicker">
</div>
            </div>
            <div class="col-sm-3">
                
<div class="md-form">
    <input placeholder="Check Out" type="text" id="date-picker-example"  name="check_out" class="form-control datepicker">
</div>
            </div>
            <div class="col-sm-3">
                
<div class="md-form">


    <select id="tipe_bed" class="form-control" name="tipe_bed">
          <option>Type Of Room</option>
        <option>Regular (single Bed, 1 Person)</option>
        <option>Premium (Double Bed, 2 Person)</option>
    </select>

</div>
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-danger">Find!</button>
            </div>
        </div><!-- / row find host -->
          </form>

    </div>
</div>
<!--/.Panel-->



<?php 
$query = "SELECT id_penginapan,nama_penginapan, lokasi_penginapan FROM penginapan WHERE id_destination = ? ORDER by id_penginapan DESC ";

if ($stmt = $mysqli->prepare($query)) {

if (!$stmt) {
 die('Query Error : '.$db->errno.
 ' - '.$db->error);
}


// hubungkan "data" dengan prepared statements
$stmt->bind_param("s", $id);
    /* execute statement */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($name, $code);

    /* fetch values */
    while ($stmt->fetch()) {
        printf ("%s (%s)\n", $name, $code);
    }

    /* close statement */
    $stmt->close();




 ?>
    </div><!-- /. container -->   
    </div>
    <!--/.Mask-->

    <!--Footer-->
    <footer class="page-footer center-on-small-only">

        <!--Footer Links-->
        <div class="container-fluid">
            <div class="row">

                <!--First column-->
                <div class="col-md-3 offset-md-1">
                    <h5 class="title">ABOUT MATERIAL DESIGN</h5>
                    <p>Material Design (codenamed Quantum Paper) is a design language developed by Google. </p>

                    <p>Material Design for Bootstrap (MDB) is a powerful Material Design UI KIT for most popular HTML, CSS, and JS framework - Bootstrap.</p>
                </div>
                <!--/.First column-->

                <hr class="hidden-md-up">

                <!--Second column-->
                <div class="col-md-2 offset-md-1">
                    <h5 class="title">First column</h5>
                    <ul>
                        <li><a href="#!">Link 1</a></li>
                        <li><a href="#!">Link 2</a></li>
                        <li><a href="#!">Link 3</a></li>
                        <li><a href="#!">Link 4</a></li>
                    </ul>
                </div>
                <!--/.Second column-->

                <hr class="hidden-md-up">

                <!--Third column-->
                <div class="col-md-2">
                    <h5 class="title">Second column</h5>
                    <ul>
                        <li><a href="#!">Link 1</a></li>
                        <li><a href="#!">Link 2</a></li>
                        <li><a href="#!">Link 3</a></li>
                        <li><a href="#!">Link 4</a></li>
                    </ul>
                </div>
                <!--/.Third column-->

                <hr class="hidden-md-up">

                <!--Fourth column-->
                <div class="col-md-2">
                    <h5 class="title">Third column</h5>
                    <ul>
                        <li><a href="#!">Link 1</a></li>
                        <li><a href="#!">Link 2</a></li>
                        <li><a href="#!">Link 3</a></li>
                        <li><a href="#!">Link 4</a></li>
                    </ul>
                </div>
                <!--/.Fourth column-->

            </div>
        </div>
        <!--/.Footer Links-->

        <hr>

        <!--Call to action-->
        <div class="call-to-action">
          
        </div>
        <!--/.Call to action-->

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2015 Copyright: <a href="http://www.endeso.id"> endeso.id </a>

            </div>
        </div>
        <!--/.Copyright-->

    </footer>


    <!--/.Footer-->



<!-- Modal Login-->
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Login </h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form action="proses_login_pelanggan.php" method="post" accept-charset="utf-8">
                    
          
           
                  <div class="md-form">
            <i class="fa fa-envelope prefix"></i>
            <input type="text" id="form2" name="email"class="form-control">
            <label for="form2">Your email or Username</label>
        </div>

        <div class="md-form">
            <i class="fa fa-lock prefix"></i>
            <input type="password" id="form4"  name="password" class="form-control">
            <label for="form4">Your password</label>
        </div>

        <div class="text-xs-center">
            <button type="submit" class="btn btn-deep-purple">Login</button>
        </div>
             </form>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

<!--  End Modal Login-->



<!-- Modal Logout-->
<div class="modal fade" id="modal_logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi Log Out </h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <h2>Apakah Anda Yakin Ingin Logout ?</h2>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <a class="btn btn-primary"   href="logout.php">Ya</a>
               
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

<!-- End Modal Logout-->

    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
$('.datepicker').pickadate();
    });

    </script>

 



</body>
</html>
