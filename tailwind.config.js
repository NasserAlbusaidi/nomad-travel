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
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
                display: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "ocean-blue": "#0A4D68",
                "sandstone": "#F4EAD5",
                "terracotta": "#D9534F",
                "charcoal": "#212529",
                "off-white": "#F8F9FA",
                "brand-blue": "#2c5b6d", // The dark teal from the card header
                "brand-sand": "#f3e9d2", // The sand color from the Wahiba card
                "brand-sky": "#42a5f5", // The blue from the Snorkeling card
                "brand-green": "#28a745", // The green for "Free cancellation"
            },
        },
    },

    plugins: [forms],
};
