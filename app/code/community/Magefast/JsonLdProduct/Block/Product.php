<?php

class Magefast_JsonLdProduct_Block_Product extends Mage_Core_Block_Template
{
    /**
     * Check  -  is product page or not
     *
     * @return bool
     */
    public function isProductPage()
    {
        if (Mage::app()->getRequest()->getModuleName() == 'catalog'
            && Mage::app()->getRequest()->getControllerName() == 'product'
            && Mage::registry('current_product')
            && Mage::registry('current_product')->getTypeId() == 'simple'
        ) {
            return true;
        }

        return false;
    }

    /**
     * Get product name
     *
     * @return string
     */
    public function getProductName()
    {
        if (Mage::registry('current_product')->getName()) {
            return Mage::registry('current_product')->getName();
        }
        return '';
    }

    /**
     * Get product image
     *
     * @return string
     */
    public function getProductImage()
    {
        if (Mage::registry('current_product')->getImage()) {
            return Mage::getBaseUrl('media') . 'catalog/product' . Mage::registry('current_product')->getImage();
        }
        return false;
    }

    /**
     * Get product brand
     *
     * @return string
     */
    public function getProductBrand()
    {
        if (Mage::registry('current_product')->getManufacturer()) {
            return Mage::registry('current_product')->getAttributeText('manufacturer');
        }
        return false;
    }

    /**
     * Get product description
     *
     * @return string
     */
    public function getProductDescription()
    {
        if (Mage::registry('current_product')->getShortDescription()) {
            return Mage::helper('core')->stripTags(Mage::registry('current_product')->getShortDescription(), null, true);
        }
        return false;
    }

    /**
     * Get product price
     *
     * @return bool|string
     */
    public function getProductFinalPrice()
    {
        if (Mage::registry('current_product')->getFinalPrice()) {
            return Mage::registry('current_product')->getFinalPrice();
        }
        return false;
    }

    /**
     * Get Currency code
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return Mage::app()->getStore()->getCurrentCurrencyCode();
    }

    /**
     * Get price Valid Until date
     *
     * @return string
     */
    public function priceValidUntil()
    {
        return date('Y-m-d', strtotime("+90 days"));
    }
}
