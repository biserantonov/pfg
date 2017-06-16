<?php

require_once Mage::getModuleDir('controllers', 'Mage_Customer').DS.'AccountController.php';

class PFG_Biser_Customer_AccountController extends Mage_Customer_AccountController
{
    public function logoutAction()
    {
        $session = $this->_getSession();
        $session->logout()->renewSession();

        if (Mage::getStoreConfigFlag(Mage_Customer_Helper_Data::XML_PATH_CUSTOMER_STARTUP_REDIRECT_TO_DASHBOARD)) {
            $session->setBeforeAuthUrl(Mage::getBaseUrl());
        } else {
            $session->setBeforeAuthUrl($this->_getRefererUrl());
        }

        $this->_redirectUrl(Mage::getBaseUrl());
    }
}