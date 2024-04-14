import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/scss/styles.scss",
                "resources/scss/blog-styles.scss",
                "resources/js/app.js",
                "resources/js/blog-app.js",
            ],
            refresh: true,
        }),
    ],
});
