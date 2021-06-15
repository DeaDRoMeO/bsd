<?php

/**
*
* @package BoardStartDate
* @copyright (c) 2021 DeaDRoMeO ; hello-vitebsk.ru
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace deadromeo\bsd\event;

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
    exit;
}

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
protected $config;
protected $db;
protected $request;
protected $template;
protected $user;
protected $bsd_functions;
	



	public function __construct(\deadromeo\bsd\core\bsd $functions, \phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user)
	{
	$this->config = $config;
	$this->db = $db;
	$this->request = $request;
	$this->template = $template;
	$this->user = $user;
	$this->bsd_functions = $functions;
	}

	static public function getSubscribedEvents()
	{
		return array(
		'core.index_modify_page_title' 					=> 'display_bsd',
			'core.user_setup'								=> 'load_language_on_setup',			
		);
	}
public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'deadromeo/bsd',
			'lang_set' => 'bsd',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}
	public function display_bsd($event)
	{
		$this->bsd_functions->display_trued('cd_on', $this->request->variable('f', '0'), true);
		$this->bsd_functions->text_b('text_b', $this->request->variable('text_b', ''));
		$this->bsd_functions->text_c('text_c', $this->request->variable('text_c', ''));
		
	$date_c = isset($this->config['date_c']) ? $this->config['date_c'] : '';
			$time = strtotime($date_c);
			$today = time();
			$day = ($today - $time)/86400;
			$day = floor($day);
			$timbbb = $this->user->lang('DAYST', $day);
			$date_s = isset($this->config['board_startdate']) ? $this->config['board_startdate'] : '';
			$dayst = ($today - $date_s)/86400;
			$dayst = floor($dayst);
			$timbb = $this->user->lang('DAYST', $dayst);
		$this->template->assign_vars(array(
		   
			'START_DATE'			=>  $timbb,
			'DDAY'				=> $timbbb,
		));	
		
	}	
	
}