// import './bootstrap';


// Landing Toggle
const menuToggle = document.querySelector('#menu-toggle')
if (menuToggle) {
    menuToggle.addEventListener('click', () => {
        menuToggle.classList.toggle('active-menu')
    })
}

// See P_assword
const seePasswords = document.querySelectorAll('button.seePassword');
if (seePasswords) {
    seePasswords.forEach((e) => {
        e.addEventListener('click', () => {
            // Cari input password di parent container
            const password = e.closest('div').querySelector('input.password');
            if (!password) return;

            password.type = password.type === 'password' ? 'text' : 'password';
            e.classList.toggle('active-password');
        });
    });
}




// Dashboard

const aside = document.querySelector('#sidebar')
const toggleSidebarMobile = document.querySelector('#toggleSidebarMobile')
const sidebarBackdrop = document.querySelector('#sidebarBackdrop')
if (toggleSidebarMobile && sidebarBackdrop) {
    sidebarBackdrop.addEventListener('click', () => {
        aside.classList.remove('!block');
        sidebarBackdrop.classList.remove('!block')
    })

    toggleSidebarMobile.addEventListener('click', () => {
        aside.classList.toggle('!block');
        sidebarBackdrop.classList.toggle('!block')
    })

}

// Search Table
const searchTable = document.getElementById('searchBtn');
if (searchTable) {
    searchTable.addEventListener('click', function () {
        const input = document.getElementById('search').value;

        const url = new URL(window.location.href);
        const params = new URLSearchParams(url.search);

        params.set('search', input);
        params.set('page', '1');

        window.location.href = url.pathname + '?' + params.toString();
    });
}



// Buka modal
const openModal = document.querySelectorAll('.open-modal')
if (openModal) {
    openModal.forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal');
            const modal = document.getElementById(modalId);
            if (modal) modal.classList.remove('hidden');
            if (modal) modal.classList.add('flex');
        });
    });
}

// Tutup modal
const closeModal = document.querySelectorAll('.close-modal')
if (closeModal) {
    closeModal.forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('[id^="modal-"]');
            if (modal) modal.classList.add('hidden');
        });
    });
}

const closeModalOverlay = document.querySelectorAll('[id^="modal-"]')
if (closeModalOverlay) {
    closeModalOverlay.forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    });
}
