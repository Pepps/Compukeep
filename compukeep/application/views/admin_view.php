<div class="container">
<div class="style">
	<?php
		$this->load->view('slideshow');	
	  ?>
</div>

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

<?php
// ************ Author: Alexander Frödeberg ************ //
$options = array(
				'Select'		=> '',
				'chassi'		=> 'chassi',
				'motherboard'	=> 'motherboard',
				'processor'		=> 'processor',
				'videocard'		=> 'videocard',
				'memory'		=> 'memory',
				'harddrive'		=> 'harddrive',
				'powersupply'	=> 'powersupply',
				);
$js = 'id="components" class="drop"';

echo '
<div class="flat-form">
	<div id="login" class="form-action show">
	 	<h1>Add component</h1>'.
		form_open().
			form_dropdown('components', $options, '', $js).
		form_close().'
	</div>
	<div class="menu-comp" id="container"></div>
</div>';

?>

<!-- <div class="flat-form">
            <div id="login" class="form-action show">
                <h1>Login on CompuKeep</h1>
                <form action='<?php echo base_url('Login/checklogin'); ?>' method='post' >

                    <input type='text' name='email' placeholder='E-mail' required />
                        
                        
                    <input type='password' name='password' placeholder='password' required />
                        
                       
                    <input type="submit" value='Login' class="button" />

                </form>
            </div>
</div> -->
</div>
