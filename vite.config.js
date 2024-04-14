import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/scss/styles.scss",
                "resources/scss/bootstrap.scss",
                "resources/js/app.js",
                "resources/js/bootstrap.js",
            ],
            refresh: true,
        }),
    ],
});
