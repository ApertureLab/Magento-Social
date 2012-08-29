<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Facebook Font config source array
 */
class Baobaz_Social_Model_Adminhtml_System_Config_Source_Facebook_Font
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'', 'label'=>Mage::helper('baobaz_social')->__('')),
            array('value'=>'arial', 'label'=>Mage::helper('baobaz_social')->__('arial')),
            array('value'=>'lucida grande', 'label'=>Mage::helper('baobaz_social')->__('lucida grande')),
            array('value'=>'segoe ui', 'label'=>Mage::helper('baobaz_social')->__('segoe ui')),
            array('value'=>'tahoma', 'label'=>Mage::helper('baobaz_social')->__('tahoma')),
            array('value'=>'trebuchet ms', 'label'=>Mage::helper('baobaz_social')->__('trebuchet ms')),
            array('value'=>'verdana', 'label'=>Mage::helper('baobaz_social')->__('verdana'))
        );
    }
}