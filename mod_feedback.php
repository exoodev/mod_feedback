<?php
/**
* @package   ExooHub Feedback
* @author    ExooHub http://www.exoohub.com
* @copyright Copyright (C) ExooHub
* @license   GNU General Public License version 2 or later
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

// Include the helper.
require_once __DIR__ . '/helper.php';

$doc = JFactory::getDocument();
$js = <<<JS
(function ($) {
	$(document).on('submit', '#feedback-form', function () {
		$.ajax({
			type   : 'POST',
			data   : $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				$('.feedback-module').html(response);
			}
		});
		return false;
	});
})(jQuery)
JS;
$doc->addScriptDeclaration($js);

require(JModuleHelper::getLayoutPath('mod_feedback'));