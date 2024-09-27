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
                "resources/css/event/list.css",
                "resources/css/event/show.css",
                // SCSS
                "resources/scss/lib/bootstrap.scss",
                "resources/scss/layouts/app-layout.scss",
                "resources/scss/welcome.scss",
                "resources/scss/auth/login.scss",
                "resources/scss/auth/signup.scss",
                "resources/scss/donation-call/list.scss",
                "resources/scss/donation-call/detail.scss",
                "resources/scss/layouts/bo-layout.scss",
                "resources/scss/bo-dashboard.scss",
                "resources/scss/donation-call/list.bo.scss",
                // Javascript
                "resources/js/app.js",
                "resources/js/layouts/navbar.js",
                "resources/js/layouts/navbar.auth.js",
                "resources/js/layouts/bo-sidenav.js",
                "resources/js/components/filters-field.js",
                "resources/js/welcome.js",
                "resources/js/donation-call/list.js",
                "resources/js/donation-call/detail.js",
                "resources/js/donation-call/list.bo.js",
            ],
            refresh: true,
        }),
    ],
    corePlugins: {
        preflight: false,
    },
});
