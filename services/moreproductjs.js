function searchProductNew(newSearchDTO, page, userId = null, isFeatured = null) {
    return new Promise((resolve, reject) => {
        // Construct the URL with query parameters
        let url = `http://localhost:8080/api/new-search-products?page=${page}&size=10`;
        if (userId !== null) {
          url += `&userId=${userId}`;
        }
        if (isFeatured !== null) {
          url += `&isFeatured=${isFeatured}`;
        }
      
        // Create a new XMLHttpRequest object
        let xhr = new XMLHttpRequest();
        
        // Configure the request
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
      
        // Define the callback function to handle the response
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              // Request successful, resolve the Promise with the response
              let response = JSON.parse(xhr.responseText);
              resolve(response);
            } else {
              // Request failed, reject the Promise with an error message
              reject('Error: ' + xhr.status);
            }
          }
        };
      
        // Send the request with the newSearchDTO object in the request body
        xhr.send(JSON.stringify(newSearchDTO),JSON.stringify(page));
    });
}
  
  // Example usage:
  let newSearchDTO = {
    // Construct your newSearchDTO object as needed
  };


  
