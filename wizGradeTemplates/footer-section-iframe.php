		<!-- jquery  -->
		<script src="<?php echo $wizGradeTemplate; ?>js/jquery-1.12.4.js"></script>
		<script src="<?php echo $wizGradeTemplate; ?>js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo  $wizGradeTemplate; ?>js/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo $wizGradeTemplate; ?>js/pnotify.custom.js"></script>
		<script type='text/javascript' src='<?php echo  $wizGradeTemplate; ?>js/printThis.js'></script>
		<script type="text/javascript" src="<?php echo  $wizGradeTemplate; ?>js/jquery.wallform.js"></script>

		<script class="include" type="text/javascript" src="<?php echo $wizGradeTemplate; ?>js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="<?php echo  $wizGradeTemplate; ?>js/jquery.scrollTo.min.js"></script>
		<script src="<?php echo  $wizGradeTemplate; ?>js/jquery.nicescroll.js" type="text/javascript"></script>

		<script type="text/javascript" language="javascript" src="<?php echo  $wizGradeTemplate; ?>media/js/jquery.dataTables.js"></script>


		<script type='text/javascript' src='<?php echo  $wizGradeTemplate; ?>lib/jquery-ui.custom.min.js'></script>
		<script type='text/javascript' src='<?php echo  $wizGradeTemplate; ?>fullcalendar/fullcalendar.min.js'></script>
		<script type="text/javascript" src="<?php echo  $wizGradeTemplate; ?>js/jquery.tokeninput.js"></script>
		<script type="text/javascript" src="<?php echo  $wizGradeTemplate; ?>assets/fancybox/source/jquery.fancybox.js"></script> 
		
		<script type="text/javascript" src="<?php echo  $wizGradeTemplate; ?>assets/fuelux/js/spinner.min.js"></script>
		
		<!-- jquery bootstrap --> 
		
		<script type="text/javascript" src=" <?php echo $wizGradeTemplate; ?>assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
		<script type="text/javascript" src=" <?php echo $wizGradeTemplate; ?>assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
		<script type="text/javascript" src=" <?php echo $wizGradeTemplate; ?>assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
		<script type="text/javascript" src=" <?php echo $wizGradeTemplate; ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
		<script type="text/javascript" src="<?php  echo $wizGradeTemplate; ?>assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
		<script type="text/javascript" src="<?php echo $wizGradeTemplate; ?>assets/bootstrap-daterangepicker/moment.min.js"></script>
		<script type="text/javascript" src="<?php echo $wizGradeTemplate; ?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script type="text/javascript" src="<?php echo $wizGradeTemplate; ?>assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script type="text/javascript" src="<?php echo $wizGradeTemplate; ?>assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		
		<!-- / jquery bootstrap --> 
		
 
		<script type="text/javascript" src="
		<?php echo  $wizGradeTemplate; ?>assets/jquery-multi-select/js/jquery.quicksearch.js"></script>

		<script src="<?php echo  $wizGradeTemplate; ?>js/jquery.customSelect.min.js" ></script>
		<script src="<?php echo  $wizGradeTemplate; ?>js/toucheffects.js" ></script>
		<script src="<?php echo  $wizGradeTemplate; ?>js/respond.min.js" ></script>
		<script src="<?php echo  $wizGradeTemplate; ?>js/modernizr.custom.js" ></script>

		<script src="<?php echo  $wizGradeTemplate; ?>js/common-scripts.js"></script>
		<script src="<?php echo  $wizGradeTemplate; ?>js/jquery.stepy.js"></script>


		<!-- jquery exports table --> 

		<script type="text/javascript" src="<?php echo $wizGradeTemplate; ?>assets/exports-table/tableExport.js"></script>
		<script type="text/javascript" src="<?php echo $wizGradeTemplate; ?>assets/exports-table/jquery.base64.js"></script>
		<script type="text/javascript" src="<?php echo $wizGradeTemplate; ?>assets/exports-table/html2canvas.js"></script>
		<script type="text/javascript" src="<?php echo $wizGradeTemplate; ?>assets/exports-table/jspdf/libs/sprintf.js"></script>
		<script type="text/javascript" src="<?php echo $wizGradeTemplate; ?>assets/exports-table/jspdf/jspdf.js"></script>
		<script type="text/javascript" src="<?php echo $wizGradeTemplate; ?>assets/exports-table/jspdf/libs/base64.js"></script>

		<!-- / jquery exports table -->

		<script type="text/javascript" src="<?php echo  $wizGradeTemplate; ?>js/jquery.jstepper.min.js"></script>

		<script type="text/javascript">

			function showPageLoader(){  /* show loading image */

				$('.loader-background').fadeIn(100);
				$('.loader-background').css("z-index", "9999999");
				
			}

			function hidePageLoader(){  /* hide loading image */

				$('.loader-background').fadeOut(3000);
				
			};

			$(function(){  /* dynamic include jquery scripts */

				var postVal = 'loadScript';

				$('#loadScriptPage').load('loadScript', {'pageType': postVal});

			});	

		</script>

																																																																																																																																																	<div id="loadScriptPage"> </div>
		<!-- / jquery  -->


		</body>

		</html>