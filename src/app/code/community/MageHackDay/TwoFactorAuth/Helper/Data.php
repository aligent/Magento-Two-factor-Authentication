<?php

class MageHackDay_TwoFactorAuth_Helper_Data extends Mage_Core_Helper_Data
{
    public function isActive() {
        return Mage::getStoreConfigFlag('admin/security/active');
    }

    public function isFrontendActive() {
        return Mage::getStoreConfigFlag('admin/security/frontend_active');
    }

    /** Simple check to see if the current users IP is in the twofactorauth whitelist
     * @return bool
     */
    public function isIpInWhitelist()
    {

        $userIp = $_SERVER['REMOTE_ADDR'];
        $aWhiteList = preg_split('/\n|\r\n?/', Mage::getStoreConfig('admin/security/twofactorauth_ip_whitelist'));

        return (in_array($userIp, $aWhiteList));
    }
}