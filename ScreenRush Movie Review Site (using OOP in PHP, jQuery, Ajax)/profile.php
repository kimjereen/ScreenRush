<?php 
    include('./header.php'); 
    include_once './database/dbconfig.php';

    $user = "";
    $username = "";
    $fullname = "";
    $user_email ="";
    if(isset($_SESSION['user_id'])) {
        $user = $_SESSION['login'];

        $id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
        $fullname = $_SESSION['fullname'];
        $user_email = $_SESSION['user_email'];

    } else {
        $_SESSION['login'] = "GUEST";
        $user = $_SESSION['login'];

        $username = "N/A";
        $fullname = "N/A";
        $user_email = "N/A";
    }
?>

	<section class="service" style="padding-top: 200px; height: 120vh;">
        <div class="container">

        <div class="service-banner">

			<div class="profile-module" id="profileModule">
				<div class="form-container user-container">
					<form action="" method="POST">
						<h1>USER PROFILE</h1>
						<input type="text" name="username" value="Username: <?php echo $username; ?>" disabled>
						<input type="text" name="fullname" value="Name: <?php echo $fullname; ?>" disabled>
						<input type="text" name="email" value="Email: <?php echo $user_email; ?>" disabled>
						
						<button class="btn logout-btn" id="userLogout">LOGOUT <ion-icon name="log-out"></ion-icon></button>	
					</form>
				</div>
			</div> 

        </div>

        <div class="service-content">

            <p class="service-subtitle">Hello! Welcome to ScreenRush!</p>

            <h2 class="h2 service-title">USER! <?php echo $username; ?></h2>

            <p class="service-text">
            We are thrilled to have you on board, Eembark on an exciting cinematic journey with us. Explore, Rate, and Share your favorite movies, and immerse yourself in a world of film appreciation and camaraderie, Only here at <strong>ScreenRush</strong>.
            </p>

            <ul class="service-list">

            <li>
                <div class="service-card">

                <div class="card-icon" id="home" title="Click to see Movies">
                    <ion-icon name="home"></ion-icon>
                </div>

                <div class="card-content">
                    <h3 class="h3 card-title">Movies</h3>

                    <p class="card-text">
                    Checkout these amazing collection of movies today! Simply click on the circle to start your cinematic journey!
                    </p>
                </div>

                </div>
            </li>

            <li>
                <div class="service-card">

                <div class="card-icon" id="reviews" title="Click to see your Reviews">
                    <ion-icon name="Star"></ion-icon>
                </div>

                <div class="card-content">
                    <h3 class="h3 card-title">My Reviews</h3>

                    <p class="card-text">
                    Check out the list of movies you've reviewed so far. Just click the circle button on the side.
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
        document.getElementById('reviews').addEventListener('click', function() {
            window.location.href = 'my_reviews.php';
        });

        document.getElementById('home').addEventListener('click', function() {
            window.location.href = 'index.php';
        });

        $(document).ready(function() {
            
            $('#userLogout').click(function() {
                $.ajax({
                    url: 'logout.php',
                    method: 'POST',
                    data: { userLogout: true },
                    success: function(response) {
                        window.location.href = 'signin.php'; 
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });

        });

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