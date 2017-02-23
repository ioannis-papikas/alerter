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

/**
 * Class DispatcherLocator
 * @package Alerter\Dispatchers
 */
class DispatcherLocator
{
    /**
     * Locate all dispatchers and return an array of fully qualified names or NotificationDispatcher(s)
     *
     * @return NotificationDispatcher[]
     */
    public function locate()
    {
        $registry = new DispatcherRegistry();

        return [
            new EmailDispatcher($registry),
            new SMSDispatcher($registry)
        ];
    }
}
