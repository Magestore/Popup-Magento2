<?php 

namespace Magestore\Popupplus\Controller\Adminhtml;

/**
 * Action Popupplus
 */
abstract class Popupplus extends \Magento\Backend\App\Action
{
    /**
     * Block factory
     *
     * @var \Magento\Framework\View\Element\BlockFactory
     */
    protected $_blockFactory;
    /**
     * @var \Magento\Backend\Model\Session
     */
    protected $_backendSession;
    /**
     * @var \Magestore\Affiliateplus\Model\Session
     */
    protected $_sessionModel;
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
        \Magento\Framework\View\Element\BlockFactory $blockFactory,
//        \Magento\Backend\Model\Session $backendSession
        \Magento\Framework\View\Element\Template\Context $templatecontext
    ) {
//        $this->_backendSession = $backendSession;
        $this->_blockFactory = $blockFactory;
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

    /**
     * @return \Magento\Backend\Model\Session
     */
    public function getBackendSession()
    {
        return $this->_backendSession;
    }

}
