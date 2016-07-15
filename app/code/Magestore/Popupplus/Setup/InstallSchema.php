<?php 

namespace Magestore\Popupplus\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $installer->getConnection()->dropTable($installer->getTable('magestore_popupplus_popupplus'));
        $installer->getConnection()->dropTable($installer->getTable('magestore_popupplus_templates'));
        $installer->getConnection()->dropTable($installer->getTable('magestore_popup_find_templates'));

        /**
         * Create table 'magestore_popupplus_popupplus'
         */

        $table = $installer->getConnection()
            ->newTable($installer->getTable('magestore_popupplus_popupplus'))
            ->addColumn(
                'popup_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'popup_id'
            )->addColumn(
                'template_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                20,
                ['nullable' => false, 'default' => ''],
                'template_code'
            )->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => true, 'default' => ''],
                'title'
            )->addColumn(
                'popup_type',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'popup_type'
            )->addColumn(
                'preview_image',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => true, 'default' => ''],
                'preview_image'
            )->addColumn(
                'width',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                6,
                ['nullable' => true, 'default' => 0],
                'width'
            )->addColumn(
                'width_unit',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'width_unit'
            )->addColumn(
                'corner_style',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'corner_style'
            )->addColumn(
                'border_radius',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                6,
                ['nullable' => true, 'default' => 0],
                'border_radius'
            )->addColumn(
                'border_color',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'border_color'
            )->addColumn(
                'border_size',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                6,
                ['nullable' => true, 'default' => 0],
                'border_size'
            )->addColumn(
                'overlay_color',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'overlay_color'
            )->addColumn(
                'popup_background',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                6,
                ['nullable' => true, 'default' => ''],
                'popup_background'
            )->addColumn(
                'padding',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                6,
                ['nullable' => true, 'default' => 0],
                'padding'
            )->addColumn(
                'close_style',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'close_style'
            )->addColumn(
                'has_shadow',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                6,
                ['nullable' => true, 'default' => 0],
                'has_shadow'
            )->addColumn(
                'appear_effect',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'appear_effect'
            )->addColumn(
                'custom_css',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => true, 'default' => ''],
                'custom_css'
            )->addColumn(
                'horizontal_position',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'horizontal_position'
            )->addColumn(
                'horizontal_px',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                ['nullable' => true, 'default' => 100],
                'horizontal_px'
            )->addColumn(
                'vertical_position',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'vertical_position'
            )->addColumn(
                'vertical_px',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                ['nullable' => true, 'default' => 100],
                'vertical_px'
            )->addColumn(
                'store',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'store'
            )->addColumn(
                'show_on_page',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'show_on_page'
            )->addColumn(
                'categories',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'categories'
            )->addColumn(
                'specified_url',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => true, 'default' => ''],
                'specified_url'
            )->addColumn(
                'exclude_url',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => true, 'default' => ''],
                'exclude_url'
            )->addColumn(
                'products',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'products'
            )->addColumn(
                'show_when',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'show_when'
            )->addColumn(
                'seconds_delay',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                6,
                ['nullable' => false, 'default' => 0],
                'seconds_delay'
            )->addColumn(
                'showing_frequency',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => 0],
                'showing_frequency'
            )->addColumn(
                'showing_frequency',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'showing_frequency'
            )->addColumn(
                'max_time',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'max_time'
            )->addColumn(
                'priority',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                ['nullable' => true, 'default' => 0],
                'priority'
            )->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => false, 'default' => 1],
                'status'
            )->addColumn(
                'show_next_popup',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'show_next_popup'
            )->addColumn(
                'connect_with',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'connect_with'
            )->addColumn(
                'popup_content',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false, 'default' => ''],
                'popup_content'
            )->addColumn(
                'content_for_success',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => true, 'default' => ''],
                'content_for_success'
            )->addColumn(
                'country',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'country'
            )->addColumn(
                'devices',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'devices'
            )->addColumn(
                'cookies_enabled',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                6,
                ['nullable' => true, 'default' => 0],
                'cookies_enabled'
            )->addColumn(
                'returning_user',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'returning_user'
            )->addColumn(
                'login_user',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'login_user'
            )->addColumn(
                'customer_group_ids',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'customer_group_ids'
            )->addColumn(
                'user_ip',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                30,
                ['nullable' => true, 'default' => ''],
                'user_ip'
            )->addColumn(
                'cookie_time',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'cookie_time'
            )->setComment('Popupp entities');
        $installer->getConnection()->createTable($table);


        /**
         * Create table 'magestore_popupplus_templates'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('magestore_popupplus_templates'))
            ->addColumn(
                'template_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'template_id'
            )->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false, 'default' => ''],
                'title'
            )->addColumn(
                'template_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                20,
                ['nullable' => false, 'default' => ''],
                'template_code'
            )->addColumn(
                'template_file',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => true, 'default' => ''],
                'template_file'
            )->addColumn(
                'template_file_success',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => true, 'default' => ''],
                'template_file_success'
            )->addColumn(
                'popup_type',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => '0'],
                'popup_type'
            )->addColumn(
                'preview_image',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => true, 'default' => ''],
                'preview_image'
            )->addColumn(
                'width',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                6,
                ['nullable' => true, 'default' => 0],
                'width'
            )->addColumn(
                'width_unit',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'width_unit'
            )->addColumn(
                'corner_style',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'corner_style'
            )->addColumn(
                'border_radius',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                6,
                ['nullable' => true, 'default' => 0],
                'border_radius'
            )->addColumn(
                'border_color',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'border_color'
            )->addColumn(
                'border_size',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                6,
                ['nullable' => true, 'default' => 0],
                'border_size'
            )->addColumn(
                'overlay_color',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'overlay_color'
            )->addColumn(
                'popup_background',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                6,
                ['nullable' => true, 'default' => ''],
                'popup_background'
            )->addColumn(
                'padding',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                6,
                ['nullable' => true, 'default' => 0],
                'padding'
            )->addColumn(
                'close_style',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'close_style'
            )->addColumn(
                'has_shadow',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                6,
                ['nullable' => true, 'default' => 0],
                'has_shadow'
            )->addColumn(
                'appear_effect',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'appear_effect'
            )->addColumn(
                'custom_css',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => true, 'default' => ''],
                'custom_css'
            )->addColumn(
                'horizontal_position',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'horizontal_position'
            )->addColumn(
                'horizontal_px',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                ['nullable' => true, 'default' => 0],
                'horizontal_px'
            )->addColumn(
                'vertical_position',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'vertical_position'
            )->addColumn(
                'vertical_px',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                ['nullable' => false, 'default' => 100],
                'vertical_px'
            )->addColumn(
                'trigger_popup',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true, 'default' => ''],
                'trigger_popup'
            )->setComment('Templates entities');
        $installer->getConnection()->createTable($table);

        /**
         * Create table 'magestore_popup_find_templates'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('magestore_popup_find_templates'))
            ->addColumn(
                'choose_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'choose_id'
            )->addColumn(
                'template_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                20,
                ['nullable' => false, 'default' => ''],
                'template_code'
            )->setComment('Find template popup');
        $installer->getConnection()->createTable($table);


        $installer->endSetup();
    }
}
