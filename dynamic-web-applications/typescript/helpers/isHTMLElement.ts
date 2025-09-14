// Check if target is an HTMLElement
export default function isHTMLElement(target: EventTarget | null): target is HTMLElement {
    return target instanceof HTMLElement;
}
