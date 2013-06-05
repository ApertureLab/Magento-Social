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
    extends Baobaz_Social_Helper_Data
{
    /**
     * Build Pinterest Pin Button
     * 
     * @return string 
     */
    public function getPinButton()
    {
        if (!Mage::getStoreConfig('social/pinterest_pinbutton/enabled')) {
            return;
        }

        $queryString = array(
            'url'         => (Mage::getStoreConfig('social/pinterest_pinbutton/url')) ?
                Mage::getStoreConfig('social/pinterest_pinbutton/url') :
                Mage::helper('core/url')->getCurrentUrl(),
            'media'       => Mage::helper('catalog/image')->init($this->getProduct(), 'image'),
            'description' => $this->getProduct()->getName() . "\n" . 
                $this->stripTags($this->getProduct()->getDescription()),
        );

        $properties = array (
            'data-pin-do'     => 'buttonPin',
            'data-pin-config' => Mage::getStoreConfig('social/pinterest_pinbutton/count'),
        );

        return '<a href="//pinterest.com/pin/create/button/?' . $this->_buildQuery($queryString, 'inline') . '" ' .
            $this->_buildQuery($properties, 'properties') . '><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>' . "\n";
    }
}