<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Google Size config source array
 */
class Baobaz_Social_Model_Adminhtml_System_Config_Source_Google_Size
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'small', 'label'=>Mage::helper('baobaz_social')->__('small')),
            array('value'=>'medium', 'label'=>Mage::helper('baobaz_social')->__('medium')),
            array('value'=>'standard', 'label'=>Mage::helper('baobaz_social')->__('standard')),
            array('value'=>'tall', 'label'=>Mage::helper('baobaz_social')->__('tall')),
        );
    }
}