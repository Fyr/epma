<?
	$confirm_url = $aUser['User']['confirm_url'];
?>
Уважаемый <?=$aUser['User']['username']?>!<br />
Вы получили это письмо, т.к. вы успешно зарегистрировались на сайте <a href="http://<?=DOMAIN_NAME?>"><?=DOMAIN_TITLE?></a>.<br />
Если Вы не регистрировались на указанном сайте, просто проигнорируйте и удалите это письмо.<br />
<br />
Пожалуйста сохраните это сообщение. Параметры вашей учетной записи:<br />
<br />
Логин: <?=$aUser['User']['email']?><br />
Пароль: <?=$aUser['User']['password_again']?><br />
<br />
Обращаем ваше внимание на то, что пока ваша учетная запись не активна, вы не сможете войти в свой личный кабинет на сайте.<br />
Для активации вашей учетной записи кликните <a href="<?=$confirm_url?>">сюда</a> или перейдите по ссылке ниже:<br />
<a href="<?=$confirm_url?>"><?=$confirm_url?></a><br />
<br />
Добро пожаловать на <?=DOMAIN_TITLE?>!