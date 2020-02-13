<?php

namespace Boangri\Sergei\Cron;

use Boangri\Sergei\Model\ItemFactory;
use Boangri\Sergei\Model\Config;

class AddItem
{
    private $itemFactory;

    private $config;

    public function __construct(ItemFactory $itemFactory, Config $config)
    {
        $this->itemFactory = $itemFactory;
        $this->config = $config;
    }

    public function execute()
    {
        if ($this->config->isEnabled()) {
            $this->itemFactory->create()
                ->setName('Scheduled item')
                ->setDescription('Created at ' . time())
                ->save();
        }
    }
}
