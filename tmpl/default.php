<?php
/**
* @package   ExooHub Feedback
* @author    ExooHub http://www.exoohub.com
* @copyright Copyright (C) ExooHub
* @license   GNU General Public License version 2 or later
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');

?>

<form class="uk-form uk-form-horizontal" id="feedback-form" method="post">

	<legend><?= $module->title ?></legend>

	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-name">Имя</label>
		<div class="uk-form-controls">
			<input type="text" name="feedback[name]" id="form-h-name" placeholder="Имя" required>
		</div>
	</div>

	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-email">E-mail</label>
		<div class="uk-form-controls">
			<input type="email" name="feedback[email]" id="form-h-email" placeholder="E-mail" required>
		</div>
	</div>

	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-phone">Телефон</label>
		<div class="uk-form-controls">
			<input type="text" name="feedback[phone]" id="form-h-phone" placeholder="Телефон">
		</div>
	</div>

	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-message">Сообщение</label>
		<div class="uk-form-controls">
			<textarea  name="feedback[message]" id="form-h-message" cols="50" rows="5" placeholder="Сообщение"></textarea>
		</div>
	</div>

	<div class="uk-form-row">
		<button class="uk-button uk-button-primary" type="submit">Отправить</button>
	</div>

	<?php echo JHtml::_( 'form.token' ); ?>

</form>