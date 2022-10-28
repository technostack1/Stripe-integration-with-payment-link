<!DOCTYPE html>

<?php
  error_reporting(0);
  require("../config.php");
  $id = strip_tags($_GET["payId"]);
  $h = strip_tags($_GET["h"]);
  
  try {
  $decryptData = json_decode(base64_decode($h));
  
	if($decryptData->amount == null){
		  echo "Invalid Page URL";
		die;		
	}
	$amount = $decryptData->amount;
	$package_info = $decryptData->package_info;
	$brand = $decryptData->brand;
	  
  }
	catch(Exception $e) {
		
  echo 'Message: ' .$e->getMessage();
		die;
	  
  }

?>		

<html>
	<head>
		<meta charset="utf-8">
		<title>Payment</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="icon" href="assets/images/favicon.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/style2.css" />
		
		
		<style type="text/css">
			#loading-sp {
			display: none;
			background: #000;
			opacity: 0.77;
			bottom: 0;
			left: 0;
			position: fixed;
			right: 0;
			top: 0;
			z-index: 9999999;
			}
			#load {
			position: absolute;
			height: 36px;
			top: 40%;
			overflow: visible;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			cursor: default;
			color: #fff;
			text-align: center;
			width: 100%;
			}
			#load div {
			position: absolute;
			width: 20px;
			height: 36px;
			opacity: 0;
			font-family: Helvetica, Arial, sans-serif;
			animation: move 2s linear infinite;
			-o-animation: move 2s linear infinite;
			-moz-animation: move 2s linear infinite;
			-webkit-animation: move 2s linear infinite;
			transform: rotate(180deg);
			-o-transform: rotate(180deg);
			-moz-transform: rotate(180deg);
			-webkit-transform: rotate(180deg);
			color: #cdcdcd;
			font-weight: bold;
			font-size: 16px;
			}
			#load div:nth-child(2) {
			animation-delay: 0.2s;
			-o-animation-delay: 0.2s;
			-moz-animation-delay: 0.2s;
			-webkit-animation-delay: 0.2s;
			}
			#load div:nth-child(3) {
			animation-delay: 0.4s;
			-o-animation-delay: 0.4s;
			-webkit-animation-delay: 0.4s;
			-webkit-animation-delay: 0.4s;
			}
			#load div:nth-child(4) {
			animation-delay: 0.6s;
			-o-animation-delay: 0.6s;
			-moz-animation-delay: 0.6s;
			-webkit-animation-delay: 0.6s;
			}
			#load div:nth-child(5) {
			animation-delay: 0.8s;
			-o-animation-delay: 0.8s;
			-moz-animation-delay: 0.8s;
			-webkit-animation-delay: 0.8s;
			}
			#load div:nth-child(6) {
			animation-delay: 1s;
			-o-animation-delay: 1s;
			-moz-animation-delay: 1s;
			-webkit-animation-delay: 1s;
			}
			#load div:nth-child(7) {
			animation-delay: 1.2s;
			-o-animation-delay: 1.2s;
			-moz-animation-delay: 1.2s;
			-webkit-animation-delay: 1.2s;
			}
			@keyframes move {
			0% {
			left: 0;
			opacity: 0;
			}
			35% {
			left: 41%;
			-moz-transform: rotate(0deg);
			-webkit-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
			opacity: 1;
			}
			65% {
			left: 59%;
			-moz-transform: rotate(0deg);
			-webkit-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
			opacity: 1;
			}
			100% {
			left: 100%;
			-moz-transform: rotate(-180deg);
			-webkit-transform: rotate(-180deg);
			-o-transform: rotate(-180deg);
			transform: rotate(-180deg);
			opacity: 0;
			}
			}
			@-moz-keyframes move {
			0% {
			left: 0;
			opacity: 0;
			}
			35% {
			left: 41%;
			-moz-transform: rotate(0deg);
			transform: rotate(0deg);
			opacity: 1;
			}
			65% {
			left: 59%;
			-moz-transform: rotate(0deg);
			transform: rotate(0deg);
			opacity: 1;
			}
			100% {
			left: 100%;
			-moz-transform: rotate(-180deg);
			transform: rotate(-180deg);
			opacity: 0;
			}
			}
			@-webkit-keyframes move {
			0% {
			left: 0;
			opacity: 0;
			}
			35% {
			left: 41%;
			-webkit-transform: rotate(0deg);
			transform: rotate(0deg);
			opacity: 1;
			}
			65% {
			left: 59%;
			-webkit-transform: rotate(0deg);
			transform: rotate(0deg);
			opacity: 1;
			}
			100% {
			left: 100%;
			-webkit-transform: rotate(-180deg);
			transform: rotate(-180deg);
			opacity: 0;
			}
			}
			@-o-keyframes move {
			0% {
			left: 0;
			opacity: 0;
			}
			35% {
			left: 41%;
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
			opacity: 1;
			}
			65% {
			left: 59%;
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
			opacity: 1;
			}
			100% {
			left: 100%;
			-o-transform: rotate(-180deg);
			transform: rotate(-180deg);
			opacity: 0;
			}
			}
		</style>
		<!-- Modal CSS Start -->
		<style>
		  .facebook_advertisment_wrapper_text {
            padding: 15px 20px;
            }
            .fixedBar {
                background: #e5e6e6;
                padding: 10px 0;
                position: fixed;
                width: 100%;
                max-width: 1000px;
                bottom: 0;
            }
            .paymentModal {
                pointer-events: none;
            }
            .payment-form .form-group.check-group input {
                margin-right: 5px;
            }
            .modal-dialog {
                max-width: 1000px;
            }
		</style>
		<!-- Modal CSS End -->
	</head>
	<body>
	    
		<div class="index-wrap">
<script type="text/JavaScript">
<!--


//-->
</script>		    <div class="bg"
                 style="width:100%;display:none; height:200%; background-color:gray; z-index: 999; position: absolute; opacity: 0.56;">
                <h1>Processing take a minute</h1>
            </div>
			<section class="sec-1">
				<div class="container">
					<div class="pg-top">
						<p class="sub-title">PAY & PROCEED</p>
					</div>
										<form id="ff1" name="ff1" method="post" action=""  class="payment-form">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<p class="g-title">Payment Information</p>
								</div>
							</div>
														<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="">Description</label>
									<input type="text" name="item_description" id="item_description" readonly value="<?php echo $package_info; ?>" >
								</div>
							</div>
														<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="">Brand</label>
									<input type="text" name="item_description" id="item_description" readonly value="<?php echo $brand; ?>" >
								</div>
							</div>
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="">Amount: USD</label>
									<input name="semail" type="hidden" value="">
									<input name="tw" type="hidden" value="">
									<input type="text" name="amount" id="amount" readonly value="<?php echo $amount; ?>">
								</div>
							</div>
													</div>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<p class="g-title">Billing Information</p>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="">First Name</label>
									<input type="text" placeholder="Enter YourFirst Name" name="fname" id="fname" value="">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="">Last Name</label>
									<input type="text" placeholder="Enter Your Last Name" name="lname" id="lname" value="">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="">Address</label>
									<input type="text" placeholder="Enter Address" name="address" id="address" value="">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12 col-6">
										<div class="form-group">
											<label for="">City</label>
											<input type="text" placeholder="Enter City" name="city" id="city" value="">
											<input name="ipcountry" type="hidden" value="">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-6">
										<div class="form-group">
											<label for="">Country</label>
<select name="country" id="country"><option value="-1">Select Country</option><option selected value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antartica">Antartica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Ashmore and Cartier Island">Ashmore and Cartier Island</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="British Virgin Islands">British Virgin Islands</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burma">Burma</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Clipperton Island">Clipperton Island</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option><option value="Congo, Republic of the">Congo, Republic of the</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Cote d'Ivoire">Cote d'Ivoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czeck Republic">Czeck Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Europa Island">Europa Island</option><option value="Falkland Islands (Islas Malvinas)">Falkland Islands (Islas Malvinas)</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern and Antarctic Lands">French Southern and Antarctic Lands</option><option value="Gabon">Gabon</option><option value="Gambia, The">Gambia, The</option><option value="Gaza Strip">Gaza Strip</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Glorioso Islands">Glorioso Islands</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option><option value="Holy See (Vatican City)">Holy See (Vatican City)</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Howland Island">Howland Island</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Ireland, Northern">Ireland, Northern</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Jan Mayen">Jan Mayen</option><option value="Japan">Japan</option><option value="Jarvis Island">Jarvis Island</option><option value="Jersey">Jersey</option><option value="Johnston Atoll">Johnston Atoll</option><option value="Jordan">Jordan</option><option value="Juan de Nova Island">Juan de Nova Island</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Korea, North">Korea, North</option><option value="Korea, South">Korea, South</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia, Former Yugoslav Republic of">Macedonia, Former Yugoslav Republic of</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Man, Isle of">Man, Isle of</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia, Federated States of">Micronesia, Federated States of</option><option value="Midway Islands">Midway Islands</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcaim Islands">Pitcaim Islands</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion">Reunion</option><option value="Romainia">Romainia</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Saint Helena">Saint Helena</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Scotland">Scotland</option><option value="Senegal">Senegal</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia and South Sandwich Islands">South Georgia and South Sandwich Islands</option><option value="Spain">Spain</option><option value="Spratly Islands">Spratly Islands</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard">Svalbard</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Tobago">Tobago</option><option value="Toga">Toga</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad">Trinidad</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="Uruguay">Uruguay</option><option value="USA">USA</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Virgin Islands">Virgin Islands</option><option value="Wales">Wales</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="West Bank">West Bank</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Yugoslavia">Yugoslavia</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option></select>										</div>
										
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="">State/Province</label>
											<input type="text" placeholder="Enter state" name="state" id="state" value="">
									
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12 col-6">
										<div class="form-group">
											<label for="">Zip/Postal Code</label>
											<input type="text" placeholder="Zip/Postal Code" name="zip" id="zip" value="">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-6">
										<div class="form-group">
											<label for="">Email Address</label>
											<input type="text" placeholder="Email" name="email" id="email" value="">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<p class="g-title">Credit Card Information</p>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="">Card Holder Name</label>
									<input type="text" placeholder="Full Name" name="ccname" id="ccname">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="">Card Number</label>
									<div class="card-info">
										<input type="text" class="number " placeholder="Card Number" name="ccn" id="ccn"
											 value=""
											
											
											maxlength="16" >
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12 col-6">
										<div class="form-group">
											<label for="">Expiration Month:</label>
											<select name="exp1" id="exp1" onchange="checkFieldBack(this);">
												<option value="01">01</option>
												<option value="02">02</option>
												<option value="03">03</option>
												<option value="04">04</option>
												<option value="05">05</option>
												<option value="06">06</option>
												<option value="07">07</option>
												<option value="08">08</option>
												<option value="09">09</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-6">
										<div class="form-group">
											<label for="">Expiration Year:</label>
											<select name="exp2" id="exp2" class="small-field" onchange="checkFieldBack(this);">
												<option value="2021">2021</option>
												<option value="2022">2022</option>
												<option value="2023">2023</option>
												<option value="2024">2024</option>
												<option value="2025">2025</option>
												<option value="2026">2026</option>
												<option value="2027">2027</option>
												<option value="2028">2028</option>
												<option value="2029">2029</option>
												<option value="2030">2030</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="">CVV</label>
									<div class="card-info">
										<input type="text" class="number" id="cvv" placeholder="CVV" maxlength="5">
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group radio-group check-group">
									<div id="t_c_disabled">
								        <label for="terms">
								                                            	        <input type="checkbox" id="cc_terms" style="accent-color: #0a8bf9" >
                                	        <strong>I agree to Terms and Conditions.</strong>
                                	                                    	        </label>
								    </div>
								</div>
							</div>
							<div class="col-12">
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
							    <input type="hidden" name="process" value="yes"/>
								<button id="pay_now" type="button"  class="submitss btn btn-primary">PAY NOW</button>
								<p> &nbsp; </p>
						<p>
<div style="display: none;" class=" Errormsg alert alert-danger">All fields are required!</div>						
						</p>

						<p>
<div style="display: none;" class=" Smsg alert alert-success"></div>						
						</p>
								
								
							</div>
						</div>
				</div>
				</form>
		</div>
		</section>
		<footer>
			<div class="container">
				<div class="footer-icon">
				</div>
			</div>
		</footer>
		</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
   <script type="text/javascript">
   Stripe.setPublishableKey('pk_test_60DrmUrYHBIKqEVLXmeWcD1Q');


   </script>
	</body>
</html>		<div id="loading-sp" style="display: none;">
			<div id="load">
				Please Wait. Your transaction is processing...
			</div>
		</div>
<script>
$( document ).ready(function() {
    
    $("#pay_now").click(function(){
		
            $(".Errormsg").css("display","none");
			$(".Smsg").css("display","none");
			
			var fname   = $("#fname").val();
            var lname   = $("#lname").val();
            var address = $("#address").val();
            var city    = $("#city").val();
            var country = $("#country").val();
            var state   = $("#state").val();
            var zip     = $("#zip").val();
            var email   = $("#email").val();
			
			if(fname.length === 0){
               $(".Errormsg").css("display","block");
               $(".Errormsg").html("First name is required");
			
			}
			else if(lname.length === 0){
               $(".Errormsg").css("display","block");
               $(".Errormsg").html("Last name is required");
			
			}
			else if(address.length === 0){
               $(".Errormsg").css("display","block");
               $(".Errormsg").html("Address is required");
			
			}
			else if(city.length === 0){
               $(".Errormsg").css("display","block");
               $(".Errormsg").html("City is required");
			
			}
			else if(country.length === 0){
               $(".Errormsg").css("display","block");
               $(".Errormsg").html("Country is required");
			
			}
			else if(state.length === 0){
               $(".Errormsg").css("display","block");
               $(".Errormsg").html("State is required");
			
			}
			else if(zip.length === 0){
               $(".Errormsg").css("display","block");
               $(".Errormsg").html("Zip code is required");
			
			}
			else if(email.length === 0){
               $(".Errormsg").css("display","block");
               $(".Errormsg").html("Email is required");
			
			}
			else if(!$("#cc_terms").is(":checked")){
               $(".Errormsg").css("display","block");
               $(".Errormsg").html("Please check terms and conditions");
			
			}
			
			else{
					  $('#loading-sp').show();
				   Stripe.createToken({
				   /* User Details */
				   name: $('#ccname').val(),
				   address_line1: $('#address').val(),
				   address_zip: $('#zip').val(),
				   address_state: $('#state').val(),
				   address_country: $('#country').val(),
				   address_city: $('#city').val(),	
				   /* Card Details */	
				   number: $('#ccn').val(),
				   cvc: $('#cvv').val(),
				   exp_month: $('#exp1').val(),
				   exp_year: $('#exp2').val().substr(2)
				   }, stripeResponseHandler);
				   return false;				
			}
			
			return false;
		
		

	   
	   
	   
		
		
	})
	
});

	function pay(obj){
            $.ajax({
                type: "POST",
                url: "payment.php",
                data: obj,
				dataType: 'JSON',				
                cache: true,
                success: function(data){
					  $('#loading-sp').hide();
					console.log("data",data.success);
					if(data.success){
						$(".Smsg").css("display","block");
						$(".Smsg").html("Payment has been charged successfully");
						window.location = "./thankyou.php";
					$('#ff1')[0].reset();
						
						
					}
					else{
					   $(".Errormsg").css("display","block");
					   $(".Errormsg").html("Something went wrong. Please try later!");
						
					}
                }
            });
		
	}


   function stripeResponseHandler(status, response) {
   if (response.error) {
  
               $(".Errormsg").css("display","block");
               $(".Errormsg").html(response.error.message);
  
  $('#loading-sp').hide();
   return false;
   } else {
          var token = response['id'];
$(".Errormsg").css("display","none");
			let fname   = $("#fname").val();
            let lname   = $("#lname").val();
            let address = $("#address").val();
            let city    = $("#city").val();
            let country = $("#country").val();
            let state   = $("#state").val();
            let zip     = $("#zip").val();
            let email   = $("#email").val();
			let requestObject = {fname,lname,address,city,country,state,zip,email,token,"amount" : "<?php echo $amount; ?>","brand" : "<?php echo $brand; ?>" , "package_info" : "<?php echo $package_info; ?>"};		  
           pay(requestObject); 
       }
   }

</script>
		
		