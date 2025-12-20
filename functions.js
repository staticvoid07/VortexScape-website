function formatName(name) {
    if (!name) return "";
    let formatted = name.replace(/_/g, ' ');
    return formatted.replace(/\b\w/g, char => char.toUpperCase());
}

document.querySelectorAll('.learn-more').forEach(el => {
    const summary = el.querySelector('summary');
    const content = el.querySelector('.details-content');

    summary.addEventListener('click', (e) => {
        if (el.open) {
            // If it's open and we click, prevent it from closing immediately
            e.preventDefault();
            el.classList.add('is-closing');
            
            // Wait for the 0.4s animation to finish, then close it
            setTimeout(() => {
                el.removeAttribute('open');
                el.classList.remove('is-closing');
            }, 400); 
        }
    });
});