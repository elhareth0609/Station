// myShowerApp.js
class AppShowcase {
    constructor(version = 'v1') {
        this.version = version;
        this.currentIndex = 1;
        this.isAnimating = false;
        this.startX = 0;
        this.isSwiping = false;
        
        this.init();
    }

    init() {
        // Initialize slider for specified version
        this.slider = $(`#appScreensSlider-${this.version}`);
        this.images = [...this.slider.find('.screen img')].map(img => img.src);
        
        this.bindEvents();
    }

    bindEvents() {
        // Button click events
        this.slider.find('.nav-btn.prev-btn').on('click', () => this.moveSlider('prev'));
        this.slider.find('.nav-btn.next-btn').on('click', () => this.moveSlider('next'));

        // Screen click events
        this.slider.find('.screen').each((index, screen) => {
            $(screen).on('click', () => this.goToSlide(screen));
        });

        // Touch events
        this.slider.on('touchstart', (e) => {
            this.startX = e.touches[0].clientX;
            this.isSwiping = true;
        });

        if (this.version === 'v2') {
            this.slider.on('touchmove', (e) => {
                if (!this.isSwiping) return;
                
                const currentX = e.touches[0].clientX;
                const diff = this.startX - currentX;
                
                const screens = this.slider.find('.screen img');
                screens.each((index, img) => {
                    const isMain = $(img).closest('.screen').hasClass('screen-main');
                    $(img).css('transform', `translateX(${-diff * 0.1}px) scale(${isMain ? 1 : 0.8})`);
                });
            });
        }

        this.slider.on('touchend', (e) => {
            this.isSwiping = false;
            const endX = e.changedTouches[0].clientX;
            const diff = this.startX - endX;
            
            if (this.version === 'v2') {
                const screens = this.slider.find('.screen img');
                screens.each((index, img) => {
                    const isMain = $(img).closest('.screen').hasClass('screen-main');
                    $(img).css('transform', isMain ? 'scale(1)' : 'scale(0.8)');
                });
            }
            
            if (Math.abs(diff) > 50) {
                this.moveSlider(diff > 0 ? 'next' : 'prev');
            }
        });
    }

    getTargetIndex(clickedElement) {
        const screens = [...this.slider.find('.screen')];
        const clickedIndex = screens.indexOf(clickedElement);
        
        if (clickedIndex === 0) return (this.currentIndex - 1 + this.images.length) % this.images.length;
        if (clickedIndex === 2) return (this.currentIndex + 1) % this.images.length;
        return this.currentIndex;
    }

    goToSlide(targetElement) {
        if (this.isAnimating) return;
        
        const targetIndex = this.getTargetIndex(targetElement);
        if (targetIndex === this.currentIndex) return;

        const direction = targetIndex > this.currentIndex ? 'next' : 'prev';
        this.moveSlider(direction);
    }

    moveSlider(direction) {
        if (this.isAnimating && direction !== 'forced') return;
        this.isAnimating = true;
        
        const screens = this.slider.find('.screen');
        
        if (direction === 'next') {
            this.currentIndex = (this.currentIndex + 1) % this.images.length;
        } else if (direction === 'prev') {
            this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
        }
        
        screens.each((index, screen) => {
            const img = $(screen).find('img');
            const imgIndex = (this.currentIndex + index - 1 + this.images.length) % this.images.length;
            
            if (this.version === 'v1') {
                img.css('opacity', '0');
                setTimeout(() => {
                    img.attr('src', this.images[imgIndex]);
                    img.css('opacity', '1');
                }, 400);
            } else {
                // Version 2 animation
                img.css({
                    'transform': 'scale(0.6)',
                    'opacity': '0'
                });
                
                setTimeout(() => {
                    img.attr('src', this.images[imgIndex]);
                    
                    setTimeout(() => {
                        if (index === 1) { // main screen
                            img.css({
                                'transform': 'scale(1)',
                                'opacity': '1'
                            });
                        } else { // side screens
                            img.css({
                                'transform': 'scale(0.8)',
                                'opacity': '0.7'
                            });
                        }
                    }, 50);
                }, 400);
            }
        });

        setTimeout(() => {
            this.isAnimating = false;
        }, this.version === 'v1' ? 800 : 1200);
    }
}

// Usage:
// Initialize version 1
// const sliderV1 = new AppShowcase('v1');

// Initialize version 2
// const sliderV2 = new AppShowcase('v2');