import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            darkMode: "class",
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                dark: {
                    100: "#1a1a1a",
                    200: "#2d2d2d",
                    300: "#3d3d3d",
                    400: "#525252",
                    500: "#737373",
                    600: "#a3a3a3",
                    700: "#d4d4d4",
                    800: "#f5f5f5",
                },
            },
        },
    },
    plugins: [],
};
