<?php

namespace Boangri\Sergei\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class ItemAddition implements ObserverInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * ItemAddition constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $this->logger->debug($observer->getEvent()->getObject()->getName() . ' item is created');
    }
}
