<?php
/**
 * PHP Version 8.*
 * Magento Framework 2.4.6
 *
 * @category Category
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

namespace CWSPS\Lookbook\Controller\AdminHtml\Group;

use CWSPS\Lookbook\Api\Data\GroupsInterfaceFactory;
use CWSPS\Lookbook\Api\GroupsRepositoryInterface;
use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends Action implements HttpPostActionInterface
{
    public function __construct(
        protected Context                 $context,
        private GroupsInterfaceFactory    $groupsInterfaceFactory,
        private GroupsRepositoryInterface $groupsRepositoryInterface
    ) {
        parent::__construct($context);
    }

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface|ResponseInterface|Redirect
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->_request->getPostValue();
        if ($data) {
            try {
                if (!empty($data['entity_id'])) {
                    $group = $this->groupsRepositoryInterface->getById((int)$data['entity_id']);
                    $this->messageManager->addSuccessMessage(__('You updated the group.'));
                } else {
                    $group = $this->groupsInterfaceFactory->create();
                    $this->messageManager->addSuccessMessage(__('You saved the group.'));
                }
                $group->setName($data['name']);
                $group->setIdentifier($data['identifier']);
                $group->setButtonLabel($data['button_label']);
                $group->setButtonLink($data['button_link']);
                $group->setWidth((int)$data['width']);
                $group->setHeight((int)$data['height']);
                $this->groupsRepositoryInterface->save($group);
                $resultRedirect->setPath('*/*/edit', ['entity_id' => $data['entity_id']]);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (Exception $e) {
                $this->messageManager->addExceptionMessage(
                    $e
                    , __('Something went wrong while saving the brand.')
                );
            }
        }
        return $resultRedirect->setPath('*/*/');
    }
}
