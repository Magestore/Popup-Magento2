<?php 

namespace Magestore\Popupplus\Block\Adminhtml;

/**
 * Grid Container Popupplus
 */
class Popupplus extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_popupplus';
        $this->_blockGroup = 'Magestore_Popupplus';
        $this->_headerText = __('Popupplus grid');
        $this->_addButtonLabel = __('Add New Popupplus');

        parent::_construct();
    }
}
