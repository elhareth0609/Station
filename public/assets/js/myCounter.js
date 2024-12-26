document.addEventListener('DOMContentLoaded', function() {
    // Function to format numbers with commas
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    // Function to animate counter
    function startCounter(element) {
        let endValue = parseInt(element.getAttribute('counter-number')) || 0;
        let prefix = element.getAttribute('counter-prefix') || '';
        let duration = 1000; // Faster duration
        let steps = 50; // Fewer steps for smoother animation
        let increment = endValue / steps;
        let current = 0;
        
        let timer = setInterval(function() {
            current += increment;
            if (current >= endValue) {
                current = endValue;
                clearInterval(timer);
            }
            element.textContent = prefix + formatNumber(Math.floor(current));
        }, duration / steps);
    }

    // Start all counters that have counter-number attribute
    document.querySelectorAll('[counter-number]').forEach(element => {
        startCounter(element);
    });
});