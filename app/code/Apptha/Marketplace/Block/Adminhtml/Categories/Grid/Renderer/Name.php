<?php
/**
 * Apptha
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.apptha.com/LICENSE.txt
 *
 * ==============================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * ==============================================================
 * This package designed for Magento COMMUNITY edition
 * Apptha does not guarantee correct work of this extension
 * on any other Magento edition except Magento COMMUNITY edition.
 * Apptha does not provide extension support in case of
 * incorrect edition usage.
 * ==============================================================
 *
 * @category    Apptha
 * @package     Apptha_Marketplace
 * @version     1.2
 * @author      Apptha Team <developers@contus.in>
 * @copyright   Copyright (c) 2017 Apptha. (http://www.apptha.com)
 * @license     http://www.apptha.com/LICENSE.txt
 *
 */
namespace Apptha\Marketplace\Block\Adminhtml\Categories\Grid\Renderer;
/**
 * This class contains rendered functions for name in seller grid
 * @author user
 *
 */
class Name extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\Action {
    /**
     * Renders column
     *
     * @param \Magento\Framework\DataObject $row            
     * @return string
     */
    public function render(\Magento\Framework\DataObject $row) {
        $name = '';
        $catId = $this->_getValue ( $row ); 
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance ();
        $catDetails = $objectManager->get ( 'Apptha\Marketplace\Model\Category' )->load ( $catId );
        $name = $catDetails->getCategoryName ();
        $categoryUrl = $this->getUrl ( 'categories/approve/execute/id/' . $catId );
        return '<a  href="' . $categoryUrl . '" alt= "' . $name . '">' . $name . '</a>';
    }
}