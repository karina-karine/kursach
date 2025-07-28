// js/header-dropdown.js
document.addEventListener("DOMContentLoaded", () => {
    // Отримуємо дані послуг з PHP через wp_localize_script
    const servicesData = window.kursachHelpData.servicesData || {}
    const homeUrl = window.kursachHelpData.homeUrl || "/"

    const navItems = document.querySelectorAll(".nav-list .nav-item")
    let servicesNavItem = null
    let langNavItem = null

    // Знаходимо елементи "Наші послуги" та "UA" за текстом посилання
    navItems.forEach((item) => {
        const link = item.querySelector(".nav-link")
        if (link) {
            if (link.textContent.includes("Наші послуги")) {
                servicesNavItem = item
            } else if (link.textContent.includes("UA")) {
                langNavItem = item
            }
        }
    })

    // Функція для створення випадаючого меню
    function createDropdownMenu(items, isServiceMenu = false) {
        const ul = document.createElement("ul")
        ul.classList.add("dropdown-menu")

        for (const key in items) {
            if (items.hasOwnProperty(key)) {
                const item = items[key]
                const li = document.createElement("li")
                const a = document.createElement("a")

                if (isServiceMenu) {
                    // Для послуг, посилання на service-details-page.php
                    a.href = `${homeUrl}service-details/?service_id=${key}`
                    a.textContent = item.name
                } else {
                    // Для мов, просто посилання (можна адаптувати)
                    a.href = "#" // Замініть на реальні посилання мов
                    a.textContent = item
                }
                li.appendChild(a)
                ul.appendChild(li)
            }
        }
        return ul
    }

    // Динамічно створюємо меню "Наші послуги"
    if (servicesNavItem && Object.keys(servicesData).length > 0) {
        const servicesDropdownMenu = createDropdownMenu(servicesData, true)
        servicesNavItem.appendChild(servicesDropdownMenu)
        servicesNavItem.classList.add("menu-item-has-children") // Додаємо клас для стилів
        servicesNavItem.querySelector(".nav-link").setAttribute("aria-expanded", "false") // Додаємо атрибут
    }

    // Динамічно створюємо меню "UA" (приклад для мов)
    if (langNavItem) {
        const langOptions = { ua: "UA", en: "EN" } // Приклад даних для мов
        const langDropdownMenu = createDropdownMenu(langOptions, false)
        langNavItem.appendChild(langDropdownMenu)
        langNavItem.classList.add("menu-item-has-children") // Додаємо клас для стилів
        langNavItem.querySelector(".nav-link").setAttribute("aria-expanded", "false") // Додаємо атрибут
    }

    // Функціонал відкриття/закриття випадаючих списків
    const allNavItemsWithDropdown = document.querySelectorAll(".nav-item.menu-item-has-children")

    allNavItemsWithDropdown.forEach((navItem) => {
        const toggleLink = navItem.querySelector(".nav-link") // Це ваш існуючий <a>
        if (toggleLink) {
            toggleLink.addEventListener("click", (event) => {
                // Запобігаємо переходу за посиланням, якщо це випадаючий список
                if (navItem.classList.contains("menu-item-has-children")) {
                    event.preventDefault()
                    event.stopPropagation() // Зупиняємо спливання події

                    const isExpanded = navItem.classList.contains("active")

                    // Закриваємо інші відкриті випадаючі списки
                    document.querySelectorAll(".nav-item.menu-item-has-children.active").forEach((item) => {
                        if (item !== navItem) {
                            item.classList.remove("active")
                            item.querySelector(".nav-link").setAttribute("aria-expanded", "false")
                        }
                    })

                    // Перемикаємо поточний випадаючий список
                    navItem.classList.toggle("active")
                    toggleLink.setAttribute("aria-expanded", !isExpanded)
                }
            })
        }
    })

    // Закриваємо випадаючі списки при кліку поза ними
    document.addEventListener("click", (event) => {
        allNavItemsWithDropdown.forEach((navItem) => {
            if (!navItem.contains(event.target)) {
                navItem.classList.remove("active")
                const toggleLink = navItem.querySelector(".nav-link")
                if (toggleLink) {
                    toggleLink.setAttribute("aria-expanded", "false")
                }
            }
        })
    })
})
