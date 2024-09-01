import colors from "tailwindcss/colors";

/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.{html,js}", "./resources/**/*.blade.php"],
    theme: {
        extend: {
            colors: {
                primary: "#283179",
                secondary: "#efc600",
            },
        },
    },
    plugins: [],
};
