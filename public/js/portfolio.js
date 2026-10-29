(() => {
    const modal = document.querySelector('[data-demo-modal]');
    if (!modal) return;
    const title = modal.querySelector('#demo-modal-title');
    const openButtons = document.querySelectorAll('[data-demo-open]');
    const closeButtons = modal.querySelectorAll('[data-demo-close]');
    let previousFocus = null;
    const openModal = (button) => {
        previousFocus = button;
        title.textContent = button.dataset.title || 'Demo concept';
        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        modal.querySelector('.modal-close').focus();
    };
    const closeModal = () => {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        if (previousFocus) previousFocus.focus();
    };
    openButtons.forEach((button) => button.addEventListener('click', () => openModal(button)));
    closeButtons.forEach((button) => button.addEventListener('click', closeModal));
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
    });
})();