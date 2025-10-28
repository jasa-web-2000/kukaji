// import './bootstrap'


// Landing Toggle
const menuToggle = document.querySelector('#menu-toggle')
if (menuToggle) {
    menuToggle.addEventListener('click', () => {
        menuToggle.classList.toggle('active-menu')
    })
}

// See P_assword
const seePasswords = document.querySelectorAll('button.seePassword')
if (seePasswords) {
    seePasswords.forEach((e) => {
        e.addEventListener('click', () => {
            // Cari input password di parent container
            const password = e.closest('div').querySelector('input.password')
            if (!password) return

            password.type = password.type === 'password' ? 'text' : 'password'
            e.classList.toggle('active-password')
        })
    })
}




// Dashboard

const aside = document.querySelector('#sidebar')
const toggleSidebarMobile = document.querySelector('#toggleSidebarMobile')
const sidebarBackdrop = document.querySelector('#sidebarBackdrop')
if (toggleSidebarMobile && sidebarBackdrop) {
    sidebarBackdrop.addEventListener('click', () => {
        aside.classList.remove('!block')
        sidebarBackdrop.classList.remove('!block')
    })

    toggleSidebarMobile.addEventListener('click', () => {
        aside.classList.toggle('!block')
        sidebarBackdrop.classList.toggle('!block')
    })

}

// Search Table
const searchTable = document.getElementById('searchBtn')
if (searchTable) {
    searchTable.addEventListener('click', function () {
        const input = document.getElementById('search').value

        const url = new URL(window.location.href)
        const params = new URLSearchParams(url.search)

        params.set('search', input)
        params.set('page', '1')

        window.location.href = url.pathname + '?' + params.toString()
    })
}



// Buka modal
const openModal = document.querySelectorAll('.open-modal')
if (openModal) {
    openModal.forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal')
            const modal = document.getElementById(modalId)
            if (modal) modal.classList.remove('hidden')
            if (modal) modal.classList.add('flex')
        })
    })
}

// Tutup modal
const closeModal = document.querySelectorAll('.close-modal')
if (closeModal) {
    closeModal.forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('[id^="modal-"]')
            if (modal) modal.classList.add('hidden')
        })
    })
}

const closeModalOverlay = document.querySelectorAll('[id^="modal-"]')
if (closeModalOverlay) {
    closeModalOverlay.forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden')
            }
        })
    })
}




// // Search Dropdown
// let searchDropdownButton = document.querySelectorAll('.search-dropdown-button')
// if (searchDropdownButton) {
//     Array.from(searchDropdownButton).forEach((btn, i) => {
//         let searchDropdownMenu = btn.querySelector('.search-dropdown-menu')
//         let inputFrontSearchDropdownMenu = btn.querySelector('.input-front')
//         let inputBackSearchDropdownMenu = btn.querySelector('.input-back')

//         searchDropdownMenu.classList.add('hidden!')


//         let inputSearchDropdownMenuSelect = searchDropdownMenu.querySelectorAll('.search-dropdown-menu-select')
//         Array.from(inputSearchDropdownMenuSelect).forEach(item => {
//             item.addEventListener('click', () => {
//                 inputFrontSearchDropdownMenu.value = item.innerHTML.trim()
//                 inputBackSearchDropdownMenu.value = item.getAttribute('data-target')
//             })
//         })


//         Array.from(inputFrontSearchDropdownMenu).forEach(item => {
//             item.addEventListener('keydown', () => {
//                 searchDropdownMenu.classList.remove('hidden!')
//             })
//         })

//         btn.addEventListener('click', () => {
//             searchDropdownMenu.classList.toggle('hidden!')
//         })
//     })

// }



let searchDropdownButton = document.querySelectorAll('.search-dropdown-button')

if (searchDropdownButton.length) {
    searchDropdownButton.forEach((btn) => {
        let searchDropdownMenu = btn.querySelector('.search-dropdown-menu')
        let inputFrontSearchDropdownMenu = btn.querySelector('.input-front')
        let inputBackSearchDropdownMenu = btn.querySelector('.input-back')

        // Sembunyikan awalnya
        searchDropdownMenu.classList.add('hidden!')

        // 🟢 Event delegation: tangani klik item menu
        searchDropdownMenu.addEventListener('click', (e) => {
            let item = e.target.closest('.search-dropdown-menu-select')
            if (!item) return // bukan klik pada item menu

            inputFrontSearchDropdownMenu.value = item.innerHTML.trim()
            inputBackSearchDropdownMenu.value = item.getAttribute('data-target')

            searchDropdownMenu.classList.add('hidden!') // sembunyikan lagi kalau mau
        })

        // 🟢 Tampilkan dropdown ketika input diketik
        inputFrontSearchDropdownMenu.addEventListener('keydown', () => {
            searchDropdownMenu.classList.remove('hidden!')
        })

        // 🟢 Toggle dropdown saat tombol utama diklik
        btn.addEventListener('click', (e) => {
            document.querySelectorAll('.search-dropdown-menu').forEach(menu => {
                if (menu !== searchDropdownMenu) {
                    menu.classList.add('hidden!')
                }
            })

            // Cegah close langsung karena klik juga kena listener di atas
            if (e.target.closest('.search-dropdown-menu-select')) return
            searchDropdownMenu.classList.toggle('hidden!')
        })

        // 🟢 Klik di luar menutup semua dropdown
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.search-dropdown-button')) {
                document.querySelectorAll('.search-dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden!')
                })
            }
        })

    })
}
