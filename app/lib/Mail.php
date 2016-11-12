<?php

namespace App\Components;

use Phalcon\Mvc\User\Component,
    Phalcon\Mvc\View;

/**
 *
 * Sends e-mails based on pre-defined templates
 */
class Mail extends Component
{
    protected $_transport;

    public function getTemplate($params)
    {
        $parameters = array_merge(array(
            'publicUrl' => '/',
        ), $params);
        return $this->view->getRender('emailTemplates', 'template', $parameters, function($view){
            $view->setRenderLevel(View::LEVEL_LAYOUT);
        });
        return $view->getContent();
    }

    /**
     * Sends e-mails via gmail based on predefined templates
     *
     * @param array $to
     * @param string $subject
     * @param string $name
     * @param array $params
     */
    public function send($params)
    {
        $mailSettings = require_once CONFIG_PATH . '/mail.php';

        $template = $this->getTemplate($params);

        // Create the message
        $message = Swift_Message::newInstance()
            ->setSubject('Новая заявка на сайте')
            ->setTo('klassteams2011@yandex.ru')
            ->setFrom(array(
                $mailSettings->fromEmail => $mailSettings->fromName
            ))
            ->setBody($template, 'text/html');

        if (!$this->_transport) {
            $this->_transport = Swift_SmtpTransport::newInstance(
                $mailSettings->smtp->server,
                $mailSettings->smtp->port,
                $mailSettings->smtp->security
            )
                ->setUsername($mailSettings->smtp->username)
                ->setPassword($mailSettings->smtp->password);
        }
        // Create the Mailer using your created Transport
        $mailer = Swift_Mailer::newInstance($this->_transport);
        return $mailer->send($message);
    }
}