<?php

namespace AD\NewContactUs\Controller\Adminhtml\Grid;

use Magento\Framework\App\Action\Action;


class Show extends Action
{

    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }

}
