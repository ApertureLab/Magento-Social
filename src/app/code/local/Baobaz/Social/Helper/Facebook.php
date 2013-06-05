<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011-2013 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Baobaz Social Facebook Helper
 */
class Baobaz_Social_Helper_Facebook 
    extends Baobaz_Social_Helper_Data
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

        // adjust size by layout type
        switch (Mage::getStoreConfig('social/facebook_likebutton/layout')) {
            case 'box_count':
                $properties['height'] = '65';
                break;
            case 'button_count':
                $properties['height'] = '21';
                break;
        }

        // iframe
        if (Mage::getStoreConfig('social/facebook_likebutton/format') == 'iframe') {
            $properties['width'] = '';
            $properties['height'] = '35';
            return $this->renderIframeLikeButton($properties);
        }
        // XFBML
        elseif (Mage::getStoreConfig('social/facebook_likebutton/format') == 'XFBML') {
            return $this->renderXfbmlLikeButton($properties);
        }
        // HTML5
        elseif (Mage::getStoreConfig('social/facebook_likebutton/format') == 'HTML5') {
            return $this->renderHtml5LikeButton($properties);
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

        return '<script src="http://connect.facebook.net/' . $properties['locale'] . 
            '/all.js#xfbml=1"></script><fb:comments ' . $this->_buildQuery($properties, 'properties') . '></fb:comments>' . "\n";
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
            $this->_buildQuery($properties) . 
            '" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:' . 
            $properties['width'] . 'px; height:' . $properties['height'] . 
            'px;" allowTransparency="true"></iframe>' . "\n";
    }
    
    /**
     * Renders XFBML Like button
     * 
     * @param array $properties Button properties
     * 
     * @return string
     */
    public function renderXfbmlLikeButton(array $properties)
    {
        $properties['width'] = '';
        return '<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/' . $properties['locale'] . '/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>' . "\n" . 
'<fb:like ' . $this->_buildQuery($properties, 'properties') . '></fb:like>' . "\n";
    }
    
    /**
     * Renders HTML5 Like button
     * 
     * @param array $properties Button properties
     * 
     * @return string
     */
    public function renderHtml5LikeButton(array $properties)
    {
        $properties['width'] = '';
        return '<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/' . $properties['locale'] . '/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>' . "\n" . 
'<div class="fb-like" ' . $this->_buildQuery($properties, 'properties') . '></div>' . "\n";       
    }

    /**
     * Return Like Button URL only
     * 
     * @return string
     */
    /*
    public function getLikeButtonUrl()
    {
        return _buildQuery($properties, $type='inline');
    }
    */
}