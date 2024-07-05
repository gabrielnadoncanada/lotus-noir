import { gsap } from 'gsap';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

window.Components = {};

window.Components.cursor = function cursor(options) {
    return {
        cursorPosition: {
            left: 0,
            top: 0,
        },
        init() {
            document.addEventListener('mousemove', this.move.bind(this), false);
            document.querySelectorAll('.default-link').forEach(link => {
                link.addEventListener('mouseenter', this.defaultLinkMouseEnter.bind(this));
                link.addEventListener('mouseleave', this.defaultLinkMouseLeave.bind(this));
            });

            document.querySelectorAll('.magnetic-link').forEach(link => {
                link.addEventListener('mouseenter', this.magneticLinkMouseEnter.bind(this));
                link.addEventListener('mouseleave', this.magneticLinkMouseLeave.bind(this));
            });
        },
        move(e) {
            this.cursorPosition.left = e.clientX;
            this.cursorPosition.top = e.clientY;

            document.querySelectorAll('.magnetic-link').forEach(single => {
                const triggerDistance = single.getBoundingClientRect().width / 2;

                const targetPosition = {
                    left: single.getBoundingClientRect().left +
                        single.getBoundingClientRect().width / 2,
                    top: single.getBoundingClientRect().top +
                        single.getBoundingClientRect().height / 2,
                };

                const distance = {
                    x: targetPosition.left - this.cursorPosition.left,
                    y: targetPosition.top - this.cursorPosition.top,
                };

                const angle = Math.atan2(distance.x, distance.y);
                const hypotenuse = Math.sqrt(
                    distance.x * distance.x + distance.y * distance.y,
                );

                if (hypotenuse < triggerDistance) {
                    gsap.to(single.querySelector('.magnetic-object'), {
                        duration: 0.4,
                        x: -(Math.sin(angle) * hypotenuse / 2),
                        y: -(Math.cos(angle) * hypotenuse / 2),
                    });
                } else {
                    gsap.to(this.$el, {
                        duration: 0.6,
                        left: this.cursorPosition.left - 20,
                        top: this.cursorPosition.top - 20,
                    });

                    gsap.to(single.querySelector('.magnetic-object'), {
                        duration: 0.4,
                        x: 0,
                        y: 0,
                    });
                }
            });
        },
        defaultLinkMouseEnter() {
            gsap.to(this.$el, { duration: 0.3, scale: 0.6 });
            gsap.to(this.$el, { duration: 0.3, opacity: 1 });
        },
        defaultLinkMouseLeave() {
            gsap.to(this.$el, { duration: 0.3, scale: 1 });
            gsap.to(this.$el, { duration: 0.3, opacity: 0.5 });
        },
        magneticLinkMouseEnter() {
            gsap.to(this.$el, { duration: 0.3, scale: 1.4 });
            gsap.to(this.$el, { duration: 0.3, opacity: 1 });
        },
        magneticLinkMouseLeave() {
            gsap.to(this.$el, { duration: 0.3, scale: 1 });
            gsap.to(this.$el, { duration: 0.3, opacity: 0.5 });
        },
    };
};

window.Components.swiper = function swiper(options = {}) {
    return {
        init() {
            const defaultOptions = {
                container: this.$el.querySelector('.swiper-container'),
                autoplay: {
                    delay: 10000,
                    disableOnInteraction: false,
                },
                loop: true,
                parallax: true,
                mousewheel: false,
                keyboard: false,
                speed: 1200,
                navigation: {
                    nextEl: this.$refs.next,
                    prevEl: this.$refs.prev,
                },
                watchOverflow: true,
                pagination: {
                    el: this.$refs.pagination,
                    clickable: true,
                },
            };
            options = deepMerge(defaultOptions, options);

            setTimeout(() => {
                new Swiper(options.container, options);
            }, 1000);

        },
    };
};

function deepMerge(target, source) {
    for (let key in source) {
        if (source[key] instanceof Object && key in target) {
            Object.assign(source[key], deepMerge(target[key], source[key]));
        }
    }
    // Join `target` and modified `source`
    Object.assign(target || {}, source);
    return target;
}
