<?php

namespace Magestore\Popupplus\Model\ResourceModel\Findtemplate;

/**
 * Collection Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init('Magestore\Popupplus\Model\Findtemplate','Magestore\Popupplus\Model\ResourceModel\Findtemplate');
    }
}
