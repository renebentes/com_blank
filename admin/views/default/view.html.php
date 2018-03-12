<?php
/**
 * @package     Joomla.Site
 * @subpackage  Components.Blank
 *
 * @author      Omar Muhammad <admin@omar84.com>
 * @copyright   Copyright (C) 2012 http://omar84.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        http://omar84.com
 * @since       3.0.2
 */

// No direct access
defined('_JEXEC') or die;

/**
 * View class Default
 *
 * @package     Joomla.Administrator
 * @subpackage  Components.BlankComponent
 * @since       3.0.2
 */
class BlankComponentViewDefault extends JViewLegacy
{
	/**
	 * Method to display the view.
	 *
	 * @param   string  $tpl  A template file to load. [optional]
	 *
	 * @return  mixed         A string if successful, otherwise a JError object.
	 *
	 * @since   3.0.2
	 */
	public function display($tpl = null)
	{
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("", $errors), 500);
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   3.0.2
	 */
	protected function addToolbar()
	{
		JToolBarHelper::title(JText::_('COM_BlankComponent_DEFAULT_TITLE'), 'home-2 default');
	}
}
