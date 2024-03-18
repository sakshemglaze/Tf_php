<?php
// for you sir 


//   $routes = [
//       '/' => 'home.php',
//       '/about-us' => 'about-us.php',
//       '/contact-us' => 'Contact-Us.php',
//       '/blog' => 'blog-listing.php',
//       '/buyer-faq' => 'buyer-faq.php',
//       '/group-category' => 'group-category.php',
//       '/industry' => 'industry.php',
    
//       '/post-buy-requirements' => 'post-buy-requirements.php',
//       '/privacy-policy' => 'privacy-policy.php',
//       '/register-your-business' => 'registration.php',
//       '/seller-faq' => 'seller-faq.php',

//       '/feedback' => 'send-feedback.php',
//       '/complaint' => 'send-feedback.php',
//       '/login' => 'signIn.php',
//       '/term-and-conditions' => 'termcondition.php',
//       '/browse-sellers' => 'industry.php',
//   ];

//  $url = $_SERVER['REQUEST_URI'];

//  $url = strtok($url, '?');


//  if (preg_match('~^/industry/([^/]+)/([^/]+)$~', $url, $matches)) {
//    include 'industryDetail.php'; 
//  }
//  if (preg_match('~^/group-category/([^/]+)/([^/]+)$~', $url, $matches)) {
//    include 'group-category.php';
//  }
//  if (preg_match('~^/category/([^/]+)/([^/]+)$~', $url, $matches))||preg_match('~^/category/([^/]+)/([^/]+)/([^/]+)$~', $url,$matches)|| preg_match('~^/search/([^/]+)?([^/]+)$~', $url,$matches)||preg_match('~^/search/([^/]+)/([^/]+)$~', $url, $matches) {
//    include 'search.php'; 
//  }
//  if (preg_match('~^/seller/([^/]+)/([^/]+)$~', $url, $matches)) {
//    include 'sellerdetail.php'; 
//  }
//  if (preg_match('~^/product/([^/]+)/([^/]+)$~', $url, $matches)) {
//    include 'productDetail.php';
//  }
//   if (preg_match('~^/blog/([^/]+)$~', $url, $matches)) {
//    include 'blog.php';
//  }

  

//for atul

$routes = [
 
 '/Tf_php/' => 'home.php',
 '/Tf_php/about-us' => 'about-us.php',
 '/Tf_php/contact-us' => 'Contact-Us.php',
 '/Tf_php/blog' => 'blog-listing.php',

 '/Tf_php/buyer-faq' => 'buyer-faq.php',
 '/Tf_php/group-category' => 'group-category.php',
 '/Tf_php/industry' => 'industry.php',

 '/Tf_php/post-buy-requirements' => 'post-buy-requirements.php',
 '/Tf_php/privacy-policy' => 'privacy-policy.php',
 '/Tf_php/product' => 'productdetail.php',
 '/Tf_php/register-your-business' => 'registration.php',
 '/Tf_php/seller-faq' => 'seller-faq.php',
 '/Tf_php/search' => 'search.php',
 '/Tf_php/feedback' => 'send-feedback.php',
 '/Tf_php/complaint' => 'send-feedback.php',
 '/Tf_php/login' => 'signIn.php',
 '/Tf_php/term-and-conditions' => 'termcondition.php',
 '/Tf_php/browse-sellers' => 'industry.php',
  
];

// Get the current URL
$url = $_SERVER['REQUEST_URI'];

$url = strtok($url, '?');

 if (preg_match('~^/Tf_php/industry/([^/]+)/([^/]+)$~', $url, $matches)) {
   include 'industryDetail.php'; 
 }
 if (preg_match('~^/Tf_php/group-category/([^/]+)/([^/]+)$~', $url, $matches)) {
   include 'group-category.php';
 }
 if (preg_match('~^/Tf_php/category/([^/]+)/([^/]+)$~', $url, $matches)||preg_match('~^/Tf_php/category/([^/]+)/([^/]+)/([^/]+)$~', $url,$matches)|| preg_match('~^/Tf_php/search/([^/]+)?([^/]+)$~', $url,$matches)||preg_match('~^/Tf_php/search/([^/]+)/([^/]+)$~', $url, $matches)) {
   include 'search.php'; 
 }
 if (preg_match('~^/Tf_php/seller/([^/]+)$~', $url, $matches)) {
   include 'sellerdetail.php'; 
 }
 if (preg_match('~^/Tf_php/product/([^/]+)/([^/]+)$~', $url, $matches)) {
   include 'productDetail.php';
 }
  if (preg_match('~^/Tf_php/blog/([^/]+)$~', $url, $matches)) {
    
   include 'blog.php';
 }



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
