<?php

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

/**
 * Puffx Host - Dark Mode Admin Addon
 * ----------------------------------
 * Lightweight addon to enable Dark Mode for the WHMCS Admin Area.
 * Developed for Puffx Host users. Free to use, modify, and distribute.
 */

function puffxhost_darkmode_config()
{
    return [
        'name' => 'Puffx Host Admin Dark Mode',
        'description' => 'Enable Dark Mode in the WHMCS Admin Area with adjustable filters.',
        'version' => '1.0.0',
        'author' => 'Puffx Host',
        'language' => 'english',
        'fields' => [
            'brightness' => [
                'FriendlyName' => 'Brightness',
                'Type' => 'text',
                'Size' => '3',
                'Default' => '100',
                'Description' => 'Set brightness level (0-100)',
            ],
            'contrast' => [
                'FriendlyName' => 'Contrast',
                'Type' => 'text',
                'Size' => '3',
                'Default' => '90',
                'Description' => 'Set contrast level (0-100)',
            ],
            'sepia' => [
                'FriendlyName' => 'Sepia',
                'Type' => 'text',
                'Size' => '3',
                'Default' => '10',
                'Description' => 'Set sepia tone (0-100)',
            ],
            'auto_mode' => [
                'FriendlyName' => 'Auto Mode',
                'Type' => 'yesno',
                'Description' => 'Automatically switch based on system theme preference',
            ],
        ],
    ];
}

function puffxhost_darkmode_activate()
{
    return [
        'status' => 'success',
        'description' => 'Puffx Host Dark Mode addon activated successfully.',
    ];
}

function puffxhost_darkmode_deactivate()
{
    return [
        'status' => 'success',
        'description' => 'Puffx Host Dark Mode addon deactivated successfully.',
    ];
}
