const btn = document.getElementById('menu-btn');
const links = document.getElementById('menu-links');
const img = document.getElementById('menu-img');
const citation = document.getElementById('citation');

btn.addEventListener('click', () => {
    links.classList.toggle('hidden');
    citation.classList.toggle('top-[60%]')
    if (links.classList.contains('hidden')) {
        img.src="/burger/burger.png";
    } else {
        img.src="/burger/close.png";
    }
})