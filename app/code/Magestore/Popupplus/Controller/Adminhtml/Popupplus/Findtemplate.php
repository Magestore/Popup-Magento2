<?php

namespace Magestore\Popupplus\Controller\Adminhtml\Popupplus;

use Magento\Framework\Controller\ResultFactory;

/**
 * Action NewAction
 */
class Findtemplate extends \Magestore\Popupplus\Controller\Adminhtml\Popupplus
{
    /**
     * Execute action
     */
    public function execute()
    {
        $param = $this->getRequest();
        $templateid = $param->getParam('templateid');
        if($templateid){

        }
    }
}
