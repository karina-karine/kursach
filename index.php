<?php include 'header.php'; ?>

<main class="main">
    <!-- Hero Section -->
    <section class="hero">
        <h1 class="hero-title">Професійне написання <br> студентських робіт <br> на замовлення</h1>
        <div class="hero-background-circles">
            <div class="circle-outer"></div>
            <div class="circle-middle"></div>
            <div class="circle-inner"></div>
        </div>
        <div class="hero-content">
            <div class="hero-text-left">
                <p class="hero-description">Ми пропонуємо якісне та оперативне виконання будь-якої роботи. Наші експерти
                    гарантують індивідуальний підхід, високий рівень унікальності та дотримання всіх вимог вашого
                    навчального закладу.</p>
            </div>
            <div class="hero-image-center">
                <div class="hero-image-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png" alt="Student"
                        class="hero-img">
                </div>
                <div class="hero-actions-overlay">
                    <button class="btn btn-primary">ЗАМОВИТИ РОБОТУ</button>
                    <button class="btn btn-secondary">ДІЗНАТИСЬ БІЛЬШЕ</button>
                </div>
            </div>
            <div class="hero-rating-right">
                <div class="rating-stars">★★★★★</div>
                <p class="rating-text"><strong>1000+</strong> позитивних відгуків</p>
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
                                Наші співробітники мають свої роботи вже понад 10 років досвідченої команди.
                                Наші автори написали понад 1000 різних робіт на всі можливості теми.
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
                                Надаємо необмежену кількість правок до тих пір поки ви не будете задоволені роботою.
                                Ми пишемо роботу від і до. За правки, які необхідно буде зробити в роботі
                                платити не доведеться.
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
                                Ми супроводжуємо вас до захисту, а разі необхідності виконаємо будь-які
                                корегування по роботі, які завжди можуть зверутися щодо внесення коректив
                                на протязі місяця.
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
            <div class="services-grid">
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
                        <p><strong>План, консультації щодо успішного захисту, звіт перевірки на антиплагіат</strong></p>
                    </div>
                    <button class="btn btn-primary service-btn">ЗАМОВИТИ РОБОТУ</button>
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
                        <p><strong>План, консультації щодо успішного захисту, звіт перевірки на антиплагіат</strong></p>
                    </div>
                    <button class="btn btn-primary service-btn">ЗАМОВИТИ РОБОТУ</button>
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
                        <p><strong>План, консультації щодо успішного захисту, звіт перевірки на антиплагіат</strong></p>
                    </div>
                    <button class="btn btn-primary service-btn">ЗАМОВИТИ РОБОТУ</button>
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
            <div class="reviews-slider">
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

            <div class="reviews-navigation">
                <button class="nav-btn nav-prev">‹</button>
                <button class="nav-btn nav-next">›</button>
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
                                <span class="discount-text">на курсові і інші роботи</span>
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

                <div class="referral-image">
                    <div class="phone-hands">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/hand-phone.svg"
                            alt="Телефон в руках з додатком">
                    </div>
                </div>
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
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/book.svg"
                            alt="Ілюстрація книг та олівця">
                    </div>
                </div>

                <div class="order-form-container">
                    <form class="form" id="orderForm">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" class="form-input" placeholder="Ім'я" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-input" placeholder="E-mail" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <input type="tel" class="form-input" placeholder="Номер телефону" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" placeholder="Навчальна програма">
                            </div>
                        </div>

                        <div class="form-group">
                            <select class="form-select" required>
                                <option value="">Тип роботи</option>
                                <option value="coursework">Курсова робота</option>
                                <option value="diploma">Дипломна робота</option>
                                <option value="master">Магістерська робота</option>
                                <option value="other">Інше</option>
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" class="form-input" placeholder="Тема роботи">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-input" placeholder="Дата виконання" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="uniqueness-slider">
                                <label for="uniqueness">Унікальність роботи</label>
                                <input type="range" id="uniqueness" min="60" max="100" value="80" class="slider">
                                <div class="slider-value">80%</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-textarea" placeholder="Опис сторінок: 21" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <div class="file-upload">
                                <input type="file" id="fileUpload" class="file-input" multiple>
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
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>