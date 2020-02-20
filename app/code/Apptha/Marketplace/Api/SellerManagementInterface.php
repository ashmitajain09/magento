<?php 
namespace Apptha\Marketplace\Api;
use Apptha\Marketplace\Api\Data\CategoryDataInterface;
use Apptha\Marketplace\Api\Data\SellerDataInterface;

interface SellerManagementInterface {


	/**
	 * GET for Seller Category api
	 * @param int $sellerId 
	 * @param int $page
	 * @param int $limit
	 * @return Apptha\Marketplace\Api\Data\CategoryDataInterface[]
	 */
	
	public function getCategories($sellerId , $page = 1 , $limit = 20 );
	
	
	/**
	 * GET for Seller Data api
	 * @param int $sellerId 
	 * @return Apptha\Marketplace\Api\Data\SellerDataInterface
	 */
	public function getDetails($sellerId);
}