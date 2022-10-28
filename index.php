<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Generate Payment Link</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="icon" href="assets/images/favicon.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/style2.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
		
		
	</head>
	<body>
<?php 
   require("config.php");
?>	    
			<section class="sec-1">
				<div class="container">
					<div class="pg-top">
						<p class="sub-title">Generate Payment Link</p>
					</div>
						<p> &nbsp; &nbsp; </p>
						<p> &nbsp; &nbsp; </p>
						
										<form id="ff1" name="ff1" method="post" action="" class="payment-form">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
								</div>
							</div>
														<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="">PackageInfo</label>
									<input type="text" name="package_info" id="package_info"  placeholder="Website PACKAGE">
								</div>
								<div class="form-group">
									<label for="">Brand</label>
									<input type="text" name="brand" id="brand"  placeholder="brand">
								</div>
								
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="">Amount: USD</label>
									<input type="text" name="amount" id="amount"  placeholder="500" >
								</div>
							</div>
						</div>
						<div class="row" >
					       <div class="col-12-md">

						    <button onclick="generateLink()" type="button" class="btn  text-center btn-success " >Generate</button>
							</div>
						</div>
						
						<p>
<div style="display: none;" class=" Errormsg alert alert-danger">All fields are required!</div>						
						</p>
						<p id="pLink">
						</p>
				</div>
				</form>
		</div>
		</section>
		</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        
<script>
   
   function generateLink(){
	   
	    $(".msg").css("display","none");
		
		let amount = $("#amount").val();
	    let package_info = $("#package_info").val();
	    let brand = $("#brand").val();
		
		if(package_info.length === 0 || amount.length === 0 ||  brand.length === 0 ){
					    $(".Errormsg").css("display","block");

		}
		else{
        $.ajax(
            {
                cache: false,
                url: './script.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    'package_info': package_info,
                    'amount': amount,
					brand
                },
                success: function (response) {
                    if (response.success) {
							
						$("#pLink").html(response.link);
                    }else{
						alert("Something went wrong");
					}
                }
            });			
		}
		
	   
   }
</script>