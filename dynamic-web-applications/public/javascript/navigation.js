"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.toggleDropdown = exports.toggleMobileMenu = void 0;
const isHTMLElement_1 = __importDefault(require("./helpers/isHTMLElement"));
// Toggle mobile menu
function toggleMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    const hamburger = document.getElementById('hamburgerIcon');
    const close = document.getElementById('closeIcon');
    menu === null || menu === void 0 ? void 0 : menu.classList.toggle('hidden');
    hamburger === null || hamburger === void 0 ? void 0 : hamburger.classList.toggle('hidden');
    close === null || close === void 0 ? void 0 : close.classList.toggle('hidden');
}
exports.toggleMobileMenu = toggleMobileMenu;
// Toggle user dropdown
function toggleDropdown() {
    const dropdown = document.getElementById('userDropdown');
    dropdown === null || dropdown === void 0 ? void 0 : dropdown.classList.toggle('hidden');
}
exports.toggleDropdown = toggleDropdown;
// Close dropdown when clicking outside
document.addEventListener('click', function (event) {
    const dropdown = document.getElementById('userDropdown');
    if ((0, isHTMLElement_1.default)(event.target)) {
        const button = event.target.closest('button[onclick="toggleDropdown()"]');
        if (!button && !(dropdown === null || dropdown === void 0 ? void 0 : dropdown.contains(event.target))) {
            dropdown === null || dropdown === void 0 ? void 0 : dropdown.classList.add('hidden');
        }
    }
});
//# sourceMappingURL=navigation.js.map