<?php
$schema = '{
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
      "url": "https://www.tradersfind.com/#",
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
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "https://www.tradersfind.com"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Furniture & Supplies",
          "item": "https://www.tradersfind.com/industry/furniture-supplies"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "Kitchen & Dining Furniture",
          "item": "https://www.tradersfind.com/group-category/kitchen-dining-furniture"
        },
        {
          "@type": "ListItem",
          "position": 4,
          "name": "Kitchen Racks",
          "item": "https://www.tradersfind.com/category/kitchen-racks"
        }
      ]
    },
    {
      "@type": "ItemList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "item": {
            "@type": "Product",
            "url": "https://www.tradersfind.com/product/kitchen-corner-rack/64e0b3ea3db0454195b7cc45",
            "name": "Kitchen Corner Rack",
            "image": "https://example.com/path/to/image.jpg",
            "description": "Maximize corner space with this versatile kitchen corner rack.",
            "brand": {
              "@type": "Brand",
              "name": "BrandName1"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 2,
          "item": {
            "@type": "Product",
            "url": "https://www.tradersfind.com/product/green-epoxy-wire-kitchen-shelf/65cf46dc5a9dc92cac556b48",
            "name": "Green Epoxy Wire Kitchen Shelf",
            "image": "https://example.com/path/to/image.jpg",
            "description": "Durable and stylish, perfect for storing dishes and kitchen supplies.",
            "brand": {
              "@type": "Brand",
              "name": "BrandName2"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 3,
          "item": {
            "@type": "Product",
            "url": "https://www.tradersfind.com/product/kitchen-wall-rack/65c5e44bb4987b39b7a64970",
            "name": "Kitchen Wall Rack",
            "image": "https://example.com/path/to/image.jpg",
            "description": "Save counter space with this wall-mounted kitchen rack.",
            "brand": {
              "@type": "Brand",
              "name": "BrandName3"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 4,
          "item": {
            "@type": "Product",
            "url": "https://www.tradersfind.com/product/kitchen-wall-rack/65c5e44bb4987b39b7a64970",
            "name": "Kitchen Wall Rack",
            "image": "https://example.com/path/to/image.jpg",
            "description": "Save counter space with this wall-mounted kitchen rack.",
            "brand": {
              "@type": "Brand",
              "name": "BrandName4"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 5,
          "item": {
            "@type": "Product",
            "url": "https://www.tradersfind.com/product/kitchen-wall-rack/65c5e44bb4987b39b7a64970",
            "name": "Kitchen Wall Rack",
            "image": "https://example.com/path/to/image.jpg",
            "description": "Save counter space with this wall-mounted kitchen rack.",
            "brand": {
              "@type": "Brand",
              "name": "BrandName5"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 6,
          "item": {
            "@type": "Product",
            "url": "https://www.tradersfind.com/product/kitchen-wall-rack/65c5e44bb4987b39b7a64970",
            "name": "Kitchen Wall Rack",
            "image": "https://example.com/path/to/image.jpg",
            "description": "Save counter space with this wall-mounted kitchen rack.",
            "brand": {
              "@type": "Brand",
              "name": "BrandName6"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 7,
          "item": {
            "@type": "Product",
            "url": "https://www.tradersfind.com/product/kitchen-wall-rack/65c5e44bb4987b39b7a64970",
            "name": "Kitchen Wall Rack",
            "image": "https://example.com/path/to/image.jpg",
            "description": "Save counter space with this wall-mounted kitchen rack.",
            "brand": {
              "@type": "Brand",
              "name": "BrandName7"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 8,
          "item": {
            "@type": "Product",
            "url": "https://www.tradersfind.com/product/kitchen-wall-rack/65c5e44bb4987b39b7a64970",
            "name": "Kitchen Wall Rack",
            "image": "https://example.com/path/to/image.jpg",
            "description": "Save counter space with this wall-mounted kitchen rack.",
            "brand": {
              "@type": "Brand",
              "name": "BrandName8"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 9,
          "item": {
            "@type": "Product",
            "url": "https://www.tradersfind.com/product/kitchen-wall-rack/65c5e44bb4987b39b7a64970",
            "name": "Kitchen Wall Rack",
            "image": "https://example.com/path/to/image.jpg",
            "description": "Save counter space with this wall-mounted kitchen rack.",
            "brand": {
              "@type": "Brand",
              "name": "BrandName9"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 10,
          "item": {
            "@type": "Product",
            "url": "https://www.tradersfind.com/product/kitchen-wall-rack/65c5e44bb4987b39b7a64970",
            "name": "Kitchen Wall Rack",
            "image": "https://example.com/path/to/image.jpg",
            "description": "Save counter space with this wall-mounted kitchen rack.",
            "brand": {
              "@type": "Brand",
              "name": "BrandName10"
            }
          }
        }
      ]
    }
  ]
}';

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
    'schemaDescription' => isset($subcategory->schemaDescription) ? $subcategory->schemaDescription : '',
    ];

    }else{
    	$loc1 = '0';
      foreach($subcategory->locations as $Mlocation){
        if(strtolower($Mlocation->location)==strtolower($location1)){
          $SeoParams=seoSeter($Mlocation,$location1,$subcategory);
	$loc1 = '1';
          break;
        }
      } 
	if ($loc1 == '0') {
	 $SeoParams=seoSeter($location1,$location1,$subcategory);
	}
        }

        function seoSeter($Flocation,$location1,$subcategory){
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
            'schemaDescription' => isset($subcategory->schemaDescription) ? $subcategory->schemaDescription : $schema,
            ];
        }
       
          ?> 