<?php

/**
*
* @package BoardStartDate
* @copyright (c) 2020 DeaDRoMeO ; hello-vitebsk.ru
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

class bsd_info
{
	function module()
	{
		return array(
			'filename'	=> '\deadromeo\bsd\bsd_module',
			'title'		=> 'BSD',
			'modes'		=> array(
				'bsd_config' => array('title' => 'BSD_CONFIG', 'auth' => 'ext_deadromeo/bsd && acl_a_board', 'cat' => array('BSD')),
			),
		);
	}
}

?>