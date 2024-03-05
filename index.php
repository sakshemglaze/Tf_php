<?php
$routes = [
    '/' => 'home.php',
    '/about-us' => 'about-us.php',
    '/contact-us' => 'Contact-Us.php',
    '/blog' => 'blog-listing.php',
    '/buyer-faq' => 'buyer-faq.php',
    '/group-category' => 'group-category.php',
    '/industry' => 'industry.php',
    '/post-buy-requirements' => 'post-buy-requirements.php',
    '/privacy-policy' => 'privacy-policy.php',
    '/product' => 'productdetail.php',
    '/register-your-business' => 'registration.php',
    '/seller-faq' => 'seller-faq.php',
    '/feedback' => 'send-feedback.php',
    '/complaint' => 'send-feedback.php',
    '/login' => 'signIn.php',
    '/term-and-conditions' => 'termcondition.php',
    '/browse-sellers' => 'industry.php',
];

// Get the current URL
$url = $_SERVER['REQUEST_URI'];
// Remove query string
$url = strtok($url, '?');

if (preg_match('~^/industry/([^/]+)/([^/]+)$~', $url, $matches)) {
  include_once 'industrydetail.php'; //. $matches[1] . '/' . $matches[2];
}
if (preg_match('~^/group-category/([^/]+)/([^/]+)$~', $url, $matches)) {
  include_once 'group-category.php'; //. $matches[1] . '/' . $matches[2];
}
if (preg_match('~^/category/([^/]+)/([^/]+)$~', $url, $matches)) {
  include_once 'search.php'; //. $matches[1] . '/' . $matches[2];
}
if (preg_match('~^/seller/([^/]+)/([^/]+)$~', $url, $matches)) {
  include_once 'sellerdetail.php'; //. $matches[1] . '/' . $matches[2];
}
if (preg_match('~^/product/([^/]+)/([^/]+)$~', $url, $matches)) {
  include_once 'productdetail.php'; //. $matches[1] . '/' . $matches[2];
}


if (isset($routes[$url])) {
  include_once $routes[$url];
} elseif ($url === '/not-found') {
  include_once 'not-found.php';
} else {
  // Redirect to /not-found for all other URLs
  //header("HTTP/1.1 404 Not Found");
  //include_once 'not-found.php';
}
?>