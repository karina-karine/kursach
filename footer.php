<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kursach_Help
 */
?>
<footer class="footer" itemscope itemtype="https://schema.org/WPFooter">
    <div class="container">
        <div class="footer-content">
            <div class="footer-main">
                <div class="footer-brand">
                    <div class="footer-logo">
                        <a href="<?php echo home_url(); ?>" class="logo" itemprop="url"
                            aria-label="Головна сторінка Kursach.net.ua">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.svg"
                                alt="Логотип КУРСАЧ - професійне написання студентських робіт" class="footer-logo-img"
                                itemprop="image">
                        </a>
                    </div>
                    <p class="footer-description" itemprop="description">
                        Професійне написання робіт - для вашого успіху
                    </p>
                    <div class="footer-social">
                        <a href="https://t.me/Kursach_manager" class="footer-social-link telegram" target="_blank"
                            rel="noopener noreferrer" aria-label="Telegram Kursach.net.ua">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/tg_icon.svg"
                                alt="Іконка Telegram">
                        </a>
                        <a href="https://www.instagram.com/kursach.net.ua/" target="_blank" rel="noopener noreferrer"
                            class="footer-social-link instagram" aria-label="Instagram Kursach.net.ua">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/instagram_icon.svg"
                                alt="Іконка Instagram">
                        </a>
                        <a href="https://www.tiktok.com/@kursach.net_ua?_t=ZM-8vDjQ0YuFlv&_r=1" target="_blank"
                            rel="noopener noreferrer" class="footer-social-link tiktok"
                            aria-label="TikTok Kursach.net.ua">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/tiktok_icon.svg"
                                alt="Іконка TikTok">
                        </a>
                    </div>
                </div>
                <div class="footer-nav">
                    <div class="footer-column" itemscope itemtype="https://schema.org/SiteNavigationElement">
                        <h4 class="footer-title" itemprop="name">Навігація</h4>
                        <ul class="footer-links">
                            <li><a href="<?php echo home_url('/contacts/'); ?>" itemprop="url"><span
                                        itemprop="name">Контакти</span></a></li>
                            <li><a href="<?php echo home_url('/quarantees/'); ?>" itemprop="url"><span
                                        itemprop="name">Оплата і гарантії</span></a></li>
                            <li><a href="<?php echo home_url('/cooperation/'); ?>" itemprop="url"><span
                                        itemprop="name">Співпраця</span></a></li>
                            <li><a href="<?php echo home_url('/blog/'); ?>" itemprop="url"><span
                                        itemprop="name">Блог</span></a></li>
                            <li>
                                <a href="<?php echo home_url('/wp-content/themes/kursach-help/uploads/dogovor.pdf'); ?>"
                                    target="_blank" rel="noopener noreferrer" itemprop="url">
                                    <span itemprop="name">Договір оферти</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-column" itemscope itemtype="https://schema.org/SiteNavigationElement">
                        <h4 class="footer-title" itemprop="name">Послуги</h4>
                        <ul class="footer-links">
                            <li><a href="<?php echo home_url('/services/'); ?>" itemprop="url"><span itemprop="name">Всі
                                        послуги</span></a></li>
                            <li><a href="<?php echo home_url('/services/?service_id=dyplomni'); ?>" itemprop="url"><span
                                        itemprop="name">Дипломні проєкти</span></a>
                            </li>
                            <li><a href="<?php echo home_url('/services/?service_id=kursovi'); ?>" itemprop="url"><span
                                        itemprop="name">Курсові проєкти</span></a>
                            </li>
                            <li><a href="<?php echo home_url('/services/?service_id=magisterski'); ?>"
                                    itemprop="url"><span itemprop="name">Магістерські роботи</span></a></li>
                        </ul>
                    </div>
                    <div class="footer-column" itemscope itemtype="https://schema.org/LocalBusiness">
                        <h4 class="footer-title" itemprop="name">Контакти</h4>
                        <ul class="footer-contacts">
                            <li itemprop="telephone">(063) 267 73 71</li>
                            <li itemprop="telephone">(095) 438 73 68</li>
                            <li itemprop="email">kursach.net.ua@gmail.com</li>
                        </ul>
                        <div class="footer-schedule">
                            <p><strong>Ми працюємо:</strong></p>
                            <p itemprop="openingHours" content="Mo-Su 09:00-22:00">ПН-НД: 9:00 - 22:00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <span itemprop="copyrightYear">2025</span>. Всі права захищені <span
                        itemprop="copyrightHolder">Kursach.net.ua</span></p>
            </div>
        </div>
    </div>
</footer>
<?php get_template_part('components/order-modal'); ?>
<?php wp_footer(); ?>
</body>

</html>