<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011-2013 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Base Meta Block class
 */
abstract class Baobaz_Social_Block_Meta_Abstract
    extends Mage_Core_Block_Abstract
{
    /**
     * Retrieve current product instance
     *
     * @return Mage_Catalog_Model_Product
     */
    public function getProduct()
    {
        return Mage::registry('product');
    }

    /**
     * Meta property tag (HTML)
     * 
     * @param string $property
     * @param string $content
     * @param string $propertyName ("property", "name", etc.)
     * @return string
     */
    public function getMetaTag($property, $content, $propertyName='property')
    {
        return sprintf('<meta %s="%s" content="%s" />', $propertyName, $property, $content);
    }
}