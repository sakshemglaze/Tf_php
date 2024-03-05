<?php
// $routes = [
//     '/' => 'home.php',
//     '/about-us' => 'about-us.php',
//     '/contact-us' => 'Contact-Us.php',
//     '/blog' => 'blog-listing.php',
//     '/buyer-faq' => 'buyer-faq.php',
//     '/group-category' => 'group-category.php',
//     '/industry' => 'industry.php',
    
//     '/post-buy-requirements' => 'post-buy-requirements.php',
//     '/privacy-policy' => 'privacy-policy.php',
//     '/product' => 'productdetail.php',
//     '/register-your-business' => 'registration.php',
//     '/seller-faq' => 'seller-faq.php',
   
//     '/feedback' => 'send-feedback.php',
//     '/complaint' => 'send-feedback.php',
//     '/login' => 'signIn.php',
//     '/term-and-conditions' => 'termcondition.php',
//     '/browse-sellers' => 'industry.php',
// ];

$routes = [
  /*
  '/tf_result/' => 'home.php',
  '/tf_result/about-us' => 'about-us.php',
  '/tf_result/contact-us' => 'Contact-Us.php',
  '/tf_result/blog' => 'blog-listing.php',
  '/tf_result/buyer-faq' => 'buyer-faq.php',
  '/tf_result/group-category' => 'group-category.php',
  '/tf_result/industry' => 'industry.php',
 
  '/tf_result/post-buy-requirements' => 'post-buy-requirements.php',
  '/tf_result/privacy-policy' => 'privacy-policy.php',
  '/tf_result/product' => 'productdetail.php',
  '/tf_result/register-your-business' => 'registration.php',
  '/tf_result/seller-faq' => 'seller-faq.php',
  '/tf_result/search' => 'search.php',
  '/tf_result/feedback' => 'send-feedback.php',
  '/tf_result/complaint' => 'send-feedback.php',
  '/tf_result/login' => 'signIn.php',
  '/tf_result/term-and-conditions' => 'termcondition.php',
  '/tf_result/browse-sellers' => 'industry.php',
  */
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

$url = strtok($url, '?');
/*
if (preg_match('~^/tf_result/industry/([^/]+)/([^/]+)$~', $url, $matches)) {
  include 'industrydetail.php'; //. $matches[1] . '/' . $matches[2];
}
if (preg_match('~^/tf_result/group-category/([^/]+)/([^/]+)$~', $url, $matches)) {
  include 'group-category.php'; //. $matches[1] . '/' . $matches[2];
}

if (preg_match('~^/tf_result/category/([^/]+)/([^/]+)$~', $url, $matches)) {
  include 'search.php'; //. $matches[1] . '/' . $matches[2];
}
if (preg_match('~^/tf_result/seller/([^/]+)$~', $url, $matches)) {
  include 'sellerdetail.php'; //. $matches[1] . '/' . $matches[2];
}
if (preg_match('~^/tf_result/product/([^/]+)/([^/]+)$~', $url, $matches)) {
  include 'productdetail.php'; //. $matches[1] . '/' . $matches[2];
*/
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

// if (preg_match('~^/industry/([^/]+)/([^/]+)$~', $url, $matches)) {
//   include 'industrydetail.php'; //. $matches[1] . '/' . $matches[2];
// }
// if (preg_match('~^/group-category/([^/]+)/([^/]+)$~', $url, $matches)) {
//   include 'group-category.php'; //. $matches[1] . '/' . $matches[2];
// }
// if (preg_match('~^/category/([^/]+)/([^/]+)$~', $url, $matches)) {
//   include 'search.php'; //. $matches[1] . '/' . $matches[2];
// }
// if (preg_match('~^/seller/([^/]+)/([^/]+)$~', $url, $matches)) {
//   include 'sellerdetail.php'; //. $matches[1] . '/' . $matches[2];
// }
// if (preg_match('~^/product/([^/]+)/([^/]+)$~', $url, $matches)) {
//   include 'productdetail.php'; //. $matches[1] . '/' . $matches[2];
// }


if (isset($routes[$url])) {
  include_once $routes[$url];
} elseif ($url === '/not-found') {
  include 'not-found.php';
} else {
  // Redirect to /not-found for all other URLs
  //header("HTTP/1.1 404 Not Found");
  //include_once 'not-found.php';
}

?>