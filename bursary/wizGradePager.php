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
	This script load bursary modules
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

session_id();

session_start();

               define('wizGrade', 'igweze');  /* define a check for wrong access of file */
			   
			   $_SESSION['lastADMINActivity'] = time(); 

               require 'configwizGrade.php';  /* load wizGrade configuration files */

     			switch ($_REQUEST['iemj']) {
     					 					
					case 'feeCategory':

                    require_once ($bursaryDir.'feeCategory.php');

                    break;
					
					case 'expenseCategory':

                    require_once ($bursaryDir.'expenseCategory.php');

                    break;
					
					case 'fees':

                    require_once ($bursaryDir.'wizGradeFees.php');

                    break;

					case 'bursConfig':

                    require_once ($bursaryDir.'bursConfig.php');

                    break;
					
					case 'expenses':

                    require_once ($bursaryDir.'wizGradeExpenses.php');

                    break;

	 			    case 'productCate':

                    require_once ($bursaryDir.'productCategory.php');

                    break;
					
					case 'products':

                    require_once ($bursaryDir.'wizGradeProducts.php');

                    break;
					
					case 'orders':

                    require_once ($bursaryDir.'wizGradeOrders.php');

                    break;
					
					case 'lockScreen':

                    require_once ($wizGradeAdminGlobalDir.'wizGradeScreenLocka.php');

                    break;

     				case 'editPass':

     				require_once ($wizGradeAdminGlobalDir.'passwordManager.php');

     				break;
					
					case 'myProfile':

					require_once ($wizGradeAdminGlobalDir.'showStaffBio.php');

     				break;
     
     				case 'wizGradeLogOuta':

	 				require_once ($wizGradeAdminGlobalDir.'wizGradeLogOut.php');
	 	
     				break;

     				default:
					
     				require_once ($bursaryDir.'index.php');

     				break;

     		}
			
			echo "<script type='text/javascript'> hidePageLoader();  /* hide page loader */	</script>";	exit;


?>