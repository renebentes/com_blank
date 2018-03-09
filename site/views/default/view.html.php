<?php
/**
 * @package     Joomla.Site
 * @subpackage  Components.Blank
 *
 * @author      Omar Muhammad <admin@omar84.com>
 * @copyright   Copyright (C) 2012 http://omar84.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        http://omar84.com
 * @since       3.0.1
 */

// No direct access
defined('_JEXEC') or die;

/**
 * View class Default
 *
 * @package     Joomla.Site
 * @subpackage  Components.Blank
 * @since       3.0.1
 */
class BlankComponentViewDefault extends JViewLegacy
{
	protected $params;

	/**
	 * Method to display the view.
	 *
	 * @param   string  $tpl  A template file to load. [optional]
	 *
	 * @return  mixed         A string if successful, otherwise a JError object.
	 *
	 * @since   3.0.1
	 */
	public function display($tpl = null)
	{
		$app                 = JFactory::getApplication();
		$params              = $app->getParams();
		$this->pageclass_sfx = htmlspecialchars($params->get('pageclass_sfx'));
		$this->params        = &$params;
		$menus               = $app->getMenu();
		$active              = $menus->getActive();

		if (isset($active->query['layout']))
		{
			$this->setLayout($active->query['layout']);
		}

		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("", $errors), 500);
		}

		$this->prepareDocument();
		parent::display($tpl);
	}

	/**
	 * Prepares the document
	 *
	 * @return  void
	 *
	* @since   3.0.1
	 */
	protected function prepareDocument()
	{
		$app   = JFactory::getApplication();
		$menus = $app->getMenu();
		$menu  = $menus->getActive();

		if ($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		}
		else
		{
			$this->params->def('page_heading', JText::_($this->pageHeading));
		}

		$title = $this->params->get('page_title', '');
		if (empty($title))
		{
			$title = $app->get('sitename');
		}
		elseif ($app->get('sitename_pagetitles', 0) == 1)
		{
			$title = JText::sprintf('JPAGETITLE', $app->get('sitename'), $title);
		}
		elseif ($app->get('sitename_pagetitles', 0) == 2)
		{
			$title = JText::sprintf('JPAGETITLE', $title, $app->get('sitename'));
		}

		$this->document->setTitle($title);

		if ($this->params->get('menu-meta_description'))
		{
			$this->document->setDescription($this->params->get('menu-meta_description'));
		}

		if ($this->params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}
	}
}
