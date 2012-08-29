<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Facebook Layout config source array
 */
class Baobaz_Social_Model_Adminhtml_System_Config_Source_Facebook_Layout
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'standard', 'label'=>Mage::helper('baobaz_social')->__('standard')),
            array('value'=>'button_count', 'label'=>Mage::helper('baobaz_social')->__('button_count')),
            array('value'=>'box_count', 'label'=>Mage::helper('baobaz_social')->__('box_count')),
        );
    }
}