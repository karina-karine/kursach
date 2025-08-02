
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
                content.style.maxHeight = (content.scrollHeight + 100) + 'px';
                content.style.paddingTop = 'var(--space-md)';
                content.style.paddingBottom = 'var(--space-md)';
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Отримуємо всі елементи навігації
    const serviceNavItems = document.querySelectorAll('.service-nav-item');

    // Додаємо обробник кліків для кожного елемента
    serviceNavItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault(); // Запобігаємо стандартній поведінці посилання

            const serviceId = this.getAttribute('data-service-id');
            const serviceData = servicesData[serviceId];

            if (serviceData) {
                // Оновлюємо активний стан навігації
                updateActiveNavItem(this);

                // Оновлюємо контент на сторінці
                updateServiceContent(serviceData);

                // Оновлюємо URL без перезавантаження сторінки
                updateURL(serviceId);

                // Додаємо плавну анімацію
                animateContentChange();
            }
        });
    });

    // Функція для оновлення активного елемента навігації
    function updateActiveNavItem(clickedItem) {
        // Видаляємо клас active з усіх елементів
        serviceNavItems.forEach(item => {
            item.classList.remove('active');
        });

        // Додаємо клас active до натиснутого елемента
        clickedItem.classList.add('active');
    }

    // Функція для оновлення контенту послуги
    function updateServiceContent(serviceData) {
        // Оновлюємо заголовок та breadcrumb
        const titleElement = document.getElementById('detail-title');
        const breadcrumbTitle = document.getElementById('detail-breadcrumb-title');

        if (titleElement) titleElement.textContent = serviceData.name;
        if (breadcrumbTitle) breadcrumbTitle.textContent = serviceData.name;

        // Оновлюємо іконку
        const iconElement = document.getElementById('detail-icon');
        if (iconElement) iconElement.textContent = serviceData.icon;

        // Оновлюємо короткий опис
        const shortDescElement = document.getElementById('detail-short-description');
        if (shortDescElement) shortDescElement.textContent = serviceData.short_description;

        // Оновлюємо ціну
        const priceElement = document.getElementById('detail-price');
        if (priceElement) {
            priceElement.innerHTML = `Ціна від: ${serviceData.price_from} грн`;
        }

        // Оновлюємо термін виконання
        const deliveryTimeElement = document.getElementById('detail-delivery-time');
        if (deliveryTimeElement) {
            deliveryTimeElement.innerHTML = `Термін виконання: ${serviceData.delivery_time}`;
        }

        // Оновлюємо повний опис
        const fullDescElement = document.getElementById('detail-full-description');
        if (fullDescElement) {
            const descParagraph = fullDescElement.querySelector('p');
            if (descParagraph) {
                descParagraph.textContent = serviceData.full_description;
            }
        }

        // Оновлюємо особливості
        updateFeatures(serviceData.features);

        // Оновлюємо вимоги
        updateRequirements(serviceData.requirements);

        // Оновлюємо процес виконання
        updateProcess(serviceData.process);
    }

    // Функція для оновлення особливостей
    function updateFeatures(features) {
        const featuresContainer = document.getElementById('detail-features');
        if (featuresContainer && features && features.length > 0) {
            featuresContainer.innerHTML = '';
            features.forEach(feature => {
                const li = document.createElement('li');
                li.innerHTML = `<span class="feature-icon">&#10003;</span> ${feature}`;
                featuresContainer.appendChild(li);
            });

            // Показуємо секцію, якщо вона прихована
            const featuresSection = featuresContainer.closest('.service-details-features');
            if (featuresSection) featuresSection.style.display = 'block';
        } else {
            // Приховуємо секцію, якщо немає даних
            const featuresSection = document.querySelector('.service-details-features');
            if (featuresSection) featuresSection.style.display = 'none';
        }
    }

    // Функція для оновлення вимог
    function updateRequirements(requirements) {
        const requirementsContainer = document.getElementById('detail-requirements');
        if (requirementsContainer && requirements && requirements.length > 0) {
            requirementsContainer.innerHTML = '';
            requirements.forEach(requirement => {
                const li = document.createElement('li');
                li.innerHTML = `<span class="requirement-icon">&#9679;</span> ${requirement}`;
                requirementsContainer.appendChild(li);
            });

            // Показуємо секцію
            const requirementsSection = requirementsContainer.closest('.service-details-requirements');
            if (requirementsSection) requirementsSection.style.display = 'block';
        } else {
            // Приховуємо секцію
            const requirementsSection = document.querySelector('.service-details-requirements');
            if (requirementsSection) requirementsSection.style.display = 'none';
        }
    }

    // Функція для оновлення процесу виконання
    function updateProcess(process) {
        const processContainer = document.getElementById('detail-process');
        if (processContainer && process && process.length > 0) {
            processContainer.innerHTML = '';
            process.forEach(step => {
                const li = document.createElement('li');
                li.textContent = step;
                processContainer.appendChild(li);
            });

            // Показуємо секцію
            const processSection = processContainer.closest('.service-details-process');
            if (processSection) processSection.style.display = 'block';
        } else {
            // Приховуємо секцію
            const processSection = document.querySelector('.service-details-process');
            if (processSection) processSection.style.display = 'none';
        }
    }

    // Функція для оновлення URL
    function updateURL(serviceId) {
        const newUrl = new URL(window.location);
        newUrl.searchParams.set('service_id', serviceId);
        window.history.pushState({ serviceId: serviceId }, '', newUrl);
    }

    // Функція для анімації зміни контенту
    function animateContentChange() {
        const mainContent = document.querySelector('.service-details-main');
        if (mainContent) {
            // Додаємо клас для анімації
            mainContent.style.opacity = '0.7';
            mainContent.style.transform = 'translateY(10px)';

            // Повертаємо нормальний стан через короткий час
            setTimeout(() => {
                mainContent.style.opacity = '1';
                mainContent.style.transform = 'translateY(0)';
            }, 150);
        }
    }

    // Обробник для кнопки "Назад" браузера
    window.addEventListener('popstate', function (event) {
        if (event.state && event.state.serviceId) {
            const serviceData = servicesData[event.state.serviceId];
            if (serviceData) {
                // Знаходимо відповідний елемент навігації
                const navItem = document.querySelector(`[data-service-id="${event.state.serviceId}"]`);
                if (navItem) {
                    updateActiveNavItem(navItem);
                    updateServiceContent(serviceData);
                }
            }
        }
    });

    // Ініціалізуємо стан при завантаженні сторінки
    const urlParams = new URLSearchParams(window.location.search);
    const currentServiceId = urlParams.get('service_id');
    if (currentServiceId && servicesData[currentServiceId]) {
        // Встановлюємо початковий стан для history API
        window.history.replaceState({ serviceId: currentServiceId }, '', window.location);
    }
});

function initSlider(trackSelector, cardSelector, prevSelector, nextSelector) {
    const track = document.querySelector(trackSelector);
    const cards = document.querySelectorAll(cardSelector);
    const prevBtn = document.querySelector(prevSelector);
    const nextBtn = document.querySelector(nextSelector);

    if (!track || cards.length === 0 || !prevBtn || !nextBtn) return;

    let index = 0;
    const totalCards = cards.length;
    let visibleCards = getVisibleCards(); // динамічно рахуємо

    // функція для визначення кількості карток, що вміщаються
    function getVisibleCards() {
        if (window.innerWidth < 700) return 1;
        if (window.innerWidth < 1100) return 2;
        return 3; // за замовчуванням
    }

    function updateSlider() {
        const offset = -(index * (100 / visibleCards));
        track.style.transform = `translateX(${offset}%)`;
    }

    function handleResize() {
        visibleCards = getVisibleCards();
        index = 0;
        track.style.transform = 'translateX(0)';
        cards.forEach(card => {
            card.style.flex = `0 0 calc(${100 / visibleCards}% - var(--space-xl))`;
        });
    }

    nextBtn.addEventListener('click', () => {
        if (index < totalCards - visibleCards) {
            index++;
            updateSlider();
        }
    });

    prevBtn.addEventListener('click', () => {
        if (index > 0) {
            index--;
            updateSlider();
        }
    });

    // слухаємо зміну ширини
    window.addEventListener('resize', handleResize);
    handleResize(); // ініціалізація
}

// ініціалізація для services
initSlider('.services-track', '.service-card', '.services-navigation .nav-prev', '.services-navigation .nav-next');

// ініціалізація для reviews
initSlider('.reviews-track', '.phone-mockup', '.reviews-navigation .nav-prev', '.reviews-navigation .nav-next');

function setEqualHeights(selector) {
    const cards = document.querySelectorAll(selector);
    let maxHeight = 0;

    // Скидаємо стару висоту
    cards.forEach(card => card.style.height = 'auto');

    // Знаходимо максимальну висоту
    cards.forEach(card => {
        maxHeight = Math.max(maxHeight, card.offsetHeight);
    });

    // Присвоюємо всім однакову
    cards.forEach(card => card.style.height = maxHeight + 'px');
}

// Виклик після завантаження і при ресайзі
window.addEventListener('load', () => setEqualHeights('.service-card'));
window.addEventListener('resize', () => setEqualHeights('.service-card'));