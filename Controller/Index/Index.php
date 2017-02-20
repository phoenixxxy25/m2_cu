<?php

namespace AD\NewContactUs\Controller\Index;


class Index extends \AD\NewContactUs\Controller\Index
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
