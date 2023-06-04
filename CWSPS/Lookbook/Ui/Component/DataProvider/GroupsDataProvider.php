<?php
/**
 * PHP Version 8.*
 * Magento Framework 2.4.6
 *
 * @category DataProvider
 *
 * @package Lookbook
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 *
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 04/06/23
 * */

declare(strict_types=1);

namespace CWSPS\Lookbook\Ui\Component\DataProvider;

use CWSPS\Lookbook\Api\Data\GroupsInterface;
use CWSPS\Lookbook\Api\GroupsRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\UiComponent\DataProvider\DataProviderInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;

class GroupsDataProvider extends AbstractDataProvider implements DataProviderInterface
{
    /**
     * @var array
     */
    public array $_loadedData = [];

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        private RequestInterface $request,
        private GroupsRepositoryInterface $groupsRepository,
        private SearchCriteriaBuilder $searchCriteriaBuilder,
        array $meta = [],
        array $data = [],
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $entity_id = $this->request->getParam($this->getRequestFieldName());
        if ($entity_id) {
            try {
                $searchCriteria = $this->searchCriteriaBuilder->addFilter(GroupsInterface::ID, $entity_id)->create();
                $items = $this->groupsRepository->getList($searchCriteria)->getItems();
                foreach ($items as $item) {
                    $this->_loadedData[$item->getId()] = $item->getData();
                }
            } catch (LocalizedException $e) {
            }
        }
        return $this->_loadedData;
    }
}
