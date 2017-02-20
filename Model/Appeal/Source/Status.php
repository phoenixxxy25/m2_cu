<?php
namespace AD\NewContactUs\Model\Appeal\Source;

class Status implements \Magento\Framework\Data\OptionSourceInterface
{

    protected $appeal;


    public function __construct(\AD\NewContactUs\Model\Appeal $appeal)
    {
        $this->appeal = $appeal;
    }

    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->appeal->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
