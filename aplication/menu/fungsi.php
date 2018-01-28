<?
	function config_login () {
		if ((!isset($_SESSION['Email']))&&(!isset($_SESSION['Level']))){
			echo "<script>alert('Illegal Access, Please login')</script>";
			echo "<script>document.location='../index.html'</script>";
		}	
	}
	