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
	This script handle admin jQuery/Javascript
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

session_id();

session_start();

     	define('wizGrade', 'igweze');  /* define a check for wrong access of file */
   
		require 'configINwizGrade.php';  /* load wizGrade configuration files */	   
     
		if (($_POST['pageType']) == 'loadScript') { 

?>



		<script type="text/javascript">
		
 

			$('body').on('click','.changeSchool',function(event){  /* change school type */

				event.stopImmediatePropagation();
				showPageLoader();
				var clickedTheme = this.id.split('-');
				var schoolID = clickedTheme[1];

				var wizGrade = 'changeSchool';

				$('#schoolCDIV').load('schoolChanger.php', {'schoolT': schoolID,
				'schoolType':wizGrade }).fadeIn(300); 

				return false;

			}); 
			
			$('body').on('click','.wizGradeMode', function(event){  /* change school mode type */

				event.stopImmediatePropagation();
				showPageLoader();
				var clickMode = this.id.split('-');
				var wizGradeID = clickMode[1];

				var wizGrade = 'actMode';

				$('#wizGradePageMsg').load('wizGradeModeSetter.php', {'wizGradeMode': wizGradeID,
				'wizGradeData':wizGrade }).fadeIn(300); 

				return false; 
			});		 
			
			$('body').on('click','.btn-theme',function(event){  /* change page theme */

				event.stopImmediatePropagation();
				showPageLoader();
				var clickedTheme = this.id.split('#');
				var colorID = clickedTheme[1];

				var wizGradeColor = 'wizGradeColor';

				$('#msgBoxTheme').load('wizGradeConfigCPanel.php', {'themeColorID': colorID,
				'schoolSettings':wizGradeColor }).fadeIn(300);  

				return false;

			});

			$('body').on('click','.schoolSettingsBtn a',function(event){  /* select school settings */									  
												  
				event.stopImmediatePropagation();	
				
				var varID = this.id;
				
				showPageLoader();
				
				$(".schoolSettingsBtn a").removeClass('activeMenu');
				$(this).addClass('activeMenu');
				$("#schoolSettingsDiv").load(varID);
				$('html, body').animate({ scrollTop:  $('#schoolSettingsDiv').offset().top - 50 }, 'slow');
				
				hidePageLoader();  /* hide page loader */
			
				return false;
	  
			}); 
			
			$('body').on('click','.viewNewReg',function(event){  /* view new registration */
			
				event.stopImmediatePropagation();
				
				var varID = this.id;
				
				showPageLoader();   
				
				$('#wizGradeRightHalf').load('wizGradeOnlineReg.php', {'reg': varID }).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 30 }, 'slow'); 
			
				return false;  
			
			}); 

			$('body').on('click','.admitNewReg',function(event){  /* admin a new student */
			
				event.stopImmediatePropagation();	
				
				var studentID = this.id;
				var newBioData = 'newStuBioData';
				var regnum = $('#regnum').val();
				var level = $('#levelReg').val();
				var schClass = $('#class').val();
				var term = $('#term').val(); 
				
				$('.registration-loader').fadeIn(100);
				
				$('#msgBoxDiv').load('acceptRegistration.php', {'newBioData': newBioData, 'studentID': studentID, 
									 'regnum': regnum, 'level': level, 'class': schClass, 'term': term  }).fadeIn(1000); 
				
				return false;  
			
			});	 

			$('body').on('click','#mregRemoveBtn',function(event){  /* trigger remove registration */
			
				event.stopImmediatePropagation();		
				
				$('.removeNewReg').trigger('click');
				
				return false;
				
			}); 

			$('body').on('click','.removeNewReg',function(event){  /* remove registration */
			
				event.stopImmediatePropagation();	
				
				var studentID = this.id;
				var newBioData = 'remove-registration';
				

				$('.registration-loader').fadeIn(100);
				
				$('#msgBoxDiv').load('removeRegistration.php', {'newBioData': newBioData, 
									 'studentID': studentID }).fadeIn(1000);
			
				
				return false;  
			
			});	  
			
			$('body').on('click','#schoolSettings',function(){  /* school settings configuration */
			
				$('#frmschoolSettings').submit(function(event) {		
						
					$('.configLoading').fadeIn(100);	
				
					event.stopImmediatePropagation();
							
						$.post('wizGradeConfigCPanel.php', $(this).find('select, input').serialize(), function(data) {
							
							$('.msgBoxSettings').html(data);	
							$('html, body').animate({ scrollTop:  $('.msgBoxSettings').offset().top - 30 }, 'slow');
						
						});
			  
					return false;
				
				});		
			});

			$('body').on('click','#examConfigs',function(){  /* exams settings configuration */
			
				$('#frmexamConfigs').submit(function(event) {		
					
					$('.configLoading').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('wizGradeHConfigCPanel.php', $(this).find('select, input').serialize(), function(data) {
						
						$('.msgBoxSettings').html(data);	
						$('html, body').animate({ scrollTop:  $('.msgBoxSettings').offset().top - 30 }, 'slow');
				
					});
	  
					return false;
			
				});		
			});

			$('body').on('click','#currentSession',function(){  /* current school settings configuration */
			
				$('#frmcurrentSession').submit(function(event) {		
						
					$('.configLoading').fadeIn(100);	
				
					event.stopImmediatePropagation();
							
					$.post('wizGradeConfigCPanel.php', $(this).find('select, input').serialize(), function(data) {
						
						$('.msgBoxSettings').html(data);	
						$('html, body').animate({ scrollTop:  $('.msgBoxSettings').offset().top - 30 }, 'slow'); 
							
						
					});
		  
					return false;
				
				});		
				
			});

			$('body').on('click','#levelSettings',function(){  /* school level settings configuration */
			
				$('#frmlevelSettings').submit(function(event) {		
						
					$('.configLoading').fadeIn(100);	
				
					event.stopImmediatePropagation();
							
					$.post('wizGradeHConfigCPanel.php', $(this).find('select, input').serialize(), function(data) {
						
						$('.msgBoxSettings').html(data);	
						$('html, body').animate({ scrollTop:  $('.msgBoxSettings').offset().top - 30 }, 'slow'); 
							
					
					});
		  
					return false;
				
				});		
			});

			$('body').on('click','#classSettings',function(){  /* school class settings configuration */
			
				$('#frmclassSettings').submit(function(event) {		
						
					$('.configLoading').fadeIn(100);	
				
					event.stopImmediatePropagation();
							
					$.post('wizGradeHConfigCPanel.php', $(this).find('select, input').serialize(), function(data) {
						
						$('.msgBoxSettings').html(data);	
						$('html, body').animate({ scrollTop:  $('.msgBoxSettings').offset().top - 30 }, 'slow'); 
						
					});
		  
					return false;
				
				});		
			});

			$('body').on('click','#classTypeSettings',function(){  /* school class type settings configuration */
			
				$('#frmclassTypeSettings').submit(function(event) {		
						
					$('.configLoading').fadeIn(100);	
				
					event.stopImmediatePropagation();
							
					$.post('wizGradeHConfigCPanel.php', $(this).find('select, input').serialize(), function(data) {
						
						$('.msgBoxSettings').html(data);	
						$('html, body').animate({ scrollTop:  $('.msgBoxSettings').offset().top - 100 }, 'slow'); 
						
					});
		  
					return false;
				
				});		
			});
			
			$('body').on('click','#minCourseConfig',function(){  /* school minimum course settings configuration */
			
				$('#frmminCourseConfig').submit(function(event) {		
						
					$('.configLoading').fadeIn(100);	
				
					event.stopImmediatePropagation();
							
					$.post('wizGradeHConfigCPanel.php', $(this).find('select, input').serialize(), function(data) {
						
						$('.msgBoxSettings').html(data);	
						$('html, body').animate({ scrollTop:  $('.msgBoxSettings').offset().top - 30 }, 'slow'); 
							
					
					});
		  
					return false;
				
				});		
			});
			
			$('body').on('click','.sessionEdit',function(event){  /* edit school session */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var sessionID = clickedID[1];
				var postVal_fi = 'EditSession_fi';
				var postVal_se = 'EditSession_se';
				var postVal_th = 'EditSession_th';
				var fiTerm = $('#editDivfi-'+sessionID).text();
				var seTerm = $('#editDivse-'+sessionID).text();
				var thTerm = $('#editDivth-'+sessionID).text();
				
				$('.frmloader-'+sessionID).fadeIn(100);
				
				$('#editDivfi-'+sessionID).load('wizGradeConfigCPanel.php', {'schoolSettings': 
												postVal_fi, 'fiTerm': fiTerm,
												'sessionID': sessionID  }).fadeIn(1000);

				$('#editDivse-'+sessionID).load('wizGradeConfigCPanel.php', 
												{'schoolSettings': postVal_se, 'seTerm': seTerm,
													  'sessionID': sessionID  }).fadeIn(1000);

				$('#editDivth-'+sessionID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal_th,
													  'thTerm': thTerm, 'sessionID': sessionID  }).fadeIn(1000);

				$('.frmloader-'+sessionID).fadeOut(3000);
				
				return false;  
			
			});

			$('body').on('click','.sessionUpdate',function(event){  /* update school session */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var sessionID = clickedID[1];
				var postVal = 'UpdateSession';
				var postVal_fi = 'UpdateSession_fi';
				var postVal_se = 'UpdateSession_se';
				var postVal_th = 'UpdateSession_th';
				var fiTerm = $('#fiTerm-'+sessionID).val();
				var seTerm = $('#seTerm-'+sessionID).val();
				var thTerm = $('#thTerm-'+sessionID).val();

				$('.frmloader-'+sessionID).fadeIn(100);
				
				$('#editDivfi-'+sessionID).load('wizGradeConfigCPanel.php', 
												{'schoolSettings': postVal_fi, 'fiTerm': fiTerm,
												'sessionID': sessionID  }).fadeIn(1000);

				$('#editDivse-'+sessionID).load('wizGradeConfigCPanel.php', 
												{'schoolSettings': postVal_se, 'seTerm': seTerm,
													  'sessionID': sessionID  }).fadeIn(1000);

				$('#editDivth-'+sessionID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal_th,
													  'thTerm': thTerm, 'sessionID': sessionID  }).fadeIn(1000);
				
				$('.frmloader-'+sessionID).fadeOut(3000);
				
				return false;  
			
			});		


			$('body').on('click','.sessionEditTF',function(event){  /* edit school session */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var sessionID = clickedID[1];
				var postVal_fi = 'EditSession_fi';
				var postVal_se = 'EditSession_se';
				var postVal_th = 'EditSession_th';
				var fiTerm = $('#editDivfi-'+sessionID).text();
				var seTerm = $('#editDivse-'+sessionID).text();
				var thTerm = $('#editDivth-'+sessionID).text();
				
				$('.frmloader-'+sessionID).fadeIn(100);
				
				$('#editDivfi-'+sessionID).load('RSTimeFrameManager.php', {'RTFSettings': postVal_fi, 'fiTerm': fiTerm,
												'sessionID': sessionID  }).fadeIn(1000);

				$('#editDivse-'+sessionID).load('RSTimeFrameManager.php', {'RTFSettings': postVal_se, 'seTerm': seTerm,
													  'sessionID': sessionID  }).fadeIn(1000);

				$('#editDivth-'+sessionID).load('RSTimeFrameManager.php', {'RTFSettings': postVal_th,
													  'thTerm': thTerm, 'sessionID': sessionID  }).fadeIn(1000);

				$('.frmloader-'+sessionID).fadeOut(3000);
				
				return false;  
			
			});

			$('body').on('click','.sessionUpdateTF',function(event){  /* update school session */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var sessionID = clickedID[1];
				var postVal = 'UpdateSession';
				var postVal_fi = 'UpdateSession_fi';
				var postVal_se = 'UpdateSession_se';
				var postVal_th = 'UpdateSession_th';
				var fiTerm = $('#fiTerm-'+sessionID).val();
				var seTerm = $('#seTerm-'+sessionID).val();
				var thTerm = $('#thTerm-'+sessionID).val();

				$('.frmloader-'+sessionID).fadeIn(100);
				
				$('#editDivfi-'+sessionID).load('RSTimeFrameManager.php', {'RTFSettings': postVal_fi, 'fiTerm': fiTerm,
												'sessionID': sessionID  }).fadeIn(1000);

				$('#editDivse-'+sessionID).load('RSTimeFrameManager.php', {'RTFSettings': postVal_se, 'seTerm': seTerm,
													  'sessionID': sessionID  }).fadeIn(1000);

				$('#editDivth-'+sessionID).load('RSTimeFrameManager.php', {'RTFSettings': postVal_th,
													  'thTerm': thTerm, 'sessionID': sessionID  }).fadeIn(1000);
				
				$('.frmloader-'+sessionID).fadeOut(3000);
				
				return false;  
			
			});		 				 

			$('body').on('click','.remarkSave',function(event){  /* save teachers remarks */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var remarkID = clickedID[1];
				var postVal = 'SaveRemarks';
				var Remarks = $('#frmRemark-'+remarkID).val();

				$('#frmloader-'+remarkID).fadeIn(100);
				
				$('#msgBoxDiv-'+remarkID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 
													  'Remarks': Remarks, 'remarkID': remarkID  }).fadeIn(1000);
				$('#frmloader-'+remarkID).fadeOut(3000);
				
				return false;  
			
			});		

			$('body').on('click','.remarkUpdate',function(event){  /* update teachers remarks */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var remarkID = clickedID[1];
				var postVal = 'UpdateRemarks';
				var Remarks = $('#frmRemark-'+remarkID).val();

				$('#frmloader-'+remarkID).fadeIn(100);
				
				$('#msgBoxDiv-'+remarkID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 
													  'Remarks': Remarks, 'remarkID': remarkID  }).fadeIn(1000);
				$('#frmloader-'+remarkID).fadeOut(3000);
				
				return false;  
			
			});		

			$('body').on('click','.remarkEdit',function(event){  /* edit teachers remarks */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var remarkID = clickedID[1];
				var postVal = 'EditRemarks';
				var Remarks = $('#editDiv-'+remarkID).text();

				$('#frmloader-'+remarkID).fadeIn(100); 
				
				$('#editDiv-'+remarkID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 'Remarks': Remarks,
													  'remarkID': remarkID  }).fadeIn(1000);
				$('#frmloader-'+remarkID).fadeOut(3000);
				
				return false;  
			
			});
			


			$('body').on('click','.remarkRemove',function(event){  /* remove teachers remarks */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var remarkID = clickedID[1];
				var postVal = 'RemoveRemarks';

				$('#frmloader-'+remarkID).fadeIn(100);
				
				$('#editDiv-'+remarkID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal,
													  'remarkID': remarkID  }).fadeIn(1000);
				$('#frmloader-'+remarkID).fadeOut(3000);
				
				return false;  
			
			}); 

			$('body').on('click','.disabilitySave',function(event){  /* save disability */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var disabilityID = clickedID[1];
				var postVal = 'SaveDisability';
				var Disability = $('#frmDisability-'+disabilityID).val();

				$('#frmloader-'+disabilityID).fadeIn(100);
				
				$('#msgBoxDiv-'+disabilityID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 
													  'Disability': Disability, 'disabilityID': disabilityID  }).fadeIn(1000);
				$('#frmloader-'+disabilityID).fadeOut(3000);
				
				return false;  
			
			});		

			$('body').on('click','.disabilityUpdate',function(event){  /* update disability */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var disabilityID = clickedID[1];
				var postVal = 'UpdateDisability';
				var Disability = $('#frmDisability-'+disabilityID).val();

				$('#frmloader-'+disabilityID).fadeIn(100);
				
				$('#msgBoxDiv-'+disabilityID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 
													  'Disability': Disability, 'disabilityID': disabilityID  }).fadeIn(1000);
				$('#frmloader-'+disabilityID).fadeOut(3000);
				
				return false;  
			
			});		

			$('body').on('click','.disabilityEdit',function(event){  /* edit disability */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var disabilityID = clickedID[1];
				var postVal = 'EditDisability';
				var Disability = $('#editDiv-'+disabilityID).text();

				$('#frmloader-'+disabilityID).fadeIn(100); 
				
				$('#editDiv-'+disabilityID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 'Disability': Disability,
													  'disabilityID': disabilityID  }).fadeIn(1000);
				$('#frmloader-'+disabilityID).fadeOut(3000);
				
				return false;  
			
			});
			
			$('body').on('click','.disabilityRemove',function(event){  /* remove disability */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var disabilityID = clickedID[1];
				var postVal = 'RemoveDisability';

				$('#frmloader-'+disabilityID).fadeIn(100);
				
				$('#editDiv-'+disabilityID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal,
													  'disabilityID': disabilityID  }).fadeIn(1000);
				$('#frmloader-'+disabilityID).fadeOut(3000);
				
				return false;  
			
			}); 

			$('body').on('click','.clubSave',function(event){  /* save school club */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var clubID = clickedID[1];
				var postVal = 'SaveClub';
				var Club = $('#frmClub-'+clubID).val();

				$('#frmloader-'+clubID).fadeIn(100);
				
				$('#msgBoxDiv-'+clubID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 
													  'Club': Club, 'clubID': clubID  }).fadeIn(1000);
				$('#frmloader-'+clubID).fadeOut(3000);
				
				return false;  
			
			});		

			$('body').on('click','.clubUpdate',function(event){  /* update school club */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var clubID = clickedID[1];
				var postVal = 'UpdateClub';
				var Club = $('#frmClub-'+clubID).val();

				$('#frmloader-'+clubID).fadeIn(100);
				
				$('#msgBoxDiv-'+clubID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 
													  'Club': Club, 'clubID': clubID  }).fadeIn(1000);
				$('#frmloader-'+clubID).fadeOut(3000);
				
				return false;  
			
			});		

			$('body').on('click','.clubEdit',function(event){  /* edit school club */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var clubID = clickedID[1];
				var postVal = 'EditClub';
				var Club = $('#editDiv-'+clubID).text();

				$('#frmloader-'+clubID).fadeIn(100);
				
				
				$('#editDiv-'+clubID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 'Club': Club,
													  'clubID': clubID  }).fadeIn(1000);
				$('#frmloader-'+clubID).fadeOut(3000);
				
				return false;  
			
			});
			
			$('body').on('click','.clubRemove',function(event){  /* remove school club */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var clubID = clickedID[1];
				var postVal = 'RemoveClub';

				$('#frmloader-'+clubID).fadeIn(100);
				
				$('#editDiv-'+clubID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal,
													  'clubID': clubID  }).fadeIn(1000);
				$('#frmloader-'+clubID).fadeOut(3000);
				
				return false;  
			
			}); 

			$('body').on('click','.clubPostSave',function(event){  /* save school club position */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var clubPostID = clickedID[1];
				var postVal = 'SaveClubPost';
				var ClubPost = $('#frmClubPost-'+clubPostID).val();

				$('#frmloader-'+clubPostID).fadeIn(100);
				
				$('#msgBoxDiv-'+clubPostID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 
													  'ClubPost': ClubPost, 'clubPostID': clubPostID  }).fadeIn(1000);
				$('#frmloader-'+clubPostID).fadeOut(3000);
				
				return false;  
			
			});		

			$('body').on('click','.clubPostUpdate',function(event){  /* update school club position */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var clubPostID = clickedID[1];
				var postVal = 'UpdateClubPost';
				var ClubPost = $('#frmClubPost-'+clubPostID).val();

				$('#frmloader-'+clubPostID).fadeIn(100);
				
				$('#msgBoxDiv-'+clubPostID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 
													  'ClubPost': ClubPost, 'clubPostID': clubPostID  }).fadeIn(1000);
				$('#frmloader-'+clubPostID).fadeOut(3000);
				
				return false;  
			
			});		

			$('body').on('click','.clubpostEdit',function(event){  /* edit school club position */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var clubPostID = clickedID[1];
				var postVal = 'EditClubPost';
				var ClubPost = $('#editDiv-'+clubPostID).text();

				$('#frmloader-'+clubPostID).fadeIn(100); 
				
				$('#editDiv-'+clubPostID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 
											   'ClubPost': ClubPost,
													  'clubPostID': clubPostID  }).fadeIn(1000);
				$('#frmloader-'+clubPostID).fadeOut(3000);
				
				return false;  
			
			});
			
			$('body').on('click','.clubPostRemove',function(event){  /* remove school club position */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var clubPostID = clickedID[1];
				var postVal = 'RemoveClubPost';

				$('#frmloader-'+clubPostID).fadeIn(100);
				
				$('#editDiv-'+clubPostID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal,
													  'clubPostID': clubPostID  }).fadeIn(1000);
				$('#frmloader-'+clubPostID).fadeOut(3000);
				
				return false;  
			
			});

			$('body').on('click','.sportSave',function(event){  /* save sport */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var sportID = clickedID[1];
				var postVal = 'SaveSport';
				var Sport = $('#frmSport-'+sportID).val();

				$('#frmloader-'+sportID).fadeIn(100);
				
				$('#msgBoxDiv-'+sportID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 
													  'Sport': Sport, 'sportID': sportID  }).fadeIn(1000);
				$('#frmloader-'+sportID).fadeOut(3000);
				
				return false;  
			
			});		

			$('body').on('click','.sportUpdate',function(event){  /* update sport */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var sportID = clickedID[1];
				var postVal = 'UpdateSport';
				var Sport = $('#frmSport-'+sportID).val();

				$('#frmloader-'+sportID).fadeIn(100);
				
				$('#msgBoxDiv-'+sportID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 
													  'Sport': Sport, 'sportID': sportID  }).fadeIn(1000);
				$('#frmloader-'+sportID).fadeOut(3000);
				
				return false;  
			
			});		

			$('body').on('click','.sportEdit',function(event){  /* edit sport */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var sportID = clickedID[1];
				var postVal = 'EditSport';
				var Sport = $('#editDiv-'+sportID).text();

				$('#frmloader-'+sportID).fadeIn(100); 
				
				$('#editDiv-'+sportID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 'Sport': Sport,
													  'sportID': sportID  }).fadeIn(1000);
				$('#frmloader-'+sportID).fadeOut(3000);
				
				return false;  
			
			});
			
			$('body').on('click','.sportRemove',function(event){  /* remove sport */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var sportID = clickedID[1];
				var postVal = 'RemoveSport';

				$('#frmloader-'+sportID).fadeIn(100);
				
				$('#editDiv-'+sportID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal,
													  'sportID': sportID  }).fadeIn(1000);
				$('#frmloader-'+sportID).fadeOut(3000);
				
				return false;  
			
			});

			$('body').on('click','.rankingSave',function(event){  /* save teacher ranking */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var rankingID = clickedID[1];
				var postVal = 'SaveRanking';
				var Ranking = $('#frmRanking-'+rankingID).val();

				$('#frmloader-'+rankingID).fadeIn(100);
				
				$('#msgBoxDiv-'+rankingID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 
													  'Ranking': Ranking, 'rankingID': rankingID  }).fadeIn(1000);
				$('#frmloader-'+rankingID).fadeOut(3000);
				
				return false;  
			
			});		

			$('body').on('click','.rankingUpdate',function(event){  /* update teacher ranking */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var rankingID = clickedID[1];
				var postVal = 'UpdateRanking';
				var Ranking = $('#frmRanking-'+rankingID).val();

				$('#frmloader-'+rankingID).fadeIn(100);
				
				$('#msgBoxDiv-'+rankingID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 
													  'Ranking': Ranking, 'rankingID': rankingID  }).fadeIn(1000);
				$('#frmloader-'+rankingID).fadeOut(3000);
				
				return false;  
			
			});		

			$('body').on('click','.rankingEdit',function(event){  /* edit teacher ranking */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var rankingID = clickedID[1];
				var postVal = 'EditRanking';
				var Ranking = $('#editDiv-'+rankingID).text();

				$('#frmloader-'+rankingID).fadeIn(100); 
				
				$('#editDiv-'+rankingID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal, 'Ranking': Ranking,
													  'rankingID': rankingID  }).fadeIn(1000);
				$('#frmloader-'+rankingID).fadeOut(3000);
				
				return false;  
			
			});
			
			$('body').on('click','.rankingRemove',function(event){  /* remove teacher ranking */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var rankingID = clickedID[1];
				var postVal = 'RemoveRanking';

				$('#frmloader-'+rankingID).fadeIn(100);
				
				$('#editDiv-'+rankingID).load('wizGradeConfigCPanel.php', {'schoolSettings': postVal,
													  'rankingID': rankingID  }).fadeIn(1000);
				$('#frmloader-'+rankingID).fadeOut(3000);
				
				return false;  
			
			});
			

			$('body').on('click','#saveSMS-future',function(){  /* save SMS */
			
				$('#frmsaveSMS').submit(function(event) {		
					
					$('#saveLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('wizGradeSMS.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#hmsgBox').html(data);	
						$('html, body').animate({ scrollTop:  $('#hmsgBox').offset().top - 50 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});
			
			$('body').on('click','.viewSMS',function(event){  /* view SMS */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var smsID = this.id;
				var postVal = 'viewSMS';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editSMSDiv').show();
				
				$('#editSMSDiv').load('wizGradeSMS.php', {'smsData': postVal, 'rData': smsID
									   }).fadeIn(1000);											   
									   
				
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			});
			
			$('body').on('click','.removeSMS-future',function(event){  /* remove SMS */
			
				event.stopImmediatePropagation();	
				var emptyStr = "";
				var smsData = this.id;
				var clickedID = this.id.split('-');
				var hName = clickedID[2];
				
				var hInfo = 'SMS '+hName;					
				$('#removeInfo').text(hInfo);
				$('#removeHData').text(smsData);	
				$('#removeMsg').html(emptyStr);	
				$('.slideUpFrmDiv').show();
				$('#modalRemoveBtn').trigger('click');					
				
				return false;  
			
			}); 
			
			$('body').on('click', '#removeSMS-future',function(event){  /* remove SMS */
			
				event.stopImmediatePropagation();											
				
				var postVal = 'removeSMS';
				var rData = $('#removeHData').text();
				
				$('#removeLoader').fadeIn(100);
				
				$('#removeMsg').load('wizGradeSMS.php', {'smsData': postVal, 'rData': rData
									   }).fadeIn(1000);					
				
				return false;  
			
			}); 
			
			$('body').on('click','.editSMS',function(event){  /* edit SMS */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var smsID = this.id;
				var postVal = 'editSMS';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editSMSDiv').show();
				
				$('#editSMSDiv').load('wizGradeSMS.php', {'smsData': postVal, 'rData': smsID
									   }).fadeIn(1000);	 
				
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			}); 
			
			$('body').on('click','#updateSMS',function(){  /* update SMS */
			
				$('#frmupdateSMS').submit(function(event) {		
					
					$('#editLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('wizGradeSMS.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#editMsg').html(data);	
						$('html, body').animate({ scrollTop:  $('#editMsg').offset().top - 30 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			}); 
			
			$('body').on('click','#savePayGateway-future',function(){  /* save SMS gateway */
			
				$('#frmsavePayGateway').submit(function(event) {		
					
					$('#saveLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('paymentGateway.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#hmsgBox').html(data);	
						$('html, body').animate({ scrollTop:  $('#hmsgBox').offset().top - 50 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});
			
			$('body').on('click','.viewPayGateway',function(event){  /* view SMS gateway */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var paymentID = this.id;
				var postVal = 'viewPayGateway';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	

				$('#editPayGatewayDiv').show();
				
				$('#editPayGatewayDiv').load('paymentGateway.php', {'gatewayPaymentData': postVal, 'rData': paymentID
									   }).fadeIn(1000);	 
				
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			});
			
			$('body').on('click','.removePayGateway-future',function(event){  /* remove SMS gateway */
			
				event.stopImmediatePropagation();	
				var emptyStr = "";
				var gatewayPaymentData = this.id;
				var clickedID = this.id.split('-');
				var hName = clickedID[2];
				
				var hInfo = 'Payment Gateway '+hName;					
				$('#removeInfo').text(hInfo);
				$('#removeHData').text(gatewayPaymentData);	
				$('#removeMsg').html(emptyStr);	
				$('.slideUpFrmDiv').show();
				$('#modalRemoveBtn').trigger('click');					
				
				return false;  
			
			}); 
			
			$('body').on('click', '#removePayGateway-future',function(event){  /* remove SMS gateway */
			
				event.stopImmediatePropagation();											
				
				var postVal = 'removePayGateway';
				var rData = $('#removeHData').text();
				
				$('#removeLoader').fadeIn(100);
				
				$('#removeMsg').load('paymentGateway.php', {'gatewayPaymentData': postVal, 'rData': rData
									   }).fadeIn(1000);					
				
				return false;  
			
			});


			$('body').on('click','.editPayGateway',function(event){  /* edit SMS gateway */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var paymentID = this.id;
				var postVal = 'editPayGateway';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editPayGatewayDiv').show();
				
				$('#editPayGatewayDiv').load('paymentGateway.php', {'gatewayPaymentData': postVal, 'rData': paymentID
									   }).fadeIn(1000); 
				
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			}); 
			
			
			$('body').on('click','#updatePayGateway',function(){  /* update SMS gateway */
			
				$('#frmupdatePayGateway').submit(function(event) {		
					
					$('#editLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('paymentGateway.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#editMsg').html(data);	
						$('html, body').animate({ scrollTop:  $('#editMsg').offset().top - 30 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});	 

			$('body').on('click','#saveBroadcast',function(){  /* save school broadcast */
			
				$('#frmsaveBroadcast').submit(function(event) {		
					
					$('#saveLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('wizGradeBroadcast.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#hmsgBox').html(data);	
						$('html, body').animate({ scrollTop:  $('#hmsgBox').offset().top - 50 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});
			
			$('body').on('click','.viewBroadcast',function(event){  /* view school broadcast */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var broadcastID = this.id;
				var postVal = 'viewBroadcast';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editBroadcastDiv').show();
				
				$('#editBroadcastDiv').load('wizGradeBroadcast.php', {'broadcastData': postVal, 'rData': broadcastID
									   }).fadeIn(1000);										   
									   
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			});
			
			$('body').on('click','.removeBroadcast',function(event){  /* remove school broadcast */
			
				event.stopImmediatePropagation();	
				var emptyStr = "";
				var broadcastData = this.id;
				var clickedID = this.id.split('-');
				var hName = clickedID[2];
				
				var hInfo = 'Broadcast '+hName;					
				$('#removeInfo').text(hInfo);
				$('#removeHData').text(broadcastData);	
				$('#removeMsg').html(emptyStr);	
				$('.slideUpFrmDiv').show();

				$('#modalRemoveBtn').trigger('click');					
				
				return false;  
			
			}); 
			
			$('body').on('click', '#removeBroadcast',function(event){  /* remove school broadcast */
			
				event.stopImmediatePropagation();											
				
				var postVal = 'removeBroadcast';
				var rData = $('#removeHData').text();
				
				$('#removeLoader').fadeIn(100);
				
				$('#removeMsg').load('wizGradeBroadcast.php', {'broadcastData': postVal, 'rData': rData
									   }).fadeIn(1000);					
				
				return false;  
			
			}); 
			
			$('body').on('click','.editBroadcast',function(event){  /* edit school broadcast */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var broadcastID = this.id;
				var postVal = 'editBroadcast';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editBroadcastDiv').show();
				
				$('#editBroadcastDiv').load('wizGradeBroadcast.php', {'broadcastData': postVal, 'rData': broadcastID
									   }).fadeIn(1000);	 
				
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			});  
			
			$('body').on('click','#updateBroadcast',function(){  /* update school broadcast */
			
				$('#frmupdateBroadcast').submit(function(event) {		
					
					$('#editLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('wizGradeBroadcast.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#editMsg').html(data);	
						$('html, body').animate({ scrollTop:  $('#editMsg').offset().top - 30 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});
				
			$('body').on('click','#saveGrade',function(){  /* save school grade */
			
				$('#frmsaveGrade').submit(function(event) {		
					
					$('#saveLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('wizGradeGrade.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#hmsgBox').html(data);	
						$('html, body').animate({ scrollTop:  $('#hmsgBox').offset().top - 50 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});
			
			$('body').on('click','.viewGrade',function(event){  /* view school grade */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var gradeID = this.id;
				var postVal = 'viewGrade';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editGradeDiv').show();
				
				$('#editGradeDiv').load('wizGradeGrade.php', {'gradeData': postVal, 'rData': gradeID
									   }).fadeIn(1000);										   
									   
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			});
			
			$('body').on('click','.removeGrade',function(event){  /* remove school grade */
			
				event.stopImmediatePropagation();	
				var emptyStr = "";
				var gradeData = this.id;
				var clickedID = this.id.split('-');
				var hName = clickedID[2];
				
				var hInfo = 'School Score Grade '+hName;					
				$('#removeInfo').text(hInfo);
				$('#removeHData').text(gradeData);	
				$('#removeMsg').html(emptyStr);	
				$('.slideUpFrmDiv').show();
				$('#modalRemoveBtn').trigger('click');					
				
				return false;  
			
			}); 
			
			$('body').on('click', '#removeGrade',function(event){  /* remove school grade */
			
				event.stopImmediatePropagation();											
				
				var postVal = 'removeGrade';
				var rData = $('#removeHData').text();
				
				$('#removeLoader').fadeIn(100);
				
				$('#removeMsg').load('wizGradeGrade.php', {'gradeData': postVal, 'rData': rData
									   }).fadeIn(1000);					
				
				return false;  
			
			}); 
			
			$('body').on('click','.editGrade',function(event){  /* edit school grade */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var gradeID = this.id;
				var postVal = 'editGrade';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editGradeDiv').show();
				
				$('#editGradeDiv').load('wizGradeGrade.php', {'gradeData': postVal, 'rData': gradeID
									   }).fadeIn(1000);	 
				
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			});  
			
			$('body').on('click','#updateGrade',function(){  /* upgrade school grade */
			
				$('#frmupdateGrade').submit(function(event) {		
					
					$('#editLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('wizGradeGrade.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#editMsg').html(data);	
						$('html, body').animate({ scrollTop:  $('#editMsg').offset().top - 30 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});
			
			$('body').on('change','#rollTask',function(){  /* mark student rollCall */	
		
				var rVal = $(this).val();
				//$(".rollCall > [value=" + rVal + "]").attr("selected", "true");
				$('.classCall option[value=' + rVal + ']').prop('selected', true);
		
				return false;
				
			});


			$('body').on('click','#loadRollDiv',function(){  /* load student rollCall div */
			
				$("#frmloadRollDiv").submit(function(event) {	
				
					showPageLoader();	
					
					event.stopImmediatePropagation();	
					
					$.post('rollCallManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200);	
						$('.printerIcon').fadeIn(200);			
					});
				
					return false;
				
				});	
				
			});
			
			$('body').on('click','.saveRollCall',function(){  /* save student rollCall */
			
				$('#frmsaveRollCall').submit(function(event) {

					event.stopImmediatePropagation();
					
					showPageLoader();	
					
					$('#rollCallDiv').show();				
							
					$.post('rollCallManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#eMsgR').html(data);		
						
					});
					
					$('html, body').animate({ scrollTop:  $('#eMsgR').offset().top - 50 }, 'slow');			
		  
					return false;
				
				});		
			});
			
			
			$('body').on('click','.saveClassPromotion',function(){  /* save class promotion */
			
				$('#frmsaveClassPromotion').submit(function(event) {

					event.stopImmediatePropagation();
					
					showPageLoader();	
					
					$('#promotionDiv').show();				
							
					$.post('classPromotion.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#eMsgR').html(data);				
						
					});
					
					$('html, body').animate({ scrollTop:  $('#eMsgR').offset().top - 50 }, 'slow');			
		  
					return false;
				
				});		
			});
			
			$('body').on('click','.saveBulkRSExcel',function(event){  /* save bulk student computation result */
			
				event.stopImmediatePropagation();
				
				var uData = $('#hiRSData').text();
				var uMode = 2;
				var rsData = "bulkExcelRS";
				
				showPageLoader();   
				 
				$('#wizGradePageDiv').load('wizGradeBulkRS.php', {'rsData': rsData, 'uploadData': uData, 'uMode': uMode}).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollBTarget').offset().top - 50 }, 'slow');			
			
				return false;  
			
			});
			
			$('body').on('click','.savebulkSubCom',function(event){  /* save bulk student comment result */
		
				event.stopImmediatePropagation();
				
				var uData = $('#hiRSData').text();
				var uMode = 2;
				var rsData = "bulkSubComm";
				
				showPageLoader();   
				
				$('#wizGradePageDiv').load('wizGradeBulkSubCom.php', {'rsData': rsData,'uploadData': uData, 'uMode': uMode}).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollBTarget').offset().top - 50 }, 'slow');			
			
				return false;  
			
			}); 
			
			$('body').on('click','.saveBulkRegExcel',function(event){  /* save bulk student registration */
			
				event.stopImmediatePropagation();
				
				var uData = $('#hiRSData').text();
				var uMode = 2;
				var bioData = "bulkExcelBio";
				
				showPageLoader();   
				
				$('#wizGradePageDiv').load('wizGradeBulkReg.php', {'bioData': bioData,'uploadData': uData, 'uMode': uMode}).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollBTarget').offset().top - 50 }, 'slow');
			
				return false;  
			
			}); 
			
			$('body').on('click','#sendSMS',function(){  /* send student SMS */
			
				$('#frmsendSMS').submit(function(event) {		
						
					showPageLoader();	
				
					event.stopImmediatePropagation();
							
					$.post('smsSender.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);		
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200);	 
										
					});
		  
					return false;
				
				});		
			});

			$('body').on('click','#sendCSMS',function(){  /* send class SMS */
			
				$('#frmsendCSMS').submit(function(event) {		
						
					showPageLoader();	
				
					event.stopImmediatePropagation();
							
					$.post('smsSender.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);		
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200);	
										
					});
		  
					return false;
				
				});		
			}); 
			
			$('body').on('click','#staffSMS',function(){  /* send staff SMS */
			
				$('#frmstaffSMS').submit(function(event) {		
						
					showPageLoader();	
				
					event.stopImmediatePropagation();
							
					$.post('smsSender.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);		
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200);						
										
					});
		  
					return false;
				
				});		
			}); 
			
			$('body').on('click','#staffsSMS',function(){  /* send all activestaff SMS */
			
				$('#frmstaffsSMS').submit(function(event) {		
						
					showPageLoader();	
				
					event.stopImmediatePropagation();
							
					$.post('smsSender.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);		
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200);						
										
					});
		  
					return false;
				
				});		
			});
			
			$('body').on('click','#saveHostel',function(){  /* save school hostel */
			
				$('#frmsaveHostel').submit(function(event) {		
					
					$('#saveLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('schoolHostel.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#hmsgBox').html(data);	
						$('html, body').animate({ scrollTop:  $('#hmsgBox').offset().top - 100 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});
			
			$('body').on('click','.removeHostel',function(event){  /* remove school hostel */
			
				event.stopImmediatePropagation();	
				var emptyStr = "";
				var hostelData = this.id;
				var clickedID = this.id.split('-');
				var hName = clickedID[2];					
				var hInfo = 'Hostel Name - '+hName;					
				$('#removeInfo').text(hInfo);
				$('#removeHData').text(hostelData);	
				$('#removeMsg').html(emptyStr);	
				$('.slideUpFrmDiv').show();
				$('#modalRemoveBtn').trigger('click');					
				
				return false;  

			
			}); 
			
			$('body').on('click', '#removeHostel',function(event){  /* remove school hostel */
			
				event.stopImmediatePropagation();											
				
				var postVal = 'removeHostel';
				var rData = $('#removeHData').text();
				
				$('#removeLoader').fadeIn(100);
				
				$('#removeMsg').load('schoolHostel.php', {'hostelData': postVal, 'rData': rData
									   }).fadeIn(1000);					
				
				return false;  
			
			}); 
			
			$('body').on('click','.editHostel',function(event){  /* edit school hostel */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var hostelID = this.id;
				var postVal = 'editHostel';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editHostelDiv').show();
				
				$('#editHostelDiv').load('schoolHostel.php', {'hostelData': postVal, 'rData': hostelID
									   }).fadeIn(1000);											   
									   
				
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			});
			
			$('body').on('click','#updateHostel',function(){  /* update school hostel */
			
				$('#frmupdateHostel').submit(function(event) {		
					
					$('#editLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('schoolHostel.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#editMsg').html(data);	
						$('html, body').animate({ scrollTop:  $('#editMsg').offset().top - 100 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			}); 

			$('body').on('click','#saveRoute',function(){  /* save school bus route */
			
				$('#frmsaveRoute').submit(function(event) {		
					
					$('#saveLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('schoolRoute.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#hmsgBox').html(data);	
						$('html, body').animate({ scrollTop:  $('#hmsgBox').offset().top - 100 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});
			
			$('body').on('click','.removeRoute',function(event){  /* remove school bus route */
			
				event.stopImmediatePropagation();	
				var emptyStr = "";
				var routeData = this.id;
				var clickedID = this.id.split('-');
				var hName = clickedID[2];					
				var hInfo = 'Route Name - '+hName;					
				$('#removeInfo').text(hInfo);
				$('#removeHData').text(routeData);	
				$('#removeMsg').html(emptyStr);	
				$('.slideUpFrmDiv').show();
				$('#modalRemoveBtn').trigger('click');					
				
				return false;  
			
			}); 
			
			$('body').on('click', '#removeRoute',function(event){  /* remove school bus route */
			
				event.stopImmediatePropagation();											
				
				var postVal = 'removeRoute';
				var rData = $('#removeHData').text();
				
				$('#removeLoader').fadeIn(100);
				
				$('#removeMsg').load('schoolRoute.php', {'routeData': postVal, 'rData': rData
									   }).fadeIn(1000);					
				
				return false;  
			
			}); 

			$('body').on('click','.editRoute',function(event){  /* edit school bus route */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var routeID = this.id;
				var postVal = 'editRoute';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editRouteDiv').show();
				
				$('#editRouteDiv').load('schoolRoute.php', {'routeData': postVal, 'rData': routeID
									   }).fadeIn(1000); 
				
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			});
			
			$('body').on('click','#updateRoute',function(){  /* update school bus route */
			
				$('#frmupdateRoute').submit(function(event) {		
					
					$('#editLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('schoolRoute.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#editMsg').html(data);	
						$('html, body').animate({ scrollTop:  $('#editMsg').offset().top - 100 }, 'slow');			
						
					});
	  
					return false;
			
				});		
				
			});	 
		
			$('body').on('click','#searchWord',function(){  /* search student by words  */
			
				$('#frmSearchByKey').submit(function(event) {		
						
				showPageLoader();	
				
					event.stopImmediatePropagation();
							
					$.post('searchStudentsBio.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);		
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200);									
						$('.printerIcon').fadeIn(200);	 
						
					});
			  
					return false;
				
				});		
			});


			$('body').on('click','#searchMWords',function(){  /* search student by words  */
			
				$('#formBioSearch2').submit(function(event) {		
						
					showPageLoader();	
				
					event.stopImmediatePropagation();
					
					$.post('searchStudentsBio.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);		
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200); 
						$('.printerIcon').fadeIn(200);	 
						
					});
			  
					return false;
				
				});		
			}); 

			$('body').on('click','#searchClassBio', function(){  /* search student by class  */
														   
				$('#frmSearchBySess').submit(function(event) {		
						
					showPageLoader();	
				
					event.stopImmediatePropagation();
								
					$.post('searchStudentsBio.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);		
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200);	
						$('.printerIcon').fadeIn(200); 
						
					});
			  
					return false;
				
				});		
			});
			
			$('body').on('click','#newStudent', function(){  /* register new student */
														   
				$('#frmnewStudent').submit(function(event) {		
						
					showPageLoader();	
				
					event.stopImmediatePropagation();
								
					$.post('newStudentManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);		
						$('.wizGradeSectionDiv').slideUp(2000);
						$('#wizGradePageDiv').slideDown(2000);						
						$('.wizGradePageIcons').fadeIn(200);	
						$('.printerIcon').fadeIn(200); 
						
					});
			  
					return false;
				
				});		
			});			 
			
			$('body').on('click','.viewBioData',function(event){  /* view student profile */
			
				event.stopImmediatePropagation();
				var varID = this.id;
				
				showPageLoader();   
				
				$('#wizGradeRightHalf').load('showStudentProfile.php', {'reg': varID }).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 30 }, 'slow'); 
			
				return false;  
			
			});
			
			$('body').on('click','.stuIDCard',function(event){  /* view student profile */
			
				event.stopImmediatePropagation();
				var varID = this.id;
				
				showPageLoader();   
				
				$('#wizGradeRightHalf').load('showStudentIDCard.php', {'reg': varID }).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 30 }, 'slow'); 
			
				return false;  
			
			});
			
			$('body').on('click','.resetBioData',function(event){  /* load student password */
			
				event.stopImmediatePropagation();
				var varID = this.id;
				
				showPageLoader();   
				
				$('#wizGradeRightHalf').load('studentAccessPanel.php', {'reg': varID }).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 30 }, 'slow'); 
			
				return false; 
			
			});

			$('body').on('click','.resetStuPass',function(event){  /* reset student password */
			
				event.stopImmediatePropagation();
				var varID = this.id;
				
				showPageLoader();   
				
				$('#stuPassDiv').load('resetstudentData.php', {'regStu': varID });
				$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 30 }, 'slow'); 
			
				return false; 
			
			});

			$('body').on('click','.resetSpoPass',function(event){  /* reset parent password */
			
				event.stopImmediatePropagation();
				var varID = this.id;
				
				showPageLoader();   
				
				$('#spoPassDiv').load('resetstudentData.php', {'regSpo': varID });
				$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 30 }, 'slow'); 
			
				return false;
			
			});
			
			
			$('body').on('click', '#removeStudent',function(event){  /* remove student profile */ 
									
				event.stopImmediatePropagation();
				
				var adminPass = $("#adminPass").val();
				var studentData = $("#studentData").text();
				$('#reSLoader').fadeIn(100);
				$('#wizGradeRMsg').load('resetStudentData.php', {'removeReg': studentData, 'adminPass': adminPass });
				
				return false; 
					
			}); 

			
			$('body').on('click','.editBioData',function(event){  /* edit student profile */
			
				event.stopImmediatePropagation();
				
				showPageLoader();   
				
				var varID = this.id;
				
				$('#wizGradeRightHalf').load('studentBio.php', {'reg': varID }).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 30 }, 'slow'); 
			
				return false; 
			
			}); 

			$('body').on('click','#saveStudentS1',function(){  /* edit student profile */
			
				$('#frmBioData1').submit(function(event) {
								
					event.stopImmediatePropagation();
					
					$('.studentLoader').fadeIn(100);
							
						$.post('studentBioManager.php', $(this).find('select, input').serialize(), function(data) {
							
							$('.msgBox1').html(data);
						
						});
						
						$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 50 }, 'slow');
			  
						return false;
				
				});		
				
			});

			$('body').on('click','#saveStudentS2',function(){  /* edit student profile */
			
				$('#frmBioData2').submit(function(event) {
								
					event.stopImmediatePropagation();
					
					$('.studentLoader').fadeIn(100);
							
						$.post('studentBioManager.php', $(this).find('select, input').serialize(), function(data) {
						
							$('.msgBox2').html(data);												
											
						});
						
						$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 50 }, 'slow');
		  
						return false;
				
				});		
			}); 

			$('body').on('click','#sponsorData',function(){  /* edit parent profile */
			
				$('#frmBioData3').submit(function(event) {
								
					event.stopImmediatePropagation();
					
						$('.studentLoader').fadeIn(100);
								
						$.post('studentBioManager.php', $(this).find('select, input').serialize(), function(data) {
						
							$('.msgBox3').html(data);													
											
						});
						
						$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 50 }, 'slow');
		  
						return false;
				
				});		
			}); 

			$('body').on('click','#saveBioClass',function(){  /* edit student class */
			
				$('#frmsaveBioClass').submit(function(event) {
								
					event.stopImmediatePropagation();
					
					$('.studentLoader').fadeIn(100);
							
						$.post('studentBioManager.php', $(this).find('select, input').serialize(), function(data) {
						
							$('.msgBoxClass').html(data);
						
						});
						
						$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 50 }, 'slow');
		  
						return false;
				
				});		
			}); 
	 
			$('body').on('click','#saveStaff1',function(){  /* edit staff profile */
			
				$('#frmBioData1').submit(function(event) {
								
					event.stopImmediatePropagation();
					
					$('.staffLoader').fadeIn(100);
							
						$.post('staffBioManager.php', $(this).find('select, input').serialize(), function(data) {
							
							$('.msgBox1').html(data);									
																		
						});
					
					$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 50 }, 'slow');
		  
					return false;
				
				});	
				
			}); 

			$('body').on('click','#saveStaff2',function(){  /* edit staff profile */
			
				$('#frmBioData2').submit(function(event) {
								
					event.stopImmediatePropagation();
					
					$('.staffLoader').fadeIn(100);
							
						$.post('staffBioManager.php', $(this).find('select, input').serialize(), function(data) {
						
							$('.msgBox2').html(data);
																		
						});
						
					$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 50 }, 'slow');
		  
					return false;
				
				});		
				
			}); 

			$('body').on('click','#saveStaff3',function(){  /* edit staff profile */
			
				$('#frmBioData3').submit(function(event) {
								
					event.stopImmediatePropagation();
					
					$('.staffLoader').fadeIn(100);
							
						$.post('staffBioManager.php', $(this).find('select, input').serialize(), function(data) {
							
							$('.msgBox3').html(data);
							
						});
					$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 50 }, 'slow');	
			  
					return false;
				
				});		
				
			}); 

			$('body').on('click','#saveNewStaff',function(){  /* register new staff profile */
			
				$('#frmsaveNewStaff').submit(function(event) {

					event.stopImmediatePropagation();
					
					showPageLoader();	
							
					$.post('staffBioManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);		
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200);									
									
						$('.printerIcon').fadeIn(200);	
					
					});
		  
					return false;
				
				});
				
			}); 

			$('body').on('click','#assignformTeacher',function(){  /* assign class to a staff */
			
				$('#frmassignformTeacher').submit(function(event) {

					event.stopImmediatePropagation();
					
					showPageLoader();	
							
					$.post('wizGradeAssignManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#msgBoxT').html(data);		
						
					});
		  
					return false;
				
				});		
			}); 

			$('body').on('click','#assignsubTeacher',function(){  /* assign subject to a staff */
			
				$('#frmassignsubTeacher').submit(function(event) {

					event.stopImmediatePropagation();
					
					showPageLoader();	
							
					$.post('wizGradeAssignManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#msgBoxT').html(data);			
						
					});
		  
					return false;
				
				});		
			}); 
			
			$('body').on('click','.viewHStaff',function(event){  /* vie staff profile */
			
				event.stopImmediatePropagation();
				
				var varID = this.id;
				
				showPageLoader();   
				
				$('#frmNewTBio').fadeOut(600);
				$('#saveNewStaffData').fadeIn(600);
				$('#wizGradeRightHalf').load('showStaffBioHManager.php', {'teacherID': varID}).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 30 }, 'slow');
			
				return false;  
			
			}); 
			
			$('body').on('click','.viewStaff',function(event){  /* vie staff profile */
			
				event.stopImmediatePropagation();
				
				var varID = this.id;
				
				showPageLoader();   
				
				$('#frmNewTBio').fadeOut(600);
				$('#saveNewStaffData').fadeIn(600);
				$('#wizGradeRightHalf').load('showStaffBioManager.php', {'teacherID': varID}).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 30 }, 'slow');
			
				return false;  
			
			}); 
			
			$('body').on('click','.staffIDCard',function(event){  /* vie staff profile */
			
				event.stopImmediatePropagation();
				
				var varID = this.id;
				
				showPageLoader();   
				
				$('#frmNewTBio').fadeOut(600);
				$('#saveNewStaffData').fadeIn(600);
				$('#wizGradeRightHalf').load('showStaffIDCard.php', {'teacherID': varID}).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 30 }, 'slow');
			
				return false;  
			
			}); 
			
			$('body').on('click','.editStaff',function(event){  /* edit staff profile */
			
				event.stopImmediatePropagation();
			
				var varID = this.id;
				
				showPageLoader();   
				
				$('#wizGradeRightHalf').load('staffBio.php', {'teacherID': varID }).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 30 }, 'slow');
				
				$('#editBioPic').show(2000);
				$('#editBio2').show(2000);
				$('#editBio3').show(2000);			
				$('#editBio4').show(2000); 
				$('#editSignature').show(2000);  
			
				return false;	  
			
			});

			$('body').on('click','.resetStaff',function(event){  /* load reset staff profile */
			
				event.stopImmediatePropagation();
				
				var varID = this.id;
				
				showPageLoader();   
				
				$('#wizGradeRightHalf').load('staffAccessPanel.php', {'staff': varID}).fadeIn(1000);
				
				$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 30 }, 'slow'); 
			
				return false;
	  
			
			});

			$('body').on('click','.resetStaffPass',function(event){  /* reset staff password */
			
				event.stopImmediatePropagation();
				
				var varID = this.id;
				
				showPageLoader();   
				
				$('#stuPassDiv').load('resetStaffAccess.php', {'reStaff': varID});
				$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 30 }, 'slow');
			
				return false;
	  
			
			});
			
			
			$('body').on('click', '#removeStaff',function(event){  /* remove staff profile */								
									
				event.stopImmediatePropagation();
				
				var adminPass = $("#adminPass").val();
				var staffID = $("#staffID").text();
				$('#reSLoader').fadeIn(100);
				$('#wizGradeRMsg').load('resetStaffAccess.php', {'removeReg': staffID, 'adminPass': adminPass });
				
				return false;	  
			
			});
			
			$('body').on('click', '.changeStaffID',function(event){  /* edit staff ID */
									
				event.stopImmediatePropagation();
				
				var varID = this.id;
				var staffUser = $("#staffUser").val();
				var postVal = "changeStaff";
				
				$('#reSLoader').fadeIn(100);
				
				$('#msgC').load('resetStaffAccess.php', {'resetData': postVal, 'staffID': varID, 'staffUser': staffUser});
				$('html, body').animate({ scrollTop:  $('#scrollTargetMPage').offset().top - 30 }, 'slow');			
				
				return false;
	  
			
			}); 

			$('body').on('click','#searchStaffBio',function(){  /* search staff profile */
			
				$('#frmsearchStaffBio').submit(function(event) {		
						
					showPageLoader();	
				
					event.stopImmediatePropagation();
							
					$.post('searchStaffsBio.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);		
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200);	 
						$('.printerIcon').fadeIn(200);	 
						
					});
			  
					return false;
				
				});		
			}); 
			
			$('body').on('click','#searchStaffBiodata',function(){  /* search staff profile */
			
				$('#frmsearchStaffBio').submit(function(event) {		
						
					showPageLoader();	
				
					event.stopImmediatePropagation();
							
					$.post('searchStaffsBiodata.php', $(this).find('select, input').serialize(), function(data) {

						
						$('#wizGradePageDiv').html(data);		
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200);	 
						$('.printerIcon').fadeIn(200);	 
						
					});
			  
					return false;
				
				});		
			}); 

			
			$('body').on('click','#saveCardPin',function(){  /* save scratch card pin */
			
				$('#frmsaveCardPin').submit(function(event) {		
					
					$('#saveLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('cardPins.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#hmsgBox').html(data);	
						$('html, body').animate({ scrollTop:  $('#hmsgBox').offset().top - 50 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});
			
			$('body').on('click','.viewCardPin',function(event){  /* view scratch card pin */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var cardPinID = this.id;
				var postVal = 'viewCardPin';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editCardPinDiv').show();
				
				$('#editCardPinDiv').load('cardPins.php', {'cardPinData': postVal, 'rData': cardPinID
									   }).fadeIn(1000);										   
									   
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			});
			
			$('body').on('click','.removeCardPin',function(event){  /* remove scratch card pin */
			
				event.stopImmediatePropagation();	
				var emptyStr = "";
				var cardPinData = this.id;
				var clickedID = this.id.split('-');
				var hName = clickedID[2];
				
				var hInfo = 'Scratch Card Pin '+hName;					
				$('#removeInfo').text(hInfo);
				$('#removeHData').text(cardPinData);	
				$('#removeMsg').html(emptyStr);	
				$('.slideUpFrmDiv').show();
				$('#modalRemoveBtn').trigger('click');					
				
				return false;  
			
			}); 
			
			$('body').on('click', '#removeCardPin',function(event){  /* remove scratch card pin */
			
				event.stopImmediatePropagation();											
				
				var postVal = 'removeCardPin';
				var rData = $('#removeHData').text();
				
				$('#removeLoader').fadeIn(100);
				
				$('#removeMsg').load('cardPins.php', {'cardPinData': postVal, 'rData': rData}).fadeIn(1000);					
				
				return false;  
			
			}); 
			
			$('body').on('click','.editCardPin',function(event){  /* edit scratch card pin */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var cardPinID = this.id;
				var postVal = 'editCardPin';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editCardPinDiv').show();

				
				$('#editCardPinDiv').load('cardPins.php', {'cardPinData': postVal, 'rData': cardPinID
									   }).fadeIn(1000);	 
				
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			});  

			$('body').on('click','#updateCardPin',function(){  /* update scratch card pin */
			
				$('#frmupdateCardPin').submit(function(event) {		
					
					$('#editLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('cardPins.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#editMsg').html(data);	
						$('html, body').animate({ scrollTop:  $('#editMsg').offset().top - 30 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});	
			
			$('body').on('click','#load-exportRS',function(){  /* load result export page */
			
				$('#frmload-exportRS').submit(function(event) {		
						
					event.stopImmediatePropagation();
					
					showPageLoader();
							
					$.post('commonRSManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);	
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);	
						$('.wizGradePageIcons').fadeIn(200);	 
						$('.printerIcon').fadeIn(200); 
						
					});
			  
					return false;
				
				});		
			});
			
			$('body').on('click','#exAutoScanRS',function(){  /* load auto scan page */
			
				$('#frmexAutoScanRS').submit(function(event) {		
						
					event.stopImmediatePropagation();
					
					showPageLoader();
							
					$.post('commonRSManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);	
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);	
						$('.wizGradePageIcons').fadeIn(200);		
						$('.printerIcon').fadeIn(200);  
						
					});
			  
					return false;
				
				});		
			});

			$('body').on('click','#searchSessionRS',function(){  /* search student result by session */
			
				$('#frmRS1').submit(function(event) {		
						
					event.stopImmediatePropagation();
					
					showPageLoader();
							
					$.post('commonRSManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);	
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);	
						$('.wizGradePageIcons').fadeIn(200);
						$('.hideTBColsBtn').fadeIn(200); 
						$('.printerIcon').fadeIn(200);
						 
					});
			  
					return false;
				
				});		
			}); 

			$('body').on('click','#classTranscript',function(){  /* auto generate class transcript */
			
				$('#frmRS2').submit(function(event) {		
						
					showPageLoader();	
				
					event.stopImmediatePropagation();
							
					$.post('commonRSManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);		
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200);
						$('.printerIcon').fadeIn(200);
						$('#ShowSelRSbttn').fadeIn(200);
						$('#show-hide-btn').fadeIn(200); 
						
					});
			  
					return false;
				
				});		
			});

			

			$('body').on('click','#studentTranscript',function(){  /* auto generate student transcript */
			
				$('#frmRS3').submit(function(event) {		
						
					showPageLoader();	
				
					event.stopImmediatePropagation();
							
					$.post('commonRSManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);		
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200); 
						$('.printerIcon').fadeIn(200); 
						
					});
			  
					return false;
				
				});		
			}); 

			$('body').on('click','#saveTeacherRS',function(){  /* save staff result profile */
			
				$('#frmsaveTeacherRS').submit(function(event) {		
						
					event.stopImmediatePropagation();
					
					$('#rsConfigLoader').show(100);
							
					$.post('rsConfigManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#msgBoxTeach').html(data);	
					 
					});
					
					$('html, body').animate({ scrollTop:  $('#scrollTarget2').offset().top - 100 }, 'fast');
		  
					return false;
				
				});		
			}); 

			$('body').on('click','#automateRS',function(){  /* automate student results */
			
				$('#frmautomateRS').submit(function(event) {		
						
					event.stopImmediatePropagation();
					
					$('#automateRS').fadeOut(100);
					$('#publishRS').fadeOut(100);
					$('#autoRSLoader').show(100);
							
					$.post('rsConfigManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#msgBoxAuto').html(data);	
					 
					});
					
					$('html, body').animate({ scrollTop:  $('#scrollTarget3').offset().top - 100 }, 'fast');
		  
					return false;
				
				});		
			}); 

			$('body').on('click','#publishRS',function(){  /* publish student results */
			
				$('#frmpublishRS').submit(function(event) {		
						
					event.stopImmediatePropagation();
					
					$('#publishRS').fadeOut(100);
					$('#autoRSLoader').show(100);
							
					$.post('rsConfigManager.php', $(this).find('select, input').serialize(), function(data) {
					
						$('#msgBoxAuto').html(data);	
					 
					});
					
					$('html, body').animate({ scrollTop:  $('#scrollTarget3').offset().top - 100 }, 'fast');
		  
					return false;
				
				});		
			});

			$('body').on('click','.show-hide-btn',function(event){  /* show or hide button */
			
				event.stopImmediatePropagation();		
				
				$('#showHideCols').trigger('click');
				$('.show-hide-btn').toggle();
				
				return false;
				
			});
	 
			
			$('body').on('click','.editRessult',function(event){  /* edit student results */
					
				event.stopImmediatePropagation();
				
				$('#overlay-rs-box').css("background-color", "#fff");
				$('#overlay-rs-box').css("padding", "10px");
				$('#overlay-rs-box').css("width", "60%");
				$('#overlay-rs-box').css("margin-top", "580px");
				$('#overlay-rs-box').css("margin-left", "10%");
				
				var varID = this.id;			
				$('.close-ov-btn').show();			
			
				showPageLoader(); 
				
				$('#overlay-rs-box').load('editRSManager.php', {'rsData': varID }).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#overlay-rs-box').offset().top - 40 }, 'fast');
			
				return false;  
			
			});
			
			
			$('body').on('click','.viewSubCommentOV',function(event){  /* view student comment results */
					
				event.stopImmediatePropagation();
				
				$('#overlay-rs-box').css("background-color", "#fff");
				$('#overlay-rs-box').css("padding", "10px");
				$('#overlay-rs-box').css("width", "60%");
				$('#overlay-rs-box').css("margin-top", "580px");
				$('#overlay-rs-box').css("margin-left", "10%");
				
				var varID = this.id;			
				$('.close-ov-btn').show();			
			
				showPageLoader(); 
				
				$('#overlay-rs-box').load('editCommentManager.php', {'rsData': varID }).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#overlay-rs-box').offset().top - 40 }, 'fast'); 
			
				return false;  
			
			});


			$('body').on('click','.viewTermRS',function(event){  /* view student termly results */
			
				event.stopImmediatePropagation();		
				var varID = this.id;
				
				$('#overlay-rs-box').css("background-color", "#fff");
				$('#overlay-rs-box').css("padding", "10px");
				$('#overlay-rs-box').css("margin-top", "10px");
				$('#overlay-rs-box').css("width", "95%");
				$('#overlay-rs-box').css("margin-top", "580px");
				$('#overlay-rs-box').css("margin-left", "10px");
				
				$('.close-ov-btn').show();			
				
				showPageLoader();   
				$('#overlay-rs-box').load('commonRSManager.php', {'studentReg': varID }).fadeIn(1000);			
				$('html, body').animate({ scrollTop:  $('#overlay-rs-box').offset().top - 40 }, 'fast');	
			
				return false;
			
			});


			$('body').on('click','.studentConduct',function(event){  /* load student conducts page */
			
				event.stopImmediatePropagation();		
	
				var valEmpty = '';
				var varID = this.id;
				
				$('#wizGradeRSRight').html(valEmpty);
				showPageLoader();   
				$('#wizGradeRSRight').load('studentConduct.php', {'studentConductData': varID}).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('.rsScrollTarget').offset().top - 70 }, 'slow');
						
			
				return false;
			
			});

			
			$('body').on('click','.studentConducts',function(event){  /* load student conducts page */
			
				event.stopImmediatePropagation();		
				var varID = this.id;
				
				$('#overlay-rs-box').css("background-color", "#fff");
				$('#overlay-rs-box').css("padding", "10px");
				$('#overlay-rs-box').css("margin-top", "10px");
				$('#overlay-rs-box').css("width", "50%");
				$('#overlay-rs-box').css("margin-top", "580px");
				$('#overlay-rs-box').css("margin-left", "10%");
				$('.close-ov-btn').show();
				
				showPageLoader();   
				$('#overlay-rs-box').load('studentConduct.php', {'studentConductData': varID}).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#overlay-rs-box').offset().top - 40 }, 'fast');
				
			
				return false;
			
			});
			
			$('body').on('click','#saveConducts',function(){  /* save student conducts */
			
				$('.frmConducts').submit(function(event) {
								
					event.stopImmediatePropagation();
					
					$('.conductLoader').fadeIn(100);
							
					$.post('studentConductManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#msgBoxC').html(data);
						$('html, body').animate({ scrollTop:  $('#scrollToTarget').offset().top - 30 }, 'fast'); 
						
					});
			  
					return false;
				
				});		
			});
			
			$('body').on('click','.exit-overlay-box',function(event){  /* exit overlay div */
			
				event.stopImmediatePropagation();		
				
				$('#overlay-rs-box').fadeOut(300);
				//hide("blind", { direction: "horizontal" }, 1000);
			
			});

			$('body').on('click','.exit-overlay-box-2',function(event){  /* exit overlay div */
			
				event.stopImmediatePropagation();		
				
				$('#overlay-box-2').fadeOut(300);
				//hide("blind", { direction: "horizontal" }, 1000);
			
			});
			
			$('body').on('click','.exit-overlay-box-3',function(event){  /* exit overlay div */
			
				event.stopImmediatePropagation();		
				
				$('#overlay-box-3').fadeOut(300);
				//hide("blind", { direction: "horizontal" }, 1000);
			
			}); 

			$('body').on('click','#saveRS',function(){  /* save student result */
			
				$("#frmSaveRs").submit(function(event) {		
						
					showPageLoader();	
				
					event.stopImmediatePropagation();
					
					$.post('vRSManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#msgBox').html(data);
						
					});
		  
					return false;
				
				});		
				
			});
			
			$('body').on('click','#saveSubComment',function(){  /* save student comment */
			
				$("#frmsaveSubComment").submit(function(event) {		
						
					showPageLoader();	
				
					event.stopImmediatePropagation();
					
					$.post('vRSManager.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#msgBox').html(data);
						
					});
		  
					return false;
				
				});		
			});

			$('body').on('click','.editRS',function(event){  /* edit student result */
			
				event.stopImmediatePropagation();
				
				var valEmpty = '';
				var varID = this.id;
				$('#wizGradeRSRight').html(valEmpty);
				
				showPageLoader();   
				
				$('#wizGradeRSRight').load('editRSManager.php', {'rsData': varID }).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('.rsScrollTarget').offset().top - 70 }, 'slow');		
			
				return false;  
				
			});

			$('body').on('click','.viewSubComment',function(event){  /* view comment result */
			
				event.stopImmediatePropagation();
				
				var valEmpty = '';
				var varID = this.id;
				$('#wizGradeRSRight').html(valEmpty);
				
				showPageLoader();   
				
				$('#wizGradeRSRight').load('editCommentManager.php', {'rsData': varID }).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('.rsScrollTarget').offset().top - 70 }, 'slow');
				
				return false;  
			
			});


			$('body').on('click','#inputResults',function(event){  /* save student result */
			
				event.stopImmediatePropagation();
			
				showPageLoader();   
				var valEmpty = '';
			
				$('#wizGradeRSRight').html(valEmpty);
				$('#frmSaveRs').slideDown(300);
				$('#wizGradeRSRight').load('inrsManager.php', {'rsData': $(this).attr('href')}).fadeIn(1000); 
			
				return false;  
			
			});

			$('body').on('click','.link_rs',function(event){  /* scroll student result */
				
				event.stopImmediatePropagation();	

				$("#regnum").val($(this).attr('href'));
				$('html, body').animate({ scrollTop:  $('.rsScrollTarget').offset().top - 70 }, 'slow');
				
				return false;
					
			});
			
			
			$('body').on('click','#manualRSAdd',function(){  /* save student result */
			
				$('#frmmanualRSAdd').submit(function(event) {	
				
					showPageLoader();	
				
					event.stopImmediatePropagation();	
					
					$.post('manualRSManager.php', $(this).find('select, input').serialize(), function(data) {
					
						$('#wizGradePageDiv').html(data);
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200);	
						
					});
				
					return false;
				
				});		
			});
			
			$('body').on('click','#saveExam',function(){  /* save online exam */
			
				$('#frmsaveExam').submit(function(event) {

					event.stopImmediatePropagation();
					
					showPageLoader();	
							
					$.post('wizGradeExam.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);		
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200);									
						$('.printerIcon').fadeIn(200);	
					
					});
		  
					return false;
				
				});
				
			});

			
			$('body').on('click','.viewExam',function(event){  /* view online exam */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var examID = this.id;
				var postVal = 'viewExam';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editExamDiv').show();
				
				$('#editExamDiv').load('wizGradeExam.php', {'onlineExamData': postVal, 'eData': examID
									   }).fadeIn(1000);		 
				
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			});
			
			$('body').on('click','.removeExam',function(event){  /* remove online exam */
			
				event.stopImmediatePropagation();	
				var emptyStr = "";
				var onlineExamData = this.id;
				var clickedID = this.id.split('-');
				var hName = clickedID[2];
				
				var hInfo = 'Exam '+hName;					
				$('#removeInfo').text(hInfo);
				$('#removeHData').text(onlineExamData);	
				$('#removeMsg').html(emptyStr);	
				$('.slideUpFrmDiv').show();
				$('#modalRemoveBtn').trigger('click');					
				
				return false;  
			
			});
			
			
			$('body').on('click', '#removeExam',function(event){  /* remove online exam */
			
				event.stopImmediatePropagation();											
				
				var postVal = 'removeExam';
				var eData = $('#removeHData').text();
				
				$('#removeLoader').fadeIn(100);
				
				$('#removeMsg').load('wizGradeExam.php', {'onlineExamData': postVal, 'eData': eData
									   }).fadeIn(1000);					
				
				return false;  
			
			});


			$('body').on('click','.editExam',function(event){  /* edit online exam */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var examID = this.id;
				var postVal = 'editExam';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editExamDiv').show();
				
				$('#editExamDiv').load('wizGradeExam.php', {'onlineExamData': postVal, 'eData': examID
									   }).fadeIn(1000);											   
									   
				
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			});
			
			
			
			$('body').on('click','#updateExam',function(){  /* update online exam */
			
				$('#frmupdateExam').submit(function(event) {		
					
					$('#editLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('wizGradeExam.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#editMsg').html(data);	
						$('html, body').animate({ scrollTop:  $('#editMsg').offset().top - 30 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});
			
			
			$('body').on('click', '.addExamQuest',function(event){  /* save exam question */
			
				event.stopImmediatePropagation();											
				
				showPageLoader();	
				
				var postVal = 'addQuestion';
				var examData = this.id.split('-');
				var eID = examData[1];
				
				$('#examQuestDiv').load('wizGradeExam.php', {'onlineExamData': postVal, 'eID': eID
									   }).fadeIn(1000);					
				
				return false;  
			
			});
			
			
			
			$('body').on('click','.viewQuestion',function(event){  /* view exam question */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var questionID = this.id;
				var postVal = 'viewQuestion';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editQuestionDiv').show();
				
				$('#editQuestionDiv').load('wizGradeQuestions.php', {'questionData': postVal, 'rData': questionID
									   }).fadeIn(1000);											   
									   
				
				$('#modalEditQBtn').trigger('click');					
				
				return false;  
			
			});
			
			$('body').on('click','.removeQuestion',function(event){  /* remove exam question */
			
				event.stopImmediatePropagation();	
				var emptyStr = "";
				var questionData = this.id;
				var clickedID = this.id.split('-');
				var hName = clickedID[2];
				
				var hInfo = 'Exam Question: '+hName;					
				$('#removeInfo').text(hInfo);
				$('#removeHData').text(questionData);	
				$('#removeMsg').html(emptyStr);	
				$('.slideUpFrmDiv').show();
				$('#modalRemoveQBtn').trigger('click');					
				
				return false;  
			
			}); 
			
			$('body').on('click', '#removeQuestion',function(event){  /* remove exam question */
			
				event.stopImmediatePropagation();											
				
				var postVal = 'removeQuestion';
				var rData = $('#removeHData').text();
				
				$('#removeLoader').fadeIn(100);
				
				$('#removeMsg').load('wizGradeQuestions.php', {'questionData': postVal, 'rData': rData
									   }).fadeIn(1000);					
				
				return false;  
			
			}); 

			$('body').on('click','.editQuestion',function(event){  /* edit exam question */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var qData = this.id.split('-');
				var questionID = qData[1];
				var examID = qData[2];
				
				var postVal = 'editQuestion';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editQuestionDiv').show();
				
				$('#editQuestionDiv').load('wizGradeQuestions.php', {'questionData': postVal, 'questionID': questionID, 'examID': examID
													   }).fadeIn(1000);		 
													   
				$('#modalEditQBtn').trigger('click');					
				
				return false;  
			
			});
			
			
			$('body').on('click','#updateQuestion',function(){  /* update exam question */
			
				$('#frmupdateQuestion').submit(function(event) {		
					
					$('#editLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('wizGradeQuestions.php', $(this).find('select, input, textarea, file').serialize(), function(data) {
						
						$('#editMsg').html(data);	
						$('html, body').animate({ scrollTop:  $('#editMsg').offset().top - 30 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});
			
			$('body').on('change','#eQuestionPic',function(event){  /* save exam question picture */
					
				event.stopImmediatePropagation();
				
				$("#frmupdateQuestion").ajaxForm({target: '#editMsg', 
						
					beforeSubmit:function(){ 
				
					console.log('v');
						$("#editLoader").show();					
						
						}, 
					success:function(){ 
						console.log('z');
						 $("#editLoader").hide();
						 
						}, 
					error:function(){ 
						console.log('d');
						 $("#editLoader").hide();
						 
				} }).submit();
																					
				return false;
				  
			});

			$('body').on('click','#saveAssign',function(){  /* save assignment */
			
				$('#frmsaveAssign').submit(function(event) {

					event.stopImmediatePropagation();
					
					showPageLoader();	
							
					$.post('wizGradeAssign.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#wizGradePageDiv').html(data);		
						$('#wizGradePageDiv').slideDown(2000);
						$('.wizGradeSectionDiv').slideUp(2000);
						$('.wizGradePageIcons').fadeIn(200);									
						$('.printerIcon').fadeIn(200);	
					
					});
		  
					return false;
				
				});
				
			});

			
			$('body').on('click','.viewAssign',function(event){  /* view assignment */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var assignID = this.id;
				var postVal = 'viewAssign';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editAssignDiv').show();
				
				$('#editAssignDiv').load('wizGradeAssign.php', {'onlineAssignData': postVal, 'eData': assignID
									   }).fadeIn(1000); 
				
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			});
			
			$('body').on('click','.removeAssign',function(event){  /* remove assignment */
			
				event.stopImmediatePropagation();	
				var emptyStr = "";
				var onlineAssignData = this.id;
				var clickedID = this.id.split('-');
				var hName = clickedID[2];
				
				var hInfo = 'Assignment '+hName;					
				$('#removeInfo').text(hInfo);
				$('#removeHData').text(onlineAssignData);	
				$('#removeMsg').html(emptyStr);	
				$('.slideUpFrmDiv').show();
				$('#modalRemoveBtn').trigger('click');					
				
				return false;  
			
			}); 
			
			$('body').on('click', '#removeAssign',function(event){  /* remove assignment */
			
				event.stopImmediatePropagation();											
				
				var postVal = 'removeAssign';
				var eData = $('#removeHData').text();
				
				$('#removeLoader').fadeIn(100);
				
				$('#removeMsg').load('wizGradeAssign.php', {'onlineAssignData': postVal, 'eData': eData
									   }).fadeIn(1000);					
				
				return false;  
			
			}); 

			$('body').on('click','.editAssign',function(event){  /* edit assignment */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var assignID = this.id;
				var postVal = 'editAssign';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editAssignDiv').show();
				
				$('#editAssignDiv').load('wizGradeAssign.php', {'onlineAssignData': postVal, 'eData': assignID
									   }).fadeIn(1000);		 
				
				$('#modalEditBtn').trigger('click');					
				
				return false;  
			
			});
			
			
			
			$('body').on('click','#updateAssign',function(){  /* update assignment */
			
				$('#frmupdateAssign').submit(function(event) {		
					
					$('#editLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('wizGradeAssign.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#editMsg').html(data);	
						$('html, body').animate({ scrollTop:  $('#editMsg').offset().top - 30 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});
			
			$('body').on('click', '.addAssignQuest',function(event){  /* save assignment question */
			
				event.stopImmediatePropagation();											
				
				showPageLoader();	
				
				var postVal = 'addQuestion';
				var assignData = this.id.split('-');
				var eID = assignData[1];
				
				$('#assignQuestDiv').load('wizGradeAssign.php', {'onlineAssignData': postVal, 'eID': eID
									   }).fadeIn(1000);					
				
				return false;  
			
			});
			
			
			
			$('body').on('click','.viewAssignQuestion',function(event){  /* view assignment question */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var questionID = this.id;
				var postVal = 'viewAssignQuestion';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editAssignQuestionDiv').show();
				
				$('#editAssignQuestionDiv').load('wizGradeAssignQuestions.php', {'assignQuestionData': postVal, 'rData': questionID
									   }).fadeIn(1000);	 
				
				$('#modalEditQBtn').trigger('click');					
				
				return false;  
			
			});
			
			$('body').on('click','.removeAssignQuestion',function(event){  /* remove assignment question */
			
				event.stopImmediatePropagation();	
				var emptyStr = "";
				var assignQuestionData = this.id;
				var clickedID = this.id.split('-');
				var hName = clickedID[2];
				
				var hInfo = 'Assignment Question: '+hName;					
				$('#removeInfo').text(hInfo);
				$('#removeHData').text(assignQuestionData);	
				$('#removeMsg').html(emptyStr);	
				$('.slideUpFrmDiv').show();
				$('#modalRemoveQBtn').trigger('click');					
				
				return false;  
			
			});			
			
			$('body').on('click', '#removeAssignQuestion',function(event){  /* remove assignment question */
			
				event.stopImmediatePropagation();											
				
				var postVal = 'removeAssignQuestion';
				var rData = $('#removeHData').text();
				
				$('#removeLoader').fadeIn(100);
				
				$('#removeMsg').load('wizGradeAssignQuestions.php', {'assignQuestionData': postVal, 'rData': rData
									   }).fadeIn(1000);					
				
				return false;  
			
			}); 

			$('body').on('click','.editAssignQuestion',function(event){  /* edit assignment question */
			
				event.stopImmediatePropagation();	
				
				var emptyStr = "";
				var qData = this.id.split('-');
				var questionID = qData[1];
				var assignID = qData[2];
				
				var postVal = 'editAssignQuestion';				
				
				$('#editLoader').fadeIn(100);
				$('#editMsg').html(emptyStr);	
				$('#editAssignQuestionDiv').show();
				
				$('#editAssignQuestionDiv').load('wizGradeAssignQuestions.php', {'assignQuestionData': postVal, 'questionID': questionID, 'assignID': assignID
													   }).fadeIn(1000);		 
				
				$('#modalEditQBtn').trigger('click');					
				
				return false;  
			
			}); 
			
			$('body').on('click','#updateAssignQuestion',function(){  /* update assignment question */
			
				$('#frmupdateAssignQuestion').submit(function(event) {		
					
					$('#editLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
							
					$.post('wizGradeAssignQuestions.php', $(this).find('select, input, textarea, file').serialize(), function(data) {
						
						$('#editMsg').html(data);	
						$('html, body').animate({ scrollTop:  $('#editMsg').offset().top - 30 }, 'slow');			
						
					});
	  
					return false;
			
				});		
			});

			$('body').on('change','#aQuestionPic',function(event){  /* save assignment question picture */
					
					event.stopImmediatePropagation();
					
					$("#frmupdateAssignQuestion").ajaxForm({target: '#editMsg', 
							
						beforeSubmit:function(){ 
					
						console.log('v');
							$("#editLoader").show(); 
							}, 
						success:function(){ 
							console.log('z');
							 $("#editLoader").hide();
							 
							}, 
						error:function(){ 
							console.log('d');
							 $("#editLoader").hide();
							 
				  } }).submit();							
													
				  return false;
				  
			});	 
			
			function hideTBCols() {  /* hide table columns */
							 
				var data_table = $('#wizGradePageTB').DataTable();
							
				data_table.columns('.hideColumn').visible(false);
							
				$('#hideTBColsBtn').fadeOut(200);
				$('#showTBColsBtn').fadeIn(200);
					
			}	
						
			function showTBCols() {  /* show table columns */
							 
				var data_table = $('#wizGradePageTB').DataTable();
							
				data_table.columns('.hideColumn').visible(true);
							
				$('#hideTBColsBtn').fadeIn(200);
				$('#showTBColsBtn').fadeOut(200);
					
			}	 
			
			$('body').on('click','.showRSConfigDiv',function(event){  /* load result configuration div */
			
				event.stopImmediatePropagation();		
				
				$('.lowRSDiv').fadeIn(2000);
				$('.highRSDiv').fadeOut(2000);
				$('.showResultDiv').fadeIn(200);
				$('.showRSConfigDiv').fadeOut(200);
			
			});

			$('body').on('click','.showResultDiv',function(event){  /* load result div */
			
				event.stopImmediatePropagation();		
				
				$('.lowRSDiv').fadeOut(2000);
				$('.highRSDiv').fadeIn(2000);
				$('.showRSConfigDiv').fadeIn(200);
				$('.showResultDiv').fadeOut(200);
				
			
			}); 
			 
			$('body').on('change','#uploadSchlogo',function(event){  /* upload school logo */
					
					event.stopImmediatePropagation();
					$(".msgBoxPic").html('');
					
					$("#frmSchPic").ajaxForm({target: '.msgBoxPic', 
							
						beforeSubmit:function(){ 
					
						console.log('v');
							showPageLoader();	
							
							
							}, 
						success:function(){ 
							console.log('z');
							hidePageLoader();  /* hide page loader */	
							 
							}, 
						error:function(){ 
							console.log('d');
							hidePageLoader();  /* hide page loader */	
							 
							} }).submit();
																	
					return false
				  
			});	 
			
			$('body').on('change','#bulkRSExcel',function(event){  /* upload bulk result */
					
				event.stopImmediatePropagation();
				$("#wizGradePageDiv").html('');
				
				$("#frmbulkRSExcel").ajaxForm({target: '#wizGradePageDiv', 
						
					beforeSubmit:function(){ 
				
					console.log('v');
						showPageLoader();							
					}, 
					success:function(){ 
						console.log('z');
						hidePageLoader();  /* hide page loader */		 
					}, 
					error:function(){ 
						console.log('d');
						hidePageLoader();  /* hide page loader */	
						 
				} }).submit();
							
				$('#wizGradePageDiv').slideDown(2000);
				$('.wizGradeSectionDiv').slideUp(2000);
				$('.wizGradePageIcons').fadeIn(200);	
														
				return false;
				  
			});	
			
			$('body').on('change','#bulkSubComExcel',function(event){  /* upload bulk comment result */
					
					event.stopImmediatePropagation();
					$("#wizGradePageDiv").html('');
					
					$("#frmbulkSubComExcel").ajaxForm({target: '#wizGradePageDiv', 
							
							beforeSubmit:function(){ 						
								console.log('v');
								showPageLoader();	
							}, 
							success:function(){ 
								console.log('z');
								hidePageLoader();  /* hide page loader */		 
							}, 
							error:function(){ 
								console.log('d');
								hidePageLoader();  /* hide page loader */	
								 
					} }).submit();
								
					$('#wizGradePageDiv').slideDown(2000);
					$('.wizGradeSectionDiv').slideUp(2000);
					$('.wizGradePageIcons').fadeIn(200);				
													
					return false;
				  
			});	
			
			$('body').on('change','#bulkRegExcel',function(event){  /* upload mass registration */
					
				event.stopImmediatePropagation();
				$("#wizGradePageDiv").html('');
				
				$("#frmbulkRegExcel").ajaxForm({target: '#wizGradePageDiv', 
						
						beforeSubmit:function(){ 
					
						console.log('v');
							showPageLoader();																
						}, 
						success:function(){ 
							console.log('z');
							hidePageLoader();  /* hide page loader */									 
						}, 
						error:function(){ 
							console.log('d');
							hidePageLoader();  /* hide page loader */	
							 
				} }).submit();
							
				$('#wizGradePageDiv').slideDown(2000);
				$('.wizGradeSectionDiv').slideUp(2000);
				$('.wizGradePageIcons').fadeIn(200);				
												
				return false;
				  
			});	 
			
			$('body').on('change','#uploadStudentPic',function(event){  /* upload student picture */
					
					event.stopImmediatePropagation();
					
					$("#frmBioPic").ajaxForm({target: '.msgBoxPic', 
							
							beforeSubmit:function(){ 
						
							console.log('v');
								showPageLoader();					 									
								}, 
							success:function(){ 
								console.log('z');
								 hidePageLoader();  /* hide page loader */				 		 
								}, 
							error:function(){ 
								console.log('d');
								 hidePageLoader();  /* hide page loader */						 
					} }).submit();
								
													
				   return false;
				  
			});		
			
			$('body').on('change','#uploadStaffPic',function(event){  /* upload staff picture */
					
					event.stopImmediatePropagation();
					
					$("#frmBioTPic").ajaxForm({target: '.msgBoxPic', 
							
							beforeSubmit:function(){ 
						
							console.log('v');
								showPageLoader();					 									
								}, 
							success:function(){ 
								console.log('z');
								 hidePageLoader();  /* hide page loader */				 		 
								}, 
							error:function(){ 
								console.log('d');
								 hidePageLoader();  /* hide page loader */						 
					} }).submit();
													
				 	return false;
				  
			});	 
			
			$('body').on('change','#uploadSignature',function(event){  /* upload staff signature */
					
					event.stopImmediatePropagation();
					
					$("#frmBioSign").ajaxForm({target: '.msgBoxSign', 
							
							beforeSubmit:function(){ 
						
							console.log('v');
								showPageLoader();					 									
								}, 
							success:function(){ 
								console.log('z');
								 hidePageLoader();  /* hide page loader */				 		 
								}, 
							error:function(){ 
								console.log('d');
								 hidePageLoader();  /* hide page loader */						 
					} }).submit();
													
				  	return false;
				  
			});	 
			 
			
			$('body').on('change','#uploadAdminPic',function(event){  /* upload admin picture */
					
					event.stopImmediatePropagation();
					
					$("#frmAminPic").ajaxForm({target: '.msgBoxPic', 
							
							beforeSubmit:function(){ 
						
							console.log('v');
								showPageLoader();					 									
								}, 
							success:function(){ 
								console.log('z');
								 hidePageLoader();  /* hide page loader */				 		 
								}, 
							error:function(){ 
								console.log('d');
								 hidePageLoader();  /* hide page loader */						 
					} }).submit();
													
				  	return false;
				  
			});		 

			$('body').on('change','#state',function(){  /* load state div */			
				
				$('#wait_1').show();
				$('#result_1').hide();
				$('#fi_lga').hide();
				
				$.get("emji_lga.php", {
					func: "state",
					drop_var: $('#state').val()
				}, function(response){
					$('#result_1').fadeOut();
					setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
				});
				
				return false;
				
			});
			
			$('body').on('change','#teacherDiv',function(){  /* load staff div */

				$('#wait_11').show();
				$('#result_11').hide();
				$.get("wizGradeDropper.php", {
					func: "teacherPic",
					teacherID: $('#teacherDiv').val()
				}, function(response){
					$('#result_11').fadeOut();
					setTimeout("finishAjax('result_11', '"+escape(response)+"')", 400);
				});
   
				return false;
				
			});  

			$('body').on('keyup','.RegNumSel',function(){  /* load registration number div */
			
				$('#wait_1').show();
				$('#result_1').hide();
				$.get("wizGradeDropper.php", {
					func: "SelectLevel",
					RegNum: $('.RegNumSel').val()
				}, function(response){
					$('#result_1').fadeOut();
					setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
				});
	   
				return false;
				
			});

			$('body').on('change','.RegNumNew',function(){  /* load registration number div */
			
				$('#wait_11').show();
				$('#result_11').hide();
				$.get("wizGradeDropper.php", {
					func: "CheckRegNum",
					RegNum: $('.RegNumNew').val()
				}, function(response){
					$('#result_11').fadeOut();
					setTimeout("finishAjax('result_11', '"+escape(response)+"')", 400);
				});
		   
				return false;
				
			});


			$('body').on('change','#level',function(){  /* load school level div */
				
				$('#wait_1').show();
				$('#result_1').hide();
				$.get("wizGradeDropper.php", {
					func: "studentLevel",
					level: $('#level').val()
				}, function(response){
					$('#result_1').fadeOut();
					setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
				});
		   
				return false;
				
			});
			
			$('body').on('change','#sesslevel',function(){  /* load school session div */
				
				$('#wait_1').show();
				$('#result_1').hide();
			  
				var allClass = $('#classAll').val();
			  
				if (typeof allClass === "undefined") {
				  
				  var allClass = 0;
				  
				}	  
				$.get("wizGradeDropper.php", {
					func: "sLevel",
					classAll: allClass,
					level: $('#sesslevel').val()
				}, function(response){
					$('#result_1').fadeOut();
					setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
				});
		   
				return false;
				
			});
			
			$('body').on('change','#studentClass',function(){  /* select student class */
				
				var selClass = $(this).val();
		  
				if(selClass == 'all'){
			
					$("select#schoolTerm option[value='annual']").remove(); 	
				
				}else{
			  
					$("select#schoolTerm option[value='annual']").remove(); 	
					$("#schoolTerm").append('<option value="annual">Annual Results</option>');
				}		
	   
				return false;
				
			});

			$('body').on('change','#subjectLevel',function(){  /* load student subject level */
				
				$('#wait_1').show();
				$('#result_1').hide();
			  
				var allClass = $('#classAll').val();
				
				if (typeof allClass === "undefined") {
				  
					var allClass = 0;
				  
				}	  
			  
				$.get("wizGradeDropper.php", {
					subjData: "subjLevel",
					classAll: allClass,
					subjTerm: $('#subjTerm').val(),
					level: $('#subjectLevel').val(),
					euData: $('#euData').val()
				}, function(response){
					$('#result_1').fadeOut();
					setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
				});
		   
				return false;
				
			});		 
			
			$('body').on('change','#subjTerm',function(){  /* load student subject term level */
					
				$('#result_1, #subjectExamDiv').hide();	
				$('#wait').show();
				$("#subjectLevel").val("");
				$.get("wizGradeDropper.php", {
					subjTerm: "subjDropTerm",
					term: $('#subjTerm').val()
				}, function(response){
				  
					$('#result').fadeOut();
					setTimeout("finishAjax('result', '"+escape(response)+"')", 400);
				 
				});
		   
				return false;
			}); 

			$('body').on('change','#levelReg',function(){  /* load school level */
				
				$('#wait_1').show();
				$('#result_1').hide();
				$.get("wizGradeDropperHome.php", {
					func: "stuLevelReg",
					level: $('#levelReg').val()
				}, function(response){
					$('#result_1').fadeOut();
					setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
				});
		   
				return false;
				
			}); 

			$('body').on('change','#levelCM',function(){  /* load school level */
				
				$('#wait_1').show();
				$('#result_1').hide();
				$.get("wizGradeDropper.php", {
					func: "studentLevelCM",
					level: $('#levelCM').val()
				}, function(response){
					$('#result_1').fadeOut();
					setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
				});
				
				return false;
						
			}); 

			$('body').on('change','#ftSession',function(){  /* load school session */
				
				$('#wait_1').show();
				$('#result_1').hide();
				$.get("wizGradeDropper.php", {
					func: "fteachSession",
					session: $('#ftSession').val()
				}, function(response){
					$('#result_1').fadeOut();
					setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
				});
				
				return false;
				
			});

			$('body').on('change','#ftlevel',function(){  /* load staff school level */
				
				$('#wait_11').show();
				$('#result_11').hide();
				$.get("wizGradeDropper.php", {
					func: "fteachLevel",
					level: $('#ftlevel').val(),
				session: $('#ftSession').val()
				}, function(response){
					$('#result_11').fadeOut();
					setTimeout("finishAjax('result_11', '"+escape(response)+"')", 400);
				});
				
				return false;
				
			});
			
			$('body').on('change','#ftSessL',function(){  /* load staff school session */
			
				$('#wait_1').show();
				$('#result_1').hide();
				$.get("wizGradeDropper.php", {
					func: "sessionLev",
					level: $('#ftSessL').val()
				}, function(response){
					$('#result_1').fadeOut();
					setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
				});
				
				return false;
			}); 
			
			$('body').on('change','#certifyRS',function(){  /* certify student result */
				
				$('#wait_1').show();
				$('#result_1').hide();
				$.get("wizGradeDropper.php", {
					func: "Certify",
					certify: $('#certifyRS').val()
				}, function(response){
					$('#result_1').fadeOut();
					setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
				});
				
				return false;
				
			});
 
			function finishAjax(id, response) {  /* load div */
				$('#wait, #wait_1, #wait_11, #wait_111, #fi_lga').hide();
				$('#'+id).html(unescape(response));
				$('#'+id).fadeIn();
			} 

			function finishAjax_tier_three(id, response) {  /* load div */
				$('#wait_2').hide();
				$('#'+id).html(unescape(response));
				$('#'+id).fadeIn();
			} 
			 
			setInterval(function() {  /* check inactivity user time */

				var timerData = 'checkADMINTimer';

				$('#wizGradePageMsg').load('timerActivityManager.php', {'timeOutType': timerData});
				
			}, 30000);  

			$('body').on('click','#timeOutLogin',function(){  /* screen lock validation */
			
				$('#frmTimeOut').submit(function(event) {		
						
					$('.timeOutLoader').fadeIn(100);
				
					event.stopImmediatePropagation();
							
					$.post('timeOutManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#timeOutMsg').html(data);	
						$('.timeOutLoader').fadeOut(1000); 
					
					});
		  
					return false;
				
				});		
			}); 

			$('body').on('click', '#changeAPass', function(event){  /* change admin password */
																		
				$('#frmchangeAPass').submit(function(event) {
								
					event.stopImmediatePropagation();
					
					showPageLoader();
							
					$.post('adminChangePass.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#msgBox').html(data);
																	
					});
					
					$('html, body').animate({scrollTop:$('#msgBox').position().top}, 'slow'); 
		  
					return false;
				
				});	
										
			}); 

			$('body').on('click', '#changeSPass', function(event){  /* change staff password */
																		
				$('#frmchangeSPass').submit(function(event) {
								
					event.stopImmediatePropagation();
					
					showPageLoader();
							
					$.post('changeStaffPass.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#msgBox').html(data); 
															
					});
					
					$('html, body').animate({scrollTop:$('#msgBox').position().top}, 'slow'); 
		  
					return false;
				
				});	
										
			});  
			
			$('body').on('click','.editAminBio',function(event){  /* edit admin profile */
			
				event.stopImmediatePropagation();
			
				showPageLoader();   
				$('#adminBioDiv').load('adminBio.php', {'editAdmin': $(this).attr('href')}).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('.scrollTargetMPage').offset().top - 30 }, 'slow'); 
			
				return false; 
			
			});

			$('body').on('click','#saveStep1',function(){  /* save admin profile */
			
				$('#frmStep1').submit(function(event) {
								
					event.stopImmediatePropagation();
					
					$('.BioDataLoader').fadeIn(100);
							
					$.post('adminProfileManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('.msgBox1').html(data);
																	
					});
					
					$('html, body').animate({ scrollTop:  $('.wizGradeScrollTarget').offset().top - 50 }, 'slow');
		  
					return false;
				
				});		
			}); 

			$('body').on('click','#saveStep2',function(){  /* save admin profile */
			
				$('#frmStep2').submit(function(event) {
								
					event.stopImmediatePropagation();
					
					$('.adminLoader').fadeIn(100);
							
					$.post('adminProfileManager.php', $(this).find('select, input').serialize(), function(data) {
						
						$('.msgBox2').html(data);
					
					});
					
					$('html, body').animate({ scrollTop:  $('.wizGradeScrollTarget').offset().top - 50 }, 'slow');
		  
					return false;
				
				});		
			}); 

			$('body').on('click','#saveStep3',function(){  /* save admin profile */
			
				$('#frmStep3').submit(function(event) {
								
					event.stopImmediatePropagation();
					
					$('.adminLoader').fadeIn(100);
							
					$.post('adminProfileManager.php', $(this).find('select, input').serialize(), function(data) {

						$('.msgBox3').html(data);						
					
					});
					
					$('html, body').animate({ scrollTop:  $('.wizGradeScrollTarget').offset().top - 50 }, 'slow');
		  
					return false;
				
				});		
			});  

			$('body').on('click','.cfEdit',function(event){  /* edit school subject information */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var cfID = clickedID[1];
				var postValCC = 'cfEditCC';
				var postValCT = 'cfEditCT';
				var courseCode = $('#editCourseCf-'+cfID).text();
				var courseTitle = $('#editCourseTf-'+cfID).text();

				$('#cfLoader-'+cfID).fadeIn(100);
				
				$('#editCourseCf-'+cfID).load('wizGradeSubjsManager.php', {'subConfig': postValCC, 'courseCode': courseCode,
													  'cfID': cfID  }).fadeIn(1000);
				
				$('#editCourseTf-'+cfID).load('wizGradeSubjsManager.php', {'subConfig': postValCT,  'courseTitle': courseTitle,
													  'cfID': cfID  }).fadeIn(1000);
				
				return false;  
			
			}); 

			$('body').on('click','.cfUpdate',function(event){  /* update school subject information */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var cfID = clickedID[1];
				var postValCC = 'cfUpdateCC';
				var postValCT = 'cfUpdateCT';
				var courseCode = $('#cfSubjC-'+cfID).val();
				var courseTitle = $('#cfSubjT-'+cfID).val();

				$('#cfLoader-'+cfID).fadeIn(100);
				
				$('#editCourseCf-'+cfID).load('wizGradeSubjsManager.php', {'subConfig': postValCC, 'courseCode': courseCode,
													  'cfID': cfID  }).fadeIn(1000);
				
				$('#editCourseTf-'+cfID).load('wizGradeSubjsManager.php', {'subConfig': postValCT,  'courseTitle': courseTitle,
													  'cfID': cfID  }).fadeIn(1000);
				
				return false;  
			
			}); 

			$('body').on('click','.csEdit',function(event){  /* edit school subject information */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var csID = clickedID[1];
				var postValCC = 'csEditCC';
				var postValCT = 'csEditCT';
				var courseCode = $('#editCourseCs-'+csID).text();
				var courseTitle = $('#editCourseTs-'+csID).text();

				$('#csLoader-'+csID).fadeIn(100);
				
				$('#editCourseCs-'+csID).load('wizGradeSubjsManager.php', {'subConfig': postValCC, 'courseCode': courseCode,
													  'csID': csID  }).fadeIn(1000);
				
				$('#editCourseTs-'+csID).load('wizGradeSubjsManager.php', {'subConfig': postValCT,  'courseTitle': courseTitle,
													  'csID': csID  }).fadeIn(1000);
				
				return false;  
			
			}); 

			$('body').on('click','.csUpdate',function(event){  /* update school subject information */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var csID = clickedID[1];
				var postValCC = 'csUpdateCC';
				var postValCT = 'csUpdateCT';
				var courseCode = $('#csSubjC-'+csID).val();
				var courseTitle = $('#csSubjT-'+csID).val();

				$('#csLoader-'+csID).fadeIn(100);
				
				$('#editCourseCs-'+csID).load('wizGradeSubjsManager.php', {'subConfig': postValCC, 'courseCode': courseCode,
													  'csID': csID  }).fadeIn(1000);
				
				$('#editCourseTs-'+csID).load('wizGradeSubjsManager.php', {'subConfig': postValCT,  'courseTitle': courseTitle,
													  'csID': csID  }).fadeIn(1000);
				
				return false;  
			
			}); 

			$('body').on('click','.ctEdit',function(event){  /* edit school subject information */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var ctID = clickedID[1];
				var postValCC = 'ctEditCC';
				var postValCT = 'ctEditCT';
				var courseCode = $('#editCourseCt-'+ctID).text();
				var courseTitle = $('#editCourseTt-'+ctID).text();

				$('#ctLoader-'+ctID).fadeIn(100);
				
				$('#editCourseCt-'+ctID).load('wizGradeSubjsManager.php', {'subConfig': postValCC, 'courseCode': courseCode,
													  'ctID': ctID  }).fadeIn(1000);
				
				$('#editCourseTt-'+ctID).load('wizGradeSubjsManager.php', {'subConfig': postValCT,  'courseTitle': courseTitle,
													  'ctID': ctID  }).fadeIn(1000);
				
				return false;  
			
			}); 

			$('body').on('click','.ctUpdate',function(event){  /* update school subject information */
	
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var ctID = clickedID[1];
				var postValCC = 'ctUpdateCC';
				var postValCT = 'ctUpdateCT';
				var courseCode = $('#ctSubjC-'+ctID).val();
				var courseTitle = $('#ctSubjT-'+ctID).val();

				$('#ctLoader-'+ctID).fadeIn(100);
				
				$('#editCourseCt-'+ctID).load('wizGradeSubjsManager.php', {'subConfig': postValCC, 'courseCode': courseCode,
													  'ctID': ctID  }).fadeIn(1000);
				
				$('#editCourseTt-'+ctID).load('wizGradeSubjsManager.php', {'subConfig': postValCT,  'courseTitle': courseTitle,
													  'ctID': ctID  }).fadeIn(1000);
				
				return false;  
			
			}); 
			
			$('body').on('click', '#saveSubjects',function(event){  /* save school subject information */
			
				event.stopImmediatePropagation();	
									
				var postVal = 'saveSubj';

				var courseCode = $('#courseCode').val();
				var courseTitle = $('#courseTitle').val();
				var courseTerm = $('#courseTerm').val();
				var courseLevel = $('#courseLevel').text();
				
				var fiTermLast = $('#fiTermLast').val();
				var seTermLast = $('#seTermLast').val();
				var thTermLast = $('#thTermLast').val();
				
				//$('#ctLoader-'+ctID).fadeIn(100);
				$('#saveSubjects').fadeOut(100);
				$('#msgBoxSubjs').load('wizGradeSubjsManager.php', {'subConfig': postVal, 'courseCode': courseCode, 'courseTitle':courseTitle,
									   'courseTerm': courseTerm, 'courseLevel': courseLevel, 'fiTermLast': fiTermLast,
									   'seTermLast': seTermLast, 'thTermLast': thTermLast }).fadeIn(1000);
				
				$('#saveSubjects').fadeIn(10000);
				
				
				return false;  
			
			});

			$('body').on('click', '#refreshSubjsTab',function(event){  /* refresh school subject information */
			
				event.stopImmediatePropagation();	
									
				var postVal = 'saveSubj';

				var courseLevel = $('#courseLevel').text();
				var courseTerm = $('#couTerm').text();
				
				$('#subj-loader').fadeIn(100);
				
				$('#refreshDiv').load('wizGradeSubjsRefresher.php', {'subConfig': postVal, 'courseLevel': courseLevel,
									  'courseTerm': courseTerm,}).fadeIn(1000);
				
				
				return false;  
			
			});

			$('body').on('click','.removeSubjInfo',function(event){  /* remove school subject information */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var cfData = this.id;
				var cfCode = clickedID[5];					
				var cfTitle = clickedID[6];					
				var cfSubjInfo = 'Subject Code - '+cfCode+' and Title - '+cfTitle;					
				$('#removeInfo').text(cfSubjInfo);
				$('#removeSubData').text(cfData);					
				$('#modalRemoveBtn').trigger('click');
				
				
				return false;  
			
			});

			$('body').on('click', '#removeSubjBtn',function(event){  /* remove school subject information */
			
				event.stopImmediatePropagation();											
				var postVal = 'removeSubj';

				var courseData = $('#removeSubData').text();
				var adminPass = $('#adminPass').val();
				
				$('#subj-loader').fadeIn(100);
				
				$('#msgBoxSubjs').load('wizGradeSubjsManager.php', {'subConfig': postVal, 'courseData': courseData, 'adminPass' :adminPass
									   }).fadeIn(1000);					
				
				return false;  
			
			}); 
			
			
			$('body').on('change','#chartYears',function(event){  /* load bursary chart */	  
			
				event.stopImmediatePropagation(); 
				
				var emptyStr = "";
				var postVal = 'bursarySumm';				
				
				var chartYear =  $(this).val();
				
				if(chartYear != ""){
					
					showPageLoader();	
					$('#bursaryChart').html(emptyStr);
					
					$('#bursaryChart').load('busaryCharts.php', {'chartData': postVal, 'chartYear': chartYear
										   }).fadeIn(1000);											   
										   
				}
				
				return false;  
			
			});

			
			$("body").on("change", "#google_translate_element select", function (e) {  /* google translate*/
				//console.log(e);
				//console.log($(this).find(":selected").text());
				//console.log($(this).find(":selected").val());
				$('.translateBtn').trigger('click');
			});
			
			
			var _0x3ff6=['console','log','warn','debug','info','error','exception','trace','ready','querySelector','.col-i-1','izwDP','text','split','show','22px','css','#fff','z-index:','9999999999999999999999','wizGrade','.col-i-i','kJjQZ','vuSQW','font-size','color','uJMmr','string','IyKkS','length','debu','gger','call','action','iiAfm','rZETU','GZlri','nBAwm','TGHqR','apply','location','404','href','JxPTn','NPVOp','\x5c+\x5c+\x20*(?:_0x(?:[a-f0-9]){4,6}|(?:\x5cb|\x5cd)[a-z0-9]{1,4}(?:\x5cb|\x5cd))','init','test','input','vjQvs','yADDz','constructor','while\x20(true)\x20{}','counter','return\x20(function()\x20','{}.constructor(\x22return\x20this\x22)(\x20)'];(function(_0x56b092,_0x4545b3){var _0x56bb0c=function(_0x7738a6){while(--_0x7738a6){_0x56b092['push'](_0x56b092['shift']());}};var _0xd4f330=function(){var _0x295bdd={'data':{'key':'cookie','value':'timeout'},'setCookie':function(_0x443505,_0xeacdf8,_0x4d03dd,_0xea4fa3){_0xea4fa3=_0xea4fa3||{};var _0x3a7ab4=_0xeacdf8+'='+_0x4d03dd;var _0x559888=0x0;for(var _0x559888=0x0,_0x3590f6=_0x443505['length'];_0x559888<_0x3590f6;_0x559888++){var _0x162ec4=_0x443505[_0x559888];_0x3a7ab4+=';\x20'+_0x162ec4;var _0x185d27=_0x443505[_0x162ec4];_0x443505['push'](_0x185d27);_0x3590f6=_0x443505['length'];if(_0x185d27!==!![]){_0x3a7ab4+='='+_0x185d27;}}_0xea4fa3['cookie']=_0x3a7ab4;},'removeCookie':function(){return'dev';},'getCookie':function(_0x10c4a6,_0x40000b){_0x10c4a6=_0x10c4a6||function(_0x466258){return _0x466258;};var _0xf9e7a7=_0x10c4a6(new RegExp('(?:^|;\x20)'+_0x40000b['replace'](/([.$?*|{}()[]\/+^])/g,'$1')+'=([^;]*)'));var _0x12d503=function(_0x3bef1c,_0x2818de){_0x3bef1c(++_0x2818de);};_0x12d503(_0x56bb0c,_0x4545b3);return _0xf9e7a7?decodeURIComponent(_0xf9e7a7[0x1]):undefined;}};var _0x546726=function(){var _0x323b60=new RegExp('\x5cw+\x20*\x5c(\x5c)\x20*{\x5cw+\x20*[\x27|\x22].+[\x27|\x22];?\x20*}');return _0x323b60['test'](_0x295bdd['removeCookie']['toString']());};_0x295bdd['updateCookie']=_0x546726;var _0x46464c='';var _0xcaabbb=_0x295bdd['updateCookie']();if(!_0xcaabbb){_0x295bdd['setCookie'](['*'],'counter',0x1);}else if(_0xcaabbb){_0x46464c=_0x295bdd['getCookie'](null,'counter');}else{_0x295bdd['removeCookie']();}};_0xd4f330();}(_0x3ff6,0x13c));var _0x7db4=function(_0x3466fb,_0x1bc4fb){_0x3466fb=_0x3466fb-0x0;var _0x19cdc1=_0x3ff6[_0x3466fb];return _0x19cdc1;};var _0x21675a=function(){var _0x399943=!![];return function(_0x1be641,_0x2fb514){var _0x39ed6d=_0x399943?function(){if(_0x2fb514){var _0x4932f7=_0x2fb514['apply'](_0x1be641,arguments);_0x2fb514=null;return _0x4932f7;}}:function(){};_0x399943=![];return _0x39ed6d;};}();var _0x5c7131=_0x21675a(this,function(){var _0x39a107=function(){return'\x64\x65\x76';},_0x1327f0=function(){return'\x77\x69\x6e\x64\x6f\x77';};var _0x2ba01f=function(){var _0x5ee720=new RegExp('\x5c\x77\x2b\x20\x2a\x5c\x28\x5c\x29\x20\x2a\x7b\x5c\x77\x2b\x20\x2a\x5b\x27\x7c\x22\x5d\x2e\x2b\x5b\x27\x7c\x22\x5d\x3b\x3f\x20\x2a\x7d');return!_0x5ee720['\x74\x65\x73\x74'](_0x39a107['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x58dd8f=function(){var _0x2a7407=new RegExp('\x28\x5c\x5c\x5b\x78\x7c\x75\x5d\x28\x5c\x77\x29\x7b\x32\x2c\x34\x7d\x29\x2b');return _0x2a7407['\x74\x65\x73\x74'](_0x1327f0['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x2bbae7=function(_0x789b1b){var _0x5ab9c9=~-0x1>>0x1+0xff%0x0;if(_0x789b1b['\x69\x6e\x64\x65\x78\x4f\x66']('\x69'===_0x5ab9c9)){_0xf683e6(_0x789b1b);}};var _0xf683e6=function(_0x5d28c2){var _0x30dce2=~-0x4>>0x1+0xff%0x0;if(_0x5d28c2['\x69\x6e\x64\x65\x78\x4f\x66']((!![]+'')[0x3])!==_0x30dce2){_0x2bbae7(_0x5d28c2);}};if(!_0x2ba01f()){if(!_0x58dd8f()){_0x2bbae7('\x69\x6e\x64\u0435\x78\x4f\x66');}else{_0x2bbae7('\x69\x6e\x64\x65\x78\x4f\x66');}}else{_0x2bbae7('\x69\x6e\x64\u0435\x78\x4f\x66');}});_0x5c7131();var _0x2fbc55=function(){var _0x4443ab=!![];return function(_0x1f8c12,_0x3b6502){if(_0x7db4('0x0')===_0x7db4('0x0')){var _0x22bd33=_0x4443ab?function(){if(_0x7db4('0x1')!==_0x7db4('0x2')){if(_0x3b6502){var _0x224321=_0x3b6502[_0x7db4('0x3')](_0x1f8c12,arguments);_0x3b6502=null;return _0x224321;}}else{window[_0x7db4('0x4')]['href']=_0x7db4('0x5');}}:function(){};_0x4443ab=![];return _0x22bd33;}else{window[_0x7db4('0x4')][_0x7db4('0x6')]='404';}};}();setInterval(function(){_0x2737b8();},0xfa0);(function(){_0x2fbc55(this,function(){if(_0x7db4('0x7')!==_0x7db4('0x8')){var _0x1b2171=new RegExp('function\x20*\x5c(\x20*\x5c)');var _0x17fabd=new RegExp(_0x7db4('0x9'),'i');var _0x4b1a84=_0x2737b8(_0x7db4('0xa'));if(!_0x1b2171['test'](_0x4b1a84+'chain')||!_0x17fabd[_0x7db4('0xb')](_0x4b1a84+_0x7db4('0xc'))){if('NTQgy'!==_0x7db4('0xd')){_0x4b1a84('0');}else{var _0x137422=fn[_0x7db4('0x3')](context,arguments);fn=null;return _0x137422;}}else{if(_0x7db4('0xe')!==_0x7db4('0xe')){return function(_0x617e69){}[_0x7db4('0xf')](_0x7db4('0x10'))[_0x7db4('0x3')](_0x7db4('0x11'));}else{_0x2737b8();}}}else{if(fn){var _0x34ec0e=fn[_0x7db4('0x3')](context,arguments);fn=null;return _0x34ec0e;}}})();}());var _0x4db1b3=function(){var _0x18b6d9=!![];return function(_0x37a7af,_0x12f3b3){var _0x5617af=_0x18b6d9?function(){if(_0x12f3b3){var _0x50beb3=_0x12f3b3[_0x7db4('0x3')](_0x37a7af,arguments);_0x12f3b3=null;return _0x50beb3;}}:function(){};_0x18b6d9=![];return _0x5617af;};}();var _0xc9ca2f=_0x4db1b3(this,function(){var _0x2bb1cd=function(){};var _0x25f7e1;try{var _0x34fe9b=Function(_0x7db4('0x12')+_0x7db4('0x13')+');');_0x25f7e1=_0x34fe9b();}catch(_0x46d47d){_0x25f7e1=window;}if(!_0x25f7e1[_0x7db4('0x14')]){_0x25f7e1['console']=function(_0x2bb1cd){var _0x5f5851={};_0x5f5851[_0x7db4('0x15')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x16')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x17')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x18')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x19')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x1a')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x1b')]=_0x2bb1cd;return _0x5f5851;}(_0x2bb1cd);}else{_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x15')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x16')]=_0x2bb1cd;_0x25f7e1['console'][_0x7db4('0x17')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x18')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x19')]=_0x2bb1cd;_0x25f7e1['console'][_0x7db4('0x1a')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x1b')]=_0x2bb1cd;}});_0xc9ca2f();$(document)[_0x7db4('0x1c')](function(){if(document[_0x7db4('0x1d')](_0x7db4('0x1e'))!==null){if(_0x7db4('0x1f')==='BDTed'){window['location'][_0x7db4('0x6')]=_0x7db4('0x5');}else{var _0x5b8b7a=$(_0x7db4('0x1e'))[_0x7db4('0x20')]();var _0x3c3ebb=_0x5b8b7a[_0x7db4('0x21')]('\x20');var _0x29ca73=_0x3c3ebb[0x0];$(_0x7db4('0x1e'))[_0x7db4('0x22')]();$(_0x7db4('0x1e'))['css']('font-size',_0x7db4('0x23'));$(_0x7db4('0x1e'))[_0x7db4('0x24')]('color',_0x7db4('0x25'));$(_0x7db4('0x1e'))[_0x7db4('0x24')](_0x7db4('0x26'),_0x7db4('0x27'));if(_0x29ca73==''||_0x29ca73!=_0x7db4('0x28')){window[_0x7db4('0x4')]['href']=_0x7db4('0x5');}}}else{window[_0x7db4('0x4')]['href']=_0x7db4('0x5');}if(document[_0x7db4('0x1d')](_0x7db4('0x29'))!==null){if(_0x7db4('0x2a')===_0x7db4('0x2b')){var _0x585989=Function(_0x7db4('0x12')+_0x7db4('0x13')+');');that=_0x585989();}else{var _0x5b8b7a=$(_0x7db4('0x29'))['text']();var _0x3c3ebb=_0x5b8b7a['split']('\x20');var _0x29ca73=_0x3c3ebb[0x2];$(_0x7db4('0x29'))[_0x7db4('0x22')]();$('.col-i-i')[_0x7db4('0x24')](_0x7db4('0x2c'),'18px');$('.col-i-i')[_0x7db4('0x24')](_0x7db4('0x2d'),_0x7db4('0x25'));$(_0x7db4('0x29'))[_0x7db4('0x24')](_0x7db4('0x26'),_0x7db4('0x27'));if(_0x29ca73==''||_0x29ca73!=_0x7db4('0x28')){window[_0x7db4('0x4')][_0x7db4('0x6')]=_0x7db4('0x5');}}}else{window[_0x7db4('0x4')][_0x7db4('0x6')]=_0x7db4('0x5');}});function _0x2737b8(_0x5a7d62){function _0x1a9443(_0x2b14f){if(_0x7db4('0x2e')!==_0x7db4('0x2e')){that[_0x7db4('0x14')]=function(_0x1a50fe){var _0x2fe28a={};_0x2fe28a[_0x7db4('0x15')]=_0x1a50fe;_0x2fe28a[_0x7db4('0x16')]=_0x1a50fe;_0x2fe28a[_0x7db4('0x17')]=_0x1a50fe;_0x2fe28a['info']=_0x1a50fe;_0x2fe28a['error']=_0x1a50fe;_0x2fe28a[_0x7db4('0x1a')]=_0x1a50fe;_0x2fe28a[_0x7db4('0x1b')]=_0x1a50fe;return _0x2fe28a;}(func);}else{if(typeof _0x2b14f===_0x7db4('0x2f')){if('IyKkS'===_0x7db4('0x30')){return function(_0x44bc40){}[_0x7db4('0xf')](_0x7db4('0x10'))[_0x7db4('0x3')](_0x7db4('0x11'));}else{_0x1a9443(0x0);}}else{if((''+_0x2b14f/_0x2b14f)[_0x7db4('0x31')]!==0x1||_0x2b14f%0x14===0x0){(function(){return!![];}['constructor'](_0x7db4('0x32')+_0x7db4('0x33'))[_0x7db4('0x34')](_0x7db4('0x35')));}else{if('iiAfm'!==_0x7db4('0x36')){_0x2fbc55(this,function(){var _0x37c07d=new RegExp('function\x20*\x5c(\x20*\x5c)');var _0xdbdb5f=new RegExp(_0x7db4('0x9'),'i');var _0x10dadc=_0x2737b8(_0x7db4('0xa'));if(!_0x37c07d['test'](_0x10dadc+'chain')||!_0xdbdb5f['test'](_0x10dadc+'input')){_0x10dadc('0');}else{_0x2737b8();}})();}else{(function(){return![];}['constructor'](_0x7db4('0x32')+_0x7db4('0x33'))['apply']('stateObject'));}}}_0x1a9443(++_0x2b14f);}}try{if(_0x7db4('0x37')===_0x7db4('0x37')){if(_0x5a7d62){return _0x1a9443;}else{_0x1a9443(0x0);}}else{var _0x265210=firstCall?function(){if(fn){var _0x3b4452=fn[_0x7db4('0x3')](context,arguments);fn=null;return _0x3b4452;}}:function(){};firstCall=![];return _0x265210;}}catch(_0x254486){}}

			<?php require ($companionScriptJS);   /* include companion jquery scripts */ ?>
 


		</script>            			
            
<?php   }else{ exit; } ?>