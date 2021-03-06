<?php

/*  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 	
	wizGrade V 1.1 (Formerly SDOSMS) is Developed by Igweze Ebele Mark | https://www.iem.wizgrade.com 
	https://www.wizgrade.com | Release Date � 2nd April, 2019
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
	This script handle companion inbox mark as unread
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */ 

				require ($wizGradevalidater);  

		 		try {
				 
								$memberInfo = companionWallUserDetails($conn, $_SESSION['studetReg'], $seVal);  /* retrieve student companion details */
						
								list ($member_id, $faRegNum, $m_name, $m_sex, $prof_pic, $m_dept, $m_faculty, $userMail, 
								$wallPic, $load_page) = explode ("##", $memberInfo);	
				
							    $mailStarIcon = '<i class="fa fa-star"></i>';
								$ebele_mark = "UPDATE $wizGradeMailBoxTB 
								
												SET 
                						 	
												njnk_status = :njnk_status

                 								WHERE msg_id = :msg_id
												
												AND njnk_reps_id = :njnk_reps_id";
												
								$igweze_prep = $conn->prepare($ebele_mark);							
								$igweze_prep->bindValue(':njnk_reps_id', $member_id);								
								$igweze_prep->bindValue(':njnk_status', $seVal);
								
								foreach($_REQUEST as $mailMsg => $msg_id) {	 /* mark mail read */						
							
									$igweze_prep->bindValue(':msg_id', $msg_id);											
									$igweze_prep->execute();																	
									
									echo  "<script type='text/javascript'>$('#mailRowID-$msg_id').removeClass('unread'); 
																		  $('#starIconMail-$msg_id').html('$mailStarIcon');
																		  $('#chkmailID-$msg_id').each(function() { 
																			this.checked = false; 
																		  });
											</script>";
			
									$msg_id = '';
									
								}

								if(isset($_SESSION['wallComRank'])){	

									$unreadMsg = numOfUnreadMsgAdmin($conn, $member_id);  /* retrieve number of admin unread message */
																	
									echo  "<script type='text/javascript'>
																	  $('.inboxMsgNum').html('$unreadMsg');	
																	  $('#selectAll').each(function() { 
                													  this.checked = false; 
            														  });	
											</script>";

								}else{
									
									$unreadMsg = numOfUnreadMsg($conn, $member_id);  /* retrieve number of nread message */									
									$adminMsg = numOfAdminMsg($conn, $member_id);	/* retrieve number of admin message */ 															

									echo  "<script type='text/javascript'>
																	  $('.inboxMsgNum').html('$unreadMsg');	
																	  $('.adminMsgNum').html('$adminMsg');	
																	  $('#selectAll').each(function() { 
                													  this.checked = false; 
            														  });	
											</script>";
								}

								
				}catch(PDOException $e) {
  			
						wizGradeDie( 'Ooops Database Error: ' . $e->getMessage());
			 
				}
		
		
?>