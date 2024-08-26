/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
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
    },
  },
  plugins: [],
}

