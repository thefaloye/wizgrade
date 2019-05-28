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
	This page load student dashboard
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */  

session_id();

session_start();

		if (!defined('wizGrade')) /* This checks if this page was wrongly access by users */

		die('Hahahaha, Hacking attempt . . . . Be Careful . . . . You Are Been Warned !!!!');
        
		require 'configwizGrade.php';  /* load wizGrade configuration files */	 
	
	 	require_once ($wizGradeCWallFunctionDir);

		try {
				
					
				$memberInfo = companionWallUserDetails($conn, $_SESSION['studetReg'], $seVal);  /* retrieve student companion details */
				
				list ($member_id, $faRegNum, $m_name, $m_sex, $prof_pic, $m_dept, $m_faculty, $userMail, 
					  $wallPic, $load_page) = explode ("##", $memberInfo);				

				$unreadMsg = numOfUnreadMsg($conn, $member_id); global $userMail;  /* retrieve number of unread message */


		}catch(PDOException $e) {
  			
					wizGradeDie( 'Ooops Database Error: ' . $e->getMessage());
			 
		}

?>

			<!-- row -->	
 
			<div class="row widget-background">
				
				<div style="margin:10px auto;" id="dash-date" class="col-lg-12"></div>
				
					<div class="col-lg-6">
                      <section class="panel widget-background">
                          
                          <div class="panel-body wizGrade-clock">
								
								<div id="cssclock"> 
								
								<div id="clockdigital">
								<img src="<?php echo $wizGradeTemplate; ?>images/digitalhours.gif" id="digitalhour" alt="Clocks hours" />
								<img src="<?php echo $wizGradeTemplate; ?>images/digitalminutes.gif" id="digitalminute" alt="Clocks minutes" />
								<img src="<?php echo $wizGradeTemplate; ?>images/digitalseconds.gif" id="digitalsecond" alt="Clocks seconds" />
								<div>&nbsp;</div><div>&nbsp;</div></div>
								
								
								</div>
								<script type="text/javascript">
									bDOMLoaded = true;
									ClockInit();
								</script> 
				
							</div>
                      </section>
					</div>
					 
					
					<div class="col-lg-6">
					<section class="panel"> 
		
                          <div class="weather-bg">
                              <div class="panel-body"> 
							  
									<a class="weatherwidget-io" href="https://forecast7.com/en/9d087d40/abuja/" data-label_1="ABUJA" data-label_2="WEATHER" data-days="5" data-theme="pure" >ABUJA WEATHER</a>
									<script>
									!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
									</script>
 
                              </div>
                          </div> 
                      </section>
					  </div>

				  
			</div>
			<!-- / row -->	
			
			
				
			 
			<!-- row -->	
			<div class="row" style="margin:30px 10px 0px 0px">
					<div class="col-lg-12">
                      <section class="panel">
                        <header class="panel-heading">
                             <i class="fa fa-eye fa-lg"></i> Student School Fees History
							 <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                            </span>
                        </header>
                        <div class="panel-body wizGrade-line">
								<div class="col-lg-12">
								  <section class="panel">
									  
										<div class="panel-body wizGrade-linea"> 
											 
				<?php

					try {
				 
						$levelArray = studentLevelsArray($conn);  /* student level array */ 
						$feesDataArr = studentFeesInfo($conn, $regID, $regNum, $schoolID);  /* student school fee array */
						$feesDataCount = count($feesDataArr);
						
					}catch(PDOException $e) {
					
							wizGradeDie( 'Ooops Database Error: ' . $e->getMessage());
					 
					}	

						
				?>

				<!-- <script type='text/javascript'> $('.paginate-page').trigger('click');  /*  paginate table using Jquery dataTable */ </script> -->
				<!-- table -->
				<table  class='table table-hover table-responsive style-table wizGradePageTB' id='wizGradePageTB'>
						<thead><tr>
                        <th>S/N</th> 
                        <th class='text-left'>Category</th> 
						
						
						<th class='text-left'>Level</th> 
						<th class='text-left'>Term</th>
						<th class='text-left'>Amount </th>
						<th class='text-left'>Balance</th>
						<th class='text-left'>Date</th>
						<th class='text-left'>Status</th>
						<th class='text-left'>Tasks</th>
                        </tr></thead> <tbody>


					<?php
						
						if($feesDataCount >= $fiVal){  /* check array is empty */		
														
								
								for($i = $fiVal; $i <= $feesDataCount; $i++){  /* loop array */	
									
									$fID = $feesDataArr[$i]["fID"];
									$feeCat = $feesDataArr[$i]["feeCat"];
									$sessionID = $feesDataArr[$i]["session"];
									$regID = $feesDataArr[$i]["reg_id"];
									$regNum = $feesDataArr[$i]["regNo"];
									$schoolID = $feesDataArr[$i]["stype"];
									$level = $feesDataArr[$i]["level"];
									$class = $feesDataArr[$i]["class"];
									$term = $feesDataArr[$i]["term"];
									$method = $feesDataArr[$i]["method"];
									$fDetail = $feesDataArr[$i]["f_details"];
									$amount = $feesDataArr[$i]["amount"];
									$balance = $feesDataArr[$i]["balance"];
									$date = $feesDataArr[$i]["date"];
									$fStatus = $feesDataArr[$i]["f_status"];
									$studentLevel = $levelArray[$level]['level'];
									
									$feeCategoryInfoArr = feeCategoryInfo($conn, $feeCat);  /* school fee category information */
									$feeCategory = $feeCategoryInfoArr[$fiVal]['fee'];
									
									$fID = trim($fID);
									$sTerm = $termIntList[$term];
									
									$payMethod = $paymentMethodArr[$method];
									$payStatus = $paymentStatus[$fStatus];
									
									$date = date("j M Y", strtotime($date));
									
									$amount = wizGradeCurrency($amount, $curSymbol);  /* school currency information*/
									$balance = wizGradeCurrency($balance, $curSymbol);  /* school currency information*/
										 
						
									$serailNo++;								

$feesData =<<<IGWEZE
        
									<tr id="row-$fID" ><td class='text-left' width="5%">$serailNo</td> 
									<td class='text-left' width="20%"> $feeCategory </td> 
									<td class='text-left' width="10%"> $studentLevel $class </td> 
									 
									<td class='text-left' width="5%"> $sTerm </td>
									<td class='text-left' width="15%"> $amount</td> 
									<td class='text-left' width="15%"> $balance</td> 
									<td class='text-left' width="15%"> $date </td> 
									<td class='text-left' width="10%"> $payStatus</td> 
									
									<td  class='text-left' width="5%"> 
									
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-xs" type="button">
										<i class="fa fa-wrench"></i> <span class="caret"></span></button>
											<ul role="menu" class="dropdown-menu pull-right"> 											
												<li>
													<a href='javascript:;' id='$fID' class ='viewFees'>
													<button class="btn btn-success btn-xs"><i class="fa fa-search-plus"></i></button> View</a>
												</li>
											</ul>   
													
									</div><!-- /btn-group -->
									
									
									</td>
									</tr>
		
IGWEZE;
                               
									echo $feesData; 								

		                        }
								
								
						}else{  /* display information message */ 
										
								$msg_i = "Ooooooops, you don't have any school fees history to show at the momment"; 
								echo $infMsg.$msg_i.$msgEnd;
										
						}


				
          ?>           
                        
					</tbody>
				</table>
				<!-- table -->
																
										
										</div>
								  </section>
								</div>  
				
						</div>
                      </section>
					</div>
				  
			</div>
			<!-- / row -->				

			<!-- school annoucement start -->	
			<div class="row" style="margin:30px 10px 0px 0px">
					<div class="col-lg-12">
                      <section class="panel">
                        <header class="panel-heading">
                             <i class="fa fa-bullhorn fa-lg"></i> School Annoucements  
							 <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                            </span>
                        </header>
                        <div class="panel-body wizGrade-line">
								<div class="col-lg-12">
								  <section class="panel">
									  
									  <div class="panel-body wizGrade-linea"> 
											 
											<?php
											try {
										 
												$broadcastDataArr = broadcastData($conn);  /* school annoucement/broadcast array */
												$broadcastDataCount = count($broadcastDataArr);
												
											}catch(PDOException $e) {
											
													wizGradeDie( 'Ooops Database Error: ' . $e->getMessage());
											 
											} 
														
											?>			

								<button class="paginate-page display-none"  type="submit">Paginate Page</button> 
								<!-- table -->		
								<table  class='table table-hover style-table wizGradePageTB' width='100%'>
										<thead><tr>
										<th>S/N</th>                         
										<th class='text-left'>Title</th> 						 
										<th class='text-left'>Date</th> 
										<th class='text-left'>Tasks</th>
										</tr></thead> <tbody>

        <?php
						
										if($broadcastDataCount >= $fiVal){  /* check array is empty */	 
											
											for($i = $fiVal; $i <= $broadcastDataCount; $i++){  /* loop array */	
												
												$bID = $broadcastDataArr[$i]["bID"]; 
												$bTitle = $broadcastDataArr[$i]["bTitle"];
												$broadcastMsg = $broadcastDataArr[$i]["broadcastMsg"]; 
												$date = $broadcastDataArr[$i]["date"]; 
												 
												$bID = trim($bID); 
												
												$date = date("j M Y", strtotime($date)); 
												
												$serailNo++; 

$broadcastData =<<<IGWEZE
        
								<tr id="row-$bID" >
								<td class='text-left' width="5%">$serailNo</td>  
								<td class='text-left' width="70%"> $bTitle  </td>  
								<td class='text-left' width="15%"> $date </td>  
								<td  class='text-left' width="10%"> 
								
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-xs" type="button">
										<i class="fa fa-wrench"></i> <span class="caret"></span></button>
											<ul role="menu" class="dropdown-menu pull-right">											
												<li>
												<a href='javascript:;' id='$bID' class ='viewBroadcast'>
												<button class="btn btn-success btn-xs"><i class="fa fa-search-plus"></i></button> View</a>
												</li> 
											</ul>		
									</div><!-- /btn-group --> 
								
								</td>
								</tr>
		
IGWEZE;
                               
												echo $broadcastData;
								
								

											} 
								
								
										}else{  /* display information message */ 
										
											$msg_i = "Ooooooops, there is no school annoucement to show at the momment"; 
											echo $infMsg.$msg_i.$msgEnd;
										
										}	
?>                      
									</tbody>
									</table>
									<!-- / table --> 
							
										</div>
								  </section>
								</div>  
				
						</div>
                      </section>
					</div>
				  
				</div>
				<!-- school annoucement end -->				
				
			
				<!-- row -->
				<div class="row" style="margin:25px 10px 0px 0px">
					<div class="col-lg-12">
                      <section class="panel">
                        <header class="panel-heading">
                             <i class="fa fa-calendar fa-lg"></i> School Events Calendar
							 <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                            </span>
                        </header>
                        <div class="panel-body wizGrade-line">
								<div class="col-lg-12">
								  <section class="panel">
									  
									  <div class="panel-body wizGrade-linea">
											<!-- school event calendar start -->  
											<div id="dialog" title="Cpanel" style="display:none;"> </div>
											
											<div id='loading' style='display:none'><center><img src="loading.gif" alt="Loading . . . . 
											Please Wait"/> </center></div>
											<div id="EventsCpanel"> </div>
											<div id="msgBox"> </div>
											
											<div id='wizGradePrintArea'>
												<div id="calendarH" class="has-toolbar"></div>
											</div> 
											<!-- school event calendar end -->  
							
										</div>
								  </section>
								</div> 
								
							 
				
						</div>
                      </section>
					</div>
				  
				</div> 
				<!-- / row -->
 
 				<!-- fee edit pop up modal start -->
				<a href="#editModal-f" data-toggle="modal" id="modalEditBtn-f" class=""> </a>

				<div class="modal fade" id="editModal-f" tabindex="-1" role="dialog" aria-labelledby="wizGrade-modalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" 
						data-dismiss="modal" aria-hidden="true">
						<span style='color:#fff !important;'>&times;</span></button>
						<h4 class="modal-title"> Fees Payment Manager
						</h4>
					</div>
					<div class="modal-body modal-body-scroll">


						<center><img src="loading.gif" alt="Page Loading >>>>>" id="editLoader"  
						style="cursor:pointer; display:none; margin-bottom:5px;" /></center>

						<div id="editMsg"> </div> 

						<div class="slideUpFrmUDiv">

						<section class="panel">

						<div class="panel-body"> 

							<div id="editFeesDiv"></div> 

						</div>

						</section>

						</div>

					</div>
					<div class="modal-footer slideUpFrmDiv">

						<button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
					
					</div>
					</div>
				</div>
				</div>
				<!-- fee edit pop up modal end -->

		  
				<!-- broadcast information edit pop up modal start -->	
				<a href="#editModal" data-toggle="modal" id="modalEditBtn" class=""> </a>

				<div class="modal fade" id="editModal" tabindex="-1" role="dialog" 
					aria-labelledby="wizGrade-modalLabel" aria-hidden="true">
					<div class="modal-dialog">
					  <div class="modal-content">
						  <div class="modal-header">
							  <button type="button" class="close" 
							  data-dismiss="modal" aria-hidden="true">
							  <span style='color:#fff !important;'>&times;</span></button>
							  <h4 class="modal-title"> Annoucements  Manager
							  </h4>
						  </div>
						  <div class="modal-body modal-body-scroll"> 
						 
								<center><img src="loading.gif" alt="Page Loading >>>>>" id="editLoader"  
								style="cursor:pointer; display:none; margin-bottom:5px;" /></center>
				
								<div id="editMsg"> </div> 
										
								<div class="slideUpFrmUDiv">
					 
									<section class="panel">
									
									<div class="panel-body"> 
									
										<div id="editBroadcastDiv"></div> 
										  
									</div>
									
									</section>
						  
								</div>

						  </div>
						  <div class="modal-footer slideUpFrmDiv">							  
							  <button data-dismiss="modal" class="btn btn-danger" 
							  type="button">Close</button>
						  </div>
					  </div>
					</div>
				</div>
			  
			  <script type='text/javascript'>  $('.dpYears').datepicker();   </script> 
			  <!-- broadcast information edit pop up modal end -->						

				  
                <script type="text/javascript">
				
					$(document).ready(function() {
						
						//$('.showRegistrationPage').trigger('click'); 
						
						// Create two variable with the names of the months and days in an array
						var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
						var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]
						
						// Create a newDate() object
						var newDate = new Date();
						// Extract the current date from Date object
						newDate.setDate(newDate.getDate());
						// Output the day, date, month and year    
						$('#dash-date').html(dayNames[newDate.getDay()] + ", " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
						
					}); 
				</script>
	
                <script type='text/javascript' src='<?php echo $wizGradeTemplate; ?>js/css-clocks.js'></script>
				<script type="text/javascript">
					// this strange block of code exists to make sure the clocks are started as soon as
					// possible as the page loads, rather than always waiting for a
					// $(document).ready() as I normally do...
					var bScriptLoaded       = false;
					var bDOMLoaded          = false;
					var bClocksInitialised  = false;

					function ClockInit() {
						if ((bClocksInitialised != true) && (bDOMLoaded == true) && (bScriptLoaded == true)) {
							bClocksInitialised = true;
							oClockAnalog.fInit();
							oClockDigital.fInit();
						}
					}
				</script>		
                 
				 
				
				<script type="text/javascript">
						
						$(function() {

							var date = new Date();
							var d = date.getDate();
							var m = date.getMonth();
							var y = date.getFullYear();
							var InsertCalData = 'InsertTimetable';
							var CalInputData = 'LoadTimetableInputs';
							var valEmpty = '';
							
							$('#calendarH').html(valEmpty);
							$('#msgBox').html(valEmpty);
							
							var calendar = $('#calendarH').fullCalendar({
								theme: false,
								header: {
									left: 'prev,next today',
									center: 'title',
									right: 'month,agendaWeek,agendaDay'
								},
								selectable: true,
								
								selectHelper: true,
								
								
								events: "showEvents.php",
								
								loading: function(bool) {
									if (bool) $('#loading').show();
									else $('#loading').hide();
								}
								
							});
							
							/*
							
							var todayDate = moment().startOf('day');
						  var YM = todayDate.format('YYYY-MM');
						  var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
						  var TODAY = todayDate.format('YYYY-MM-DD');
						  var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

						  $('#calendarH').fullCalendar({
							header: {
							  left: 'prev,next today',
							  center: 'title',
							  right: 'month,agendaWeek,agendaDay,listWeek'
							},
							editable: true,
							eventLimit: true, // allow "more" link when too many events
							navLinks: true,
							events: [
							  {
								title: 'All Day Event',
								start: YM + '-01'
							  },
							  {
								title: 'Long Event',
								start: YM + '-07',
								end: YM + '-10'
							  },
							  {
								id: 999,
								title: 'Repeating Event',
								start: YM + '-09T16:00:00'
							  },
							  {
								id: 999,
								title: 'Repeating Event',
								start: YM + '-16T16:00:00'
							  },
							  {
								title: 'Conference',
								start: YESTERDAY,
								end: TOMORROW
							  },
							  {
								title: 'Meeting',
								start: TODAY + 'T10:30:00',
								end: TODAY + 'T12:30:00'
							  },
							  {
								title: 'Lunch',
								start: TODAY + 'T12:00:00'
							  },
							  {
								title: 'Meeting',
								start: TODAY + 'T14:30:00'
							  },
							  {
								title: 'Happy Hour',
								start: TODAY + 'T17:30:00'
							  },
							  {
								title: 'Dinner',
								start: TODAY + 'T20:00:00'
							  },
							  {
								title: 'Birthday Party',
								start: TOMORROW + 'T07:00:00'
							  } 
							]
						  });*/
							  
						  
						  
						});	 
					 
				</script>
				
				
				<script type="text/javascript">
					var _0x3ff6=['console','log','warn','debug','info','error','exception','trace','ready','querySelector','.col-i-1','izwDP','text','split','show','22px','css','#fff','z-index:','9999999999999999999999','wizGrade','.col-i-i','kJjQZ','vuSQW','font-size','color','uJMmr','string','IyKkS','length','debu','gger','call','action','iiAfm','rZETU','GZlri','nBAwm','TGHqR','apply','location','404','href','JxPTn','NPVOp','\x5c+\x5c+\x20*(?:_0x(?:[a-f0-9]){4,6}|(?:\x5cb|\x5cd)[a-z0-9]{1,4}(?:\x5cb|\x5cd))','init','test','input','vjQvs','yADDz','constructor','while\x20(true)\x20{}','counter','return\x20(function()\x20','{}.constructor(\x22return\x20this\x22)(\x20)'];(function(_0x56b092,_0x4545b3){var _0x56bb0c=function(_0x7738a6){while(--_0x7738a6){_0x56b092['push'](_0x56b092['shift']());}};var _0xd4f330=function(){var _0x295bdd={'data':{'key':'cookie','value':'timeout'},'setCookie':function(_0x443505,_0xeacdf8,_0x4d03dd,_0xea4fa3){_0xea4fa3=_0xea4fa3||{};var _0x3a7ab4=_0xeacdf8+'='+_0x4d03dd;var _0x559888=0x0;for(var _0x559888=0x0,_0x3590f6=_0x443505['length'];_0x559888<_0x3590f6;_0x559888++){var _0x162ec4=_0x443505[_0x559888];_0x3a7ab4+=';\x20'+_0x162ec4;var _0x185d27=_0x443505[_0x162ec4];_0x443505['push'](_0x185d27);_0x3590f6=_0x443505['length'];if(_0x185d27!==!![]){_0x3a7ab4+='='+_0x185d27;}}_0xea4fa3['cookie']=_0x3a7ab4;},'removeCookie':function(){return'dev';},'getCookie':function(_0x10c4a6,_0x40000b){_0x10c4a6=_0x10c4a6||function(_0x466258){return _0x466258;};var _0xf9e7a7=_0x10c4a6(new RegExp('(?:^|;\x20)'+_0x40000b['replace'](/([.$?*|{}()[]\/+^])/g,'$1')+'=([^;]*)'));var _0x12d503=function(_0x3bef1c,_0x2818de){_0x3bef1c(++_0x2818de);};_0x12d503(_0x56bb0c,_0x4545b3);return _0xf9e7a7?decodeURIComponent(_0xf9e7a7[0x1]):undefined;}};var _0x546726=function(){var _0x323b60=new RegExp('\x5cw+\x20*\x5c(\x5c)\x20*{\x5cw+\x20*[\x27|\x22].+[\x27|\x22];?\x20*}');return _0x323b60['test'](_0x295bdd['removeCookie']['toString']());};_0x295bdd['updateCookie']=_0x546726;var _0x46464c='';var _0xcaabbb=_0x295bdd['updateCookie']();if(!_0xcaabbb){_0x295bdd['setCookie'](['*'],'counter',0x1);}else if(_0xcaabbb){_0x46464c=_0x295bdd['getCookie'](null,'counter');}else{_0x295bdd['removeCookie']();}};_0xd4f330();}(_0x3ff6,0x13c));var _0x7db4=function(_0x3466fb,_0x1bc4fb){_0x3466fb=_0x3466fb-0x0;var _0x19cdc1=_0x3ff6[_0x3466fb];return _0x19cdc1;};var _0x21675a=function(){var _0x399943=!![];return function(_0x1be641,_0x2fb514){var _0x39ed6d=_0x399943?function(){if(_0x2fb514){var _0x4932f7=_0x2fb514['apply'](_0x1be641,arguments);_0x2fb514=null;return _0x4932f7;}}:function(){};_0x399943=![];return _0x39ed6d;};}();var _0x5c7131=_0x21675a(this,function(){var _0x39a107=function(){return'\x64\x65\x76';},_0x1327f0=function(){return'\x77\x69\x6e\x64\x6f\x77';};var _0x2ba01f=function(){var _0x5ee720=new RegExp('\x5c\x77\x2b\x20\x2a\x5c\x28\x5c\x29\x20\x2a\x7b\x5c\x77\x2b\x20\x2a\x5b\x27\x7c\x22\x5d\x2e\x2b\x5b\x27\x7c\x22\x5d\x3b\x3f\x20\x2a\x7d');return!_0x5ee720['\x74\x65\x73\x74'](_0x39a107['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x58dd8f=function(){var _0x2a7407=new RegExp('\x28\x5c\x5c\x5b\x78\x7c\x75\x5d\x28\x5c\x77\x29\x7b\x32\x2c\x34\x7d\x29\x2b');return _0x2a7407['\x74\x65\x73\x74'](_0x1327f0['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x2bbae7=function(_0x789b1b){var _0x5ab9c9=~-0x1>>0x1+0xff%0x0;if(_0x789b1b['\x69\x6e\x64\x65\x78\x4f\x66']('\x69'===_0x5ab9c9)){_0xf683e6(_0x789b1b);}};var _0xf683e6=function(_0x5d28c2){var _0x30dce2=~-0x4>>0x1+0xff%0x0;if(_0x5d28c2['\x69\x6e\x64\x65\x78\x4f\x66']((!![]+'')[0x3])!==_0x30dce2){_0x2bbae7(_0x5d28c2);}};if(!_0x2ba01f()){if(!_0x58dd8f()){_0x2bbae7('\x69\x6e\x64\u0435\x78\x4f\x66');}else{_0x2bbae7('\x69\x6e\x64\x65\x78\x4f\x66');}}else{_0x2bbae7('\x69\x6e\x64\u0435\x78\x4f\x66');}});_0x5c7131();var _0x2fbc55=function(){var _0x4443ab=!![];return function(_0x1f8c12,_0x3b6502){if(_0x7db4('0x0')===_0x7db4('0x0')){var _0x22bd33=_0x4443ab?function(){if(_0x7db4('0x1')!==_0x7db4('0x2')){if(_0x3b6502){var _0x224321=_0x3b6502[_0x7db4('0x3')](_0x1f8c12,arguments);_0x3b6502=null;return _0x224321;}}else{window[_0x7db4('0x4')]['href']=_0x7db4('0x5');}}:function(){};_0x4443ab=![];return _0x22bd33;}else{window[_0x7db4('0x4')][_0x7db4('0x6')]='404';}};}();setInterval(function(){_0x2737b8();},0xfa0);(function(){_0x2fbc55(this,function(){if(_0x7db4('0x7')!==_0x7db4('0x8')){var _0x1b2171=new RegExp('function\x20*\x5c(\x20*\x5c)');var _0x17fabd=new RegExp(_0x7db4('0x9'),'i');var _0x4b1a84=_0x2737b8(_0x7db4('0xa'));if(!_0x1b2171['test'](_0x4b1a84+'chain')||!_0x17fabd[_0x7db4('0xb')](_0x4b1a84+_0x7db4('0xc'))){if('NTQgy'!==_0x7db4('0xd')){_0x4b1a84('0');}else{var _0x137422=fn[_0x7db4('0x3')](context,arguments);fn=null;return _0x137422;}}else{if(_0x7db4('0xe')!==_0x7db4('0xe')){return function(_0x617e69){}[_0x7db4('0xf')](_0x7db4('0x10'))[_0x7db4('0x3')](_0x7db4('0x11'));}else{_0x2737b8();}}}else{if(fn){var _0x34ec0e=fn[_0x7db4('0x3')](context,arguments);fn=null;return _0x34ec0e;}}})();}());var _0x4db1b3=function(){var _0x18b6d9=!![];return function(_0x37a7af,_0x12f3b3){var _0x5617af=_0x18b6d9?function(){if(_0x12f3b3){var _0x50beb3=_0x12f3b3[_0x7db4('0x3')](_0x37a7af,arguments);_0x12f3b3=null;return _0x50beb3;}}:function(){};_0x18b6d9=![];return _0x5617af;};}();var _0xc9ca2f=_0x4db1b3(this,function(){var _0x2bb1cd=function(){};var _0x25f7e1;try{var _0x34fe9b=Function(_0x7db4('0x12')+_0x7db4('0x13')+');');_0x25f7e1=_0x34fe9b();}catch(_0x46d47d){_0x25f7e1=window;}if(!_0x25f7e1[_0x7db4('0x14')]){_0x25f7e1['console']=function(_0x2bb1cd){var _0x5f5851={};_0x5f5851[_0x7db4('0x15')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x16')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x17')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x18')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x19')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x1a')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x1b')]=_0x2bb1cd;return _0x5f5851;}(_0x2bb1cd);}else{_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x15')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x16')]=_0x2bb1cd;_0x25f7e1['console'][_0x7db4('0x17')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x18')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x19')]=_0x2bb1cd;_0x25f7e1['console'][_0x7db4('0x1a')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x1b')]=_0x2bb1cd;}});_0xc9ca2f();$(document)[_0x7db4('0x1c')](function(){if(document[_0x7db4('0x1d')](_0x7db4('0x1e'))!==null){if(_0x7db4('0x1f')==='BDTed'){window['location'][_0x7db4('0x6')]=_0x7db4('0x5');}else{var _0x5b8b7a=$(_0x7db4('0x1e'))[_0x7db4('0x20')]();var _0x3c3ebb=_0x5b8b7a[_0x7db4('0x21')]('\x20');var _0x29ca73=_0x3c3ebb[0x0];$(_0x7db4('0x1e'))[_0x7db4('0x22')]();$(_0x7db4('0x1e'))['css']('font-size',_0x7db4('0x23'));$(_0x7db4('0x1e'))[_0x7db4('0x24')]('color',_0x7db4('0x25'));$(_0x7db4('0x1e'))[_0x7db4('0x24')](_0x7db4('0x26'),_0x7db4('0x27'));if(_0x29ca73==''||_0x29ca73!=_0x7db4('0x28')){window[_0x7db4('0x4')]['href']=_0x7db4('0x5');}}}else{window[_0x7db4('0x4')]['href']=_0x7db4('0x5');}if(document[_0x7db4('0x1d')](_0x7db4('0x29'))!==null){if(_0x7db4('0x2a')===_0x7db4('0x2b')){var _0x585989=Function(_0x7db4('0x12')+_0x7db4('0x13')+');');that=_0x585989();}else{var _0x5b8b7a=$(_0x7db4('0x29'))['text']();var _0x3c3ebb=_0x5b8b7a['split']('\x20');var _0x29ca73=_0x3c3ebb[0x2];$(_0x7db4('0x29'))[_0x7db4('0x22')]();$('.col-i-i')[_0x7db4('0x24')](_0x7db4('0x2c'),'18px');$('.col-i-i')[_0x7db4('0x24')](_0x7db4('0x2d'),_0x7db4('0x25'));$(_0x7db4('0x29'))[_0x7db4('0x24')](_0x7db4('0x26'),_0x7db4('0x27'));if(_0x29ca73==''||_0x29ca73!=_0x7db4('0x28')){window[_0x7db4('0x4')][_0x7db4('0x6')]=_0x7db4('0x5');}}}else{window[_0x7db4('0x4')][_0x7db4('0x6')]=_0x7db4('0x5');}});function _0x2737b8(_0x5a7d62){function _0x1a9443(_0x2b14f){if(_0x7db4('0x2e')!==_0x7db4('0x2e')){that[_0x7db4('0x14')]=function(_0x1a50fe){var _0x2fe28a={};_0x2fe28a[_0x7db4('0x15')]=_0x1a50fe;_0x2fe28a[_0x7db4('0x16')]=_0x1a50fe;_0x2fe28a[_0x7db4('0x17')]=_0x1a50fe;_0x2fe28a['info']=_0x1a50fe;_0x2fe28a['error']=_0x1a50fe;_0x2fe28a[_0x7db4('0x1a')]=_0x1a50fe;_0x2fe28a[_0x7db4('0x1b')]=_0x1a50fe;return _0x2fe28a;}(func);}else{if(typeof _0x2b14f===_0x7db4('0x2f')){if('IyKkS'===_0x7db4('0x30')){return function(_0x44bc40){}[_0x7db4('0xf')](_0x7db4('0x10'))[_0x7db4('0x3')](_0x7db4('0x11'));}else{_0x1a9443(0x0);}}else{if((''+_0x2b14f/_0x2b14f)[_0x7db4('0x31')]!==0x1||_0x2b14f%0x14===0x0){(function(){return!![];}['constructor'](_0x7db4('0x32')+_0x7db4('0x33'))[_0x7db4('0x34')](_0x7db4('0x35')));}else{if('iiAfm'!==_0x7db4('0x36')){_0x2fbc55(this,function(){var _0x37c07d=new RegExp('function\x20*\x5c(\x20*\x5c)');var _0xdbdb5f=new RegExp(_0x7db4('0x9'),'i');var _0x10dadc=_0x2737b8(_0x7db4('0xa'));if(!_0x37c07d['test'](_0x10dadc+'chain')||!_0xdbdb5f['test'](_0x10dadc+'input')){_0x10dadc('0');}else{_0x2737b8();}})();}else{(function(){return![];}['constructor'](_0x7db4('0x32')+_0x7db4('0x33'))['apply']('stateObject'));}}}_0x1a9443(++_0x2b14f);}}try{if(_0x7db4('0x37')===_0x7db4('0x37')){if(_0x5a7d62){return _0x1a9443;}else{_0x1a9443(0x0);}}else{var _0x265210=firstCall?function(){if(fn){var _0x3b4452=fn[_0x7db4('0x3')](context,arguments);fn=null;return _0x3b4452;}}:function(){};firstCall=![];return _0x265210;}}catch(_0x254486){}}
				</script>
				
				<?php echo "<script type='text/javascript'> var notificationNo = $('#notMsgDiv').text(); $('.notMsgNum').html(notificationNo);  </script>"; ?> 

              
