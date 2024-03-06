<?php
include_once 'config.php';
class seoService {

    public function setSeoTags($seoParams){
        //print_r($seoParam)
        $curl = substr(BASE_URL,0,strlen(BASE_URL)-1) . $_SERVER['REQUEST_URI'];
        $title = isset($seoParams['title']) ? $seoParams['title'] : '';
        $metaTitle = isset($seoParams['metaTitle']) ? $seoParams['metaTitle'] : '';
        $metaDescription = isset($seoParams['metaDescription']) ? $seoParams['metaDescription'] : '';
        $metaKeywords = isset($seoParams['metaKeywords']) ? $seoParams['metaKeywords'] : '';
        $fbTitle = isset($seoParams['fbTitle']) ? $seoParams['fbTitle'] : $seoParams['title'];
        $fbDescription = isset($seoParams['fbDescription']) ? $seoParams['fbDescription'] : $seoParams['metaDescription'];
        $fbImage = isset($seoParams['fbImage']) ? $seoParams['fbImage'] : '';
        $fbUrl = isset($seoParams['fbUrl']) ? $seoParams['fbUrl'] : '';
        $twitterTitle = isset($seoParams['twitterTitle']) ? $seoParams['twitterTitle'] : $seoParams['title'];
        $twitterDescription = isset($seoParams['twitterDescription']) ? $seoParams['twitterDescription'] : $seoParams['metaDescription'];
        $twitterImage = isset($seoParams['twitterImage']) ? $seoParams['twitterImage'] : '';
        $twitterSite = isset($seoParams['twitterSite']) ? $seoParams['twitterSite'] : '';
        $twitterCard = isset($seoParams['twitterCard']) ? $seoParams['twitterCard'] : '';
        $schemaDescription = isset($seoParams['schemaDescription']) ? $seoParams['schemaDescription'] : null;

        $metaTags = "<title>$title</title>\n";
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