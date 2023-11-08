<?php include('./header.php'); ?>

	<section class="service" style="padding-top: 200px; height: 120vh;" id="userLoginRegister">
        <div class="container">

        <div class="service-banner">

            <!--
			<div class="login-module" id="loginModule">
				<div class="form-container user-container">
					<form id="userLogin">
						<h1>USER LOGIN</h1>
						<input type="email" id="user_email" placeholder="Email">
						<input type="password" id="user_password" placeholder="Password" required>
						
						<button class="btn login-btn" onclick="submitFormLogin()">LOGIN</button>

						<p>Don't have an account yet? <a href="#" class="right" id="toRegister">REGISTER NOW</a></p> 
						
					</form>
				</div>
			</div>  -->

            <div class="login-module" id="loginModule">
				<div class="form-container user-container">
					<form action="ajax.php" method="POST">
						<h1>USER LOGIN</h1>
						<input type="email" name="user_email" placeholder="Email">
						<input type="password" name="user_password" placeholder="Password" required>
						
						<button class="btn login-btn" name="userLogin">LOGIN</button>

						<p>Don't have an account yet? <a href="#" class="right" id="toRegister">REGISTER NOW</a></p> 
						
					</form>
				</div>
			</div> 

			<div class="register-module" id="registerModule">
				<div class="form-container user-container">
					<form id="userRegister">
						<h1>USER REGISTER</h1>
						<input type="text" id="reg_username" placeholder="Username" required>
						<input type="text" id="reg_fullname" placeholder="Full name" required>
						<input type="email" id="reg_user_email" placeholder="Email" required>
						<input type="password" id="reg_user_password" placeholder="Password" required>
						
						<button class="btn register-btn" onclick="submitFormRegister()">REGISTER</button>
						<button class="btn cancel-btn" id="userCancel">CANCEL</button>

						<p>Already have an account? <a href="#" class="right" id="toLogin">LOGIN NOW</a></p> 
						
					</form>
				</div>
			</div> 


        </div>

        <div class="service-content">

            <p class="service-subtitle">Elevate your Movie Experience</p>

            <h2 class="h2 service-title">Login to ScreenRush Now!</h2>

            <p class="service-text">
            Join our passionate community of movie lovers, where you can rate and review your favorite films. By logging in, you'll not only unlock exclusive features but also become a vital part of our growing film-loving family. Join us today and let the movie magic of ScreenRush enhance your cinematic journey!
            </p>

            <ul class="service-list">

            <li>
                <div class="service-card">

                <div class="card-icon">
                    <ion-icon name="star"></ion-icon>
                </div>

                <div class="card-content">
                    <h3 class="h3 card-title">Community Ratings and Reviews</h3>

                    <p class="card-text">
                    Read insightful reviews and ratings from a vibrant community of movie enthusiasts, helping you make informed decisions about what to watch next.
                    </p>
                </div>

                </div>
            </li>

            <li>
                <div class="service-card">

                <div class="card-icon">
                    <ion-icon name="flame"></ion-icon>
                </div>

                <div class="card-content">
                    <h3 class="h3 card-title">Get Ready for an Adrenaline Rush</h3>

                    <p class="card-text">
                    Feel the hits on fire! Immerse yourself in a world of cinematic delight, check out the latest, the newest, and most popular movies today with ScreenRush.
                    </p>
                </div>

                </div>
            </li>

            </ul>

        </div>

        </div>
    </section>

<!--
	<section id="admin-login">
		<div class="container" style="height: 90vh; padding-top: 25px;">
		
		<p class="section-subtitle" style="padding-top: 80px;">You have the Control</p>
		<h2 class="h2 section-title">Admin Login</h2>
		
		<div class="admin-module" id="adminModule">
			<form action="" method="POST">
				<input type="email" name="user_email" placeholder="Email">
				<input type="password" name="user_password" placeholder="Password" required>
				
                <input type="submit" class="btn login-btn" id="adminLogin" value="LOGIN">
				<button class="btn login-btn" id="adminLogin">LOGIN</button>
			</form>
		</div>
	</section> -->
    <?php include('./admin/admin-login.php'); ?>

<?php include('./footer.php'); ?>

	<script type="text/javascript">
        $(document).ready(function() {
			$("#loginModule").show();
			$("#registerModule").hide();

			$("#toRegister").click(function() {
                $("#registerModule").show();
				$("#loginModule").hide();
            });

			$("#toLogin").click(function() {
				$("#loginModule").show();
                $("#registerModule").hide();
            });

            $("#userCancel").click(function() {
				$("#loginModule").show();
                $("#registerModule").hide();
            });

        });


        //USER REGISTER
        function submitFormRegister() {
            var username = $("#reg_username").val();
            var fullname = $("#reg_fullname").val();
            var email = $("#reg_user_email").val();
            var password = $("#reg_user_password").val();

            $.ajax({
                url:"ajax.php",
                method:"POST",
                data:{
                    "userRegister": true,
                    "username": username,
                    "fullname": fullname,
                    "user_email": email,
                    "user_password": password
                },
                success:function(result){
                    alert('Register Successful! Please Login to Continue');
                    $("#loginModule").show();
                    $("#registerModule").hide();
                },
                error:function(error) {
                    alert("Register unsuccessful :<");
                }
            });
        }


        /*
        function submitFormLogin() {
            var email = $("#user_email").val();
            var password = $("#user_password").val();

            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    "userLogin": true,
                    "user_email": email,
                    "user_password": password,
                },
                success: function (result) {
                    alert("passed");
                },
                error: function (error) {
                    alert("Oops! Something went wrong :(");
                }
            });
        }*/


        /* Old
        function submitFormLogin() {
            var email = $("#user_email").val();
            var password = $("#user_password").val();

            $.ajax({
                url:"ajax.php",
                method:"POST",
                data:{
                    "userLogin": true,
                    "user_email": email,
                    "user_password": password
                },
                success:function(result){
                    alert("Passed");
                    //window.location.href = "./profile.php";
                },
                error:function(error) {
                    alert("OOOPSSSS something went wrong :<");
                }
            });
        }*/

	</script>











  <!-- #GO TO TOP -->
  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up"></ion-icon>
  </a>

  <!-- js link -->
  <script src="./js/script.js"></script>

  <!-- ionicon link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>