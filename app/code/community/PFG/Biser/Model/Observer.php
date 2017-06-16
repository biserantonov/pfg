<?php

class PFG_Biser_Model_Observer
{
    public function catalogProductSaveBefore(Varien_Event_Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $image = $product->getImage();
        if (!$image || $image == 'no_selection') {
            $product->setStatus(Mage_Catalog_Model_Product_Status::STATUS_DISABLED);
        }

        return $this;
    }
}
