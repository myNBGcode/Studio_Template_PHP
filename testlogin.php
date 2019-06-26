<!doctype html>
<?php session_start(); ?>
<?php
require __DIR__ . '/vendor/autoload.php';
use Jumbojett\OpenIDConnectClient;


$oidc = new OpenIDConnectClient('https://my.nbg.gr/identity',
                                $_SESSION['sclientid'],
                                 $_SESSION['sclientsecret']);
$oidc->setRedirectURL ($_SESSION['sredirecturl']);


        $scopestr = $_SESSION['sscope'];
$scopearr =  explode(" ", $scopestr);


foreach($scopearr as $singlescope){

    $oidc->addScope($singlescope);
}
/*
$oidc->addScope('openid');
$oidc->addScope('email');
$oidc->addScope('profile');
*/
//$oidc->setCertPath('/path/to/my.cert');
$oidc->authenticate();
echo 'OauthData';
echo '     <br>   ';
$sub = $oidc->getVerifiedClaims('sub');
$email = $oidc->requestUserInfo('email');
$clientCredentialsToken = $oidc ->getAccessToken() ;
echo '        <br>Sub:  ';
echo $sub;

echo '        <br>Email:  ';
echo $email;
$cookie_name = "Email";
$cookie_value = $email;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

echo '        <br>Token:  ';
echo $clientCredentialsToken;


/*
 $fptest = fopen("token.php", 'w');
    fwrite($fptest, '<?php');
    fwrite($fptest, ' ');

    fwrite($fptest, '$token = "Bearer '.trim($clientCredentialsToken).'";');
    fwrite($fptest, ' ');
    fwrite($fptest, '?>');
    fclose($fptest);


*/

$cookie_name = "Token";
$cookie_value = $clientCredentialsToken;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

if ($clientCredentialsToken  != '') {
	header("Location: /#oauthapiform");
	die();
}



//var_dump($oidc) ;
?>
