<?php
/**
 * EYEMAGINE - The leading Magento Solution Partner
 *
 * SimpleRedirect
 *
 * @author    EYEMAGINE <magento@eyemaginetech.com>
 * @category  Eyemagine
 * @package   Eyemagine_SimpleRedirect
 * @copyright Copyright (c) 2013 EYEMAGINE Technology, LLC (http://www.eyemaginetech.com)
 * @license   http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 */

class Eyemagine_SimpleRedirect_Model_Observer
{
    /**
     * @var Mage_Catalog_Model_Product $_product
     */
    protected $_product;
    /**
     * Check if we're viewing a simple product with an active parent
     * 
     * @param Varien_Event_Observer $observer
     * 
     * @return void
     */
    public function checkForRedirect(Varien_Event_Observer $observer)
    {
        $productIds = Mage::getModel('catalog/product_type_configurable')
            ->getParentIdsByChild(
                $observer->getControllerAction()->getRequest()->getParam('id'));
        if ($productIds && isset($productIds[0])) {
            // Only capture the first matched product id
            $this->_product = Mage::getModel("catalog/product")->load($productIds[0]);
            if ($this->_canRedirect()) {
                $this->_redirect();
            }
        }
    }
    /**
     * Checks that the configurable product exists and can be show to the
     * customer
     * 
     * @return bool
     */
    protected function _canRedirect()
    {
        return (
            // Check that the product exists
            $this->_product
            && $this->_product->getId()
            // Check that it's enabled
            && $this->_product->getStatus() != Mage_Catalog_Model_Product_Status::STATUS_DISABLED
            // Check that it's visible
            && $this->_product->getVisibility() != Mage_Catalog_Model_Product_Visibility::VISIBILITY_NOT_VISIBLE
        );
    }
    /**
     * Redirect to the configurable product
     * 
     * @return void
     */
    protected function _redirect()
    {
        Mage::app()->getResponse()
            ->setRedirect($this->_product->getProductUrl(), 301)
            ->sendResponse();
    }
}