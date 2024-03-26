<?php

class WhatsappUrl {
    public function __construct() {}

    public function getProductToWhatsapp($prodName, $id,$seller = [], $isPackage = false) {
        $sellermobile = "";
        $appendUrl = "";

        if (!empty($seller['sellerWhatsappNumber1']) && !empty($seller['sellerWhatsappNumber2'])) {
            $sellermobile = $seller['sellerWhatsappNumber1'] . "," . $seller['sellerWhatsappNumber2'];
        } elseif (!empty($seller['sellerWhatsappNumber1'])) {
            $sellermobile = $seller['sellerWhatsappNumber1'];
        } elseif (!empty($seller['sellerWhatsappNumber2'])) {
            $sellermobile = $seller['sellerWhatsappNumber2'];
        }

        if (!empty($sellermobile)) {
            $appendUrl = "?id=" . base64_encode(urlencode($sellermobile));
        }

        $whatsappNo = "971569773623";
        if (!empty($sellermobile)) {
            $whatsappNo = $sellermobile;
        }

        $productUrl = $this->getProductUrl($prodName, $id); // Assuming this function exists

        if (!empty($prodName)) {
            return "https://api.whatsapp.com/send?phone=" . $whatsappNo . "&text=I am interested in " . 
                urlencode($prodName) . ". https://www.tradersfind.com" . $productUrl . $appendUrl;
        } else {
            return "https://api.whatsapp.com/send?phone=" . $whatsappNo . "&text=I am interested in your products!" . $appendUrl;
        }
    }

    private function getProductUrl($prodName, $id) {
        // This function should return the URL of the product
        // You need to implement this function according to your application logic
    }
}

?>
