<?php

namespace Magestore\Popupplus\Block\Adminhtml;

/**
 * Block BlockTest
 */
class Loadtemplates extends \Magento\Framework\View\Element\Template
{
    /**
     * Block constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = array()
    ) {
        parent::__construct($context, $data);
    }
}
