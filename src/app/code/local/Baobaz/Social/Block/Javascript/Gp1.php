<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Baobaz Social Google Plus One Javascript
 */
class Baobaz_Social_Block_Javascript_Gp1
    extends Mage_Core_Block_Abstract
{
    public function getLangOption($locale)
    {
        return sprintf('lang: \'%s\'', $locale);
    }
    
    public function _toHtml()
    {
        if (Mage::getStoreConfig('social/google_plusonebutton/enabled')) {
            $locale = '';
            if (Mage::app()->getLocale()->getLocaleCode()) {
                $locale = Mage::app()->getLocale()->getLocaleCode();
            }
            $javascript = '<script type="text/javascript">
    window.___gcfg = {
        ' . $this->getLangOption($locale) . '
    };
    (function() {
        var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
        po.src = \'https://apis.google.com/js/plusone.js\';
        var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
    })();
</script>' . "\n";
            return $javascript;
        }
    }
}