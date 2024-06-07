<?php
$url = $_SERVER['REQUEST_URI'];
$currentUrl = rtrim($url, '/');

// Split the URL by '/'
$urlParts = explode('/', $currentUrl);
$lastPart = end($urlParts);

// Redirect if URL ends with a long hexadecimal string
if ((in_array('industry', $urlParts) || in_array('group-category', $urlParts) || in_array('category', $urlParts) || in_array('search', $urlParts)) && ctype_xdigit($lastPart) && strlen($lastPart) > 16) {
    // Redirect to the desired URL
    $redirectUrl = implode('/', array_slice($urlParts, 0, -1)); // Reconstruct the URL without the last part
    header('Location: ' . $redirectUrl);
    exit;
}

// Define route mappings
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

// Clean the URL by removing query parameters
$urlPath = strtok($url, '?');

// Match more specific routes before general ones
if (preg_match('~^/industry/([^/]+)$~', $urlPath, $matches)) {
    include 'industryDetail.php'; 
    exit;
}

if (preg_match('~^/group-category/([^/]+)$~', $urlPath, $matches)) {
    include 'group-category.php';
    exit;
}

if (preg_match('~^/category/([^/]+)/([^/]+)$~', $urlPath, $matches) || preg_match('~^/category/([^/]+)$~', $urlPath, $matches)) {
    include 'search.php'; 
    exit;
}

if (preg_match('~^/search/([^/]+)$~', $urlPath, $matches) || preg_match('~^/search/([^/]+)/([^/]+)$~', $urlPath, $matches)) {
    include 'search.php'; 
    exit;
}

if (preg_match('~^/seller/([^/]+)$~', $urlPath, $matches)) {
    include 'sellerdetail.php'; 
    exit;
}

if (preg_match('~^/product/([^/]+)/([^/]+)$~', $urlPath, $matches)) {
    include 'productDetail.php';
    exit;
}

if (preg_match('~^/blog/([^/]+)$~', $urlPath, $matches)) {
    include 'blog.php';
    exit;
}

// Include the mapped file if it exists
if (isset($routes[$urlPath])) {
    include_once $routes[$urlPath];
} else {
    // Redirect to /not-found for all other URLs
    header("HTTP/1.1 404 Not Found");
    include 'not-found.php';
}
?>