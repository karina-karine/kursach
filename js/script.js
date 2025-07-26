// // Mobile Menu Toggle
// document.addEventListener("DOMContentLoaded", () => {
//     const mobileMenuToggle = document.querySelector(".mobile-menu-toggle")
//     const nav = document.querySelector(".nav")

//     if (mobileMenuToggle && nav) {
//         mobileMenuToggle.addEventListener("click", () => {
//             nav.classList.toggle("nav-open")
//             mobileMenuToggle.classList.toggle("active")
//         })
//     }

//     // Smooth scrolling for anchor links
//     document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
//         anchor.addEventListener("click", function (e) {
//             e.preventDefault()
//             const target = document.querySelector(this.getAttribute("href"))
//             if (target) {
//                 target.scrollIntoView({
//                     behavior: "smooth",
//                     block: "start",
//                 })
//             }
//         })
//     })

//     // Form handling
//     const orderForm = document.getElementById("orderForm")
//     if (orderForm) {
//         const uniquenessSlider = document.getElementById("uniqueness")
//         const sliderValue = document.querySelector(".slider-value")

//         // Update slider value display
//         if (uniquenessSlider && sliderValue) {
//             uniquenessSlider.addEventListener("input", function () {
//                 sliderValue.textContent = this.value + "%"
//             })
//         }

//         // Form submission
//         orderForm.addEventListener("submit", function (e) {
//             e.preventDefault()

//             // Get form data
//             const formData = new FormData(this)
//             const data = Object.fromEntries(formData)

//             // Show loading state
//             const submitBtn = this.querySelector(".form-submit")
//             const originalText = submitBtn.textContent
//             submitBtn.textContent = "ВІДПРАВЛЯЄМО..."
//             submitBtn.disabled = true

//             // Simulate form submission (replace with actual API call)
//             setTimeout(() => {
//                 alert("Дякуємо! Ваше замовлення отримано. Ми зв'яжемося з вами найближчим часом.")
//                 this.reset()
//                 submitBtn.textContent = originalText
//                 submitBtn.disabled = false

//                 // Reset slider value
//                 if (sliderValue) {
//                     sliderValue.textContent = "80%"
//                 }
//             }, 2000)
//         })
//     }

//     // Services slider navigation
//     const servicesGrid = document.querySelector(".services-grid")
//     const servicePrevBtn = document.querySelector(".services .nav-prev")
//     const serviceNextBtn = document.querySelector(".services .nav-next")

//     if (servicesGrid && servicePrevBtn && serviceNextBtn) {
//         let currentIndex = 0
//         const cards = servicesGrid.querySelectorAll(".service-card")
//         const totalCards = cards.length

//         function updateSlider() {
//             const cardWidth = cards[0].offsetWidth + 32 // card width + gap
//             servicesGrid.style.transform = `translateX(-${currentIndex * cardWidth}px)`
//         }

//         servicePrevBtn.addEventListener("click", () => {
//             currentIndex = currentIndex > 0 ? currentIndex - 1 : totalCards - 1
//             updateSlider()
//         })

//         serviceNextBtn.addEventListener("click", () => {
//             currentIndex = currentIndex < totalCards - 1 ? currentIndex + 1 : 0
//             updateSlider()
//         })
//     }

//     // Reviews slider navigation
//     const reviewsSlider = document.querySelector(".reviews-slider")
//     const reviewsPrevBtn = document.querySelector(".reviews .nav-prev")
//     const reviewsNextBtn = document.querySelector(".reviews .nav-next")

//     if (reviewsSlider && reviewsPrevBtn && reviewsNextBtn) {
//         let reviewIndex = 0
//         const phones = reviewsSlider.querySelectorAll(".phone-mockup")
//         const totalPhones = phones.length

//         function updateReviewsSlider() {
//             const phoneWidth = phones[0].offsetWidth + 24 // phone width + gap
//             reviewsSlider.style.transform = `translateX(-${reviewIndex * phoneWidth}px)`
//         }

//         reviewsPrevBtn.addEventListener("click", () => {
//             reviewIndex = reviewIndex > 0 ? reviewIndex - 1 : totalPhones - 1
//             updateReviewsSlider()
//         })

//         reviewsNextBtn.addEventListener("click", () => {
//             reviewIndex = reviewIndex < totalPhones - 1 ? reviewIndex + 1 : 0
//             updateReviewsSlider()
//         })

//         // Auto-slide reviews every 5 seconds
//         setInterval(() => {
//             reviewIndex = reviewIndex < totalPhones - 1 ? reviewIndex + 1 : 0
//             updateReviewsSlider()
//         }, 5000)
//     }

//     // Scroll animations
//     const observerOptions = {
//         threshold: 0.1,
//         rootMargin: "0px 0px -50px 0px",
//     }

//     const observer = new IntersectionObserver((entries) => {
//         entries.forEach((entry) => {
//             if (entry.isIntersecting) {
//                 entry.target.style.opacity = "1"
//                 entry.target.style.transform = "translateY(0)"
//             }
//         })
//     }, observerOptions)

//     // Observe elements for scroll animations
//     document.querySelectorAll(".service-card, .guarantee-item, .phone-mockup").forEach((el) => {
//         el.style.opacity = "0"
//         el.style.transform = "translateY(30px)"
//         el.style.transition = "opacity 0.6s ease-out, transform 0.6s ease-out"
//         observer.observe(el)
//     })

//     // Header scroll effect
//     let lastScrollTop = 0
//     const header = document.querySelector(".header")

//     window.addEventListener("scroll", () => {
//         const scrollTop = window.pageYOffset || document.documentElement.scrollTop

//         if (scrollTop > lastScrollTop && scrollTop > 100) {
//             // Scrolling down
//             header.style.transform = "translateY(-100%)"
//         } else {
//             // Scrolling up
//             header.style.transform = "translateY(0)"
//         }

//         lastScrollTop = scrollTop
//     })

//     // Add scroll transition to header
//     header.style.transition = "transform 0.3s ease-in-out"

//     // File upload handling
//     const fileInput = document.getElementById("fileUpload")
//     const fileLabel = document.querySelector(".file-label")

//     if (fileInput && fileLabel) {
//         fileInput.addEventListener("change", function () {
//             const fileCount = this.files.length
//             if (fileCount > 0) {
//                 fileLabel.innerHTML = `
//                     <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
//                         <path d="M16.667 10L10 16.667 3.333 10M10 3.333v13.334" stroke="currentColor" stroke-width="2"/>
//                     </svg>
//                     Завантажено файлів: ${fileCount}
//                 `
//                 fileLabel.style.color = "var(--success-color)"
//                 fileLabel.style.borderColor = "var(--success-color)"
//             } else {
//                 fileLabel.innerHTML = `
//                     <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
//                         <path d="M10 5v10M5 10h10" stroke="currentColor" stroke-width="2"/>
//                     </svg>
//                     Додати файли
//                 `
//                 fileLabel.style.color = "var(--gray-600)"
//                 fileLabel.style.borderColor = "var(--gray-300)"
//             }
//         })
//     }

//     // Price calculator (basic implementation)
//     function calculatePrice() {
//         const workType = document.querySelector('select[name="work_type"]')?.value
//         const uniqueness = document.getElementById("uniqueness")?.value || 80
//         const deadline = document.querySelector('input[type="date"]')?.value

//         let basePrice = 0

//         switch (workType) {
//             case "coursework":
//                 basePrice = 500
//                 break
//             case "diploma":
//                 basePrice = 1500
//                 break
//             case "master":
//                 basePrice = 2500
//                 break
//             default:
//                 basePrice = 300
//         }

//         // Adjust price based on uniqueness
//         const uniquenessMultiplier = uniqueness / 100
//         basePrice *= 0.8 + uniquenessMultiplier * 0.4

//         // Adjust price based on deadline (if urgent)
//         if (deadline) {
//             const deadlineDate = new Date(deadline)
//             const today = new Date()
//             const daysUntilDeadline = Math.ceil((deadlineDate - today) / (1000 * 60 * 60 * 24))

//             if (daysUntilDeadline <= 3) {
//                 basePrice *= 1.5 // 50% surcharge for urgent orders
//             } else if (daysUntilDeadline <= 7) {
//                 basePrice *= 1.2 // 20% surcharge for quick orders
//             }
//         }

//         return Math.round(basePrice)
//     }

//     // Update price when form fields change
//     const priceFields = document.querySelectorAll('select[name="work_type"], #uniqueness, input[type="date"]')
//     priceFields.forEach((field) => {
//         field.addEventListener("change", () => {
//             const price = calculatePrice()
//             // You can display the calculated price somewhere in the UI
//             console.log("Estimated price:", price, "UAH")
//         })
//     })
// })

// // Utility functions
// function debounce(func, wait) {
//     let timeout
//     return function executedFunction(...args) {
//         const later = () => {
//             clearTimeout(timeout)
//             func(...args)
//         }
//         clearTimeout(timeout)
//         timeout = setTimeout(later, wait)
//     }
// }

// function throttle(func, limit) {
//     let inThrottle
//     return function () {
//         const args = arguments

//         if (!inThrottle) {
//             func.apply(this, args)
//             inThrottle = true
//             setTimeout(() => (inThrottle = false), limit)
//         }
//     }
// }

// // Performance optimization
// window.addEventListener("load", () => {
//     // Lazy load images
//     const images = document.querySelectorAll("img[data-src]")
//     const imageObserver = new IntersectionObserver((entries, observer) => {
//         entries.forEach((entry) => {
//             if (entry.isIntersecting) {
//                 const img = entry.target
//                 img.src = img.dataset.src
//                 img.removeAttribute("data-src")
//                 imageObserver.unobserve(img)
//             }
//         })
//     })

//     images.forEach((img) => imageObserver.observe(img))
// })
document.addEventListener('DOMContentLoaded', function () {
    const faqTriggers = document.querySelectorAll('.faq-trigger');

    faqTriggers.forEach(trigger => {
        trigger.addEventListener('click', function () {
            const content = this.nextElementSibling;
            const isExpanded = this.getAttribute('aria-expanded') === 'true';

            faqTriggers.forEach(otherTrigger => {
                if (otherTrigger !== this && otherTrigger.getAttribute('aria-expanded') === 'true') {
                    otherTrigger.setAttribute('aria-expanded', 'false');
                    otherTrigger.nextElementSibling.classList.remove('open');
                    otherTrigger.nextElementSibling.style.maxHeight = '0';
                    otherTrigger.nextElementSibling.style.paddingTop = '0';
                    otherTrigger.nextElementSibling.style.paddingBottom = '0';
                }
            });

            if (isExpanded) {
                this.setAttribute('aria-expanded', 'false');
                content.classList.remove('open');
                content.style.maxHeight = '0';
                content.style.paddingTop = '0';
                content.style.paddingBottom = '0';
            } else {
                this.setAttribute('aria-expanded', 'true');
                content.classList.add('open');
                content.style.maxHeight = content.scrollHeight + 'px';
                content.style.paddingTop = 'var(--space-md)';
                content.style.paddingBottom = 'var(--space-md)';
            }
        });
    });
});