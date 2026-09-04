import '../css/app.css';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import type { DefineComponent } from 'vue';
import { createApp, defineAsyncComponent, h } from 'vue';
import { ZiggyVue } from 'ziggy-js';
import { initializeTheme } from './composables/useAppearance';

const appName = import.meta.env.VITE_APP_NAME || 'BKPSDM';

createInertiaApp({
  title: (title) => (title ? `${title} - ${appName}` : appName),
  resolve: (name) =>
    resolvePageComponent(
      `./pages/${name}.vue`,
      import.meta.glob<DefineComponent>('./pages/**/*.vue')
    ),
  setup({ el, App, props, plugin }) {
    const vueApp = createApp({ render: () => h(App, props) });

    vueApp.use(plugin);
    vueApp.use(ZiggyVue);

    // ApexCharts (~130 KB gzip) hanya dipakai di grafik statistik, jadi
    // dimuat terpisah dan tidak ikut menahan render halaman lain.
    vueApp.component(
      'apexchart',
      defineAsyncComponent(() => import('vue3-apexcharts')),
    );

    vueApp.mount(el);
  },
  progress: {
    // color: '#4B5563',
    color: '#0084D1',
  },
});

// This will set light / dark mode on page load...
initializeTheme();
