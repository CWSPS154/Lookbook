<?php
/**
 * PHP Version 8.*
 * Magento Framework 2.4.6
 *
 * @category ResourceModel
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

namespace CWSPS\Lookbook\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Groups extends AbstractDb
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
        $this->_init('cwsps_lookbook_groups', 'entity_id');
    }
}
