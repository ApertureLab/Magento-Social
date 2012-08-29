<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Baobaz Social Twitter Helper
 */
class Baobaz_Social_Helper_Twitter
    extends Mage_Core_Helper_Abstract
{
    /**
     * Build Twitter Tweet Button
     * 
     * @return string 
     */
    public function getTweetButton()
    {
        if (!Mage::getStoreConfig('social/twitter_tweetbutton/enabled')) {
            return;
        }
        
        $properties = array (
            'data-url'     => (Mage::getStoreConfig('social/twitter_tweetbutton/url')) ?
                Mage::getStoreConfig('social/twitter_tweetbutton/url') :
                Mage::helper('core/url')->getCurrentUrl(),
            'data-via'     => Mage::getStoreConfig('social/twitter_tweetbutton/via'),
            'data-text'    => Mage::getStoreConfig('social/twitter_tweetbutton/text'),
            'data-related' => Mage::getStoreConfig('social/twitter_tweetbutton/related'),
            'data-count'   => Mage::getStoreConfig('social/twitter_tweetbutton/count'),
        );

        foreach ($properties as $key => $value) {
            if ($value) {
                $arrayProperties[] = $key . '="' . $value . '"';
            }
        }
        $concatenedProperties = implode(" ", $arrayProperties);

        return '<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
            <div><a href="http://twitter.com/share" class="twitter-share-button" ' . 
            $concatenedProperties . '>Tweet</a></div>' . "\n";
    }
}