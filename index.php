<!doctype html>
<?php session_start(); ?>

           <?php

    if(isset($_POST["submittoken"])){


	header("Location: /testlogin.php");
    }   ?>


<html>
    	<head>
        	<meta charset="utf8" />
        	<title>Homepage | PHP Sandbox Calls Test Website</title>
        	<link rel="stylesheet" type="text/css" href="main.css"/>
        	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">				</script>
        	<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.21.1/babel.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
            <script src="https://code.jquery.com/jquery-2.1.0.min.js" ></script>
    	</head>

    <body>

       <?php
        include ("header.php");
       ?>

        <h1 style="margin-top:35px;" class="center weight">Welcome to our PHP Sandbox Calls Test Website</h1>
        <h4 style="font-size: 16px;margin-top:-20px;" class="center">
            Choose your preferred API type. Fill up the form. Have fun testing!
        </h4>

 <!----------------------------------- COOKIES (oAuth) ------------------------------------------->

<div class="cookies">
<?php
foreach ($_COOKIE as $key=>$val)
  {
      if ( $key == "Email" || $key == "Token" )
      { /* echo $key.' is '.$val."<br>\n"; */ }
  }

?>
</div>


<?php
foreach ($_COOKIE as $key=>$val)
  {
      if ($key == "Token" )
      $tokentemp = $val;
  }
?>

<!------------- FORM HANDLER v.2 FOR SHOWING AND HIDING THE PROPER FORM DEPENDING ON API TYPE ----------------->


<div class="containerOuter"> <div class="containerContent">
    <div class="weight">

   Choose API type:  </div></div>

  <div class="containerHandler">

        <input type="radio" class="hidden" id="input1" name="inputs" onclick="showHeader(this);checkForm();" <?php if($tokentemp == '') echo "checked"; ?> >
    <label class="entry" for="input1"><div class="circle"></div><div class="entry-label">Header API</div></label>
    <input type="radio" class="hidden" id="input2" name="inputs" onclick="showOauth(this);"  <?php if($tokentemp != '') echo "checked"; ?> >
    <label class="entry" for="input2"><div class="circle"></div><div class="entry-label" >oAuth2 API</div></label>

    <div class="highlight"></div>
    <div class="overlayHandler"></div>

<svg width="0" height="0" viewBox="0 0 40 140">
  <defs>
    <mask id="holes">
      <rect x="0" y="0" width="100" height="140" fill="white" />
      <circle r="12" cx="20" cy="20" fill="black"/>
      <circle r="12" cx="20" cy="70" fill="black"/>
      <circle r="12" cx="20" cy="120" fill="black"/>
    </mask>
  </defs>
</svg>
</div>

</div>

<!------------------------------------------ Token Form ----------------------------------------------------->

<br>
<div class="sign-up-modal" id="gettokenform" style="margin-top:15px;">
		<div id="close-modal-button">
		</div>


		<form class="details" method="post" action="" style="width:100%;">

<div style="display:flex;">
            <div style="flex:1;min-width:70%!important;">

				<div class="input-container" style="display:flex;">
                  		<input class="col-sm-12 text-input with-placeholder" id="clientid" name="clientid" type="text"  placeholder="Client Id" value ="<?php echo $_SESSION['sclientid'] ?>" required/><div style="flex:1!important;margin-top:12px;display:inline-block;"><span class="tooltip">?<span class="tooltip-text">You must obtain a valid Client-Id and subscribe your App to the API you are going to test. Visit <a href="https://developer.nbg.gr/applications" target="_blank">Developer Portal</a> to set your App.</span> </span></div>
				</div>

				<div class="input-container" style="display:flex;">
						<input class="col-sm-12 text-input with-placeholder" id="clientsecret" name="clientsecret" type="text" placeholder="Client Secret" value ="<?php echo $_SESSION['sclientsecret'] ?>" required/><div style="flex:1!important;margin-top:12px;display:inline-block;"><span class="tooltip">?<span class="tooltip-text">When you create your App, a Client Secret is automatically assigned to the Client-Id you obtained above. Visit <a href="https://developer.nbg.gr/applications" target="_blank">Developer Portal</a> to get your Client Secret.</span> </span></div>
				</div>

				<div class="input-container" style="display:flex;">
						<input class="col-sm-12 text-input with-placeholder" id="scope" type="text" name="scope" placeholder="Scope (at least 'openid' scope is required)" value ="<?php echo $_SESSION['sscope'] ?>" required/> <div style="flex:1!important;margin-top:12px;display:inline-block;"><span class="tooltip">?<span class="tooltip-text">Visit the <a href="https://developer.nbg.gr/apiProducts" target="_blank">documentation of the API </a>you are going to engage with and get the proper scope for the purpose of your tests. </span> </span></div>
				</div>

            <div class="input-container" style="display:flex;">
						<input class="col-sm-12 text-input with-placeholder" id="redirecturl" type="text" name="redirecturl" placeholder="Redirect URL" value ="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/testlogin.php"; ?>" required/> <div style="flex:1!important;margin-top:12px;display:inline-block;"><span class="tooltip">?<span class="tooltip-text">Provide the redirect URL of your App. If you do not replace "testlogin.php" with a new file for oAuth2 authentication that suits your needs, leave this field populated as it is. </span> </span></div>
				</div>
</div>

                <div style="flex:1;margin:auto;max-width:30%;">

				<input id="submittoken" type="submit" value="Get Token" name="submittoken">
				</div>

</div>
		</form>
</div>

        <?php

    if(isset($_POST["submittoken"])){

        $_SESSION['sclientid'] = $_POST['clientid'];

        $_SESSION['sclientsecret']=$_POST['clientsecret'];

        $_SESSION['sscope']=$_POST['scope'];

        $scopestr = $_SESSION['sscope'];
$scopearr =  explode(" ", $scopestr);

//print all the value which are in the array
foreach($scopearr as $singlescope){

    echo $singlescope;
    echo "\r\n";
}

        $_SESSION['sredirecturl']=$_POST['redirecturl'];

} ?>

<!------------------------------------ FORM FOR APIS WITH HEADERS -------------------------------------------->


       <div class=row style="margin-top:20px;">

    <div id="headersapiform" class=colform style="pointer-events:auto">

         <div id="formWrapper">

<div id="form"> <h2 class="center weight"> Headers APIs</h2>
     <form method="post" id="initial" name="myform2" action="index.php#testcalls">

         <div  style="display:flex!important;">
		<div class="form-item" style="flex:1!important;display:inline-block;">
			<p class="formLabel">Client-Id</p>
			<input type="text" name="clientid" id="clientid" class="form-style" required/>
    </div> <div style="flex:1!important;margin-top:17px;display:inline-block;"><span class="tooltip">?<span class="tooltip-text">You must obtain a valid Client-Id and subscribe your App to the API you are going to test. Visit <a href="https://developer.nbg.gr/applications" target="_blank">Developer Portal</a> to set your App.</span> </span></div> </div>

        <div  style="display:flex!important;">
		<div class="form-item" style="flex:1!important;display:inline-block;">
			<p class="formLabel">API Title</p>
			<input type="text" name="api" id="api" class="form-style" required/>
            </div> <div style="flex:1!important;margin-top:17px;display:inline-block;"><span class="tooltip">?<span class="tooltip-text">Visit the <a href="https://developer.nbg.gr/apiProducts" target="_blank">documentation of the API </a>and get the Title from the URL of any Sample Call. </span> </span></div> </div>

         <div  style="display:flex!important;">
		<div class="form-item" style="flex:1!important;display:inline-block;">
			<p class="formLabel">API version</p>
			<input type="text" name="apiversion" id="apiversion" class="form-style" required/>
    </div> <div style="flex:1!important;margin-top:17px;display:inline-block;"><span class="tooltip">?<span class="tooltip-text">Visit again the <a href="https://developer.nbg.gr/apiProducts" target="_blank">documentation of the API </a>and this time get the Version from the URL of the Sample Call you used above.</span> </span></div> </div>

         <div  style="display:flex!important;">
		<div class="form-item" style="flex:1!important;display:inline-block;">
			<p class="formLabel">Sandbox Id</p>
			<input type="text" name="sandboxid" id="sandboxid" class="form-style" required/>
    </div> <div style="flex:1!important;margin-top:17px;display:inline-block;"><span class="tooltip">?<span class="tooltip-text">Choose your preferred Sandbox Id for your calls. Be creative, in order to avoid already used Sandbox-Ids. </span> </span></div> </div>

         <div  style="display:flex!important;">
		<div class="form-item" style="flex:1!important;display:inline-block;">
			<p class="formLabel">Sandbox Username</p>
			<input type="text" name="username" id="username" class="form-style" required/>
    </div> <div style="flex:1!important;margin-top:17px;display:inline-block;"><span class="tooltip">?<span class="tooltip-text">Choose your preferred Sandbox Username for your calls. Be creative, in order to avoid already used usernames.</span> </span></div> </div>


		<div class="form-item">
		<input type="submit" name="submitheader" id="submitheader" class="login pull-right" value="Let's Code">
		<div class="clear-fix"></div>
		</div>
         </form>
</div>
</div></div><br>


<!--------------------------------------- FORM FOR APIS WITH OAUTH2 ---------------------------------------->


    <div id="oauthapiform" class=colform style="pointer-events:auto">

        <div id="formWrapper">

<div id="form"> <h2 class="center weight"> oAuth2 APIs</h2>
     <form method="post" id="initial" name="myform2" action="/index.php#testcalls">

         <div  style="display:flex!important;">
		<div class="form-item" style="flex:1!important;display:inline-block;">
			<p class="formLabel">Authorization Token</p>
			<input type="text" name="token" id="token" class="form-style" value ="<?php echo $tokentemp ?>" required/>
    </div> <div style="flex:1!important;margin-top:17px;display:inline-block;"><span class="tooltip">?<span class="tooltip-text">You must obtain a valid Client-Id and subscribe your App to the API you are going to test. Visit <a href="https://developer.nbg.gr/applications" target="_blank">Developer Portal</a> to set your App.</span> </span></div> </div>

        <div  style="display:flex!important;">
		<div class="form-item" style="flex:1!important;display:inline-block;">
			<p class="formLabel">API Title</p>
			<input type="text" name="api" id="api" class="form-style" required/>
    </div> <div style="flex:1!important;margin-top:17px;display:inline-block;"><span class="tooltip">?<span class="tooltip-text">Visit the <a href="https://developer.nbg.gr/apiProducts" target="_blank">documentation of the API </a>and get the Title from the URL of any Sample Call. </span> </span></div> </div>

         <div  style="display:flex!important;">
		<div class="form-item" style="flex:1!important;display:inline-block;">
			<p class="formLabel">API version</p>
			<input type="text" name="apiversion" id="apiversion" class="form-style" required/>
    </div> <div style="flex:1!important;margin-top:17px;display:inline-block;"><span class="tooltip">?<span class="tooltip-text">Visit again the <a href="https://developer.nbg.gr/apiProducts" target="_blank">documentation of the API </a>and this time get the Version from the URL of the Sample Call you used above.</span> </span></div> </div>

         <div  style="display:flex!important;">
		<div class="form-item" style="flex:1!important;display:inline-block;">
			<p class="formLabel">Sandbox Id</p>
			<input type="text" name="sandboxid" id="sandboxid" class="form-style" required/>
    </div> <div style="flex:1!important;margin-top:17px;display:inline-block;"><span class="tooltip">?<span class="tooltip-text">Choose your preferred Sandbox Id for your calls. Be creative, in order to avoid already used Sandbox-Ids. </span> </span></div> </div>

         <div  style="display:flex!important;">
		<div class="form-item" style="flex:1!important;display:inline-block;">
			<p class="formLabel">Sandbox Username</p>
			<input type="text" name="username" id="username" class="form-style" required/>
    </div> <div style="flex:1!important;margin-top:17px;display:inline-block;"><span class="tooltip">?<span class="tooltip-text">Choose your preferred Sandbox Username for your calls. Be creative, in order to avoid already used usernames.</span> </span></div> </div>


		<div class="form-item">
		<input type="submit" name="submitoauth" id="submitoauth" class="login pull-right" value="Let's Code">
		<div class="clear-fix"></div>
		</div>
         </form>
</div>
</div>

           </div> <br></div>

<!-------------------------------------- REQUEST SAMPLE CALLS BUTTONS ---------------------------------------->

<div id="testcalls" >
        <h3 style="font-size:32px;margin-top:45px;margin-left:35px;" class="weight center">
            Request Samples:
        </h3> </div>
        <div id="showbuttons" style="margin-bottom:65px;margin-top:25px;" class="center">
        <ol style="font-size: 14px;" >
            <li style="display:inline-block;"> <a href="/createsandbox.php"><button class="button">Create Sandbox call</button></a></li><br><br>
            <li style="display:inline-block;"><a href="/exportsandbox.php"><button class="button">Export Sandbox call</button></a></li><br><br>
            <li style="display:inline-block;"><a href="/deletesandbox.php"><button class="button">Delete Sandbox call</button></a></li><br><br>
            <li style="display:inline-block;"><a href="/createsandboxuser.php"><button class="button">Create Sandbox User call</button></a></li>
  <!--          <li style="display:inline-block;"><a href="/testlogin.php"><button class="button">Authorization</button></a></li>

            <li style="display:inline-block;"><a href="/yourNextCall.php"><button class="button">Your Next Call</button></a></li>
            <li style="display:inline-block;"><a href="/yourNextCall2.php"><button class="button">Your Next Call 2</button></a></li>       ---->
        </ol>
        </div>


        <?php

    if(isset($_POST["submitheader"]) || isset($_POST["submitoauth"])){

$_SESSION['sclientid'] = $_POST['clientid'];

/*********************** REWRITE THE FILE NAMED VARIABLES.PHP FROM SCRATCH (EVERY OTHER VALUE THAT WAS BEFORE IN THE FILE GETS REWRITTED - ONLY VALUES SHOWN BELOW REMAIN FINALLY IN THE FILE) ****************************/
    $fptest = fopen("variables.php", 'w');
    fwrite($fptest, '<?php');
    fwrite($fptest, ' ');
         fwrite($fptest, ' session_start(); ');
 fwrite($fptest, ' ');

    fwrite($fptest, '$sandbox_id = "'.trim($_POST['sandboxid']).'";');
       fwrite($fptest, '$api = "'.trim($_POST['api']).'";');
       fwrite($fptest, '$apiversion = "'.trim($_POST['apiversion']).'";');
     fwrite($fptest, '$username = "'.trim($_POST['username']).'";');
    fwrite($fptest, '$scope = "'.$_SESSION['sscope'].'";');

    fwrite($fptest, '$client_id = "'.trim($_SESSION['sclientid']).'";');
          fwrite($fptest, '$client_secret = "'.trim($_SESSION['sclientsecret']).'";');
         fwrite($fptest, '$redirecturl = "'.trim($_SESSION['sredirecturl']).'";');

foreach ($_COOKIE as $key=>$val)
  { if ($key == "Token" )
       fwrite($fptest, '$token = "Bearer '.trim($val).'";');

  }

/*********************************** CHECK IF TOKEN WAS GIVEN, SETS TOKENCHECK VALUE (1 OR 2) IN ORDER TO USE THE CORRECT HEADER FIELDS ACCORDING TO API TYPE **********************************/
        if ($tokentemp === '' || isset($_POST["submitheader"])){
    fwrite($fptest, '$tokencheck = "2";');} else{ fwrite($fptest, '$tokencheck = "1";'); }
    fwrite($fptest, ' ');
    fwrite($fptest, '?>');
    fclose($fptest);

/****** REFRESH 3 SECONDS AFTER SUBMIT BUTTON PRESS, IN ORDER TO DISPLAY THE STORED VARIABLES IN FOOTER *****/

} ?>


<?php
/********************************* INCLUDE FOOTER (HELP AREA) IN PAGE ***********************************/
include_once ("footer.php");

     ?>

<script>
/*************************** FORM HANDLER WITH RADIO BUTTONS ****************************/

/******************** SHOW HEADER API FORM BY DEFAULT - HIDE OAUTH FORM *****************/
  if(document.getElementById('input1').checked) {
 document.getElementById('oauthapiform').style.pointerEvents="none" ;
    document.getElementById('oauthapiform').style.opacity="0.5" ;

       document.getElementById('gettokenform').style.pointerEvents="none" ;
    document.getElementById('gettokenform').style.opacity="0.5" ;
       document.getElementById('gettokenform').style.display="none" ; }

       if(document.getElementById('input2').checked) {
 document.getElementById('headersapiform').style.pointerEvents="none" ;
    document.getElementById('headersapiform').style.opacity="0.5" ;

       document.getElementById('gettokenform').style.pointerEvents="auto" ;
    document.getElementById('gettokenform').style.opacity="1" ;
       document.getElementById('gettokenform').style.display="block" ;

}
/*********************** SHOW HEADER API FORM WHEN FIRST RADIO BUTTON IS CHECKED - HIDE AND DISABLE OAUTH FORM ********************/
  function showHeader(a) {
  if (a.checked == true) {
    document.getElementById('oauthapiform').style.pointerEvents="none" ;
    document.getElementById('oauthapiform').style.opacity="0.5" ;
      document.getElementById('headersapiform').style.pointerEvents="auto" ;
    document.getElementById('headersapiform').style.opacity="1" ;

       document.getElementById('gettokenform').style.pointerEvents="none" ;
    document.getElementById('gettokenform').style.opacity="0.5" ;
        document.getElementById('gettokenform').style.display="none" ;
  }
}
/************************** SHOW OAUTH2 API FORM WHEN SECOND RADIO BUTTON IS CLICKED - HIDE AND DISABLE HEADERS FORM *************************/
            function showOauth(a) {
  if (a.checked == true) {
    document.getElementById('headersapiform').style.pointerEvents="none" ;
    document.getElementById('headersapiform').style.opacity="0.5";
      document.getElementById('oauthapiform').style.pointerEvents="auto" ;
    document.getElementById('oauthapiform').style.opacity="1" ;

      document.getElementById('gettokenform').style.pointerEvents="auto" ;
    document.getElementById('gettokenform').style.opacity="1" ;
        document.getElementById('gettokenform').style.display="block" ;
  }
}
        </script>
<!-- ********************************************************************************************** -->
 <script>
$("#close-modal-button").click(function() {
		$(".sign-up-modal").fadeOut(200);

});

 </script>

<script> $(document).ready(function(){
	var formInputs = $('input[type="email"],input[type="password"],input[type="text"]');
	formInputs.focus(function() {
       $(this).parent().children('p.formLabel').addClass('formTop');
       $('div#formWrapper').addClass('darken-bg');
       $('div.logo').addClass('logo-active');
	});
	formInputs.focusout(function() {
		if ($.trim($(this).val()).length == 0){
		$(this).parent().children('p.formLabel').removeClass('formTop');
		}
		$('div#formWrapper').removeClass('darken-bg');
		$('div.logo').removeClass('logo-active');
	});
	$('p.formLabel').click(function(){
		 $(this).parent().children('.form-style').focus();
	});

        for (var i = 0; i < formInputs.length; i++) {
            var formInput = formInputs[i];
            var $formInput = $(formInput);
            var inputValue = $formInput.val();
            var hasClass = $formInput.hasClass('form-style');
            if (hasClass && inputValue !== undefined && inputValue.length) {
                $formInput.focus();
            }
        }
    });

        </script>

        <script> (function() {
    if (document.location.hash) {
        setTimeout(function() {
            window.scrollTo(window.scrollX, window.scrollY - 140);
        }, 10);
    }
})();</script>

    	</body>
</html>
