<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>Thankyou</title>
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
						<p class="sub-title">Your payment has been process successfully.</p>
					</div>
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

	
		