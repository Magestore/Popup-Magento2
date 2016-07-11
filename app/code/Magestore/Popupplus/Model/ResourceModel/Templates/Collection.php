<?php 

namespace Magestore\Popupplus\Model\ResourceModel\Templates;

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
        $this->_init('Magestore\Popupplus\Model\Templates','Magestore\Popupplus\Model\ResourceModel\Templates');
    }
}
