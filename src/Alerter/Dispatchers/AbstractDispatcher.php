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
 * Class AbstractDispatcher
 * @package Alerter\Dispatchers
 */
abstract class AbstractDispatcher implements NotificationDispatcher
{
    /**
     * @var DispatcherRegistry
     */
    private $registry;

    /**
     * @var
     */
    private $userProvider;

    /**
     * @return mixed
     */
    abstract public function getDispatcherIdentifier();

    /**
     * AbstractDispatcher constructor.
     *
     * @param DispatcherRegistry $registry
     * @param                    $userProvider
     */
    public function __construct(DispatcherRegistry $registry, $userProvider = null)
    {
        $this->registry = $registry;
        $this->userProvider = $userProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled($recipientId)
    {
        // Get dispatcher identifier
        $identifier = $this->getDispatcherIdentifier();

        // todo: Check if this dispatcher is enabled for the given recipient

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->getRegistry()->register($this);
    }

    /**
     * @return DispatcherRegistry
     */
    public function getRegistry()
    {
        return $this->registry;
    }

    /**
     * @return mixed
     */
    public function getUserProvider()
    {
        return $this->userProvider;
    }
}
