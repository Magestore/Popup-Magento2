<?php 

namespace Magestore\Popupplus\Model\ResourceModel;

/**
 * Resource Model Popupplus
 */
class Popupplus extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init('magestore_popupplus_popupplus','popup_id');
    }
}
