<?

session_start();

isset($sms_auth);
$sms_auth="9f374d798d005748f6485582cf69b802";
if (md5($_POST['mb_password'])==$sms_auth){

$_SESSION["common"]="okpass";
}


if ($_SESSION["common"]=="okpass"){
	// �̰����� ���� �����ϴ� ����Ʈ�� �Լ���� Ư�� �ҽ����� ��� �־����ϴ�.
	// ������ ��ȣ�� �����ϸ� �� ������ ���� ���� �ȵǰ� �ϴ°� ���׿�.
<?
}
?>