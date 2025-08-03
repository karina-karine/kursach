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
    // =====================================================================
    const serviceNavItems = document.querySelectorAll(".service-nav-item")
    const detailTitle = document.getElementById("detail-title")
    const detailBreadcrumbTitle = document.getElementById("detail-breadcrumb-title")
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

    // kursachHelpAjax буде визначено через wp_localize_script в PHP
    const kursachHelpAjax = window.kursachHelpAjax || {}
    const servicesData = kursachHelpAjax.servicesData || {}
    const homeUrl = kursachHelpAjax.homeUrl || "/"

    // Нова функція: Тільки оновлює контент на сторінці, не змінює URL
    function updateServiceContent(serviceId) {
        const service = servicesData[serviceId]
        if (service) {
            if (detailTitle) detailTitle.textContent = service.name
            if (detailBreadcrumbTitle) detailBreadcrumbTitle.textContent = service.name
            if (detailIcon) detailIcon.textContent = service.icon
            if (detailShortDescription) detailShortDescription.textContent = service.short_description
            if (detailPrice) detailPrice.textContent = `Ціна від: ${service.price_from} грн`
            if (detailDeliveryTime) detailDeliveryTime.textContent = `Термін виконання: ${service.delivery_time}`
            if (detailFullDescription) {
                detailFullDescription.innerHTML = service.full_description.replace(/\n/g, "<br>")
            }
            if (detailFeatures) {
                detailFeatures.innerHTML = ""
                if (service.features && service.features.length > 0) {
                    service.features.forEach((feature) => {
                        const li = document.createElement("li")
                        li.innerHTML = `<span class="feature-icon">&#10003;</span> ${feature}`
                        detailFeatures.appendChild(li)
                    })
                    detailFeatures.closest(".service-details-features").style.display = "block"
                } else {
                    detailFeatures.closest(".service-details-features").style.display = "none"
                }
            }
            if (detailRequirements) {
                detailRequirements.innerHTML = ""
                if (service.requirements && service.requirements.length > 0) {
                    service.requirements.forEach((req) => {
                        const li = document.createElement("li")
                        li.innerHTML = `<span class="requirement-icon">&#9679;</span> ${req}`
                        detailRequirements.appendChild(li)
                    })
                    detailRequirements.closest(".service-details-requirements").style.display = "block"
                } else {
                    detailRequirements.closest(".service-details-requirements").style.display = "none"
                }
            }
            if (detailProcess) {
                detailProcess.innerHTML = ""
                if (service.process && service.process.length > 0) {
                    service.process.forEach((step) => {
                        const li = document.createElement("li")
                        li.textContent = step
                        detailProcess.appendChild(li)
                    })
                    detailProcess.closest(".service-details-process").style.display = "block"
                } else {
                    detailProcess.closest(".service-details-process").style.display = "none"
                }
            }
            serviceNavItems.forEach((item) => {
                item.classList.remove("active")
                if (item.dataset.serviceId === serviceId) {
                    item.classList.add("active")
                }
            })
        }
    }

    // Функція, яка оновлює контент та URL (викликається тільки при кліку)
    function handleServiceNavigation(serviceId) {
        updateServiceContent(serviceId) // Оновлюємо контент
        const newUrl = new URL(window.location.href)
        newUrl.searchParams.set("service_id", serviceId)
        window.history.pushState({ path: newUrl.href, serviceId: serviceId }, "", newUrl.href) // Оновлюємо URL
    }

    serviceNavItems.forEach((item) => {
        item.addEventListener("click", (event) => {
            event.preventDefault()
            const serviceId = event.target.dataset.serviceId
            handleServiceNavigation(serviceId) // Викликаємо функцію, яка оновлює URL
        })
    })

    const urlParams = new URLSearchParams(window.location.search)
    const initialServiceId = urlParams.get("service_id")
    const firstServiceId = Object.keys(servicesData)[0]

    // Логіка початкового завантаження сторінки
    if (initialServiceId && servicesData[initialServiceId]) {
        // Якщо service_id є в URL, оновлюємо контент відповідно до нього.
        // URL вже містить service_id, тому не потрібно його змінювати.
        updateServiceContent(initialServiceId)
    } else if (firstServiceId) {
        // Якщо service_id немає в URL, просто рендеримо контент першої послуги
        // БЕЗ зміни URL.
        updateServiceContent(firstServiceId)
        // Додатково, якщо ми на головній сторінці, і там є service_id,
        // але ми хочемо, щоб URL був чистим, ми можемо явно видалити його.
        // Це може бути корисно, якщо користувач вручну ввів URL з service_id,
        // а потім перейшов на головну сторінку.
        if (window.location.search.includes("service_id")) {
            const cleanUrl = new URL(window.location.href)
            cleanUrl.searchParams.delete("service_id")
            window.history.replaceState({}, "", cleanUrl.href)
        }
    }

    window.addEventListener("popstate", (event) => {
        const params = new URLSearchParams(window.location.search)
        const serviceId = params.get("service_id")

        if (serviceId && servicesData[serviceId]) {
            updateServiceContent(serviceId) // Рендеримо контент на основі serviceId з історії
        } else {
            // Якщо serviceId відсутній (наприклад, повернулися до чистого URL),
            // рендеримо контент першої послуги і переконаємося, що URL чистий.
            if (firstServiceId) {
                updateServiceContent(firstServiceId)
            }
            const cleanUrl = new URL(window.location.href)
            cleanUrl.searchParams.delete("service_id")
            window.history.replaceState({}, "", cleanUrl.href)
        }
    })

    // =====================================================================
    // 4. Функціональність горизонтальних слайдерів (Services, Reviews)
    // =====================================================================
    function initSlider(trackSelector, cardSelector, prevSelector, nextSelector) {
        const track = document.querySelector(trackSelector) // Використовуємо trackSelector
        const cards = document.querySelectorAll(cardSelector) // Використовуємо cardSelector
        const prevBtn = document.querySelector(prevSelector) // Використовуємо prevSelector
        const nextBtn = document.querySelector(nextSelector) // Використовуємо nextSelector

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
                    a.href = `${homeUrl}services/?service_id=${key}`
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

    if (servicesNavItem && Object.keys(servicesData).length > 0) {
        const servicesDropdownMenu = createDropdownMenu(servicesData, true)
        servicesNavItem.appendChild(servicesDropdownMenu)
        servicesNavItem.classList.add("menu-item-has-children")
        servicesNavItem.querySelector(".nav-link").setAttribute("aria-expanded", "false")
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
