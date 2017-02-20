<?php

namespace AD\NewContactUs\Block\Adminhtml;

use AD\NewContactUs\Model\AppealFactory;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class AppealBlock extends Template
{
    protected $__appealFactory;
    protected $request;

    public function __construct(Context $context,
                                AppealFactory $appealFactory,
                                \Magento\Framework\App\Request\Http $request,
                                array $data = [])
    {
        $this->__appealFactory = $appealFactory;
        $this->request     = $request;

        parent::__construct($context, $data);
    }

    public function getFormAction()
    {
        $appeal_id = $this->request->getParam('id');
        return $this->getUrl('appeal/grid/post/id', ['id' => $appeal_id, '_secure' => true]);
    }

    public function getItem()
    {
        $appealModel = $this->__appealFactory->create();
        $appeal_id = $this->request->getParam('id');
        if(!$appeal_id || $appeal_id < 0) $appeal_id = 65;
        $item = $appealModel->load($appeal_id);
        return $item->getData();

    }

}