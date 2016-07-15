<?php

namespace Magestore\Popupplus\Controller\Adminhtml\Popupplus;

use Magento\Framework\Controller\ResultFactory;

/**
 * Action NewAction
 */
class NewFromTemplate extends \Magestore\Popupplus\Controller\Adminhtml\Popupplus
{
    /**
     * Execute action
     */
    public function execute()
    {
//        $param = $this->getRequest();
//        $templateid = $param->getParam('templateid');

        $model = $this->_objectManager->create('Magestore\Popupplus\Model\Findtemplate')->getCollection()->getLastItem();
        $templateid = $model->getTemplateCode();

        if($templateid){
            /** @var \Magestore\Popupplus\Model\ResourceModel\Popupplus\Collection $collection */
            $templates = $this->_objectManager->create('Magestore\Popupplus\Model\ResourceModel\Templates\Collection');
            $templates->addFieldToFilter('template_id',$templateid);
            foreach ($templates->getData() as $template){
                $template_html = $template['template_file'];
                $template_success = $template['template_file_success'];
            }
            $data['popup_content'] = $template_html;
            $data['content_for_success'] = $template_success;

            $this->_objectManager->create('Magento\Backend\Model\Session')->setFormData($data);
//            $this->xlog($template_html);
//            $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
//            $this->$resultForward->forward('edit');
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
