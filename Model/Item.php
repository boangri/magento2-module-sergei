<?php

namespace Boangri\Sergei\Model;

use Boangri\Sergei\Api\Data\ItemInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel implements ItemInterface, IdentityInterface
{
    const CACHE_TAG = 'boangri_sergei_item';

    protected $_eventPrefix = 'boangri_sergei_item';

    protected function _construct()
    {
        $this->_init(ResourceModel\Item::class);
    }

    public function getName()
    {
        return $this->getData('name');
    }

    public function getDescription()
    {
        return $this->getData('description');
    }

    public function setName($name)
    {
        return $this->setData('name', $name);
    }

    public function setDescription($description)
    {
        return $this->setData('description', $description);
    }

    /**
     * Return identities
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
