document.addEventListener("DOMContentLoaded", () => {

    // =====================================================================
    // 2. Функціональність форми замовлення
    // =====================================================================

    // Повзунок унікальності
    const uniquenessSlider = document.getElementById("uniqueness")
    const uniquenessValue = document.querySelector(".uniqueness-slider .slider-value")

    if (uniquenessSlider && uniquenessValue) {
        uniquenessValue.textContent = `${uniquenessSlider.value}%` // Встановлюємо початкове значення
        uniquenessSlider.addEventListener("input", () => {
            uniquenessValue.textContent = `${uniquenessSlider.value}%`
        })
    }

    // Обробка завантаження файлів
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

    // Обробка відправки форми (приклад)
    const orderForm = document.getElementById("orderForm")
    if (orderForm) {
        orderForm.addEventListener("submit", (event) => {
            event.preventDefault() // ��апобігаємо стандартній відправці форми

            const formData = new FormData(orderForm)
            const data = {}
            formData.forEach((value, key) => {
                data[key] = value
            })

            // Додаємо значення повзунка унікальності
            if (uniquenessSlider) {
                data["uniqueness"] = uniquenessSlider.value + "%"
            }

            // Додаємо назви файлів (якщо є)
            if (fileInput && fileInput.files.length > 0) {
                data["files"] = Array.from(fileInput.files).map((file) => file.name)
            }

            console.log("Дані форми:", data)
            alert("Форма відправлена! Перевірте консоль для деталей.")

            // Тут ви можете додати AJAX-запит для відправки даних на сервер WordPress
            // Наприклад, використовуючи fetch API або jQuery.ajax
            // fetch('/wp-admin/admin-ajax.php', {
            //     method: 'POST',
            //     body: formData
            // })
            // .then(response => response.json())
            // .then(result => {
            //     console.log('Відповідь сервера:', result);
            //     if (result.success) {
            //         alert('Ваше замовлення успішно відправлено!');
            //         orderForm.reset(); // Очистити форму
            //     } else {
            //         alert('Помилка при відправці замовлення: ' + result.data);
            //     }
            // })
            // .catch(error => {
            //     console.error('Помилка мережі або сервера:', error);
            //     alert('Виникла помилка при відправці форми.');
            // });
        })
    }
})
// function initHorizontalSlider(containerSelector, prevSelector, nextSelector) {
//     const container = document.querySelector(containerSelector);
//     const prevBtn = document.querySelector(prevSelector);
//     const nextBtn = document.querySelector(nextSelector);

//     if (!container || !prevBtn || !nextBtn) return;

//     const cardWidth = container.querySelector('.service-card')?.offsetWidth || 300;
//     const gap = parseInt(getComputedStyle(container).gap) || 20;
//     const scrollStep = (cardWidth + gap) * 3; // скрол по 3 картки

//     function updateButtons() {
//         prevBtn.disabled = container.scrollLeft <= 0;
//         nextBtn.disabled = container.scrollLeft + container.clientWidth >= container.scrollWidth - 5;
//     }

//     prevBtn.addEventListener('click', () => {
//         container.scrollBy({ left: -(scrollStep), behavior: 'smooth' });
//     });

//     nextBtn.addEventListener('click', () => {
//         container.scrollBy({ left: scrollStep, behavior: 'smooth' });
//     });

//     container.addEventListener('scroll', updateButtons);
//     window.addEventListener('resize', updateButtons);

//     updateButtons(); // початковий стан
// }

// // ініціалізація
// initHorizontalSlider('.services-grid', '.services-navigation .nav-prev', '.services-navigation .nav-next');
// initHorizontalSlider('.reviews-slider', '.reviews-navigation .nav-prev', '.reviews-navigation .nav-next');
