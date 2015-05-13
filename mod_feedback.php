<?php
/**
* @package   ExooHub Feedback
* @author    ExooHub http://www.exoohub.com
* @copyright Copyright (C) ExooHub
* @license   GNU General Public License version 2 or later
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

if(isset($_POST['feedback'])) {

	$input = JFactory::getApplication()->input;
	$formData = new JInput($input->post->get('feedback', '', 'array'));

	// $sender_name = $formData->getWord('name');
	$sender = $formData->getString('email');
	$recipient = $params->get('recipient');
	$subject = $params->get('subject');

	$mailer = JFactory::getMailer();
	$mailer->setSender($sender);
	$mailer->addRecipient($recipient);

	//create the mail
	$mailer->setSubject($subject);

	$body   = '<p><strong>Отправитель:</strong> ' . $formData->getString('name') . '</p>'
		. '<p><strong>Телефон:</strong> ' . $formData->getString('phone') . '</p>'
		. '<p><strong>Сообщение:</strong> ' . $formData->getString('message') . '</p>';

	$mailer->isHTML(true);
	$mailer->Encoding = 'base64';
	$mailer->setBody($body);
	// Optional file attached
	// $mailer->addAttachment(JPATH_COMPONENT.'/assets/document.pdf');

	//sending the mail
	$send = $mailer->Send();
	if ($send !== true) {
	    echo 'Error sending email: ' . $send->__toString();
	} else {
	    require(JModuleHelper::getLayoutPath('mod_feedback', 'success'));
	}
} else {
    require(JModuleHelper::getLayoutPath('mod_feedback'));
}