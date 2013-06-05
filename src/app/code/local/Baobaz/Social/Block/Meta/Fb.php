<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011-2013 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Baobaz Social Meta FB
 */
class Baobaz_Social_Block_Meta_Fb
    extends Baobaz_Social_Block_Meta_Abstract
{
    public function getMetaTag($property, $content, $propertyName='property')
    {
        return parent::getMetaTag("fb:$property", $content);
    }

    /**
     * Get meta FB tags
     *
     * @return string
     */
    public function getFacebookMetaFb()
    {
        $tags = '<!-- Facebook meta tags -->' . "\n";
        if (Mage::getStoreConfig('social/facebook/admins')) {
            $tags .= $this->getMetaTag('admins', Mage::getStoreConfig('social/facebook/admins')) . "\n";
        }
        if (Mage::getStoreConfig('social/facebook/page_id')) {
            $tags .= $this->getMetaTag('page_id', Mage::getStoreConfig('social/facebook/page_id')) . "\n";
        }
        if (Mage::getStoreConfig('social/facebook/appid')) {
            $tags .= $this->getMetaTag('app_id', Mage::getStoreConfig('social/facebook/appid')) . "\n";
        }
        return $tags;
    }

    /**
     * Output method
     *
     * @return string
     */
    public function _toHtml()
    {
        if (Mage::getStoreConfig('social/facebook/enabled')) {
            $tags = $this->getFacebookMetaFb();
            if ($tags !== false) {
                return $tags;
            }
        }
    }
}