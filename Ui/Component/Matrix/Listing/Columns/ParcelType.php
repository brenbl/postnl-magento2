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
 * to support@postcodeservice.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future. If you wish to customize this module for your
 * needs please contact support@postcodeservice.com for more information.
 *
 * @copyright   Copyright (c) Total Internet Group B.V. https://tig.nl/copyright
 * @license     http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 */
namespace TIG\PostNL\Ui\Component\Matrix\Listing\Columns;

use Magento\Ui\Component\Listing\Columns\Column;

class ParcelType extends Column
{
    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item[$fieldName])) {
                    // Give the correct translation to the correct field.
                    switch ($item[$fieldName]) {
                        case 'pakjkegemak':
                            $item[$fieldName] = __('Post office');
                            break;
                        case 'extra@home':
                            $item[$fieldName] = __('Extra@Home');
                            break;
                        case 'regular':
                            $item[$fieldName] = __('Regular');
                            break;
                        case 'letterbox_package':
                            $item[$fieldName] = __('Letterbox Package');
                            break;
                        case 'boxable_packets':
                            $item[$fieldName] = __('Boxable Packet');
                            break;
                        case '*':
                            $item[$fieldName] = __('All parcel types');
                            break;
                    }
                }
            }
        }

        return $dataSource;
    }
}
