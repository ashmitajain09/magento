<?php
namespace Apptha\Marketplace\Model\Api;
use Apptha\Marketplace\Api\SellerManagementInterface;


class Seller implements SellerManagementInterface
{

    protected $dataFactory;
	
	protected $categoryFactory;
	
	
    public function __construct(
	\Apptha\Marketplace\Api\Data\CategoryDataInterfaceFactory $dataFactory ,
	\Apptha\Marketplace\Model\CategoryFactory $categoryFactory
	)
    {
        $this->dataFactory = $dataFactory;
		$this->categoryFactory = $categoryFactory;
    }
	
	
    /**
     * Returns greeting message to user
     *
     * @api
     * @param int $sellerId Seller Id.
	 * @param int $page
	 * @param int $limit
     * @return string Greeting message with users name.
     */
    public function getCategories($sellerId , $page = 1 , $limit = 20) {
        $categories = $this->categoryFactory->create()->getCollection()->addFieldToFilter('customer_id' , $sellerId)->setOrder('id', 'desc')->setCurPage($page)->setPageSize($limit);
		$data = array();
		foreach($categories as $category){
			$category_data_object = $this->dataFactory->create();
        	$category_data_object->setCategoryName($category->getCategoryName());
			$category_data_object->setId($category->getId());
			$category_data_object->setStoreId($category->getStoreId());
			$category_data_object->setStatus($category->getStatus());
			$category_data_object->setParentCategoryId($category->getParentCategoryId());
			$category_data_object->setMageCategoryId($category->getMageCategoryId());
			$category_data_object->setCategoryStatus($category->getCategoryStatus());
			$data[] = $category_data_object;
		}
		return $data;
    }
}