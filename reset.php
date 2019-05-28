<?php

/*  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 	
	wizGrade V 1.1 (Formerly SDOSMS) is Developed by Igweze Ebele Mark | https://www.iem.wizgrade.com 
	https://www.wizgrade.com | Release Date – 2nd April, 2019
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 	
	Copyright 2014-2019 IGWEZE EBELE MARK | https://www.iem.wizgrade.com 
	
	Licensed under the Apache License, Version 2.0 (the "License");
	you may not use this file except in compliance with the License.
	You may obtain a copy of the License at

		http://www.apache.org/licenses/LICENSE-2.0

	Unless required by applicable law or agreed to in writing, software
	distributed under the License is distributed on an "AS IS" BASIS,
	WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	See the License for the specific language governing permissions and
	limitations under the License	
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
	wizGrade School App is Dedicated To Almighty God, My Amazing Parents ENGR Mr & Mrs Igweze Okwudili Godwin, 
	To My Fabulous and Supporting Wife Mrs Igweze Nkiruka Jennifer
	and To My Inestimable Sons Osinachi Michael, Ifechukwu Othniel and My Unborn lil Child.  
	
	WEBSITE 					PHONES												EMAILS
	https://www.wizgrade.com	+234 - 80 - 30 716 751, +234 - 80 - 22 000 490 		info@wizgrade.com	
	
	
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Page/Code Explanation~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	This script load admin reset password module
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

session_id();
session_start();
		
		define('wizGrade', 'igweze');  /* define a check for wrong access of file */
		require_once 'sources/functions/configDirIn.php';  /* include configuration script */  
 
		
		if(($wizGradePortalRoot == '') || ($wizGradeDB == '')){  /* check script installation */

$installScript =<<<IGWEZE
        
			<meta http-equiv="refresh" content="0;URL='script-install'" />
		
IGWEZE;
		
			echo $installScript;			 
			exit;
			
		}	
		
		require $wizGradeDBConnectIndDir;  /* load connection string */ 
		require_once $wizGradeFunctionDir;  /* load script functions */	 
		
		if (isset($_COOKIE['googtrans'])) {  /* check google translator cookies */ 
			unset($_COOKIE['googtrans']);
			setcookie('googtrans', '', time() - 3600, '/'); // empty value and old timestamp
		}	
		
		/* reset and delete all session values */ 

		$_SESSION = array();

		if (ini_get("session.use_cookies")) {	
    		$params = session_get_cookie_params();
    		setcookie(session_name(), '', time() - 42000,
        		$params["path"], $params["domain"],
        		$params["secure"], $params["httponly"]
    		);
		 }

		session_unset();
		session_destroy();	 
		
		try{ 

			$userMail = preg_replace("/[^A-Za-z0-9@_.]/", "", $_REQUEST['mail']);
			
			$resetVal = preg_replace("/[^A-Za-z0-9 ]/", "", $_REQUEST['r']);				
				
			$resetVal = strip_tags($resetVal);						
				
			$passVals = recoveryInfo($conn, $userMail, $resetVal);  /* school admin recovery password information  */
				
           	list ($adminMail, $rInfo, $rTime) = explode ("@(.$.)@", $passVals); 
		
 
		}catch(PDOException $e) {
  			
			wizGradeDie( 'Ooops Database Error: ' . $e->getMessage());
			 
		}			
		
		if($passVals != ''){   /* check if recovery information is true  */
	                 
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
	
	<!-- Twitter Card data -->
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:site" content="@wizGrade"/>
	<meta name="twitter:creator" content="@wizGrade"/>
	<meta name="twitter:url" content="//wizgrade.com/"/>
	<meta name="twitter:title" content="School Software App | Best rated school management system - wizGrade"/>
	<meta name="twitter:description" content="School Software App | Best rated school management system. 
	Complete and affordable school management system for all kinds of institutes. Free school 
	manager download and trial. Reach on info@wizgrade.com"/>
	<meta name="twitter:image" content="/favicon/apple-touch-icon.png"/>
	
	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="wizGrade" />
	<meta itemprop="description" content="School Software App - Best rated school management system. 
	Complete and affordable school management system for all kinds of institutes. Free school 
	manager download and trial. Reach on info@wizgrade.com"/>
	<meta itemprop="image" content="//favicon/apple-touch-icon.png" />	

	<!-- Open Graph data -->
	<meta property="og:type" content="website" />
	<meta property="og:url" content="//wizGrade.com/"/>
	<meta property="og:image" content="//wizGrade.com/images/wizGrade-app-icon.png"/>
	<meta property="og:title" content="School Software App | Best rated school management system - wizGrade"/>
	<meta property="og:description" content="School Software App | Best rated school management system. 
	Complete and affordable school management system for all kinds of institutes. Free school 
	manager download and trial. Reach on info@wizgrade.com"/>
	<meta property="og:site_name" content="wizGrade" />    

	<!-- Meta Head -->	
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="robots" content="ALL">
	<meta name="rating" content="GENERAL">
	<meta name="distribution" content="GLOBAL">
	<meta name="classification" content="school portal, school management system, software">
	<meta name="copyright" content="wizGrade https://www.wizgrade.com, Igweze Ebele Mark https://www.iem.wizgrade.com, SDOSMS http://www.sdosms.com">
    <meta name="author" content="Igweze Ebele Mark https://www.iem.wizgrade.com, https://www.wizGrade.com, http://www.sdosms.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 

    <!-- Favicon -->	
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $wizGradeTemplateIN; ?>favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $wizGradeTemplateIN; ?>favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $wizGradeTemplateIN; ?>favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo $wizGradeTemplateIN; ?>favicon/site.webmanifest">
	<link rel="mask-icon" href="<?php echo $wizGradeTemplateIN; ?>favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#bfb3d4">
	<meta name="theme-color" content="#ffffff">  

	<title>Reset Admin Password - wizGrade School App</title>

    <!-- stylesheet -->
	
    <link href="<?php echo $wizGradeTemplateIN; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $wizGradeTemplateIN; ?>css/bootstrap-reset-27408B.css" rel="stylesheet">   
    <link href="<?php echo $wizGradeTemplateIN; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="<?php echo $wizGradeTemplateIN; ?>css/pnotify.custom.css" rel="stylesheet">
    <link href="<?php echo $wizGradeTemplateIN; ?>css/style-27408B.css" rel="stylesheet">
    <link href="<?php echo $wizGradeTemplateIN; ?>css/style-responsive.css" rel="stylesheet" /> 
	
    <!-- / stylesheet -->
	
	<!-- jquery and javascripts -->
	
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo $wizGradeTemplateIN; ?>js/html5shiv.js"></script>
    <script src="<?php echo $wizGradeTemplateIN; ?>js/respond.min.js"></script>
    <![endif]-->
	<noscript> <meta http-equiv="refresh" content="0; URL=no-scripts"> </noscript>
	
	<!-- / jquery and javascripts -->
	
	</head>

	<body class="lock-screen"> 
	

		<div class="wizGrade-preloader">
		<div class="wizGrade-status">&nbsp;</div>
			 <div class="wizGrade-preload">	
			 
			</div>

		</div>
		
		<div class="container">
			<div id="wizGradePageContent"></div> 
		
	 
			<!-- form  -->  
			<form class="login-form" id="frmresetPassword" method="POST">

			<h2 class="login-form-heading" style="font-weight:600; font-size: 18px;">
			Reset Admin Password <br /><span id="small_rloader" style="display:none;">
			<img src="./wizGradeTemplates/images/loading.gif" alt="Loading >>>>>> " /> </span>
			</h2>
			<div id="resetBox" style="margin: 0% 10% 0% 10%;"></div>
			<center><img src="loading.gif" id="DemoLoader" style="display:none;" alt="Please Wait"/></center>

			<div class="login-wrap"> 
				 
				<div class="login-wrap-reset">
					<div class="form-group">
						<label for="password" class="col-lg-2 col-sm-2 control-label">
						<i class="fa fa-key" style=" font-size: 40px;"></i></label>
						<div class="col-lg-10">
						<input type="password" name="password" value=""
						class="form-control" placeholder="Please enter your new password" autofocus  style="margin-bottom: 15px; border: 
						1px solid #333;">
						</div>
					</div>
					
					
					<div class="form-group">
						<label for="cpassword" class="col-lg-2 col-sm-2 control-label">
						<i class="fa fa-key" style=" font-size: 40px;"></i></label>
						<div class="col-lg-10">
						<input type="password" name="cpassword" value=""
						class="form-control" placeholder="Please confirm your new password"  style="margin-bottom: 15px; border: 
						1px solid #333;">
						</div>
					</div>


					<input type="hidden" name="adminPass" value="changePass" />
					<button class="btn btn-lg btn-login btn-block" id="resetPassword" type="submit" > <i class="fa fa-lock"></i> 
					Reset </button> 
				</div>
				<div class="login-link">
					<a href="online-application" class="application"> <i class="fa fa-user-plus fa-lg"></i> Online Application</a>
					<a href="<?php echo $wizGradePortalRoot; ?>" class="home-login userSignino"><i class="fa fa-lock fa-lg"></i> Sign In </a>
					
				</div>
				
				<div style="background: #5193ea; margin: 5px; box-shadow: 0 4px #2775e2; padding: 10px; color: #fff; 
				font-size:14px;"> <b><span class="logo col-i-1">wizGrade</span></b> V1.1 
				</div> 

			

			</div><span class="col-i-i">wizGrade</span>  

			</form>
			<!-- /form  --> 
 
	
	</div>
		<!-- jquery  -->

		<script src="<?php echo $wizGradeTemplateIN; ?>js/jquery-1.12.4.js"></script>
		<script src="<?php echo $wizGradeTemplateIN; ?>js/bootstrap.min.js"></script>
		
		<script type="text/javascript" src="<?php echo $wizGradeTemplateIN; ?>js/pnotify.custom.js"></script>
		
		<script src="<?php echo $wizGradeTemplateIN; ?>js/jquery.scrollTo.min.js"></script>
		<script src="<?php echo $wizGradeTemplateIN; ?>js/jquery.nicescroll.js" type="text/javascript"></script>

		 
	
		<script type="text/javascript">

			function showPageLoader(){  /* show loading image */

				$('.loader-background').fadeIn(100);
				$('.loader-background').css("z-index", "9999999");
				
			}

			function hidePageLoader(){  /* hide loading image */

				$('.loader-background').fadeOut(3000);
				
			}; 

			$(function(){  /* dynamic include jquery scripts */
				
				var postVal = 'loadScript';
		
				$('#loadScriptPage').load('loadScript', {'pageType': postVal});
						
			});
			 
			
		</script> 
		
	<script> 
	
		var $buoop = {required:{e:-4,f:-3,o:-3,s:-1,c:-3},insecure:true,api:2018.10 }; 
		function $buo_f(){ 
		 var e = document.createElement("script"); 
		 e.src = "//browser-update.org/update.min.js"; 
		 document.body.appendChild(e);
		};
		try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
		catch(e){window.attachEvent("onload", $buo_f)}
		
	</script>		
		
 		
		<!-- / jquery  -->
					                                                                                                                                                                                                                                                                                          																																																																										<div id="loadScriptPage"> </div>

	</body>
	</html>

<?php

			$msg_i = "You can now change your password to a new one. Always remember keep your password secret only to yourself";
			echo $infoMsg.$msg_i.$iEnd; echo $scrollUp; exit; 
			

		}else{
			
			echo $userNavPageError; exit;  /* else exit or redirect to 404 page */
			
		}

?>		