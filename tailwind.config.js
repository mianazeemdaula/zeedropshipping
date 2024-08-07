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
          100: '#e0f2fe',
          200: '#b9e6fd',
          300: '#8ad5fc',
          400: '#57bbf9',
          500: '#2196f3',
          600: '#1e85e5',
          700: '#046AB4', // base color
          800: '#034f86',
          900: '#02365f',
        },
      },
    },
  },
  plugins: [],
}

