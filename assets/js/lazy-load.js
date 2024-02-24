window.addEventListener('DOMContentLoaded', function() {
    let lazyloadImages = document.querySelectorAll('img.lazy');
    let intersectionObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                let lazyImage = entry.target;
                lazyImage.src = lazyImage.dataset.src;
                lazyImage.classList.remove('lazy');
                observer.unobserve(lazyImage);
            }
        });
    });

    lazyloadImages.forEach(function(lazyImage) {
        intersectionObserver.observe(lazyImage);
    });
});
