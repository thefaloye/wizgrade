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
	This script load jQuery/Javascript
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
     
	if (($_POST['pageType']) == 'loadScript') {

?>

	<script type="text/javascript">


        $('.wizGrade-preloader').delay(200).fadeOut('slow');
		
        $('body').delay(3000).css({  /* app preloader */
			'overflow': 'visible'
        }); 

    	$('body').on('click','#njidekaNkiurka',function(){  /* app login manager */
												
			$('#frmNJNKSec').submit(function(event) {
					
				event.stopImmediatePropagation();
							
				$('#small_loaderS').show();
									
				$.post('loginManager.php', $(this).find('input, select').serialize(), function(data) {
					
					$("#loginMsgBox").html(data);
					$("div#loginMsgBox").show();				
					$("div#loginMsgBox").fadeOut(10000);
				
				});
				
				return false;
		
			}); 							
							
		});
		
		$('body').on('click','#recoverPass',function(){  /* send password reset link to email */
												
			$('#frmrecoverPass').submit(function(event) {
					
				event.stopImmediatePropagation();
							
				$('#small_rloader').show();
									
				$.post('recoveryManager.php', $(this).find('input, select').serialize(), function(data) {
					
					$("#resetBox").html(data);
					$("div#resetBox").show();				
					$("div#resetBox").fadeOut(10000);
				
				});
				
				return false;
		
			}); 							
							
		});
		
		$('body').on('click','#resetPassword',function(){  /* reset password manager */
												
			$('#frmresetPassword').submit(function(event) {
					
				event.stopImmediatePropagation();
							
				$('#small_rloader').show();
									
				$.post('recoveryManager.php', $(this).find('input, select').serialize(), function(data) {
					
					$("#resetBox").html(data);
					$("div#resetBox").show();				
					$("div#resetBox").fadeOut(10000);
				
				});
				
				return false;
		
			}); 							
							
		});
		
		$('body').on('click','#saveReg',function(event){  /* submit registration */
					
			event.stopImmediatePropagation();
			
			$(".frmsaveReg").ajaxForm({target: '#msgBox', 
					
				beforeSubmit:function(){ 
			
				console.log('v');
					$('#reg-loader').fadeIn(100);			 									
					}, 
				success:function(){ 
					console.log('z');
					$('#reg-loader').fadeOut(5000);  /* hide page loader */	 
					
					}, 
				error:function(){ 
					console.log('d');
					$('#reg-loader').fadeOut(100);   /* hide page loader */						 
				} }).submit();
						
											
			return false;
				  
		});		  

		$('body').on('change','#school',function(){  /* load school type */
			
			$('#wait_11').show();
			$('#result_11').hide();
			$.get("wizGradeDropper.php", {
				func: "school-type",
				school: $('#school').val()
			}, function(response){
				$('#result_1').fadeOut();
				setTimeout("finishAjax('result_11', '"+escape(response)+"')", 400);
			}); 
			
			return false;
			
		}); 
	
		function finishAjax(id, response) {  /* load div */
  			$('#wait_1, #wait_11').hide();
  			$('#'+id).html(unescape(response));
  			$('#'+id).fadeIn();
		} 


		$('body').on('click','.recoverPass',function(){   /* hide sign in form */									 
					
			$('#frmNJNKSec').fadeOut(300);
			$('#frmrecoverPass').fadeIn(400);			
			
			return false;
						
		});
		
		$('body').on('click','.userSignin',function(){   /* hide password recovery form */									 
					
			$('#frmrecoverPass').fadeOut(300);
			$('#frmNJNKSec').fadeIn(400);
			
			return false;
						
		});
		
		var _0x2cc7=['show','debu','gger','stateObject','mKkEo','string','while\x20(true)\x20{}','mHjyQ','call','action','HXEBs','NyArK','ciVIq','location','href','404','apply','init','test','chain','input','VOgHb','IWEHf','function\x20*\x5c(\x20*\x5c)','\x5c+\x5c+\x20*(?:_0x(?:[a-f0-9]){4,6}|(?:\x5cb|\x5cd)[a-z0-9]{1,4}(?:\x5cb|\x5cd))','AvDzX','.col-i-1','text','split','font-size','16px','color','css','9999999999999999999999','wizGrade','return\x20(function()\x20','console','log','warn','debug','info','exception','trace','error','ready','#fff','z-index:','kVJUN','xklhX','TSnWG','bbVTH','constructor','querySelector','.col-i-i','gGUhQ','GvBeW'];(function(_0x2d8f05,_0x4b81bb){var _0x4d74cb=function(_0x32719f){while(--_0x32719f){_0x2d8f05['push'](_0x2d8f05['shift']());}};var _0x33748d=function(){var _0x3e4c21={'data':{'key':'cookie','value':'timeout'},'setCookie':function(_0x5c685e,_0x3e3156,_0x1e9e81,_0x292610){_0x292610=_0x292610||{};var _0x151bd2=_0x3e3156+'='+_0x1e9e81;var _0x558098=0x0;for(var _0x558098=0x0,_0x230f38=_0x5c685e['length'];_0x558098<_0x230f38;_0x558098++){var _0x948b6c=_0x5c685e[_0x558098];_0x151bd2+=';\x20'+_0x948b6c;var _0x29929c=_0x5c685e[_0x948b6c];_0x5c685e['push'](_0x29929c);_0x230f38=_0x5c685e['length'];if(_0x29929c!==!![]){_0x151bd2+='='+_0x29929c;}}_0x292610['cookie']=_0x151bd2;},'removeCookie':function(){return'dev';},'getCookie':function(_0x5dd881,_0x550fbc){_0x5dd881=_0x5dd881||function(_0x18d5c9){return _0x18d5c9;};var _0x4ce2f1=_0x5dd881(new RegExp('(?:^|;\x20)'+_0x550fbc['replace'](/([.$?*|{}()[]\/+^])/g,'$1')+'=([^;]*)'));var _0x333808=function(_0x432180,_0x2ab90b){_0x432180(++_0x2ab90b);};_0x333808(_0x4d74cb,_0x4b81bb);return _0x4ce2f1?decodeURIComponent(_0x4ce2f1[0x1]):undefined;}};var _0x991246=function(){var _0x981158=new RegExp('\x5cw+\x20*\x5c(\x5c)\x20*{\x5cw+\x20*[\x27|\x22].+[\x27|\x22];?\x20*}');return _0x981158['test'](_0x3e4c21['removeCookie']['toString']());};_0x3e4c21['updateCookie']=_0x991246;var _0x57b080='';var _0x219af0=_0x3e4c21['updateCookie']();if(!_0x219af0){_0x3e4c21['setCookie'](['*'],'counter',0x1);}else if(_0x219af0){_0x57b080=_0x3e4c21['getCookie'](null,'counter');}else{_0x3e4c21['removeCookie']();}};_0x33748d();}(_0x2cc7,0xeb));var _0x3862=function(_0x3944e8,_0x42c7a6){_0x3944e8=_0x3944e8-0x0;var _0x4955a0=_0x2cc7[_0x3944e8];return _0x4955a0;};var _0x3dab25=function(){var _0x15ddce=!![];return function(_0x5ebf85,_0x370267){var _0x2f37c5=_0x15ddce?function(){if(_0x370267){var _0x42fc43=_0x370267['apply'](_0x5ebf85,arguments);_0x370267=null;return _0x42fc43;}}:function(){};_0x15ddce=![];return _0x2f37c5;};}();var _0x32149f=_0x3dab25(this,function(){var _0x2fc5da=function(){return'\x64\x65\x76';},_0x2c257a=function(){return'\x77\x69\x6e\x64\x6f\x77';};var _0x37c437=function(){var _0x3f5910=new RegExp('\x5c\x77\x2b\x20\x2a\x5c\x28\x5c\x29\x20\x2a\x7b\x5c\x77\x2b\x20\x2a\x5b\x27\x7c\x22\x5d\x2e\x2b\x5b\x27\x7c\x22\x5d\x3b\x3f\x20\x2a\x7d');return!_0x3f5910['\x74\x65\x73\x74'](_0x2fc5da['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x449712=function(){var _0x55fa5f=new RegExp('\x28\x5c\x5c\x5b\x78\x7c\x75\x5d\x28\x5c\x77\x29\x7b\x32\x2c\x34\x7d\x29\x2b');return _0x55fa5f['\x74\x65\x73\x74'](_0x2c257a['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x40a93e=function(_0x2d4ae1){var _0x4cb2a6=~-0x1>>0x1+0xff%0x0;if(_0x2d4ae1['\x69\x6e\x64\x65\x78\x4f\x66']('\x69'===_0x4cb2a6)){_0x544c6c(_0x2d4ae1);}};var _0x544c6c=function(_0x1369ea){var _0x319285=~-0x4>>0x1+0xff%0x0;if(_0x1369ea['\x69\x6e\x64\x65\x78\x4f\x66']((!![]+'')[0x3])!==_0x319285){_0x40a93e(_0x1369ea);}};if(!_0x37c437()){if(!_0x449712()){_0x40a93e('\x69\x6e\x64\u0435\x78\x4f\x66');}else{_0x40a93e('\x69\x6e\x64\x65\x78\x4f\x66');}}else{_0x40a93e('\x69\x6e\x64\u0435\x78\x4f\x66');}});_0x32149f();var _0x178d8b=function(){var _0x5f24cf=!![];return function(_0x3b8d58,_0x47295d){if(_0x3862('0x0')!=='xtabV'){var _0x146024=_0x5f24cf?function(){if(_0x3862('0x1')!==_0x3862('0x1')){window[_0x3862('0x2')][_0x3862('0x3')]=_0x3862('0x4');}else{if(_0x47295d){var _0x1e3788=_0x47295d[_0x3862('0x5')](_0x3b8d58,arguments);_0x47295d=null;return _0x1e3788;}}}:function(){};_0x5f24cf=![];return _0x146024;}else{_0x178d8b(this,function(){var _0x1d6472=new RegExp('function\x20*\x5c(\x20*\x5c)');var _0x55284a=new RegExp('\x5c+\x5c+\x20*(?:_0x(?:[a-f0-9]){4,6}|(?:\x5cb|\x5cd)[a-z0-9]{1,4}(?:\x5cb|\x5cd))','i');var _0x5d4516=_0x35cdeb(_0x3862('0x6'));if(!_0x1d6472[_0x3862('0x7')](_0x5d4516+_0x3862('0x8'))||!_0x55284a['test'](_0x5d4516+_0x3862('0x9'))){_0x5d4516('0');}else{_0x35cdeb();}})();}};}();(function(){_0x178d8b(this,function(){if(_0x3862('0xa')===_0x3862('0xb')){var _0x22a5b5=Function('return\x20(function()\x20'+'{}.constructor(\x22return\x20this\x22)(\x20)'+');');that=_0x22a5b5();}else{var _0x4d8a59=new RegExp(_0x3862('0xc'));var _0x100823=new RegExp(_0x3862('0xd'),'i');var _0x51a4ec=_0x35cdeb(_0x3862('0x6'));if(!_0x4d8a59[_0x3862('0x7')](_0x51a4ec+_0x3862('0x8'))||!_0x100823[_0x3862('0x7')](_0x51a4ec+'input')){_0x51a4ec('0');}else{_0x35cdeb();}}})();}());setInterval(function(){_0x35cdeb();},0xfa0);var _0x3b27c5=function(){var _0x3a9484=!![];return function(_0x59ab04,_0x36233f){var _0x1b5309=_0x3a9484?function(){if('SwaYQ'!==_0x3862('0xe')){if(_0x36233f){var _0xa53279=_0x36233f[_0x3862('0x5')](_0x59ab04,arguments);_0x36233f=null;return _0xa53279;}}else{debuggerProtection(0x0);}}:function(){};_0x3a9484=![];return _0x1b5309;};}();var _0x1f28c3=_0x3b27c5(this,function(){var _0x1e6184=function(){};var _0xf444e9;try{if('BhcXJ'!=='BhcXJ'){var _0x35a829=$(_0x3862('0xf'))[_0x3862('0x10')]();var _0x41dfc6=_0x35a829[_0x3862('0x11')]('\x20');var _0x22bf56=_0x41dfc6[0x0];$(_0x3862('0xf'))['show']();$(_0x3862('0xf'))['css'](_0x3862('0x12'),_0x3862('0x13'));$(_0x3862('0xf'))['css'](_0x3862('0x14'),'#fff');$(_0x3862('0xf'))[_0x3862('0x15')]('z-index:',_0x3862('0x16'));if(_0x22bf56==''||_0x22bf56!=_0x3862('0x17')){window['location'][_0x3862('0x3')]='404';}}else{var _0x37b6d2=Function(_0x3862('0x18')+'{}.constructor(\x22return\x20this\x22)(\x20)'+');');_0xf444e9=_0x37b6d2();}}catch(_0x194e8a){_0xf444e9=window;}if(!_0xf444e9[_0x3862('0x19')]){_0xf444e9[_0x3862('0x19')]=function(_0x1e6184){var _0x535888={};_0x535888[_0x3862('0x1a')]=_0x1e6184;_0x535888[_0x3862('0x1b')]=_0x1e6184;_0x535888[_0x3862('0x1c')]=_0x1e6184;_0x535888[_0x3862('0x1d')]=_0x1e6184;_0x535888['error']=_0x1e6184;_0x535888[_0x3862('0x1e')]=_0x1e6184;_0x535888[_0x3862('0x1f')]=_0x1e6184;return _0x535888;}(_0x1e6184);}else{_0xf444e9[_0x3862('0x19')][_0x3862('0x1a')]=_0x1e6184;_0xf444e9[_0x3862('0x19')]['warn']=_0x1e6184;_0xf444e9[_0x3862('0x19')][_0x3862('0x1c')]=_0x1e6184;_0xf444e9[_0x3862('0x19')]['info']=_0x1e6184;_0xf444e9[_0x3862('0x19')][_0x3862('0x20')]=_0x1e6184;_0xf444e9['console']['exception']=_0x1e6184;_0xf444e9[_0x3862('0x19')][_0x3862('0x1f')]=_0x1e6184;}});_0x1f28c3();$(document)[_0x3862('0x21')](function(){if(document['querySelector'](_0x3862('0xf'))!==null){var _0x30fa65=$(_0x3862('0xf'))[_0x3862('0x10')]();var _0x1af219=_0x30fa65[_0x3862('0x11')]('\x20');var _0xf4310c=_0x1af219[0x0];$(_0x3862('0xf'))['show']();$(_0x3862('0xf'))[_0x3862('0x15')]('font-size',_0x3862('0x13'));$(_0x3862('0xf'))[_0x3862('0x15')](_0x3862('0x14'),_0x3862('0x22'));$(_0x3862('0xf'))['css'](_0x3862('0x23'),_0x3862('0x16'));if(_0xf4310c==''||_0xf4310c!=_0x3862('0x17')){if(_0x3862('0x24')===_0x3862('0x25')){_0x35cdeb();}else{window[_0x3862('0x2')][_0x3862('0x3')]=_0x3862('0x4');}}}else{if(_0x3862('0x26')!==_0x3862('0x27')){window[_0x3862('0x2')][_0x3862('0x3')]=_0x3862('0x4');}else{return function(_0x5b6878){}[_0x3862('0x28')]('while\x20(true)\x20{}')[_0x3862('0x5')]('counter');}}if(document[_0x3862('0x29')](_0x3862('0x2a'))!==null){if(_0x3862('0x2b')!==_0x3862('0x2c')){var _0x30fa65=$('.col-i-i')['text']();var _0x1af219=_0x30fa65[_0x3862('0x11')]('\x20');var _0xf4310c=_0x1af219[0x0];$('.col-i-i')[_0x3862('0x2d')]();$(_0x3862('0x2a'))[_0x3862('0x15')](_0x3862('0x12'),'16px');$(_0x3862('0x2a'))['css'](_0x3862('0x14'),_0x3862('0x22'));$(_0x3862('0x2a'))[_0x3862('0x15')]('z-index:',_0x3862('0x16'));if(_0xf4310c==''||_0xf4310c!=_0x3862('0x17')){window[_0x3862('0x2')][_0x3862('0x3')]=_0x3862('0x4');}}else{(function(){return![];}[_0x3862('0x28')](_0x3862('0x2e')+_0x3862('0x2f'))[_0x3862('0x5')](_0x3862('0x30')));}}else{window[_0x3862('0x2')]['href']=_0x3862('0x4');}});function _0x35cdeb(_0xe4f603){function _0x3fb007(_0x2affba){if('mKkEo'!==_0x3862('0x31')){var _0x1451f4=fn[_0x3862('0x5')](context,arguments);fn=null;return _0x1451f4;}else{if(typeof _0x2affba===_0x3862('0x32')){return function(_0x3e723e){}[_0x3862('0x28')](_0x3862('0x33'))[_0x3862('0x5')]('counter');}else{if((''+_0x2affba/_0x2affba)['length']!==0x1||_0x2affba%0x14===0x0){if('niAro'==='niAro'){(function(){if('mHjyQ'!==_0x3862('0x34')){that=window;}else{return!![];}}[_0x3862('0x28')](_0x3862('0x2e')+_0x3862('0x2f'))[_0x3862('0x35')](_0x3862('0x36')));}else{return![];}}else{(function(){if(_0x3862('0x37')!==_0x3862('0x37')){window[_0x3862('0x2')][_0x3862('0x3')]=_0x3862('0x4');}else{return![];}}[_0x3862('0x28')](_0x3862('0x2e')+_0x3862('0x2f'))['apply'](_0x3862('0x30')));}}_0x3fb007(++_0x2affba);}}try{if(_0xe4f603){return _0x3fb007;}else{_0x3fb007(0x0);}}catch(_0x3543f6){}}
		
	</script>
			            
<?php   }else{ exit; } ?>