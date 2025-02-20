<?php
	$page ='contact';
	require_once 'includes/header.php';
?>
		<!-- Wrapper -->
			<div class="contact">

				<!-- Footer -->
					<div class="container">
						<div class="inner">
							<section>
								<h2>Contact Us</h2>
								<form method="post" action="#">
									<div class="fields">
										<div class="field half">
											<input type="text" name="name" id="name" placeholder="Name" />
										</div>

										<div class="field half">
											<input type="text" name="email" id="email" placeholder="Email" />
										</div>

										<div class="field">
											<input type="text" name="subject" id="subject" placeholder="subject" />
										</div>

										<div class="field">
											<textarea name="message" id="message" rows="3" placeholder="Message"></textarea>
										</div>

										<div class="field text-right">
											<label>&nbsp;</label>

											<ul class="actions">
												<li><input type="submit" value="Send Message" class="primary" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>
							<section>
								<h2>Contact Info</h2>

								<ul class="alt">
									<li><span class="fa fa-envelope-o"></span> <a href="#">1082019136@sjc.bz, 1082019180@sjc.bz</a></li>
									<li><span class="fa fa-phone"></span> +501 615-5205 </li>
									<li><span class="fa fa-map-pin"></span> Saint John's College </li>
								</ul>

								<h2>Follow Us</h2>

								<ul class="icons">
									<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
								</ul>
							</section>

						</div>
					</div>

			</div>
<?php 

	require_once 'includes/footer.php';
?>