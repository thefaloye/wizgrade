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
	This script load common page middle menu bar
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

?>

	<!-- row -->
	<div class="row wizGradePageIcons display-none">
		<div class="col-lg-10">
		 
			<section>
				<div class="panel-body">
				
					<ul class="ft-link">
													
					<button  class="btn btn-white slideIcon">
					<i class="fa fa-arrow-circle-left fa-lg text-info"></i> Go Back </button>

					<button  class="btn btn-white printerIcon display-none" id="btnPrint">
					<i class="fa fa-print fa-lg text-info"></i> Print </button>

					<button  class="btn btn-white display-none excelExIcon" 
					onClick ="$('#wizGradePageTB').tableExport({type:'excel',escape:'false'});">
					<i class="fa fa-cloud-download  fa-lg text-info"></i> Excel Export</button>

					<button  class="btn btn-white rsConIcon showRSConfigDiv display-none">
					<i class="fa fa-check-square-o fa-lg text-info"></i> Compute &amp; Publish Result </button>

					<button  class="btn btn-white rsConIcon showResultDiv display-none">
					<i class="fa fa-arrow-circle-o-left fa-lg text-info"></i> Back To Result  </button>

					<button  class="btn btn-white rsConIcon showTBColsBtn  display-none" 
					id ="showTBColsBtn" onclick="showTBCols();">
					<i class="fa fa-check-square-o fa-lg text-info"></i> Show Hidden Columns </button>

					<button  class="btn btn-white rsConIcon hideTBColsBtn  display-none" 
					id ="hideTBColsBtn" onclick="hideTBCols();">
					<i class="fa fa-check-square-o fa-lg text-info"></i> Hide Subject Position</button>

					<button class="paginate-page display-none"  type="submit">Paginate Page</button> 
					<button id="paginate-page"  type="submit">Paginate Page</button> 

					</ul>
				</div>

			</section>
         
        </div>
    </div>
	<!-- / row -->
	<div id="ScrollTarget"> </div>	