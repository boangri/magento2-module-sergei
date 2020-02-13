<?php

namespace Boangri\Sergei\Model;

use Boangri\Sergei\Api\ItemRepositoryInterface;
use Boangri\Sergei\Model\ResourceModel\Item\CollectionFactory;

class ItemRepository implements ItemRepositoryInterface
{
    private $collectionFactory;

    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }
}
