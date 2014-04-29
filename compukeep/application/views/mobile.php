
  <div class="column" data-role="panel" id="myPanel"> 
   	<?php $this->load->view('index'); ?>
  </div>

  <div data-role="main" class="ui-content">
    
	<!-- Slideshow HTML -->

	<div class="style">
		<?php
			$this->load->view('slideshow');	
  		?>
 	</div>


	<a href="<?php echo base_url('welcome'); ?>">test</a>
    <p style="width:200px;" id='test'>Click on the button below to open the Panel.</p>
    <a href="#myPanel" class="ui-btn ui-btn-inline ui-corner-all ui-shadow">Open Panel</a> 
</div> 
