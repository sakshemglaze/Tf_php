<?php
include_once 'config.php';
class seoService {

    public function setSeoTags($seoParams){
        //print_r($seoParam)
        $curl = substr(BASE_URL,0,strlen(BASE_URL)-1) . $_SERVER['REQUEST_URI'];
     
        if(substr($curl,-1) === '/') {
            $curl = 'https://www.tradersfind.com';
        }
        $title = isset($seoParams['title']) ? $seoParams['title'] : 'UAE\'s Largest Online B2B Portal - TradersFind';
        $metaTitle = isset($seoParams['metaTitle']) ? $seoParams['metaTitle'] : 'UAEs Largest Online B2B Portal - TradersFind';
        $metaDescription = isset($seoParams['metaDescription']) ? $seoParams['metaDescription'] : 'TradersFind is UAEs Largest Online B2B Portal connecting buyers with suppliers. List of companies in UAE with contact details. Register Now!';
        $metaKeywords = isset($seoParams['metaKeywords']) ? $seoParams['metaKeywords'] : 'tradersfind, b2b portal, list of companies in uae, b2b marketplace, business directory, manufacturers in uae, suppliers in uae, buyers in uae, yellowpages uae, importers in uae, uae companies directory, b2b website, business marketplace, local business listings, business directory in uae';
        $fbTitle = isset($seoParams['fbTitle']) ? $seoParams['fbTitle'] : $metaTitle;
        $fbDescription = isset($seoParams['fbDescription']) ? $seoParams['fbDescription'] : $metaDescription;
        $fbImage = isset($seoParams['fbImage']) ? $seoParams['fbImage'] : 'https://www.tradersfind.com/assets/images/TradersFind.webp';
        $fbUrl = isset($seoParams['fbUrl']) ? $seoParams['fbUrl'] : 'https://www.tradersfind.com';
        $ogType = 'website';
        $twitterTitle = isset($seoParams['twitterTitle']) ? $seoParams['twitterTitle'] : $title;
        $twitterDescription = isset($seoParams['twitterDescription']) ? $seoParams['twitterDescription'] : $metaDescription;
        $twitterImage = isset($seoParams['twitterImage']) ? $seoParams['twitterImage'] : '';
        $twitterSite = isset($seoParams['twitterSite']) ? $seoParams['twitterSite'] : '';
        $twitterCard = isset($seoParams['twitterCard']) ? $seoParams['twitterCard'] : '';
        $schemaDescription = isset($seoParams['schemaDescription']) ? $seoParams['schemaDescription'] : '{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "https://www.tradersfind.com/#organization",
      "name": "Interconnect Marketing Management L.L.C",
      "url": "https://www.tradersfind.com/seller/interconnect-marketing-management-llc",
      "sameAs": [
        "https://www.facebook.com/tradersfindb2bportal/",
        "https://www.linkedin.com/company/tradersfind/",
        "https://x.com/tradersfind/"
      ],
      "logo": {
        "@type": "ImageObject",
        "@id": "https://www.tradersfind.com/#logo",
        "url": "https://www.tradersfind.com/assets/images/TradersFind.webp",
        "caption": "Tradersfind.com by Interconnect Marketing Management L.L.C"
      }
    },
    {
      "@type": "WebSite",
      "@id": "https://www.tradersfind.com/#website",
      "url": "https://www.tradersfind.com",
      "name": "Tradersfind.com",
      "publisher": {
        "@id": "https://www.tradersfind.com/#organization"
      },
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://www.tradersfind.com/search/{search_term_string}",
        "query-input": "required name=search_term_string"
      }
    },
    {
      "@type": "WebPage",
      "@id": "https://www.tradersfind.com/#webpage",
      "url": "https://www.tradersfind.com",
      "inLanguage": "en-US",
      "name": "Tradersfind.com by Interconnect Marketing Management L.L.C",
      "isPartOf": {
        "@id": "https://www.tradersfind.com/#website"
      },
      "about": {
        "@id": "https://www.tradersfind.com/#organization"
      },
      "description": "Interconnect Marketing Management L.L.C handles Tradersfind.com, which is the UAE largest B2B Portal for businesses, products and services. A smart and efficient way to Search, Find and Connect with Businesses in UAE."
    }
  ]
}';

        $metaTags = "<title>$metaTitle</title>\n";
        $metaTags .= "<meta name='robots' content='index follow'>\n";
        $metaTags .= "<meta name='title' content='$metaTitle'>\n";
        $metaTags .= "<meta name='description' content='$metaDescription'>\n";
        $metaTags .= "<meta name='keywords' content='$metaKeywords'>\n";
        $metaTags .= "<meta name='og_title' content='$fbTitle'>\n";
        if ($fbDescription !== '') {
        $metaTags .= "<meta name='og_description' content='$fbDescription'>\n"; }
        if ($fbImage !== '') {
        $metaTags .= "<meta name='og_image' content='$fbImage'>\n"; }
        if ($fbUrl !== '' && $fbUrl !== null) {
        $metaTags .= "<meta name='og_url' content='$fbUrl'>\n"; }
        $metaTags .= "<meta name='og_type' content='$ogType'>\n";  
        $metaTags .= "<meta name='twitter:title' content='$twitterTitle'>\n";
        if ($twitterDescription !== '') {
        $metaTags .= "<meta name='twitter:description' content='$twitterDescription'>\n"; }
        if ($twitterImage !== '') {
        $metaTags .= "<meta name='twitter:image' content='$twitterImage'>\n"; }
        if ($twitterSite !== '' && $twitterSite !== null) {
        $metaTags .= "<meta name='twitter:site' content='$twitterSite'>\n"; }
        if ($twitterCard !== '') {
        $metaTags .= "<meta name='twitter:card' content='$twitterCard'>\n"; }
        $metaTags .= "<link rel='canonical' href='$curl'>\n";
        $metaTags .= "<base href='/'>\n";
        if ($schemaDescription != null) {
        $metaTags .= "<script type='application/ld+json'>\n";
        $metaTags .= "$schemaDescription\n</script> \n"; 
        }
        
    // Insert the meta tags into the HTML <head> section
        echo $metaTags;
    }

}
?>