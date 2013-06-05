<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011-2013 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Baobaz Social Meta Open Graph
 */
class Baobaz_Social_Block_Meta_Og
    extends Baobaz_Social_Block_Meta_Abstract
{
    public function getMetaTag($property, $content, $propertyName='property')
    {
        return parent::getMetaTag("og:$property", $content);
    }

    /**
     * Get meta OG tags
     *
     * @return string
     */
    public function getMetaOg()
    {
        $product = $this->getProduct();
        $tags = '<!-- Open Graph meta tags -->' . "\n";
        $tags .= $this->getMetaTag('title', $product->getName()) . "\n";
        $tags .= $this->getMetaTag('description', $this->stripTags($product->getDescription())) . "\n";
        $tags .= $this->getMetaTag('url', $this->helper('core/url')->getCurrentUrl()) . "\n";
        $tags .= $this->getMetaTag('image', $this->helper('catalog/image')->init($product, 'image')) . "\n";
        $tags .= $this->getMetaTag('site_name', Mage::getStoreConfig('general/store_information/name')) . "\n";
        $tags .= $this->getMetaTag('type', 'product') . "\n";
        $tags .= $this->getMetaTag('price:amount', Mage::getModel('directory/currency')->format($product->getFinalPrice(), array('display'=>Zend_Currency::NO_SYMBOL), false)) . "\n";
        $tags .= $this->getMetaTag('price:currency', Mage::app()->getStore()->getCurrentCurrencyCode()) . "\n";
        $tags .= $this->getMetaTag('availability', ($product->getStockItem()->getIsInStock() ? 'in stock' : 'out of stock')) . "\n";

        return $tags;
    }

    /**
     * Output method
     *
     * @return string
     */
    public function _toHtml()
    {
        if (Mage::getStoreConfig('social/opengraph/enabled')) {
            $tags = $this->getMetaOg();
            if ($tags !== false) {
                return $tags;
            }
        }
    }
}