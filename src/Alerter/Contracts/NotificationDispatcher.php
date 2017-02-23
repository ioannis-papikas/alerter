<?php

/*
 * This file is part of the Alerter package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alerter\Contracts;

use Alerter\Notifications\Message;
use Exception;

/**
 * Interface NotificationDispatcher
 * @package Alerter\Contracts
 */
interface NotificationDispatcher
{
    /**
     * Register the dispatcher to the registry
     */
    public function register();

    /**
     * Check if the dispatcher is enabled for the given user.
     *
     * @param mixed $recipientId
     *
     * @return bool
     */
    public function isEnabled($recipientId);

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
    public function dispatch($message, $recipientId);
}
