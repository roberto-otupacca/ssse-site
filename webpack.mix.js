const mix = require('laravel-mix');

mix.setResourceRoot("../");

// Compilazione Tailwind
mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
                                                    require('postcss-import'),
                                                    require('tailwindcss'),
                                                    require('autoprefixer'),
                                                    ])
    .version(); // Aggiunge un hash per il versionamento

// Compilazione Fontawesome (non si può mettere insieme a Tailwind per colpa di post-import incompatibile)
mix.js('resources/js/app2.js', 'public/js')
    .postCss('resources/css/fontawesome.css', 'public/css', [ ])
    .version(); // Aggiunge un hash per il versionamento

mix.styles( [   
            'public/css/app.css',
            'public/css/fontawesome.css',
            'node_modules/flickity/dist/flickity.css', // Carousel in prima pagina
            'resources/css/site.css', // Css specifico per il sito (line-underline, ...)
            // 'node_modules/aos/dist/aos.css', // Animazioni card, ecc.
], 'public/css/all.css');

mix.scripts([
            'public/js/app.js',
            'node_modules/flickity/dist/flickity.pkgd.js', // Carousel in prima pagina
            'resources/js/site.js', // Javascript specifico per il sito (carousel, ...)
], 'public/js/all.js');

// mix.copy('node_modules/font-awesome/fonts/*', 'public/fonts/');

// mix.copyDirectory('resources/img', 'public/img');


