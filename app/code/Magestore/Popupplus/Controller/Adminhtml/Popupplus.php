<?php 

namespace Magestore\Popupplus\Controller\Adminhtml;

/**
 * Action Popupplus
 */
abstract class Popupplus extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\Session\SessionManagerInterface
     */
    protected $_session;
    /**
     * Action constructor
     *
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Element\Template\Context $templatecontext
    ) {
        $this->_session = $templatecontext->getSession();
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magestore_Popupplus::magestorepopupplus');
    }
}
