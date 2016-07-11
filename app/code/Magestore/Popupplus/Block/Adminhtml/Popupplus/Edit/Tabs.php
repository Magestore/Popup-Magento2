<?php 

namespace Magestore\Popupplus\Block\Adminhtml\Popupplus\Edit;

/**
 * Tabs containerTabs
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('PopupTab');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Popupplus Information'));
    }

}
