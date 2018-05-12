<!-- <h1><?php echo lang('index_heading');?></h1>
<p><?php echo lang('index_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
		</tr>
	<?php endforeach;?>
</table>

<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>
 -->

<section class="card flat">
	<header class="card-header">
					<?= $page_title; ?>
					<button type="button" class="modal-close">
						<i class="font-icon-close-2"></i>
					</button>
				</header>
				<div class="card-block">
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>

							<th>Name</th>
							<th>Email</th>
							<th>Username</th>
							<th>Group</th>
							<th>Status</th>
							<th width="20%">---</th>
							
						</tr>
						</thead>
						
						<tbody>
						<?php foreach ($users as $user):?>
							<tr>
							
							<td><?= $user->lastname .', '. $user->firstname ?></td>
							<td><?= $user->email; ?></td>
							<td><?= $user->username; ?></td>
							<td>
								<?php foreach ($user->groups as $group):?>
								<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
			                	<?php endforeach?>
			                </td>
			                <td>
			                	<?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?>
			                </td>
							
							<td>
							
							</td>
							
						</tr>
						<?php endforeach ?>
						
						
						</tbody>
					</table>
				</div>
				<div class="card-footer">
				<a href="<?= site_url('auth/create_user'); ?>" class = "btn btn-primary">Create User</a>
				<button class="btn btn-primary flat" onclick="add_employee()" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Add <?= $page_title; ?></button>
					
			</section>



