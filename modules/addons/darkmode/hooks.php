<?php

use WHMCS\Module\Addon\PuffxDarkMode\Admin;

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

// Load admin helper functions
require_once __DIR__ . '/lib/Admin.php';

/**
 * Hook: Add Dark Mode to Admin Area Header
 */
add_hook('AdminAreaHeaderOutput', 1, function ($vars) {
    $moduleLink = $vars['WEB_ROOT'] . '/modules/addons/puffxhost_darkmode';

    // Get configuration values
    $brightness = Admin::getConfig('brightness') ?? 100;
    $contrast = Admin::getConfig('contrast') ?? 90;
    $sepia = Admin::getConfig('sepia') ?? 10;
    $autoMode = Admin::getConfig('auto_mode') ?? false;

    return <<<HTML
<script src="{$moduleLink}/js/darkreader.min.js"></script>
<script>
    // DarkReader settings
    DarkReader.setFetchMethod(window.fetch);
    const darkReaderOptions = {
        brightness: {$brightness},
        contrast: {$contrast},
        sepia: {$sepia}
    };
    const autoModeEnabled = '{$autoMode}' === 'on';

    function toggleDarkMode() {
        if (localStorage.getItem('puffxDarkMode') === 'true') {
            DarkReader.disable();
            localStorage.setItem('puffxDarkMode', 'false');
        } else {
            DarkReader.enable(darkReaderOptions);
            localStorage.setItem('puffxDarkMode', 'true');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const iconMoon = '<i class="fa fa-moon always"></i>';
        const iconSun = '<i class="fa fa-sun always"></i>';
        const adminNav = document.querySelector('.right-nav');

        // Add toggle button if not auto mode
        if (adminNav && !autoModeEnabled) {
            const listItem = document.createElement('li');
            listItem.className = 'bt';

            const toggleAnchor = document.createElement('a');
            toggleAnchor.innerHTML = (localStorage.getItem('puffxDarkMode') === 'true') ? iconSun : iconMoon;

            listItem.appendChild(toggleAnchor);
            listItem.addEventListener('click', function() {
                toggleDarkMode();
                toggleAnchor.innerHTML = DarkReader.isEnabled() ? iconSun : iconMoon;
            });

            adminNav.appendChild(listItem);
        }

        // Enable auto or saved dark mode
        if (autoModeEnabled) {
            DarkReader.auto(darkReaderOptions);
        } else if (localStorage.getItem('puffxDarkMode') === 'true') {
            DarkReader.enable(darkReaderOptions);
        }
    });
</script>
HTML;
});
