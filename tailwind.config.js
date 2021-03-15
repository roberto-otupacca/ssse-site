const defaultTheme = require('tailwindcss/defaultTheme');
const disabledCss = {
    "h1": false,
    "h2": false,
    "h3": false,
    "h4": false,
    "h5": false,
    "h6": false,
    "h7": false,
    "h8": false
  }
  
module.exports = {
    purge: {
        content: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],
    
        // Queste opzioni non vengono tolte con npm run production (in blade sono usate programmativamente (es. 'bg-{{$color}}))
        options: {
            // safelist: [/^(sssegreen|sigred|seablue|fcyellow|sssebackground|light|lightest)$/],
            // safelist: [/(sssegreen)$/, /(sigred)$/],
        // safelist: [/(light)$/, /(lightest)$/, /(sigred)$/, /(seablue)$/, /(fcyellow)$/, /(sssegreen)$/],
              
        },
      },

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                sans: ['Helvetica Neue', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                    transparent: 'transparent',
                    current: 'currentColor',
                    sssegreen: {
                        darkest: '#0c8b31',
                        dark: '#0c8b31',
                        DEFAULT: '#0c8b31',
                        light: '#7ac891',
                        lightest: '#9BCAA9',
                    },
                    sigred: {
                        darkest: '#D53422',
                        dark: '#D53422',
                        DEFAULT: '#D53422',
                        light: '#B46565',
                        lightest: '#B46565',
                    },
                    seablue: {
                        darkest: '#116EAB',
                        dark: '#116EAB',
                        DEFAULT: '#116EAB',
                        light: '#6590B4',
                        lightest: '#6590B4',
                    },
                    fcyellow: {
                        darkest: '#F5AB06',
                        dark: '#F5AB06',
                        DEFAULT: '#F5AB06',
                        light: '#CDCC78',
                        lightest: '#CDCC78',
                    },
                    sssebackground: {
                        darkest: '#2d2d2d',
                        dark: '#A0A0A0',
                        DEFAULT: '#F0F0F0',
                        light: '#fff',
                        lightest: '#fff',
                    }
                },
            typography: {
                DEFAULT: { css: disabledCss },
                sm: { css: disabledCss },
                lg: { css: disabledCss },
                xl: { css: disabledCss },
                '2xl': { css: disabledCss },
                }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
        //require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/line-clamp'),
    ],

};
