// Micro-interaction for scroll effects & Nav Background
window.addEventListener('scroll', () => {
    const nav = document.querySelector('nav');
    if (nav) {
        if (window.scrollY > 50) {
            nav.classList.add('bg-background/95', 'backdrop-blur-md', 'py-4');
            nav.classList.remove('bg-transparent', 'py-6');
        } else {
            nav.classList.remove('bg-background/95', 'backdrop-blur-md', 'py-4');
            nav.classList.add('bg-transparent', 'py-6');
        }
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
    const hero = document.getElementById('hero');
    if (hero) {
        hero.classList.add('hero-loaded');
    }
});

// Search Feature Implementation
function initSearch() {
    const searchTrigger = document.getElementById('search-trigger');
    const searchModal = document.getElementById('search-modal');
    const searchClose = document.getElementById('search-close');
    const searchInput = document.getElementById('search-input');
    const searchResultsContainer = document.getElementById('search-results-container');
    const searchResultsInfo = document.getElementById('search-results-info');
    const searchResultsCount = document.getElementById('search-results-count');
    const searchEmptyState = document.getElementById('search-empty-state');

    if (!searchTrigger || !searchModal) return;

    let allArticles = [];
    let isFetched = false;

    // Load articles from JSON
    async function loadArticles() {
        if (isFetched) return;
        try {
            const response = await fetch('data/content.json');
            allArticles = await response.json();
            isFetched = true;
        } catch (error) {
            console.error('Error fetching articles for search:', error);
        }
    }

    // Toggle Modal
    function openSearch() {
        searchModal.classList.remove('opacity-0', 'pointer-events-none');
        searchModal.classList.add('opacity-100', 'pointer-events-auto');
        document.body.classList.add('overflow-hidden');
        loadArticles();
        setTimeout(() => {
            if (searchInput) searchInput.focus();
        }, 100);
    }

    function closeSearch() {
        searchModal.classList.remove('opacity-100', 'pointer-events-auto');
        searchModal.classList.add('opacity-0', 'pointer-events-none');
        document.body.classList.remove('overflow-hidden');
        if (searchInput) searchInput.value = '';
        if (searchResultsContainer) searchResultsContainer.innerHTML = '';
        if (searchResultsInfo) searchResultsInfo.classList.add('hidden');
        if (searchEmptyState) searchEmptyState.classList.add('hidden');
    }

    searchTrigger.addEventListener('click', (e) => {
        e.preventDefault();
        openSearch();
    });

    if (searchClose) {
        searchClose.addEventListener('click', closeSearch);
    }

    // Close on Escape key press
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !searchModal.classList.contains('opacity-0')) {
            closeSearch();
        }
    });

    // Close on clicking outside search content container
    searchModal.addEventListener('click', (e) => {
        if (e.target === searchModal) {
            closeSearch();
        }
    });

    // Perform Search
    if (searchInput) {
        searchInput.addEventListener('input', () => {
            const query = searchInput.value.trim().toLowerCase();
            
            if (query === '') {
                if (searchResultsContainer) searchResultsContainer.innerHTML = '';
                if (searchResultsInfo) searchResultsInfo.classList.add('hidden');
                if (searchEmptyState) searchEmptyState.classList.add('hidden');
                return;
            }

            // Filter articles
            const filtered = allArticles.filter(article => {
                const titleMatch = article.title.toLowerCase().includes(query);
                const categoryMatch = article.category.toLowerCase().includes(query);
                const bodyMatch = article.isi.toLowerCase().includes(query);
                return titleMatch || categoryMatch || bodyMatch;
            });

            // Display results
            renderResults(filtered, query);
        });
    }

    // Render results
    function renderResults(results, query) {
        if (!searchResultsContainer) return;
        searchResultsContainer.innerHTML = '';
        
        if (results.length === 0) {
            if (searchResultsInfo) searchResultsInfo.classList.add('hidden');
            if (searchEmptyState) searchEmptyState.classList.remove('hidden');
            return;
        }

        if (searchEmptyState) searchEmptyState.classList.add('hidden');
        if (searchResultsCount) searchResultsCount.textContent = results.length;
        if (searchResultsInfo) searchResultsInfo.classList.remove('hidden');

        results.forEach(article => {
            const item = document.createElement('a');
            item.href = `news-detail.php?id=${article.id}`;
            item.className = 'flex items-center gap-6 p-4 border border-outline-variant hover:border-primary transition-all duration-300 group cursor-pointer bg-surface-container-low hover:bg-surface-container';
            
            // Format category badge
            const categoryBadge = article.category.toUpperCase();
            
            // Format title and body with highlights
            const highlightedTitle = highlightText(article.title, query);
            const highlightedBody = highlightText(article.isi, query);

            item.innerHTML = `
                <div class="w-20 md:w-32 aspect-video bg-surface-container overflow-hidden flex-shrink-0">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="${article.img}" alt="${article.title}">
                </div>
                <div class="flex-grow min-w-0">
                    <span class="inline-block bg-primary text-on-primary px-2 py-0.5 text-[10px] font-label-bold uppercase tracking-wider mb-2">${categoryBadge}</span>
                    <h4 class="font-headline-md text-base md:text-lg mb-1 text-white group-hover:text-primary transition-colors truncate">${highlightedTitle}</h4>
                    <p class="font-body-md text-xs md:text-sm text-on-surface-variant truncate">${highlightedBody}</p>
                </div>
                <span class="material-symbols-outlined text-primary group-hover:translate-x-1 transition-transform self-center">arrow_forward</span>
            `;

            searchResultsContainer.appendChild(item);
        });
    }

    // Helper to highlight matching text
    function highlightText(text, query) {
        if (!query) return text;
        const escapedQuery = query.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
        const regex = new RegExp(`(${escapedQuery})`, 'gi');
        return text.replace(regex, '<mark class="bg-primary text-background font-semibold px-0.5">$1</mark>');
    }
}

// Initialize immediately or on DOMContentLoaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSearch);
} else {
    initSearch();
}
