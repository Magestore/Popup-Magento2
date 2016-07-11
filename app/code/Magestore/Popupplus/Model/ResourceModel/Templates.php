<?php 

namespace Magestore\Popupplus\Model\ResourceModel;

/**
 * Resource Model Popupplus
 */
class Templates extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init('magestore_popupplus_templates','template_id');
    }
}
