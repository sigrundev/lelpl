<?php

/*
 * This file is a part of a sigrun/lelpl package providing Laravel mail driver
 * for EmailLabs API
 *
 * @author Sigrun Sp. z o.o. <sigrun@sigrun.eu>
 * @author Marek Ognicki <sigrun@sigrun.eu>
 */

namespace Sigrun\El\Transport;

use EmailLabs\Actions\Sendmail;
use EmailLabs\Tools\EmailLabsErrorHandler;
use Illuminate\Mail\Transport\Transport;
use Swift_Mime_SimpleMessage;

class ElTransport extends Transport
{
    /**
     * EmailLabs API key.
     *
     * @var string
     */
    protected $appKey;

    /**
     * EmailLabs secret key.
     *
     * @var string
     */
    protected $appSecret;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->appKey = config('emaillabs.app_key');
        $this->appSecret = config('emaillabs.app_secret');
        $this->smtpAccount = config('emaillabs.smtp_account');

        $this->client = $this->getClient();
    }

    /**
     * Send message.
     *
     * @param Swift_Mime_SimpleMessage $message           Message object
     * @param mixed                    &$failedRecipients Failed recipents container
     *
     * @return bool
     */
    public function send(Swift_Mime_SimpleMessage $message, &$failedRecipients = null)
    {
        // Setting data
        $this->client->setData('from', config('mail.from.address'));
        $this->client->setData('from_name', config('mail.from.name'));

        $this->client->setData('to', $message->getTo());
        $this->client->setData('subject', $message->getSubject());
        //Html or txt are required
        $this->client->setData('html', $message->getBody());

        $this->client->getResult();

        if (\count(EmailLabsErrorHandler::getErrors()) > 0) {
            return false;
        }

        return true;
    }

    /**
     * Get EmailLabs API client with necessary config.
     *
     * @return \EmailLabs\Actions\Sendmail
     */
    protected function getClient()
    {
        $client = new Sendmail();

        $client->setAppKey($this->appKey);
        $client->setAppSecret($this->appSecret);
        $client->setData('smtp_account', $this->smtpAccount);

        return $client;
    }
}