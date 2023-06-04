<?php
/**
 * PHP Version 8.*
 * Magento Framework 2.4.6
 *
 * @category Controller
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

namespace CWSPS\Lookbook\Controller\AdminHtml\Index;

use CWSPS\Lookbook\Model\Config;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Forward;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class Index extends Action implements HttpGetActionInterface
{
    public const ADMIN_RESOURCE = 'CWSPS_Lookbook::view_groups';

    /**
     * @param Context $context
     * @param Config $config
     */
    public function __construct(
        protected Context $context,
        private Config    $config
    ) {
        parent::__construct($context);
    }

    /**
     * @inheritDoc
     */
    public function execute(): Forward|ResultInterface|ResponseInterface|Page
    {
        if (!$this->config->isEnabled()) {
            /** @var Forward $resultForward */
            $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
            $resultForward->forward('noroute');
            return $resultForward;
        }

        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('CWSPS_Lookbook::lookbook')
            ->addBreadcrumb(__('Lookbook Menu'), __('Lookbook'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Lookbook'));
        return $resultPage;
    }
}
