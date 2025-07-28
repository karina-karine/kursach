// script.js
document.addEventListener("DOMContentLoaded", () => {
    const readAlsoGrid = document.querySelector(".read-also-grid")
    const prevArrow = document.querySelector(".read-also-section .prev-arrow")
    const nextArrow = document.querySelector(".read-also-section .next-arrow")

    if (readAlsoGrid && prevArrow && nextArrow) {
        // Визначаємо кількість прокрутки: половина ширини сітки для плавного переходу
        const scrollAmount = readAlsoGrid.offsetWidth / 2

        prevArrow.addEventListener("click", () => {
            readAlsoGrid.scrollBy({
                left: -scrollAmount,
                behavior: "smooth",
            })
        })

        nextArrow.addEventListener("click", () => {
            readAlsoGrid.scrollBy({
                left: scrollAmount,
                behavior: "smooth",
            })
        })

        // Оновлення стану стрілок (активні/неактивні) залежно від позиції прокрутки
        const updateArrowStates = () => {
            // Якщо прокрутка на початку, вимикаємо попередню стрілку
            if (readAlsoGrid.scrollLeft === 0) {
                prevArrow.classList.add("disabled")
            } else {
                prevArrow.classList.remove("disabled")
            }

            // Якщо прокрутка досягла кінця, вимикаємо наступну стрілку
            // Додаємо невеликий допуск (-1) для уникнення проблем з округленням
            if (readAlsoGrid.scrollLeft + readAlsoGrid.clientWidth >= readAlsoGrid.scrollWidth - 1) {
                nextArrow.classList.add("disabled")
            } else {
                nextArrow.classList.remove("disabled")
            }
        }

        // Додаємо слухач подій для оновлення стану стрілок при прокрутці
        readAlsoGrid.addEventListener("scroll", updateArrowStates)
        // Викликаємо функцію один раз при завантаженні, щоб встановити початковий стан
        updateArrowStates()
    }
})
