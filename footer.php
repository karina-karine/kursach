<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-main">
                <div class="footer-brand">
                    <div class="footer-logo">
                        <a href="<?php echo home_url(); ?>" class="logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.svg" alt="КУРСАЧ"
                                class="footer-logo-img">
                        </a>
                    </div>
                    <p class="footer-description">
                        Професійне написання робіт - для вашого успіху
                    </p>
                    <div class="footer-social">
                        <a href="https://t.me/Kursach_manager" class="footer-social-link telegram" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/tg_icon.svg" alt="Telegram">
                        </a>
                        <a href="https://www.instagram.com/kursach.net.ua/" target="_blank"
                            class="footer-social-link instagram">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/instagram_icon.svg"
                                alt="Instagram">
                        </a>
                        <a href="https://www.tiktok.com/@kursach.net_ua?_t=ZM-8vDjQ0YuFlv&_r=1" target="_blank"
                            class="footer-social-link tiktok">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/tiktok_icon.svg" alt="TikTok">
                        </a>
                    </div>

                </div>

                <div class="footer-nav">
                    <div class="footer-column">
                        <h4 class="footer-title">Навігація</h4>
                        <ul class="footer-links">
                            <li><a href="<?php echo home_url('/contacts/'); ?>">Контакти</a></li>
                            <li><a href="<?php echo home_url('/quarantees/'); ?>">Оплата і гарантії</a></li>
                            <li><a href="<?php echo home_url('/cooperation/'); ?>">Співпраця</a></li>
                            <li><a href="<?php echo home_url('/blog/'); ?>">Блог</a></li>
                            <li>
                                <a href="<?php echo home_url('/wp-content/themes/kursach-help/uploads/dogovor.pdf'); ?>"
                                    target="_blank" rel="noopener">
                                    Договір оферти
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4 class="footer-title">Послуги</h4>
                        <ul class="footer-links">
                            <li><a href="<?php echo home_url('/services/'); ?>">Всі послуги</a></li>
                            <li><a href="<?php echo home_url('/services/?service_id=dyplomni'); ?>">Дипломні проєкти</a>
                            </li>
                            <li><a href="<?php echo home_url('/services/?service_id=kursovi'); ?>">Курсові проєкти</a>
                            </li>
                            <li><a href="<?php echo home_url('/services/?service_id=magisterski'); ?>">Магістерські
                                    роботи</a></li>
                        </ul>

                    </div>

                    <div class="footer-column">
                        <h4 class="footer-title">Контакти</h4>
                        <ul class="footer-contacts">
                            <li>(063) 267 73 71</li>
                            <li>(095) 438 73 68</li>
                            <li>kursach.net.ua@gmail.com</li>
                        </ul>
                        <div class="footer-schedule">
                            <p><strong>Ми працюємо:</strong></p>
                            <p>ПН-НД: 9:00 - 22:00</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025. Всі права захищені</p>
            </div>
        </div>
    </div>
</footer>
<?php get_template_part('components/order-modal'); ?>

<?php wp_footer(); ?>
</body>

</html>