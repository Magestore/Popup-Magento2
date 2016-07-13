<?php

namespace Magestore\Popupplus\Block\Adminhtml;
use Magestore\Popupplus\Model\Templates as TemplatesModel;
/**
 * Block BlockTest
 */
class Loadtemplates extends \Magento\Framework\View\Element\Template
{
    /**
     * Popupplus store manager.
     *
     * @var
     */
    protected$_storeManager;
    /**
     * Popupplus collecion factory.
     *
     * @var \Magestore\Popupplus\Model\ResourceModel\Templates\CollectionFactory
     */
    protected $_templateCollectionFactory;
    /**
     * Block constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magestore\Popupplus\Model\ResourceModel\Templates\CollectionFactory $templateCollectionFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = array()
    ) {
        parent::__construct($context, $data);
        $this->_templateCollectionFactory = $templateCollectionFactory;
        $this->_storeManager=$storeManager;
    }

    /**
     * get Model templates
     *
     * @return string|null
     */
    public function getTemplates()
    {
        return TemplatesModel;
    }

    /**
     * get Model templates items
     *
     * @return string|null
     */
    public function getTemplateItems()
    {
        $templateCollection = $this->_templateCollectionFactory->create();

        return $templateCollection;
    }

    public function getbaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
    }
    


}
