module.exports = {
  purge: [
    './app/**/*.php', 
    './resources/**/*.php' 
  ],
  theme: {
    fontFamily: {
      'sans': ['Inter', 'Helvetica', 'Arial', 'sans-serif'],
    }, 
    extend: {
      spacing: {
        '44': '11rem'
      }
    },
  },
  variants: {},
  plugins: [],
}
