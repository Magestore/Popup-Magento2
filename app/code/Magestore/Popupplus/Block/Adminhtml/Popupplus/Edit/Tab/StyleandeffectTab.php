<?php 

namespace Magestore\Popupplus\Block\Adminhtml\Popupplus\Edit\Tab;

use Magento\Backend\Block\Widget\Tab\TabInterface;

/**
 * Class Tab GeneralTab
 */
class StyleandeffectTab extends \Magento\Backend\Block\Widget\Form\Generic implements TabInterface
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
        return __('Styleandeffect');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Styleandeffect');
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

        $fieldset = $form->addFieldset('styleandeffect_fieldset', ['legend' => __('Styleandeffect Information')]);

        if ($model->getId()) {
            $fieldset->addField('popup_id', 'hidden', ['name' => 'popup_id']);
        }

        $fieldset->addField(
            'corner_style',
            'select',
            [
                'name' => 'corner_style',
                'label' => __('Popup Corners Style: '),
                'title' => __('Popup Corners Style: '),
                'required' => true,
                'values' => array(
                    array(
                        'value' => 'rounded',
                        'label' => 'Rounded',
                    ),
                    array(
                        'value' => 'sharp',
                        'label' => 'Sharp',
                    ),
                    array(
                        'value' => 'circle',
                        'label' => 'Circle',
                    ),
                ),
                'style' =>  'min-width: 350px',
            ]
        );

        $fieldset->addField(
            'border_radius',
            'text',
            [
                'name' => 'border_radius',
                'label' => __('Border Radius In Px:'),
                'title' => __('Border Radius In Px:'),
                'required' => false,
                'style' =>  'max-width: 350px',
            ]
        );

        $fieldset->addField(
            'border_color',
            'text',
            [
                'name' => 'border_color',
                'label' => __('Border Color:'),
                'title' => __('Border Color:'),
                'required' => false,
                'style' =>  'max-width: 350px',
                'class'     =>  'color',
            ]
        );

        $fieldset->addField(
            'border_size',
            'text',
            [
                'name' => 'border_size',
                'label' => __('Border Size In Px:'),
                'title' => __('Border Size In Px:'),
                'required' => false,
                'style' =>  'max-width: 350px',
            ]
        );

        $fieldset->addField(
            'overlay_color',
            'select',
            [
                'name' => 'overlay_color',
                'label' => __('Color overlay:'),
                'title' => __('Color overlay:'),
                'required' => false,
                'note'      => 'Overlay color of popup.',
                'values' => array(
                    array(
                        'value' => 'white',
                        'label' => 'White',
                    ),
                    array(
                        'value' => 'dark',
                        'label' => 'Dark',
                    ),
                    array(
                        'value' => 'no_bg_fix_popup',
                        'label' => 'No background, Popup fixed positioned',
                    ),
                    array(
                        'value' => 'no_bg_absoulute_popup',
                        'label' => 'No background, Popup absolute positioned',
                    ),
                ),
                'style' =>  'min-width: 350px',
            ]
        );

        $fieldset->addField(
            'popup_background',
            'text',
            [
                'name' => 'popup_background',
                'label' => __('Popup Content Background Color:'),
                'title' => __('Popup Content Background Color:'),
                'required' => false,
                'style' =>  'max-width: 350px',
                'class'     =>  'color',
            ]
        );

        $fieldset->addField(
            'padding',
            'text',
            [
                'name' => 'padding',
                'label' => __('Padding Size:'),
                'title' => __('Padding Size:'),
                'required' => false,
                'style' =>  'max-width: 350px',
            ]
        );

        $fieldset->addField(
            'close_style',
            'select',
            [
                'name' => 'close_style',
                'label' => __('Close Icon Style:'),
                'title' => __('Close Icon Style:'),
                'required' => true,
                'note'      => 'Style of popup close icon',
                'values' => array(
                    array(
                        'value' => 'circle',
                        'label' => 'Circle',
                    ),
                    array(
                        'value' => 'simple',
                        'label' => 'Simple',
                    ),
                    array(
                        'value' => 'none',
                        'label' => 'None',
                    ),
                ),
                'style' =>  'min-width: 350px',
            ]
        );

        $fieldset->addField(
            'appear_effect',
            'select',
            [
                'name' => 'appear_effect',
                'label' => __('Appear Effect: '),
                'title' => __('Appear Effect: '),
                'required' => true,
                'note'      => 'Effect show popup on page.',
                'values' => array(
                    array(
                        'value' => 0,
                        'label' => 'Top',
                    ),
                    array(
                        'value' => 1,
                        'label' => 'Bottom',
                    ),
                    array(
                        'value' => 2,
                        'label' => 'Left',
                    ),
                    array(
                        'value' => 3,
                        'label' => 'Right',
                    ),
                    array(
                        'value' => 4,
                        'label' => 'Top Left',
                    ),
                    array(
                        'value' => 5,
                        'label' => 'Top Right',
                    ),
                    array(
                        'value' => 6,
                        'label' => 'Bottom Left',
                    ),
                    array(
                        'value' => 7,
                        'label' => 'Bottom Right',
                    ),
                ),
                'style' =>  'min-width: 350px',
            ]
        );

        $fieldset->addField(
            'custom_css',
            'editor',
            [
                'name' => 'custom_css',
                'label' => __('Custom css style:'),
                'title' => __('Custom css style:'),
                'required' => false,
                'style' =>  'max-width: 550px',
            ]
        );

        if($model['border_color'] == ''){$model['border_color'] = 'FFFFFF';}
        if($model['popup_background'] == ''){$model['popup_background'] = 'FFFFFF';}
        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
