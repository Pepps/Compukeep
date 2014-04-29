
<div class="divcart">
<div style="height:100px; width:450px; color:black;" id="cartTest">...</div>
<?php $this->load->helper('form'); ?>
<?php echo form_open(base_url('/Cart/UpdateCart')); ?>

<table class='table' cellpadding="6" cellspacing="1">

<tr>
  <th>QTY</th>
  <th>Item Description</th>
  <th style="text-align:right">Item Price</th>
  <th style="text-align:right">Sub-Total</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

	<tr>
	  <td style="color: black;"><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
	  <td>
		<?php echo $items['name']; ?>

			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

					<?php endforeach; ?>
				</p>

			<?php endif; ?>

	  </td>
	  <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
	  <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
	</tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
  <td colspan="2"></td>
  <td class="right"><strong>Total</strong></td>
  <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>

</table>
<div class="row">
  <div class="col-md-6">
	  	<?php echo form_submit('update_cart', 'Update Cart', "class='button'"); ?>
		<?php echo form_close(); ?>
		<?php if ($this->session->userdata("logged_in")) {	
		echo form_open(base_url('Cart/SaveCart'));
		echo "<p>";
		echo form_input('SaveBuild', 'Name Build'); 
		echo form_submit('', 'Save Cart', "class='button'");
		echo "</p>";
		echo form_close(); 
	}
	?>
  </div>
  <div class="col-md-6">
	<?php echo form_open(base_url('Cart/DeleteCart')) ?>
	<?php echo form_submit('', 'Delete Cart', "class='buttonD'"); ?>
	<?php echo form_close(); ?>
  </div>

  <!-- Add the extra clearfix for only the required viewport -->
  <div class="clearfix visible-xs"></div>

</div>


</div>

