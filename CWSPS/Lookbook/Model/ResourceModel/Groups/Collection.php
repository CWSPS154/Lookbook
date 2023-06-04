<?php
/**
 * PHP Version 8.*
 * Magento Framework 2.4.6
 *
 * @category Collection
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

declare(strict_types=1);

namespace CWSPS\Lookbook\Model\ResourceModel\Groups;

use CWSPS\Lookbook\Model\Groups;
use CWSPS\Lookbook\Model\ResourceModel\Groups as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * @inheritDoc
     */
    protected function _construct(): void
    {
        $this->_init(Groups::class, ResourceModel::class);
    }
}
