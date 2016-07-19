<?php 

namespace Magestore\Popupplus\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /*insert data into magestore_popupplus_templates*/
        $data = [
            [1, 'Template 01 - Subscribe ', '1', 'Magestore_Popupplus::popup/subscribe/template01.phtml', 'Magestore_Popupplus::popup/success/success01.phtml', '0', 'Magestore_Popupplus/images/popup/template_images/template01.png', 800, 'px', 'rounded', 20, '0', 0, '000000', 'FFF0F8', 0, 'simple', 1, 'top', NULL, 'center', 100, 'top', 100, NULL],
            [2, 'Template 02 - Subscribe ', '2', 'Magestore_Popupplus::popup/subscribe/template02.phtml', 'Magestore_Popupplus::popup/success/success02.phtml', '0', 'Magestore_Popupplus/images/popup/template_images/template02.png', 800, 'px', 'rounded', 20, '', 0, '000000', 'FFF5F8', 0, 'simple', 0, 'top', NULL, 'center', 100, 'top', 100, NULL],
            [3, 'Template 03 - Subscribe', '3', 'Magestore_Popupplus::popup/subscribe/template03.phtml', 'Magestore_Popupplus::popup/success/success03.phtml', '0', 'Magestore_Popupplus/images/popup/template_images/template03.png', 700, 'px', 'rounded', 10, '', 0, '000000', 'ffffff', 0, '', 0, 'top', NULL, 'center', 100, 'top', 100, NULL],
            [4, 'Template 04 - Subscribe', '4', 'Magestore_Popupplus::popup/subscribe/template04.phtml', 'Magestore_Popupplus::popup/success/success04.phtml', '0', 'Magestore_Popupplus/images/popup/template_images/template04.png', 500, 'px', 'rounded', 20, '', 0, '000000', 'BBAEAE', 20, 'circle', 0, 'bottom', NULL, 'center', 100, 'bottom', 100, NULL],
            [5, 'Template 05 - Subscribe', '5', 'Magestore_Popupplus::popup/subscribe/template05.phtml', 'Magestore_Popupplus::popup/success/success05.phtml', '0', 'Magestore_Popupplus/images/popup/template_images/template05.png', 420, 'px', 'circle', 0, '', 0, '000000', '6E6E6E', 20, 'circle', 0, 'top', NULL, 'center', 100, '', 100, NULL],
        ];

        $columns = ['template_id', 'title', 'template_code', 'template_file', 'template_file_success', 'popup_type', 'preview_image', 'width', 'width_unit', 'corner_style', 'border_radius', 'border_color', 'border_size', 'overlay_color', 'popup_background', 'padding', 'close_style', 'has_shadow', 'appear_effect', 'custom_css', 'horizontal_position', 'horizontal_px', 'vertical_position', 'vertical_px', 'trigger_popup'];
        $setup->getConnection()->insertArray(
            $setup->getTable('magestore_popupplus_templates'),
            $columns,
            $data
        );
        /*end insert data*/

        $installer->endSetup();
    }
}
