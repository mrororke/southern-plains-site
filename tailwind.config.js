// When you make changes, make sure and comment out public/build so that it will get the new compilation files

import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    safelist: [
        // --- Safelist Dynamic Event Colors ---
        // Safelist background colors for dynamic category classes (1, 2, 3)
        "bg-[#4CBB17]/25", // Club Event (Category 1)
        "bg-[#FF0398]/25", // League Event (Category 2)
        "bg-[#03CCFF]/25", // Training Event (Category 3)

        // Safelist border colors if you use them dynamically (not required for current classes)
        "border-[#4CBB17]",
        "border-[#FF0398]",
        "border-[#03CCFF]",
        // Safelist the IMPORTANT hover text color fix
        "!hover:text-white",
        // Safelist the hover backgrounds for dark themes (bg-transparent is usually fine, but safe to include)
        "hover:bg-transparent",
        "hover:border-white",
        "col-span-4",
        "col-span-5",
        // --- End Safelist ---
    ],

    theme: {
        extend: {
            colors: {
                // Add your custom brand color here
                club: "#66FF03",
                "club-hover": "#3D9612",
                "club-active": "#3D9612",
                "league": "#FF0398",
                "league-hover": "#CC027A",
                "league-active": "#CC027A",
                training: "#03CCFF",
                "training-hover": "#02A3CC",
                "training-active": "#02A3CC",
                "brand-gray" : "#71717A",
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
