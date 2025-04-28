<?php

namespace WPSeeders\Controllers;

class SettingsController
{
    /**
     * Get the active status of the plugin
     *
     * @return bool
     */
    static public function getActiveStatus(): bool {
        return get_option('wp_seeders_active', false);
    }

    /**
     * Set the active status of the plugin
     *
     * @return void
     */
    static public function setActiveStatus($status): void {
        update_option('wp_seeders_active', $status);
    }

    /**
     * Delete the active option of the plugin
     *
     * @return void
     */
    static public function deleteActiveStatus(): void {
        delete_option('wp_seeders_active');
    }
}