<?php

namespace Apptha\Marketplace\Block\Category;

use Magento\Framework\View\Element\Template;

class Edit extends \Magento\Framework\View\Element\Template
{

	protected $_categoryFactory;
	
    /**
     * Add constructor.
     * @param Template\Context $context
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     * @param array $data
     */
    public function __construct(Template\Context $context, 
	\Apptha\Marketplace\Model\CategoryFactory $categoryFactory,
	\Magento\Framework\Message\ManagerInterface $messageManager, 
	array $data = [])
    {
		$this->_categoryFactory = $categoryFactory;
        $this->messageManager = $messageManager;
        parent::__construct($context, $data);
    }

    

    /**
     * @return string
     */
    public function saveCategoryUrl() {
        return $this->getUrl ( 'marketplace/category/editcategory' );
    }
	
	
	public function getCurrentCategory(){
		$category = $this->_categoryFactory->create()->load($this->getRequest()->getParam('id'));
		return $category;
	}
	
	

}