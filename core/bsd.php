<?php

/**
*
* @package BoardStartDate
* @copyright (c) 2021 DeaDRoMeO ; hello-vitebsk.ru
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace deadromeo\bsd\core;

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

class bsd
{
	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\config\config */
	protected $config;
	
	/** @var \phpbb\content_visibility */
	protected $content_visibility;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\event\dispatcher_interface */
	protected $dispatcher;

	/** @var \phpbb\request\request_interface */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;
	
	/** @var \phpbb\user */
	protected $user;
	
	/** @var string phpBB root path */
	protected $root_path;
	
	/** @var string PHP extension */
	protected $phpEx;

	public function __construct(\phpbb\auth\auth $auth, \phpbb\config\config $config, \phpbb\content_visibility $content_visibility, \phpbb\db\driver\driver_interface $db, \phpbb\event\dispatcher_interface $dispatcher, \phpbb\request\request_interface $request, \phpbb\template\template $template, \phpbb\user $user, $root_path, $phpEx)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->content_visibility = $content_visibility;
		$this->db = $db;
		$this->dispatcher = $dispatcher;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->root_path = $root_path;
		$this->phpEx = $phpEx;

	}
public function display_trued()
	{
		
		if(!isset($this->config['trued']) || !$this->config['trued'])
		{
			return;
		}
		$this->template->assign_vars(array(
			'TRUED'		=> true,
		));
	}
	
public function text_b()
	{
		$text_b 		= $this->config['text_b'];
		$this->template->assign_vars(array(
			'TEXT_B'		=> $text_b,
		));
	}
public function text_c()
	{
		$text_c 		= $this->config['text_c'];
		$this->template->assign_vars(array(
			'TEXT_C'		=> $text_c,
		));
	}		
}
?>