const icons = {
    // copy: `../my/icons/triangle-left-filled.svg`,
    edit: `<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"><path d="M15.502 1.94a1.5 1.5 0 0 0-2.121 0L13.001 2.32l-.7-.7 1.5-1.5a1.5 1.5 0 1 0-2.121-2.121l-1.5 1.5-3.5 3.5L.732 9.732a2.003 2.003 0 0 0-.605 1.269l-.122.733a2 2 0 0 0 2.415 2.415l.733-.122c.488-.075.95-.278 1.269-.605l3.5-3.5 3.5-3.5 1.5-1.5-.7-.7 1.5-1.5zm-10.85 8.901l3.5-3.5 1 1-3.5 3.5-1 1-1-1 1-1z"/></svg>`
};

  function loadIcons() {
    const elements = document.querySelectorAll('.my:not([data-icon-injected])');
    elements.forEach(el => {
      const classList = Array.from(el.classList);
      const iconClass = classList.find(cls => cls.startsWith('my-'));
      if (iconClass) {
        const iconName = iconClass.replace('my-', '');
        if (icons[iconName]) {
          el.innerHTML = icons[iconName];
          el.setAttribute('data-icon-injected', 'true'); // Mark as processed
        }
        // if (icons[iconName].includes('<svg')) {
        //     // Inline SVG - directly inject it
        //     el.innerHTML = icons[iconName];
        // } else {
        //     // External SVG - use an image tag
        //     el.innerHTML = `<img src="${icons[iconName]}" alt="${iconName}" />`;
        // }
      }
    });
  }
  
  // Call loadIcons on page load
// Ensure DOMContentLoaded before setting up the MutationObserver
document.addEventListener('DOMContentLoaded', () => {
    const observer = new MutationObserver(() => {
      loadIcons();
    });
  
    // Ensure document.body is available
    if (document.body) {
      observer.observe(document.body, { childList: true, subtree: true });
    } else {
      console.error('document.body is not available for observation');
    }
  
    // Initial call to loadIcons
    loadIcons();
  });
  