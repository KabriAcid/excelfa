import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    build: {
        // Generate stable hashes for better caching
        rollupOptions: {
            output: {
                manualChunks: {
                    // Split vendor code for better caching
                    vendor: ["axios"],
                },
            },
        },
        // Increase chunk size warning limit
        chunkSizeWarningLimit: 1000,
        // Enable CSS code splitting
        cssCodeSplit: true,
    },
    server: {
        hmr: {
            host: "localhost",
        },
    },
});
