<?php

namespace Boangri\Sergei\Console\Command;

use Boangri\Sergei\Api\ItemRepositoryInterface;
use Boangri\Sergei\Model\ItemRepository;
use Exception;
use Magento\Framework\Event\ManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Boangri\Sergei\Model\ItemFactory;
use Magento\Framework\Console\Cli;

class AddItem extends Command
{
    const INPUT_KEY_NAME = 'name';
    const INPUT_KEY_DESCRIPTION = 'description';

    /**
     * @var ItemFactory
     */
    private $itemFactory;
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var ManagerInterface
     */
    private $eventManager;
    /**
     * @var ItemRepositoryInterface
     */
    private $itemRepository;

    /**
     * AddItem constructor.
     * @param ItemFactory $itemFactory
     * @param ManagerInterface $eventManager
     * @param ItemRepositoryInterface $itemRepository
     * @param LoggerInterface $logger
     */
    public function __construct(
        ItemFactory $itemFactory,
        ManagerInterface $eventManager,
        ItemRepositoryInterface $itemRepository,
        LoggerInterface $logger
    ) {
        $this->itemFactory = $itemFactory;
        $this->eventManager = $eventManager;
        $this->itemRepository = $itemRepository;
        $this->logger = $logger;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('sergei:item:add')
            ->addArgument(
                self::INPUT_KEY_NAME,
                InputArgument::REQUIRED,
                'Item name'
            )->addArgument(
                self::INPUT_KEY_DESCRIPTION,
                InputArgument::OPTIONAL,
                'Item description'
            );
        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $item = $this->itemFactory->create();
        $item->setName($input->getArgument(self::INPUT_KEY_NAME));
        $item->setDescription($input->getArgument(self::INPUT_KEY_DESCRIPTION));
        try {
            $this->itemRepository->save($item);
            //$this->logger->debug('Item created!');
            //$this->eventManager->dispatch('sergei_item_add_after', ['obj' => $item]);
            return Cli::RETURN_SUCCESS;
        } catch (Exception $e) {
            $this->logger->error('Item NOT created! ' . $e->getMessage());
            return Cli::RETURN_FAILURE;
        }
    }
}
