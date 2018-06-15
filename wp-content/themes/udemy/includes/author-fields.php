<?php


function du_custom_user_profile_fields($user){
	?>

	<table class="form-table">
		<tr>
			<th>
				<label for="du_twitter"><?php _e('Twitter', 'udemy') ?></label>
			</th>
			<td>
				<input type="text"
				       name="du_twitter"
				       id="du_twitter"
				       class="regular-text" value="<?php echo esc_attr(get_the_author_meta('du_twitter', $user->ID)); ?>">
			</td>
		</tr>
	</table>

	<?php
}

function du_save_extra_profile_fields($user_id){
	if(!current_user_can('edit_users')){
		return;
	}

	update_user_meta($user_id, 'du_twitter', $_POST['du_twitter']);
}