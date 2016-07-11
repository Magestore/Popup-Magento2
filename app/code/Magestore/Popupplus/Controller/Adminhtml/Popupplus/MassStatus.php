<?php 

namespace Magestore\Popupplus\Controller\Adminhtml\Popupplus;

use Magento\Framework\Controller\ResultFactory;

/**
 * Action MassStatus
 */
class MassStatus extends \Magestore\Popupplus\Controller\Adminhtml\Popupplus
{
    /**
     * Execute action
     */
    public function execute()
    {
        $popupIds = $this->getRequest()->getParam('popuppluss');
        $status = $this->getRequest()->getParam('status');

        if (!is_array($popupIds) || empty($popupIds)) {
            $this->messageManager->addError(__('Please select record(s).'));
        } else {
            /** @var \Magestore\Popupplus\Model\ResourceModel\Popupplus\Collection $collection */
            $collection = $this->_objectManager->create('Magestore\Popupplus\Model\ResourceModel\Popupplus\Collection');
            $collection->addFieldToFilter('popup_id', ['in' => $popupIds]);
            try {
                foreach ($collection as $item) {
                    $item->setStatus($status)
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 record(s) have been changed status.', count($popupIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);;

        return $resultRedirect->setPath('*/*/');
    }
}
