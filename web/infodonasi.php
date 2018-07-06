<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
include "connect.php";
session_start();
if (!isset($_SESSION['nama_user'])) {
  header('location:'.$link.'/login.php');
}elseif (isset($_SESSION['nama_user'])) {

 ?>
 <!DOCTYPE html>
 <head>
    <title>Kajian Makassar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css" type="text/css"/>
    <link href="css/font-awesome.css" rel="stylesheet"> 
    <link rel="stylesheet" href="css/morris.css" type="text/css"/>
    <!-- calendar -->
    <link rel="stylesheet" href="css/monthly.css">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="js/jquery2.0.3.min.js"></script>
    <script src="js/raphael-min.js"></script>
    <script src="js/morris.js"></script>
</head>
<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="index.php" class="logo">
                    <b><img src="images/text-logo.png" style="width:80px;left:50%;top:50%;position:absolute;margin-top:-30px;margin-left:-40px" alt=""></b>
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->
            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="images/2.png">
                            <span class="username"><?php echo $_SESSION['nama_user']; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="proses/validasi_user.php?log=out"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                    
                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                          <a href="javascript:;">
                            <i class="fa fa-calendar"></i>
                            <span>Jadwal Kajian</span>
                          </a>
                          <ul class="sub">
                            <li><a href="tambahjadwal.php">Tambah Jadwal</a></li>
                            <li><a href="jadwalkajian.php">Kelola Jadwal</a></li>
                          </ul>
                        </li>
                        <li class="sub-menu">
                          <a href="javascript:;">
                            <i class="fa fa-bullhorn"></i>
                            <span>Rekaman Kajian</span>
                          </a>
                          <ul class="sub">
                            <li><a href="tambahrekaman.php">Tambah Rekaman</a></li>
                            <li><a href="rekamankajian.php">Kelola Rekaman</a></li>
                          </ul>
                        </li>
                        <li class="sub-menu">
                          <a href="javascript:;">
                            <i class="fa fa-pencil"></i>
                            <span>Artikel Kajian</span>
                          </a>
                          <ul class="sub">
                            <li><a href="tambahartikel.php">Tambah Artikel</a></li>
                            <li><a href="artikelkajian.php">Kelola Artikel</a></li>
                            <li><a href="komentarartikel.php">Kelola Komentar</a></li>
                          </ul>
                        </li>
                        <li class="sub-menu">
                          <a class="active" href="javascript:;">
                            <i class="fa fa-money"></i>
                            <span>Informasi Donasi</span>
                          </a>
                          <ul class="sub">
                            <li><a href="tambahinfo.php">Tambah Informasi</a></li>
                            <li><a class="active" href="infodonasi.php">Kelola Informasi</a></li>
                          </ul>
                        </li>
                    </ul> 
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
         <section class="wrapper">
          <div class="table-agile-info">
           <div class="panel panel-default">
              <div class="panel-heading">
               Informasi Donasi
              </div>
              <div class="row w3-res-tb">
                <div class="col-sm-2 m-b-xs">
                  <select id="indeks" onchange="FunctionOnChange()" class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Cari Berdasarkan ..</option>
                    <option value="2">Kontak</option>
                    <option value="3">Telepon</option>
                    <option value="4">WA</option>
                  </select>                
                </div>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input id="myInput" type="text" onkeyup="myFunction()" class="input-sm form-control" placeholder="Cari .." disabled>
                  </div>
                </div>
              </div>
              <div>
                <table id="myTable" class="table" ui-jq="footable" ui-options='{
                  "paging": {
                    "enabled": true
                  },
                  "filtering": {
                    "enabled": true
                  },
                  "sorting": {
                    "enabled": true
                  }}'>
                  <thead>
                    <tr>
                      <th data-breakpoints="xs">ID</th>
                      <th>Gambar</th>
                      <th>Kontak</th>
                      <th >Telepon</th>
                      <th data-breakpoints="xs">WA</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $query = "SELECT * FROM donasi";
                      $result = $conn->query($query);

                      while ($row = $result->fetch_assoc()) {
                     ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><img width="200px" src="images/donasi/<?php echo $row['gambar']; ?>" alt="<?php echo $row['gambar'] ?>"></td>
                      <td><?php echo "+62".$row['kontak']; ?></td>
                      <td><?php if ($row['telfon']=="1") echo "Ya"; else echo "Tidak"; ?></td>
                      <td><?php if ($row['wa']=="1") echo "Ya"; else echo "Tidak"; ?></td>
                      <td>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>">Edit</button>
                        <a onclick="return confirm('Hapus Informasi?')" href="<?php echo $link; ?>/proses/crud-donasi.php?hapus=<?php echo $row['id'] ?>"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
                        <!-- Modal Start -->
                        <div id="myModal<?php echo $row['id']; ?>" class="modal fade" role="dialog">
                                <?php include "pages/modal-donasi.php"; ?>
                        </div>
                         <!-- Modal End -->
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
         </section>
         <!-- footer -->
         <div class="footer" style="margin-top:50px">
            <div class="pull-right d-none d-sm-inline-block">Kajian Makassar
            </div>
            &copy; 2018 - <a href="#">Halaman Admin Kajian Makassar</a>
          </div>
         <!-- / footer -->
       </section>
       <!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->  
<script>
$(document).ready(function() {
    //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });
        
      //CHARTS
      function gd(year, day, month) {
           return new Date(year, month - 1, day).getTime();
       }

       graphArea2 = Morris.Area({
           element: 'hero-area',
           padding: 10,
           behaveLikeLine: true,
           gridEnabled: false,
           gridLineColor: '#dddddd',
           axes: true,
           resize: true,
           smooth:true,
           pointSize: 0,
           lineWidth: 0,
           fillOpacity:0.85,
           data: [
           {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
           {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
           {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
           {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
           {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
           {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
           {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
           {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
           {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

           ],
           lineColors:['#eb6f6f','#926383','#eb6f6f'],
           xkey: 'period',
           redraw: true,
           ykeys: ['iphone', 'ipad', 'itouch'],
           labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
           pointSize: 2,
           hideHover: 'auto',
           resize: true
       });


});
</script>
<!-- calendar -->
<script type="text/javascript" src="js/monthly.js"></script>
<script type="text/javascript">
$(window).load( function() {

   $('#mycalendar').monthly({
    mode: 'event',
    
});

   $('#mycalendar2').monthly({
    mode: 'picker',
    target: '#mytarget',
    setWidth: '250px',
    startHidden: true,
    showTrigger: '#mytarget',
    stylePast: true,
    disablePast: true
});

   switch(window.location.protocol) {
      case 'http:':
      case 'https:':
    // running on a server, should be good.
    break;
    case 'file:':
    alert('Just a heads-up, events will not work when run locally.');
  }

});
</script>
<!-- //calendar -->
<!-- search -->
<script>
function FunctionOnChange(){
  var select, input;
  select = document.getElementById("indeks");
  input = document.getElementById("myInput");
  filter = select.value;
  if (filter==0) {
    input.disabled=true;
  }else{
    input.disabled=false;
  };
}

function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, indeks;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  indeks = document.getElementById('indeks').value;

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[indeks];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
<!-- end search -->
</body>
</html>
<?php 
}
?>