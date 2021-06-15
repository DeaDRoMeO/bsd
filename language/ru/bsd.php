<?php

/**
*
* @package BoardStartDate
* @copyright (c) 2021 DeaDRoMeO ; hello-vitebsk.ru
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'BSD'					=> '«BoardStartDate»',
	'BSD_CONFIG'						=> 'Настройки',
	'BSD_ON'					=> 'Основные настройки',
	'TEXT_B'					=> 'Текст до',
	'TEXT_B_EXP'					=> 'Введите текст, который будет отображаться перед количеством дней',
	'TEXT_C'					=> 'Текст после',
	'TEXT_C_EXP'					=> 'Введите текст, который будет отображаться после количества дней',
	'TRUE_B'					=> 'Использовать настоящий возраст форума ',
	'TRUE_B_EXP'					=> 'Если <strong>Да</strong> - будет показываться количество дней, отсчитанных от настоящей даты запуска форума.<br />Если <strong>Нет</strong> - введите в форму <strong>Своя дата</strong> нужную вам дату в формате <strong>ДД.ММ.ГГГГ</strong>',
	'DATE_F'					=> 'Своя дата',
	'DATE_F_EXP'					=> 'Введите альтернативную дату запуска форума в формате <strong>ДД.ММ.ГГГГ</strong>',
	'PR'					=> 'Результат:',
'DAYST'      => array(
      0   => '<strong>0</strong> дней',
      1   => '<strong>%d</strong> день',
      2   => '<strong>%d</strong> дня',
      3   => '<strong>%d</strong> дней',
   ),
));
