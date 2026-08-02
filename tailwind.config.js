// When you make changes, make sure and comment out public/build so that it will get the new compilation files

import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        // Blade views (your UI)
        "./resources/views/**/*.blade.php",

        // Laravel framework views (pagination etc.)
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",

        // Compiled Blade cache (optional but safe)
        "./storage/framework/views/*.php",

        // IMPORTANT: JS files (your modal + dynamic UI)
        "./resources/js/**/*.js",

        // IMPORTANT: Vue components (your AdminEditor + modal UI)
        "./resources/js/**/*.vue",

        // If you ever add more frontend structure later
        "./resources/**/*.blade.php",
    ],

    safelist: [
        // --- Safelist Dynamic Event Colors ---
        "bg-[#4CBB17]/25", // Club Event (Category 1)
        "bg-[#FF0398]/25", // League Event (Category 2)
        "bg-[#03CCFF]/25", // Training Event (Category 3)

        "border-[#4CBB17]",
        "border-[#FF0398]",
        "border-[#03CCFF]",

        "!hover:text-white",
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

                sp: {
                    prairieGreen: "#4F6954",
                    prairieOchre: "#B78A45",
                    goldenrod: "#D8B64C",
                    burntClay: "#9B5C3A",
                    warmIvory: "#F7F5F0",
                    limestone: "#E9E3D7",
                    charcoal: "#2E312E",
                    slate: "#66655F",
                    warmStone: "#CFC7B9",
                    success: "#4E7C59",
                    warning: "#C58C2A",
                    error: "#B44B42",
                    info: "#4D718F",
                }
            },

            fontFamily: {
                sans: ["Archivo", ...defaultTheme.fontFamily.sans],
                display: ["Bebas Neue", "sans-serif"],
            },

            borderWidth: {
                3: "3px",
            },
        },
    },

    plugins: [forms],
};