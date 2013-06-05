<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011-2013 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Baobaz Social Tumblr Helper
 */
class Baobaz_Social_Helper_Tumblr
    extends Baobaz_Social_Helper_Data
{
    /**
     * Build Tumblr Share Button
     * 
     * @return string 
     */
    public function getShareButton()
    {
        if (!Mage::getStoreConfig('social/tumblr_sharebutton/enabled')) {
            return;
        }

        return '<script src="http://platform.tumblr.com/v1/share.js"></script>' . "\n" . 
        '<span id="tumblr_button_abc123"></span>' . "\n" . 
        '<script type="text/javascript">
    var tumblr_photo_source = "' . Mage::helper('catalog/image')->init($this->getProduct(), 'image') . '";
    var tumblr_photo_caption = "' . $this->getProduct()->getName() . "<br>" . $this->stripTags($this->getProduct()->getDescription()) . '";
    var tumblr_photo_click_thru = "' . 'TEST' . '";
</script>' . "\n" . 
        '<script type="text/javascript">
    var tumblr_button = document.createElement("a");
    tumblr_button.setAttribute("href", "http://www.tumblr.com/share/photo?source=" + encodeURIComponent(tumblr_photo_source) + "&caption=" + encodeURIComponent(tumblr_photo_caption) + "&clickthru=" + encodeURIComponent(tumblr_photo_click_thru));
    tumblr_button.setAttribute("title", "Share on Tumblr");
    tumblr_button.setAttribute("style", "display:inline-block; text-indent:-9999px; overflow:hidden; width:20px; height:20px; background:url(\'http://platform.tumblr.com/v1/share_4.png\') top left no-repeat transparent;");
    tumblr_button.innerHTML = "Share on Tumblr";
    document.getElementById("tumblr_button_abc123").appendChild(tumblr_button);
</script>' . "\n";
    }
}