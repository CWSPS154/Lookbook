<?php
/**
 * PHP Version 8.*
 * Laravel Framework 9.* - 10.*
 *
 * @category Repository
 *
 * @package Laravel
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 *
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 03/06/23
 * */

declare(strict_types=1);

namespace CWSPS\Lookbook\Model;

use CWSPS\Lookbook\Api\Data\GroupsInterface;
use CWSPS\Lookbook\Api\Data\GroupsInterfaceFactory;
use CWSPS\Lookbook\Api\GroupsRepositoryInterface;
use CWSPS\Lookbook\Model\ResourceModel\Groups;
use CWSPS\Lookbook\Model\ResourceModel\Groups\CollectionFactory;
use Exception;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;

class GroupsRepository implements GroupsRepositoryInterface
{
    /**
     * @param Groups $resourceModel
     * @param GroupsInterfaceFactory $groupsInterfaceFactory
     * @param CollectionFactory $collectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param SearchResultsInterfaceFactory $searchResultsInterfaceFactory
     */
    public function __construct(
        private ResourceModel\Groups                   $resourceModel,
        private GroupsInterfaceFactory                 $groupsInterfaceFactory,
        private ResourceModel\Groups\CollectionFactory $collectionFactory,
        private CollectionProcessorInterface           $collectionProcessor,
        private SearchResultsInterfaceFactory          $searchResultsInterfaceFactory
    ) {
    }

    /**
     * @inheritDoc
     */
    public function save(GroupsInterface $group): GroupsInterface
    {
        try {
            $this->resourceModel->save($group);
        } catch (Exception|AlreadyExistsException $e) {
            throw new LocalizedException(__($e->getMessage()));
        }
        return $group;
    }

    /**
     * @inheritDoc
     */
    public function getByField(int|string $value, string $field = null): GroupsInterface
    {
        $group = $this->groupsInterfaceFactory->create();
        $this->resourceModel->load($group, $value, $field);
        if ($group->getData($field) != $value) {
            throw NoSuchEntityException::singleField($field, $value);
        }
        return $group;
    }

    /**
     * @inheritDoc
     */
    public function getById(int $groupId): GroupsInterface
    {
        return $this->getByField($groupId);
    }

    /**
     * @inheritDoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        $searchResults = $this->searchResultsInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(GroupsInterface $group): bool
    {
        $group = $this->groupsInterfaceFactory->create();
        try {
            $this->resourceModel->delete($group);
            return true;
        } catch (Exception $e) {
            throw new StateException(__('Cannot delete group.'), $e);
        }
    }

    /**
     * @inheritDoc
     */
    public function deleteById(int $groupId): bool
    {
        $group = $this->getById($groupId);
        return $this->delete($group);
    }
}
