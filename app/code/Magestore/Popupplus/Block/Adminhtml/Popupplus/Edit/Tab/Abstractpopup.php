<?php

namespace Magestore\Popupplus\Block\Adminhtml\Popupplus\Edit\Tab;

/**
 * Class Tab GeneralTab
 */
class Abstractpopup extends \Magento\Backend\Block\Widget\Form\Generic implements 
    \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @var Magento\Customer\Model\Group
     */
    protected $_customerGroup;
    
    /**
     * @var \Magento\Directory\Model\Currency
     */
    protected $_currency;
    /**
     * @var \Magestore\Popupplus\Helper\Data
     */
    protected $_helperData;

    /**
     * @var \Magento\Framework\Locale\ResolverInterface
     */
    protected $_locale;

    /**
     * @var \Magento\Framework\Stdlib\DateTime\TimezoneInterface
     */
    protected $_localeDate;

    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    protected $_wysiwygConfig;

    /**
     * @var \Magento\Rule\Block\Conditions
     */
    protected $_conditions;

    /**
     * @var \Magento\Rule\Block\Actions
     */
    protected $_actions;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;
    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param \Magento\Directory\Model\Currency $currency
     * @param \Magestore\Popupplus\Helper\Data $helperData
     * @param \Magento\Framework\Locale\ResolverInterface $locale
     * @param \Magento\Framework\Stdlib\DateTime\TimezoneInterface $localeDate
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig
     * @param \Magento\Rule\Block\Conditions $conditions
     * @param \Magento\Rule\Block\Actions $actions
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Magento\Customer\Model\Customer\Attribute\Source\Group $customergroup,
        \Magento\Directory\Model\Currency $currency,
        \Magestore\Popupplus\Helper\Data $helperData,
        \Magento\Framework\Locale\ResolverInterface $locale,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $localeDate,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Magento\Rule\Block\Conditions $conditions,
        \Magento\Rule\Block\Actions $actions,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        array $data = array()
    ) {
        $this->_helperData = $helperData;
        $this->_systemStore = $systemStore;
        $this->_customerGroup = $customergroup;
        $this->_currency = $currency;
        $this->_locale = $locale;
        $this->_localeDate = $localeDate;
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_conditions = $conditions;
        $this->_actions = $actions;
        $this->_objectManager =$objectManager;
        $this->_storeManager= $context->getStoreManager();

        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Return Tab label
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Popup Information');
    }

    /**
     * Return Tab title
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Popup Information');
    }

    /**
     * Can show tab in tabs
     *
     * @return boolean
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Tab is hidden
     *
     * @return boolean
     */
    public function isHidden()
    {
        return false;
    }

    public function getCatalogCategoryColection(){
        return $this->_objectManager->create('Magento\Catalog\Model\ResourceModel\Category\Collection');
    }

    public function getRuleTrigerImage(){
        return   $this->_storeManager->getStore()->getBaseUrl().'pub/static/adminhtml/Magento/backend/en_US/images/rule_chooser_trigger.gif';
    }
}
