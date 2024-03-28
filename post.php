<?php
include_once 'config.php';
function getItem($item) {
               
               $value = $_COOKIE[$item] ?? null;
               if ($value !== null) {
                   $decodedValue = json_decode($value, true);
                   return json_last_error() === JSON_ERROR_NONE ? $decodedValue : $value;
               } else {
                   return $value;
               }
          return null;
       }
        
       function post($url, $request, $observeResponseFlag = false, $queryParams = null, $authRequired = false, $responseType = null) {
        $token = getItem("userAccessToken");
    
        $headers = array(
            'Content-Type: application/json'
        );
        if ($authRequired) {
            $headers[] = 'Authorization: Bearer ' . $token;
        }
    
        // Append query parameters to URL if provided
        if ($queryParams) {
            $url .= '?' . http_build_query($queryParams);
        }
    
        $ch = curl_init(API_URL . $url);
    
        $postData = json_encode($request);
    
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $data=json_decode($response);
        if ($responseType === 'json') {
            // Decode JSON response
            $decodedResponse = json_decode($response, true);
            return $decodedResponse;
        }
    
        return $data;
    }
    

       function get($url, $observeResponseFlag = false, $queryParams = null, $authRequired = false, $responseType = null) {
       
        $token = getItem("userAccessToken");
        
        $headers = array(
            'Content-Type: application/json',
            'Access-Control-Expose-Headers: error'
        );
       
        if ($authRequired) {
            $headers[] = 'Authorization: Bearer ' . $token;
        }
        
        // Initialize request parameters
        $query = '';
        if ($queryParams) {
            $query = http_build_query($queryParams);
        }
        
        // Construct URL with query parameters if provided
       // $urlWithQuery = 'http://localhost:8080/'.$url;
        $urlWithQuery = API_URL . $url;
        if ($query) {
            $urlWithQuery .= '?' . $query;
        }
        
        // Initialize context options
        $contextOptions = [
            'http' => [
                'method' => 'GET',
                'header' => implode("\r\n", $headers)
            ]
        ];
        
      
        if ($observeResponseFlag) {
            $contextOptions['http']['header'] .= "\r\n" . 'observe: response';
        }
        if ($responseType) {
        
        }
        
        
        $context = stream_context_create($contextOptions);
        
      
        $response = @file_get_contents($urlWithQuery, false, $context);
        
        
        if ($response === false) {
            return "Error fetching data";
        } else {
            return $response;
        }
    }
   
   
    
       ?>