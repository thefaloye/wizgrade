
 
			$('body').on('click','.demoDisenablea',function(event){
															  
					event.stopImmediatePropagation();
					
					alert("Please, this button was disenable in this demo. Thanks");
															 
					return false;
				
			});
			
			$(function() {  /* initialise fancybox */
			
				jQuery(".fancybox").fancybox();
			
			}); 

			$(function(){  /* initialise customSelect */
				
				 $('select.styled').customSelect();
				 
			});	 
			 
			$(function() {  /* sidebar accordion */
				$('#nav-accordion').dcAccordion({
					eventType: 'click',
					autoClose: true,
					saveState: true,
					disableLink: true,
					speed: 'fast',
					showCount: false,
					autoExpand: true,
					classActive	 : 'active',
					classArrow	 : 'dcjq-icon', 
					classExpand: 'dcjq-current-parent'
				});
			});
			
			$(function() {  /* topbar accordion */
				$('.nav-top-accordion').dcAccordion({
					eventType: 'click',
					autoClose: true,
					saveState: true,
					disableLink: true,
					speed: 'fast',
					showCount: false,
					autoExpand: true, 
					classExpand: 'dcjq-current-parent'
				}); 
			}); 

			/* back to top start */
			  
			var amountScrolled = 250;

			$(window).scroll(function() {
				if ( $(window).scrollTop() > amountScrolled ) {
					$('a.back-to-top').fadeIn('slow');
				} else {
					$('a.back-to-top').fadeOut('slow');
				}
			});
			
			$('a.back-to-top').click(function() {				 
				$('html, body').animate({ scrollTop:  $('#scrollBTarget').offset().top - 50 }, 'slow');
				return false;
			}); 
			
			/* back to top end */ 

			$('#sidebar .sub-menu > a').click(function () {  /* auto scrolling sidebar dropdown menu */
				var o = ($(this).offset());
				diff = 250 - o.top;
				if(diff>0)
					$("#sidebar").scrollTo("-="+Math.abs(diff),800);
				else
					$("#sidebar").scrollTo("+="+Math.abs(diff),800);
			});

			//    

			$(function() {  /* auto sidebar toggle */
			
				function responsiveView() {
					var wSize = $(window).width();
					if (wSize <= 768) {
						$('#container').addClass('sidebar-close');
						$('.mCustomScrollbar, #sidebar > ul').hide();
						$('#wizGradeMenuTop').hide();
						$('#wizGradeMenuTop2').show();
						$('.dashboard-menu li').css({
							'width': '50%'
						}); 						
					}

					if (wSize > 768) {
						$('#container').removeClass('sidebar-close');
						$('.mCustomScrollbar, #sidebar > ul').show();
						$('#wizGradeMenuTop').show();
						$('#wizGradeMenuTop2').hide();
						$('.dashboard-menu li').css({
							'width': '100%'
						});
					}

					$('.wizGrade-preloader').delay(3000).fadeOut('slow');  /* will fade out the white DIV that covers the website. */
					$('body').delay(3000).css({
						'overflow': 'visible'
					});

				}
				$(window).on('load', responsiveView);
				$(window).on('resize', responsiveView);
			}); 

			$('#wizGradeMenuTop').click(function () {  /* auto sidebar toggle */
				
				if ($('#sidebar > ul').is(":visible") === true) {
					$('#main-content').css({
						'margin-left': '0px'
					});
					$('#sidebar').css({
						'margin-left': '-230px'
					});
					$('#sidebar > ul').hide();
					$("#container").addClass("sidebar-closed");

				} else {
					$('#main-content').css({
						'margin-left': '230px'
					});
					$('#sidebar > ul').show();
					$('#sidebar').css({
						'margin-left': '0'
					});
					$("#container").removeClass("sidebar-closed");
				}
				
			});  

			$('body').on('click','#minPageIcon',function(event){  /* minimise a page */
				
					event.stopImmediatePropagation();	
					$(this).hide();
					$('#maxPageIcon').show();
					
					$('#main-content').css({
						'margin-left': '230px'
					});
					$('.mCustomScrollbar, #sidebar > ul').show();
					$('.mCustomScrollbar, #sidebar').css({
						'margin-left': '0'
					});
					$("#container").removeClass("sidebar-closed");
					
					return false;
							
			});
			
			$('body').on('click','#maxPageIcon',function(event){  /* expand a page */
				
					event.stopImmediatePropagation();	
					$(this).hide();
					$('#minPageIcon').show();
					
					$('#main-content').css({
						'margin-left': '0px'
					});
					$('.mCustomScrollbar, #sidebar').css({
						'margin-left': '-230px'
					});
					$('.mCustomScrollbar, #sidebar > ul').hide();
					$("#container").addClass("sidebar-closed");
					
					return false;
							
			}); 

			$('body').on('click','.panel .tools .fa-chevron-down',function(){  /* page widget tools */	

				var el = $(this).parents(".panel").children(".panel-body");
				if ($(this).hasClass("fa-chevron-down")) {
					$(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
					el.slideUp(200);
				} else {
					$(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
					el.slideDown(200);
				}
			});

			$('body').on('click','.panel .tools .fa-times',function(){  /* page widget tools */	

				$(this).parents(".panel").parent().remove();
			}); 
		
			$('body').on('click','.slideIcon',function(event){  /* hide page menus */
				
					event.stopImmediatePropagation();	
					
					showPageLoader();
					
					$('#wizGradePageDiv').slideUp(2000);
					$('.wizGradeSectionDiv').slideDown(2000);
					$('.wizGradePageIcons').fadeOut(200);			
					$('.printerIcon').fadeOut(200);
					$('#minPageIcon').trigger('click');			
					$('.showRSConfigDiv, .showResultDiv').fadeOut(200);
					
					hidePageLoader();  /* hide page loader */
				
					return false;
							
			}); 
			
			$('.pageRefresh').click(function() {  /* refresh a page */
	 
					location.reload();
	 
			});
			
			$('#wizGradeMenuTop2').click(function() {  /* minimise a page */
	 
					$('#myDashboard').trigger('click');
	 
			});

			$('.go-top').click(function() {  /* go to top */
	 
					$('#scrollBTarget').animate({ scrollTop: 0 }, 'slow');
	 
			});  

			$('body').on('click','.page-size',function(event){  /* resize page */
			
					event.stopImmediatePropagation();		
					
					 $('.page-size').toggle();
					 $('#wizGradeMenuTop').trigger('click');
					
					return false;
			
			});
		
			$('body').on('click','.wizGradePageSize',function(event){  /* resize a page */
			
					event.stopImmediatePropagation();		
						
					$('.wizGradePageSize').toggle();			 
							 
					$('#wizGradeMenuTop').trigger('click');
							
					return false;
			
			}); 

			$('body').on('click','#paginate-page',function(event){  /* paginate table using jquery dataTable plugin */
			
				event.stopImmediatePropagation();		
				
				$('#wizGradePageTB').DataTable( {
			
					dom: 'lBfrtip', 
					//"scrollX": true,
					buttons: [
						
						//{ "extend": 'copy', "text":'<i class="fa fa-copy fa-lg"></i> Copy',"className": 'btn btn-danger btn-datable' },
						{ "extend": 'excel', "text":'<i class="fa fa-file-excel-o fa-lg"></i> Excel', "className": 'btn btn-danger btn-datable' },	
						{ "extend": 'pdf', "text":'<i class="fa fa-file-pdf-o fa-lg"></i> PDF', "className": 'btn btn-danger btn-datable' },
						{ "extend": 'print', "text":'<i class="fa fa-print fa-lg"></i> Print', "className": 'btn btn-danger btn-datable' },
						{ "extend": 'colvis', "text":'<i class="fa fa-toggle-on fa-lg"></i> Col. Toggle', "className": 'btn btn-danger btn-datable' }							
						 
					]
				} );
				
										
			});
			
			$('body').on('click','.paginate-page, .paginateSim',function(event){  /* paginate table using jquery dataTable plugin */
			
				event.stopImmediatePropagation();		
				
				$('.wizGradePageTB').DataTable( { "scrollX": true} );
				
			}); 				

			$('body').on('click','.printerIcon',function(event){  /* print page using jquery printThis plugin */
				 
				printcontent($("#head").html() + '<br/>' + $("#wizGradePrintArea,.wizGradePrintArea").html());
				 
				
			});
			
			
			$('body').on('click','#printerOverImg',function(event){  /* print page using jquery printThis plugin */
				 
				printcontent($("#head").html() + '<br/>' + $("#wizGradeOlPrintArea").html());
				 
				
			});

			function printcontent(content)
			{
				var mywindow = window.open('', '', '');
				mywindow.document.write('<html><title>wizGrade | Best Rated School Management System</title>');
				mywindow.document.write('<link href="../wizGradeTemplates/css/bootstrap.min.css" rel="stylesheet">');
				mywindow.document.write('<link href="../wizGradeTemplates/css/bootstrap-reset-4B0082.css" rel="stylesheet">');
				mywindow.document.write('<link href="../wizGradeTemplates/css/style-4B0082.css" rel="stylesheet">');
				mywindow.document.write('<link href="../wizGradeTemplates/css/style-responsive.css" rel="stylesheet">');
				mywindow.document.write('<body>');
				mywindow.document.write(content);
				mywindow.document.write('</body></html>');
				mywindow.document.close();
				//mywindow.print();
				return true;
			}
			
			//$('body').on('click','.printerIcon',function(event){  /* print page using jquery printThis plugin */
			 
				//event.stopImmediatePropagation();	 
 
				/*
				$("#wizGradePrintArea,.wizGradePrintArea").printThis({					 
					
					debug: false,               // show the iframe for debugging
					importCSS: true,            // import page CSS
					importStyle: true,         // import style tags
					printContainer: true,       // grab outer container as well as the contents of the selector
					loadCSS: "../wizGradeTemplates/css/bootstrap-reset-473C8B.css",  // path to additional css file - use an array [] for multiple
					pageTitle: "<h1>  wizGrade </h1>",              // add title to print page
					removeInline: false,        // remove all inline styles from print elements
					printDelay: 333,            // variable print delay
					header: null,               // prefix to html
					footer: null,               // postfix to html
					base: true,               // preserve the BASE tag, or accept a string for the URL
					formValues: true,           // preserve input/form values
					canvas: false,              // copy canvas elements (experimental)
					doctypeString: "<!DOCTYPE html>",       // enter a different doctype for older markup
					removeScripts: false,       // remove script tags from print content
					copyTagClasses: true       // copy classes from the html & body tag	
					
				});
				*/
			
				//return false;			
			//}); 
			/*
			$('body').on('click','#printerOverImg',function(event){  /* print page using jquery printThis plugin * /
			
				event.stopImmediatePropagation();	
				
				$("#wizGradeOlPrintArea").printThis({
					debug: false,//               * show the iframe for debugging
					importCSS: true,//             import page CSS
					printContainer: true,//        grab outer container as well as the contents of the selector
					loadCSS: "../wizGradeTemplates/css/bootstrap-reset-473C8B.css",  // path to additional css file - use an array [] for multiple
					pageTitle: "",//               add title to print page
					removeInline: false,//         remove all inline styles from print elements
					printDelay: 333,  //           variable print delay
					header: null,   //             prefix to html
					formValues: true  //           preserve input/form values
				});
			
				return false;			
			});
			*/
			
			$('body').on('click','.plusMinus',function(event){  /* increase or decrease a page */
			
				event.stopImmediatePropagation();	
										
				var $speech = $('#wizGradePageDiv');
				var currentSize = $speech.css('fontSize');
				var num = parseFloat( currentSize, 10 );
				var unit = currentSize.slice(-2);
					if (this.id == 'plusIcon') {
						num *= 1.1;
					} else if (this.id == 'minusIcon') {
						num /= 1.1;
					}
						$speech.css('fontSize', num + unit);

					return false;
			});


			$('body').on('click','.wizGradeMenu a',function(){  /* page menu loading */									 
			
				var valEmpty = '';
				var varID = this.id;
				$('#wizGradePageContent').html(valEmpty);
				
				showPageLoader();   
				
				$('#wizGradePageContent').load('wizGradePager', {'iemj': varID}).fadeIn(1000); 
				$('#wizGradePageContent').slideDown(100);
				
				$('html, body').animate({ scrollTop:  $('#scrollBTarget').offset().top - 50 }, 'slow');

				if ( $( this ).hasClass( "tpMenu" ) ) {
 
					$('.dropdown-menu-icon').trigger('click');
			 
				}
				
				return false;
	  
			});


			$('body').on('click','.wizGradeMenu1 a',function(){  /* page menu loading */										 
			
				var valEmpty = '';
				var varID = this.id;
				$('#wizGradePageContent').html(valEmpty);
				
				showPageLoader();   
				
				$('#wizGradePageContent').load('wizGradePagers', {'iemj': varID}).fadeIn(1000); 
				$('#wizGradePageContent').slideDown(100);
				
				$('html, body').animate({ scrollTop:  $('#scrollBTarget').offset().top - 50 }, 'slow');
				
				if ( $( this ).hasClass( "tpMenu" ) ) {
 
					$('.dropdown-menu-icon').trigger('click');
			 
				}
				
				return false;
	  
			}); 
			
			$('body').on('click','.wizGradeMenu2 a',function(event){  /* page menu loading */										  
												  
					event.stopImmediatePropagation();	
					
					var valEmpty = '';
					var varID = this.id;
					$('#wizGradePageContent').html(valEmpty);
					
					showPageLoader();
					
					$("#wizGradePageContent").load(varID);
					$('html, body').animate({ scrollTop:  $('#wizGradePageContent').offset().top - 50 }, 'slow');
					
					if ( $( this ).hasClass( "tpMenu" ) ) {
 
						$('.dropdown-menu-icon').trigger('click');
			 
					}
					
					hidePageLoader();  /* hide page loader */
			
				return false;
	  
			});	
			
			/* custom scrollbar using jquery niceScroll plugin  start */ 
			
			$("html").niceScroll({
				
					styler:"fb", cursorcolor:"#F08080", cursorwidth: '11', cursorborderradius: '0px', 
					background: '#fff', spacebarenabled:false,  cursorborder: '', zindex: '999999'
			
			});
									
			$("#sidebar").niceScroll({
				
					styler:"fb", cursorcolor:"#F08080", cursorwidth: '10', cursorborderradius: '0px', 
					background: '#fff', spacebarenabled:false,  cursorborder: '', zindex: '99'
			
			});		

			/* custom scrollbar using jquery niceScroll plugin  end */		

			/* date picker start */

			$(function(){
				window.prettyPrint && prettyPrint();
				$('.default-date-picker').datepicker({
					format: 'mm-dd-yyyy'
				});
				$('.dpYears').datepicker();
				$('.dpMonths').datepicker(); 

				var startDate = new Date(2012,1,20);
				var endDate = new Date(2012,1,25);
				$('.dp4').datepicker()
					.on('changeDate', function(ev){
						if (ev.date.valueOf() > endDate.valueOf()){
							$('.alert').show().find('strong').text('The start date can not be greater then the end date');
						} else {
							$('.alert').hide();
							startDate = new Date(ev.date);
							$('#startDate').text($('.dp4').data('date'));
						}
						$('.dp4').datepicker('hide');
					});
					
				$('.dp5').datepicker()
					.on('changeDate', function(ev){
						if (ev.date.valueOf() < startDate.valueOf()){
							$('.alert').show().find('strong').text('The end date can not be less then the start date');
						} else {
							$('.alert').hide();
							endDate = new Date(ev.date);
							$('.endDate').text($('.dp5').data('date'));
						}
						$('.dp5').datepicker('hide');
					});

				/* disabling dates */
				
				var nowTemp = new Date();
				var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

				var checkin = $('.dpd1').datepicker({
					onRender: function(date) {
						return date.valueOf() < now.valueOf() ? 'disabled' : '';
					}
				}).on('changeDate', function(ev) {
						if (ev.date.valueOf() > checkout.date.valueOf()) {
							var newDate = new Date(ev.date)
							newDate.setDate(newDate.getDate() + 1);
							checkout.setValue(newDate);
						}
						checkin.hide();
						$('.dpd2')[0].focus();
					}).data('datepicker');
				var checkout = $('.dpd2').datepicker({
					onRender: function(date) {
						return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
					}
				}).on('changeDate', function(ev) {
						checkout.hide();
					}).data('datepicker');
			});

			/* date picker end */

			/* datetime picker start */

			$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});

			$(".form_datetime-component").datetimepicker({
				format: "dd MM yyyy - hh:ii"
			});

			$(".form_datetime-adv").datetimepicker({
				format: "dd MM yyyy - hh:ii",
				autoclose: true,
				todayBtn: true,
				startDate: "2013-02-14 10:00",
				minuteStep: 10
			});

			$(".form_datetime-meridian").datetimepicker({
				format: "dd MM yyyy - HH:ii P",
				showMeridian: true,
				autoclose: true,
				todayBtn: true
			});

			/* datetime picker end */

			/* timepicker start */
			
			$('.timepicker-default').timepicker(); 

			$('.timepicker-24').timepicker({
				autoclose: true,
				minuteStep: 1,
				showSeconds: true,
				showMeridian: false
			});

			/* timepicker end */

			/* colorpicker start */

			$('.colorpicker-default').colorpicker({
				format: 'hex'
			});
			$('.colorpicker-rgba').colorpicker();

			/* colorpicker end */

			/* multiselect start */

			$('#my_multi_select1').multiSelect();
			$('#my_multi_select2').multiSelect({
				selectableOptgroup: true
			});

			$('#my_multi_select3').multiSelect({
				selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
				selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
				afterInit: function (ms) {
					var that = this,
						$selectableSearch = that.$selectableUl.prev(),
						$selectionSearch = that.$selectionUl.prev(),
						selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
						selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

					that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
						.on('keydown', function (e) {
							if (e.which === 40) {
								that.$selectableUl.focus();
								return false;
							}
						});

					that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
						.on('keydown', function (e) {
							if (e.which == 40) {
								that.$selectionUl.focus();
								return false;
							}
						});
				},
				afterSelect: function () {
					this.qs1.cache();
					this.qs2.cache();
				},
				afterDeselect: function () {
					this.qs1.cache();
					this.qs2.cache();
				}
			});


			/* multiselect end */ 

			/* spinner start */
			
			$('#spinner1').spinner();
			$('#spinner2').spinner({disabled: true});
			$('#spinner3').spinner({value:0, min: 0, max: 10});
			$('#spinner4').spinner({value:0, step: 5, min: 0, max: 200});
			
			/* spinner end */ 

			/* wysihtml5 start */

			$('.wysihtml5').wysihtml5();

			/* wysihtml5 end */			
			
			