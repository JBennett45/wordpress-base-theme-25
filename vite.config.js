//vite.config.mjs
import { defineConfig } from 'vite';
import { resolve } from 'path';
// main JS, import SCSS into here //
const JS_FILE = resolve('src/js/scripts.js')
// Destination //
const BUILD_DIR = resolve(__dirname, 'assets/bundle');
// Vite config //
export default defineConfig({
  build: {
    assetsDir: '', // Will save the compiled JavaScript files in the root of the dist folder
    manifest: true, // Generate manifest.json file (for caching)
    emptyOutDir: true, // Empty the dist folder before building
    outDir: BUILD_DIR,
    rollupOptions: {
      input: JS_FILE,
    },
  },
  css: {
    preprocessorOptions: {
      scss: {
        api: 'modern-compiler' // or "modern"
      }
    }
  }
});