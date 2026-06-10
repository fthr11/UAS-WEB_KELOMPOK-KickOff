// Micro-interaction for scroll effects & Nav Background
window.addEventListener('scroll', () => {
    const nav = document.querySelector('nav');
    if (window.scrollY > 50) {
        nav.classList.add('bg-background/95', 'backdrop-blur-md', 'py-4');
        nav.classList.remove('bg-transparent', 'py-6');
    } else {
        nav.classList.remove('bg-background/95', 'backdrop-blur-md', 'py-4');
        nav.classList.add('bg-transparent', 'py-6');
    }
});

// Intersection Observer for Scroll Reveal
const revealCallback = (entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
            observer.unobserve(entry.target);
        }
    });
};

const revealObserver = new IntersectionObserver(revealCallback, {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
});

document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

// Hero staggered animation on load
window.addEventListener('DOMContentLoaded', () => {
    document.getElementById('hero').classList.add('hero-loaded');
});
