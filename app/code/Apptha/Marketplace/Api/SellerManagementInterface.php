<?php 
namespace Apptha\Marketplace\Api;
 
 
interface SellerManagementInterface {


	/**
	 * GET for Post api
	 * @param int $sellerId 
	 * @param int $page
	 * @param int $limit
	 * @return string
	 */
	
	public function getCategories($sellerId , $page = 1 , $limit = 20 );
}