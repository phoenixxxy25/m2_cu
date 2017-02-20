<?php


namespace AD\NewContactUs\Block;

use Magento\Framework\View\Element\Template;

/**
 * Main contact form block
 */
class ContactForm extends Template
{
    /**
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
    }

    /**
     * Returns action url for contact form
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('newcontactus/index/post', ['_secure' => true]);
    }
}
