<?php
$jsonOutput12 = [];
//print_r($subcategory);
foreach ($data as $inde1 => $prod) {
    if (is_array($prod)) {
        $catagoryscemapros = [];
        foreach ($prod as $inde => $onep) {
            if (is_array($onep) && isset($onep['productName'])) {
                $prodData = $onep;
                if(isset($prodData['images']) && count($prodData['images']) > 0){
                  $newsto = IMAGE_URL . $prodData['images'][0]['id'] . ".webp";
                }else{
                  $newsto = BASE_URL . "assets/images/TradersFind.webp";
                }
                $catagoryscemapros[] = [
                    "@type" => "ListItem",
                    "position" => $inde+1,
                    "name" => $prodData['productName'],
                    "url" => 'https://www.tradersfind.com/product/' . preg_replace('/[\s&]+/', "-", strtolower($prodData['productName'])) . '/' . urlencode($prodData['id']),
                    "image"=> $newsto
                ];
            }

        }

       // print_r($catagoryscemapros);
        // Encode the current category schema products into JSON without escaping slashes
        $jsonOutput12 =json_decode(json_encode($catagoryscemapros));
        break;
    }
}

$jsonOutput12 = json_encode($jsonOutput12, JSON_UNESCAPED_SLASHES);
//print_r($jsonOutput12);
// Construct the schema array
$schema = [
    "@context" => "https://schema.org",
    "@graph" => [
        [
            "@type" => "Organization",
            "@id" => "https://www.tradersfind.com/#organization",
            "name" => "Interconnect Marketing Management L.L.C",
            "url" => "https://www.tradersfind.com/seller/interconnect-marketing-management-llc",
            "sameAs" => [
                "https://www.facebook.com/tradersfindb2bportal/",
                "https://www.linkedin.com/company/tradersfind/",
                "https://x.com/tradersfind/"
            ],
            "logo" => [
                "@type" => "ImageObject",
                "@id" => "https://www.tradersfind.com/#logo",
                "url" => "https://www.tradersfind.com/assets/images/TradersFind.webp",
                "caption" => "Tradersfind.com by Interconnect Marketing Management L.L.C"
            ]
        ],
        [
            "@type" => "WebSite",
            "@id" => "https://www.tradersfind.com/#website",
            "url" => "https://www.tradersfind.com/#",
            "name" => "Tradersfind.com",
            "publisher" => [
                "@id" => "https://www.tradersfind.com/#organization"
            ],
            "potentialAction" => [
                "@type" => "SearchAction",
                "target" => "https://www.tradersfind.com/search/{search_term_string}",
                "query-input" => "required name=search_term_string"
            ]
        ],
        [
            "@type" => "WebPage",
            "@id" => "https://www.tradersfind.com/#webpage",
            "url" => "https://www.tradersfind.com",
            "inLanguage" => "en-US",
            "name" => "Tradersfind.com by Interconnect Marketing Management L.L.C",
            "isPartOf" => [
                "@id" => "https://www.tradersfind.com/#website"
            ],
            "about" => [
                "@id" => "https://www.tradersfind.com/#organization"
            ],
            "description" => "Interconnect Marketing Management L.L.C handles Tradersfind.com, which is the UAE's largest B2B Portal for businesses, products, and services. A smart and efficient way to Search, Find and Connect with Businesses in UAE."
        ],
        [
            "@type" => "BreadcrumbList",
            "itemListElement" => [
                [
                    "@type" => "ListItem",
                    "position" => 1,
                    "name" => "Home",
                    "item" => "https://www.tradersfind.com"
                ],
                [
                    "@type" => "ListItem",
                    "position" => 2,
                    "name" => $industry[0]->industryName,
                    "item" => "https://www.tradersfind.com/industry/" . preg_replace('/[&,\s]+/', '-', strtolower($industry[0]->industryName))
                ],
                [
                    "@type" => "ListItem",
                    "position" => 3,
                    "name" => $category[0]->categoryName,
                    "item" => "https://www.tradersfind.com/group-category/" . preg_replace('/[&,\s]+/', '-', strtolower($category[0]->categoryName))
                ],
                [
                    "@type" => "ListItem",
                    "position" => 4,
                    "name" => str_replace('-', ' ', ucwords($subcatName)),
                    "item" => "https://www.tradersfind.com/category/" . preg_replace('/[&,\s]+/', '-', $subcatName)
                ],
                ... (ucwords($location1) !== 'UAE' ? [[
                    "@type" => "ListItem",
                    "position" => 5,
                    "name" => ucwords($location1),
                    "item" => "https://www.tradersfind.com/category/" . preg_replace('/[&,\s]+/', '-', $subcatName) . '/' . preg_replace('/[\s&]+/', '-', $location1)
                ]] : [])
            ]
        ],
       [
            "@type" => "CollectionPage",
            "@id" => "https://www.tradersfind.com/category/" . preg_replace('/[&,\s]+/', '-', strtolower($subcatName)) . '#collectionpage',
            "name" => str_replace('-', ' ', ucwords($subcatName)),
            "description" => $subcategory->subCategoryDescription,
            "url" => "https://www.tradersfind.com/category/" . preg_replace('/[&,\s]+/', '-', strtolower($subcatName)) . ($location1 == "UAE" ? '' : '/' . preg_replace('/[&,\s]+/', '-', $location1))
       ],
        [
            "@type" => "ItemList",
            "itemListElement" => json_decode($jsonOutput12, true) // Decode JSON string to an array
        ]
    ]
];


//print_r($schema);
// Output the schema as a JSON string
//echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);




if($location1==null || $location1=='UAE' || !isset($subcategory->locations)){
  $SeoParams = [
    'title' => isset($subcategory->metaTitle) && $subcategory->metaTitle != '' ? str_replace('uae',$location1,strtolower($subcategory->metaTitle)) : $subcategory->subCategoryName . ' at best price in ' . $location1 . ' on Tradersfind.com',
    'metaTitle' => isset($subcategory->metaTitle) && $subcategory->metaTitle != '' ? str_replace('uae',$location1,strtolower($subcategory->metaTitle)) : $subcategory->subCategoryName . ' at best price in ' . $location1 . ' on Tradersfind.com',
    'metaDescription' => isset($subcategory->subCategoryDescription) && $subcategory->subCategoryDescription !='' ? str_replace('uae',$location1,strtolower($subcategory->subCategoryDescription)) : 'Searching for ' . $subcategory->subCategoryName . ' at best price in ' . $location1 . '? Choose from a wide range of companies provide' . $subcategory->subCategoryName . ' online on Tradersfind.com',
    'metaKeywords' => isset($subcategory->keywords) && $subcategory->keywords != '' ? str_replace('uae',$location1,strtolower($subcategory->keywords)) : $subcategory->subCategoryName . ', ' . $subcategory->subCategoryName . ' in '. $location1,
    'fbTitle' => isset($subcategory->fbTitle) && $subcategory->fbTitle !='' ? str_replace('uae',$location1,strtolower($subcategory->fbTitle)) : null,
    'fbDescription' => isset($subcategory->fbDescription) ? str_replace('uae',$location,strtolower($subcategory->fbDescription)) : null,
    'fbImage' => isset($subcategory->fbImage) ? $subcategory->fbImage : '',
    'fbUrl' => isset($subcategory->fbUrl) ? $subcategory->fbUrl : '',
    'twitterTitle' => isset($subcategory->twitterTitle) && $subcategory->twitterTitle !='' ? str_replace('uae',$location1,strtolower($subcategory->twitterTitle)) : null,
    'twitterDescription' => isset($subcategory->twitterDescription) ? $subcategory -> twitterDescription : null,
    'twitterImage' => isset($subcategory->twitterImage) ? $subcategory->twitterImage : null,
    'twitterSite' => isset($subcategory->twitterSite) ? $subcategory->twitterSite : '',
    'twitterCard' => isset($subcategory->twitterCard) ? $subcategory->twitterCard : null,
    'schemaDescription' => isset($subcategory->schemaDescription) ? $subcategory->schemaDescription : json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),
    ];

    }else{
    	$loc1 = '0';
      foreach($subcategory->locations as $Mlocation){
        
        if($Mlocation->location!=null && strtolower($Mlocation->location)==strtolower($location1)){
          $SeoParams=seoSeter($Mlocation,$location1,$subcategory,$schema);
	$loc1 = '1';
          break;
        }
      } 
	if ($loc1 == '0') {
	 $SeoParams=seoSeter($location1,$location1,$subcategory,$schema);
	}
        }
  
function seoSeter($Flocation,$location1,$subcategory,$schema){
         
  return  $SeoParams = [
            'title' => isset($Flocation->metatitle) && $Flocation->metatitle != '' ?$Flocation->metatitle : $subcategory->subCategoryName . ' at best price in ' . $location1. ' on Tradersfind.com',
            'metaTitle' => isset($Flocation->metatitle) && $Flocation->metatitle != '' ? $Flocation->metatitle : $subcategory->subCategoryName . ' at best price in ' . $location1 . ' on Tradersfind.com',
            'metaDescription' => isset($Flocation->description) && $Flocation->description !='' ? $Flocation->description : 'Searching for ' . $subcategory->subCategoryName . ' at best price in ' . $location1 . '? Choose from a wide range of companies provide' . $subcategory->subCategoryName . ' online on Tradersfind.com',
            'metaKeywords' => isset($Flocation->keyword) && $Flocation->keyword != '' ? $Flocation->keyword : $subcategory->subCategoryName . ', ' . $subcategory->subCategoryName . ' in '. $location1,
            'fbTitle' => isset($subcategory->fbTitle) && $subcategory->fbTitle !='' ? str_replace('uae',$location1,strtolower($subcategory->fbTitle)) : null,
            'fbDescription' => isset($subcategory->fbDescription) ? str_replace('uae',$location1,strtolower($subcategory->fbDescription)) : null,
            'fbImage' => isset($subcategory->fbImage) ? $subcategory->fbImage : '',
            'fbUrl' => isset($subcategory->fbUrl) ? $subcategory->fbUrl : '',
            'twitterTitle' => isset($subcategory->twitterTitle) && $subcategory->twitterTitle !='' ? str_replace('uae',$location1,strtolower($subcategory->twitterTitle)) : null,
            'twitterDescription' => isset($subcategory->twitterDescription) ? $subcategory -> twitterDescription : null,
            'twitterImage' => isset($subcategory->twitterImage) ? $subcategory->twitterImage : null,
            'twitterSite' => isset($subcategory->twitterSite) ? $subcategory->twitterSite : '',
            'twitterCard' => isset($subcategory->twitterCard) ? $subcategory->twitterCard : null,
            'schemaDescription' => isset($subcategory->schemaDescription) ? $subcategory->schemaDescription : json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),

            ];
           
        }
       
          ?> 