<?php
// for you sir 
$url = $_SERVER['REQUEST_URI'];
$currentUrl = rtrim($url, '/');
// Split the URL by '/'
$urlParts = explode('/', $currentUrl);
$lastPart = end($urlParts);

if ((in_array('industry', $urlParts) || in_array('group-category', $urlParts) || in_array('product', $urlParts) || in_array('category', $urlParts) || in_array('search', $urlParts)) && ctype_xdigit($lastPart) && strlen($lastPart) > 16) {
    // Redirect to the desired URL
    $redirectUrl = implode('/', array_slice($urlParts, 0, -1)); // Reconstruct the URL without the last part
    header('Location: ' . $redirectUrl);
    exit;
}

  $routes = [
      '/' => 'home.php',
      '/about-us' => 'about-us.php',
      '/contact-us' => 'Contact-Us.php',
      '/blog' => 'blog-listing.php',
      '/buyer-faq' => 'buyer-faq.php',
      '/group-category' => 'group-category.php',
      '/industry' => 'ind1.php',
    
      '/post-buy-requirements' => 'post-buy-requirements.php',
      '/privacy-policy' => 'privacy-policy.php',
      '/register-your-business' => 'registration.php',
      '/seller-faq' => 'seller-faq.php',

      '/feedback' => 'send-feedback.php',
      '/complaint' => 'send-feedback.php',
      '/login' => 'signIn.php',
      '/term-and-conditions' => 'termcondition.php',
      '/browse-sellers' => 'industry.php',
  ];

 $url = strtok($url, '?');


 if (preg_match('~^/industry/([^/]+)$~', $url, $matches)) {
   include 'industryDetail.php'; 
 }
 if (preg_match('~^/group-category/([^/]+)$~', $url, $matches) || preg_match('~^/group-category/([^/]+)$~', $url, $matches)) {
   include 'group-category.php';
 }
 if (preg_match('~^/category/([^/]+)/([^/]+)$~', $url, $matches)||preg_match('~^/category/([^/]+)$~', $url,$matches)|| preg_match('~^/search/([^/]+)?([^/]+)$~', $url,$matches)||preg_match('~^/search/([^/]+)/([^/]+)$~', $url, $matches)) {
   include 'search.php'; 
 }
 if (preg_match('~^/seller/([^/]+)$~', $url, $matches)) {
   include 'sellerdetail.php'; 
 }
 if (preg_match('~^/product/([^/]+)$~', $url, $matches)) {
   include 'productDetail.php';
 }
 if (preg_match('~^/blog/([^/]+)$~', $url, $matches)) {
   include 'blog.php';
 }

if (isset($routes[$url])) {
  include_once $routes[$url];
} elseif ($url === '/not-found') {
  include 'not-found.php';
} else {
   //Redirect to /not-found for all other URLs
   //header("HTTP/1.1 404 Not Found");
   //include_once 'not-found.php';
}

?>
