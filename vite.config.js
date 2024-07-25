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
                "resources/css/lib/tailwind.css",
                "resources/css/lib/fontawesome.css",
                // SCSS
                "resources/scss/lib/bootstrap.scss",
                "resources/scss/navbar.scss",
                "resources/scss/login.scss",
                "resources/scss/signup.scss",
                // Javascript
                "resources/js/app.js",
                "resources/js/navbar.js",
            ],
            refresh: true,
        }),
    ],
    corePlugins: {
        preflight: false,
    },
});
