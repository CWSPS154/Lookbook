<?php
/**
 * PHP Version 8.*
 * Magento Framework 2.4.6
 *
 * @category SearchResultInterface
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
use Magento\Framework\Api\SearchResultsInterface;

interface GroupsSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get group list.
     *
     * @return GroupsInterface[]
     */
    public function getItems();

    /**
     * Set group list.
     *
     * @param GroupsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
