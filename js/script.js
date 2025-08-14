// Debounce function to limit how often a function is called
function debounce(func, delay) {
    let timeout
    return function (...args) {
        clearTimeout(timeout)
        timeout = setTimeout(() => func.apply(this, args), delay)
    }
}

// Modified setEqualHeights function
function setEqualHeights(selector) {
    requestAnimationFrame(() => {
        const cards = document.querySelectorAll(selector)
        if (cards.length === 0) {
            // console.warn(`setEqualHeights: No cards found for selector "${selector}".`); // Removed for cleaner console
            return
        }
        let maxHeight = 0
        // Reset height and min-height before calculating to get true content height
        cards.forEach((card) => {
            card.style.height = "auto"
            card.style.minHeight = "0px" // Explicitly reset min-height via JS
        })
        // Calculate max height
        cards.forEach((card) => {
            maxHeight = Math.max(maxHeight, card.offsetHeight)
        })
        // Apply max height
        cards.forEach((card) => {
            card.style.height = maxHeight + "px"
        })
    })
}

// New function to observe changes in service card containers
function observeServiceCards() {
    const servicesTrack = document.querySelector(".services-track")
    const allServicesGrid = document.getElementById("all-services-grid") // Assuming this is the container for cards on the services page
    const reviewsTrack = document.querySelector(".reviews-track") // Added for reviews section
    const targets = []
    if (servicesTrack) targets.push(servicesTrack)
    if (allServicesGrid) targets.push(allServicesGrid)
    if (reviewsTrack) targets.push(reviewsTrack) // Added for reviews section

    if (targets.length === 0) {
        // console.warn("MutationObserver: No target containers (.services-track, #all-services-grid, or .reviews-track) found for observation."); // Removed for cleaner console
        return
    }

    // Debounced callback for the MutationObserver
    const observerCallback = debounce((mutationsList, observer) => {
        let shouldRecalculate = false
        for (const mutation of mutationsList) {
            // Recalculate if children are added/removed or style attributes change
            if (mutation.type === "childList" || (mutation.type === "attributes" && mutation.attributeName === "style")) {
                shouldRecalculate = true
                break // Only need to trigger once per batch of mutations
            }
        }
        if (shouldRecalculate) {
            setEqualHeights(".service-card")
            setEqualHeights(".phone-mockup") // Ensure review cards are also adjusted
        }
    }, 100) // Debounce observer callback to avoid too many calls

    targets.forEach((target) => {
        const observer = new MutationObserver(observerCallback)
        // Observe for changes in children (childList) and attribute changes (style)
        observer.observe(target, { childList: true, subtree: true, attributes: true, attributeFilter: ["style"] })
    })
}

// Modify the initSlider function to call setEqualHeights after layout changes
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
        // IMPORTANT: Call setEqualHeights after slider layout is updated
        setEqualHeights(cardSelector)
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

// New function to encapsulate slider and file upload logic for forms
function setupFormLogic(formElement) {
    // Uniqueness Slider
    const uniquenessSlider = formElement.querySelector(".uniqueness-slider .slider")
    const uniquenessValue = formElement.querySelector(".uniqueness-slider .slider-value")

    if (uniquenessSlider && uniquenessValue) {
        uniquenessValue.textContent = `${uniquenessSlider.value}%`
        uniquenessSlider.addEventListener("input", () => {
            uniquenessValue.textContent = `${uniquenessSlider.value}%`
        })
    } else {
        // console.warn(`Uniqueness slider or value element not found within form: ${formElement.id}`); // Removed for cleaner console
    }

    // File Upload
    const fileInput = formElement.querySelector(".file-input")
    const fileLabel = formElement.querySelector(".file-label")

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
    } else {
        // console.warn(`File input or label not found within form: ${formElement.id}`); // Removed for cleaner console
    }

    // Form Submission (if it's an order form)
    if (formElement.id === "orderForm" || formElement.id === "modalOrderForm") {
        const formMessageElement =
            formElement.querySelector("#form-message") || formElement.querySelector("#modal-form-message")
        let isSubmitting = false

        formElement.addEventListener("submit", async (event) => {
            event.preventDefault()
            if (isSubmitting) {
                return
            }
            isSubmitting = true

            const submitButton = formElement.querySelector('button[type="submit"]')
            if (submitButton) {
                submitButton.disabled = true
                submitButton.textContent = "Відправка..."
            }

            if (formMessageElement) {
                formMessageElement.style.color = "initial"
                formMessageElement.textContent = "Відправка..."
            }

            const formData = new FormData(formElement)
            formData.append("action", "submit_order_form")
            // Ensure kursachHelpAjax is defined globally or passed
            formData.append("nonce", window.kursachHelpAjax.order_form_nonce)

            try {
                const response = await fetch(window.kursachHelpAjax.ajaxurl, {
                    method: "POST",
                    body: formData,
                })
                const result = await response.json()

                if (result.success) {
                    if (formMessageElement) {
                        formMessageElement.style.color = "green"
                        formMessageElement.textContent = result.data
                    }
                    formElement.reset()
                    if (fileLabel) {
                        // Reset file label after successful submission
                        fileLabel.innerHTML = `<svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                   <path d="M10 5v10M5 10h10" stroke="currentColor" stroke-width="2" />
                                               </svg> Додати файли`
                    }
                    if (formElement.id === "modalOrderForm") {
                        // Assuming closeOrderModal is accessible in this scope
                        setTimeout(() => {
                            const orderFormModal = document.getElementById("orderFormModal")
                            if (orderFormModal) {
                                orderFormModal.classList.remove("is-visible")
                                document.body.classList.remove("modal-open") // Дозволяємо прокрутку фону
                                orderFormModal.setAttribute("aria-hidden", "true")
                            }
                        }, 2000)
                    }
                } else {
                    if (formMessageElement) {
                        formMessageElement.style.color = "red"
                        formMessageElement.textContent = result.data || "Виникла помилка при відправці замовлення."
                    }
                }
            } catch (error) {
                console.error(`Помилка мережі або сервера (${formElement.id} форма замовлення):`, error)
                if (formMessageElement) {
                    formMessageElement.style.color = "red"
                    formMessageElement.textContent = "Виникла помилка при відправці форми. Будь ласка, спробуйте ще раз."
                }
            } finally {
                isSubmitting = false
                if (submitButton) {
                    submitButton.disabled = false
                    submitButton.textContent = "ЗАМОВИТИ РОБОТУ"
                }
            }
        })
    }
}

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
    // 2. Функціональність FAQ (Accordion) - ПОВЕРНУТО ДО ПОПЕРЕДНЬОГО СТАНУ
    // =====================================================================
    const faqTriggers = document.querySelectorAll(".faq-trigger")
    faqTriggers.forEach((trigger) => {
        trigger.addEventListener("click", function () {
            const content = this.nextElementSibling
            const isExpanded = this.getAttribute("aria-expanded") === "true"
            const faqIcon = this.querySelector(".faq-icon")

            // Close all other open accordions
            faqTriggers.forEach((otherTrigger) => {
                if (otherTrigger !== this && otherTrigger.getAttribute("aria-expanded") === "true") {
                    otherTrigger.setAttribute("aria-expanded", "false")
                    const otherContent = otherTrigger.nextElementSibling
                    otherContent.style.maxHeight = "0"
                    otherContent.style.paddingTop = "0"
                    otherContent.style.paddingBottom = "0"
                    otherTrigger.querySelector(".faq-icon").textContent = "+"
                }
            })

            // Toggle current accordion
            if (isExpanded) {
                this.setAttribute("aria-expanded", "false")
                content.style.maxHeight = "0"
                content.style.paddingTop = "0"
                content.style.paddingBottom = "0"
                faqIcon.textContent = "+"
            } else {
                this.setAttribute("aria-expanded", "true")
                content.style.maxHeight = content.scrollHeight + 100 + "px" // Додаємо запас
                content.style.paddingTop = "var(--space-md)"
                content.style.paddingBottom = "var(--space-md)"
                faqIcon.textContent = "-"
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
        if (!window.kursachHelpAjax || !window.kursachHelpAjax.servicesData) {
            console.error("updateServiceContent: kursachHelpAjax.servicesData is not defined!")
            return
        }
        const service = window.kursachHelpAjax.servicesData[serviceId]
        if (service) {
            // Оновлюємо текстові елементи
            if (detailTitleElement) {
                detailTitleElement.textContent = service.name
            }
            if (detailBreadcrumbTitle) {
                detailBreadcrumbTitle.textContent = service.name
            }
            if (detailIcon) {
                detailIcon.textContent = service.icon
            }
            if (detailShortDescription) {
                detailShortDescription.textContent = service.short_description
            }
            if (detailPrice) {
                detailPrice.textContent = `Ціна від: ${service.price_from} грн`
            }
            if (detailDeliveryTime) {
                detailDeliveryTime.textContent = `Термін виконання: ${service.delivery_time}`
            }
            if (detailFullDescription) {
                detailFullDescription.innerHTML = service.full_description.replace(/\n/g, "<br>")
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
                        }
                    } else {
                        if (parentDiv) {
                            parentDiv.style.display = "none"
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
                    }
                } else {
                    if (parentDiv) {
                        parentDiv.style.display = "none"
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
                    }
                })
            } else {
                console.warn("updateServiceContent: serviceNavItems not found or empty.")
            }

            // Показуємо блок деталей послуги та приховуємо сітку
            if (allServicesGrid) allServicesGrid.style.display = "none"
            if (singleServiceDetails) singleServiceDetails.style.display = "block"
        } else {
            // console.warn("updateServiceContent: Service data not found for serviceId:", serviceId, "Switching to all services grid."); // Removed for cleaner console
            // Якщо serviceId недійсний, показуємо сітку послуг
            if (allServicesGrid) allServicesGrid.style.display = "block"
            if (singleServiceDetails) singleServiceDetails.style.display = "none"
        }
    }

    // Функція, яка оновлює контент та URL (глобально доступна)
    window.handleServiceNavigation = (serviceId) => {
        window.updateServiceContent(serviceId) // Викликаємо глобально доступну функцію
        const newUrl = new URL(window.location.href)
        newUrl.searchParams.set("service_id", serviceId)
        window.history.pushState({ path: newUrl.href, serviceId: serviceId }, "", newUrl.href) // Оновлюємо URL
    }

    // Перевіряємо, чи ми на сторінці, яка може відображати деталі послуг
    // Змінено: використовуємо window.kursachHelpAjax для початкових даних
    if (
        allServicesGrid &&
        singleServiceDetails &&
        typeof window.kursachHelpAjax !== "undefined" &&
        typeof window.kursachHelpAjax.servicesData !== "undefined"
    ) {
        // Додаємо обробники подій для елементів сайдбару
        serviceNavItems.forEach((item) => {
            item.addEventListener("click", (event) => {
                event.preventDefault()
                event.stopPropagation()
                // Отримуємо serviceId з data-service-id
                const serviceId = new URL(event.currentTarget.href).searchParams.get("service_id")
                window.handleServiceNavigation(serviceId) // Викликаємо глобально доступну функцію
            })
        })

        // Обробник для посилання "Наші послуги" у хлібних крихтах, щоб повернутися до сітки
        if (breadcrumbServicesLink) {
            breadcrumbServicesLink.addEventListener("click", (event) => {
                event.preventDefault()
                event.stopPropagation()
                if (allServicesGrid) allServicesGrid.style.display = "block"
                if (singleServiceDetails) singleServiceDetails.style.display = "none"
                const newUrl = new URL(window.location.href)
                newUrl.searchParams.delete("service_id")
                window.history.pushState({ path: newUrl.href, serviceId: null }, "", newUrl.href)
            })
        }

        // Логіка початкового завантаження сторінки
        // Використовуємо дані, передані з PHP через kursachHelpAjax
        if (window.kursachHelpAjax.isSingleServiceViewFromPHP) {
            window.updateServiceContent(window.kursachHelpAjax.initialServiceIdFromPHP)
        } else {
            // Якщо PHP визначив, що має бути сітка, переконаємося, що вона відображається
            if (allServicesGrid) allServicesGrid.style.display = "block"
            if (singleServiceDetails) singleServiceDetails.style.display = "none"
            // Очищаємо URL, якщо там був недійсний service_id
            const currentUrl = new URL(window.location.href)
            if (currentUrl.searchParams.has("service_id")) {
                currentUrl.searchParams.delete("service_id")
                window.history.replaceState({}, "", currentUrl.href)
            }
        }

        // Обробник події для кнопок "назад/вперед" браузера
        window.addEventListener("popstate", (event) => {
            const params = new URLSearchParams(window.location.search)
            const serviceId = params.get("service_id")
            // Змінено: використовуємо window.kursachHelpAjax.servicesData
            if (serviceId && window.kursachHelpAjax.servicesData[serviceId]) {
                window.updateServiceContent(serviceId)
            } else {
                // Якщо serviceId відсутній (наприклад, повернулися до чистого URL),
                // показуємо сітку послуг
                if (allServicesGrid) allServicesGrid.style.display = "block"
                if (singleServiceDetails) singleServiceDetails.style.display = "none"
                const cleanUrl = new URL(window.location.href)
                cleanUrl.searchParams.delete("service_id")
                window.history.replaceState({}, "", cleanUrl.href)
            }
        })
    } else {
        // console.warn("Main Init: Service details sections or kursachHelpAjax.servicesData not found. Service details functionality disabled."); // Removed for cleaner console
    } // Кінець блоку логіки для сторінки деталей послуг

    // =====================================================================
    // 4. Функціональність горизонтальних слайдерів (Services, Reviews)
    // =====================================================================
    initSlider(".services-track", ".service-card", ".services-navigation .nav-prev", ".services-navigation .nav-next")
    initSlider(".reviews-track", ".phone-mockup", ".reviews-navigation .nav-prev", ".reviews-navigation .nav-next")

    // =====================================================================
    // 5. Функціональність вирівнювання висоти карток
    // =====================================================================
    // Initial call for cards that might not be part of a slider (e.g., on the services page grid)
    setEqualHeights(".service-card")
    setEqualHeights(".phone-mockup") // Initial call for review cards

    // Debounced resize listener for general .service-card elements
    const debouncedSetEqualHeightsForGeneralCards = debounce(() => {
        setEqualHeights(".service-card")
        setEqualHeights(".phone-mockup") // Ensure review cards are also adjusted on general resize
    }, 200)
    window.addEventListener("resize", debouncedSetEqualHeightsForGeneralCards)

    // Start observing for dynamic content changes
    observeServiceCards()

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
                const li = document.createElement("li")
                const a = document.createElement("a")
                if (isServiceMenu) {
                    // IMPORTANT: Changed to point to /services/ with service_id
                    // Змінено: використовуємо window.kursachHelpAjax.homeUrl
                    a.href = `${window.kursachHelpAjax.homeUrl}services/?service_id=${key}`
                    a.textContent = items[key].name
                } else {
                    a.href = "#" // Or actual language switch URLs
                    a.textContent = items[key]
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
    const mainOrderForm = document.getElementById("orderForm")
    if (mainOrderForm) {
        setupFormLogic(mainOrderForm)
    } else {
        console.warn("Main order form not found!")
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

            const formData = new FormData(contactForm) // Declare formData variable here

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

    // =====================================================================
    // 9. Функціональність спливаючої форми замовлення (Modal) - НОВИЙ БЛОК
    // =====================================================================
    const orderFormModal = document.getElementById("orderFormModal")
    const modalCloseBtn = orderFormModal ? orderFormModal.querySelector(".modal-close-btn") : null
    // Вибираємо всі кнопки, що мають href="#orderForm" або клас "order-service-btn"
    const orderTriggerButtons = document.querySelectorAll('a[href="#orderForm"], .order-service-btn, .mobile-header-cta')

    function openOrderModal() {
        if (orderFormModal) {
            orderFormModal.classList.add("is-visible")
            document.body.classList.add("modal-open") // Запобігаємо прокрутці фону
            orderFormModal.setAttribute("aria-hidden", "false")
            // Опціонально: фокусуємося на першому полі форми для доступності
            const firstInput = orderFormModal.querySelector("input, select, textarea")
            if (firstInput) {
                firstInput.focus()
            }
        }
    }

    function closeOrderModal() {
        if (orderFormModal) {
            orderFormModal.classList.remove("is-visible")
            document.body.classList.remove("modal-open") // Дозволяємо прокрутку фону
            orderFormModal.setAttribute("aria-hidden", "true")
            // Опціонально: повертаємо фокус на кнопку, яка відкрила модальне вікно
            // (потрібно зберігати посилання на останню натиснуту кнопку)
        }
    }

    // Initialize modal form logic using the new unique ID
    const modalOrderForm = orderFormModal ? orderFormModal.querySelector("#modalOrderForm") : null
    if (modalOrderForm) {
        setupFormLogic(modalOrderForm)
    } else {
        console.warn("Modal order form not found!")
    }

    // Додаємо обробники подій для кнопок, що відкривають форму
    orderTriggerButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            event.preventDefault() // Запобігаємо стандартній поведінці (прокрутці до якоря)
            openOrderModal()
        })
    })

    // Додаємо обробник для кнопки закриття модального вікна
    if (modalCloseBtn) {
        modalCloseBtn.addEventListener("click", closeOrderModal)
    }

    // Додаємо обробник для закриття модального вікна по кліку на фон
    if (orderFormModal) {
        orderFormModal.addEventListener("click", (event) => {
            if (event.target === orderFormModal) {
                // Перевіряємо, чи клік був саме по оверлею, а не по формі
                closeOrderModal()
            }
        })
    }

    // Додаємо обробник для закриття модального вікна по клавіші Escape
    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && orderFormModal && orderFormModal.classList.contains("is-visible")) {
            closeOrderModal()
        }
    })
})
