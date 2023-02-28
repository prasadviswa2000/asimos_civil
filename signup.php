<?php
	
$showAlert = false;
$showError = false;
$exists=false;
	
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
	include 'dbconnect_civil.php';
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$year = $_POST["year"];
	$college = $_POST["college"];
	$city = $_POST["city"];
	$accomadationArr = $_POST["accomadation"];
	$foodArr = $_POST["food"];
	$civil_id=substr($phone,6);
	$random_num= bin2hex(random_bytes(1));
	$civil_id="CIVIL_".$civil_id.$random_num;
	$food ="";

	foreach ($foodArr as $f) {
		$food .= $f." : ";
	}

	$accomadation ="";

	foreach ($accomadationArr as $a) {
		$accomadation .= $a." : ";
	}
			
	
	$sql = "Select * from sympo_user_data where phone='$phone'";
	
	$result = mysqli_query($conn, $sql);
	
	$num = mysqli_num_rows($result);
	
	// This sql query is use to check if
	// the username is already present
	// or not in our Database
	if($num == 0) {
		if(($password == $password) && $exists==false) {			
			// Password Hashing is used here.
			$sql = "INSERT INTO `sympo_user_data` (`civil_id`,`user_name`,
				`password`, `phone`, `email`, `year`, `college`, `city`, `accomadation`, `food`, `timestamp`) VALUES ('$civil_id','$username',
				'$password','$phone','$email','$year','$college','$city','$accomadation','$food', current_timestamp())";
	
			$result = mysqli_query($conn, $sql);
	
			if ($result) {
				session_start();
				$_SESSION["civil_id"]=$civil_id;
				$_SESSION["user_name"]=$username;
				$_SESSION["phone"]=$phone;
				$_SESSION["email"]=$email;
				$_SESSION["status"]="true";
				$showAlert = true;
			}
		}
		else {
			$showError = "Passwords do not match";
		}	
	}// end if
	
if($num>0)
{
	$exists="Phone number already exsist";
}
	
}//end if
	
?>
	
<!doctype html>
	

	
<body>
	
<?php
	
	if($showAlert) {
		echo '<script>alert(" Success!\n Your account is now created and you can login.\n Your civil ID is '.$civil_id.'"); window.location.href="index.php";</script>';
	}
	
	if($showError) {
	
		echo '<script>alert("'.$showError.'")</script>';
}
		
	if($exists) {
		echo '<script>alert("'.$exists.'")</script>';
	}

?>
	
  






	
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	
<script src="
https://code.jquery.com/jquery-3.5.1.slim.min.js"
	integrity="
sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
	crossorigin="anonymous">
</script>
	
<script src="
https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
	integrity=
"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
	crossorigin="anonymous">
</script>
	
<script src="
https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
	integrity=
"sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
	crossorigin="anonymous">
</script>
</body>
</html>



<!DOCTYPE html><html class="no-js" lang><head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Civilisation'23
</title>
<meta name="description" content>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">


<link rel="stylesheet" href="css/bootstrap.min.css%2Blineicons.css%2Btiny-slider.css%2Banimate.css.pagespeed.cc.f6mcF0J9uk.css">
<link rel="stylesheet" href="css/main.css">
<script data-pagespeed-no-defer>(function(){function f(a,b,d){if(a.addEventListener)a.addEventListener(b,d,!1);else if(a.attachEvent)a.attachEvent("on"+b,d);else{var c=a["on"+b];a["on"+b]=function(){d.call(this);c&&c.call(this)}}};window.pagespeed=window.pagespeed||{};var g=window.pagespeed;function k(a){this.g=[];this.f=0;this.h=!1;this.j=a;this.i=null;this.l=0;this.b=!1;this.a=0}function l(a,b){var d=b.getAttribute("data-pagespeed-lazy-position");if(d)return parseInt(d,0);var d=b.offsetTop,c=b.offsetParent;c&&(d+=l(a,c));d=Math.max(d,0);b.setAttribute("data-pagespeed-lazy-position",d);return d}
function m(a,b){var d,c,e;if(!a.b&&(0==b.offsetHeight||0==b.offsetWidth))return!1;a:if(b.currentStyle)c=b.currentStyle.position;else{if(document.defaultView&&document.defaultView.getComputedStyle&&(c=document.defaultView.getComputedStyle(b,null))){c=c.getPropertyValue("position");break a}c=b.style&&b.style.position?b.style.position:""}if("relative"==c)return!0;e=0;"number"==typeof window.pageYOffset?e=window.pageYOffset:document.body&&document.body.scrollTop?e=document.body.scrollTop:document.documentElement&&
document.documentElement.scrollTop&&(e=document.documentElement.scrollTop);d=window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight;c=e;e+=d;var h=b.getBoundingClientRect();h?(e=h.top-d,c=h.bottom):(h=l(a,b),d=h+b.offsetHeight,e=h-e,c=d-c);return e<=a.f&&0<=c+a.f}
k.prototype.m=function(a){p(a);var b=this;window.setTimeout(function(){var d=a.getAttribute("data-pagespeed-lazy-src");if(d)if((b.h||m(b,a))&&-1!=a.src.indexOf(b.j)){var c=a.parentNode,e=a.nextSibling;c&&c.removeChild(a);a.c&&(a.getAttribute=a.c);a.removeAttribute("onload");a.tagName&&"IMG"==a.tagName&&g.CriticalImages&&f(a,"load",function(){g.CriticalImages.checkImageForCriticality(this);b.b&&(b.a--,b.a||g.CriticalImages.checkCriticalImages())});a.removeAttribute("data-pagespeed-lazy-src");a.removeAttribute("data-pagespeed-lazy-replaced-functions");
c&&c.insertBefore(a,e);if(c=a.getAttribute("data-pagespeed-lazy-srcset"))a.srcset=c,a.removeAttribute("data-pagespeed-lazy-srcset");a.src=d}else b.g.push(a)},0)};k.prototype.loadIfVisibleAndMaybeBeacon=k.prototype.m;k.prototype.s=function(){this.h=!0;q(this)};k.prototype.loadAllImages=k.prototype.s;function q(a){var b=a.g,d=b.length;a.g=[];for(var c=0;c<d;++c)a.m(b[c])}function t(a,b){return a.a?null!=a.a(b):null!=a.getAttribute(b)}
k.prototype.u=function(){for(var a=document.getElementsByTagName("img"),b=0,d;d=a[b];b++)t(d,"data-pagespeed-lazy-src")&&p(d)};k.prototype.overrideAttributeFunctions=k.prototype.u;function p(a){t(a,"data-pagespeed-lazy-replaced-functions")||(a.c=a.getAttribute,a.getAttribute=function(a){"src"==a.toLowerCase()&&t(this,"data-pagespeed-lazy-src")&&(a="data-pagespeed-lazy-src");return this.c(a)},a.setAttribute("data-pagespeed-lazy-replaced-functions","1"))}
g.o=function(a,b){function d(){if(!(c.b&&a||c.i)){var b=200;200<(new Date).getTime()-c.l&&(b=0);c.i=window.setTimeout(function(){c.l=(new Date).getTime();q(c);c.i=null},b)}}var c=new k(b);g.lazyLoadImages=c;f(window,"load",function(){c.b=!0;c.h=a;c.f=200;if(g.CriticalImages){for(var b=0,d=document.getElementsByTagName("img"),r=0,n;n=d[r];r++)-1!=n.src.indexOf(c.j)&&t(n,"data-pagespeed-lazy-src")&&b++;c.a=b;c.a||g.CriticalImages.checkCriticalImages()}q(c)});b.indexOf("data")&&((new Image).src=b);f(window,
"scroll",d);f(window,"resize",d)};g.lazyLoadInit=g.o;})();

pagespeed.lazyLoadInit(true, "/pagespeed_static/1.JiBnMqyl6S.gif");
</script></head>
<body><noscript><meta HTTP-EQUIV="refresh" content="0;url='https://preview.uideck.com/items/saaspal/?PageSpeed=noscript'"><style><!--table,div,span,font,p{display:none} --></style><div style="display:block">Please click <a href="https://preview.uideck.com/items/saaspal/?PageSpeed=noscript">here</a> if you are not redirected within a few seconds.</div></noscript>
<!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

<div class="preloader">
<div class="loader">
<div class="spinner">
<div class="spinner-container">
<div class="spinner-rotator">
<div class="spinner-left">
<div class="spinner-circle"></div>
</div>
<div class="spinner-right">
<div class="spinner-circle"></div>
</div>
</div>
</div>
</div>
</div>
</div>

<header class="header">
   <div class="navbar-area">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-12">
               <nav class="navbar navbar-expand-lg">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="toggler-icon"></span>
                  <span class="toggler-icon"></span>
                  <span class="toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                     <ul id="nav" class="navbar-nav ms-auto">
                        <li class="nav-item">
                           <a href="index.php" style="color:grey; font-weight:bold;">Home</a>
                        </li>
                        <li class="nav-item">
                           <a href="#about" style="color:grey; font-weight:bold;">About us</a>
                        </li>
                        <li class="nav-item">
                           <a href="#features" style="color:grey; font-weight:bold;">Events</a>
                        </li>
                        <li class="nav-item">
                           <a href="#pricing" style="color:grey; font-weight:bold;">Workshop</a>
                        </li>
                        <li class="nav-item">
                           <a href="#testimonials" style="color:grey; font-weight:bold;">Staffs and Members</a>
                        </li>
                        <li class="nav-item">
                           <a href="#bottom" style="color:grey; font-weight:bold;">Contact Us</a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </div>
</header>


<section id="features" class="feature-section pt-120">
<div class="container">



<h1 class="text-center">Register here !</h1>
	<form action="signup.php" method="post">
	
		<div class="form-group">
			<label for="username">Username</label>
		<input type="text" class="form-control" id="username"
			name="username"  size="50%" aria-describedby="emailHelp">	
		</div><br>
	
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control"
			id="password" name="password">
		</div><br>
	
		<div class="form-group">
			<label for="phone">Phone</label>
			<input type="text" class="form-control"
				id="phone" name="phone">
		</div>	<br>

		<div class="form-group">
			<label for="email">email</label>
			<input type="email" class="form-control"
				id="email" name="email">
		</div>	<br>

		<div class="form-group">
			<label for="year">Year</label>
			<input type="text" class="form-control"
				id="year" name="year">
			<small id="emailHelp" class="form-text text-muted">
				Please enter the year of passing out (Eg: 2024)
			</small>
		</div><br>

		<div class="form-group">
			<label for="college">college</label>
			<input type="text" class="form-control"
				id="college" name="college">
		</div>	<br>

		<div class="form-group">
			<label for="city">City</label>
			<input type="text" class="form-control"
				id="city" name="city">
	
			<small id="emailHelp" class="form-text text-muted">
				Enter the city you are from .	
			</small>
		</div><br>
		

		<div class="form-group">
			<label for="accomadation">Accomadation</label><br>
					<input type="checkbox" id="accomadation"  name="accomadation[]" value="a1" />
						<label for="accomadation"> 1st Day</label><br>
					
				
					<input type="checkbox" id="accomadation"  name="accomadation[]" value="a2" />
						<label for="accomadation"> 2nd Day</label><br>
					

					<input type="checkbox" id="accomadation"  name="accomadation[]" value="a3" />
						<label for="accomadation"> 3rd Day</label><br>
		
				

			<small id="emailHelp" class="form-text text-muted">
				Kindly select number of days, if you need accomadation (For Queries: )	<br>
				( This is payable. )
			</small>
		</div><br>	


		<div class="form-group">
			<label for="food">Food</label><br>
					<input type="checkbox" id="food"  name="food[]" value="f1" />
						<label> 1st Day</label><br>
				

					<input type="checkbox" id="food"  name="food[]" value="f2" />
						<label> 2nd Day</label><br>


					<input type="checkbox" id="food"  name="food[]" value="f3" />
						<label> 3rd Day</label><br>

				
			<small id="emailHelp" class="form-text text-muted">
				Kindly select number of days, if you need accomadation (For Queries: )	<br>
				( This is payable. )
			</small>
		</div>



		<center>
		<button type="submit" class="btn btn-primary">
		SignUp
		</button>
		</center>
	</form>
</div>



</div>
</div>
</div>

</div>
</div>
</div>
</section>


<a href="#" class="scroll-top btn-hover">
<i class="lni lni-chevron-up"></i>
</a>

<script type="text/javascript" data-pagespeed-no-defer>pagespeed.lazyLoadImages.overrideAttributeFunctions();</script><script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js.pagespeed.jm.G_Zu5oEg54.js"></script>
<script src="js/wow.min.js%2Bmain.js.pagespeed.jc.hw4o_gtsSz.js"></script><script>eval(mod_pagespeed_CXJZsQEwke);</script>
<script>eval(mod_pagespeed_$ME8v$x39D);</script>


</body></html>