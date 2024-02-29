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
    '/privacy-policy' => 'about-us.php',
    '/product' => 'productdetail.php',
    '/register-your-business' => 'registration.php',
    '/seller-faq' => 'seller-faq.php',
    '/seller/' => 'sellerdetail.php',
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
if (isset($routes[$url])) {
  include $routes[$url];
} elseif ($url === '/not-found') {
  include 'not-found.php';
} else {
  // Redirect to /not-found for all other URLs
  header("HTTP/1.1 404 Not Found");
  include 'not-found.php';
}
?>