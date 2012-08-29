<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Twitter Count config source array
 */
class Baobaz_Social_Model_Adminhtml_System_Config_Source_Twitter_Count
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'none', 'label'=>Mage::helper('baobaz_social')->__('none')),
            array('value'=>'horizontal', 'label'=>Mage::helper('baobaz_social')->__('horizontal')),
            array('value'=>'vertical', 'label'=>Mage::helper('baobaz_social')->__('vertical')),
        );
    }
}