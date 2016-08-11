<?php

namespace Magestore\Popupplus\Model;

/**
 * Model Status
 */
class Optionsgrid
{
    const STATUS_ENABLED = '1';

    const STATUS_DISABLED = '2';

    /**
     * Get available statuses.
     *
     * @return void
     */
    public static function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }

    /**
     * Get available show frequency.
     *
     * @return void
     */
    public static function getAvailableShowFrequency()
    {
        $showFrequency = array();

        $showFrequency = array(
            'SHOW_FREQUENCY_EVERY_TIME'=>'Every time',
            'SHOW_FREQUENCY_UNTIL_CLOSE'=>'Show until user close it',
            'SHOW_FREQUENCY_ONLY_ONE'=>'Only once',
            'SHOW_FREQUENCY_ONLY_TRIGGER'=>'When click on trigger'
        );

        return $showFrequency;
    }

    /**
     * Get available show on page.
     *
     * @return void
     */
    public static function getAvailableShowOnPage()
    {
        $showOnPage = array();

        $showOnPage = array(
            'SHOW_ON_ALL_PAGE'=>'All pages',
            'SHOW_ON_HOME_PAGE'=>'Home Page',
            'SHOW_ON_PRODUCT_PAGE'=>'Product Detail Page',
            'SHOW_ON_CATEGORY_PAGE'=>'Category',
            'SHOW_ON_CART_PAGE'=>'Cart Page',
            'SHOW_ON_CHECKOUT_PAGE'=>'Checkout Page',
            'SHOW_ON_URLS_PAGE'=>'Special URLs'
        );

        return $showOnPage;
    }

    /**
     * Get available show when.
     *
     * @return void
     */
    public static function getAvailableShowWhen()
    {
        $showWhen = array();

        $showWhen = array(
            'after_load_page'=>'After loading page',
            'after_seconds'=>'After Seconds'
        );

        return $showWhen;
    }
}
