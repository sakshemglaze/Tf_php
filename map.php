<?php

function generateMapUrl($latitude, $longitude) {
    if ($latitude && $longitude) {
        // If latitude and longitude are provided, generate the map URL with them
        return "https://maps.google.com/maps?q={$latitude},{$longitude}&z=15&output=embed";
    } else {
        // If latitude and longitude are not provided, use default coordinates
        return "https://maps.google.com/maps?q=23.4241,53.8478&z=15&output=embed";
    }
}

function generateMapIframe($latitude, $longitude) {
    $mapUrl = generateMapUrl($latitude, $longitude);
    
    // Generate the iframe HTML markup
    $iframe = <<<HTML
<div id="map-container" style="align-items: center;" class="container-fluid">
    <iframe
      width="100%"
      height="450"
      frameborder="1"
      style="border:0"
      loading="lazy"
      src="{$mapUrl}"
      allowfullscreen
    ></iframe>
</div>
HTML;

    return $iframe;
}

// Example usage:
$latitude =  $latitude?$latitude:null;
$longitude = $longitude?$longitude:null ;

echo generateMapIframe($latitude, $longitude);

?>
