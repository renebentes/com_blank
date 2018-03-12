<?php
/**
 * @package     Joomla.Site
 * @subpackage  Components.Blank
 *
 * @author      Omar Muhammad <admin@omar84.com>
 * @copyright   Copyright (C) 2012 http://omar84.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        http://omar84.com
 * @since       3.0.0
 */

// No direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tabstate');

if (!JFactory::getUser()->authorise('core.manage', 'com_blankcomponent'))
{
	throw new JAccessExceptionNotallowed(JText::_('JERROR_ALERTNOAUTHOR'), 403);
}

$controller = JControllerLegacy::getInstance('BlankComponent');
$controller->execute(JFactory::getApplication()->input->getCmd('task'));
$controller->redirect();

