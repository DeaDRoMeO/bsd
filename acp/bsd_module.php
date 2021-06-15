<?php

/**
*
* @package BoardStartDate
* @copyright (c) 2021 DeaDRoMeO ; hello-vitebsk.ru
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace deadromeo\bsd\acp;

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
    exit;
}

/**
* @package acp
*/
class bsd_module
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	public $u_action;

	function main($id, $mode)
	{
		global $config, $request, $template, $user;

		$this->config = $config;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;

		$this->user->add_lang('acp/common');
		$this->tpl_name = 'acp_bsd';
		$this->page_title = $this->user->lang('BSD');
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
		$form_key = 'acp_bsd';
		add_form_key($form_key);
		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key($form_key))
			{
				trigger_error($user->lang('FORM_INVALID') . adm_back_link($this->u_action), E_USER_WARNING);
			}
			$trued = $this->request->variable('trued', 0);
			$this->config->set('trued', $trued);
			$date_c = $this->request->variable('date_c', '');
			$this->config->set('date_c', $date_c);
			$text_b = utf8_normalize_nfc(request_var('text_b', '', true));
			$this->config->set('text_b', $text_b);
			$text_c = utf8_normalize_nfc(request_var('text_c', '', true));
			$this->config->set('text_c', $text_c);
			trigger_error($user->lang['CONFIG_UPDATED'] . adm_back_link($this->u_action));
		}
		$template->assign_vars(array(
		    'BSD_VERSION'			=> isset($this->config['bsd_version']) ? $this->config['bsd_version'] : '',
			'START_DATE'			=>  $timbb,
			'DATE_C'				=> isset($this->config['date_c']) ? $this->config['date_c'] : '',
			'TEXT_B'				=> isset($this->config['text_b']) ? $this->config['text_b'] : '',
			'TEXT_C'				=> isset($this->config['text_c']) ? $this->config['text_c'] : '',
			'DDAY'				=> $timbbb,
			'TRUED'				=> isset($this->config['trued']) ? $this->config['trued'] : '',
			'U_ACTION'				=> $this->u_action,
		));
	}
}

?>