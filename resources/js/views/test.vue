<template>
  <aside class="flex">
    <div class="flex-grow flex flex-col justify-between text-cyan-500">
      <nav class="flex flex-col mx-4 my-6 space-y-4">
        <RouterLink :to="{ name: 'myOffers' }" class="inline-flex items-center justify-center py-3 hover:text-blue-700 hover:bg-white focus:text-blue-700 focus:bg-white rounded-lg">
          <span class="sr-only">Mes Offres</span>
          <svg fill="#00458B" class="h-6 w-6" viewBox="-4.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <title>Mes Offres</title>
            <path d="M11.24 14.76c0.88-0.8 1.44-2 1.44-3.28 0-2.48-2-4.48-4.48-4.48s-4.48 2-4.48 4.48c0 1.32 0.56 2.48 1.44 3.28-1 0.36-1.88 0.92-2.64 1.72-2.68 2.88-2.52 7.52-2.52 7.72 0.040 0.48 0.4 0.84 0.88 0.8s0.8-0.4 0.8-0.88c0-0.040-0.16-4.12 2.12-6.52 1.080-1.12 2.56-1.72 4.44-1.72 1.84 0 3.32 0.56 4.4 1.68 2.28 2.36 2.12 6.48 2.12 6.52-0.040 0.48 0.32 0.84 0.8 0.88 0 0 0.040 0 0.040 0 0.44 0 0.8-0.36 0.84-0.8 0-0.2 0.2-4.84-2.6-7.72-0.72-0.76-1.6-1.32-2.6-1.68zM5.44 11.48c0-1.52 1.24-2.8 2.8-2.8s2.8 1.24 2.8 2.8c0 1.52-1.24 2.8-2.8 2.8s-2.8-1.28-2.8-2.8zM21.4 13.36c-0.4-0.44-0.88-0.76-1.4-1 0.44-0.56 0.72-1.24 0.72-2 0-1.76-1.4-3.16-3.16-3.16s-3.16 1.4-3.16 3.16c0 0.76 0.28 1.44 0.72 2-0.4 0.2-0.8 0.44-1.12 0.76-0.36 0.32-0.36 0.84-0.080 1.2 0.32 0.36 0.84 0.36 1.2 0.080 0.64-0.56 1.44-0.84 2.44-0.84 1.12 0 1.96 0.32 2.6 1 1.36 1.44 1.28 3.92 1.28 3.96-0.040 0.48 0.32 0.84 0.8 0.88 0 0 0.040 0 0.040 0 0.44 0 0.8-0.36 0.84-0.8 0.040-0.16 0.12-3.28-1.72-5.24zM16.080 10.4c0-0.8 0.68-1.48 1.48-1.48s1.48 0.68 1.48 1.48-0.68 1.48-1.48 1.48c-0.8 0-1.48-0.68-1.48-1.48z"></path>
          </svg>
        </RouterLink>
        <RouterLink :to="{ name: 'myInterests' }" class="inline-flex items-center justify-center py-3 hover:text-blue-700 hover:bg-white focus:text-blue-700 focus:bg-white rounded-lg">
          <span class="sr-only">Mes interets</span>
          <svg class="h-6 w-6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
            viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
            <title>Mes interets</title>
          <path fill="#00458B" d="M9.037,40.763h4.286c0.552,0,1-0.447,1-1v-7.314c0-0.553-0.448-1-1-1H9.037c-0.552,0-1,0.447-1,1v7.314
            C8.037,40.315,8.485,40.763,9.037,40.763z M10.037,33.448h2.286v5.314h-2.286V33.448z"/>
          <path fill="#00458B" d="M21.894,40.763c0.552,0,1-0.447,1-1v-20.64c0-0.553-0.448-1-1-1h-4.286c-0.552,0-1,0.447-1,1v20.64
            c0,0.553,0.448,1,1,1H21.894z M18.608,20.123h2.286v18.64h-2.286V20.123z"/>
          <path fill="#00458B" d="M30.465,40.763c0.552,0,1-0.447,1-1V25.96c0-0.553-0.448-1-1-1H26.18c-0.552,0-1,0.447-1,1v13.803
            c0,0.553,0.448,1,1,1H30.465z M27.18,26.96h2.286v11.803H27.18V26.96z"/>
          <path fill="#00458B" d="M33.751,9.763v30c0,0.553,0.448,1,1,1h4.286c0.552,0,1-0.447,1-1v-30c0-0.553-0.448-1-1-1h-4.286
            C34.199,8.763,33.751,9.21,33.751,9.763z M35.751,10.763h2.286v28h-2.286V10.763z"/>
          </svg>
        </RouterLink>
        <RouterLink :to="{ name: 'addOffer' }" class="inline-flex items-center justify-center py-3 hover:text-blue-700 hover:bg-white focus:text-gray-400 focus:bg-gray-700 rounded-lg">
          <span class="sr-only">Nouvelle Offre</span>
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
        </RouterLink>
        <RouterLink to="" class="inline-flex items-center justify-center py-3 hover:text-blue-700 hover:bg-white focus:text-gray-400 focus:bg-gray-700 rounded-lg">
          <span class="sr-only">Documents</span>
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
          </svg>
        </RouterLink>
      </nav>
    </div>
  </aside>
  <RouterView />
</template>