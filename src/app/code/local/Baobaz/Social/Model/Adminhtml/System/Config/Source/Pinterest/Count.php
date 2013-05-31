<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011-2013 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Pinterest Count config source array
 */
class Baobaz_Social_Model_Adminhtml_System_Config_Source_Pinterest_Count
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'above', 'label'=>Mage::helper('baobaz_social')->__('Above the Button')),
            array('value'=>'beside', 'label'=>Mage::helper('baobaz_social')->__('Beside the Button')),
            array('value'=>'none', 'label'=>Mage::helper('baobaz_social')->__('Not Shown')),
        );
    }
}