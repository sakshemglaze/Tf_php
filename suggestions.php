<?php
 function autoCompleteSearch($searchText) {
   
    if (
      $searchText &&
      trim($searchText) != "" &&
      strlen(trim($searchText)) > 1 &&
      strlen($searchText) > 2
    ) {
        
        $res = get('api/search-suggestions' . '?searchText=' . $searchText,
        true,
        null,
        false);
       
        print_r($resBody);
        
       
}
 }

 if (isset($_GET['searchText'])) {
    $searchText = $_GET['searchText'];

    // Call autoCompleteSearch function to get suggestions
    $suggestions = autoCompleteSearch($searchText);

    // Output suggestions as JSON
    echo json_encode($suggestions);
}
?>
