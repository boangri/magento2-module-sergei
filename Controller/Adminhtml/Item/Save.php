<?php

namespace Boangri\Sergei\Controller\Adminhtml\Item;

use Boangri\Sergei\Model\ItemFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Save extends Action
{
    private $itemFactory;

    public function __construct(
        Context $context,
        ItemFactory $itemFactory
    ) {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->itemFactory->create()
            ->setData($this->getRequest()->getPostValue()['general'])
            ->save();
        return $this->resultRedirectFactory->create()->setPath('sergei_items/index/index');
    }
}
