import { resolve } from 'path'

export default {
  root: resolve(__dirname, 'src/resources/client'),
  build: {
    outDir: '../dist'
  },
  server: {
    port: 8080
  },
  // Optional: Silence Sass deprecation warnings. See note below.
  css: {
    preprocessorOptions: {
      scss: {
        silenceDeprecations: [
          'import',
          'mixed-decls',
          'color-functions',
          'global-builtin',
        ],
      },
    },
  },
}