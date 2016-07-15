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
//        $this->xlog($templateid);
        if($templateid){
            $model = $this->_objectManager->create('Magestore\Popupplus\Model\Findtemplate');
            $model->setData('template_code', $templateid);
            $model->save();
        }
    }

    /**
     * Generate content to log file debug.log By Hattetek.Com
     *
     * @param  $message string|array
     * @return void
     */
    function xlog($message = 'null')
    {
        $log = print_r($message, true);
        \Magento\Framework\App\ObjectManager::getInstance()
            ->get('Psr\Log\LoggerInterface')
            ->debug($log)
        ;
    }
}
