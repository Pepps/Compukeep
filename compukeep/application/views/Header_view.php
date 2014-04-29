<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> <!-- jQuery -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> <!-- Bootstrap -->
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> <!-- Bootstrap -->
  <script type='text/javascript' src='<?php echo base_url('../assets/header_view.js');?>'></script>
  <script type="text/javascript" src="<?php echo base_url('../js/script.js'); ?>"></script> <!-- Vår js/jquery -->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('../css/style.css'); ?>"/> <!-- Vår css -->
  <script type="text/javascript" src="<?php echo base_url('../js/adminJS/adminJS.js'); ?>"></script> <!-- Admin jQuery -->
  <link rel='stylesheet' type='text/css' href='<?php echo base_url('../assets/stylesheetcart.css'); ?>'/>
<!--############SANNIE############-->
<!--This is the javascript for the shopping cart and when the shopping cart will get the components from the users "current build" -->
<script type="text/javascript">
	
$(document).ready(function() {
  $('#cartInsert').click(function() { /*As soon as the cart button is pressed, the components will be added to the cart*/
    var url = "Cart/InsertPart";
    $.post(url, '', function(data) {

    });
    
    $.post('http://localhost/CompuKeep/index.php/Handler/sessionHandling', '', function(data) {
      $('#cartTest').html(data);
    });


  });
});

</script>
<!--############SANNIE############-->
<!--############JESPER############-->
</head>
<body>  
<div class='container'>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><div id="navlogo"><a id="home" href="components"><?php $data = array('src' => "../assets/blueroundicon1.png", 'style' => "height:75px;" ); echo img($data) ?></a></li>
        <li><a id="home" href="components"><h5>Home<h5/></a></li>

        <li><a href="#" id="buildDrop"><h5>Build<h5/></a></li>
        <li><a href="#cart" id="cartInsert" data-toggle="modal"><h5>Cart<h5/></a></li>

        <?php 
        if($this->session->userdata('access') == 1) {
          echo '<li><a href="'.base_url('admin').'"><h5>Admin<h5/></a></li>';
        }
        ?>
        <!--############JESPER############-->
        <!--############SANNIE############-->
        <!--Here the buttons for both login/logout and mybuilds are beeing printed, and the arguments for when each button is shown.  -->
        <?php
            if($this->session->userdata("logged_in")) { 
              echo '
              <li><a href="#bla" id="cartInsert" data-toggle="modal" ><h5>My Builds<h5/></a></li>
              <li><a href="'.base_url('Logout').'" data-toggle="modal"><h5>Logout<h5/></a></li>';
            } 
            else {
              echo '<li><a href="#loginreg" data-toggle="modal" ><h5>Login<h5/></a></li>';
            }
        ?>
        <!--############SANNIE############-->
        <!--############JESPER############-->
        <li class="dropdown" style="display:none;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><h5>Components</h5><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#" class="name" value="chassi"><h5>Chassi</h5></a></li>
              <li><a href="#" class="name" value="motherboard"><h5>Motherboard</h5></a></li>
              <li><a href="#" class="name" value="processor"><h5>Processor</h5></a></li>
              <li><a href="#" class="name" value="videocard"><h5>Videocard</h5></a></li>
              <li><a href="#" class="name" value="memory"><h5>Memory</h5></a></li>
              <li><a href="#" class="name" value="harddrive"><h5>Hardrive</h5></a></li>
              <li><a href="#" class="name" value="powersupply"><h5>Powersupply</h5></a></li>
            </ul>
          </li>
          <!--############JESPER############-->
        <!-- ############ JESPER - menu inställningar ############ -->
      </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" id="compYes"><h5>Compatible</h5></a></li>
          <li><a href="#" id="compNo"><h5>Non Compatible</h5></a></li>
          <li><a href="components/destroy" id="reset"><h5>Clear current build</h5></a></li>    
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<!-- ############ JESPER - menu inställningar ############ -->
<!--Detta är menyn för dina byggen-->
<!--############SANNIE############-->
  <!--A pop up window with all the information of the users saved builds-->
   <!--<div class="sections">--> 
  <div class="modal fade" id="bla" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"><!--All content goes here-->
      <div class="modal-body">
       <div class="buildheader">
       <h2>My builds</h2>
       </div>
       <br/>
       <!--Here the name of each build is printed out as a link for the user to click. And the links are "tagged" with the specific builds id for the javascript/ajax to send to the buildmodel as a variable for the db-query-->
      <?php
          if(isset($buildtitles)){
              foreach($buildtitles as $row){
                echo '<div class="buildname"><a href="#" onClick="return false" onmousedown="javascript:swapContent('.$row->pcid.')"><h3>'.$row->buildtitle.'</h3></a></div>';    
            }
          }
      ?>
      <hr/>
  <div id='getbuild'> </div><!--Here all the components from each build will be shown-->
    <br/><br/>
    </div>
         <div class="modal-footer">
      <a href="#" id="toggle">Component info</a> <!--More info button-->
        <a href="#" id="closebuilds" data-dismiss="modal">Close</a><!--Close button-->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  <!--############SANNIE############-->


  <!-- JESPERS MODAL STRUKTUR, TAGIT PATENT FÖR DET-->
  <!--*****************TWITTERBOOTSTRAP MODALS*****************
      *****************HÄR EXISTERAR 'test', 'loginreg' AND 'cart'*****************-->

<!-- test --><!--  -->
<div class="modal fade" id="test" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Component Information</h4>
      </div>
      <div class="modal-body" id="infoBox">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- cart --><!-- -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cart">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body" >

        <?php $this->load->view('currentbuild_view'); ?>
      </div>
      <div class="modal-footer">
        <a href="#" id="closecart" data-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>

<!-- loginreg --><!-- css kommer ifrån stylesheet.css, fråga Daniel om kundtjänst -->
<div class="modal fade" id="loginreg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
       <?php $this->load->view('loginReg_view'); ?> 
      </div>
      <div class="modal-footer">
        <a href="#" id="closelogin" data-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>
