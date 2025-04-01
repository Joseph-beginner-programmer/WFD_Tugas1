import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],

    theme: {
        extend: {
          colors: {
            main: "#000000",
            tahiti: "#3ab7bf",
            bermuda: "#78dcca",
          },
          screens: {
            // Your custom breakpoints
            'tablet': '992px',
            'laptop': '1200px',
            'desktop': '1600px',
          }
        },
      },
});
