<?php 

namespace Magestore\Popupplus\Block\Adminhtml\Popupplus\Edit\Tab;
use Magento\Backend\Block\Widget\Tab\TabInterface;

/**
 * Class Tab GeneralTab
 */
class PlacementTab extends \Magento\Backend\Block\Widget\Form\Generic implements TabInterface
{
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
        array $data = array()
    ) {
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
        return __('Placement');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Placement');
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

        $fieldset = $form->addFieldset('placement_fieldset', ['legend' => __('Placement Information')]);

        if ($model->getId()) {
            $fieldset->addField('popup_id', 'hidden', ['name' => 'popup_id']);
        }

        $fieldset->addField(
            'horizontal_position',
            'select',
            [
                'name' => 'horizontal_position',
                'label' => __('Horizontal alignment:'),
                'title' => __('Horizontal alignment:'),
                'required' => true,
                'note'      => 'Insert number in pixel.',
                'values' => array(
                    array(
                        'value' => 'center',
                        'label' => 'Center',
                    ),
                    array(
                        'value' => 'left',
                        'label' => 'Left',
                    ),
                    array(
                        'value' => 'right',
                        'label' => 'Right',
                    ),
                ),
                'style' =>  'min-width: 350px',
            ]
        );

        $fieldset->addField(
            'vertical_position',
            'select',
            [
                'name' => 'vertical_position',
                'label' => __('Vertical alignment:'),
                'title' => __('Vertical alignment:'),
                'required' => true,
                'values' => array(
                    array(
                        'value' => 'top',
                        'label' => 'Top',
                    ),
                    array(
                        'value' => 'bottom',
                        'label' => 'Bottom',
                    ),
                ),
                'style' =>  'min-width: 350px',
            ]
        );

        $fieldset->addField(
            'vertical_px',
            'text',
            [
                'name' => 'vertical_px',
                'label' => __('Distance from vertical margin'),
                'title' => __('Distance from vertical margin'),
                'required' => false,
                'style' =>  'max-width: 350px',
                'note'      => 'Insert number in pixel.',
            ]
        );
//
        if($model['vertical_px'] == ''){$model['vertical_px'] = 100;}

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
