<?php 
namespace Apptha\Marketplace\Api;
use Apptha\Marketplace\Api\Data\CategoryDataInterface;
 
interface SellerManagementInterface {


	/**
	 * GET for Seller Category api
	 * @param int $sellerId 
	 * @param int $page
	 * @param int $limit
	 * @return Apptha\Marketplace\Api\Data\CategoryDataInterface[]
	 */
	
	public function getCategories($sellerId , $page = 1 , $limit = 20 );
}