    <section id="admin-login">
		<div class="container" style="min-height: 100vh; padding-top: 25px;">
		
		<p class="section-subtitle" style="padding-top: 80px;">You have the Control</p>
		<h2 class="h2 section-title">Admin Login</h2>
		
		<div class="admin-module" id="adminModule">
			<form action="" method="POST">
				<input type="email" name="admin_email" placeholder="Email">
				<input type="password" name="admin_password" placeholder="Password" required>
				
				<input type="submit" class="btn login-btn" id="adminLogin" value="LOGIN">
			</form>
		</div>
	</section>

    <script type="text/javascript">
        $(document).ready(function() {

			$("#adminLogin").click(function(){

                var email = $("#admin_email").val();
                var password = $("#admin_password").val();

                $.ajax({
                    url: 'ajax.php',
                    method: 'POST',
                    data: {
                        "adminLogin": true,
                        'admin_email': email,
                        'admin_password': password
                    },
                    success: function(response){

                        if(response){
                           window.location.href = './admin/admin.php';
                        } else {
                            alert('Invalid EMAIL or PASSWORD. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });

        });




    </script>


