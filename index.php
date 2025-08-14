<?php include 'header.php'; ?>
<main class="main">
    <section class="hero">
        <h1 class="hero-title">
            Професійне написання <br> студентських робіт <strong><span class="hero-experience">Працюємо з 2018
                    року</span></strong>
        </h1>
        <div class="hero-content">
            <div class="hero-text-left">
                <p class="hero-description">
                    Ми пропонуємо якісне та оперативне виконання будь-яких студентських робіт: <strong>курсових,
                        дипломних, магістерських, рефератів та звітів з практики</strong>.
                    Замовте роботу у нас і отримайте відмінний результат для успішного навчання!
                </p>
            </div>
            <div class="hero-image-center">
                <div class="hero-circles-background">
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
                    <div class="circle-inner">
                        <svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                            <path d="M 0 200 A 200 200 0 0 1 400 200 Z" fill="rgba(59, 130, 246, 0.4)"
                                stroke="rgba(59, 130, 246, 0.6)" stroke-width="2" />
                        </svg>
                    </div>
                </div>
                <div class="hero-image-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png"
                        alt="Щасливий студент, який успішно здав курсову роботу, тримаючи диплом" class="hero-img"
                        loading="eager">
                </div>
                <div class="hero-actions-overlay">
                    <a href="#orderForm" class="btn btn-primary">ЗАМОВИТИ РОБОТУ</a>
                    <a href="<?php echo home_url('/services/'); ?>" class="btn btn-secondary">ВСЕ ПРО
                        ПОСЛУГИ</a>
                </div>
            </div>
            <div class="hero-rating-right" itemscope itemtype="https://schema.org/AggregateRating">
                <div class="rating-stars" itemprop="ratingValue">★★★★★</div>
                <p class="rating-text">
                    <strong itemprop="reviewCount">25 000+</strong> позитивних відгуків
                </p>
            </div>
        </div>
    </section>

    <section class="guarantees">
        <div class="container">
            <h2 class="section-title">Наші ключові гарантії якості та успіху</h2>
            <div class="guarantees-content">
                <div class="guarantees-image">
                    <div class="guarantees-image-container">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/student2.svg"
                            alt="Жінка-експерт працює за ноутбуком, символізуючи професіоналізм та якість виконання робіт"
                            class="guarantees-img" loading="lazy">
                        <div class="lightbulb-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/bulb.svg"
                                alt="Іконка лампочки, що символізує нові ідеї та інноваційні рішення у написанні робіт"
                                loading="lazy">
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
                            <h3 class="guarantee-title">Досвід авторів</h3>
                            <p class="guarantee-text">
                                Якщо і довіряти написання своєї роботи комусь, то тільки досвідченій команді. Наші
                                автори написали понад <strong>10 000 різних робіт</strong> на всі можливі теми,
                                гарантуючи високу якість та унікальність.
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
                            <h3 class="guarantee-title">Необмежені безкоштовні правки</h3>
                            <p class="guarantee-text">
                                Навіщо платити за роботу, яку доводиться переробляти?
                                Замовляючи у нас, ви отримуєте повністю готову та якісну роботу з першого разу.
                                Усі необхідні доопрацювання — без жодних доплат. Ми доводимо роботу до ідеалу.
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
                            <h3 class="guarantee-title">Повний супровід до успішного захисту</h3>
                            <p class="guarantee-text">
                                Ми супроводжуємо вас до захисту. У разі необхідності внесення будь-яких коригувань по
                                роботі, ви завжди можете звернутися щодо внесення коректив протягом місяця після
                                отримання.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <h2 class="section-title">Наші послуги з написання студентських робіт</h2>
            <div class="services-wrapper">
                <div class="services-track">
                    <div class="service-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-header">
                            <h3 class="service-title" itemprop="name">Курсова робота</h3>
                        </div>
                        <div class="service-details" itemprop="description">
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
                                <span class="detail-value">від 80%</span>
                            </div>
                        </div>
                        <div class="service-features">
                            <p>Що також входить:</p>
                            <p><strong>План, консультації щодо успішного захисту, звіт перевірки на антиплагіат</strong>
                            </p>
                        </div>
                        <a href="#orderForm" class="btn btn-primary service-btn">ЗАМОВИТИ РОБОТУ</a>
                    </div>
                    <div class="service-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-header">
                            <h3 class="service-title" itemprop="name">Дипломні роботи</h3>
                        </div>
                        <div class="service-details" itemprop="description">
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
                                <span class="detail-value">від 80%</span>
                            </div>
                        </div>
                        <div class="service-features">
                            <p>Що також входить:</p>
                            <p><strong>План, консультації щодо успішного захисту, звіт перевірки на антиплагіат</strong>
                            </p>
                        </div>
                        <a href="#orderForm" class="btn btn-primary service-btn">ЗАМОВИТИ РОБОТУ</a>
                    </div>
                    <div class="service-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-header">
                            <h3 class="service-title" itemprop="name">Магістерська робота</h3>
                        </div>
                        <div class="service-details" itemprop="description">
                            <div class="service-detail">
                                <span class="detail-label">Термін:</span>
                                <span class="detail-value">від 10 днів</span>
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
                                <span class="detail-value">від 80%</span>
                            </div>
                        </div>
                        <div class="service-features">
                            <p>Що також входить:</p>
                            <p><strong>План, консультації щодо успішного захисту, звіт перевірки на антиплагіат</strong>
                            </p>
                        </div>
                        <a href="#orderForm" class="btn btn-primary service-btn">ЗАМОВИТИ РОБОТУ</a>
                    </div>
                    <div class="service-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-header">
                            <h3 class="service-title" itemprop="name">Реферат</h3>
                        </div>
                        <div class="service-details" itemprop="description">
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
                        <a href="#orderForm" class="btn btn-primary service-btn">ЗАМОВИТИ РЕФЕРАТ</a>
                    </div>
                    <div class="service-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-header">
                            <h3 class="service-title" itemprop="name">Звіти з практики</h3>
                        </div>
                        <div class="service-details" itemprop="description">
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
                        <a href="#orderForm" class="btn btn-primary service-btn">ЗАМОВИТИ ЗВІТ</a>
                    </div>
                    <div class="service-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-header">
                            <h3 class="service-title" itemprop="name">Мотиваційні листи</h3>
                        </div>
                        <div class="service-details" itemprop="description">
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
                        <a href="#orderForm" class="btn btn-primary service-btn">ЗАМОВИТИ ЛИСТ</a>
                    </div>
                    <div class="service-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-header">
                            <h3 class="service-title" itemprop="name">Інші види робіт</h3>

                        </div>
                        <div class="service-details" itemprop="description">
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
                        <a href="#orderForm" class="btn btn-primary service-btn">ЗАМОВИТИ ІНШУ РОБОТУ</a>
                    </div>
                </div>
            </div>
            <div class="services-navigation">
                <button class="nav-btn nav-prev" aria-label="Попередня послуга">‹</button>
                <button class="nav-btn nav-next" aria-label="Наступна послуга">›</button>
            </div>
        </div>
    </section>

    <section class="reviews">
        <div class="container">
            <h2 class="section-title">Реальні відгуки наших задоволених клієнтів</h2>
            <div class="reviews-content">
                <div class="reviews-wrapper">
                    <div class="reviews-track">
                        <div class="phone-mockup">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png"
                                alt="Скріншот позитивного відгуку студента" loading="lazy">
                        </div>
                        <div class="phone-mockup">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png"
                                alt="Скріншот позитивного відгуку студента" loading="lazy">
                        </div>
                        <div class="phone-mockup">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png"
                                alt="Скріншот позитивного відгуку студента" loading="lazy">
                        </div>
                        <div class="phone-mockup">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png"
                                alt="Скріншот позитивного відгуку студента" loading="lazy">
                        </div>
                        <div class="phone-mockup">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png"
                                alt="Скріншот позитивного відгуку студента" loading="lazy">
                        </div>
                        <div class="phone-mockup">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png"
                                alt="Скріншот позитивного відгуку студента" loading="lazy">
                        </div>

                    </div>
                </div>
                <div class="reviews-navigation">
                    <button class="nav-btn nav-prev" aria-label="Попередній відгук">‹</button>
                    <button class="nav-btn nav-next" aria-label="Наступний відгук">›</button>
                </div>
            </div>
        </div>
    </section>

    <section class="referral">
        <div class="container">
            <div class="referral-content">
                <div class="referral-text">
                    <h2 class="referral-title">Заощаджуй та заробляй з друзями: вигідна реферальна програма</h2>
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
            </div>
        </div>
        <div class="referral-circles-background">
            <div class="phone-hands">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/hand-phone.svg"
                    alt="Руки тримають телефон з додатком реферальної програми, що символізує вигоду" loading="lazy">
            </div>
            <div class="referral-circle-outer">
                <svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 0 200 A 200 200 0 0 1 400 200 Z" fill="rgba(59, 130, 246, 0.15)"
                        stroke="rgba(59, 130, 246, 0.3)" stroke-width="2" />
                </svg>
            </div>
            <div class="referral-circle-middle">
                <svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 0 200 A 200 200 0 0 1 400 200 Z" fill="rgba(59, 130, 246, 0.25)"
                        stroke="rgba(59, 130, 246, 0.4)" stroke-width="2" />
                </svg>
            </div>
            <div class="referral-circle-inner">
                <svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 0 200 A 200 200 0 0 1 400 200 Z" fill="rgba(59, 130, 246, 0.4)"
                        stroke="rgba(59, 130, 246, 0.6)" stroke-width="2" />
                </svg>
            </div>
        </div>
    </section>

    <section class="order-form" id="orderForm">
        <div class="container">
            <div class="order-content">
                <div class="order-text">
                    <h2 class="order-title">Зробіть замовлення прямо зараз: швидко та зручно</h2>
                    <p class="order-description">
                        Ви отримаєте якісну та унікальну роботу, яка відповідатиме всім методичним
                        рекомендаціям та побажанням викладача. Нашу роботу ви без проблем здасте
                        та захистите на високу оцінку. Заповніть форму, щоб розпочати співпрацю!
                    </p>
                    <div class="order-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/book.svg"
                            alt="Ілюстрація книг та олівця, що символізує навчання та написання робіт" loading="lazy">
                    </div>
                </div>
                <div class="order-form-container">
                    <form class="form" id="orderForm" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="user_name" class="sr-only">Ваше ім'я</label>
                                <input type="text" id="user_name" class="form-input" placeholder="Ім'я" name="user_name"
                                    required aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="user_email" class="sr-only">Ваш E-mail</label>
                                <input type="email" id="user_email" class="form-input" placeholder="E-mail"
                                    name="user_email" required aria-required="true">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="user_phone" class="sr-only">Номер телефону</label>
                                <input type="tel" id="user_phone" class="form-input" placeholder="Номер телефону"
                                    name="user_phone" required aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="telegram_nick" class="sr-only">Нік телеграму</label>
                                <input type="text" id="telegram_nick" class="form-input" placeholder="@Нік телеграму"
                                    name="telegram_nick">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type-work" class="sr-only">Тип роботи</label>
                            <select class="form-select" id="type-work" name="work_type" required aria-required="true">
                                <option value="">Тип роботи</option>
                                <option value="coursework">Курсова робота</option>
                                <option value="diploma">Дипломна робота</option>
                                <option value="master">Магістерська робота</option>
                                <option value="other">Інше</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="work_topic" class="sr-only">Тема роботи</label>
                                <input type="text" id="work_topic" class="form-input" placeholder="Тема роботи"
                                    name="work_topic">
                            </div>
                            <div class="form-group">
                                <label for="due_date" class="sr-only">Дата виконання</label>
                                <input type="date" id="due_date" class="form-input" placeholder="Дата виконання"
                                    name="due_date" required aria-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="uniqueness-slider">
                                <label for="uniqueness">Бажана унікальність роботи: <span
                                        class="slider-value">80%</span></label>
                                <input type="range" id="uniqueness" min="60" max="100" value="80" class="slider"
                                    name="uniqueness" aria-valuemin="60" aria-valuemax="100" aria-valuenow="80"
                                    aria-valuetext="80 відсотків">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="work_description" class="sr-only">Опис роботи (наприклад, кількість сторінок,
                                особливі вимоги)</label>
                            <textarea class="form-textarea" id="work_description"
                                placeholder="Опис роботи: наприклад, кількість сторінок, особливі вимоги" rows="3"
                                name="work_description"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="file-upload">
                                <input type="file" id="fileUpload" class="file-input" name="uploaded_files[]" multiple
                                    aria-describedby="file-upload-instructions">
                                <label for="fileUpload" class="file-label">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M10 5v10M5 10h10" stroke="currentColor" stroke-width="2" />
                                    </svg>
                                    Додати файли
                                </label>
                                <p id="file-upload-instructions" class="sr-only">Ви можете завантажити кілька файлів,
                                    таких як методичні рекомендації або приклади.</p>
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
</main>
<?php include 'footer.php'; ?>