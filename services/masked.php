<?php
class MaskingService
{
    private $apiService;

    //public function __construct($apiService)
   // {
   //     $this->apiService = $apiService;
   // }

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

    public function getMaskedNumber($toBeMasked)
    {
        //print_r($toBeMasked);
        if (strlen($toBeMasked) > 9 ) {
        $first2 = substr($toBeMasked, 0, 4);
        //$last2 = substr($toBeMasked, -2);
        //$mask = str_repeat('*', strlen($toBeMasked) - 6); // Assuming the mask should cover all but the first 2 and last 2 characters
        //$seller = $first2 . $mask . $last2;
        print '<a href="#" onclick="showPhoneNumber(this, \'' . $toBeMasked . '\'); return false;">' . $first2 . ' Click to View</a>';
        } else {
            return '+971 Click To View';
        }        
    }
}
?>
<script type="text/javascript">
function showPhoneNumber(link, phoneNumber) {
    //var first2 = phoneNumber.substr(0, 2);
    //var mask = "*".repeat(phoneNumber.length - 4); // Mask all but the first 2 and last 2 characters
    //var last2 = phoneNumber.substr(-2);
    //var maskedNumber = first2 + mask + last2;

    link.textContent = phoneNumber;
    link.onclick = function() { return true; }; // Allow default behavior for subsequent clicks
}
</script>