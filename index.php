<?php
$routes = [
    '/' => 'home.php',
    '/about-us' => 'about-us.php',
    '/contact-us' => 'Contact-Us.php',
    '/blog' => 'blog-listing.php',
    '/buyer-faq' => 'buyer-faq.php',
    '/group-category' => 'group-category.php',
    '/industry' => 'industry.php',
    '/industry/' => 'industrydetail.php',
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
  include 'industrydetail.php'; //. $matches[1] . '/' . $matches[2];
}
if (preg_match('~^/group-category/([^/]+)/([^/]+)$~', $url, $matches)) {
  include 'group-category.php'; //. $matches[1] . '/' . $matches[2];
}
if (preg_match('~^/category/([^/]+)/([^/]+)$~', $url, $matches)) {
  include 'search.php'; //. $matches[1] . '/' . $matches[2];
}
if (preg_match('~^/seller/([^/]+)/([^/]+)$~', $url, $matches)) {
  include 'sellerdetail.php'; //. $matches[1] . '/' . $matches[2];
}
if (preg_match('~^/product/([^/]+)/([^/]+)$~', $url, $matches)) {
  include 'productdetail.php'; //. $matches[1] . '/' . $matches[2];
}

if (isset($routes[$url])) {
  include $routes[$url];
} elseif ($url === '/not-found') {
  include 'not-found.php';
} else {
  // Redirect to /not-found for all other URLs
  //header("HTTP/1.1 404 Not Found");
  //include 'not-found.php';
}
?>