<?php

namespace WPSeeders\Controllers;

class SettingsController
{
    static public function getActiveStatus() {
        return get_option('wp_seeders_active', false);
    }

    static public function setActiveStatus($status) {
        update_option('wp_seeders_active', $status);
    }

    static public function deleteActiveStatus() {
        delete_option('wp_seeders_active');
    }
}