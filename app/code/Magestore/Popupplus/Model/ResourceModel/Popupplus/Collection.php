<?php 

namespace Magestore\Popupplus\Model\ResourceModel\Popupplus;

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
        $this->_init('Magestore\Popupplus\Model\Popupplus','Magestore\Popupplus\Model\ResourceModel\Popupplus');
    }
}
