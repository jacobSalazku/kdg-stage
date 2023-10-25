import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            "p-black": "#1D1D1B",
            "deep-black": "#0C090A",
            "kdg-white": "#FFFFFF",
            "kdg-blue": "#80CEE1",
            "kdg-dark-blue": "#779ecb",
            "kdg-grey": "#D8DFE5",
            "kdg-light": "#F5F5F5",
            ggrey: "#808080",
        },
    },

    plugins: [forms],
};
