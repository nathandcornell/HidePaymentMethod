<?php
class RBCommunications_HidePaymentMethod_Model_Observer {

    public function hidePaymentMethod($event){
        $method = $event->getMethodInstance();
        $result = $event->getResult();
        $code   = $method->getCode();
        $reportIds = explode(',', Mage::getStoreConfig('hidepayment/hide/methods'));

        if(in_array($method->getCode(), $reportIds) && ! Mage::getIsDeveloperMode()) {
            $result->isAvailable = false;
        }

    }

}
