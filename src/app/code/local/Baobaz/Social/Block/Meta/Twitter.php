<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011-2013 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Baobaz Social Meta Twitter (product card)
 */
class Baobaz_Social_Block_Meta_Twitter
    extends Mage_Core_Block_Abstract
{
    public function getProduct()
    {
        return Mage::registry('product');
    }

    /**
     * Get meta Twitter tags
     *
     * @return string
     */
    public function getMetaTwitter()
    {
        $product = $this->getProduct();
        $tags = '<!-- Twitter Card meta tags -->' . "\n";
        $tags .= $this->getMetaTag('title', $product->getName()) . "\n";
        $tags .= $this->getMetaTag('description', $this->stripTags($product->getDescription())) . "\n";
        $tags .= $this->getMetaTag('card', 'product') . "\n";
        //$tags .= $this->getMetaTag('creator', '@Baobaz') . "\n";
        $tags .= $this->getMetaTag('site', Mage::getStoreConfig('general/store_information/name')) . "\n";
        $tags .= $this->getMetaTag('image', $this->helper('catalog/image')->init($product, 'image')) . "\n";
        $tags .= $this->getMetaTag('data1', Mage::helper('core')->currency($product->getFinalPrice(), true, false)) . "\n";
        $tags .= $this->getMetaTag('label1', 'Price') . "\n";

        return $tags;
    }

    /**
     * Meta property tag (HTML)
     *
     * @param string $url
     * @return string
     */
    public function getMetaTag($name, $content)
    {
        return sprintf('<meta name="twitter:%s" content="%s" />', $name, $content);
    }

    /**
     * Output method
     *
     * @return string
     */
    public function _toHtml()
    {
        if (Mage::getStoreConfig('social/twittercard/enabled')) {
            $tags = $this->getMetaTwitter();
            if ($tags !== false) {
                return $tags;
            }
        }
    }
}