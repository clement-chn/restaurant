/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        paragraph: "'Hind Madurai', sans-serif",
        subtitle: "'Lora', serif",
        title: "'Montserrat', sans-serif",
        logo: "'Pinyon Script', cursive"
      },
      colors: {
        gold: '#906427',
        chocolate: '#392C1E',
        cream: '#B6AC97'
      }
    },
  },
  plugins: [],
}