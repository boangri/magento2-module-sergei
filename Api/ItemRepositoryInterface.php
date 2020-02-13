<?php

namespace Boangri\Sergei\Api;

use Boangri\Sergei\Api\Data\ItemInterface;

interface ItemRepositoryInterface
{
    /**
     * @return ItemInterface[]
     */
    public function getList();
}
