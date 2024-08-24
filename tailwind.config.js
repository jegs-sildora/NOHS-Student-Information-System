/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        "poppins": ["Poppins", "system-ui"]
      },
      colors:{
        maroon:{
          100: "#F2CCCC",
          200: "#E69A9A",
          300: "#D96666",
          400: "#CC3333",
          500: "#9C0000",
          600: "#990000",
          700: "#730000",
          800: "#4D0000",
          900: "#260000",
        } 
      },
      textStroke: {
        xsm: '0.5px',
        sm: '1px',
        md: '2px',
        lg: '3px',
      },
      textStrokeColor: {
        white: '#FFFFFF'
      }
    },
  },
  variants: {},
  plugins: [
    function ({ addUtilities }){
      const newUtilities = {
        '.text-stroke-xsm': {
          '-webkit-text-stroke-width': '0.5px',
        },
        '.text-stroke-sm': {
          '-webkit-text-stroke-width': '1px',
        },
        '.text-stroke-md': {
          '-webkit-text-stroke-width': '2px',
        },
        '.text-stroke-lg': {
          '-webkit-text-stroke-width': '3px',
        },
        '.text-stroke-black': {
          '-webkit-text-stroke-color': '#000000',
        },
        '.text-stroke-white': {
          '-webkit-text-stroke-color': '#ffffff',
        },
      };
      
      addUtilities(newUtilities, ['responsive', 'hover']);
    }
  ],
}