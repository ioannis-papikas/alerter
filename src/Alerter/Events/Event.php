<?php

/*
 * This file is part of the Alerter package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alerter\Events;

use Alerter\Notifications\Notification;
use DateTime;
use Exception;

/**
 * Class Event
 * @package Alerter\Events
 */
class Event
{
    /**
     * @var Notification
     */
    private $notification;

    /**
     * Event constructor.
     *
     * @param Notification $notification
     */
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * @param int           $typeId
     * @param mixed         $entityId
     * @param DateTime|null $timestamp
     *
     * @throws Exception
     */
    public function create($typeId, $entityId, $timestamp = null)
    {
        // Create the event
        $eventId = null;

        // Get all entity watchers
        $watcherIds = $this->getEntityWatchers($entityId);

        // Foreach watcher, generate a notification
        foreach ($watcherIds as $watcherId) {
            $this->notification->createOrUpdate($entityId, $eventId, $watcherId, $timestamp);
        }
    }

    /**
     * @param mixed $entityId
     *
     * @return array
     */
    protected function getEntityWatchers($entityId)
    {
        return [];
    }
}
