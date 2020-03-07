<?php

namespace Boangri\Sergei\Model;

use Boangri\Sergei\Api\Data\ItemInterface;
use Boangri\Sergei\Api\ItemRepositoryInterface;
use Boangri\Sergei\Model\ResourceModel\Item\CollectionFactory;
use Magento\Framework\Exception\AlreadyExistsException;

class ItemRepository implements ItemRepositoryInterface
{
    private $collectionFactory;
    private $resourceModel;

    public function __construct(
        CollectionFactory $collectionFactory,
        ResourceModel\Item $resourceModel
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->resourceModel = $resourceModel;
    }

    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }

    /**
     * @param ItemInterface $item
     * @throws AlreadyExistsException
     */
    public function save(ItemInterface $item)
    {
        $this->resourceModel->save($item);
    }
}
