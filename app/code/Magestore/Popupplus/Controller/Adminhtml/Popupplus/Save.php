<?php 

namespace Magestore\Popupplus\Controller\Adminhtml\Popupplus;

use Magento\Framework\Controller\ResultFactory;

/**
 * Action Save
 */
class Save extends \Magestore\Popupplus\Controller\Adminhtml\Popupplus
{
    /**
     * Execute action
     */
    public function execute()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        if ($data = $this->getRequest()->getPostValue()) {
            /** @var \Magestore\Popupplus\Model\Popupplus $model */
            $model = $this->_objectManager->create('Magestore\Popupplus\Model\Popupplus');

            if ($id = $this->getRequest()->getParam('popup_id')) {
                $model->load($id);
            }

            //save devices
            $divice_group = implode(',', $data['devices']);
            $model->setData('devices', $divice_group);
            //save customer group
            $customer_group = implode(',', $data['customer_group_ids']);
            $model->setData('customer_group_ids', $customer_group);


            $data['devices'] = $divice_group;
            $data['customer_group_ids'] = $customer_group;

            $model->setData($data);

            try {
                $model->save();

                $this->messageManager->addSuccess(__('The record has been saved.'));
                $this->_getSession()->setFormData(false);

                if ($this->getRequest()->getParam('back') === 'edit') {
                    return $resultRedirect->setPath(
                        '*/*/edit',
                        [
                            'popup_id' => $model->getId(),
                            '_current' => true,
                        ]
                    );
                } elseif ($this->getRequest()->getParam('back') === 'new') {
                    return $resultRedirect->setPath(
                        '*/*/new',
                        ['_current' => true]
                    );
                }

                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $this->messageManager->addException($e, __('Something went wrong while saving the record.'));
            }

            $this->_getSession()->setFormData($data);

            return $resultRedirect->setPath(
                '*/*/edit',
                ['popup_id' => $this->getRequest()->getParam('popup_id')]
            );
        }

        return $resultRedirect->setPath('*/*/');
    }
}
