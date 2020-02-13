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
class ParentCategory extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer {
    
	 
	 protected $_categoryFactory;
	 
	 protected $_collectionFactory;
	 
	 public function __construct(
	 	\Magento\Backend\Block\Context $context,
	 	\Apptha\Marketplace\Model\CategoryFactory $categoryFactory,
		\Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collecionFactory,
		 array $data = [])
    {
		$this->_categoryFactory = $categoryFactory;
		$this->_collectionFactory = $collecionFactory;
		parent::__construct($context, $data);
	}
	
	/**
     * Renders column
     *
     * @param \Magento\Framework\DataObject $row            
     * @return string
     */
    public function render(\Magento\Framework\DataObject $row) {
        $name = '';
        $catId = $this->_getValue ( $row ); 
       	$parentId = $this->_categoryFactory->create()->getCollection()
													 ->addFieldToSelect('parent_category_id')
													 ->addFieldToFilter('id', $catId)
													 ->getFirstItem()
													 ->getParentCategoryId();
		if($parentId){
			$name = $this->_collectionFactory->create()
													   ->addAttributeToFilter('entity_id' , $parentId)
													   ->addAttributeToSelect('name')
													   ->getFirstItem()
													   ->getName();
		}
		$categoryUrl = $this->getUrl ( 'catalog/category/edit/id/' . $parentId );
		return '<a  href="' . $categoryUrl . '" alt= "' . $name . '">' . $name . '</a>';
       
    }
}