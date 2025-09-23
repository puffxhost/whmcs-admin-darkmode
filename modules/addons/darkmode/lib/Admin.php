<?php

namespace WHMCS\Module\Addon\PuffxDarkMode;

use WHMCS\Module\Addon\Setting;

class Admin
{
    /**
     * Get module configuration value by key
     *
     * @param string $key
     * @return mixed|null
     */
    public static function getConfig($key)
    {
        // Load all module settings
        $config = Setting::module('puffxhost_darkmode')->pluck('value', 'setting');

        // Return value if exists, else null
        return $config[$key] ?? null;
    }
}
