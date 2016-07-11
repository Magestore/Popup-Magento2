<?php 

namespace Magestore\Popupplus\Block\Adminhtml\Popupplus;

/**
 * Grid Grid
 */
class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager = null;

    /**
     * {@inheritdoc}
     */
    public function __construct(\Magento\Backend\Block\Template\Context $context, \Magento\Backend\Helper\Data $backendHelper, \Magento\Framework\ObjectManagerInterface $objectManager, array $data = array())
    {
        parent::__construct($context, $backendHelper, $data);
        $this->_objectManager = $objectManager;
    }

    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('Grid');
        $this->setDefaultSort('popup_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    /**
     * {@inheritdoc}
     */
    protected function _prepareCollection()
    {
        $collection = $this->_objectManager->create('Magestore\Popupplus\Model\ResourceModel\Popupplus\Collection');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * {@inheritdoc}
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'popup_id',
            [
                'header'           => __('Popup ID'),
                'index'            => 'popup_id',
                'type'             => 'number',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id',
            ]
        );

        $this->addColumn(
            'title',
            [
                'header'           => __('Title'),
                'index'            => 'title',
                'header_css_class' => 'col-name',
                'column_css_class' => 'col-name',
            ]
        );

        $this->addColumn(
            'store',
            [
                'header'           => __('Store'),
                'index'            => 'store',
                'header_css_class' => 'col-name',
                'column_css_class' => 'col-name',
            ]
        );

        $this->addColumn(
            'show_on_page',
            [
                'header'           => __('Show On Page'),
                'index'            => 'show_on_page',
                'header_css_class' => 'col-name',
                'column_css_class' => 'col-name',
            ]
        );

        $this->addColumn(
            'show_when',
            [
                'header'           => __('Show When'),
                'index'            => 'show_when',
                'header_css_class' => 'col-name',
                'column_css_class' => 'col-name',
            ]
        );

        $this->addColumn(
            'priority',
            [
                'header'           => __('Priority'),
                'index'            => 'priority',
                'header_css_class' => 'col-name',
                'column_css_class' => 'col-name',
            ]
        );

        $this->addColumn(
            'status',
            [
                'header'  => __('Status'),
                'index'   => 'status',
                'type'    => 'options',
                'options' => \Magestore\Popupplus\Model\Status::getAvailableStatuses(),
            ]
        );

        $this->addColumn(
            'edit',
            [
                'header'           => __('Action'),
                'type'             => 'action',
                'getter'           => 'getId',
                'actions'          => [
                    [
                    'caption' => __('Edit'),
                    'url'     => ['base' => '*/*/edit'],
                    'field'   => 'popup_id',
                    ],
                ],
                'filter'           => FALSE,
                'sortable'         => FALSE,
                'index'            => 'popup_id',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action',
            ]
        );

        $this->addExportType('*/*/exportCsv', __('CSV'));
        $this->addExportType('*/*/exportXml', __('XML'));
        $this->addExportType('*/*/exportExcel', __('Excel'));

        return parent::_prepareColumns();
    }

    /**
     * {@inheritdoc}
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('popup_id');
        $this->getMassactionBlock()->setFormFieldName('popuppluss');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label'   => __('Delete'),
                'url'     => $this->getUrl('magestorepopupplusadmin/*/massDelete'),
                'confirm' => __('Are you sure?'),
            ]
        );

        $statuses = \Magestore\Popupplus\Model\Status::getAvailableStatuses();

        array_unshift($statuses, ['label' => '', 'value' => '']);
        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label'      => __('Change status'),
                'url'        => $this->getUrl('magestorepopupplusadmin/*/massStatus', ['_current' => TRUE]),
                'additional' => [
                    'visibility' => [
                        'name'   => 'status',
                        'type'   => 'select',
                        'class'  => 'required-entry',
                        'label'  => __('Status'),
                        'values' => $statuses,
                    ],
                ],
            ]
        );

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => TRUE]);
    }

    /**
     * {@inheritdoc}
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['popup_id' => $row->getId()]);
    }
}
