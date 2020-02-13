<?php

namespace Boangri\Sergei\ViewModel;

use Boangri\Sergei\Model\ResourceModel\Item\CollectionFactory;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Items implements ArgumentInterface
{
    private $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return \Boangri\Sergei\Model\Item[]
     */
    public function getItems()
    {
        return $this->collectionFactory->create()->getItems();
    }
}
