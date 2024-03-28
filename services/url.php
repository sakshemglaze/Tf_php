<?php

class UrlService {

//private $router;
//private $platformId;

public function __construct() {

  //$this->router = $router;
  //$this->platformId = $platformId;

}

public function getIndustryUrl($indName,$iid) {
  $url = 'industry/' . preg_replace('/[&,\s]+/', '-', strtolower($indName)); // . '/' . $iid;
  return $url;
}
public function getProductUrl($pname) {
  $url = 'product/' . preg_replace('/[&,\s]+/', '-', strtolower(trim($pname)));
  return $url;
}

public function getGroupCategoryUrl($name,$id) {
  $url = 'group-category/' . preg_replace('/[&,\s]+/', '-', strtolower(trim($name))); // . '/' . $id;
  return $url;
}

public function getCategoryUrl($subcategory) {
  $url =  'category/' . preg_replace('/[&,\s]+/', '-', strtolower(trim($subcategory)));
  return $url;
}

public function getSubcategoryLocUrl($category, $subcategory, $loc) {
  $url = 'category/' . preg_replace('/[&,\s]+/', '-', strtolower(trim($subcategory))) . '/' . preg_replace('/[&,\s]+/', '-', strtolower(trim($loc))) ;
  return $url;
}

public function getSubcategoryAllLocUrl($category, $subcategory, $loc) {
  $url = 'category/' . preg_replace('/[&,\s]+/', '-', strtolower(trim($subcategory))) ;
  return $url;
}

public function getSellerUrl($sellerUrl, $id) {
  if ($sellerUrl == 'null' || $sellerUrl == '') { return '/'; }
  $url = 'seller/' . preg_replace('/[&,\s]+/', '-', strtolower(trim($sellerUrl)));
  return $url;
}

public function getBlogUrl($title) {
  $url = 'blog/' . preg_replace('/[&,\s]+/', '-', strtolower(trim($title)));
  return $url;
}

public function getProductToWhatsapp($prodName, $id, $seller, $isPackage = false) {
  $sellermobile = '';
  $appendUrl = '';
  if (!empty($seller['sellerWhatsappNumber1'])) {
    $sellermobile = $seller['sellerWhatsappNumber1'];
  }
  if (!empty($seller['sellerWhatsappNumber1']) && !empty($seller['sellerWhatsappNumber2'])) {
    $sellermobile = $seller['sellerWhatsappNumber1'] . ',' . $seller['sellerWhatsappNumber2'];
  } else if (!empty($seller['sellerWhatsappNumber1'])) {
    $sellermobile = $seller['sellerWhatsappNumber1'];
  } else if (!empty($seller['sellerWhatsappNumber2'])) {
    $sellermobile = $seller['sellerWhatsappNumber2'];
  }

  if ($sellermobile) {
    $appendUrl = $this->platformId === 'browser'
      ? '?id=' . base64_encode(urlencode($sellermobile))
      : '';
  }

  $whatsappNo = '971569773623';
  if ($sellermobile) {
    $whatsappNo = $sellermobile;
  }

  if ($prodName != "") {
    return 'https://api.whatsapp.com/send?phone=' . $whatsappNo . '&text=I am interested in ' . urlencode($prodName) . '. https://www.tradersfind.com' . $this->getProductUrl($prodName, $id) . $appendUrl;
  } else {
    return 'https://api.whatsapp.com/send?phone=' . $whatsappNo . '&text=I am interested in your products!' . $appendUrl;
  }
}

public function navigateToProductUrl($pname, $pid) {
  $this->router->navigate(['/product', preg_replace('/[&,\s]+/', '-', strtolower(trim($pname))), $pid]);
}
}

?>