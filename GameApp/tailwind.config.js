/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./screen/**/*.{js,jsx,ts,tsx}"
  ],
  theme: {
    extend: {
      fontFamily: {
        PoppinsBlack: ["./assets/fonts/Poppins-Black.ttf"],
      },
    },
  },
  plugins: [],
}

