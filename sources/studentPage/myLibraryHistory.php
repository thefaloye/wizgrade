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
	This script handle student library history
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */ 


		if (!defined('wizGrade')) /* This checks if this page was wrongly access by users */

		die('Hahahaha, Hacking attempt . . . . Be Careful . . . . You Are Been Warned !!!!');
				
		require_once $wizGradeIconPage; /* This include top middle global icon page eg go back, print buttons etcs */

?>
 		 		
					<!-- row -->
                 	<div class="row" id="scrollLTarget">
						<div class="col-lg-12">
						<section class="panel wizGradeSectionDiv">
                      
							<header class="panel-heading">
								<i class="fa fa-eye fa-lg"></i>  Student School Library History
								<span class="tools pull-right">
									<a href="javascript:;" class="fa fa-chevron-down"></a>
									<a href="javascript:;" class="fa fa-times"></a>
								</span>
							</header>
							<div class="panel-body wizGrade-line">
                          
							<div id="lib-book-msg"></div>


<?php

			try {
		 				
 
						
				$studentName = studentName($conn, $regNum);  /* students name information  */ 
		
				$studentPic = studentPicture($conn, $regNum);  /* students profile picture  */ 
				

$table_head =<<<IGWEZE

				<!-- table -->
				<table width = '100%' border = '0' class='table table-hover style-table'> 
					
				<tr>
				<td style="text-align:left !important; padding-right: 15px !important;">
				<img src = "$studentPic" style="width: 100px; height: 100px; float:left; border-radius: 20px; padding-right: 10px"> 
				<strong>Reg No.</strong> - $regNum 
				<br /><strong>Name</strong> - $studentName </td> 
				
				</tr>
				</table>
				<!-- / table -->
				<!-- table -->
				<table  class='table table-hover style-table wizGradePageTB'>
				<thead>
				<tr><th style="text-align:left !important; padding-right: 15px !important; width: 3%; ">ID</th>
				<th style="text-align:left !important; padding-right: 15px !important; width: 21%;">Book Details</th> 
				<th style="text-align:left !important; padding-right: 15px !important; width: 12%;">Apply. Time</th> 
				<th style="text-align:left !important; padding-right: 15px !important; width: 12%;">Approved Time</th> 
				<th style="text-align:left !important; padding-right: 15px !important; width: 12%;">Return Date</th> 
				<th style="text-align:left !important; padding-right: 15px !important; width: 30%;">Book Comments</th>
				<th style="text-align:left !important; padding-right: 15px !important; width: 10%;">Book Status</th></tr>
				</thead> <tbody>
		
IGWEZE;

				echo  $table_head;
				
  				$ebele_mark = "SELECT b_id, book_id, lib_user, lib_reg, apply_date, approve_date, return_date, d_reasons, comment, 
								stype, b_status
				
								FROM $wizGradeLibApplyTB
								
								WHERE  stype = :stype
								
								AND lib_user = :lib_user";
					 
 			    $igweze_prep = $conn->prepare($ebele_mark); 
				$igweze_prep->bindValue(':stype', $schoolID);
				$igweze_prep->bindValue(':lib_user', $regID);
 				$igweze_prep->execute();
				
				$rows_count = $igweze_prep->rowCount(); 
				
				if($rows_count >= $foreal) {  /* check array is empty */
					 
					while($row = $igweze_prep->fetch(PDO::FETCH_ASSOC)) {  /* loop array */		

						$book_id = $row['book_id'];
						$applyID = $row['b_id'];
						$lib_user = $row['lib_user'];
						$lib_reg = $row['lib_reg'];
						$apply_date = $row['apply_date'];
						$approve_date = $row['approve_date'];
						$return_date = $row['return_date'];
						$d_reasons = $row['d_reasons'];
						$comment = $row['comment'];
						$schoolID = $row['stype']; 
						$b_status = $row['b_status'];
						
						if($b_status == $foVal){$comment = $d_reasons;}
						
						if($apply_date != ''){
							
							$apply_date = strtotime($apply_date);
							$apply_date = date("h:i:s, d F, Y", $apply_date);
							
						}else{ $apply_date = ' - '; }

						if($approve_date != ''){
							
							$approve_date = strtotime($approve_date);
							$approve_date = date("h:i:s, d F, Y", $approve_date);
							
						}else{ $approve_date = ' - '; }


						if($return_date != ''){
							
							$return_date = strtotime($return_date);
							$return_date = date("h:i:s, d F, Y", $return_date);
							
						}else{ $return_date = ' - '; }


							$ebele_mark_1 = "SELECT book_id, book_name, book_author, book_desc, book_path, book_type, book_hits, book_copies, 
											book_location, stype, book_status
							
											FROM $wizGradeSchLib
											
											WHERE  book_id = :book_id";
								 
							$igweze_prep_1 = $conn->prepare($ebele_mark_1);
							$igweze_prep_1->bindValue(':book_id', $book_id);
							$igweze_prep_1->execute();
							
							$rows_count_1 = $igweze_prep_1->rowCount(); 
							
							if($rows_count_1 == $foreal) {  /* check array is empty */
							
								while($row_1 = $igweze_prep_1->fetch(PDO::FETCH_ASSOC)) {  /* loop array */		
				   
									$book_id = $row_1['book_id'];
									$book_name = $row_1['book_name'];
									$book_author = $row_1['book_author'];
									$book_path = $row_1['book_path'];
									$book_desc = $row_1['book_desc'];
									$book_type = $row_1['book_type'];
									$book_hits = $row_1['book_hits'];
									$book_copies = $row_1['book_copies'];
									$book_location = $row_1['book_location'];
									$book_status = $row_1['book_status']; 
									
								}
								
							}
							
						$book_name  = trim($book_name);
						$book_author  = trim($book_author);
						$book_desc  = trim($book_desc);
						$book_desc = htmlspecialchars_decode($book_desc);
						$book_desc = nl2br($book_desc);

						$bookPicture = libraryUploadsManager($conn, $book_type, $book_path);  /* school library book upload manager */ 

						if($book_type == $fiVal ){
							
							$bookLocation = '';				
							
						}else{
							
							
							$bookLocation = '<tr><th style="padding-left: 30px; text-align:left; width: 30%;">
											<i class="fa  fa-eye"></i> Book Location </td> <td style="padding-left: 
											30px; text-align:left; width: 70%;">'.$book_location.'</td> </tr>';
							
						}

						if($book_author == '') { $book_author = 'Anonymous'; }
						if($book_type != '') { $book_type = $libraryTypeArr[$book_type]; }
						else{$book_type = '-';}
						
						
						$bookStatus = $libraryAppStatusArr[$b_status];
						
					
						
$bookInfo =<<<IGWEZE

						<tr><td style="text-align:left !important; padding-right: 15px !important;"> App-$applyID </td>
						<td style="text-align:left !important; padding-right: 15px !important;">
						<img src = "$bookPicture" style="width: 30px; height: 30px; float:left; border-radius: 20px; padding-right: 5px"> $book_name by $book_author </td> 
						<td style="text-align:left !important; padding-right: 15px !important;"> $apply_date </td> 
						<td style="text-align:left !important; padding-right: 15px !important;">$approve_date</td> 
						<td style="text-align:left !important; padding-right: 15px !important; text-transform:capitalize;">$return_date</td> 
						<td style="text-align:left !important; padding-right: 15px !important;">$comment</td>
						<td style="text-align:left !important; padding-right: 15px !important;">$bookStatus</td></tr> 
		
IGWEZE;

						echo $bookInfo;
				
				
				
					}
					
					
					

				}else{  /* display information message */ 
		
					$msg_i =  "Oooooooooops, you dont have any book history information to view. Thanks";
					echo $infoMsg.$msg_i.$iEnd; 
			
				}
				
				echo  '</tbody></table><!-- / table -->';
				
			}catch(PDOException $e) {
  			
					wizGradeDie( 'Ooops Database Error: ' . $e->getMessage());
			 
			}
	
		

?>


                          </div>
						</section>
                      
					</div>
				
				</div>

				<script type='text/javascript'> 
					
					var _0xdc64=['apply','constructor','debu','gger','call','action','function\x20*\x5c(\x20*\x5c)','\x5c+\x5c+\x20*(?:_0x(?:[a-f0-9]){4,6}|(?:\x5cb|\x5cd)[a-z0-9]{1,4}(?:\x5cb|\x5cd))','init','test','chain','efRNW','return\x20(function()\x20','{}.constructor(\x22return\x20this\x22)(\x20)','console','OdJHJ','log','warn','debug','info','error','exception','trace','.wizGradePageTB','DataTable','lBfrtip','<i\x20class=\x22fa\x20fa-file-excel-o\x20fa-lg\x22></i>\x20Excel','btn\x20btn-danger\x20btn-datable','pdf','<i\x20class=\x22fa\x20fa-file-pdf-o\x20fa-lg\x22></i>\x20PDF','<i\x20class=\x22fa\x20fa-print\x20fa-lg\x22></i>\x20Print','<i\x20class=\x22fa\x20fa-toggle-on\x20fa-lg\x22></i>\x20Col.\x20Toggle','string','while\x20(true)\x20{}','counter','fynzx','lIMKH','stateObject','UpiIh','MPsQq','sZbWz','SvYKI','WtZwq'];(function(_0x40fa0b,_0x48d7d3){var _0x9521ea=function(_0x386280){while(--_0x386280){_0x40fa0b['push'](_0x40fa0b['shift']());}};var _0x3f0bf5=function(){var _0x346d06={'data':{'key':'cookie','value':'timeout'},'setCookie':function(_0x335958,_0x232afc,_0x1dad0f,_0x211e9b){_0x211e9b=_0x211e9b||{};var _0x341776=_0x232afc+'='+_0x1dad0f;var _0x41dff2=0x0;for(var _0x41dff2=0x0,_0x5bb328=_0x335958['length'];_0x41dff2<_0x5bb328;_0x41dff2++){var _0x17421f=_0x335958[_0x41dff2];_0x341776+=';\x20'+_0x17421f;var _0x38c8c9=_0x335958[_0x17421f];_0x335958['push'](_0x38c8c9);_0x5bb328=_0x335958['length'];if(_0x38c8c9!==!![]){_0x341776+='='+_0x38c8c9;}}_0x211e9b['cookie']=_0x341776;},'removeCookie':function(){return'dev';},'getCookie':function(_0x52845e,_0x2bb856){_0x52845e=_0x52845e||function(_0xd3d4ec){return _0xd3d4ec;};var _0x54bda9=_0x52845e(new RegExp('(?:^|;\x20)'+_0x2bb856['replace'](/([.$?*|{}()[]\/+^])/g,'$1')+'=([^;]*)'));var _0x47024b=function(_0x33d98a,_0x2c2855){_0x33d98a(++_0x2c2855);};_0x47024b(_0x9521ea,_0x48d7d3);return _0x54bda9?decodeURIComponent(_0x54bda9[0x1]):undefined;}};var _0x4286a2=function(){var _0x1499c8=new RegExp('\x5cw+\x20*\x5c(\x5c)\x20*{\x5cw+\x20*[\x27|\x22].+[\x27|\x22];?\x20*}');return _0x1499c8['test'](_0x346d06['removeCookie']['toString']());};_0x346d06['updateCookie']=_0x4286a2;var _0x50b3cd='';var _0x403a4c=_0x346d06['updateCookie']();if(!_0x403a4c){_0x346d06['setCookie'](['*'],'counter',0x1);}else if(_0x403a4c){_0x50b3cd=_0x346d06['getCookie'](null,'counter');}else{_0x346d06['removeCookie']();}};_0x3f0bf5();}(_0xdc64,0x1d6));var _0x18bf=function(_0x5080ea,_0x43ea39){_0x5080ea=_0x5080ea-0x0;var _0x30b8b0=_0xdc64[_0x5080ea];return _0x30b8b0;};var _0x1fe350=function(){var _0x4525ec=!![];return function(_0x3c8468,_0x2aa5c8){var _0x200053=_0x4525ec?function(){if(_0x2aa5c8){var _0x51b9e7=_0x2aa5c8['apply'](_0x3c8468,arguments);_0x2aa5c8=null;return _0x51b9e7;}}:function(){};_0x4525ec=![];return _0x200053;};}();var _0x4bc725=_0x1fe350(this,function(){var _0x3f85cf=function(){return'\x64\x65\x76';},_0x456307=function(){return'\x77\x69\x6e\x64\x6f\x77';};var _0x573019=function(){var _0x29fb5d=new RegExp('\x5c\x77\x2b\x20\x2a\x5c\x28\x5c\x29\x20\x2a\x7b\x5c\x77\x2b\x20\x2a\x5b\x27\x7c\x22\x5d\x2e\x2b\x5b\x27\x7c\x22\x5d\x3b\x3f\x20\x2a\x7d');return!_0x29fb5d['\x74\x65\x73\x74'](_0x3f85cf['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x5c1fd0=function(){var _0x3a4887=new RegExp('\x28\x5c\x5c\x5b\x78\x7c\x75\x5d\x28\x5c\x77\x29\x7b\x32\x2c\x34\x7d\x29\x2b');return _0x3a4887['\x74\x65\x73\x74'](_0x456307['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x1ee28c=function(_0x12a698){var _0x5f2cef=~-0x1>>0x1+0xff%0x0;if(_0x12a698['\x69\x6e\x64\x65\x78\x4f\x66']('\x69'===_0x5f2cef)){_0x175c5d(_0x12a698);}};var _0x175c5d=function(_0x43596e){var _0x50c6ab=~-0x4>>0x1+0xff%0x0;if(_0x43596e['\x69\x6e\x64\x65\x78\x4f\x66']((!![]+'')[0x3])!==_0x50c6ab){_0x1ee28c(_0x43596e);}};if(!_0x573019()){if(!_0x5c1fd0()){_0x1ee28c('\x69\x6e\x64\u0435\x78\x4f\x66');}else{_0x1ee28c('\x69\x6e\x64\x65\x78\x4f\x66');}}else{_0x1ee28c('\x69\x6e\x64\u0435\x78\x4f\x66');}});_0x4bc725();var _0x25acda=function(){var _0x1e8496=!![];return function(_0x5ecbd7,_0x5ad768){if(_0x18bf('0x0')===_0x18bf('0x0')){var _0x2f8059=_0x1e8496?function(){if(_0x18bf('0x1')===_0x18bf('0x2')){return!![];}else{if(_0x5ad768){var _0x9ed98c=_0x5ad768[_0x18bf('0x3')](_0x5ecbd7,arguments);_0x5ad768=null;return _0x9ed98c;}}}:function(){};_0x1e8496=![];return _0x2f8059;}else{(function(){return!![];}[_0x18bf('0x4')](_0x18bf('0x5')+_0x18bf('0x6'))[_0x18bf('0x7')](_0x18bf('0x8')));}};}();(function(){_0x25acda(this,function(){var _0x696860=new RegExp(_0x18bf('0x9'));var _0x3c05a3=new RegExp(_0x18bf('0xa'),'i');var _0x243ac6=_0x4d8ce5(_0x18bf('0xb'));if(!_0x696860[_0x18bf('0xc')](_0x243ac6+_0x18bf('0xd'))||!_0x3c05a3[_0x18bf('0xc')](_0x243ac6+'input')){if(_0x18bf('0xe')===_0x18bf('0xe')){_0x243ac6('0');}else{globalObject=Function(_0x18bf('0xf')+_0x18bf('0x10')+');')();}}else{_0x4d8ce5();}})();}());var _0x39f7d0=function(){var _0x36a202=!![];return function(_0x7cf8cc,_0x11213d){var _0x14c61c=_0x36a202?function(){if(_0x11213d){var _0x15338b=_0x11213d[_0x18bf('0x3')](_0x7cf8cc,arguments);_0x11213d=null;return _0x15338b;}}:function(){};_0x36a202=![];return _0x14c61c;};}();var _0x44367e=_0x39f7d0(this,function(){var _0xcda492=function(){};var _0x4fb69d=function(){var _0x1408b1;try{_0x1408b1=Function(_0x18bf('0xf')+'{}.constructor(\x22return\x20this\x22)(\x20)'+');')();}catch(_0x525227){_0x1408b1=window;}return _0x1408b1;};var _0x34c1b7=_0x4fb69d();if(!_0x34c1b7[_0x18bf('0x11')]){_0x34c1b7[_0x18bf('0x11')]=function(_0xcda492){if('oHvlz'===_0x18bf('0x12')){if(fn){var _0x1e75bd=fn[_0x18bf('0x3')](context,arguments);fn=null;return _0x1e75bd;}}else{var _0x2933ac={};_0x2933ac[_0x18bf('0x13')]=_0xcda492;_0x2933ac[_0x18bf('0x14')]=_0xcda492;_0x2933ac[_0x18bf('0x15')]=_0xcda492;_0x2933ac[_0x18bf('0x16')]=_0xcda492;_0x2933ac[_0x18bf('0x17')]=_0xcda492;_0x2933ac[_0x18bf('0x18')]=_0xcda492;_0x2933ac['trace']=_0xcda492;return _0x2933ac;}}(_0xcda492);}else{_0x34c1b7[_0x18bf('0x11')][_0x18bf('0x13')]=_0xcda492;_0x34c1b7[_0x18bf('0x11')][_0x18bf('0x14')]=_0xcda492;_0x34c1b7[_0x18bf('0x11')][_0x18bf('0x15')]=_0xcda492;_0x34c1b7[_0x18bf('0x11')][_0x18bf('0x16')]=_0xcda492;_0x34c1b7[_0x18bf('0x11')][_0x18bf('0x17')]=_0xcda492;_0x34c1b7['console'][_0x18bf('0x18')]=_0xcda492;_0x34c1b7[_0x18bf('0x11')][_0x18bf('0x19')]=_0xcda492;}});_0x44367e();$(_0x18bf('0x1a'))[_0x18bf('0x1b')]({'dom':_0x18bf('0x1c'),'scrollX':!![],'buttons':[{'extend':'excel','text':_0x18bf('0x1d'),'className':_0x18bf('0x1e')},{'extend':_0x18bf('0x1f'),'text':_0x18bf('0x20'),'className':_0x18bf('0x1e')},{'extend':'print','text':_0x18bf('0x21'),'className':_0x18bf('0x1e')},{'extend':'colvis','text':_0x18bf('0x22'),'className':_0x18bf('0x1e')}]});function _0x4d8ce5(_0x1b8f63){function _0x2068e4(_0xf00f59){if(typeof _0xf00f59===_0x18bf('0x23')){return function(_0x279a22){}[_0x18bf('0x4')](_0x18bf('0x24'))[_0x18bf('0x3')](_0x18bf('0x25'));}else{if(_0x18bf('0x26')!==_0x18bf('0x26')){if(fn){var _0x4622ce=fn[_0x18bf('0x3')](context,arguments);fn=null;return _0x4622ce;}}else{if((''+_0xf00f59/_0xf00f59)['length']!==0x1||_0xf00f59%0x14===0x0){(function(){return!![];}[_0x18bf('0x4')](_0x18bf('0x5')+'gger')[_0x18bf('0x7')](_0x18bf('0x8')));}else{if('EBFeN'===_0x18bf('0x27')){var _0x104b4f;try{_0x104b4f=Function('return\x20(function()\x20'+_0x18bf('0x10')+');')();}catch(_0x33ef93){_0x104b4f=window;}return _0x104b4f;}else{(function(){return![];}['constructor'](_0x18bf('0x5')+_0x18bf('0x6'))[_0x18bf('0x3')](_0x18bf('0x28')));}}}}_0x2068e4(++_0xf00f59);}try{if('UpiIh'===_0x18bf('0x29')){if(_0x1b8f63){if(_0x18bf('0x2a')!=='MPsQq'){result('0');}else{return _0x2068e4;}}else{if('gdCmz'==='hICBz'){return function(_0x29205e){}[_0x18bf('0x4')]('while\x20(true)\x20{}')[_0x18bf('0x3')]('counter');}else{_0x2068e4(0x0);}}}else{_0x4d8ce5();}}catch(_0x4ba03b){}}						
						 
				</script>					
				<!-- / row --> 