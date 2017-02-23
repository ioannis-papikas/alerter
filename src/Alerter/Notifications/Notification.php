<?php

/*
 * This file is part of the Alerter package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alerter\Notifications;

use Alerter\Dispatchers\DispatcherRegistry;
use DateTime;
use Exception;

/**
 * Class Notification
 * @package Alerter\Notifications
 */
class Notification
{
    /**
     * @var DispatcherRegistry
     */
    private $registry;

    /**
     * NotificationHandler constructor.
     *
     * @param DispatcherRegistry $registry
     */
    public function __construct(DispatcherRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * Create a new notification.
     *
     * @param mixed         $entityId
     * @param int           $eventId
     * @param int           $receiverId
     * @param DateTime|null $timestamp
     *
     * @return bool
     * @throws Exception
     */
    public function create($entityId, $eventId, $receiverId, $timestamp = null)
    {
        // todo: create a notification

        // Dispatch the notification to the user
        $this->dispatch($receiverId);

        return true;
    }

    /**
     * Update the notification content
     *
     * @param mixed         $entityId
     * @param int           $eventId
     * @param int           $receiverId
     * @param DateTime|null $timestamp
     *
     * @return bool
     * @throws Exception
     */
    public function update($entityId, $eventId, $receiverId, $timestamp = null)
    {
        // todo: update the notification

        // Dispatch the notification update to the user
        $this->dispatch($receiverId);

        return true;
    }

    /**
     * Creates or updates an existing notification.
     * The logic behind this function is to check if the same notification exists already
     * and its notification message must be updated and re-sent to the user instead of creating
     * a new notification.
     *
     * @param mixed         $entityId
     * @param int           $eventId
     * @param int           $receiverId
     * @param DateTime|null $timestamp
     *
     * @return bool
     * @throws Exception
     */
    public function createOrUpdate($entityId, $eventId, $receiverId, $timestamp = null)
    {
        // todo: check whether to create or update the notification
        $update = false;
        if ($update) {
            return $this->update($entityId, $eventId, $receiverId, $timestamp);
        }

        return $this->create($entityId, $eventId, $receiverId, $timestamp);
    }

    /**
     * @param mixed $recipient
     *
     * @throws Exception
     */
    protected function dispatch($recipient)
    {
        // Generate notification message
        $message = $this->getMessage();

        // Send to all dispatchers
        $dispatchers = $this->registry->getDispatchers();
        foreach ($dispatchers as $dispatcher) {
            if ($dispatcher->isEnabled($recipient)) {
                $dispatcher->dispatch($message, $recipient);
            }
        }
    }

    /**
     * @return Message
     */
    protected function getMessage()
    {
        // todo: implement notification message generator
        return new Message();
    }
}
