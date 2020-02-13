<?php

namespace Boangri\Sergei\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Item extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('boangri_sergei_item', 'id');
    }
}