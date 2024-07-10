import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

export default (options = {}) => {
    return {
        init() {
            const defaultOptions = {
                container: this.$el.querySelector('.swiper-container'),
                autoplay: {
                    delay: 10000,
                    disableOnInteraction: false,
                },
                loop: true,
                parallax: false,
                mousewheel: false,
                keyboard: false,
                speed: 1200,
                navigation: {
                    nextEl: this.$refs.next,
                    prevEl: this.$refs.prev,
                },

                spaceBetween: 30,
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
}

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
