<?php
/**
 * @category   Baobaz
 * @package    Baobaz_Social
 * @copyright  Copyright (c) 2011 Baobaz (http://www.baobaz.com)
 * @author     Arnaud Ligny <arnaud.ligny@baobaz.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Google Expandto config source array
 */
class Baobaz_Social_Model_Adminhtml_System_Config_Source_Google_Expandto
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'top', 'label'=>Mage::helper('baobaz_social')->__('top')),
            array('value'=>'right', 'label'=>Mage::helper('baobaz_social')->__('right')),
            array('value'=>'bottom', 'label'=>Mage::helper('baobaz_social')->__('bottom')),
            array('value'=>'left', 'label'=>Mage::helper('baobaz_social')->__('left')),
        );
    }
}