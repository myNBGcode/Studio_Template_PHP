<!doctype html>
<html>
    	<head>
        	<meta charset="utf8" />
        	<title>Homepage | PHP Sandbox Calls Test Website</title>
        	<link rel="stylesheet" type="text/css" href="main.css"/>
        	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">				</script>
        	<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.21.1/babel.min.js"></script>
    	</head>

    <body>
       <?php
        include ("header.php");
      ?>

        <h1 style="text-align:center;margin-top:35px;font-size:35px;">Welcome to <span style="color:#006e80;">our PHP Sandbox Calls</span> Test Website</h1>
        <h4 style="font-size: 16px;text-align:center;margin-top:-20px;">
            Choose your preferred API type. Fill up the form. Have fun testing!
        </h4>

<!------------- FORM HANDLER v.2 FOR SHOWING AND HIDING THE PROPER FORM DEPENDING ON API TYPE ----------------->

<div class="containerOuter"> <div class="containerContent">
    Choose API type:</div>
  <div class="containerHandler">
    <input type="radio" class="hidden" id="input1" name="inputs" onclick="showHeader(this);checkForm();" checked>
    <label class="entry" for="input1"><div class="circle"></div><div class="entry-label">Header API</div></label>
    <input type="radio" class="hidden" id="input2" name="inputs" onclick="showOauth(this);"  >
    <label class="entry" for="input2"><div class="circle"></div><div class="entry-label">oAuth2 API</div></label>
    <div class="highlight"></div>
    <div class="overlayHandler"></div>
  </div>
</div>
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

<!------------------------------------ FORM FOR APIS WITH HEADERS -------------------------------------------->

       <div class=row>

    <div class="form-style-10" id="headersapiform" class=colform style="pointer-events:auto">
        <h1>Insert your App Credentials! (for Header APIs)<span>Need help? Visit <a href="https://developer.nbg.gr" target="_blank" style="color:white;">developer.nbg.gr</a> for more info.</span></h1>

        <form method="post" id="initial" name="myform2" action="index.php#testcalls">
    <div class="section"><span>1</span>Insert your preferred Sandbox_id.</div>
    <div class="inner-wrap">
    <label>Sandbox_id: <input type="text" name="sandboxid" id="testover" placeholder="e.g. mySandbox" required/>	</label>
    </div>

    <div class="section"><span>2</span>Insert the title of API you want to test.</div>
    <div class="inner-wrap">
        <label>API title:<input type="text" name="api" placeholder="e.g. socialnetwork" required/></label>
    </div>

    <div class="section"><span>3</span>Provide the latest available API version.</div>
        <div class="inner-wrap">
        <label>API version:<input type="text" name="apiversion" placeholder="e.g. v2.2" required/></label>
    </div>

    <div class="section"><span>4</span>Provide the preferred Sandbox User username.</div>
        <div class="inner-wrap">
        <label>Username:<input type="text" name="username" placeholder="e.g. myTestUser" required/></label>
    </div>

    <div class="section"><span>5</span>Provide the Client-Id you obtained for your App.</div>
        <div class="inner-wrap">
        <label>Client-Id:<input type="text" name="clientid" placeholder="e.g. FBCDFHDI-JSUFIEJNDI-SKDHIEJDFJ" required/></label>
    </div>

         <div class="section"><span>6</span>oAuth API Credentials. (Optional)</div>
        <div class="inner-wrap" class="conditional">

						<label for="requirement" style="display:inline-block;">Are you using oAuth API?</label><input type="checkbox" id="requirement" class="control">
						<fieldset class="conditional">
									<label for="option">oAuth Authorization Token:<input type="text" id="option" name="token"></label>
            </fieldset>
    </div>

    <div class="button-section">
     <input type="submit" name="submit" style="margin-left:37%;margin-bottom:10px;" id="submit" value="Let's Code!" />
    </div>
    </form>
        </div>

<!--------------------------------------- FORM FOR APIS WITH OAUTH2 ---------------------------------------->

    <div class="form-style-10" id="oauthapiform" class=colform style="pointer-events:auto">
    <h1>Insert your App Credentials! (for oAuth2 APIs)<span>Need help? Visit <a href="https://developer.nbg.gr" target="_blank" style="color:white;">developer.nbg.gr</a> for more info.</span></h1>

    <form method="post" id="initial" name="myform2" action="index.php#testcalls">
    <div class="section"><span>1</span>Insert your preferred Sandbox_id.</div>
    <div class="inner-wrap">
        <label>Sandbox_id: <input type="text" name="sandboxid" placeholder="e.g. mySandbox" required/></label>
    </div>

    <div class="section"><span>2</span>Insert the title of API you want to test.</div>
    <div class="inner-wrap">
        <label>API title:<input type="text" name="api" placeholder="e.g. socialnetwork" required/></label>
    </div>

    <div class="section"><span>3</span>Provide the latest available API version.</div>
        <div class="inner-wrap">
        <label>API version:<input type="text" name="apiversion" placeholder="e.g. v2.2" required/></label>

    </div>
    <div class="section"><span>4</span>Provide the preferred Sandbox User username.</div>
        <div class="inner-wrap">
        <label>Username:<input type="text" name="username" placeholder="e.g. myTestUser" required/></label>
    </div>

    <div class="section"><span>5</span>Provide the Client-Id you obtained for your App.</div>
        <div class="inner-wrap">
        <label>Client-Id:<input type="text" name="clientid" placeholder="e.g. FBCDFHDI-JSUFIEJNDI-SKDHIEJDFJ" required/></label>
    </div>

         <div class="section"><span>6</span>oAuth API Credentials. (Optional)</div>
        <div class="inner-wrap" class="conditional">

						<label for="requirement" style="display:inline-block;">Are you using oAuth API?</label><input type="checkbox" id="requirement" class="control">
						<fieldset class="conditional">
									<label for="option">oAuth Authorization Token:<input type="text" id="option" name="token"></label>
            </fieldset>
    </div>

    <div class="button-section">
     <input type="submit" name="submit" style="margin-left:37%;" id="submit" value="Let's Code!" />
    </div>
    </form>
           </div> </div>

<!-------------------------------------- REQUEST SAMPLE CALLS BUTTONS ---------------------------------------->

<div id="testcalls" >
        <h3 style="font-size:32px;text-align:center;" >
            Request <span style="color:#015563">Samples:</span>
        </h3> </div>
        <div id="showbuttons" style="text-align:center;margin-bottom:55px;margin-top:25px;" >
        <ol style="font-size: 14px;" >
            <li style="display:inline-block;"> <a href="/createsandbox.php"><button class="button">Create Sandbox call</button></a></li>
            <li style="display:inline-block;"><a href="/exportsandbox.php"><button class="button">Export Sandbox call</button></a></li>
            <li style="display:inline-block;"><a href="/deletesandbox.php"><button class="button">Delete Sandbox call</button></a></li>
            <li style="display:inline-block;"><a href="/createsandboxuser.php"><button class="button">Create Sandbox User call</button></a></li>

 <!--           <li style="display:inline-block;"><a href="/yourNextCall.php"><button class="button">Your Next Call</button></a></li>
            <li style="display:inline-block;"><a href="/yourNextCall2.php"><button class="button">Your Next Call 2</button></a></li>       ---->
        </ol>
        </div>


        <?php
/*************************** REPLACE (!ONLY INITIALIZE!) CERTAIN VALUES OF VARIABLES **************/
    if(isset($_POST["submit"])){
    $str=implode(file('variables.php'));
     //  $strapi=implode(file('variables.php'));

    $fp=fopen('variables.php','w');
    //replace something in the file string - this is a VERY simple example

    echo $sandbox_id;
    $str=str_replace("REPLACE_SANDBOX_ID",   $_POST['sandboxid']   , $str);
    $str=str_replace("REPLACE_API",   $_POST['api']   , $str);
    $str=str_replace("REPLACE_VERSION_API",   $_POST['apiversion']   , $str);
    $str=str_replace("REPLACE_SANDBOX_USERNAME",   $_POST['username']   , $str);
    $str=str_replace("REPLACE_CLIENT_ID",   $_POST['clientid']   , $str);
    //$_SESSION['sandboxid']= $_POST['sandboxid'];
    //$str=str_replace($makis,   $_POST['sandboxid']   , $str);
    //$str=substr_replace("\$sandbox_id=.$_POST['sandboxid']","$_POST['sandboxid']",13);

//write file
file_put_contents($file);
    //now, TOTALLY rewrite the file
    fwrite($fp,$str,strlen($str));
    //fwrite($fp,$strapi,strlen($strapi));}

/*********************** REWRITE THE FILE NAMED VARIABLES.PHP FROM SCRATCH (EVERY OTHER VALUE THAT WAS BEFORE IN THE FILE GETS REWRITTED - ONLY VALUES SHOWN BELOW REMAIN FINALLY IN THE FILE) ****************************/
    $fptest = fopen("variables.php", 'w');
    fwrite($fptest, '<?php');
    fwrite($fptest, ' ');

    fwrite($fptest, '$sandbox_id = "'.trim($_POST['sandboxid']).'";');
       fwrite($fptest, '$api = "'.trim($_POST['api']).'";');
       fwrite($fptest, '$apiversion = "'.trim($_POST['apiversion']).'";');
     fwrite($fptest, '$username = "'.trim($_POST['username']).'";');


    fwrite($fptest, '$client_id = "'.trim($_POST['clientid']).'";');
        fwrite($fptest, '$token = "Bearer '.trim($_POST['token']).'";');

/*********************************** CHECK IF TOKEN WAS GIVEN, SETS TOKENCHECK VALUE (1 OR 2) IN ORDER TO USE THE CORRECT HEADER OR PAYLOAD FIELDS ACCORDING TO API TYPE **********************************/
        if (($_POST['token'])!==''){
    fwrite($fptest, '$tokencheck = "1";');} else{ fwrite($fptest, '$tokencheck = "2";'); }
    fwrite($fptest, ' ');
    fwrite($fptest, '?>');
    fclose($fptest);

/****** REFRESH 3 SECONDS AFTER SUBMIT BUTTON PRESS, IN ORDER TO DISPLAY THE STORED VARIABLES IN FOOTER *****/
echo "<meta http-equiv='refresh' content='3'>";

}
/********************************* INCLUDE FOOTER (HELP AREA) IN PAGE ***********************************/
include ("footer.php");
      ?>

<script>
/*************************** FORM HANDLER WITH RADIO BUTTONS ****************************/

/******************** SHOW HEADER API FORM BY DEFAULT - HIDE OAUTH FORM *****************/
  if(document.getElementById('input1').checked) {
 document.getElementById('oauthapiform').style.pointerEvents="none" ;
    document.getElementById('oauthapiform').style.opacity="0.5" ;
}
/*********************** SHOW HEADER API FORM WHEN FIRST RADIO BUTTON IS CHECKED - HIDE AND DISABLE OAUTH FORM ********************/
  function showHeader(a) {
  if (a.checked == true) {
    document.getElementById('oauthapiform').style.pointerEvents="none" ;
    document.getElementById('oauthapiform').style.opacity="0.5" ;
      document.getElementById('headersapiform').style.pointerEvents="auto" ;
    document.getElementById('headersapiform').style.opacity="1" ;
  }
}
/************************** SHOW OAUTH2 API FORM WHEN SECOND RADIO BUTTON IS CLICKED - HIDE AND DISABLE HEADERS FORM *************************/
            function showOauth(a) {
  if (a.checked == true) {
    document.getElementById('headersapiform').style.pointerEvents="none" ;
    document.getElementById('headersapiform').style.opacity="0.5";
      document.getElementById('oauthapiform').style.pointerEvents="auto" ;
    document.getElementById('oauthapiform').style.opacity="1" ;
  }
}
        </script>

<!--***************************** BACK TO TOP BUTTON ****************************************-->

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

 <script>       // When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
 </script>

    	</body>
</html>
