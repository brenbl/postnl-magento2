<?php
/**
 *
 *          ..::..
 *     ..::::::::::::..
 *   ::'''''':''::'''''::
 *   ::..  ..:  :  ....::
 *   ::::  :::  :  :   ::
 *   ::::  :::  :  ''' ::
 *   ::::..:::..::.....::
 *     ''::::::::::::''
 *          ''::''
 *
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Creative Commons License.
 * It is available through the world-wide-web at this URL:
 * http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to servicedesk@tig.nl so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future. If you wish to customize this module for your
 * needs please contact servicedesk@tig.nl for more information.
 *
 * @copyright   Copyright (c) Total Internet Group B.V. https://tig.nl/copyright
 * @license     http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 */
namespace TIG\PostNL\Config\CheckoutConfiguration;

use Magento\Framework\UrlInterface;

class Urls implements CheckoutConfigurationInterface
{
    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    public function __construct(
        UrlInterface $urlBuilder
    ) {
        $this->urlBuilder = $urlBuilder;
    }

    public function getValue()
    {
        return [
            'deliveryoptions_timeframes' => $this->getUrl('postnl/deliveryoptions/timeframes'),
            'deliveryoptions_locations'  => $this->getUrl('postnl/deliveryoptions/locations'),
            'deliveryoptions_save'       => $this->getUrl('postnl/deliveryoptions/save'),
            'pakjegemak_address'         => $this->getUrl('postnl/pakjegemak/address'),
            'address_postcode'           => $this->getUrl('postnl/address/postcode'),
            'international_address'      => $this->getUrl('postnl/international/address')
        ];
    }

    /**
     * @param $path
     *
     * @return string
     */
    private function getUrl($path)
    {
        return $this->urlBuilder->getUrl($path, ['_secure' => true]);
    }
}
