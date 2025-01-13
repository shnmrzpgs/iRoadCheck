<?php

namespace App\Enums\Staff;

enum StaffRoleStatus
{
    const ENABLED = 'enabled';
    const DISABLED = 'disabled';

    /**
     * Get all the enum values.
     *
     * @return array
     */
    public static function getValues(): array
    {
        return [
            self::ENABLED,
            self::DISABLED,
        ];
    }
}
