<section id="main" class="column">
		<article class="module width_full">
			<header><h3>Change Password</h3></header>
			<form method="POST" action="">
                <div class="module_content">
						<fieldset>
							<label>Old Password</label>
                            <div class="form_error"><?php echo form_error('old'); ?></div>
							<input type="password" name="old">
						</fieldset>
						<fieldset>
							<label>New Password</label>
                            <div class="form_error"><?php echo form_error('new'); ?></div>
							<input type="password" name="new">
						</fieldset>
						<fieldset>
							<label>Confirm Password</label>
                            <div class="form_error"><?php echo form_error('new_confirm'); ?></div>
							<input type="password" name="new_confirm">
						</fieldset>
                        <div class="clear"></div>
			     </div>
			  <footer>
				<div class="submit_link">
					<input type="submit" value="Change Password" class="alt_btn">
					<input type="submit" value="Reset">
				</div>
			  </footer>
            </form>
		</article>
</section>