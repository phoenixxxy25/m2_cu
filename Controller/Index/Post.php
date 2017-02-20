<?php

namespace AD\NewContactUs\Controller\Index;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ObjectManager;
use AD\NewContactUs\Controller\Index;


class Post extends Index
{

    private $dataPersistor;


    public function execute()
    {

        $post = $this->getRequest()->getPostValue();
        if (!$post) {
            $this->_redirect('*/*/');
            return;
        }

        $this->inlineTranslation->suspend();
        try {
            $postObject = new \Magento\Framework\DataObject();
            $postObject->setData($post);

            $error = false;

            if (!\Zend_Validate::is(trim($post['username']), 'NotEmpty')) {
                $error = true;
            }
            if (!\Zend_Validate::is(trim($post['comment']), 'NotEmpty')) {
                $error = true;
            }
            if (!\Zend_Validate::is(trim($post['email']), 'EmailAddress')) {
                $error = true;
            }
            if (\Zend_Validate::is(trim($post['hideit']), 'NotEmpty')) {
                $error = true;
            }
            if ($error) {
                throw new \Exception();
            }

            if ($post) {
                $model = $this->_objectManager->create('AD\NewContactUs\Model\Appeal');

                $model->setData($post);
                $model->setStatus(0);


                try {

                    $model->save();

                    $this->messageManager->addSuccess(__('Thanks for ur appeal!'));
                    $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                } catch (\Magento\Framework\Exception\LocalizedException $e) {
                    $this->messageManager->addError($e->getMessage(), __(' FIRST EXEP'));
                } catch (\RuntimeException $e) {
                    $this->messageManager->addError($e->getMessage(), __(' SECOND EXEP'));
                } catch (\Exception $e) {
                    $this->messageManager->addException($e, __('Something went wrong =('));
                }
            }






            $this->getDataPersistor()->clear('new_contact_us');
            $this->_redirect('newcontactus/index');
            return;
        } catch (\Exception $e) {
            $this->inlineTranslation->resume();
            $this->messageManager->addError(
                __('We can\'t process your request right now. Sorry, that\'s all we know.')
            );
            $this->getDataPersistor()->set('new_contact_us', $post);
            $this->_redirect('newcontactus/index');
            return;
        }
    }

    /**
     * Get Data Persistor
     *
     * @return DataPersistorInterface
     */
    private function getDataPersistor()
    {
        if ($this->dataPersistor === null) {
            $this->dataPersistor = ObjectManager::getInstance()
                ->get(DataPersistorInterface::class);
        }

        return $this->dataPersistor;
    }
}
