<section id="main" class="column">
		<article class="module width_full">
			<header><h3>Create New Admin User</h3></header>
			<form method="POST" action="">
                <div class="module_content">
						<fieldset>
							<label>User Name</label>
                            <div class="form_error"><?php echo form_error('identity'); ?></div>
							<input type="text" name="identity">
						</fieldset>
						<fieldset>
							<label>Password</label>
                            <div class="form_error"><?php echo form_error('password'); ?></div>
							<input type="password" name="password">
						</fieldset>
						<fieldset>
							<label>Email ID</label>
                            <div class="form_error"><?php echo form_error('email'); ?></div>
							<input type="password" name="email">
						</fieldset>
                        <fieldset>
							<label>First Name</label>
                            <div class="form_error"><?php echo form_error('first_name'); ?></div>
							<input type="password" name="first_name">
						</fieldset>
                        <fieldset>
							<label>Last Name</label>
                            <div class="form_error"><?php echo form_error('last_name'); ?></div>
							<input type="password" name="last_name">
						</fieldset>
                        <fieldset>
							<label>Company</label>
                            <div class="form_error"><?php echo form_error('company'); ?></div>
							<input type="password" name="company">
						</fieldset>
                        <fieldset>
							<label>Phone Number</label>
                            <div class="form_error"><?php echo form_error('phone'); ?></div>
							<input type="password" name="phone">
						</fieldset>
                        <div class="clear"></div>
			     </div>
			  <footer>
				<div class="submit_link">
					<input type="submit" value="Create User" class="alt_btn">
					<input type="submit" value="Reset">
				</div>
			  </footer>
            </form>
		</article>
</section>