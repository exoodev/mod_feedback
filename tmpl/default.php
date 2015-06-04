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

<div class="feedback-module">

<form class="uk-form" id="feedback-form" method="post">

	<div class="uk-form-row">
		<div class="uk-form-icon uk-display-block">
			<i class="uk-icon-user"></i>
			<input class="uk-width-1-1 uk-form-large" type="text" name="feedback[name]" id="form-h-name" placeholder="Имя" required>
		</div>
	</div>

	<div class="uk-form-row">
		<div class="uk-form-icon uk-display-block">
			<i class="uk-icon-envelope"></i>
			<input class="uk-width-1-1 uk-form-large" type="email" name="feedback[email]" id="form-h-email" placeholder="E-mail" required>
		</div>
	</div>

	<div class="uk-form-row">
		<!-- <label class="uk-form-label" for="form-h-message">Сообщение</label> -->
		<div class="uk-form-controls">
			<textarea class="uk-width-1-1 uk-form-large" name="feedback[message]" id="form-h-message" cols="50" rows="5" placeholder="Сообщение"></textarea>
		</div>
	</div>

	<div class="uk-form-row">
		<button class="uk-button uk-button-primary uk-button-large" type="submit">Отправить</button>
	</div>

	<!-- <div class="g-recaptcha" data-sitekey="6LcFGwcTAAAAAD6obbC86dZ4rqvZkSlwY2EvfpvO"></div> -->

	<input name="option" value="com_ajax" hidden>
	<input name="module" value="feedback" hidden>
	<input name="format" value="raw" hidden>

	<?php echo JHtml::_( 'form.token' ); ?>

</form>

</div>