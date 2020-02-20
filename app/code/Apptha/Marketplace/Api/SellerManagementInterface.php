<?php 
namespace Apptha\Marketplace\Api;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
 
interface SellerManagementInterface {


	/**
	 * GET for Post api
	 * @param int $sellerId 
	 * @param int $page
	 * @param int $limit
	 * @return string
	 */
	
	public function getCategories($sellerId , $page = 1 , $limit = 20 );

    /**
     * @param int $sellerId
     * @param ProductFactory $productFactory
     * @param int $page
     * @param int $limit
     * @return mixed
     */
	public function getProducts($sellerId ,Collection $productFactory, $page = 1 , $limit = 20 );
}