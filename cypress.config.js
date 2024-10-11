import { defineConfig } from "cypress";

export default defineConfig({
  e2e: {
    baseUrl: 'http://laravel-ecommerce.test/',
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },
});
