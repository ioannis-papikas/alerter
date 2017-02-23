<?php

/*
 * This file is part of the Alerter package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alerter\Dispatchers;

use Alerter\Contracts\NotificationDispatcher;
use Alerter\Notifications\Message;
use Exception;

/**
 * Class SMSDispatcher
 * @package Alerter\Dispatchers
 */
class SMSDispatcher extends AbstractDispatcher implements NotificationDispatcher
{
    const __IDENTIFIER = 'SMS';

    /**
     * @return mixed
     */
    public function getDispatcherIdentifier()
    {
        return self::__IDENTIFIER;
    }

    /**
     * Dispatch the notification message to the recipient
     *
     * @param Message $message
     * @param mixed   $recipientId
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function dispatch($message, $recipientId)
    {
        // TODO: Implement dispatch() method.

        return true;
    }
}
