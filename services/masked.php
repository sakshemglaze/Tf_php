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
            //increaseSellerNumClicks();
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
        if(gettype($toBeMasked)=='object'){
            $phoneNumber =  $toBeMasked->sellerVirtualContactPhone;
            $userId =  $toBeMasked->id;
        }else{
        $phoneNumber = $toBeMasked['sellerVirtualContactPhone'];
        $userId = $toBeMasked['id'];
        }
if (strlen($phoneNumber) > 9) {
        $first2 = substr($phoneNumber, 0, 4);
        //$last2 = substr($toBeMasked, -2);
        //$mask = str_repeat('*', strlen($toBeMasked) - 6); // Assuming the mask should cover all but the first 2 and last 2 characters
        //$seller = $first2 . $mask . $last2;

        echo '<a href="#" onclick="showPhoneNumber(this, \'' . $phoneNumber . '\', \'' . $userId . '\'); return false;">' . $first2 . ' Click to View</a>';
   
            } else {
            return '+971 Click To View';
        }
        //print_r($toBeMasked['id']);
       // increaseSellerNumClicks($toBeMasked['id']);        
    }
}


?>
<script type="text/javascript">
  function showPhoneNumber(link, phoneNumber, name) {
    link.textContent = phoneNumber;
    increaseSellerNumClicks(name)
      .then((clickCount) => {
        console.log(`Click count updated: ${clickCount}`);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
    
    link.onclick = function() { return false; };
  }

  async function increaseSellerNumClicks(userId) {
    const myObject1 = new StorageService();
    try {
      const response = await fetch(`https://api.tradersfind.com/api/guest/number-click-count/${userId}`, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': `Bearer ${myObject1.getItem('userAccessToken')}`  // Assuming `myObject1` holds the token
        }
      });

      if (!response.ok) {
        throw new Error('Network response was not ok');
      }

      const data = await response.json();
      return data;
    } catch (error) {
      console.error('Error:', error);
    }
  }
</script>
