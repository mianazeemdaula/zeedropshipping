/** @type {import('tailwindcss').Config} */
export default {
  content: {
    files : [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    transformrelative: true,
    transform: (content) => content.replace(/taos:/g, ''),
  },
  theme: {
    extend: {
      fontFamily: {
        'zeefont': ['zeefont', 'sans-serif'],
        'calibrifont': ['calibrifont', 'sans-serif'],
        'Caveat': ['Caveat', 'cursive'],
      },
      colors: {
        'primary': {
          100: '#fde2e3',
          200: '#fab6b7',
          300: '#f48989',
          400: '#ee5a5d',
          500: '#EA3239', // base color
          600: '#d12b31',
          700: '#a32127',
          800: '#76171b',
          900: '#490c10',
        },
        'secondary': {
          50: '#ebebfa',
          100: '#d7d8f5',
          200: '#aeb0eb',
          300: '#8487e1',
          400: '#5b5fd7',
          500: '#3E3F98',
          600: '#353682',
          700: '#2b2c6b',
          800: '#222354',
          900: '#181a3d',
        },
      },
      screens: {
        print: { raw: 'print' },
        screen: { raw: 'screen' },
      },
      keyframes: {
        fadeInUp: {
          '0%': { opacity: '0', transform: 'translateX(-10px)' },
          '100%': { opacity: '1', transform: 'translateX(0)' },
        },
        slideIn: {
          '0%': { transform: 'translateX(100%)', opacity: '0' },
          '100%': { transform: ' translateX(0)', opacity: '1' },
        },
        slideOut: {
          '0%': { transform: 'translateX(0)' },
          '100%': { transform: 'translateX(-28px)' },
        },
        fadeInUp2: {
          '0%': { opacity: '0', transform: 'translateY(10px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        textDown: {
          '0%': { opacity: '0', transform: 'translateY(-20px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        textUp: {
          '0%': { opacity: '0', transform: 'translateY(20px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
      },
      animation: {
        fadeInUp: 'fadeInUp 1.5s linear forwards',
        fadeInUp2: 'fadeInUp2 1.5s linear forwards',
        slideIn: 'slideIn 5s linear  ',
        textDown: 'textDown 1s ease-out',
        textUp: 'textUp 1s ease-out forwards',
        animation: ' slideOut 2s ease-out forwards'
      },
      animationDirection: {
        'alternate': 'alternate',
        'reverse': 'reverse',
        'normal': 'normal',
        'initial': 'initial',
        'inherit': 'inherit'
      },
    },
  },
  plugins: [
    require('taos/plugin')
  ],
  safelist: [
    '!duration-[0ms]',
    '!delay-[0ms]',
    'html.js :where([class*="taos:"]:not(.taos-init))'
  ]
}

