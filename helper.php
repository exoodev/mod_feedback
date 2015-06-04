<?php
/**
* @package   ExooHub Feedback
* @author    ExooHub http://www.exoohub.com
* @copyright Copyright (C) ExooHub
* @license   GNU General Public License version 2 or later
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
 
class modFeedbackHelper
{
	public static function getAjax()
	{
		$input = JFactory::getApplication()->input;
		$formData = new JInput($input->post->get('feedback', '', 'array'));

		return static::sendMail($formData);
	}

	public static function sendMail($formData)
	{
		$module = JModuleHelper::getModule( 'feedback' );
		$registry = new JRegistry();
		$params = $registry->loadString($module->params);

		$recipient = $params->get('recipient');
		$subject = $params->get('subject');
		$sender = $formData->getString('email');

		$mailer = JFactory::getMailer();
		$mailer->setSender($sender);
		$mailer->addRecipient($recipient);

		//create the mail
		$mailer->setSubject($subject);
		$mailer->isHTML(true);
		$mailer->Encoding = 'base64';
		$mailer->setBody(static::getBody($formData));
		// Optional file attached
		// $mailer->addAttachment(JPATH_COMPONENT.'/assets/document.pdf');

		//sending the mail
		$send = $mailer->Send();
		if ($send !== true) {
		    return json_encode('<div class="uk-alert uk-alert-danger uk-margin-large">Error sending email: ' . $send->__toString() . '</div>');
		} else {
		    return json_encode('<div class="uk-alert uk-alert-success uk-margin-large">' . $params->get('success_message') . '</div>');
		}
	}

	public static function getBody($formData)
	{
		$body 	= '<p><strong>Name:</strong> ' . $formData->getString('name') . '</p>'
				. '<p><strong>E-mail:</strong> ' . $formData->getString('email') . '</p>'
				. '<p><strong>Message:</strong> ' . $formData->getString('message') . '</p>';
		return $body;
	}
}