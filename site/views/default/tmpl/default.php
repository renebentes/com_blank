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
?>

<div class="blank<?php echo $this->pageclass_sfx; ?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<h1>
	<?php if ($this->escape($this->params->get('page_heading'))) : ?>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	<?php else : ?>
		<?php echo $this->escape($this->params->get('page_title')); ?>
	<?php endif; ?>
	</h1>
<?php endif; ?>
</div>
