<?php
set_time_limit(0);
function addliru($url, $pass="pass", $mail="mail@mail.ru") {
	$ch = curl_init(); // �������������� ������	
	curl_setopt($ch, CURLOPT_URL, 'http://www.liveinternet.ru/add'); // ������ ����� �����
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // ��������� ��� ����� ������� � ����������, � �� �� �����
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // ���������� �� ����������
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.3 YB/3.5.3'); 
	curl_setopt($ch, CURLOPT_COOKIESESSION, 1); 
	curl_setopt($ch, CURLOPT_POST, 1); // ���������, ��� ��� ����� ��������� POST-������
	curl_setopt($ch, CURLOPT_COOKIEJAR, $_SERVER['DOCUMENT_ROOT'].'/cookies.txt'); // ��������� ���� ��� �������� �������	
	curl_setopt($ch, CURLOPT_COOKIEFILE, $_SERVER['DOCUMENT_ROOT'].'/cookies.txt'); // ��������� ���� ��� �������� �������	
	$post = array(
		'rules' => 'agreed',
		'type' => 'site',
		'nick' => $url,
		'url' => 'http://'.$url,
		'name' => $url,
		'email' => $mail,
		'password' => $pass,
		'check' => $pass,
		'keywords' => '',
		'aliases' => '',
		'group' => '',
		'private' => 'on',
		'subscribe' => 'off',
		'www' => '',
		'confirmed' => ' ���������������� &gt;&gt; '
	);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);	
	$html = curl_exec($ch); //1
	curl_close ($ch);
}
?>