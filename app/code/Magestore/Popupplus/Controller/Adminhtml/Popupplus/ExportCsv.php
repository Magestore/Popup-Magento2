<?php 

namespace Magestore\Popupplus\Controller\Adminhtml\Popupplus;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Controller\ResultFactory;

/**
 * Action ExportCsv
 */
class ExportCsv extends \Magestore\Popupplus\Controller\Adminhtml\Popupplus
{
    /**
     * Execute action
     */
    public function execute()
    {
        $fileName = 'Popuppluss.csv';

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $content = $resultPage->getLayout()->createBlock('Magestore\Popupplus\Block\Adminhtml\Popupplus\Grid')->getCsv();

        /** @var \Magento\Framework\App\Response\Http\FileFactory $fileFactory */
        $fileFactory = $this->_objectManager->get('Magento\Framework\App\Response\Http\FileFactory');
        return $fileFactory->create($fileName, $content, DirectoryList::VAR_DIR);
    }
}
