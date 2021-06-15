<?php

/**
*
* @package BoardStartDate
* @copyright (c) 2021 DeaDRoMeO ; hello-vitebsk.ru
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace deadromeo\bsd\migrations;

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
    exit;
}

class release_1_0_0 extends \phpbb\db\migration\migration
{

	public function update_data()
	{
		return array(

			// Add new config vars
			array('config.add', array('bsd_version', '1.0.0')),
			array('config.add', array('date_c', '19.02.2010')),
			array('config.add', array('text_b', '')),
			array('config.add', array('text_c', '')),
			array('config.add', array('trued', 1)),			
			// Add new modules
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'BSD'
			)),

			array('module.add', array(
				'acp',
				'BSD',
				array(
					'module_basename'	=> '\deadromeo\bsd\acp\bsd_module',
					'modes'	=> array('bsd_config'),
				),
			)),
		);
	}

	public function revert_data()
	{
		return array(
			array('config.remove', array('bsd_version')),
			array('config.remove', array('date_c')),
			array('config.remove', array('trued')),
			array('config.remove', array('text_b')),
			array('config.remove', array('text_c')),
			array('module.remove', array(
				'acp',
				'BSD',
				array(
					'module_basename'	=> '\deadromeo\bsd\acp\bsd_module',
					'modes'	=> array('bsd_config'),
				),
			)),
			array('module.remove', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'BSD'
			)),
		);
	}
}