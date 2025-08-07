<?php include 'header.php'; ?>

<main class="main">
    <!-- Hero Section -->
    <section class="hero">
        <h1 class="hero-title">Професійне написання <br> студентських робіт <br> на замовлення</h1>
        <div class="hero-content">
            <div class="hero-text-left">
                <p class="hero-description">Ми пропонуємо якісне та оперативне виконання будь-якої роботи. Наші експерти
                    гарантують індивідуальний підхід, високий рівень унікальності та дотримання всіх вимог вашого
                    навчального закладу.</p>
            </div>
            <div class="hero-image-center">
                <div class="hero-circles-background">
                    <!-- Найбільше півколо (найсвітліше) -->
                    <div class="circle-outer">
                        <svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                            <path d="M 0 200 A 200 200 0 0 1 400 200 Z" fill="rgba(59, 130, 246, 0.15)"
                                stroke="rgba(59, 130, 246, 0.3)" stroke-width="2" />
                        </svg>
                    </div>


                    <div class="circle-middle">
                        <svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                            <path d="M 0 200 A 200 200 0 0 1 400 200 Z" fill="rgba(59, 130, 246, 0.25)"
                                stroke="rgba(59, 130, 246, 0.4)" stroke-width="2" />
                        </svg>
                    </div>

                    <!-- Найменше півколо (найтемніше) -->
                    <div class="circle-inner">
                        <svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                            <path d="M 0 200 A 200 200 0 0 1 400 200 Z" fill="rgba(59, 130, 246, 0.4)"
                                stroke="rgba(59, 130, 246, 0.6)" stroke-width="2" />
                        </svg>
                    </div>
                </div>

                <div class="hero-image-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png" alt="Student"
                        class="hero-img">
                </div>
                <div class="hero-actions-overlay">
                    <a href="#orderForm" class="btn btn-primary">ЗАМОВИТИ РОБОТУ</a>
                    <a href="<?php echo home_url('/services/'); ?>" class="btn btn-secondary">ДІЗНАТИСЬ БІЛЬШЕ</a>
                </div>
            </div>
            <div class="hero-rating-right">
                <div class="rating-stars">★★★★★</div>
                <p class="rating-text"><strong>20 000+</strong> позитивних відгуків</p>
            </div>
        </div>
    </section>
    <!-- Guarantees Section -->
    <section class="guarantees">
        <div class="container">
            <h2 class="section-title">Наші гарантії</h2>
            <div class="guarantees-content">
                <div class="guarantees-image">
                    <div class="guarantees-image-container">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/student2.svg"
                            alt="Жінка працює за ноутбуком" class="guarantees-img">
                        <div class="lightbulb-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/bulb.svg">
                        </div>
                    </div>
                </div>
                <div class="guarantees-list">
                    <div class="guarantee-item">
                        <div class="guarantee-icon">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                                <circle cx="20" cy="20" r="18" fill="#4A90E2" />
                                <path d="M15 20l5 5 10-10" stroke="white" stroke-width="2" fill="none" />
                            </svg>
                        </div>
                        <div class="guarantee-content">
                            <h3 class="guarantee-title">Досвід</h3>
                            <p class="guarantee-text">
                                Якщо і довіряти написання своєї роботи комусь, то тільки досвідченій команді. Наші
                                автори написали понад 1000 різних робіт на всі возомжность теми.
                            </p>
                        </div>
                    </div>

                    <div class="guarantee-item">
                        <div class="guarantee-icon">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                                <circle cx="20" cy="20" r="18" fill="#4A90E2" />
                                <path d="M12 20h16M20 12v16" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                        <div class="guarantee-content">
                            <h3 class="guarantee-title">Необмежені правки</h3>
                            <p class="guarantee-text">
                                Навіщо замовляти роботу, якщо Ви потім виправляєте всю роботу? Нема чого. Ми пишемо
                                роботу від і до. За правки, які необхідно буде зробити в роботі платити не доведеться.
                            </p>
                        </div>
                    </div>

                    <div class="guarantee-item">
                        <div class="guarantee-icon">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                                <circle cx="20" cy="20" r="18" fill="#4A90E2" />
                                <path d="M20 10v10l6 6" stroke="white" stroke-width="2" fill="none" />
                            </svg>
                        </div>
                        <div class="guarantee-content">
                            <h3 class="guarantee-title">Супровід до захисту</h3>
                            <p class="guarantee-text">
                                Ми супроводжуємо вас до захисту, в разі необхідності внесення будь-яких коригувань по
                                роботі, ви завжди можете звернутися щодо внесення коректив на протязі місяця.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services">
        <div class="container">
            <h2 class="section-title">Наші послуги</h2>

            <div class="services-wrapper">
                <div class="services-track">
                    <div class="service-card">
                        <div class="service-header">
                            <h3 class="service-title">Курсова робота</h3>
                            <div class="service-price">від 1 дня</div>
                        </div>
                        <div class="service-details">
                            <div class="service-detail">
                                <span class="detail-label">Термін:</span>
                                <span class="detail-value">від 1 дня</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Кількість сторінок:</span>
                                <span class="detail-value">За вимогою</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Безкоштовні правки:</span>
                                <span class="detail-value">1 місяць</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Унікальність:</span>
                                <span class="detail-value">від 60%</span>
                            </div>
                        </div>
                        <div class="service-features">
                            <p>Що також входить:</p>
                            <p><strong>План, консультації щодо успішного захисту, звіт перевірки на антиплагіат</strong>
                            </p>
                        </div>
                        <a href="#orderForm" class="btn btn-primary service-btn">ЗАМОВИТИ РОБОТУ</a>
                    </div>

                    <div class="service-card">
                        <div class="service-header">
                            <h3 class="service-title">Дипломні роботи</h3>
                            <div class="service-price">від 3 днів</div>
                        </div>
                        <div class="service-details">
                            <div class="service-detail">
                                <span class="detail-label">Термін:</span>
                                <span class="detail-value">від 3 днів</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Кількість сторінок:</span>
                                <span class="detail-value">За вимогою</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Безкоштовні правки:</span>
                                <span class="detail-value">1 місяць</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Унікальність:</span>
                                <span class="detail-value">від 60%</span>
                            </div>
                        </div>
                        <div class="service-features">
                            <p>Що також входить:</p>
                            <p><strong>План, консультації щодо успішного захисту, звіт перевірки на антиплагіат</strong>
                            </p>
                        </div>
                        <a href="#orderForm" class="btn btn-primary service-btn">ЗАМОВИТИ РОБОТУ</a>
                    </div>

                    <div class="service-card">
                        <div class="service-header">
                            <h3 class="service-title">Магістерська робота</h3>
                            <div class="service-price">від 10 днів</div>
                        </div>
                        <div class="service-details">
                            <div class="service-detail">
                                <span class="detail-label">Термін:</span>
                                <span class="detail-value">від 10 днів</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Кількість сторінок:</span>
                                <span class="detail-value">За замовою</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Безкоштовні правки:</span>
                                <span class="detail-value">1 місяць</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Унікальність:</span>
                                <span class="detail-value">від 60%</span>
                            </div>
                        </div>
                        <div class="service-features">
                            <p>Що також входить:</p>
                            <p><strong>План, консультації щодо успішного захисту, звіт перевірки на антиплагіат</strong>
                            </p>
                        </div>
                        <a href="#orderForm" class="btn btn-primary service-btn">ЗАМОВИТИ РОБОТУ</a>
                    </div>

                    <div class="service-card">
                        <div class="service-header">
                            <h3 class="service-title">Реферат</h3>
                            <div class="service-price">від 1 дня</div>
                        </div>
                        <div class="service-details">
                            <div class="service-detail">
                                <span class="detail-label">Термін:</span>
                                <span class="detail-value">від 1 дня</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Кількість сторінок:</span>
                                <span class="detail-value">5–15</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Безкоштовні правки:</span>
                                <span class="detail-value">1 тиждень</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Унікальність:</span>
                                <span class="detail-value">від 70%</span>
                            </div>
                        </div>
                        <div class="service-features">
                            <p>Що також входить:</p>
                            <p><strong>Оформлення згідно стандартів, список літератури</strong></p>
                        </div>
                        <a href="#orderForm" class="btn btn-primary service-btn">ЗАМОВИТИ РОБОТУ</a>
                    </div>

                    <div class="service-card">
                        <div class="service-header">
                            <h3 class="service-title">Звіти з практики</h3>
                            <div class="service-price">від 2 днів</div>
                        </div>
                        <div class="service-details">
                            <div class="service-detail">
                                <span class="detail-label">Термін:</span>
                                <span class="detail-value">від 2 днів</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Кількість сторінок:</span>
                                <span class="detail-value">За вимогою</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Безкоштовні правки:</span>
                                <span class="detail-value">1 місяць</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Унікальність:</span>
                                <span class="detail-value">від 65%</span>
                            </div>
                        </div>
                        <div class="service-features">
                            <p>Що також входить:</p>
                            <p><strong>Опис підприємства, практичні завдання, щоденник практики</strong></p>
                        </div>
                        <a href="#orderForm" class="btn btn-primary service-btn">ЗАМОВИТИ РОБОТУ</a>
                    </div>

                    <div class="service-card">
                        <div class="service-header">
                            <h3 class="service-title">Мотиваційні листи</h3>
                            <div class="service-price">від 1 дня</div>
                        </div>
                        <div class="service-details">
                            <div class="service-detail">
                                <span class="detail-label">Термін:</span>
                                <span class="detail-value">1 день</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Кількість сторінок:</span>
                                <span class="detail-value">1–2</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Безкоштовні правки:</span>
                                <span class="detail-value">3 дні</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Унікальність:</span>
                                <span class="detail-value">100%</span>
                            </div>
                        </div>
                        <div class="service-features">
                            <p>Що також входить:</p>
                            <p><strong>Індивідуальний підхід, відповідність вимогам ВНЗ</strong></p>
                        </div>
                        <a href="#orderForm" class="btn btn-primary service-btn">ЗАМОВИТИ РОБОТУ</a>
                    </div>

                    <div class="service-card">
                        <div class="service-header">
                            <h3 class="service-title">Інші види робіт</h3>
                            <div class="service-price">договірна</div>
                        </div>
                        <div class="service-details">
                            <div class="service-detail">
                                <span class="detail-label">Термін:</span>
                                <span class="detail-value">За домовленістю</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Кількість сторінок:</span>
                                <span class="detail-value">Індивідуально</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Безкоштовні правки:</span>
                                <span class="detail-value">За погодженням</span>
                            </div>
                            <div class="service-detail">
                                <span class="detail-label">Унікальність:</span>
                                <span class="detail-value">від 60%</span>
                            </div>
                        </div>
                        <div class="service-features">
                            <p>Що також входить:</p>
                            <p><strong>Реферати, контрольні, презентації, індивідуальні завдання</strong></p>
                        </div>
                        <a href="#orderForm" class="btn btn-primary service-btn">ЗАМОВИТИ РОБОТУ</a>
                    </div>


                </div>
            </div>

            <div class="services-navigation">
                <button class="nav-btn nav-prev">‹</button>
                <button class="nav-btn nav-next">›</button>
            </div>
        </div>
    </section>

    <!-- Client Reviews Section -->
    <section class="reviews">
        <div class="container">
            <h2 class="section-title">Відгуки наших клієнтів</h2>
            <div class="reviews-content">
                <div class="reviews-wrapper">
                    <div class="reviews-track">
                        <div class="phone-mockup">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png">
                        </div>
                        <div class="phone-mockup">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png">
                        </div>
                        <div class="phone-mockup">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png">
                        </div>
                        <div class="phone-mockup">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png">
                        </div>
                        <div class="phone-mockup">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png">
                        </div>
                        <div class="phone-mockup">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png">
                        </div>
                        <div class="phone-mockup">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png">
                        </div>
                        <div class="phone-mockup">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png">
                        </div>
                    </div>
                </div>

                <div class="reviews-navigation">
                    <button class="nav-btn nav-prev">‹</button>
                    <button class="nav-btn nav-next">›</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Referral Section -->
    <section class="referral">
        <div class="container">
            <div class="referral-content">
                <div class="referral-text">
                    <h2 class="referral-title">Заощаджуй і заробляй з друзями</h2>
                    <div class="referral-benefits">
                        <div class="benefit-item">
                            <span class="benefit-text">Приведи друга і ви отримаєте</span>
                            <div class="benefit-discount">
                                <span class="discount-percent">10%</span>
                                <span class="discount-text">на курсові та інші роботи</span>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <span class="benefit-text">по</span>
                            <div class="benefit-discount">
                                <span class="discount-percent">5%</span>
                                <span class="discount-text">на дипломні роботи</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="referral-image">
                    <div class="phone-hands">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/hand-phone.svg"
                            alt="Телефон в руках з додатком">
                    </div>
                </div> -->
            </div>
        </div>

        <!-- SVG півкола фон -->
        <div class="referral-circles-background">
            <div class="phone-hands">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/hand-phone.svg"
                    alt="Телефон в руках з додатком">
            </div>
            <!-- Найбільше півколо (найсвітліше) -->
            <div class="referral-circle-outer">
                <svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 0 200 A 200 200 0 0 1 400 200 Z" fill="rgba(59, 130, 246, 0.15)"
                        stroke="rgba(59, 130, 246, 0.3)" stroke-width="2" />
                </svg>
            </div>

            <!-- Середнє півколо -->
            <div class="referral-circle-middle">
                <svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 0 200 A 200 200 0 0 1 400 200 Z" fill="rgba(59, 130, 246, 0.25)"
                        stroke="rgba(59, 130, 246, 0.4)" stroke-width="2" />
                </svg>
            </div>

            <!-- Найменше півколо (найтемніше) -->
            <div class="referral-circle-inner">
                <svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 0 200 A 200 200 0 0 1 400 200 Z" fill="rgba(59, 130, 246, 0.4)"
                        stroke="rgba(59, 130, 246, 0.6)" stroke-width="2" />
                </svg>
            </div>
        </div>
    </section>
    <!-- Order Form Section -->
    <section class="order-form">
        <div class="container">
            <div class="order-content">
                <div class="order-text">
                    <h2 class="order-title">Зробіть замовлення прямо зараз</h2>
                    <p class="order-description">
                        Ви отримаєте якісну та унікальну роботу, яка відповідатиме всім методичним
                        рекомендаціям та побажанням викладача. Нашу роботу ви без проблем здасте
                        та захистите на високу оцінку.
                    </p>
                    <div class="order-illustration">
                        <!-- Використовуємо get_template_directory_uri() для коректного шляху в WordPress -->
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/book.svg"
                            alt="Ілюстрація книг та олівця">
                    </div>
                </div>
                <div class="order-form-container">
                    <!-- Змінюємо action форми на шлях до нашого PHP-скрипта -->
                    <!-- Важливо: action буде оброблятися JavaScript через fetch, тому можна залишити порожнім або вказати # -->
                    <form class="form" id="orderForm" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" class="form-input" placeholder="Ім'я" name="user_name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-input" placeholder="E-mail" name="user_email" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="tel" class="form-input" placeholder="Номер телефону" name="user_phone"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" placeholder="@Нік телеграму" name="study_program">
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-select" id="type-work" name="work_type" required>
                                <option value="">Тип роботи</option>
                                <option value="coursework">Курсова робота</option>
                                <option value="diploma">Дипломна робота</option>
                                <option value="master">Магістерська робота</option>
                                <option value="other">Інше</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" class="form-input" placeholder="Тема роботи" name="work_topic">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-input" placeholder="Дата виконання" name="due_date"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="uniqueness-slider">
                                <label for="uniqueness">Унікальність роботи</label>
                                <input type="range" id="uniqueness" min="60" max="100" value="80" class="slider"
                                    name="uniqueness">
                                <div class="slider-value">80%</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-textarea" placeholder="Опис сторінок: 21" rows="3"
                                name="work_description"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="file-upload">
                                <input type="file" id="fileUpload" class="file-input" name="uploaded_files[]" multiple>
                                <label for="fileUpload" class="file-label">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M10 5v10M5 10h10" stroke="currentColor" stroke-width="2" />
                                    </svg>
                                    Додати файли
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-large form-submit">
                            ЗАМОВИТИ РОБОТУ
                        </button>
                        <div id="form-message" style="margin-top: 15px; text-align: center; font-weight: bold;"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Контактна форма (якщо вона також є кастомною і потребує обробки) -->
    <!-- Якщо контактна форма також має бути оброблена PHP, вам потрібно буде створити окремий PHP-скрипт для неї або розширити існуючий. -->
    <!-- <form id="contactForm" method="POST">
    ... поля контактної форми ...
    <div id="contact-form-message"></div>
</form> -->
</main>

<?php include 'footer.php'; ?>