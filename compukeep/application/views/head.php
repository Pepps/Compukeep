<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('../js/script.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href=" <?php echo base_url('../js/style.css'); ?>"/>


<style>
/* #### DESKTOP #### */
/*
	@media screen and (min-width: 1024px){
		#slideshow {
			margin:auto;
			width:960px;
		}
		.slide {
			width:900px;
		}
		.slide img {
			width:50%;
		}
	}
/* #### Mobile Phones Portrait #### *//*
	@media screen and (max-device-width: 480px) and (orientation: portrait){
	  	#slideshow {
	  		min-width: 50%;
		}
		.slide img {
			width:100%;
		}
		.slide {
			width:100px;
		}
*/
/* #### Mobile Phones Landscape #### *//*
	@media screen and (max-device-width: 640px) and (orientation: landscape){
  		#slideshow {
	  		min-width: 50%;
		}
		.slide {
			width:100%;
		}

		.slide img {
			width:100%;
		}
	}
*/
	#myPanel {
		color:white;	
		background-color:#3748B7;
	}
	.head {
		margin:0px;
	}

	.column {
	  font-family:Verdana, Geneva, sans-serif;
	  background-color:#fff;
	}

	.column ul {
	  margin:0px;
	  padding:0px;
	  list-style:none; 
	}
	.column li {
	  text-align:left;
	  padding:6px;
	  border-bottom:1px solid #4768C7; 
	}
	.column a {
		text-decoration: none;
	  	color:white;
	  	font-size:16px; 
	}
	.column a:hover {
		text-decoration: none;
	  	color:white;
	}
	#pageContainer {
		width:960px;
		margin: auto;
	}
	.style {
		background: linear-gradient(to right, #4768C7, #5288C4, #4768C7);
	}

	.ui-content {
		padding:0px;
		margin:0px;
	}
	.slideshow-img {
		z-index:1;
		float:right;
	}

	#slideshow {
		margin:auto;
		height:290px;
	}

	#slideshow #slidesContainer {
	  	margin:0 auto;
	  	overflow:auto; /* allow scrollbar */
	  	position:relative;
	}

	#slideshow #slidesContainer .slide {
		color:white;
  		margin:0 auto;
  		height:230px;
	}

	/** 
 	* Slideshow controls style rules.
 	*/
	.control {
	  margin-top:-115px;
	  display:block;
	  width:39px;
	  height:59px;
	  text-indent:-10000px;
	  cursor: pointer;
	}
	#leftControl {
		float:left;
	}
	#rightControl {
		float:right;
	}
	.slideshow-p {
		width:300px;
		float:left;
	}
	a:link {text-decoration:none;}    /* unvisited link */
	a:visited {text-decoration:none;} /* visited link */
	a:hover {text-decoration:none;}   /* mouse over link */
	a:active {text-decoration:none;}  /* selected link */
	a:link {color:white;}      /* unvisited link */
	a:visited {color:white;}  /* visited link */
	a:hover {color:white;}  /* mouse over link */
	a:active {color:white;}  /* selected link */

	.popup-window {
		border-style:solid;
		border-width:2px;
    	height: 50px;
    	width: 80%;
    	border-radius: 5px;
    	background-color: #3748B7;
    	text-align: center;
    	color: #FFFFFF;
    	font-family: Verdana, Arial, Sans-Serif;
    	opacity: 1;
   }

</style>

</head>
<body>

  <div data-role="header" class="head">
    <h1>Page Header</h1>
  </div>


