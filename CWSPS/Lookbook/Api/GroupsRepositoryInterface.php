<?php
/**
 * PHP Version 8.*
 * Magento Framework 2.4.6
 *
 * @category RepositoryInterface
 *
 * @package Lookbook
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 *
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 03/06/23
 * */

namespace CWSPS\Lookbook\Api;

use CWSPS\Lookbook\Api\Data\GroupsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

interface GroupsRepositoryInterface
{
    /**
     * Save group.
     *
     * @param GroupsInterface $group
     * @return GroupsInterface
     * @throws LocalizedException
     */
    public function save(GroupsInterface $group): GroupsInterface;

    /**
     * Retrieve group by field
     *
     * @param int|string $value
     * @param string|null $field
     * @return GroupsInterface
     * @throws LocalizedException
     */
    public function getByField(int|string $value, string $field = null): GroupsInterface;

    /**
     * Retrieve group.
     *
     * @param int $groupId
     * @return GroupsInterface
     * @throws LocalizedException
     */
    public function getById(int $groupId): GroupsInterface;

    /**
     * Retrieve group matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface;

    /**
     * Delete group.
     *
     * @param GroupsInterface $group
     * @return bool true on success
     * @throws LocalizedException
     */
    public function delete(GroupsInterface $group): bool;

    /**
     * Delete group by ID.
     *
     * @param int $groupId
     * @return bool true on success
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById(int $groupId): bool;
}
