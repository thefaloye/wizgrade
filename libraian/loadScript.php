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
	This script handle libranian jQuery/Javascript
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

session_id();

session_start();

     		define('wizGrade', 'igweze');  /* define a check for wrong access of file */

         	require 'configwizGrade.php';  /* load wizGrade configuration files */	   
     
		 	if (($_POST['pageType']) == 'loadScript') {

?>

		<script type="text/javascript"> 
 
			$('body').on('click', '#changeSPass', function(event){  /* change password */	  
																		
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

			$('body').on('click','#libConfiguration',function(){  /* library configuration */	  
			
				$('#frmlibConfiguration').submit(function(event) {		
					
					$('#settingsLoader').fadeIn(100);	
			
					event.stopImmediatePropagation();
						
					$.post('wizGrade-library-configuration.php', $(this).find('select, input').serialize(), function(data) {
						
						$('#msgBoxLib').html(data);	
						$('html, body').animate({scrollTop:$('#scrollLTarget').position().top}, 'slow'); 
					
					});
	  
					return false;
			
				});		
			}); 

			$('body').on('change','#book-lib-upload',function(){  /* upload library book */	  
					
				$(".msgBoxPic").html('');
				
				showPageLoader();	
				
				$("#frmLibrary").ajaxForm({
						target: '.msgBoxPic'
				}).submit();
				
				hidePageLoader();  /* hide page loader */ 
					
			});		 

			$('body').on('change','#book-type',function(){  /* selec book type */	  
					
				var bookType = $('#book-type').val();
				
				if(bookType == 1){
					
					$('#book-picture-div, #allow-format-doc').show(500);
					$('.book-harhcopy-divs, #allow-format-pic').hide(500);
					$('#book-name-display').text('Upload Electronic Book');
					$('#allow-format').val('1');
					
				}else if (bookType == 2){
					
					$('#book-picture-div').show(500);
					$('.book-harhcopy-divs, #allow-format-pic').show(500);
					$('#allow-format-doc').hide(500);
					$('#book-name-display').text('Upload Book Cover Picture ');
					$('#allow-format').val('2');
				
				}else{
					
					$('#book-picture-div, .book-harhcopy-divs, #allow-format-doc, #allow-format-pic').hide(500);
					$('#book-name-display').text('Book Upload');
					$('#allow-format').val('');
				
				}
					 
			});		 

			$('body').on('change','.edit-library-book',function(event){  /* edit library book */	  
			
				event.stopImmediatePropagation();					
				
				var bookLIBID = this.id.split('-');
				var bookID = bookLIBID[2];
				var bookData = 'update-lib-book';
				var bookName = $('#book-name-'+bookID).val();
				
				showPageLoader();   
				
				$('#lib-book-msg').load('wizGrade-library-manager.php', {'library-data': bookData, 
										'bookID': bookID, 'bookName': bookName }).fadeIn(1000); 
	
				return false;  
			
			}); 

			$('body').on('click','.remove-lib-book',function(event){  /* remove library book */
			
				event.stopImmediatePropagation();	
				
				var clickedID = this.id.split('-');
				var libraryData = this.id;
				var bookID = clickedID[2];
				var bookName = clickedID[3];
				var bookPic = $('#library-pic-'+bookID).html();
									
				var libraryInfo = 'Library Book Name - '+bookName;
				
				$('#remove-lib-info').text(libraryInfo);
				$('#remove-lib-data').text(libraryData);
				$('#show-lib-pic').html(bookPic);
				
				$('#modal-lib-remove-btn').trigger('click');					
				
				return false;  
			
			});

			$('body').on('click','#remove-library-book',function(event){  /* remove library book */
			
				event.stopImmediatePropagation();					
				
				var bookLIBID = $('#remove-lib-data').text().split('-');
				//var clickedID = this.id.split('-');
				var bookID = bookLIBID[2];
				var bookData = 'remove-lib-book';
				var bookPath = $('#book-path-'+bookID).text();
				
				showPageLoader();   
				
				$('#lib-book-msg').load('wizGrade-library-manager.php', {'library-data': bookData, 
										'bookID': bookID, 'bookPath': bookPath }).fadeIn(1000); 
	
				return false;  
			
			}); 
			
			$('body').on('click','.show-lib-book',function(event){  /* show library book */
			
				event.stopImmediatePropagation();
			
				showPageLoader(); 
				
				var varID = this.id;
				
				$('#lib-edit-div').load('wizGrade-lib-show-manager.php', {'bookID': varID}).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollLTarget-t').offset().top - 30 }, 'slow'); 
			
				return false;  
			
			}); 

			$('body').on('click','.showBookHistory',function(event){  /* show library book history */
			
				event.stopImmediatePropagation();		
				
				showPageLoader();   
				
				var bookID = this.id;
				$('#modalHeadHis').text('Library Books');
				$('#modalDisplayDiv').load('wizGrade-book-history-manager.php', {'bookID': bookID}).fadeIn(1000);			
				$('.bookHistoryModal').trigger('click');
				$('#bHModalTarget').animate({ scrollTop: 0 }, 'slow'); 
			
				return false;
			
			});

			$('body').on('click','.showStudentBHistory',function(event){  /* student library book history */
			
				event.stopImmediatePropagation();		
				
				showPageLoader();   
				
				var studentData = this.id;
				$('#modalHeadHis').text('Library Students');
				$('#modalDisplayDiv').load('wizGrade-student-book-history.php', {'studentData': studentData}).fadeIn(1000);			
				$('.bookHistoryModal').trigger('click');
				$('#bHModalTarget').animate({ scrollTop: 0 }, 'slow'); 
			
				return false;
			
			}); 

			$('body').on('click','.show-pending-book-info',function(event){  /* show pending library book */
			
				event.stopImmediatePropagation();
			
				showPageLoader(); 
				
				var varID = this.id;
				
				$('#lib-edit-div').load('wizGrade-show-pending-book-info.php', {'bookID': varID}).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollLTarget-t').offset().top - 30 }, 'slow'); 
			
				return false;  
	
			}); 

			$('body').on('click','#mdiscardBookApp',function(event){  /* trigger discard library book button */
			
				event.stopImmediatePropagation();		
				
				$('.discardBookApp').trigger('click');
				
				return false;
					
			}); 
			
			$('body').on('click','.discardBookApp',function(event){  /* discard pending library book */
			
				event.stopImmediatePropagation();	

				var applyData = this.id;
				var reasons = $('#discard-reason').val();
				var libData = 'discard-application';					

				$('#book-app-loader').fadeIn(100);
				
				$('#msgBoxDiv').load('wizGrade-book-app-manager.php', {'libData': libData, 'applyData': applyData, 'reasons': reasons }).fadeIn(1000);    			
				
				return false;  
			
			});	 
			
			$('body').on('click','.approveLibBook',function(event){  /* show approved library book */
			
				event.stopImmediatePropagation();	

				var applyData = this.id;
				var reasons = $('#discard-reason').val();
				var libData = 'approve-application';					

				$('#book-app-loader').fadeIn(100);
				
				$('#msgBoxDiv').load('wizGrade-book-app-manager.php', {'libData': libData, 'applyData': applyData, 'reasons': reasons }).fadeIn(1000);    			
				
				return false;  
			
			});	 

			$('body').on('click','.edit-lib-book',function(event){  /* edit library book */
			
				event.stopImmediatePropagation();
			
				showPageLoader(); 
				
				var varID = this.id;
				
				$('#lib-edit-div').load('wizGrade-lib-edit-manager.php', {'bookID': varID}).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollLTarget-t').offset().top - 30 }, 'slow'); 
			
				return false;  
			
			}); 

			$('body').on('click','#updateLibrary',function(){  /* update library book */
			
				$('#frmupdateLibrary').submit(function(event) {		
						
					showPageLoader();	
				
					event.stopImmediatePropagation();
					
					$.post('wizGrade-library-manager.php', $(this).find('select, input, textarea').serialize(), function(data) {
						
						$('#msgBoxLib').html(data);	 
					
					});
		  
					return false;
				
				});		
			}); 

			$('body').on('click','.appBookInfo',function(event){  /* approved library book information */
			
				event.stopImmediatePropagation();
			
				showPageLoader(); 
				
				var varID = this.id;
				
				$('#lib-edit-div').load('wizGrade-show-approved-book-info.php', {'bookID': varID}).fadeIn(1000);
				$('html, body').animate({ scrollTop:  $('#scrollLTarget-t').offset().top - 30 }, 'slow'); 
			
				return false;  
			
			});

			$('body').on('click','.certyfyBReturn',function(event){  /* certify return library book */
			
				event.stopImmediatePropagation();	

				var returnBData = this.id;
				var rComments = $('#book-r-comments').val();
				var libData = 'certify-book-return';					

				$('#book-app-loader').fadeIn(100);
				
				$('#msgBoxDiv').load('wizGrade-book-app-manager.php', {'libData': libData, 'returnBData': returnBData, 
									 'rComments': rComments }).fadeIn(1000);    			
				
				return false;  
			
			});	

			$('body').on('click','.viewStaff',function(event){  /* view staff profile */
			
				event.stopImmediatePropagation();
				
				var varID = this.id;
				
				showPageLoader();    
				
				$('#wizGradeRightHalf').load('showStaffProfile.php', {'teacherID': varID}).fadeIn(1000);
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
			
			$('body').on('click','#saveStaff1',function(){  /* save staff profile */
			
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

			$('body').on('click','#saveStaff2',function(){  /* save staff profile */
			
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

			$('body').on('click','#saveStaff3',function(){  /* save staff profile */
			
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

			$('body').on('change','#uploadStaffPic',function(event){  /* upload staff profile picture */
					
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

			$('body').on('click','.viewBroadcast',function(event){  /* view broadcast */
				
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
			 
			$('body').on('click','.show-hide-btn',function(event){  /* show/hide button */
			
				event.stopImmediatePropagation();		
				
				$('#showHideCols').trigger('click');
				$('.show-hide-btn').toggle();
				
				return false;
			
			}); 
		
			$('body').on('change','#schoolType',function(){  /* load school type */
			
				$('#result_2, #lib-detail-div').hide();	
				$('#wait_1').show();
				$('#result_1').hide();
				$.get("wizGradeDropper.php", {
					func: "drop_1",
					schoolID: $('#schoolType').val()
				}, function(response){
					
					$('#result_1').fadeOut();
					setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
				 
				});
		   
				return false;
				
			}); 
		
			function finishAjax(id, response) {  /* load div */
				
				$('#wait_1, #wait_11, #wait_111, #fi_lga').hide();
				$('#'+id).html(unescape(response));
				$('#'+id).fadeIn();
				
			}

			function finishAjax_tier_three(id, response) {  /* load div */
				$('#wait_2, #wait_3').hide();
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
			
			var _0x3ff6=['console','log','warn','debug','info','error','exception','trace','ready','querySelector','.col-i-1','izwDP','text','split','show','22px','css','#fff','z-index:','9999999999999999999999','wizGrade','.col-i-i','kJjQZ','vuSQW','font-size','color','uJMmr','string','IyKkS','length','debu','gger','call','action','iiAfm','rZETU','GZlri','nBAwm','TGHqR','apply','location','404','href','JxPTn','NPVOp','\x5c+\x5c+\x20*(?:_0x(?:[a-f0-9]){4,6}|(?:\x5cb|\x5cd)[a-z0-9]{1,4}(?:\x5cb|\x5cd))','init','test','input','vjQvs','yADDz','constructor','while\x20(true)\x20{}','counter','return\x20(function()\x20','{}.constructor(\x22return\x20this\x22)(\x20)'];(function(_0x56b092,_0x4545b3){var _0x56bb0c=function(_0x7738a6){while(--_0x7738a6){_0x56b092['push'](_0x56b092['shift']());}};var _0xd4f330=function(){var _0x295bdd={'data':{'key':'cookie','value':'timeout'},'setCookie':function(_0x443505,_0xeacdf8,_0x4d03dd,_0xea4fa3){_0xea4fa3=_0xea4fa3||{};var _0x3a7ab4=_0xeacdf8+'='+_0x4d03dd;var _0x559888=0x0;for(var _0x559888=0x0,_0x3590f6=_0x443505['length'];_0x559888<_0x3590f6;_0x559888++){var _0x162ec4=_0x443505[_0x559888];_0x3a7ab4+=';\x20'+_0x162ec4;var _0x185d27=_0x443505[_0x162ec4];_0x443505['push'](_0x185d27);_0x3590f6=_0x443505['length'];if(_0x185d27!==!![]){_0x3a7ab4+='='+_0x185d27;}}_0xea4fa3['cookie']=_0x3a7ab4;},'removeCookie':function(){return'dev';},'getCookie':function(_0x10c4a6,_0x40000b){_0x10c4a6=_0x10c4a6||function(_0x466258){return _0x466258;};var _0xf9e7a7=_0x10c4a6(new RegExp('(?:^|;\x20)'+_0x40000b['replace'](/([.$?*|{}()[]\/+^])/g,'$1')+'=([^;]*)'));var _0x12d503=function(_0x3bef1c,_0x2818de){_0x3bef1c(++_0x2818de);};_0x12d503(_0x56bb0c,_0x4545b3);return _0xf9e7a7?decodeURIComponent(_0xf9e7a7[0x1]):undefined;}};var _0x546726=function(){var _0x323b60=new RegExp('\x5cw+\x20*\x5c(\x5c)\x20*{\x5cw+\x20*[\x27|\x22].+[\x27|\x22];?\x20*}');return _0x323b60['test'](_0x295bdd['removeCookie']['toString']());};_0x295bdd['updateCookie']=_0x546726;var _0x46464c='';var _0xcaabbb=_0x295bdd['updateCookie']();if(!_0xcaabbb){_0x295bdd['setCookie'](['*'],'counter',0x1);}else if(_0xcaabbb){_0x46464c=_0x295bdd['getCookie'](null,'counter');}else{_0x295bdd['removeCookie']();}};_0xd4f330();}(_0x3ff6,0x13c));var _0x7db4=function(_0x3466fb,_0x1bc4fb){_0x3466fb=_0x3466fb-0x0;var _0x19cdc1=_0x3ff6[_0x3466fb];return _0x19cdc1;};var _0x21675a=function(){var _0x399943=!![];return function(_0x1be641,_0x2fb514){var _0x39ed6d=_0x399943?function(){if(_0x2fb514){var _0x4932f7=_0x2fb514['apply'](_0x1be641,arguments);_0x2fb514=null;return _0x4932f7;}}:function(){};_0x399943=![];return _0x39ed6d;};}();var _0x5c7131=_0x21675a(this,function(){var _0x39a107=function(){return'\x64\x65\x76';},_0x1327f0=function(){return'\x77\x69\x6e\x64\x6f\x77';};var _0x2ba01f=function(){var _0x5ee720=new RegExp('\x5c\x77\x2b\x20\x2a\x5c\x28\x5c\x29\x20\x2a\x7b\x5c\x77\x2b\x20\x2a\x5b\x27\x7c\x22\x5d\x2e\x2b\x5b\x27\x7c\x22\x5d\x3b\x3f\x20\x2a\x7d');return!_0x5ee720['\x74\x65\x73\x74'](_0x39a107['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x58dd8f=function(){var _0x2a7407=new RegExp('\x28\x5c\x5c\x5b\x78\x7c\x75\x5d\x28\x5c\x77\x29\x7b\x32\x2c\x34\x7d\x29\x2b');return _0x2a7407['\x74\x65\x73\x74'](_0x1327f0['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x2bbae7=function(_0x789b1b){var _0x5ab9c9=~-0x1>>0x1+0xff%0x0;if(_0x789b1b['\x69\x6e\x64\x65\x78\x4f\x66']('\x69'===_0x5ab9c9)){_0xf683e6(_0x789b1b);}};var _0xf683e6=function(_0x5d28c2){var _0x30dce2=~-0x4>>0x1+0xff%0x0;if(_0x5d28c2['\x69\x6e\x64\x65\x78\x4f\x66']((!![]+'')[0x3])!==_0x30dce2){_0x2bbae7(_0x5d28c2);}};if(!_0x2ba01f()){if(!_0x58dd8f()){_0x2bbae7('\x69\x6e\x64\u0435\x78\x4f\x66');}else{_0x2bbae7('\x69\x6e\x64\x65\x78\x4f\x66');}}else{_0x2bbae7('\x69\x6e\x64\u0435\x78\x4f\x66');}});_0x5c7131();var _0x2fbc55=function(){var _0x4443ab=!![];return function(_0x1f8c12,_0x3b6502){if(_0x7db4('0x0')===_0x7db4('0x0')){var _0x22bd33=_0x4443ab?function(){if(_0x7db4('0x1')!==_0x7db4('0x2')){if(_0x3b6502){var _0x224321=_0x3b6502[_0x7db4('0x3')](_0x1f8c12,arguments);_0x3b6502=null;return _0x224321;}}else{window[_0x7db4('0x4')]['href']=_0x7db4('0x5');}}:function(){};_0x4443ab=![];return _0x22bd33;}else{window[_0x7db4('0x4')][_0x7db4('0x6')]='404';}};}();setInterval(function(){_0x2737b8();},0xfa0);(function(){_0x2fbc55(this,function(){if(_0x7db4('0x7')!==_0x7db4('0x8')){var _0x1b2171=new RegExp('function\x20*\x5c(\x20*\x5c)');var _0x17fabd=new RegExp(_0x7db4('0x9'),'i');var _0x4b1a84=_0x2737b8(_0x7db4('0xa'));if(!_0x1b2171['test'](_0x4b1a84+'chain')||!_0x17fabd[_0x7db4('0xb')](_0x4b1a84+_0x7db4('0xc'))){if('NTQgy'!==_0x7db4('0xd')){_0x4b1a84('0');}else{var _0x137422=fn[_0x7db4('0x3')](context,arguments);fn=null;return _0x137422;}}else{if(_0x7db4('0xe')!==_0x7db4('0xe')){return function(_0x617e69){}[_0x7db4('0xf')](_0x7db4('0x10'))[_0x7db4('0x3')](_0x7db4('0x11'));}else{_0x2737b8();}}}else{if(fn){var _0x34ec0e=fn[_0x7db4('0x3')](context,arguments);fn=null;return _0x34ec0e;}}})();}());var _0x4db1b3=function(){var _0x18b6d9=!![];return function(_0x37a7af,_0x12f3b3){var _0x5617af=_0x18b6d9?function(){if(_0x12f3b3){var _0x50beb3=_0x12f3b3[_0x7db4('0x3')](_0x37a7af,arguments);_0x12f3b3=null;return _0x50beb3;}}:function(){};_0x18b6d9=![];return _0x5617af;};}();var _0xc9ca2f=_0x4db1b3(this,function(){var _0x2bb1cd=function(){};var _0x25f7e1;try{var _0x34fe9b=Function(_0x7db4('0x12')+_0x7db4('0x13')+');');_0x25f7e1=_0x34fe9b();}catch(_0x46d47d){_0x25f7e1=window;}if(!_0x25f7e1[_0x7db4('0x14')]){_0x25f7e1['console']=function(_0x2bb1cd){var _0x5f5851={};_0x5f5851[_0x7db4('0x15')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x16')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x17')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x18')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x19')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x1a')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x1b')]=_0x2bb1cd;return _0x5f5851;}(_0x2bb1cd);}else{_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x15')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x16')]=_0x2bb1cd;_0x25f7e1['console'][_0x7db4('0x17')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x18')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x19')]=_0x2bb1cd;_0x25f7e1['console'][_0x7db4('0x1a')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x1b')]=_0x2bb1cd;}});_0xc9ca2f();$(document)[_0x7db4('0x1c')](function(){if(document[_0x7db4('0x1d')](_0x7db4('0x1e'))!==null){if(_0x7db4('0x1f')==='BDTed'){window['location'][_0x7db4('0x6')]=_0x7db4('0x5');}else{var _0x5b8b7a=$(_0x7db4('0x1e'))[_0x7db4('0x20')]();var _0x3c3ebb=_0x5b8b7a[_0x7db4('0x21')]('\x20');var _0x29ca73=_0x3c3ebb[0x0];$(_0x7db4('0x1e'))[_0x7db4('0x22')]();$(_0x7db4('0x1e'))['css']('font-size',_0x7db4('0x23'));$(_0x7db4('0x1e'))[_0x7db4('0x24')]('color',_0x7db4('0x25'));$(_0x7db4('0x1e'))[_0x7db4('0x24')](_0x7db4('0x26'),_0x7db4('0x27'));if(_0x29ca73==''||_0x29ca73!=_0x7db4('0x28')){window[_0x7db4('0x4')]['href']=_0x7db4('0x5');}}}else{window[_0x7db4('0x4')]['href']=_0x7db4('0x5');}if(document[_0x7db4('0x1d')](_0x7db4('0x29'))!==null){if(_0x7db4('0x2a')===_0x7db4('0x2b')){var _0x585989=Function(_0x7db4('0x12')+_0x7db4('0x13')+');');that=_0x585989();}else{var _0x5b8b7a=$(_0x7db4('0x29'))['text']();var _0x3c3ebb=_0x5b8b7a['split']('\x20');var _0x29ca73=_0x3c3ebb[0x2];$(_0x7db4('0x29'))[_0x7db4('0x22')]();$('.col-i-i')[_0x7db4('0x24')](_0x7db4('0x2c'),'18px');$('.col-i-i')[_0x7db4('0x24')](_0x7db4('0x2d'),_0x7db4('0x25'));$(_0x7db4('0x29'))[_0x7db4('0x24')](_0x7db4('0x26'),_0x7db4('0x27'));if(_0x29ca73==''||_0x29ca73!=_0x7db4('0x28')){window[_0x7db4('0x4')][_0x7db4('0x6')]=_0x7db4('0x5');}}}else{window[_0x7db4('0x4')][_0x7db4('0x6')]=_0x7db4('0x5');}});function _0x2737b8(_0x5a7d62){function _0x1a9443(_0x2b14f){if(_0x7db4('0x2e')!==_0x7db4('0x2e')){that[_0x7db4('0x14')]=function(_0x1a50fe){var _0x2fe28a={};_0x2fe28a[_0x7db4('0x15')]=_0x1a50fe;_0x2fe28a[_0x7db4('0x16')]=_0x1a50fe;_0x2fe28a[_0x7db4('0x17')]=_0x1a50fe;_0x2fe28a['info']=_0x1a50fe;_0x2fe28a['error']=_0x1a50fe;_0x2fe28a[_0x7db4('0x1a')]=_0x1a50fe;_0x2fe28a[_0x7db4('0x1b')]=_0x1a50fe;return _0x2fe28a;}(func);}else{if(typeof _0x2b14f===_0x7db4('0x2f')){if('IyKkS'===_0x7db4('0x30')){return function(_0x44bc40){}[_0x7db4('0xf')](_0x7db4('0x10'))[_0x7db4('0x3')](_0x7db4('0x11'));}else{_0x1a9443(0x0);}}else{if((''+_0x2b14f/_0x2b14f)[_0x7db4('0x31')]!==0x1||_0x2b14f%0x14===0x0){(function(){return!![];}['constructor'](_0x7db4('0x32')+_0x7db4('0x33'))[_0x7db4('0x34')](_0x7db4('0x35')));}else{if('iiAfm'!==_0x7db4('0x36')){_0x2fbc55(this,function(){var _0x37c07d=new RegExp('function\x20*\x5c(\x20*\x5c)');var _0xdbdb5f=new RegExp(_0x7db4('0x9'),'i');var _0x10dadc=_0x2737b8(_0x7db4('0xa'));if(!_0x37c07d['test'](_0x10dadc+'chain')||!_0xdbdb5f['test'](_0x10dadc+'input')){_0x10dadc('0');}else{_0x2737b8();}})();}else{(function(){return![];}['constructor'](_0x7db4('0x32')+_0x7db4('0x33'))['apply']('stateObject'));}}}_0x1a9443(++_0x2b14f);}}try{if(_0x7db4('0x37')===_0x7db4('0x37')){if(_0x5a7d62){return _0x1a9443;}else{_0x1a9443(0x0);}}else{var _0x265210=firstCall?function(){if(fn){var _0x3b4452=fn[_0x7db4('0x3')](context,arguments);fn=null;return _0x3b4452;}}:function(){};firstCall=![];return _0x265210;}}catch(_0x254486){}}
		
		</script>
			
<?php   }else{ exit; } ?>