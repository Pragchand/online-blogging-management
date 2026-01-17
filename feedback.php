
	<div class="container">
		<h1 class="text-light" id="Feedback">Feedback</h1>
		<div class="row">
			<div class="col-sm-12 mb-5 border border-5 text-light">
				<from action="feedback_process.php" method="POST">
				  <div class="col">
				    <label>Frist Name: </label> <input type="text" name="first_name" class="form-control p-3 mt-3 mb-3" placeholder="Enter your first name" aria-label="First name" required>
				  </div>
				  <div class="col">
				   <label>Last Name: </label> <input type="text" name="last_name" class="form-control p-3 mt-3 mb-3" placeholder="Enter your last name" aria-label="Last name" required>
				  </div>
				  <div class="col">
				    <label>Eamil: </label><input type="email" name="email" class="form-control p-3 mt-3 mb-3" placeholder="Enter your email" aria-label="email" required>
				  </div>
				  <div class="col">
				    <label>Message: </label><textarea name="feedback_message" class="d-block w-100 mt-3 mb-3" placeholder="Write your message here" required></textarea>
				  </div>
				  <div class="col">
				    <input type="submit" name="send_feedback" class="form-control p-3 mt-5 mb-5" value="Send">
				  </div>
				</from>
			</div>
		</div>
	</div>
  <script text/javascript src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>
