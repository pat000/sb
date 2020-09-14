<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name') }} - Legalization form - {{$data['case_no']}}_{{$data['operator_name']}}</title>
</head>

<style type="text/css">
	
	.page-break {
	    page-break-after: always;
	}

	body{
		font-family: 'Times New Roman';
		/*font-size: 12px;*/
		margin: 2rem 3rem;
	}

	p {
	    margin: 0;
	    padding: 0;
	}

	.p-11 {
		/*font-size: 11px;*/
	}

	.p-12 {
		/*font-size: 12px;*/
	}

	.center{
		text-align: center;
	}

	.right {
		text-align: right;
	}

	.left {
		text-align: left;
	}

	.bold {
		font-weight: bold;
	}

	.capital{
		text-transform: uppercase;
	}

	.underline {
		text-decoration: underline;
	}

	.con_list li{
		margin: 20px 0;
		text-align: justify;
	}

	.pl-40 {
		padding-left: 40px
	}

	.pr-20 {
		padding-right: 20px
	}

	.pad {
		line-height: 30px;
	}

	.let-space {
		letter-spacing: 5px;
	}

	.slash i {
		font-size: 20px;
		padding: 0 10px;
	}

	.indent {
		text-indent: 40px;
	}

	.justify {
		text-align: justify;
	}

</style>
<body>
	<p class="center p-11">Republic of the Philippines</p>
	<p class="center p-11">Province of Pangasinan</p>
	<p class="center p-11">MUNICIPALITY OF SAN QUINTIN</p>
	<p class="center p-11">SANGGUNIANG BAYAN OFFICE</p>

	<br>

	<p class="right p-11">CASE NO. TC-SQ, PANG <u>{{ $data['case_no'] }}</u></p>

	<br>

	<p class="left p-12">PROVINCE AUTHORITY FOR MCH SERVICE</p>

	<br>

	<p class="left">NAME OF OPERATOR: <u class="bold">{{ $data['operator_name'] }}</u></p>
	<p class="left">ADDRESS: <u class="bold">{{ $data['address'] }}</u></p>
	<p class="left">Route/Area of Operator:  Within the territorial limit of San Quintin, Pangasinan.</p>

	<br>

	<p class="left">Applicant/Operator is hereby authorized to operate one (1) Unit particularly described below:</p>

	<br>

	<table style="width: 100%">
		<tr>
			<td><p class="bold underline capital left">NAME</p></td>
			<td><p class="bold underline capital left">motor no.</p></td>
			<td><p class="bold underline capital left">chassis no.</p></td>
			<td><p class="bold underline capital left">plate no.</p></td>
		</tr>
		<tr>
			<td><p class="bold left ">{{$data['motor_name']}}</p></td>
			<td><p class="bold left ">{{$data['motor_number']}}</p></td>
			<td><p class="bold left ">{{$data['motor_chassic']}}</p></td>
			<td><p class="bold left ">{{$data['plate_number']}}</p></td>
		</tr>
	</table>

	<br>

	<p class="capital center"> 
		<u>c</u>
	 	<u>o</u> 
	 	<u>n</u>
	 	<u>d</u>
	 	<u>i</u>
	 	<u>t</u>
	 	<u>i</u>
		<u>o</u>
		<u>n</u>
		<u>s</u> 	
	 </p>
 	
 	<ol class="con_list">
 		<li>Applicant shall register the herein authorized units under MCH denomination with the Land Transportation Office ( LTO ) San Quintin, Pangasinan, Agency within thirty (30 ) days from receipt hereof. The said agency shall cause the inspection of Applicant/s Unit/s, them for registration only if found roadworthy and fit for operation for public service. </li>
 		<li>Applicant shall paint the corresponding MTOP Case No. in the front right side of the unit which shall not be less than three (3) inches high. The route of operation shall also be painted in front side below the MTOP Case No.   not less than ½ inches high.</li>

 		<li>MCH Operator shall charge the following authorized rate;  REGULAR ________ for the ________ and for every succeeding kilometers;     STUDENT _________ for the  ________ and for every succeeding kilometers, in no case face lower or higher than these authorized by the board be charged with previous authority from the Board.</li>

 		<li>Application shall pay to this office on or before February 28th of each year, the Annual Franchise fees computed at the rate of ____________ per unit registered.</li>

 		<li>The MTOP Permit herein granted shall be valid for three (3) years counted from date stated hereof  <u class="bold">{{ $data['date_expi']}}</u>.</li>

 		<li>Applicant in the operator of this service shall strictly observe and comply with all the rules regulations of this office or Municipality ordinance, Traffic Regulations and all other laws of the Philippines applicable to this service.</li>
 	</ol>

 	<br>

 	<p class="capital left pl-40">SO ORDERED.</p>

 	<br>

 	<p class="left pl-40">ENTERED, San Quintin, Pangasinan, Philippines,  <u class="capital bold">{{$data['date_issued']}}</u></p>

 	<br>

 	<table style="width: 100%">
 		<tr>
 			<td style="width:33%"></td>
 			<td style="width:33%"></td>
 			
 			<td style="width:33%">
 				<p class="center bold capital ">{{ $data['vice_mayor']}}</p>
 				<p class="center" style="border-top: 2px solid #000"> Municipal Vice Mayor</p>
 			</td>
 		</tr>
 	</table>
 	

 	<br>

 	<p class="left pl-40">Copy Furnished:</p>
 	<p class="left pl-40"> Applicant: <u class="bold">{{ $data['operator_name']}}</u></p>
 	<p class="left pl-40"> ADDRESS: {{ $data['address']}}</p>
 	<p class="left pl-40">The registrar, LTO, San Quintin, Pangasinan</p>
 	<p class="left pl-40"> <i>(  mcs file )</i></p>

 	<div class="page-break">
 	</div>
 	{{-- page 2 --}}

 	<p class="center p-11">Republic of the Philippines</p>
	<p class="center p-11">Province of Pangasinan</p>
	<p class="center p-11">MUNICIPALITY OF SAN QUINTIN</p>
	<p class="center p-11">SANGGUNIANG BAYAN OFFICE</p>

	<br>


	<p class="left ">Applicant</p>
	<br>

	<p class="left">Application for the Legalization</p>
	<p class="left">Of Motorized Tricycle with</p>
	<p class="left">Provincial Authority</p>

	<p class="left slash"><i>  -  </i><i>  -  </i><i>  -  </i><i>  -  </i><i>  -  </i><i>  -  </i><i>  -  </i><i>  -  </i><i>  -  </i><i>  -  </i></p>
 	<br>

 	<p class="capital center"> 
		<u>a</u>
	 	<u>p</u> 
	 	<u>p</u>
	 	<u>l</u>
	 	<u>i</u>
	 	<u>c</u>
	 	<u>a</u>
		<u>t</u>
		<u>i</u>
		<u>o</u>
		<u>n</u> 	
	 </p>
	<br>
	<p class="indent pad justify">Comes now the applicant and unto this Honorable Board most respectfully alleges; That applicant is legal age of <u>{{$data['age']}} YRS. OLD</u>  Filipino Citizen and a residents of , <u>{{ $data['address'] }}</u>  </p>

	<br>

	<p class="indent pad justify">That applicant propose to avail of Memorandum Circular No. 88 – 006, dated January 7, 1988, Legalization of Motorized Tricycle Service to operate within the Municipality of San Quintin, Pangasinan with the use of the following unit: </p>

	<br>

	<table style="width: 100%;">
		<tr>
			<td><p class="bold underline capital left">NAME</p></td>
			<td><p class="bold underline capital left">motor no.</p></td>
			<td><p class="bold underline capital left">chassis no.</p></td>
			<td><p class="bold underline capital left">plate no.</p></td>
		</tr>
		<tr>
			<td><p class="bold left ">{{$data['motor_name']}}</p></td>
			<td><p class="bold left ">{{$data['motor_number']}}</p></td>
			<td><p class="bold left ">{{$data['motor_chassic']}}</p></td>
			<td><p class="bold left ">{{$data['plate_number']}}</p></td>
		</tr>
	</table>

	<br>

	<p class="left">Subject to the following</p>

	<br>

	<p class="indent justify">That applicant is financially capable to operate and maintain the service herein applied   for :</p>


	<p class="indent pad justify">That public convenience and necessity will be served in a most and suitable manner with the legalization of this service;</p>

	<br>

	<p class="indent pad justify">That applicant will comply with the rules and regulations of the Honorable Board the herein application be approved ad granted a Provisional Authority. San Quintin, Pangasinan, Philippines,  {{ $data['date_issued']}}</p>

	<br>

 	<table style="width: 100%">
 		<tr>
 			<td style="width:33%"></td>
 			<td style="width:33%"></td>
 			
 			<td style="width:33%">
 				<p class="center bold capital ">{{ $data['operator_name']}}</p>
 				<p class="center" style="border-top: 2px solid #000">Signature of Applicant</p>
 			</td>
 		</tr>
 	</table>
 	


 	<br>

 	<p class="center capital let-space"> verification</p>

 	<p class="indent pad justify"> I <el class="bold capital">{{$data['operator_name']}}</el> , after having been duly sworn to in accordance with law hereby depose and state: that I caused the preparation of the above- application; that I have read and understood its contents; and that the contents thereof are true and correct on my own personal knowledge and belief. <br><i>( mcs file )</i></p>

</body>
</html>