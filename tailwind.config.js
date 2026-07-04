import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",

        // ✅ FIX: required so JS/Vue + dynamic modal classes work
        "./resources/js/**/*.js",
        "./resources/js/**/*.vue",
    ],

    safelist: [
        // --- Safelist Dynamic Event Colors ---
        "bg-[#4CBB17]/25",
        "bg-[#FF0398]/25",
        "bg-[#03CCFF]/25",

        "border-[#4CBB17]",
        "border-[#FF0398]",
        "border-[#03CCFF]",

        // ✅ FIXED hover class (Tailwind-safe)
        "hover:text-white",

        "hover:bg-transparent",
        "hover:border-white",
        // --- End Safelist ---
    ],

    theme: {
        extend: {
            colors: {
                club: "#66FF03",
                "club-hover": "#3D9612",
                "club-active": "#3D9612",

                league: "#FF0398",
                "league-hover": "#CC027A",
                "league-active": "#CC027A",

                training: "#03CCFF",
                "training-hover": "#02A3CC",
                "training-active": "#02A3CC",

                "brand-gray": "#71717A",
            },

            fontFamily: {
                sans: ["Archivo", ...defaultTheme.fontFamily.sans],
                heading: ["Bebas Neue", "sans-serif"],
            },

            borderWidth: {
                3: "3px",
            },
        },
    },

    plugins: [forms],
};