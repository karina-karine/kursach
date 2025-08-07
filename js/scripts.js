document.addEventListener("DOMContentLoaded", () => {
    // =====================================================================
    // 1. Функціональність мобільного меню (гамбургер)
    // =====================================================================
    const mobileMenuToggle = document.querySelector(".mobile-menu-toggle")
    const mobileMenuClose = document.querySelector(".mobile-menu-close")
    const mobileMenuOverlay = document.querySelector(".mobile-menu-overlay")
    const body = document.body
    function toggleMobileMenu() {
        body.classList.toggle("mobile-menu-open")
        const isExpanded = body.classList.contains("mobile-menu-open")
        if (mobileMenuToggle) mobileMenuToggle.setAttribute("aria-expanded", isExpanded)
        if (mobileMenuOverlay) mobileMenuOverlay.setAttribute("aria-hidden", !isExpanded)
    }
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener("click", toggleMobileMenu)
    }
    if (mobileMenuClose) {
        mobileMenuClose.addEventListener("click", toggleMobileMenu)
    }
    if (mobileMenuOverlay) {
        mobileMenuOverlay.addEventListener("click", (event) => {
            if (event.target === mobileMenuOverlay) {
                toggleMobileMenu()
            }
        })
    }
    const mobileDropdownItems = document.querySelectorAll(".mobile-nav-item.has-dropdown")
    mobileDropdownItems.forEach((item) => {
        const link = item.querySelector(".mobile-nav-link")
        if (link) {
            link.addEventListener("click", (event) => {
                if (item.classList.contains("has-dropdown")) {
                    event.preventDefault()
                    event.stopPropagation()
                    item.classList.toggle("active")
                    const isExpanded = item.classList.contains("active")
                    link.setAttribute("aria-expanded", isExpanded)
                }
            })
        }
    })
    // =====================================================================
    // 2. Функціональність FAQ (Accordion)
    // =====================================================================
    const faqTriggers = document.querySelectorAll(".faq-trigger")
    faqTriggers.forEach((trigger) => {
        trigger.addEventListener("click", function () {
            const content = this.nextElementSibling
            const isExpanded = this.getAttribute("aria-expanded") === "true"
            faqTriggers.forEach((otherTrigger) => {
                if (otherTrigger !== this && otherTrigger.getAttribute("aria-expanded") === "true") {
                    otherTrigger.setAttribute("aria-expanded", "false")
                    const otherContent = otherTrigger.nextElementSibling
                    otherContent.classList.remove("open")
                    otherContent.style.maxHeight = "0"
                    otherContent.style.paddingTop = "0"
                    otherContent.style.paddingBottom = "0"
                }
            })
            if (isExpanded) {
                this.setAttribute("aria-expanded", "false")
                content.classList.remove("open")
                content.style.maxHeight = "0"
                content.style.paddingTop = "0"
                content.style.paddingBottom = "0"
            } else {
                this.setAttribute("aria-expanded", "true")
                content.classList.add("open")
                content.style.maxHeight = content.scrollHeight + 100 + "px" // Додаємо запас
                content.style.paddingTop = "var(--space-md)"
                content.style.paddingBottom = "var(--space-md)"
            }
        })
    })

    // =====================================================================
    // 3. Функціональність сторінки деталей послуг (Service Details Page)
    //    Цей блок тепер працює на сторінці services/
    // =====================================================================

    // Оголошення змінних DOM-елементів на вищому рівні DOMContentLoaded
    const allServicesGrid = document.getElementById("all-services-grid")
    const singleServiceDetails = document.getElementById("single-service-details")
    const serviceNavItems = document.querySelectorAll(".service-nav-item")
    const detailTitleElement = document.getElementById("detail-title")
    const detailBreadcrumbTitle = document.getElementById("detail-breadcrumb-title")
    const breadcrumbServicesLink = document.getElementById("breadcrumb-services-link")
    const detailIcon = document.getElementById("detail-icon")
    const detailShortDescription = document.getElementById("detail-short-description")
    const detailPrice = document.getElementById("detail-price")
    const detailDeliveryTime = document.getElementById("detail-delivery-time")
    const detailFullDescription = document.getElementById("detail-full-description")
        ? document.getElementById("detail-full-description").querySelector("p")
        : null
    const detailFeatures = document.getElementById("detail-features")
    const detailRequirements = document.getElementById("detail-requirements")
    const detailProcess = document.getElementById("detail-process")

    // Функція для оновлення контенту деталей послуги (глобально доступна)
    window.updateServiceContent = (serviceId) => {
        console.log("updateServiceContent: Called with serviceId:", serviceId)
        // Змінено: використовуємо window.kursachHelpAjax.servicesData
        if (!window.kursachHelpAjax || !window.kursachHelpAjax.servicesData) {
            console.error("updateServiceContent: kursachHelpAjax.servicesData is not defined!")
            return
        }
        const service = window.kursachHelpAjax.servicesData[serviceId]
        if (service) {
            console.log("updateServiceContent: Service data found for", serviceId, service)

            // Оновлюємо текстові елементи
            if (detailTitleElement) {
                detailTitleElement.textContent = service.name
                console.log("updateServiceContent: Updated detailTitleElement to:", service.name)
            }
            if (detailBreadcrumbTitle) {
                detailBreadcrumbTitle.textContent = service.name
                console.log("updateServiceContent: Updated detailBreadcrumbTitle to:", service.name)
            }
            if (detailIcon) {
                detailIcon.textContent = service.icon
                console.log("updateServiceContent: Updated detailIcon to:", service.icon)
            }
            if (detailShortDescription) {
                detailShortDescription.textContent = service.short_description
                console.log("updateServiceContent: Updated detailShortDescription.")
            }
            if (detailPrice) {
                detailPrice.textContent = `Ціна від: ${service.price_from} грн`
                console.log("updateServiceContent: Updated detailPrice.")
            }
            if (detailDeliveryTime) {
                detailDeliveryTime.textContent = `Термін виконання: ${service.delivery_time}`
                console.log("updateServiceContent: Updated detailDeliveryTime.")
            }
            if (detailFullDescription) {
                detailFullDescription.innerHTML = service.full_description.replace(/\n/g, "<br>")
                console.log("updateServiceContent: Updated detailFullDescription.")
            }

            // Оновлення та показ/приховування блоків "Особливості", "Вимоги", "Процес"
            const updateListSection = (element, dataArray, iconHtml, className) => {
                if (element) {
                    element.innerHTML = ""
                    const parentDiv = element.closest(`.${className}`)
                    if (dataArray && dataArray.length > 0) {
                        dataArray.forEach((item) => {
                            const li = document.createElement("li")
                            li.innerHTML = `${iconHtml} ${item}`
                            element.appendChild(li)
                        })
                        if (parentDiv) {
                            parentDiv.style.display = "block"
                            console.log(`updateServiceContent: Displaying ${className} section.`)
                        }
                    } else {
                        if (parentDiv) {
                            parentDiv.style.display = "none"
                            console.log(`updateServiceContent: Hiding ${className} section.`)
                        }
                    }
                } else {
                    console.warn(`updateServiceContent: Element for ${className} not found.`)
                }
            }

            updateListSection(detailFeatures, service.features, "&#10003;", "service-details-features")
            updateListSection(detailRequirements, service.requirements, "&#9679;", "service-details-requirements")

            if (detailProcess) {
                detailProcess.innerHTML = ""
                const parentDiv = detailProcess.closest(".service-details-process")
                if (service.process && service.process.length > 0) {
                    service.process.forEach((step) => {
                        const li = document.createElement("li")
                        li.textContent = step
                        detailProcess.appendChild(li)
                    })
                    if (parentDiv) {
                        parentDiv.style.display = "block"
                        console.log("updateServiceContent: Displaying service-details-process section.")
                    }
                } else {
                    if (parentDiv) {
                        parentDiv.style.display = "none"
                        console.log("updateServiceContent: Hiding service-details-process section.")
                    }
                }
            } else {
                console.warn("updateServiceContent: Element for service-details-process not found.")
            }

            // Оновлення активного елемента в сайдбарі
            if (serviceNavItems && serviceNavItems.length > 0) {
                serviceNavItems.forEach((item) => {
                    item.classList.remove("active")
                    // Перевіряємо serviceId з data-service-id
                    if (item.dataset.serviceId === serviceId) {
                        item.classList.add("active")
                        console.log(`updateServiceContent: Sidebar item for ${serviceId} set to active.`)
                    }
                })
            } else {
                console.warn("updateServiceContent: serviceNavItems not found or empty.")
            }

            // Показуємо блок деталей послуги та приховуємо сітку
            if (allServicesGrid) allServicesGrid.style.display = "none"
            if (singleServiceDetails) singleServiceDetails.style.display = "block"
            console.log("updateServiceContent: Switched to single service details view.")
        } else {
            console.warn(
                "updateServiceContent: Service data not found for serviceId:",
                serviceId,
                "Switching to all services grid.",
            )
            // Якщо serviceId недійсний, показуємо сітку послуг
            if (allServicesGrid) allServicesGrid.style.display = "block"
            if (singleServiceDetails) singleServiceDetails.style.display = "none"
        }
    }

    // Функція, яка оновлює контент та URL (глобально доступна)
    window.handleServiceNavigation = (serviceId) => {
        console.log("handleServiceNavigation: Called with serviceId:", serviceId)
        window.updateServiceContent(serviceId) // Викликаємо глобально доступну функцію
        const newUrl = new URL(window.location.href)
        newUrl.searchParams.set("service_id", serviceId)
        window.history.pushState({ path: newUrl.href, serviceId: serviceId }, "", newUrl.href) // Оновлюємо URL
        console.log("handleServiceNavigation: URL updated to:", newUrl.href)
    }

    // Перевіряємо, чи ми на сторінці, яка може відображати деталі послуг
    // Змінено: використовуємо window.kursachHelpAjax для початкових даних
    if (
        allServicesGrid &&
        singleServiceDetails &&
        typeof window.kursachHelpAjax !== "undefined" &&
        typeof window.kursachHelpAjax.servicesData !== "undefined"
    ) {
        console.log("Main Init: Services Data from PHP (kursachHelpAjax):", window.kursachHelpAjax.servicesData)
        console.log(
            "Main Init: Initial Service ID from PHP (kursachHelpAjax):",
            window.kursachHelpAjax.initialServiceIdFromPHP,
        )
        console.log(
            "Main Init: Is Single Service View from PHP (kursachHelpAjax):",
            window.kursachHelpAjax.isSingleServiceViewFromPHP,
        )

        // Додаємо обробники подій для елементів сайдбару
        serviceNavItems.forEach((item) => {
            item.addEventListener("click", (event) => {
                event.preventDefault()
                event.stopPropagation()
                // Отримуємо serviceId з href, оскільки він тепер повний
                const serviceId = new URL(event.currentTarget.href).searchParams.get("service_id")
                console.log("Event: Sidebar item clicked. Service ID:", serviceId)
                window.handleServiceNavigation(serviceId) // Викликаємо глобально доступну функцію
            })
        })

        // Обробник для посилання "Наші послуги" у хлібних крихтах, щоб повернутися до сітки
        if (breadcrumbServicesLink) {
            breadcrumbServicesLink.addEventListener("click", (event) => {
                event.preventDefault()
                event.stopPropagation()
                console.log("Event: Breadcrumb 'Наші послуги' clicked.")
                if (allServicesGrid) allServicesGrid.style.display = "block"
                if (singleServiceDetails) singleServiceDetails.style.display = "none"
                const newUrl = new URL(window.location.href)
                newUrl.searchParams.delete("service_id")
                window.history.pushState({ path: newUrl.href, serviceId: null }, "", newUrl.href)
                console.log("Event: Switched to all services grid. URL updated to:", newUrl.href)
            })
        }

        // Логіка початкового завантаження сторінки
        // Використовуємо дані, передані з PHP через kursachHelpAjax
        if (window.kursachHelpAjax.isSingleServiceViewFromPHP) {
            console.log("Main Init: PHP determined single service view. Calling updateServiceContent.")
            window.updateServiceContent(window.kursachHelpAjax.initialServiceIdFromPHP)
        } else {
            // Якщо PHP визначив, що має бути сітка, переконаємося, що вона відображається
            console.log("Main Init: PHP determined all services grid view.")
            if (allServicesGrid) allServicesGrid.style.display = "block"
            if (singleServiceDetails) singleServiceDetails.style.display = "none"
            // Очищаємо URL, якщо там був недійсний service_id
            const currentUrl = new URL(window.location.href)
            if (currentUrl.searchParams.has("service_id")) {
                currentUrl.searchParams.delete("service_id")
                window.history.replaceState({}, "", currentUrl.href)
                console.log("Main Init: Cleaned URL from invalid service_id.")
            }
        }

        // Обробник події для кнопок "назад/вперед" браузера
        window.addEventListener("popstate", (event) => {
            console.log("Event: Popstate event triggered.")
            const params = new URLSearchParams(window.location.search)
            const serviceId = params.get("service_id")
            // Змінено: використовуємо window.kursachHelpAjax.servicesData
            if (serviceId && window.kursachHelpAjax.servicesData[serviceId]) {
                console.log("Popstate: Valid serviceId found in URL. Updating content.")
                window.updateServiceContent(serviceId)
            } else {
                // Якщо serviceId відсутній (наприклад, повернулися до чистого URL),
                // показуємо сітку послуг
                console.log("Popstate: No valid serviceId found. Switching to all services grid.")
                if (allServicesGrid) allServicesGrid.style.display = "block"
                if (singleServiceDetails) singleServiceDetails.style.display = "none"
                const cleanUrl = new URL(window.location.href)
                cleanUrl.searchParams.delete("service_id")
                window.history.replaceState({}, "", cleanUrl.href)
            }
        })
    } else {
        console.warn(
            "Main Init: Service details sections or kursachHelpAjax.servicesData not found. Service details functionality disabled.",
        )
    } // Кінець блоку логіки для сторінки деталей послуг

    // =====================================================================
    // 4. Функціональність горизонтальних слайдерів (Services, Reviews)
    // =====================================================================
    function initSlider(trackSelector, cardSelector, prevSelector, nextSelector) {
        const track = document.querySelector(trackSelector)
        const cards = document.querySelectorAll(cardSelector)
        const prevBtn = document.querySelector(prevSelector)
        const nextBtn = document.querySelector(nextSelector)
        if (!track || cards.length === 0 || !prevBtn || !nextBtn) return
        let index = 0
        const totalCards = cards.length
        let visibleCards = getVisibleCards()
        function getVisibleCards() {
            if (window.innerWidth < 700) return 1
            if (window.innerWidth < 1100) return 2
            return 3
        }
        function updateSlider() {
            const offset = -(index * (100 / visibleCards))
            track.style.transform = `translateX(${offset}%)`
            updateButtonsState()
        }
        function updateButtonsState() {
            prevBtn.disabled = index === 0
            nextBtn.disabled = index >= totalCards - visibleCards
        }
        function handleResize() {
            visibleCards = getVisibleCards()
            index = 0
            track.style.transform = "translateX(0)"
            cards.forEach((card) => {
                card.style.flex = `0 0 calc(${100 / visibleCards}% - var(--space-xl))`
            })
            updateButtonsState()
        }
        nextBtn.addEventListener("click", () => {
            if (index < totalCards - visibleCards) {
                index++
                updateSlider()
            }
        })
        prevBtn.addEventListener("click", () => {
            if (index > 0) {
                index--
                updateSlider()
            }
        })
        window.addEventListener("resize", handleResize)
        handleResize() // Initial call to set up slider
    }
    initSlider(".services-track", ".service-card", ".services-navigation .nav-prev", ".services-navigation .nav-next")
    initSlider(".reviews-track", ".phone-mockup", ".reviews-navigation .nav-prev", ".reviews-navigation .nav-next")
    // =====================================================================
    // 5. Функціональність вирівнювання висоти карток
    // =====================================================================
    function setEqualHeights(selector) {
        const cards = document.querySelectorAll(selector)
        let maxHeight = 0
        cards.forEach((card) => (card.style.height = "auto")) // Reset height before calculating
        cards.forEach((card) => {
            maxHeight = Math.max(maxHeight, card.offsetHeight)
        })
        cards.forEach((card) => (card.style.height = maxHeight + "px"))
    }
    window.addEventListener("load", () => setEqualHeights(".service-card"))
    window.addEventListener("resize", () => setEqualHeights(".service-card"))
    // =====================================================================
    // 6. Функціональність випадаючих меню в хедері (Desktop)
    // =====================================================================
    const navItems = document.querySelectorAll(".nav-list .nav-item")
    let servicesNavItem = null
    let langNavItem = null
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
    function createDropdownMenu(items, isServiceMenu = false) {
        const ul = document.createElement("ul")
        ul.classList.add("dropdown-menu")
        for (const key in items) {
            if (items.hasOwnProperty(key)) {
                const item = items[key]
                const li = document.createElement("li")
                const a = document.createElement("a")
                if (isServiceMenu) {
                    // IMPORTANT: Changed to point to /services/ with service_id
                    // Змінено: використовуємо window.kursachHelpAjax.homeUrl
                    a.href = `${window.kursachHelpAjax.homeUrl}services/?service_id=${key}`
                    a.textContent = item.name
                } else {
                    a.href = "#" // Or actual language switch URLs
                    a.textContent = item
                }
                li.appendChild(a)
                ul.appendChild(li)
            }
        }
        return ul
    }
    // Ensure kursachHelpAjax and servicesData are available for header dropdown
    const kursachHelpAjax = window.kursachHelpAjax || {}
    // Змінено: використовуємо servicesData з kursachHelpAjax
    const headerServicesData = kursachHelpAjax.servicesData || {}

    if (servicesNavItem && Object.keys(headerServicesData).length > 0) {
        const servicesDropdownMenu = createDropdownMenu(headerServicesData, true)
        servicesNavItem.appendChild(servicesDropdownMenu)
        servicesNavItem.classList.add("menu-item-has-children")
        servicesNavItem.querySelector(".nav-link").setAttribute("aria-expanded", "false")

        const dropdownServiceLinks = servicesDropdownMenu.querySelectorAll("a")
        dropdownServiceLinks.forEach((link) => {
            link.addEventListener("click", (event) => {
                // Якщо ми вже на сторінці services/ І updateServiceContent доступна
                if (window.location.pathname.includes("/services/") && typeof window.updateServiceContent === "function") {
                    event.preventDefault()
                    event.stopPropagation()
                    const serviceId = new URL(event.currentTarget.href).searchParams.get("service_id")
                    console.log("Event: Header dropdown link clicked. Service ID:", serviceId)
                    window.handleServiceNavigation(serviceId) // Використовуємо глобально доступну функцію
                }
                // Якщо не на сторінці services/ або updateServiceContent не доступна, дозволяємо стандартний перехід.
                // PHP на сторінці services/ обробить початкове відображення.
            })
        })
    }
    if (langNavItem) {
        const langOptions = { ua: "UA", en: "EN" } // Example language options
        const langDropdownMenu = createDropdownMenu(langOptions, false)
        langNavItem.appendChild(langDropdownMenu)
        langNavItem.classList.add("menu-item-has-children")
        langNavItem.querySelector(".nav-link").setAttribute("aria-expanded", "false")
    }
    const allNavItemsWithDropdown = document.querySelectorAll(".nav-item.menu-item-has-children")
    allNavItemsWithDropdown.forEach((navItem) => {
        const toggleLink = navItem.querySelector(".nav-link")
        if (toggleLink) {
            toggleLink.addEventListener("click", (event) => {
                if (navItem.classList.contains("menu-item-has-children")) {
                    event.preventDefault()
                    event.stopPropagation()
                    const isExpanded = navItem.classList.contains("active")
                    document.querySelectorAll(".nav-item.menu-item-has-children.active").forEach((item) => {
                        if (item !== navItem) {
                            item.classList.remove("active")
                            item.querySelector(".nav-link").setAttribute("aria-expanded", "false")
                        }
                    })
                    navItem.classList.toggle("active")
                    toggleLink.setAttribute("aria-expanded", !isExpanded)
                }
            })
        }
    })
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
    // =====================================================================
    // 7. Функціональність форми замовлення (адаптована для відправки на PHP AJAX)
    // =====================================================================
    const uniquenessSlider = document.getElementById("uniqueness")
    const uniquenessValue = document.querySelector(".uniqueness-slider .slider-value")
    if (uniquenessSlider && uniquenessValue) {
        uniquenessValue.textContent = `${uniquenessSlider.value}%` // Встановлюємо початкове значення
        uniquenessSlider.addEventListener("input", () => {
            uniquenessValue.textContent = `${uniquenessSlider.value}%`
        })
    }
    const fileInput = document.getElementById("fileUpload")
    const fileLabel = document.querySelector(".file-upload .file-label")
    if (fileInput && fileLabel) {
        fileInput.addEventListener("change", () => {
            if (fileInput.files.length > 0) {
                const fileNames = Array.from(fileInput.files)
                    .map((file) => file.name)
                    .join(", ")
                fileLabel.innerHTML = `<svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M10 5v10M5 10h10" stroke="currentColor" stroke-width="2" />
                                    </svg> ${fileNames}`
            } else {
                fileLabel.innerHTML = `<svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M10 5v10M5 10h10" stroke="currentColor" stroke-width="2" />
                                    </svg> Додати файли`
            }
        })
    }
    const orderForm = document.getElementById("orderForm")
    const orderFormMessage = document.getElementById("form-message") // Елемент для повідомлень
    let isOrderFormSubmitting = false // Прапорець для запобігання подвійній відправці
    if (orderForm && orderFormMessage) {
        orderForm.addEventListener("submit", async (event) => {
            event.preventDefault() // Запобігаємо стандартній відправці форми
            if (isOrderFormSubmitting) {
                return // Якщо форма вже відправляється, ігноруємо повторні натискання
            }
            isOrderFormSubmitting = true // Встановлюємо прапорець
            const submitButton = orderForm.querySelector('button[type="submit"]')
            if (submitButton) {
                submitButton.disabled = true // Вимикаємо кнопку
                submitButton.textContent = "Відправка..." // Змінюємо текст кнопки
            }
            const formData = new FormData(orderForm)
            formData.append("action", "submit_order_form") // Додаємо action для WordPress AJAX
            formData.append("nonce", kursachHelpAjax.order_form_nonce) // Додаємо nonce для безпеки
            orderFormMessage.style.color = "initial"
            orderFormMessage.textContent = "Відправка..."
            try {
                const response = await fetch(kursachHelpAjax.ajaxurl, {
                    method: "POST",
                    body: formData,
                })
                const result = await response.json()
                if (result.success) {
                    orderFormMessage.style.color = "green"
                    orderFormMessage.textContent = result.data
                    orderForm.reset() // Очищаємо форму
                    if (fileLabel) {
                        fileLabel.innerHTML = `<svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M10 5v10M5 10h10" stroke="currentColor" stroke-width="2" />
                                            </svg> Додати файли`
                    }
                } else {
                    orderFormMessage.style.color = "red"
                    orderFormMessage.textContent = result.data || "Виникла помилка при відправці замовлення."
                }
            } catch (error) {
                console.error("Помилка мережі або сервера (форма замовлення):", error)
                orderFormMessage.style.color = "red"
                orderFormMessage.textContent = "Виникла помилка при відправці форми. Будь ласка, спробуйте ще раз."
            } finally {
                isOrderFormSubmitting = false // Скидаємо прапорець
                if (submitButton) {
                    submitButton.disabled = false // Вмикаємо кнопку
                    submitButton.textContent = "ОФОРМИТИ ЗАМОВЛЕННЯ" // Повертаємо початковий текст кнопки
                }
            }
        })
    }
    // =====================================================================
    // 8. Функціональність контактної форми (адаптована для відправки на PHP AJAX)
    // =====================================================================
    const contactForm = document.getElementById("contactForm")
    const contactFormMessage = document.getElementById("contact-form-message")
    let isContactFormSubmitting = false // Прапорець для запобігання подвійній відправці
    if (contactForm && contactFormMessage) {
        contactForm.addEventListener("submit", async (event) => {
            event.preventDefault()
            if (isContactFormSubmitting) {
                return // Якщо форма вже відправляється, ігноруємо повторні натискання
            }
            isContactFormSubmitting = true // Встановлюємо прапорець
            const submitButton = contactForm.querySelector('button[type="submit"]')
            if (submitButton) {
                submitButton.disabled = true // Вимикаємо кнопку
                submitButton.textContent = "Відправка..." // Змінюємо текст кнопки
            }
            const formData = new FormData(contactForm)
            formData.append("action", "submit_contact_form") // Додаємо action для WordPress AJAX
            formData.append("nonce", kursachHelpAjax.contact_form_nonce) // Додаємо nonce для безпеки
            contactFormMessage.style.color = "initial"
            contactFormMessage.textContent = "Відправка..."
            try {
                const response = await fetch(kursachHelpAjax.ajaxurl, {
                    method: "POST",
                    body: formData,
                })
                const result = await response.json()
                if (result.success) {
                    contactFormMessage.style.color = "green"
                    contactFormMessage.textContent = result.data
                    contactForm.reset()
                } else {
                    contactFormMessage.style.color = "red"
                    contactFormMessage.textContent = result.data || "Виникла помилка при відправці питання."
                }
            } catch (error) {
                console.error("Помилка мережі або сервера (контактна форма):", error)
                contactFormMessage.style.color = "red"
                contactFormMessage.textContent = "Виникла помилка при відправці форми. Будь ласка, спробуйте ще раз."
            } finally {
                isContactFormSubmitting = false // Скидаємо прапорець
                if (submitButton) {
                    submitButton.disabled = false // Вмикаємо кнопку
                    submitButton.textContent = "ПОСТАВИТИ ПИТАННЯ" // Повертаємо початковий текст кнопки
                }
            }
        })
    }
})
