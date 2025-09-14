import isHTMLElement from "./helpers/isHTMLElement";

// Toggle mobile menu
function toggleMobileMenu() : void {
    const menu: HTMLElement | null = document.getElementById('mobileMenu');
    const hamburger: HTMLElement | null = document.getElementById('hamburgerIcon');
    const close: HTMLElement | null = document.getElementById('closeIcon');

    menu?.classList.toggle('hidden');
    hamburger?.classList.toggle('hidden');
    close?.classList.toggle('hidden');
}

// Toggle user dropdown
function toggleDropdown() : void {
    const dropdown: HTMLElement | null = document.getElementById('userDropdown');
    dropdown?.classList.toggle('hidden');
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event): void {
    const dropdown = document.getElementById('userDropdown');

    if (isHTMLElement(event.target)) {
        const button = event.target.closest('button[onclick="toggleDropdown()"]');

        if (!button && !dropdown?.contains(event.target)) {
            dropdown?.classList.add('hidden');
        }
    }
});


export { toggleMobileMenu, toggleDropdown };