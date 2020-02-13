<?php

namespace Apptha\Marketplace\Block\Category;

use Magento\Framework\View\Element\Template;

class Tree extends \Magento\Catalog\Block\Adminhtml\Category\Tree
{

	

	public function getActiveCategory(){
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$category = $objectManager->create('Apptha\Marketplace\Model\Category')->load($this->getRequest()->getParam('id'));	
		$parent_category_id = $category->getParentCategoryId();
		return $parent_category_id;
	}
}