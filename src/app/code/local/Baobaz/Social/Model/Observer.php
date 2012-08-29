<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Baobaz Social Observer
 *
 * Event handlers
 */
class Baobaz_Social_Model_Observer
{
    /**
     * Observes controller_action_layout_render_before_catalog_product_view event
     * to add Facebook meta og:
     *
     * @param Varien_Event_Observer $observer
     * @return Baobaz_Social_Model_Observer
     */
    public function addMetaOg(Varien_Event_Observer $observer)
    {
        $headBlock = Mage::app()->getLayout()->getBlock('head');
        if ($headBlock) {
            $ogBlock = Mage::app()->getLayout()->createBlock(
                'baobaz_social/meta_og',
                'baobaz_social_meta_og'
            );
            $headBlock->append($ogBlock);
        }
        return $this;
    }

    /**
     * Observes controller_action_layout_render_before event
     * to add Facebook meta fb:
     *
     * @param Varien_Event_Observer $observer
     * @return Baobaz_Social_Model_Observer
     */
    public function addFacebookMetaFb(Varien_Event_Observer $observer)
    {
        $headBlock = Mage::app()->getLayout()->getBlock('head');
        if ($headBlock) {
            $fbBlock = Mage::app()->getLayout()->createBlock(
                'baobaz_social/meta_fb',
                'baobaz_social_meta_fb'
            );
            $headBlock->append($fbBlock);
        }
        return $this;
    }

    /**
     * Observes controller_action_layout_render_before event
     * to add Google Plus One Javascript
     *
     * @param Varien_Event_Observer $observer
     * @return Baobaz_Social_Model_Observer
     */
    public function addGooglePlusOneJs(Varien_Event_Observer $observer)
    {
        $bbeBlock = Mage::app()->getLayout()->getBlock('before_body_end');
        if ($bbeBlock) {
            $jsBlock = Mage::app()->getLayout()->createBlock(
                'baobaz_social/javascript_gp1',
                'baobaz_social_javascript_gp1'
            );
            $bbeBlock->append($jsBlock);
        }
        return $this;
    }
}