<?php
class MaskingService
{
    private $apiService;

    public function __construct($apiService)
    {
        $this->apiService = $apiService;
    }

    public function onClickPhoneNum($seller, $toBeMasked, $url, $product)
    {
        if ($seller['maskedClicked']) {
            // window.open('tel:' + seller[toBeMasked], '_blank')
            // PHP does not have an equivalent for opening a new window with JavaScript
        } else {
            $seller['maskedClicked'] = true;
            // $this->apiService->increaseSellerNumClicks($seller['id']); // Assuming increaseSellerNumClicks is a method in $apiService
            $messageText = '';
            if ($product) {
                $messageText = "Thank you for showing interest. Product link -  " . ($url ? TRADERSFIND.WEBSITE_URL . $url : "URL Unavailable");
            } else {
                $messageText = "Thank you for showing interest. Seller link -  " . ($url ? TRADERSFIND.WEBSITE_URL . $url : "URL Unavailable");
            }
            $payload = [
                "createdDate" => date("Y-m-d H:i:s"),
                "ipAddress" => '', // $this->authService->ipAddress ? $this->authService->ipAddress : "NA",
                "messageText" => $messageText,
                "url" => '', // $url ? environment.websiteUrl . $url : "URL Unavailable",
                "user" => '', // $this->authService->userId ? ["id" => $this->authService->userId] : null,
                "seller" => ["id" => $seller['id']],
                "product" => $product ? ["id" => $product['id']] : null,
                "productsCategory" => $product && isset($product['productsCategory']) && isset($product['productsCategory']['id']) ? ["id" => $product['productsCategory']['id']] : null,
                "productsSubcategory" => $product && isset($product['productsSubcategory']) && isset($product['productsSubcategory']['id']) ? ["id" => $product['productsSubcategory']['id']] : null
            ];
            // $this->apiService->postLeadCapture($payload); // Assuming postLeadCapture is a method in $apiService
        }
    }

    public function getMaskedNumber($seller, $toBeMasked)
    {
        $first2 = substr($seller[$toBeMasked], 0, 4);
        $last2 = substr($seller[$toBeMasked], -2);
        $mask = str_repeat('*', strlen($seller[$toBeMasked]) - 6); // Assuming the mask should cover all but the first 2 and last 2 characters
        $seller['maskedNum'] = $first2 . $mask . $last2;
        return $seller['maskedClicked'] ? $seller[$toBeMasked] : '+971 Click To View';
    }
}
