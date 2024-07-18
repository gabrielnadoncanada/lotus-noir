import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';


/** @type {import('tailwindcss').Config} */


module.exports = {
    darkMode: ["class"],
    prefix: "",
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './app/Filament/Blocks/*.php',
        './config/blade-components.php',
        './app/helpers/Utilities.php'
    ],
    safelist: [
        {
            pattern: /col-span-+/,
            variants: ['sm', 'md', 'lg', 'xl'],
        },
        {
            pattern: /grid-cols-+/,
            variants: ['sm', 'md', 'lg', 'xl'],
        },
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['DIN Condensed', ...defaultTheme.fontFamily.sans],
            },
            screens: {
                "5xl": "1800px",
                "4xl": "1700px",
                "3xl": "1600px",
                "2xl": "1400px",
                "xl": "1200px",
                "lg": "992px",
                "md": "960px",
                "2sm": "768px",
                "sm": "576px",
                "xm": "340px"
            },
            spacing: {
                "2.5": "10px",
                "7.5": "30px",
                "12.5": "50px",
                "15": "60px",
                "17.5": "70px",
                "25": "100px",
                "30": "120px",
            },
            lineHeight: {
                "110": "110%",
                "120": "120%",
                "135": "135%",
                "160": "160%",
            },
            backgroundImage: {
                "overlay-liner": "linear-gradient(0deg, rgba(210, 224, 217, 0.55) 0%, rgba(210, 224, 217, 0.55) 100%)",
                "bottom-liner": "linear-gradient(180deg, rgba(0,0,0, .01) 14.06%, rgba(0,0,0, .7) 70.2%)",
                "white-liner": "linear-gradient(180deg, rgba(217, 217, 217, 0.00) -21.43%, #FFF 153.57%)",
                "underline-liner": "background-image: linear-gradient(180deg, transparent 65%, #fcf113 0)",
            },
            colors: {
                border: "var(--border)",
                background: "var(--background)",
                gray: "var(--rgba-color)",
                primary_rgba: "var(--primary-rgba)",
                secondary_rgba: "var(--secondary-rgba)",
                overlay: "var(--overlay)",
                primary: {
                    DEFAULT: "var(--primary)",
                    foreground: "var(--primary-foreground)",
                },
                secondary: {
                    DEFAULT: "var(--secondary)",
                    foreground: "var(--secondary-foreground)",
                },
                muted: {
                    DEFAULT: "var(--muted)",
                },
            },
            borderRadius: {
                lg: "var(--radius)",
                md: "calc(var(--radius) - 2px)",
                sm: "calc(var(--radius) - 4px)",
            },
            keyframes: {
                "slideDown": {
                    from: { transform: " translateY(-100%)" },
                    to: { transform: "translateY(0)" }
                },
                "accordion-down": {
                    from: { height: "0" },
                    to: { height: "var(--radix-accordion-content-height)" },
                },
                "accordion-up": {
                    from: { height: "var(--radix-accordion-content-height)" },
                    to: { height: "0" },
                },
                "dash": {
                    to: { "stroke-dashoffset": 0 }
                },
                "filling": {
                    "0%": {
                        "fill": "currentColor",
                        "fill-opacity": "0"
                    },
                    "90%": {
                        "fill": "currentColor",
                        "fill-opacity": "0"
                    },

                    "100%": {
                        "fill": "currentColor",
                        "fill-opacity": "0"
                    }
                }
            },
            transitionTimingFunction: {
                'out-expo': 'cubic-bezier(0.12, 0.72, 0.31, 0.65)',
            },
            animation: {
                "slideDown": "slideDown 0.35s ease-out",
                "accordion-down": "accordion-down 0.2s ease-out",
                "accordion-up": "accordion-up 0.2s ease-out",
                "text-line-animation": "dash 4s linear forwards, filling 4s ease-in forwards",
            },
        },
    },
    plugins: [require("tailwindcss-animate")],
};
