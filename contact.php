		<div class="login">
		    <h1 class="heading">Contact Us</h1>
		    <div class="cont">

		        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

		            Vision Court Estate, Lokogoma District<br>
		            Abuja, Nigeria<br>
		            Mail - davidikenna271@gmail.com
		        </form>
		    </div>
		</div>
		<div class="footer">
		    <footer>
		        <p>Copyright &copy; David Ikenna </p>
		    </footer>
		</div>
		<script src="js/jquery.js"></script>
		<script>
		    $(document).ready(function() {
		        $(".error").fadeTo(1000, 100).slideUp(1000, function() {
		            $(".error").slideUp(1000);
		        });

		        $(".success").fadeTo(1000, 100).slideUp(1000, function() {
		            $(".success").slideUp(1000);
		        });
		    });
		</script>



		</body>

		</html>