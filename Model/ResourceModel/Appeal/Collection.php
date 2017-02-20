<?php

namespace AD\NewContactUs\Model\ResourceModel\Appeal;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(
            'AD\NewContactUs\Model\Appeal',
            'AD\NewContactUs\Model\ResourceModel\Appeal'
        );
    }
}