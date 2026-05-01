// Typewriter effect for About page
const textElement = document.getElementById("typewriter");
const words = ["Web Developer", "Programmer"];
let wordIndex = 0;
let charIndex = 0;
let isDeleting = false;
let typeSpeed = 150;

function type() {
    const currentWord = words[wordIndex];
    
    if (isDeleting) {
        // Remove characters
        textElement.textContent = currentWord.substring(0, charIndex - 1);
        charIndex--;
        typeSpeed = 80; // Speed up when deleting
    } else {
        // Add characters
        textElement.textContent = currentWord.substring(0, charIndex + 1);
        charIndex++;
        typeSpeed = 150; // Standard typing speed
    }

    // Logic for when a word is finished or fully deleted
    if (!isDeleting && charIndex === currentWord.length) {
        isDeleting = true;
        typeSpeed = 2000; // Stay on the full word for 2 seconds
    } else if (isDeleting && charIndex === 0) {
        isDeleting = false;
        wordIndex = (wordIndex + 1) % words.length; // Move to the next word
        typeSpeed = 500; // Pause briefly before typing the new word
    }

    setTimeout(type, typeSpeed);
}

// Start the animation once the page loads
document.addEventListener("DOMContentLoaded", () => {
    if (textElement) {
        type();
    }
});
