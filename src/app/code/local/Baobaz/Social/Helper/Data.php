<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011-2013 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Baobaz Social Data Helper
 */
class Baobaz_Social_Helper_Data 
    extends Mage_Core_Helper_Abstract
{
    /**
     * Retrieve current product instance
     *
     * @return Mage_Catalog_Model_Product
     */
    public function getProduct()
    {
        return Mage::registry('current_product');
    }
    
    /**
     * Builds HTTP query from button properties array
     * 
     * @param array  $properties
     * @param string $type (inline or properties)
     * @return string
     */
    protected function _buildQuery($properties, $type='inline')
    {
        $arrayProperties = array();
        foreach ($properties as $key => $value) {
            if ($value) {
                if ($type == 'inline') {
                    $querySeparator = '&';
                    $arrayProperties[] = $key . '=' . urlencode($value);
                }
                elseif ($type == 'properties') {
                    $querySeparator = ' ';
                    $arrayProperties[] = $key . '="' . $value . '"';
                }
            }
        }

        return implode($querySeparator, $arrayProperties);
    }
}