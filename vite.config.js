import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [tailwindcss()],
    build: {
        outDir: 'source/assets/build',
        emptyOutDir: true,
        manifest: true,
        rollupOptions: {
            input: 'source/_assets/js/main.js',
        },
    },
});
