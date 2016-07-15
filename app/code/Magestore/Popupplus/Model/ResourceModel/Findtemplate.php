<?php

namespace Magestore\Popupplus\Model\ResourceModel;

/**
 * Resource Model Popupplus
 */
class Findtemplate extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init('magestore_popup_find_templates','choose_id');
    }
}
