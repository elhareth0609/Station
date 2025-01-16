$(document).ready(function () {
    const $animatedElements = $('[data-anime]');

    const animateOnScroll = () => {
    const windowHeight = $('#content-wrapper').height();

    $animatedElements.each(function () {
        const $element = $(this);
        const elementTop = $element.offset().top;
        const elementBottom = elementTop + $element.outerHeight();

        // Debug values if needed
        // console.log('elementTop:', elementTop, 'windowHeight:', windowHeight);

        // Check if element is at least partially in viewport
        if (elementTop < windowHeight * 0.9 && elementBottom > 0) {
        const delay = $element.attr('data-anime-delay') || 0;
        setTimeout(() => {
            $element.addClass('animated');
        }, delay);
        }
    });
};

// Initial check
setTimeout(animateOnScroll, 100); // Small delay to ensure proper calculation

// Throttle scroll event for better performance
let scrollTimeout;
$('#content-wrapper').on('scroll', function () {
    if (scrollTimeout) {
        cancelAnimationFrame(scrollTimeout);
    }
    scrollTimeout = requestAnimationFrame(() => {
        animateOnScroll();
    });
});
});