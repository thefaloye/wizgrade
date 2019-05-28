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
	This script load application modules
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

session_id();
session_start();

		define('wizGrade', 'igweze');  /* define a check for wrong access of file */
		require_once 'sources/functions/configDirIn.php';  /* include configuration script */  
		
		require $wizGradeDBConnectIndDir;  /* load connection string */ 
		require_once $wizGradeFunctionDir;  /* load script functions */	 
		 
		if (isset($_SESSION['wizGradePiloter'])) {  /* check if a iframe link is not empty  */
			
			$iframeSrc = $_SESSION['wizGradePiloter'];

		}else{  /* reset iframe link  */
			
			unset($_SESSION['wizGradePiloter']);					 
			$iframeSrc = $wizGradePortalRoot.'index w iz Grade';

		}		 
		 echo $iframeSrc;
		$schoolDataArray = wizGradeSchool($conn);  /* school configuration setup array  */					
		$schoolNameTop = $schoolDataArray[0]['school_name'];  
	
		$encrypted = cryptoJsAesEncrypt("osinachi", "$iframeSrc");  /* encrytion strings. Please don't edit this */		
		$igweze = cryptoJsAesEncrypt("nkiruka", "Mrs Nkiruka Igweze my fabulous wife");  /* encrytion strings. Please don't edit this */
		$osinachi = cryptoJsAesEncrypt("osinachi", "Osinachi my fabulous 1st Son");  /* encrytion strings. Please don't edit this */
		$nkiruka = cryptoJsAesEncrypt("ifechukwu", "ifechukwu my fabulous 2nd Son");  /* encrytion strings. Please don't edit this */ 
	
?>

	<!DOCTYPE html>
	<html lang="en">
	
	<head>
	
	<!-- meta tags -->
	
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="robots" content="ALL">
	<meta name="rating" content="GENERAL">
	<meta name="distribution" content="GLOBAL">
	<meta name="classification" content="school portal, school management system, software">
	<meta name="copyright" content="wizGrade https://www.wizgrade.com, Soft Digit LTD http://www.softdigit.com.ng">
    <meta name="author" content="http://www.softdigit.com.ng, https://www.wizgrade.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 

	<meta name="keywords" content="SDSOSM, best grading system,  administration system,
	report cards, reportcards, transcripts, #1 best grading system, online school management system, 
	online school administration software, school administration software, student information system, 
	standards-based report cards, online gradebook, online grade book, gradebook, grade book,  grade book reports,
	best web-based gradebook, gradebook program, best gradebook software, teacher grade book, electronic grading, electronic gradebook,
	automated grading, computerized gradebook,  gradebook software,  teachertools, grading, grading application, 
	high school, college, polytectnics, elementary, university, education, schools,
	junior high, K-12, middle school, educational software, school software, cbt, online exam, online assessments,
	result prediction, automated result computation, course registration, student mailbox" /> 


	<meta name="description" content="best rated school management system, 
	best school management system, world best school management system, no 1 school management system, no 1 best school management system,
	complete and affordable school management system, standards based school management solution, best grading system, #1 best grading system, 
	online attendance and daily comment and real-time parent portal, online time based exam and assignments,
	online gradebook and school management software with grades online for students and parents, 
	combine secondary primary and nursery school management system, best combine k-12 school management system,
	track attendance, homework, gradebook, report cards, scheduler, parent portal and more,
	the best electronic grading software program,  online gradebook and school management software, 
	compute students grade point automatically, generate student detailed transcript, 
	generate student transcript, best school portal management system, principal automatted comments, 
	automated class and subject position ranking, automated and accurate grade point calculation, students result prediction, 
	school customize scratch cards"/>
	
	<!-- / meta tags -->
	 
	<link rel="icon" type="image/x-icon" href="<?php echo $wizGradeTemplateIN; ?>images/favicon.png" />
    
	<style type="text/css">body,html{ height: 100%; margin:0; padding:0; overflow:hidden; }</style><!-- stylesheet -->
	
	<!-- jquery and javascripts -->
 
	<script> var ifechukwu = '<?php echo $encrypted; ?>'; </script>	
	<script> var osinachi = '<?php echo $osinachi; ?>'; </script>	
	<script> var nkiruka = '<?php echo $nkiruka; ?>'; </script>	
	<script> var igweze = '<?php echo $igweze; ?>'; </script>
	
	<!-- / jquery and javascripts -->
	
	<noscript> <meta http-equiv="refresh" content="0; URL=no-scripts"> </noscript>
 
	<title><?php echo $schoolNameTop; ?> - wizGrade </title>
	
	</head>
		<body id="wizGradeBody"> </body>
	</html>
	
	<!-- jquery and javascripts -->
	
	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>   
	<script type="text/javascript" src="aes.js"></script>
	<script type="text/javascript" src="script-un.js"></script>
	
	<!-- / jquery and javascripts -->