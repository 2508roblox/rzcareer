/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/views/livewire/chat/**/*.blade.php"],
    theme: {
        extend: {},
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
