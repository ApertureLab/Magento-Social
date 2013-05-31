<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011-2013 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Baobaz Social Pinterest Javascript
 */
class Baobaz_Social_Block_Javascript_Pinterest
    extends Mage_Core_Block_Abstract
{
    public function _toHtml()
    {
        if (Mage::getStoreConfig('social/pinterest_button/enabled')) {
            $javascript = '<script type="text/javascript">
(function(d){
  var f = d.getElementsByTagName(\'SCRIPT\')[0], p = d.createElement(\'SCRIPT\');
  p.type = \'text/javascript\';
  p.async = true;
  p.src = \'//assets.pinterest.com/js/pinit.js\';
  f.parentNode.insertBefore(p, f);
}(document));
</script>' . "\n";
            return $javascript;
        }
    }
}