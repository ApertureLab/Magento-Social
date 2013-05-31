<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011-2013 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Baobaz Social Pinterest Helper
 */
class Baobaz_Social_Helper_Pinterest
    extends Mage_Core_Helper_Abstract
{
    public function getProduct()
    {
        return Mage::registry('current_product');
    }

    /**
     * Build Pinterest Pin Button
     * 
     * @return string 
     */
    public function getPinButton()
    {
        if (!Mage::getStoreConfig('social/pinterest_button/enabled')) {
            return;
        }

        $url = (Mage::getStoreConfig('social/pinterest_button/url')) ?
                Mage::getStoreConfig('social/pinterest_button/url') :
                Mage::helper('core/url')->getCurrentUrl();
        $media = Mage::helper('catalog/image')->init($this->getProduct(), 'image');
        $description = $this->stripTags($this->getProduct()->getDescription());

        $properties = array (
            'data-pin-do'     => 'buttonPin',
            'data-pin-config' => Mage::getStoreConfig('social/pinterest_button/count'),
        );        

        foreach ($properties as $key => $value) {
            if ($value) {
                $arrayProperties[] = $key . '="' . $value . '"';
            }
        }
        $concatenedProperties = implode(" ", $arrayProperties);

        return '<a href="//pinterest.com/pin/create/button/?url=' . urlencode($url) . '&media=' . urlencode($media) . '&description=' . urlencode($description) . '" ' .
            $concatenedProperties . '><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>' . "\n";
    }
}