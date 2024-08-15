import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "tailwindcss";
import autoprefixer from "autoprefixer";
import UnfontsBase from "unplugin-fonts";

const Unfonts = UnfontsBase.vite;

export default defineConfig({
    css: {
        postcss: {
            plugins: [tailwindcss, autoprefixer],
        },
    },
    plugins: [
        Unfonts({
            custom: {
                families: [
                    {
                        name: "storytella",
                        local: "storytella",
                        src: "./resources/fonts/storytella/*.ttf",
                    },
                    {
                        name: "Poppins",
                        local: "Poppins",
                        src: "./resources/fonts/poppins/*.ttf",
                    },
                    {
                        name: "Montserrat",
                        local: "Montserrat",
                        src: "./resources/fonts/montserrat/*.ttf",
                    },
                ],
            },
        }),
        laravel({
            input: [
                // CSS
                "resources/css/lib/tailwind.css",
                "resources/css/lib/fontawesome.css",
                // SCSS
                "resources/scss/lib/bootstrap.scss",
                "resources/scss/layouts/navbar.scss",
                "resources/scss/welcome.scss",
                "resources/scss/login.scss",
                "resources/scss/signup.scss",
                // Javascript
                "resources/js/app.js",
                "resources/js/layouts/navbar.js",
                "resources/js/layouts/navbar.auth.js",
            ],
            refresh: true,
        }),
    ],
    corePlugins: {
        preflight: false,
    },
});
