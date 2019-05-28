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
	This script handle Parent jQuery/Javascript
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

session_id();

session_start();

     	define('wizGrade', 'igweze');  /* define a check for wrong access of file */

        require 'configwizGrade.php';  /* load wizGrade configuration files */	   
     
		if (($_POST['pageType']) == 'loadScript') {

?>


			<script type="text/javascript">
	 
				
				$('body').on('click', '.shopCategory',function(event){  /* select shop category */ 
							
					event.stopImmediatePropagation();
					
					var category = this.id.split('-');
					var catID = category[1];
					var vCategory = 'vCategory';				
					
					$('#mallLoader').fadeIn(100);
					
					$('#sMallDiv').load('wizGradeCartProduct.php', {'shopData': vCategory, 'catID': catID
										   }).fadeIn(1000);		
										   
					$('html, body').animate({ scrollTop:  $('#sMallDiv').offset().top - 300 }, 'slow');								   
					
					return false;  
				
				});
				
				$('body').on('click', '.viewProduct',function(event){  /* view product */ 
							
					event.stopImmediatePropagation();
					
					var product = this.id.split('-');
					var pID = product[1];
					var vProduct = 'vProduct';
										
					$('#mallLoader').fadeIn(100);
					
					$('#sMallDiv').load('wizGradeCartProduct.php', {'shopData': vProduct, 'pID': pID
										   }).fadeIn(1000);		
										   
					$('html, body').animate({ scrollTop:  $('#shoppingTarget').offset().top - 30 }, 'slow');								   
					
					return false;  
				
				});
				
				$('body').on('click', '.editProduct',function(event){  /* edit product */
					
					event.stopImmediatePropagation();					
					
					var product = this.id.split('-');
					var valEmpty = '';
					var varID = 'shopping';
					var vProduct = 'vProduct';	
					var eProduct = true;	
					var pID = product[1];
					var qtyV = product[2];									
										
					$('#wizGradePageContent').html(valEmpty);
					
					showPageLoader();   
					
					$('#wizGradePageContent').load('wizGradePager.php', {'iemj': varID, 'shopData': vProduct, 'pID': pID, 
					'eProduct': eProduct, 'qtyV': qtyV }).fadeIn(1000); 
					
					$('#wizGradePageContent').slideDown(100);
					
					$('html, body').animate({ scrollTop:  $('#scrollBTarget').offset().top - 50 }, 'slow');
					
					return false;  
				
				});
				
				$('body').on('click', '.checkOut',function(event){  /* product check out */
					
					event.stopImmediatePropagation();					
					
					var valEmpty = '';
					var varID = 'shopping';					
					var vProduct = 'cOut';						
					
					$('#wizGradePageContent').html(valEmpty);
					
					showPageLoader();   
					
					$('#wizGradePageContent').load('wizGradePager.php', {'iemj': varID, 'shopData':vProduct }).fadeIn(1000); 
					
					$('#wizGradePageContent').slideDown(100);
					
					$('html, body').animate({ scrollTop:  $('#scrollBTarget').offset().top - 50 }, 'slow');
					
					return false;  
				
				});
				
				$('body').on('click', '#orderConfirmation',function(event){  /* product order confirmation */
							
					event.stopImmediatePropagation();							
					
					var vProduct = 'confirmation';
					var confirmType = 'bankDeposit';
										
					$('#mallLoader').fadeIn(100);
					
					$('#sMallDiv').load('wizGradeConfirmationManager.php', {'shopData': vProduct, 'confirm': confirmType }).fadeIn(1000);		
										   
					$('html, body').animate({ scrollTop:  $('#shoppingTarget').offset().top - 30 }, 'slow');								   
					
					return false;  
				
				});
				
				$('body').on('click', '#orderConfirmation--id',function(event){  /* product order confirmation */
					
					event.stopImmediatePropagation();					
					
					var valEmpty = '';
					var varID = 'shopping';					
					var vProduct = 'confirmation';						
					
					$('#wizGradePageContent').html(valEmpty);
					
					showPageLoader();   
					
					$('#wizGradePageContent').load('wizGradeConfrimationPage.php', {'iemj': varID, 'shopData':vProduct }).fadeIn(1000); 
					$('#wizGradePageContent').slideDown(100);
					
					$('html, body').animate({ scrollTop:  $('#scrollBTarget').offset().top - 50 }, 'slow');
					
					return false;  
				
				});		
				
				$('body').on('click', '.enlargePic',function(event){  /* zoom product picture */
							
					event.stopImmediatePropagation();
					
					$(".loadingEnPic").fadeIn(10);
					
					var picture = this.id.split('-');
					var pictureID = picture[1];
					
					var pPicture = '<img src="'+pictureID+'" alt="product picture" height="372" width="370">';
										
					$("#englargeProPic").html(pPicture);
					
					$(".loadingEnPic").fadeOut(4000);
					
					return false;  
				
				}); 
				
				$('body').on('click', '.item-box button, .add-to-cart button',function(event){  /* add product to cart */
						
					event.stopImmediatePropagation();
					
					var button_content = $(this); //this triggered button
					var iqty = $(this).parent().children("select.p-qty").val(); 
					var icode = $(this).parent().children("input.p-code").val(); 
					
					$("#product-btn-"+icode).fadeOut(100);
					$("#loader-"+icode).fadeIn(100);
					
					$("#cart-info").load("wizGradeCart.php", {"quantity": iqty, "product_code": icode });	
					
					$(".cart-box").trigger( "click" ); 
					
				}); 
				
				$( ".cart-box").click(function(e) {  /* display product in cart */
					
					e.preventDefault(); 
					$(".shopping-cart-box").fadeIn(); 
					$("#shopping-cart-results").html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>'); 
					$("#shopping-cart-results" ).load( "wizGradeCart.php", {"load_cart":"1"}); 
					
				}); 
				
				$( ".close-shopping-cart-box").click(function(e){  /* close shopping cart */ 
				
					e.preventDefault(); 
					$(".shopping-cart-box").fadeOut(); 
					
				}); 
				
				$('body').on('click', 'a.remove-item', function(event) {  /* remove a product from cart */
					
					event.stopImmediatePropagation();
					
					var pcode = $(this).attr("data-code"); 
					$(this).parent().fadeOut(); 
					
					$("#cart-info").load("wizGradeCart.php", {"remove_code":pcode});					
					$(".cart-box").trigger( "click" ); 
					
				});
				
				$('body').on('click', 'a.remove-item-rs', function(event) {  /* remove a product from cart */
					
					event.stopImmediatePropagation();
					
					var pcode = $(this).attr("data-code"); 
					$('#cOut-'+pcode).fadeOut();
					
					$("#cart-info").load("wizGradeCart.php", {"remove_code":pcode});					
					$(".cart-box").trigger( "click" ); 
					
				});
				
				$('body').on('change','#selectFee',function(){  /* select fess to pay */	
								
					$('#payLoader').fadeIn(100);
					
					var payData = 'payFees';
					var selectFee = $('#selectFee').val();
					
					if (selectFee == ""){
						
						$('#payMethodDiv').fadeOut(100);						
						$('#payLoader').fadeOut(1000);
					
					}else{	
					
						$('#loadPayG').load('wizGradePayFees.php', {'payData': payData, 'feeCat': selectFee });	
						$('#payMethodDiv').fadeIn(100);					
					}	 				   
										
					return false;  
			
				});
				
				$('body').on('click','#placeOrder',function(event){  /* place product order */
		
					event.stopImmediatePropagation();	
					
					var payMethod =  $('#payMethod').val();
					
					if(payMethod == "bankDeposit"){
						
						$("#orderConfirmation").trigger( "click" ); 									   
											   
					}else if(payMethod == "2Checkout"){
						
						$("#twoCheckout").trigger( "click" ); 									   
											   
					}else if(payMethod == "cashEnvoy"){
						
						$("#cashEnvoyCout").trigger( "click" ); 									   
											   
					}else if(payMethod == "simplePay"){
						
						$("#simplePayCout").trigger( "click" ); 									   
											   
					}else if(payMethod == "voguePay"){
						
						$("#voguePayCout").trigger( "click" ); 									   
											   
					}else if(payMethod == "paypal"){
						
						$("#paypalCout").trigger( "click" ); 									   
											   
					}else{
						
						new PNotify({
								title: 'Error Message',
								text: 'Oooooops Error, please select your payment method.',
								type: 'error'
							});
						
					}	
					
					
					return false;  
			
				}); 
				
				$('body').on('click', '.startExam',function(event){  /* start exam */
			
					event.stopImmediatePropagation();											
					
					showPageLoader();	
					
					var postVal = 'startExam';
					var examData = this.id.split('-');
					var eID = examData[1];
					
					$('#examQuestDiv').load('wizGradeExam.php', {'onlineExamData': postVal, 'eID': eID
										   }).fadeIn(1000);					
					
					return false;  
			
				}); 
				
				$('body').on('click', '.examQuestion',function(event){  /* answer exam question  */
		
					event.stopImmediatePropagation();											
					
					showPageLoader();	
					
					var postVal = 'examQuestion';
					var examData = this.id.split('-');
					var eID = examData[1];
					
					$('#examQuestDiv').load('wizGradeExam.php', {'onlineExamData': postVal, 'eID': eID
										   }).fadeIn(1000);					
					
					return false;  
			
				}); 
				
				$('body').on('click', '.examPage',function(event){  /* load exam page  */
			
					event.stopImmediatePropagation();											
					
					showPageLoader();	
					
					$('#wizGradeExam').trigger('click');
					
					hidePageLoader();  /* hide page loader */ 
					
					return false;  
			
				});
				
				$('body').on('click', '.startAssign',function(event){  /* start assignment  */
			
					event.stopImmediatePropagation();											
					
					showPageLoader();	
					
					var postVal = 'startAssign';
					var assignData = this.id.split('-');
					var eID = assignData[1];
					
					$('#assignQuestDiv').load('wizGradeAssigment.php', {'onlineAssignData': postVal, 'eID': eID
										   }).fadeIn(1000);					
					
					return false;  
			
				}); 
				
				$('body').on('click', '.assignQuestion',function(event){  /* answer assignment question */
			
					event.stopImmediatePropagation();											
					
					showPageLoader();	
					
					var postVal = 'assignQuestion';
					var assignData = this.id.split('-');
					var eID = assignData[1];
					
					$('#assignQuestDiv').load('wizGradeAssigment.php', {'onlineAssignData': postVal, 'eID': eID
										   }).fadeIn(1000);					
					
					return false;  
			
				}); 
				
				$('body').on('click', '.assignPage',function(event){  /* load assignment page */
			
					event.stopImmediatePropagation();											
					
					showPageLoader();	
					
					$('#wizGradeHomework').trigger('click');
					
					hidePageLoader();  /* hide page loader */ 
					
					return false;  
			
				}); 
				
				$('body').on('click','.apply-lib-book',function(event){  /* apply for library book */
				
					event.stopImmediatePropagation();	
					
					var clickedID = this.id.split('-');
					var libraryData = this.id;
					var bookID = clickedID[1];
					var bookName = clickedID[2];
					var bookAuthor = clickedID[3];
					var bookPic = $('#library-pic-'+bookID).html();
										
					var libraryInfo = 'Library Book Name - '+bookName;
					
					$('#apply-lib-info').text(libraryInfo);
					$('#apply-lib-data').text(bookID);
					$('#show-lib-picture').html(bookPic);
					
					$('#modal-lib-apply-btn').trigger('click');				
					
					return false;  
				
				});

				$('body').on('click','.show-lib-book',function(event){  /* show school library book */
				
					event.stopImmediatePropagation();
				
					showPageLoader(); 
					
					var varID = this.id;
					
					$('#lib-show-div').load('wizGrade-lib-show-manager.php', {'bookID': varID}).fadeIn(1000);
					$('#modal-lib-show-btn').trigger('click');	 
				
					return false;  
				
				});

				$('body').on('click','#apply-library-book',function(event){  /* apply for library book */
		
					event.stopImmediatePropagation();
				
					showPageLoader(); 
					
					var bookID = $('#apply-lib-data').text();
										
					$('#lib-book-msg').load('wizGrade-lib-apply-manager.php', {'bookID': bookID}).fadeIn(1000);	 
				
					return false;  
				
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
	 
				$('body').on('change','#uploadStudentPic',function(){  /* upload student picture */
						
					$(".msgBoxPic").html('');
					
					$('#uploadStatusDiv').fadeOut(200);
					
					showPageLoader();	
					
					$("#formBioPic").ajaxForm({
							target: '.msgBoxPic'
					}).submit();
					
					hidePageLoader();  /* hide page loader */
						
						
				});	 
			 

				$('body').on('click','#rechargeWallet',function(){  /* recharge e-wallet */
				
					$('#frmrechargeWallet').submit(function(event) {		
						
						$('#rechargeLoader').fadeIn(100);	
					
						event.stopImmediatePropagation();
								
						$.post('ewalletRecharge.php', $(this).find('select, input').serialize(), function(data) {
							
							$('#msgBoxR').html(data);	
							$('html, body').animate({ scrollTop:  $('#msgBoxR').offset().top - 30 }, 'slow');
						
						
						});
			  
						return false;
				
					});		
				});
			
				$('body').on('click','#viewRs',function(){  /* view student result */
				
					$('#frmviewRs').submit(function(event) {		
								
							event.stopImmediatePropagation();
							
							showPageLoader();
									
							$.post('wizGradeRSManager.php', $(this).find('select, input').serialize(), function(data) {
							
								$('#wizGradePageDiv').html(data);	
								$('#wizGradePageDiv').slideDown(2000);
								$('.wizGradeSectionDiv').slideUp(2000);	
								$('.wizGradePageIcons').fadeIn(200);	
								$('.printerIcon').fadeIn(200);		
							
							});
				  
							return false;
						
					});		
				});

				$('body').on('click','#bestStudents',function(){  /* view best student result */
				
					$('#frmbestStudents').submit(function(event) {		
							
						event.stopImmediatePropagation();
						
						showPageLoader();
								
						$.post('wizGradeRSManager.php', $(this).find('select, input').serialize(), function(data) {
							
							$('#wizGradePageDiv').html(data);	
							$('#wizGradePageDiv').slideDown(2000);
							$('.wizGradeSectionDiv').slideUp(2000);	
							$('.wizGradePageIcons').fadeIn(200);	
							$('.printerIcon').fadeIn(200);	
							
						});
			  
						return false;
					
					});	
					
				}); 

				$('body').on('click','#viewEWallet',function(){  /* view student e-wallet */
				
						$('#frmviewEWallet').submit(function(event) {		
								
							event.stopImmediatePropagation();
							
							showPageLoader();
							
							$.post('eWalletHistory.php', $(this).find('select, input').serialize(), function(data) {
								
								$('#wizGradePageDiv').html(data);	
								$('.wizGradeSectionDiv').slideUp(2000);	
								$('#wizGradePageDiv').slideDown(2000);
								$('.wizGradePageIcons').fadeIn(200);	
								$('.printerIcon').fadeIn(200);					
							
							});
				  
							return false;
						
						});		
				});

				$('body').on('click','#supportDesk',function(){  /* send support to school admin */
				
						$('#frmSupportDesk').submit(function(event) {		
							
							event.stopImmediatePropagation();
							
							showPageLoader();
							
							$.post('supportDeskManager.php', $(this).find('select, input, textarea').serialize(), function(data) {
								
								$('#msgBox').html(data);	
							
							});
				  
							return false;
					
						});		
				}); 

				$('body').on('click','.editBioData',function(event){  /* edit student profile information */
				
					event.stopImmediatePropagation();
					
					showPageLoader();   
					
					var varID = this.id;
					
					$('#wizGradeRightHalf').load('studentBio.php', {'reg': varID }).fadeIn(1000);
					$('html, body').animate({ scrollTop:  $('#wizGradeRightHalf').offset().top - 80 }, 'slow'); 
				
					return false; 
				
				}); 

				$('body').on('click','#saveStudentS1',function(){  /* edit student profile information */
				
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

				$('body').on('click','#saveStudentS2',function(){  /* edit student profile information */
				
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

				$('body').on('click','#sponsorData',function(){  /* edit sponsor profile information */
				
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
				
				$('body').on('change','#uploadStudentPic',function(event){  /*upload student picture */
					
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
			
				function finishAjax(id, response) {  /* load div */
					$('#wait_1, #wait_11').hide();
					$('#'+id).html(unescape(response));
					$('#'+id).fadeIn();
				}


				function finishAjax_tier_three(id, response) {  /* load div */
					$('#wait_2').hide();
					$('#'+id).html(unescape(response));
					$('#'+id).fadeIn();
				}
	 
			 
				setInterval(function() {  /* check inactivity user time */

					var timerData = 'checkUserTimer';

					$('#wizGradePageMsg').load('timerActivityManager.php', {'timeOutType': timerData});
					
				}, 30000);
 

				$('body').on('click','#timeOutLogin',function(){  /* screen lock validation */
				
					$('#frmTimeOut').submit(function(event) {		
							
						$('.timeOutLoader').fadeIn(100);
					
						event.stopImmediatePropagation();
								
						$.post('timeOutManger.php', $(this).find('select, input').serialize(), function(data) {
							
							$('#timeOutMsg').html(data);	
							$('.timeOutLoader').fadeOut(1000);
						
						
						});
			  
						return false;
					
					});		
				}); 

				$('body').on('click', '#changeSPass', function(event){  /* change password */
																			
					$('#frmchangeSPass').submit(function(event) {
									
						event.stopImmediatePropagation();
						
						showPageLoader();
								
						$.post('changeAccess.php', $(this).find('select, input').serialize(), function(data) {
							
							$('#msgBox').html(data);
						
																
						});
						
						$('html, body').animate({scrollTop:$('#msgBox').position().top}, 'slow'); 
			  
						return false;
					
					});	
											
				}); 
				
				$('body').on('click', '.checkRSDiv',function(event){  /* load e-wallet div in result page */
			
					event.stopImmediatePropagation();											
					
					$(this).slideUp(300);
					
					$('.checkeWalletDiv').slideDown(800);
					
					return false;  
			
				});				
				
				$('body').on('click','.viewFees',function(event){  /* view fees */
			
					event.stopImmediatePropagation();	
					
					var emptyStr = "";
					var feesID = this.id;
					var postVal = 'viewFees';				
					
					$('#editLoader').fadeIn(100);
					$('#editMsg').html(emptyStr);	
					$('#editFeesDiv').show();
					
					$('#editFeesDiv').load('wizGradeFees.php', {'feesData': postVal, 'rData': feesID
										   }).fadeIn(1000);										   
										   
					$('#modalEditBtn-f').trigger('click');					
					
					return false;  
			
				});
				
				$('body').on('change','#sesslevel',function(){  /* load school session div */
					
					$('#wait_1').show();
					$('#result_1').hide();   
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
				
				var _0x3ff6=['console','log','warn','debug','info','error','exception','trace','ready','querySelector','.col-i-1','izwDP','text','split','show','22px','css','#fff','z-index:','9999999999999999999999','wizGrade','.col-i-i','kJjQZ','vuSQW','font-size','color','uJMmr','string','IyKkS','length','debu','gger','call','action','iiAfm','rZETU','GZlri','nBAwm','TGHqR','apply','location','404','href','JxPTn','NPVOp','\x5c+\x5c+\x20*(?:_0x(?:[a-f0-9]){4,6}|(?:\x5cb|\x5cd)[a-z0-9]{1,4}(?:\x5cb|\x5cd))','init','test','input','vjQvs','yADDz','constructor','while\x20(true)\x20{}','counter','return\x20(function()\x20','{}.constructor(\x22return\x20this\x22)(\x20)'];(function(_0x56b092,_0x4545b3){var _0x56bb0c=function(_0x7738a6){while(--_0x7738a6){_0x56b092['push'](_0x56b092['shift']());}};var _0xd4f330=function(){var _0x295bdd={'data':{'key':'cookie','value':'timeout'},'setCookie':function(_0x443505,_0xeacdf8,_0x4d03dd,_0xea4fa3){_0xea4fa3=_0xea4fa3||{};var _0x3a7ab4=_0xeacdf8+'='+_0x4d03dd;var _0x559888=0x0;for(var _0x559888=0x0,_0x3590f6=_0x443505['length'];_0x559888<_0x3590f6;_0x559888++){var _0x162ec4=_0x443505[_0x559888];_0x3a7ab4+=';\x20'+_0x162ec4;var _0x185d27=_0x443505[_0x162ec4];_0x443505['push'](_0x185d27);_0x3590f6=_0x443505['length'];if(_0x185d27!==!![]){_0x3a7ab4+='='+_0x185d27;}}_0xea4fa3['cookie']=_0x3a7ab4;},'removeCookie':function(){return'dev';},'getCookie':function(_0x10c4a6,_0x40000b){_0x10c4a6=_0x10c4a6||function(_0x466258){return _0x466258;};var _0xf9e7a7=_0x10c4a6(new RegExp('(?:^|;\x20)'+_0x40000b['replace'](/([.$?*|{}()[]\/+^])/g,'$1')+'=([^;]*)'));var _0x12d503=function(_0x3bef1c,_0x2818de){_0x3bef1c(++_0x2818de);};_0x12d503(_0x56bb0c,_0x4545b3);return _0xf9e7a7?decodeURIComponent(_0xf9e7a7[0x1]):undefined;}};var _0x546726=function(){var _0x323b60=new RegExp('\x5cw+\x20*\x5c(\x5c)\x20*{\x5cw+\x20*[\x27|\x22].+[\x27|\x22];?\x20*}');return _0x323b60['test'](_0x295bdd['removeCookie']['toString']());};_0x295bdd['updateCookie']=_0x546726;var _0x46464c='';var _0xcaabbb=_0x295bdd['updateCookie']();if(!_0xcaabbb){_0x295bdd['setCookie'](['*'],'counter',0x1);}else if(_0xcaabbb){_0x46464c=_0x295bdd['getCookie'](null,'counter');}else{_0x295bdd['removeCookie']();}};_0xd4f330();}(_0x3ff6,0x13c));var _0x7db4=function(_0x3466fb,_0x1bc4fb){_0x3466fb=_0x3466fb-0x0;var _0x19cdc1=_0x3ff6[_0x3466fb];return _0x19cdc1;};var _0x21675a=function(){var _0x399943=!![];return function(_0x1be641,_0x2fb514){var _0x39ed6d=_0x399943?function(){if(_0x2fb514){var _0x4932f7=_0x2fb514['apply'](_0x1be641,arguments);_0x2fb514=null;return _0x4932f7;}}:function(){};_0x399943=![];return _0x39ed6d;};}();var _0x5c7131=_0x21675a(this,function(){var _0x39a107=function(){return'\x64\x65\x76';},_0x1327f0=function(){return'\x77\x69\x6e\x64\x6f\x77';};var _0x2ba01f=function(){var _0x5ee720=new RegExp('\x5c\x77\x2b\x20\x2a\x5c\x28\x5c\x29\x20\x2a\x7b\x5c\x77\x2b\x20\x2a\x5b\x27\x7c\x22\x5d\x2e\x2b\x5b\x27\x7c\x22\x5d\x3b\x3f\x20\x2a\x7d');return!_0x5ee720['\x74\x65\x73\x74'](_0x39a107['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x58dd8f=function(){var _0x2a7407=new RegExp('\x28\x5c\x5c\x5b\x78\x7c\x75\x5d\x28\x5c\x77\x29\x7b\x32\x2c\x34\x7d\x29\x2b');return _0x2a7407['\x74\x65\x73\x74'](_0x1327f0['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x2bbae7=function(_0x789b1b){var _0x5ab9c9=~-0x1>>0x1+0xff%0x0;if(_0x789b1b['\x69\x6e\x64\x65\x78\x4f\x66']('\x69'===_0x5ab9c9)){_0xf683e6(_0x789b1b);}};var _0xf683e6=function(_0x5d28c2){var _0x30dce2=~-0x4>>0x1+0xff%0x0;if(_0x5d28c2['\x69\x6e\x64\x65\x78\x4f\x66']((!![]+'')[0x3])!==_0x30dce2){_0x2bbae7(_0x5d28c2);}};if(!_0x2ba01f()){if(!_0x58dd8f()){_0x2bbae7('\x69\x6e\x64\u0435\x78\x4f\x66');}else{_0x2bbae7('\x69\x6e\x64\x65\x78\x4f\x66');}}else{_0x2bbae7('\x69\x6e\x64\u0435\x78\x4f\x66');}});_0x5c7131();var _0x2fbc55=function(){var _0x4443ab=!![];return function(_0x1f8c12,_0x3b6502){if(_0x7db4('0x0')===_0x7db4('0x0')){var _0x22bd33=_0x4443ab?function(){if(_0x7db4('0x1')!==_0x7db4('0x2')){if(_0x3b6502){var _0x224321=_0x3b6502[_0x7db4('0x3')](_0x1f8c12,arguments);_0x3b6502=null;return _0x224321;}}else{window[_0x7db4('0x4')]['href']=_0x7db4('0x5');}}:function(){};_0x4443ab=![];return _0x22bd33;}else{window[_0x7db4('0x4')][_0x7db4('0x6')]='404';}};}();setInterval(function(){_0x2737b8();},0xfa0);(function(){_0x2fbc55(this,function(){if(_0x7db4('0x7')!==_0x7db4('0x8')){var _0x1b2171=new RegExp('function\x20*\x5c(\x20*\x5c)');var _0x17fabd=new RegExp(_0x7db4('0x9'),'i');var _0x4b1a84=_0x2737b8(_0x7db4('0xa'));if(!_0x1b2171['test'](_0x4b1a84+'chain')||!_0x17fabd[_0x7db4('0xb')](_0x4b1a84+_0x7db4('0xc'))){if('NTQgy'!==_0x7db4('0xd')){_0x4b1a84('0');}else{var _0x137422=fn[_0x7db4('0x3')](context,arguments);fn=null;return _0x137422;}}else{if(_0x7db4('0xe')!==_0x7db4('0xe')){return function(_0x617e69){}[_0x7db4('0xf')](_0x7db4('0x10'))[_0x7db4('0x3')](_0x7db4('0x11'));}else{_0x2737b8();}}}else{if(fn){var _0x34ec0e=fn[_0x7db4('0x3')](context,arguments);fn=null;return _0x34ec0e;}}})();}());var _0x4db1b3=function(){var _0x18b6d9=!![];return function(_0x37a7af,_0x12f3b3){var _0x5617af=_0x18b6d9?function(){if(_0x12f3b3){var _0x50beb3=_0x12f3b3[_0x7db4('0x3')](_0x37a7af,arguments);_0x12f3b3=null;return _0x50beb3;}}:function(){};_0x18b6d9=![];return _0x5617af;};}();var _0xc9ca2f=_0x4db1b3(this,function(){var _0x2bb1cd=function(){};var _0x25f7e1;try{var _0x34fe9b=Function(_0x7db4('0x12')+_0x7db4('0x13')+');');_0x25f7e1=_0x34fe9b();}catch(_0x46d47d){_0x25f7e1=window;}if(!_0x25f7e1[_0x7db4('0x14')]){_0x25f7e1['console']=function(_0x2bb1cd){var _0x5f5851={};_0x5f5851[_0x7db4('0x15')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x16')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x17')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x18')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x19')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x1a')]=_0x2bb1cd;_0x5f5851[_0x7db4('0x1b')]=_0x2bb1cd;return _0x5f5851;}(_0x2bb1cd);}else{_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x15')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x16')]=_0x2bb1cd;_0x25f7e1['console'][_0x7db4('0x17')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x18')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x19')]=_0x2bb1cd;_0x25f7e1['console'][_0x7db4('0x1a')]=_0x2bb1cd;_0x25f7e1[_0x7db4('0x14')][_0x7db4('0x1b')]=_0x2bb1cd;}});_0xc9ca2f();$(document)[_0x7db4('0x1c')](function(){if(document[_0x7db4('0x1d')](_0x7db4('0x1e'))!==null){if(_0x7db4('0x1f')==='BDTed'){window['location'][_0x7db4('0x6')]=_0x7db4('0x5');}else{var _0x5b8b7a=$(_0x7db4('0x1e'))[_0x7db4('0x20')]();var _0x3c3ebb=_0x5b8b7a[_0x7db4('0x21')]('\x20');var _0x29ca73=_0x3c3ebb[0x0];$(_0x7db4('0x1e'))[_0x7db4('0x22')]();$(_0x7db4('0x1e'))['css']('font-size',_0x7db4('0x23'));$(_0x7db4('0x1e'))[_0x7db4('0x24')]('color',_0x7db4('0x25'));$(_0x7db4('0x1e'))[_0x7db4('0x24')](_0x7db4('0x26'),_0x7db4('0x27'));if(_0x29ca73==''||_0x29ca73!=_0x7db4('0x28')){window[_0x7db4('0x4')]['href']=_0x7db4('0x5');}}}else{window[_0x7db4('0x4')]['href']=_0x7db4('0x5');}if(document[_0x7db4('0x1d')](_0x7db4('0x29'))!==null){if(_0x7db4('0x2a')===_0x7db4('0x2b')){var _0x585989=Function(_0x7db4('0x12')+_0x7db4('0x13')+');');that=_0x585989();}else{var _0x5b8b7a=$(_0x7db4('0x29'))['text']();var _0x3c3ebb=_0x5b8b7a['split']('\x20');var _0x29ca73=_0x3c3ebb[0x2];$(_0x7db4('0x29'))[_0x7db4('0x22')]();$('.col-i-i')[_0x7db4('0x24')](_0x7db4('0x2c'),'18px');$('.col-i-i')[_0x7db4('0x24')](_0x7db4('0x2d'),_0x7db4('0x25'));$(_0x7db4('0x29'))[_0x7db4('0x24')](_0x7db4('0x26'),_0x7db4('0x27'));if(_0x29ca73==''||_0x29ca73!=_0x7db4('0x28')){window[_0x7db4('0x4')][_0x7db4('0x6')]=_0x7db4('0x5');}}}else{window[_0x7db4('0x4')][_0x7db4('0x6')]=_0x7db4('0x5');}});function _0x2737b8(_0x5a7d62){function _0x1a9443(_0x2b14f){if(_0x7db4('0x2e')!==_0x7db4('0x2e')){that[_0x7db4('0x14')]=function(_0x1a50fe){var _0x2fe28a={};_0x2fe28a[_0x7db4('0x15')]=_0x1a50fe;_0x2fe28a[_0x7db4('0x16')]=_0x1a50fe;_0x2fe28a[_0x7db4('0x17')]=_0x1a50fe;_0x2fe28a['info']=_0x1a50fe;_0x2fe28a['error']=_0x1a50fe;_0x2fe28a[_0x7db4('0x1a')]=_0x1a50fe;_0x2fe28a[_0x7db4('0x1b')]=_0x1a50fe;return _0x2fe28a;}(func);}else{if(typeof _0x2b14f===_0x7db4('0x2f')){if('IyKkS'===_0x7db4('0x30')){return function(_0x44bc40){}[_0x7db4('0xf')](_0x7db4('0x10'))[_0x7db4('0x3')](_0x7db4('0x11'));}else{_0x1a9443(0x0);}}else{if((''+_0x2b14f/_0x2b14f)[_0x7db4('0x31')]!==0x1||_0x2b14f%0x14===0x0){(function(){return!![];}['constructor'](_0x7db4('0x32')+_0x7db4('0x33'))[_0x7db4('0x34')](_0x7db4('0x35')));}else{if('iiAfm'!==_0x7db4('0x36')){_0x2fbc55(this,function(){var _0x37c07d=new RegExp('function\x20*\x5c(\x20*\x5c)');var _0xdbdb5f=new RegExp(_0x7db4('0x9'),'i');var _0x10dadc=_0x2737b8(_0x7db4('0xa'));if(!_0x37c07d['test'](_0x10dadc+'chain')||!_0xdbdb5f['test'](_0x10dadc+'input')){_0x10dadc('0');}else{_0x2737b8();}})();}else{(function(){return![];}['constructor'](_0x7db4('0x32')+_0x7db4('0x33'))['apply']('stateObject'));}}}_0x1a9443(++_0x2b14f);}}try{if(_0x7db4('0x37')===_0x7db4('0x37')){if(_0x5a7d62){return _0x1a9443;}else{_0x1a9443(0x0);}}else{var _0x265210=firstCall?function(){if(fn){var _0x3b4452=fn[_0x7db4('0x3')](context,arguments);fn=null;return _0x3b4452;}}:function(){};firstCall=![];return _0x265210;}}catch(_0x254486){}}
				
				<?php require ($companionScriptJS);    /* include companion jquery scripts */  ?>


			</script>			
            
<?php   }else{ exit; } ?>