<!doctype html>
<html>
	<head>
		<meta charset="utf8" />
<link href="main.css" rel="stylesheet" type="text/css"></head>
<body>
<?php include("variables.php");

     ?>
 <footer class="footer">
<div class="container">
        <h4 class="title" style="text-align:center;margin:0px;text-decoration:underline;">Help Area</h4>
        <div class="row" style="padding">

        <div style="width:20%;display:inline-block;" class="col">
            <h4 class="title">Documentation:</h4>
            <p>Before using an API, the creation of an application is required. Please refer to each call's .php file to add or remove header and payload fields. Take a look at our APIs to see what choices are available. Use the supplied APIs to quickly construct a fully featured application. Visit <a href="https://developer.nbg.gr" target="_blank" style="color:white;"><strong>developer.nbg.gr</strong></a> for more info and documentation.</p>


            </div>
        <div style="width:30%;display:inline-block;" class="col">
            <h4 class="title">Your Stored Variables:</h4>
            <span class="acount-icon">

            <a > Current API: <?php echo $api ; ?></a>
            <a > API version: <?php echo $apiversion ; ?></a>
            <a>Current Sandbox_id: <?php echo $sandbox_id ; ?></a>
            <a>Sandbox User Username: <?php echo $username ; ?></a>
            <a>Client-Id: <?php echo $client_id ; ?></a>
  <!--           <a>Request-Id: <?php// echo $request_id ; ?></a>
                 <a>Authorization: <?php// echo $token ; ?></a>
                 <a>YourVariable: <?php// echo $YourVariable ; ?></a>
                 <a>YourVariable: <?php// echo $YourVariable ; ?></a>
                 <a>YourVariable: <?php// echo $YourVariable ; ?></a>
                 <a>YourVariable: <?php// echo $YourVariable ; ?></a>  -->
            <a style="color:#d9d9d9">Add your own! Please refer to index.php and footer.php to change or add values according to your needs.</a>
          </span>
            </div>
        <div style="width:45%;display:inline-block;" class="col">
            <h4 class="title">More APIs to engage with:</h4>
            <div class="category">
            <a href="#">Points of Interest</a>
            <a href="#">Confirmation of Funds - PSD2</a>
            <a href="#">IBAN Validation</a>
            <a href="#">Payment Initiation - PSD2</a>
            <a href="#">FX Rates</a>
            <a href="#">Bill Payments</a>
            <a href="#">Rewards Platform</a>
            <a href="#">Optical Character Recognition</a>
            <a href="#">Crowdfunding</a>
            <a href="#">ERP Bank Connection</a>
            <a href="#">Account Information - PSD2</a>
            <a href="#">Account Information - UK Open Banking</a>
            <a href="#">Cards</a>
            <a href="#">Loan Payments Platform</a>
            <a href="#">Social Network Platform</a>
            <a href="#">Accounts</a>
            <a href="#">Biometrics</a>
            <a href="#">Payments</a>
            <a href="#">Digital Payments Wallet</a>
            <a href="#">Transactions</a>
            <a href="#">i-bank Pay eCommerce Platform</a>
            <a href="#">ERP Bank Connection</a>
            </div>
            </div>
        </div>
        </div>
        <hr>

        <div style="text-align:center;margin-top:20px;"> © 2019. Made with &hearts; by studio.developer.NBG</div>

    </footer>
</body>
</html>
