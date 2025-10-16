function isMobilelod2() {
    return /android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos/i.test(navigator.userAgent);
  }

function searchProductNew(newSearchDTO, page, userId = null, isFeatured = null) {

    let checkholder=isMobilelod2();

    let sizeformob;
    if(checkholder){
      sizeformob=5;
    }else{
      sizeformob=10;
    }
    return new Promise((resolve, reject) => {
        let url = `https://api.tradersfind.com/api/new-search-products?page=${page}&size=${sizeformob}`; if (userId !== null) { url += `&userId=${userId}` }
        if (isFeatured !== null) { url += `&isFeatured=${isFeatured}` }
        let xhr = new XMLHttpRequest(); xhr.open('POST', url, !0); xhr.setRequestHeader('Content-Type', 'application/json'); xhr.onreadystatechange = function () { if (xhr.readyState === XMLHttpRequest.DONE) { if (xhr.status === 200) { let response = JSON.parse(xhr.responseText); resolve(response) } else { reject('Error: ' + xhr.status) } } }; xhr.send(JSON.stringify(newSearchDTO), JSON.stringify(page))
    })
}
let newSearchDTO = {}