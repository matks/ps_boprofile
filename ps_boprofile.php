<?php
/**
 * 2007-2020 PrestaShop SA and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class ps_boprofile extends Module
{
    protected static $colors = array('#1F77B4', '#FF7F0E', '#2CA02C');

    public function __construct()
    {
        $this->name = 'ps_boprofile';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'PrestaShop';

        parent::__construct();
        $this->displayName = $this->trans('Dashboard PrestaShop BackOffice Profile Provider', array(), 'Modules.BoProfile.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7.8.0', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        return (parent::install()
            && $this->registerHook('actionGetProfileImageUrl')
        );
    }

    public function hookActionGetProfileImageUrl()
    {
        $email = $this->context->employee->email;

        return Tools::getShopProtocol() . 'profile.prestashop.com/' . urlencode($email) . '.jpg';
    }
}