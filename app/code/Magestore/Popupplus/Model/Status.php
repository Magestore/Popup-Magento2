<?php 

namespace Magestore\Popupplus\Model;

/**
 * Model Status
 */
class Status
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
}
