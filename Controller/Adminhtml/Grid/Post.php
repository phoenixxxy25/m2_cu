<?php

namespace AD\NewContactUs\Controller\Adminhtml\Grid;

use Magento\Framework\App\Action\Action;


class Post extends Action
{


    public function execute()
    {
        $post = $this->getRequest()->getPostValue();
        $id=$this->getRequest()->getParam("id");

        $model = $this->_objectManager->create('AD\NewContactUs\Model\Appeal');

        $model->load($id);
        $model->setStatus($post['dd_status']);
        $model->save();

        if(!$id) $this->messageManager->addError(__('Something went wrong. Message not sent.'));
        else $this->messageManager->addSuccess(__('Message sent successfully!'));

            $this->_redirect('*/*/');
            return;
    }


}
