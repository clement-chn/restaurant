const btn = document.getElementById('menu-btn');
const links = document.getElementById('menu-links');
const img = document.getElementById('menu-img');

btn.addEventListener('click', () => {
    links.classList.toggle('hidden');
    if (links.classList.contains('hidden')) {
        img.src="/burger/burger.png";
    } else {
        img.src="/burger/close.png";
    }
})

// burger.addEventListener('click', () => {
//     links.classList.toggle('show-links');
//     if (links.classList.contains('show-links')) {
//         console.log('cest le burger');
//         burger.src = 'icons/burger/close.png';
//     } else {
//         burger.src = "icons/burger/burger.png";
//     }
// })