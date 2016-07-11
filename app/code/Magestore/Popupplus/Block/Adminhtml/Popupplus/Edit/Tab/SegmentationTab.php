<?php 

namespace Magestore\Popupplus\Block\Adminhtml\Popupplus\Edit\Tab;
use Magento\Backend\Block\Widget\Tab\TabInterface;

/**
 * Class Tab GeneralTab
 */
class SegmentationTab extends \Magento\Backend\Block\Widget\Form\Generic implements TabInterface
{

    /**
     * @var Magento\Customer\Model\Group
     */
    protected $_customerGroup;
    /**
     * Tab constructor
     *
     * @param \Magento\Backend\Block\Template\Context   $context
     * @param \Magento\Framework\Registry               $registry
     * @param \Magento\Framework\Data\FormFactory       $formFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Customer\Model\Customer\Attribute\Source\Group $customergroup,
        array $data = array()
    ) {

        $this->_customerGroup = $customergroup;
        parent::__construct($context, $registry, $formFactory, $data);
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
        return __('Segmentation');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Segmentation');
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

        $fieldset = $form->addFieldset('segmentation_fieldset', ['legend' => __('Segmentation Information')]);

        if ($model->getId()) {
            $fieldset->addField('popup_id', 'hidden', ['name' => 'popup_id']);
        }

        $fieldset->addField(
            'devices',
            'multiselect',
            [
                'name' => 'devices',
                'label' => __('Devices'),
                'title' => __('Devices'),
                'required' => true,
                'note'      => "Allow show popup for devices.",
                'values' => array(
                    array(
                        'value' => 'all_device',
                        'label' => 'All Devices',
                    ),
                    array(
                        'value' => 'pc_laptop',
                        'label' => 'PC and Laptop',
                    ),
                    array(
                        'value' => 'tablet_mobile',
                        'label' => 'Mobile and Tablet',
                    ),
                ),
                'style' =>  'min-width: 350px',
            ]
        );

        $fieldset->addField(
            'cookie_time',
            'text',
            [
                'name' => 'cookie_time',
                'label' => __('Cookie Life Time:'),
                'title' => __('Cookie Life Time:'),
                'required' => false,
                'value' => '1',
                'style' =>  'max-width: 350px',
            ]
        );

        $fieldset->addField(
            'returning_user',
            'select',
            [
                'name' => 'returning_user',
                'label' => __('Visitor type:'),
                'title' => __('Visitor type:'),
                'required' => true,
                'note'      => "Allow show popup for return or new customer .",
                'values' => array(
                    array(
                        'value' => 'alluser',
                        'label' => 'All Visitors',
                    ),
                    array(
                        'value' => 'return',
                        'label' => 'Return Visitors',
                    ),
                    array(
                        'value' => 'new',
                        'label' => 'New Visitors',
                    ),
                ),
                'style' =>  'min-width: 350px',
            ]
        );

        $fieldset->addField(
            'login_user',
            'select',
            [
                'name' => 'login_user',
                'label' => __('User Login:'),
                'title' => __('User Login:'),
                'required' => true,
                'note'      => "Show popup when user login.",
                'values' => array(
                    array(
                        'value' => 'all_user',
                        'label' => 'All Visitors',
                    ),
                    array(
                        'value' => 'registed_loged',
                        'label' => 'Logged In Users',
                    ),
                    array(
                        'value' => 'logout_not_register',
                        'label' => 'Unlogged In Users',
                    ),
                ),
                'style' =>  'min-width: 350px',
            ]
        );

        $fieldset->addField(
            'customer_group_ids',
            'multiselect',
            [
                'name' => 'customer_group_ids',
                'label' => __('Customer groups:'),
                'title' => __('Customer groups:'),
                'required' => true,
                'note'      => "Show popup for customer group.",
                'style' =>  'min-width: 350px',
                'values' => $this->_customerGroup->getAllOptions(),
            ]
        );

        $fieldset->addField(
            'user_ip',
            'text',
            [
                'name' => 'user_ip',
                'label' => __('User IP:'),
                'title' => __('User IP:'),
                'required' => false,
                'note'      => "Only show popup for these IP addresses.",
                'style' =>  'max-width: 350px',
            ]
        );

        if($model['cookie_time'] == ''){$model['cookie_time'] = 1;}
        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
