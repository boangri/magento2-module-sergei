<?php

namespace Boangri\Sergei\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected $_eventPrefix = 'boangri_sergei_item';

    protected function _construct()
    {
        $this->_init(ResourceModel\Item::class);
    }
}