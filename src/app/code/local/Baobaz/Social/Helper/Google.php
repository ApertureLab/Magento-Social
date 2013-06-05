<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011-2013 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Baobaz Social Google Helper
 */
class Baobaz_Social_Helper_Google
    extends Baobaz_Social_Helper_Data
{
    /**
     * Build Google Plus One Button
     * 
     * @return string 
     */
    public function getGooglePlusOneButton()
    {
        if (!Mage::getStoreConfig('social/google_plusonebutton/enabled')) {
            return;
        }
        
        $properties = array (
            'href'       => (Mage::getStoreConfig('social/google_plusonebutton/href')) ? 
                Mage::getStoreConfig('social/google_plusonebutton/href') : 
                Mage::helper('core/url')->getCurrentUrl(),
            'size'       => Mage::getStoreConfig('social/google_plusonebutton/size'),
            'annotation' => Mage::getStoreConfig('social/google_plusonebutton/annotation'),
            'width'      => Mage::getStoreConfig('social/google_plusonebutton/width'),
            'expandto'   => Mage::getStoreConfig('social/google_plusonebutton/expandto'),
        );

        return '<g:plusone ' . $this->_buildQuery($properties, 'properties') . '></g:plusone>' . "\n";
    }
}