<?php

namespace Boangri\Sergei\Api;

use Boangri\Sergei\Api\Data\ItemInterface;

interface ItemRepositoryInterface
{
    /**
     * @return ItemInterface[]
     */
    public function getList();

    /**
     * Create or update an item.
     *
     * @param ItemInterface $item
     * @return $this
     */
    public function save(ItemInterface $item);
}
