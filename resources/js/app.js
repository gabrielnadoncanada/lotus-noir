import './components';
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

Alpine.plugin(intersect);
gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', () => {
    let scroll = false;
    let scrollHeight = 0;

    const WP_BLOCK_COVER_SELECTOR = '.wp-block-cover';
    const WP_BLOCK_COVER_IMAGE_BACKGROUND_SELECTOR = '.wp-block-cover__image-background.has-parallax';
    const PARALLAX_IMGS_SELECTOR = '.parallax-imgs';
    const SCROLL_TRIGGER_START = 'top bottom';
    const SCROLL_TRIGGER_END = 'bottom top';
    const ANIMATION_DURATION = 1.2;
    const ANIMATION_EASE = 'none';
    const SCROLL_Y_THRESHOLD = 200;
    const PARALLAX_MOVEMENT_VALUES = [500, 450, 500, 425, 450, 450, 500, 400, 500, 475, 500, 450];

    const animateContainers = document.querySelectorAll('[data-animated-container]');

    const initLenis = () => {
        const lenis = new Lenis({
            duration: ANIMATION_DURATION,
            easing: t => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        });

        const raf = (time) => {
            lenis.raf(time);
            ScrollTrigger.update();
            requestAnimationFrame(raf);
        };

        requestAnimationFrame(raf);

        return lenis;
    };

    const initCoverAnimations = () => {
        const cards = document.querySelectorAll(WP_BLOCK_COVER_SELECTOR);

        cards.forEach(card => {
            const imageBackground = card.querySelector(WP_BLOCK_COVER_IMAGE_BACKGROUND_SELECTOR);
            gsap.to(imageBackground, {
                yPercent: 15,
                ease: ANIMATION_EASE,
                scrollTrigger: {
                    trigger: card,
                    start: SCROLL_TRIGGER_START,
                    end: SCROLL_TRIGGER_END,
                    scrub: true,
                },
            });
        });
    };

    const initTextAnimations = () => {
        animateContainers.forEach(container => {
            const animatedText = container.querySelector('[data-animated-text]');

            if (animatedText) {
                ScrollTrigger.create({
                    trigger: container,
                    start: 'top 90%',
                    end: 'bottom 0%',
                    onUpdate: self => {
                        const progress = self.progress;
                        const scrollValue = scroll
                            ? `${gsap.utils.interpolate(0, 15, progress)}%`
                            : `${gsap.utils.interpolate(0, scrollHeight / 3, progress)}px`;

                        gsap.to(animatedText, {
                            x: scrollValue,
                            duration: 1,
                            ease: 'power1.out',
                        });
                    },
                });
            }
        });
    };

    const initParallaxImages = () => {
        const parallaxImgs = document.querySelector(PARALLAX_IMGS_SELECTOR);
        if (parallaxImgs) {
            const tlParallaxImgs = gsap.timeline({
                scrollTrigger: {
                    trigger: PARALLAX_IMGS_SELECTOR,
                    start: 'top center',
                    end: 'bottom top',
                    scrub: 2,
                },
            });

            gsap.utils.toArray(`${PARALLAX_IMGS_SELECTOR} .wp-block-image`).forEach((layer, index) => {
                const movement = PARALLAX_MOVEMENT_VALUES[index];
                tlParallaxImgs.to(layer, { y: movement, ease: ANIMATION_EASE }, 0);
            });
        }
    };

    const handleScroll = () => {
        if (window.scrollY > SCROLL_Y_THRESHOLD) {
            scroll = true;
        } else {
            scrollHeight = window.scrollY;
            scroll = false;
        }
    };

    const lenis = initLenis();
    initCoverAnimations();
    initTextAnimations();
    initParallaxImages();

    document.addEventListener('scroll', handleScroll);

    return () => {
        lenis.destroy();
    };
});
