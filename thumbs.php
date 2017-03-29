<?

session_start();

isset($sms_auth);
$sms_auth="9f374d798d005748f6485582cf69b802";
if (md5($_POST['mb_password'])==$sms_auth){

$_SESSION["common"]="okpass";
}


if ($_SESSION["common"]=="okpass"){
	// 이곳에는 제가 관리하던 사이트의 함수들과 특정 소스들이 들어 있었습니다.
	// 정해진 암호를 전송하면 이 구문이 전혀 실행 안되게 하는거 같네요.
<?
}
?>