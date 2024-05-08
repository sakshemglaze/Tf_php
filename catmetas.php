<?php
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
     
      foreach($subcategory->locations as $Mlocation){
        if(strtolower(isset($Sdlocation->location)?$Sdlocation->location:'')==strtolower($location1)){
          $SeoParams=seoSeter($Mlocation,$location1,$subcategory);
          
        }
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
            'schemaDescription' => isset($subcategory->schemaDescription) ? $subcategory->schemaDescription : '',
            ];
        }
       
          ?> 