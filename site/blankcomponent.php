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

// No direct access.
defined('_JEXEC') or die('Restricted access!');

$controller = JControllerLegacy::getInstance('BlankComponent');
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));
$controller->redirect();
