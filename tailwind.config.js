/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/**/*.{html,js}",
  ],
  theme: {
    extend: {
      fontFamily:{
        questrial: "'Questrial', sans",
      }
    },
    colors:{
      'principal': '#253536',
      'violeta': '#520595',
      'violeta-light': '#a634ec',
      'naranja': '#ff6243',
      'azul': '#0244b7',
      'azul-light': '#047df0'
    },
  },
  plugins: [],
}
