import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "tailwindcss";
import autoprefixer from "autoprefixer";

export default defineConfig({
    css: {
        postcss: {
            plugins: [tailwindcss, autoprefixer],
        },
    },
    plugins: [
        laravel({
            input: [
                // CSS
                "resources/css/tailwind.css",
                "resources/css/fontawesome.css",
                // SCSS
                "resources/scss/bootstrap.scss",
                "resources/scss/login.scss",
                // Javascript
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
    corePlugins: {
        preflight: false,
    },
});
