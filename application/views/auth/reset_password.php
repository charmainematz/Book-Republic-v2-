

<div class="panel">
  <div class="panel-body">

<h1><?php echo lang('reset_password_heading');?></h1>



<div id="infoMessage"><?php echo $message;?></div>

      
 <form action="<?=site_url('auth/reset_password')?>" method="post" id="form" class="form-horizontal">


	<p>
		New Password
		<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password);?>
	</p>

	<p>
		Confirm Password
		<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
		<?php echo form_input($new_password_confirm);?>
	</p>

	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>

	<input type="submit">
</form>
</div>
</div>