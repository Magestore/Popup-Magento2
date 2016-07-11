<?php

namespace Magestore\Popupplus\Block\Adminhtml\Popupplus\Edit\Tab;

use Magento\Backend\Block\Widget\Tab\TabInterface;
/**
 * Class Tab GeneralTab
 */
//class PopupTab extends \Magestore\Popupplus\Block\Adminhtml\Popupplus\Edit\Tab\Abstractpopup
class PopupTab extends \Magento\Backend\Block\Widget\Form\Generic implements TabInterface
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

    public function getCatalogCategoryColection(){
        return $this->_objectManager->create('Magento\Catalog\Model\ResourceModel\Category\Collection');
    }

    public function getRuleTrigerImage(){
        return   $this->_storeManager->getStore()->getBaseUrl().'pub/static/adminhtml/Magento/backend/en_US/images/rule_chooser_trigger.gif';
    }

    /**
     * get registry model.
     *
     * @return \Magento\Framework\Model\AbstractModel|null
     */
    public function getRegistryModel()
    {
        return $this->_coreRegistry->registry('registry_model');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Popup information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Popup information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    protected function _prepareForm()
    {
        $model = $this->getRegistryModel();

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        //$form->setHtmlIdPrefix('popup_');

        $fieldset = $form->addFieldset('popup_fieldset', ['legend' => __('Popup Information')]);

        if ($model->getId()) {
            $fieldset->addField('popup_id', 'hidden', ['name' => 'popup_id']);
        }

        $fieldset->addField(
            'title',
            'text',
            [
                'name' => 'title',
                'label' => __('Title:'),
                'title' => __('Title'),
                'required' => true,
                'style' =>  'max-width: 350px',
            ]
        );

        $fieldset->addField(
            'status',
            'select',
            [
                'name' => 'status',
                'label' => __('Status:'),
                'title' => __('Status'),
                'style' =>  'min-width: 350px',
                'options' => \Magestore\Popupplus\Model\Status::getAvailableStatuses(),
            ]
        );

        $fieldset->addField(
            'popup_content',
            'editor',
            [
                'name' => 'popup_content',
                'label' => __('Content:'),
                'title' => __('Content'),
                'required' => true,
                'style' =>  'max-width: 580px',
                'wysiwyg' => true,
                'config' => $this->_wysiwygConfig->getConfig(),
            ]
        );

        $fieldset->addField(
            'content_for_success',
            'editor',
            [
                'name' => 'content_for_success',
                'label' => __('Success Content:'),
                'title' => __('Success Content'),
                'required' => false,
                'wysiwyg' => true,
                'style' =>  'max-width: 580px',
                'config' => $this->_wysiwygConfig->getConfig(),
                'note' => __('Show content success after subcriber and register. If you want to show coupon code, please in sert code: {{block type="campaign/coupon" name="couponcampaign"}}'),
            ]
        );

        $fieldset->addField(
            'width',
            'text',
            [
                'name' => 'width',
                'label' => __('Width:'),
                'title' => __('Width'),
                'required' => false,
                'style' =>  'max-width: 350px',
            ]
        );

        $fieldset->addField(
            'store',
            'select',
            [
                'name' => 'store',
                'label' => __('Store:'),
                'title' => __('Store'),
                'style' =>  'min-width: 350px',
                'required' => false,
                'values' => $this->_systemStore->getStoreValuesForForm(false, true),
            ]
        );

        $showfollow = $fieldset->addField(
            'show_on_page',
            'select',
            [
                'name' => 'show_on_page',
                'label' => __('Show on page:'),
                'title' => __('Show on page'),
                'required' => false,
                'style' =>  'max-width: 350px',
                'values' => array(
                    array(
                        'value' => 'SHOW_ON_ALL_PAGE',
                        'label' => 'All pages',
                    ),
                    array(
                        'value' => 'SHOW_ON_HOME_PAGE',
                        'label' => 'Home Page',
                    ),
                    array(
                        'value' => 'SHOW_ON_PRODUCT_PAGE',
                        'label' => 'Product Detail Page',
                    ),
                    array(
                        'value' => 'SHOW_ON_CATEGORY_PAGE',
                        'label' => 'Category',
                    ),
                    array(
                        'value' => 'SHOW_ON_CART_PAGE',
                        'label' => 'Cart Page',
                    ),
                    array(
                        'value' => 'SHOW_ON_CHECKOUT_PAGE',
                        'label' => 'Checkout Page',
                    ),
                    array(
                        'value' => 'SHOW_ON_URLS_PAGE',
                        'label' => 'Special URLs',
                    ),
                ),
                'style' =>  'min-width: 350px',
                'note'     =>__('Show popup on selected page.'),
            ]
        );

        $showspeciurl = $fieldset->addField(
            'specified_url',
            'text',
            [
                'name' => 'specified_url',
                'label' => __('Specified URL:'),
                'title' => __('Specified URL'),
                'required' => false,
                'style' =>  'max-width: 350px',
            ]
        );

        $collection= $this->_objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
        $productIds = implode(", ", $collection->getAllIds());
        $showproduct = $fieldset->addField(
            'products',
            'text',
            [
                'name' => 'products',
                'label' => __('Products:'),
                'title' => __('Products'),
                'required' => false,
                'style' =>  'max-width: 350px',
                'config' => $this->_wysiwygConfig->getConfig(),
                'class' => 'rule-param',
                'after_element_html' => '<a id="product_link" href="javascript:void(0)" onclick="toggleMainProducts()"><img src="' . $this->getRuleTrigerImage()  . '" alt=""  class="v-middle rule-chooser-trigger" title="Select Products"></a><input type="hidden" value="'.$productIds.'" id="product_all_ids"/><div id="main_products_select" style="display:none; width:640px"></div>
                <script type="text/javascript">
                    function toggleMainProducts(){
                        if($("main_products_select").style.display == "none"){
                            var url = "' . $this->getUrl('magestorepopupplusadmin/popupplus_widget/chooser') . '";
                            var params = $("products").value.split(", ");
                            var parameters = {"form_key": FORM_KEY,"selected[]":params };
                            var request = new Ajax.Request(url,
                            {
                                evalScripts: true,
                                parameters: parameters,
                                onComplete:function(transport){
                                    $("main_products_select").update(transport.responseText);
                                    $("main_products_select").style.display = "block";
                                }
                            });
                        }else{
                            $("main_products_select").style.display = "none";
                        }
                    };


                </script>'
            ]
        );

        // input categories source
        $categoryIds = implode(", ",
            $this->getCatalogCategoryColection()
                ->addFieldToFilter(
                    'level',
                    ['gt' => 0])->getAllIds()
        );
        if(!isset($data['categories'])){
            $data['categories'] = $categoryIds;
        }
        $showcateogry = $fieldset->addField(
            'categories',
            'text',
            [
                'name' => 'categories',
                'label' => __('Categories:'),
                'title' => __('Categories'),
                'style' =>  'max-width: 650px',
                'required' => false,
                'after_element_html' => '<a id="category_link" href="javascript:void(0)" onclick="toggleMainCategories()"><img src="' . $this->getRuleTrigerImage() . '" alt="" class="v-middle rule-chooser-trigger" title="Select Categories"></a>
                <div  id="categories_check" style="display:none">
                    <a href="javascript:toggleMainCategories(1)">Check All</a> / <a href="javascript:toggleMainCategories(2)">Uncheck All</a>
                </div>
                <div id="main_categories_select" style="display:none"></div>
                    <script type="text/javascript">
                    function toggleMainCategories(check){
                        var cate = $("main_categories_select");
                        if($("main_categories_select").style.display == "none" || (check ==1) || (check == 2)){
                        $("categories_check").style.display ="";
                            var url = "' . $this->getUrl('magestorepopupplusadmin/popupplus_category/chooser') . '";
                            if(check == 1){
                                $("categories").value = $("category_all_ids").value;
                            }else if(check == 2){
                                $("categories").value = "";
                            }
                            var params = $("categories").value.split(", ");
                            var parameters = {"form_key": FORM_KEY,"selected[]":params };
                            var request = new Ajax.Request(url,
                                {
                                    evalScripts: true,
                                    parameters: parameters,
                                    onComplete:function(transport){
                                        $("main_categories_select").update(transport.responseText);
                                        $("main_categories_select").style.display = "block";
                                    }
                                });
                        if(cate.style.display == "none"){
                            cate.style.display = "";
                        }else{
                            cate.style.display = "none";
                        }
                    }else{
                        cate.style.display = "none";
                        $("categories_check").style.display ="none";
                    }
                };
		</script>
            '
            ]
        );


            $fieldset->addField(
                'exclude_url',
                'text',
                [
                    'name' => 'exclude_url',
                    'label' => __('Exclude URL:'),
                    'title' => __('Exclude URl'),
                    'required' => false,
                    'style' =>  'max-width: 350px',
                ]
            );



        $fieldset->addField(
            'show_when',
            'select',
            [
                'name' => 'show_when',
                'label' => __('Show When:'),
                'title' => __('Show When'),
                'required' => true,
                'style' =>  'min-width: 350px',
                'values' => array(
                    array(
                        'value' => 'after_load_page',
                        'label' => 'After loading page',
                    ),
                    array(
                        'value' => 'after_seconds',
                        'label' => 'After Seconds',
                    ),
                ),
            ]
        );

        $fieldset->addField(
            'showing_frequency',
            'select',
            [
                'name' => 'showing_frequency',
                'label' => __('Showing Frequency:'),
                'title' => __('Showing Frequency'),
                'required' => true,
                'style' =>  'min-width: 350px',
                'values' => array(
                    array(
                        'value' => 'SHOW_FREQUENCY_EVERY_TIME',
                        'label' => 'Every time',
                    ),
                    array(
                        'value' => 'SHOW_FREQUENCY_UNTIL_CLOSE',
                        'label' => 'Show until user close it',
                    ),
                    array(
                        'value' => 'SHOW_FREQUENCY_ONLY_ONE',
                        'label' => 'Only once',
                    ),
                    array(
                        'value' => 'SHOW_FREQUENCY_ONLY_TRIGGER',
                        'label' => 'When click on trigger',
                    ),
                ),
                'note'     =>__("Show popup based on visitor's behavior."),
            ]
        );

        $fieldset->addField(
            'trigger_popup',
            'text',
            [
                'name' => 'trigger_popup',
                'label' => __('Click Target:'),
                'title' => __('Click Target'),
                'required' => false,
                'style' =>  'max-width: 350px',
                'note'     =>__('Select ID of the popup to be shown when clicking this popup'),
            ]
        );

        $fieldset->addField(
            'priority',
            'text',
            [
                'name' => 'priority',
                'label' => __('Set Priority:'),
                'title' => __('Set Priority'),
                'required' => false,
                'style' =>  'max-width: 350px',
                'note'     =>__('Set priority for popups to be shown. 0 is the lowest priority.'),
            ]
        );


        if($model['width'] == ''){$model['width'] = 300;}
        if($model['priority'] == ''){$model['priority'] = 0;}

        // define field dependencies
//        $this->setChild(
//            'form_after',
//            $this->getLayout()->createBlock(
//                'Magento\Backend\Block\Widget\Form\Element\Dependence'
//            )->addFieldMap(
//                "categories",
//                'show_on_page',
//                'SHOW_ON_CATEGORY_PAGE'
//            )
//        );

        $form->setValues($model->getData());
        $this->setForm($form);

        //field dependencies
        $this->setChild('form_after',$this->getLayout()
            ->createBlock('Magento\Backend\Block\Widget\Form\Element\Dependence')
            ->addFieldMap($showfollow->getHtmlId(), $showfollow->getName())
            ->addFieldMap($showcateogry->getHtmlId(), $showcateogry->getName())
            ->addFieldMap($showproduct->getHtmlId(), $showproduct->getName())
            ->addFieldMap($showspeciurl->getHtmlId(), $showspeciurl->getName())
            ->addFieldDependence(
                $showcateogry->getName(),
                $showfollow->getName(),
                'SHOW_ON_CATEGORY_PAGE'
            )
            ->addFieldDependence(
                $showproduct->getName(),
                $showfollow->getName(),
                'SHOW_ON_PRODUCT_PAGE'
            )
            ->addFieldDependence(
                $showspeciurl->getName(),
                $showfollow->getName(),
                'SHOW_ON_URLS_PAGE'
            )
        );
        
        return parent::_prepareForm();
    }
}
