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

        $model = $this->_objectManager->create('Magestore\Popupplus\Model\Findtemplate')->getCollection()->getLastItem();
        $templateid = $model->getTemplateCode();

        if($templateid){
            /** @var \Magestore\Popupplus\Model\ResourceModel\Popupplus\Collection $collection */
            $templates = $this->_objectManager->create('Magestore\Popupplus\Model\Templates')->load($templateid);

            $data = $templates->getData();

            $popupcontent = $templates->getTemplateFile();
            $popup_success_content = $templates->getTemplateFileSuccess();

            $popuphtml = $this->_blockFactory->createBlock('Magestore\Popupplus\Block\Popupplus');
            $popuphtml->setTemplate($popupcontent);
            $popupfile = $popuphtml->toHtml();

            $popupsuccesshtml = $this->_blockFactory->createBlock('Magestore\Popupplus\Block\Popupplus');
            $popupsuccesshtml->setTemplate($popup_success_content);
            $popupsuccessfile = $popupsuccesshtml->toHtml();

            $data['popup_content'] = $popupfile;
            $data['content_for_success'] = $popupsuccessfile;

            $this->_objectManager->create('Magento\Backend\Model\Session')->setFormData($data);
        }

    }

    /**
     *
     * @param string $class
     * @param string $name
     * @param string $template
     * @return block type
     */
    public function createBlock($class,$name = '',$template = ""){
        $block = "";
        try{
            $block = $this->_view->getLayout()->createBlock($class,$name);
            if($block && $template != ""){
                $block->setTemplate($template);
            }
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        return $block;
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
