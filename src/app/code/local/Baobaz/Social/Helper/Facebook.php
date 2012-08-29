<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Baobaz Social Facebook Helper
 */
class Baobaz_Social_Helper_Facebook 
    extends Mage_Core_Helper_Abstract
{
    /**
     * Build FB Like Button
     * 
     * @param Mage_Core_Block_Abstract $block
     * @return string 
     */
    public function getLikeButton(Mage_Core_Block_Abstract $block)
    {
        if (!Mage::getStoreConfig('social/facebook_likebutton/enabled')) {
            return;
        }
        
        $properties = array (
            'href'        => (Mage::getStoreConfig('social/facebook_likebutton/href')) ? 
                Mage::getStoreConfig('social/facebook_likebutton/href') : 
                Mage::helper('core/url')->getCurrentUrl(),
            'send'        => Mage::getStoreConfig('social/facebook_likebutton/send'),
            'layout'      => Mage::getStoreConfig('social/facebook_likebutton/layout'),
            'show_faces'  => Mage::getStoreConfig('social/facebook_likebutton/showfaces'),
            'action'      => Mage::getStoreConfig('social/facebook_likebutton/action'),
            'font'        => Mage::getStoreConfig('social/facebook_likebutton/font'),
            'colorscheme' => Mage::getStoreConfig('social/facebook_likebutton/colorscheme'),
            'ref'         => $block->getLayout()->getArea() . '/' . 
                $block->getAction()->getFullActionName() . '/' . $block->getBlockAlias(),
            'locale'      => Mage::app()->getLocale()->getLocaleCode(),
            'width'       => '100%',
            'height'      => '80',
        );
        if ($properties['send']) {
            $properties['send'] = 'true';
        }
        else {
            $properties['send'] = 'false';
        }
        if ($properties['show_faces']) {
            $properties['show_faces'] = 'true';
        }
        else {
            $properties['show_faces'] = 'false';
        }

        // adjust size
        switch (Mage::getStoreConfig('social/facebook_likebutton/layout')) {
            case 'box_count':
                $properties['height'] = '65';
                break;
            case 'button_count':
                $properties['height'] = '21';
                break;
        }

        // iframe
        if ($this->getLikeButtonFormat() == 'iframe') {
            return $this->renderIframeLikeButton($properties);
        } elseif ($this->getLikeButtonFormat() == 'XFBML') { //XFBML
            return $this->renderXfbmlLikeButton($properties);
        }
    }
    
    /**
     * Build FB Comments
     * 
     * @return string 
     */
    public function getComments()
    {
        if (!Mage::getStoreConfig('social/facebook_comments/enabled')) {
            return;
        }
        
        $properties = array (
            'href'        => (Mage::getStoreConfig('social/facebook_comments/href')) ? 
                Mage::getStoreConfig('social/facebook_comments/href') : 
                Mage::helper('core/url')->getCurrentUrl(),
            'width'       => Mage::getStoreConfig('social/facebook_comments/width'),
            'num_posts'   => Mage::getStoreConfig('social/facebook_comments/num_posts'),
            'colorscheme' => Mage::getStoreConfig('social/facebook_comments/colorscheme'),
            'locale'      => Mage::app()->getLocale()->getLocaleCode(),
            
        );

        foreach ($properties as $key => $value) {
            if ($value) {
                $arrayProperties[] = $key . '="' . $value . '"';
            }
        }
        $concatenedProperties = implode(' ', $arrayProperties);

        return '<script src="http://connect.facebook.net/' . $properties['locale'] . 
            '/all.js#xfbml=1"></script><fb:comments ' . $concatenedProperties . '></fb:comments>' . "\n";
    }
    
    /**
     * Returns Like button format set in BO
     * 
     * @return string
     */
    public function getLikeButtonFormat()
    {
        return Mage::getStoreConfig('social/facebook_likebutton/format');
    }
    
    /**
     * Renders HTML of iframe Like button
     * 
     * @param array $properties Button properties
     * 
     * @return string
     */
    public function renderIframeLikeButton(array $properties)
    {
        $properties['send'] = '';
        return '<iframe src="http://www.facebook.com/plugins/like.php?' . 
            $this->_buildQuery($properties, '&') . 
            '" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:' . 
            $properties['width'] . 'px; height:' . $properties['height'] . 
            'px;" allowTransparency="true"></iframe>' . "\n";
    }
    
    /**
     * Renders XFBML Like button HTML
     * 
     * @param array $properties Button properties
     * 
     * @return string
     */
    public function renderXfbmlLikeButton(array $properties)
    {
        $properties['width'] = '';
        return '<script src="http://connect.facebook.net/' . $properties['locale'] . 
            '/all.js#xfbml=1"></script><fb:like ' . $this->_buildQuery($properties, ' ') . 
            '></fb:like>' . "\n";
    }
    
    /**
     * Builds HTTP query from button properties array
     * 
     * @param array  $properties
     * @param string $querySeparator
     *
     * @todo to mutualize between each helpers
     * 
     * @return string
     */
    protected function _buildQuery($properties, $querySeparator)
    {
        $arrayProperties = array();
        foreach ($properties as $key => $value) {
            if ($value) {
                $arrayProperties[] = $key . '="' . $value . '"';
            }
        }
        
        return implode($querySeparator, $arrayProperties);
    }
}