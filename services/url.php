<?php

class UrlService {

private $router;
private $platformId;

public function __construct($router, $platformId) {
  $this->router = $router;
  $this->platformId = $platformId;
}

public function getIndustryUrl($indName,$iid) {
  $url = 'industry/' . preg_replace('/[&,\s]+/', '-', strtolower(trim($indName))) . '/' . $iid;
  return $url;
}
public function getProductUrl($pname, $pid) {
  return $this->router->createUrlTree([
    'product',
    preg_replace('/\s+/', '-', strtolower(trim($pname))),
    $pid,
  ])->toString();
}

public function getCategoryUrl($name, $id) {
  return $this->router->createUrlTree([
    'group-category',
    preg_replace('/\s+/', '-', strtolower(trim($name))),
    $id,
  ])->toString();
}

public function getSubcategoryUrl($category, $subcategory, $id) {
  return $category ? $this->router->createUrlTree([
    'category',
    preg_replace('/\s+/', '-', strtolower(trim($subcategory))),
    $id,
  ])->toString() : '/';
}

public function getSubcategoryLocUrl($category, $subcategory, $loc, $id) {
  return $category ? $this->router->createUrlTree([
    'category',
    preg_replace('/\s+/', '-', strtolower(trim($subcategory))),
    preg_replace('/\s+/', '-', strtolower(trim($loc))),
    $id,
  ])->toString() : '/';
}

public function getSubcategoryAllLocUrl($category, $subcategory, $loc, $id) {
  return $category ? $this->router->createUrlTree([
    'category',
    preg_replace('/[&\s]+/', '-', strtolower(trim($subcategory))),
    $id,
  ])->toString() : '/';
}

public function getSellerUrl($sellerUrl, $id) {
  if ($sellerUrl == 'null') { return $this->router->createUrlTree(['/']); }
  return $this->router->createUrlTree([
    'seller',
    $sellerUrl == null || $sellerUrl == '' ? '/' : preg_replace('/\s+/', '-', strtolower(trim($sellerUrl))),
    $id,
  ])->toString();
}

public function getBlogUrl($title) {
  return $this->router->createUrlTree([
    'blog',
    preg_replace('/\s+/', '-', strtolower(trim($title))),
  ])->toString();
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
  $this->router->navigate(['/product', preg_replace('/\s+/', '-', strtolower(trim($pname))), $pid]);
}
}

?>