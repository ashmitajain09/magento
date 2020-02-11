<?php

namespace Apptha\Marketplace\Block\Category;

use Magento\Framework\View\Element\Template;

class Add extends \Magento\Framework\View\Element\Template
{
    /**
     * Add constructor.
     * @param Template\Context $context
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     * @param array $data
     */
    public function __construct(Template\Context $context, \Magento\Framework\Message\ManagerInterface $messageManager, array $data = [])
    {
        $this->messageManager = $messageManager;
        parent::__construct($context, $data);
    }

    /**
     * @return Template|void
     */
    protected function _prepareLayout() {
        $this->pageConfig->getTitle ()->set ( __ ( "Add new Category" ) );
        parent::_prepareLayout ();
    }

    /**
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    /**
     * @return string
     */
    public function saveCategoryUrl() {
        return $this->getUrl ( 'marketplace/category/savecategory' );
    }

}