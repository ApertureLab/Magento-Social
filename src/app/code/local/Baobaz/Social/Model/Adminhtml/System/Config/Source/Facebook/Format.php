<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Facebook Format config source array
 */
class Baobaz_Social_Model_Adminhtml_System_Config_Source_Facebook_Format
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'iframe', 'label'=>Mage::helper('baobaz_social')->__('iframe')),
            array('value'=>'XFBML', 'label'=>Mage::helper('baobaz_social')->__('XFBML')),
        );
    }
}