<?php

namespace AD\NewContactUs\Model;

use AD\NewContactUs\Api\Data\AppealInterface;
use Magento\Framework\DataObject\IdentityInterface;

class Appeal  extends \Magento\Framework\Model\AbstractModel implements AppealInterface, IdentityInterface
{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;


    function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = [])
        {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    protected function _construct()
    {
        $this->_init('AD\NewContactUs\Model\ResourceModel\Appeal');
    }


    public function getId()
    {
        return $this->getData(self::APPEAL_ID);
    }

    public function getIdentities()
    {
        return ['new_contact_us_' . $this->getId()];
    }

    public function getUserName()
    {
        return $this->getData(self::USERNAME);
    }

    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    public function getComment()
    {
        return $this->getData(self::COMMENT);
    }

    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    public function getStatus()
    {
        return (bool) $this->getData(self::STATUS);
    }

    public function setId($id)
    {
        return $this->setData(self::APPEAL_ID, $id);
    }

    public function setUserName($username)
    {
        return $this->setData(self::USERNAME, $username);
    }

    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    public function setComment($comment)
    {
        return $this->setData(self::COMMENT, $comment);
    }

    public function setCreationTime($creation_time)
    {
        return $this->setData(self::CREATION_TIME, $creation_time);
    }

    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Решено'), self::STATUS_DISABLED => __('Не решено')];
    }

}
