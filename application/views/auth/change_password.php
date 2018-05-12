<h1><?php echo lang('change_password_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<div class="panel">
  <div class="panel-body">

      
 <form action="<?=site_url('auth/change_password')?>" method="post" id="form" class="form-horizontal">

      <p>
            Current Password
            <?php echo form_input($old_password);?>
      </p>

      <p>
          New Password
            <?php echo form_input($new_password);?>
      </p>

      <p>
            Confirm password
            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
            <?php echo form_input($new_password_confirm);?>
      </p>

      <?php echo form_input($user_id);?>
     <input type="submit">
</form>
</div>
</div>