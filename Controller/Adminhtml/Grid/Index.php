<?php

namespace AD\NewContactUs\Controller\Adminhtml\Grid;


class Index extends \Magento\Backend\App\Action
{
    const ACL_RESOURCE = 'AD_NewContactUs::appeal_grid';
    const MENU_ITEM = 'AD_NewContactUs::appeal_grid';
    const TITLE = 'Appeals Grid';

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('AD_NewContactUs::appeal');
    }

    public function execute()
    {
        $resultPage = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu(self::MENU_ITEM);
        $resultPage->getConfig()->getTitle()->prepend(__(self::TITLE));
        return $resultPage;
    }

}
