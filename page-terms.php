<?php
/**
 * Template Name: Договір оферти
 * 
 * @package YourTheme
 */

get_header(); ?>

<style>
    .terms-page {
        background: var(--white);
        padding: var(--space-3xl) 0;
    }

    .terms-container {
        max-width: var(--container-max-width);
        margin: 0 auto;
        padding: 0 var(--space-lg);
    }

    .terms-header {
        text-align: center;
        margin-bottom: var(--space-3xl);
        padding-bottom: var(--space-xl);
        border-bottom: 2px solid var(--gray-200);
    }

    .terms-title {
        font-size: var(--font-size-4xl);
        font-weight: var(--font-weight-bold);
        color: var(--gray-800);
        margin-bottom: var(--space-md);
        font-family: var(--font-family-heading);
    }

    .terms-subtitle {
        font-size: var(--font-size-lg);
        color: var(--gray-600);
        margin-bottom: var(--space-lg);
    }

    .terms-update-date {
        background: var(--gray-100);
        padding: var(--space-sm) var(--space-md);
        border-radius: var(--radius-md);
        font-size: var(--font-size-sm);
        color: var(--gray-700);
        display: inline-block;
    }

    .terms-content {
        max-width: 100%;
        margin: 0 auto;
        line-height: var(--line-height-relaxed);
    }

    .terms-section {
        margin-bottom: var(--space-2xl);
        background: var(--white);
        padding: var(--space-xl);
        border-radius: var(--radius-card);
        box-shadow: var(--shadow-sm);
        border-left: 4px solid var(--primary-color);
    }

    .terms-section h2 {
        font-size: var(--font-size-xl);
        font-weight: var(--font-weight-bold);
        color: var(--gray-800);
        margin-bottom: var(--space-xl);
        font-family: var(--font-family-heading);
        display: flex;
        align-items: center;
        gap: var(--space-sm);
        justify-content: center;
    }

    .terms-section h3 {
        font-size: var(--font-size-lg);
        font-weight: var(--font-weight-semibold);
        color: var(--gray-700);
        margin: var(--space-lg) 0 var(--space-md) 0;
    }

    .terms-section p {
        font-size: var(--font-size-base);
        color: var(--gray-600);
        margin-bottom: var(--space-md);
    }

    .terms-section ul {
        margin: var(--space-md) 0;
        padding-left: var(--space-lg);
    }

    .terms-section li {
        font-size: var(--font-size-base);
        color: var(--gray-600);
        margin-bottom: var(--space-sm);
    }

    .terms-highlight {
        background: var(--warning-color);
        color: var(--white);
        padding: var(--space-xs) var(--space-sm);
        border-radius: var(--radius-sm);
        font-weight: var(--font-weight-semibold);
    }

    .terms-contact-box {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: var(--white);
        padding: var(--space-xl);
        border-radius: var(--radius-card);
        margin-top: var(--space-2xl);
        text-align: center;
    }

    .terms-contact-box h3 {
        font-size: var(--font-size-xl);
        margin-bottom: var(--space-md);
        color: var(--white);
    }

    .terms-contact-box p {
        color: white;
    }

    .terms-contact-box h3 .emoji {
        fill: red;
    }

    .terms-contact-info {
        display: flex;
        justify-content: center;
        gap: var(--space-xl);
        flex-wrap: wrap;
        margin-top: var(--space-lg);
    }

    .terms-contact-item {
        display: flex;
        align-items: center;
        gap: var(--space-sm);
        font-size: var(--font-size-base);
    }

    .terms-nav {
        /* position: sticky; */
        top: 100px;
        background: var(--white);
        padding: var(--space-lg);
        border-radius: var(--radius-card);
        box-shadow: var(--shadow-md);
        margin-bottom: var(--space-xl);
    }

    .terms-nav h4 {
        font-size: var(--font-size-lg);
        font-weight: var(--font-weight-semibold);
        margin-bottom: var(--space-md);
        color: var(--gray-800);
    }

    .terms-nav ul {
        list-style: none;
        padding: 0;
    }

    .terms-nav li {
        margin-bottom: var(--space-sm);
    }

    .terms-nav a {
        color: var(--gray-600);
        text-decoration: none;
        font-size: var(--font-size-sm);
        padding: var(--space-xs) var(--space-sm);
        border-radius: var(--radius-sm);
        display: block;
        transition: var(--transition-fast);
    }

    .terms-nav a:hover {
        background: var(--primary-color);
        color: var(--white);
    }

    @media (max-width: 768px) {
        .terms-nav {
            position: static;
        }

        .terms-section {
            padding: var(--space-lg);
        }

        .terms-contact-info {
            flex-direction: column;
            gap: var(--space-md);
        }
    }
</style>

<main class="terms-page">
    <div class="terms-container">
        <header class="terms-header">
            <h1 class="terms-title">Договір оферти</h1>
            <p class="terms-subtitle">
                Умови надання послуг та використання веб-сайту
            </p>
            <div class="terms-update-date">
                📅 Останнє оновлення: <?php echo date('d.m.Y'); ?>
            </div>
        </header>

        <div class="terms-nav">
            <h4>🧭 Зміст документа</h4>
            <ul>
                <li><a href="#section-1">1. Загальні положення</a></li>
                <li><a href="#section-2">2. Терміни та визначення</a></li>
                <li><a href="#section-3">3. Предмет договору</a></li>
                <li><a href="#section-4">4. Права та обов'язки сторін</a></li>
                <li><a href="#section-5">5. Вартість та оплата</a></li>
                <li><a href="#section-6">6. Гарантії та відповідальність</a></li>
                <li><a href="#section-7">7. Конфіденційність</a></li>
                <li><a href="#section-8">8. Вирішення спорів</a></li>
                <li><a href="#section-9">9. Заключні положення</a></li>
            </ul>
        </div>

        <div class="terms-content">
            <section id="section-1" class="terms-section">
                <h2>📋 1. Загальні положення</h2>
                <p>
                    Цей договір оферти (далі — «Договір») регулює відносини між ТОВ «Ваша Компанія»
                    (далі — «Виконавець») та фізичною або юридичною особою (далі — «Замовник»),
                    що використовує послуги, представлені на веб-сайті.
                </p>
                <p>
                    Використання веб-сайту та замовлення послуг означає повну згоду Замовника
                    з умовами цього Договору.
                </p>
                <p>
                    Виконавець залишає за собою право вносити зміни до цього Договору в односторонньому порядку.
                    Зміни набувають чинності з моменту їх публікації на веб-сайті.
                </p>
            </section>

            <section id="section-2" class="terms-section">
                <h2>📚 2. Терміни та визначення</h2>
                <p>У цьому Договорі наступні терміни мають таке значення:</p>
                <ul>
                    <li><strong>Веб-сайт</strong> — інтернет-ресурс, розташований за адресою example.com</li>
                    <li><strong>Послуги</strong> — комплекс робіт, що надаються Виконавцем відповідно до заявки
                        Замовника</li>
                    <li><strong>Заявка</strong> — оформлена Замовником форма замовлення послуг</li>
                    <li><strong>Акт виконаних робіт</strong> — документ, що підтверджує факт надання послуг</li>
                </ul>
            </section>

            <section id="section-3" class="terms-section">
                <h2>🎯 3. Предмет договору</h2>
                <p>
                    Виконавець зобов'язується надати Замовнику послуги відповідно до поданої заявки,
                    а Замовник зобов'язується прийняти та оплатити надані послуги.
                </p>
                <h3>Види послуг:</h3>
                <ul>
                    <li>Консультаційні послуги</li>
                    <li>Розробка та впровадження рішень</li>
                    <li>Технічна підтримка</li>
                    <li>Навчання та тренінги</li>
                </ul>
                <p>
                    Детальний опис послуг, терміни виконання та вартість зазначаються
                    в індивідуальній заявці Замовника.
                </p>
            </section>

            <section id="section-4" class="terms-section">
                <h2>⚖️ 4. Права та обов'язки сторін</h2>

                <h3>4.1. Виконавець зобов'язується:</h3>
                <ul>
                    <li>Надати послуги в повному обсязі та в узгоджені терміни</li>
                    <li>Забезпечити якість наданих послуг відповідно до вимог</li>
                    <li>Зберігати конфіденційність отриманої інформації</li>
                    <li>Інформувати Замовника про хід виконання робіт</li>
                </ul>

                <h3>4.2. Замовник зобов'язується:</h3>
                <ul>
                    <li>Своєчасно оплачувати надані послуги</li>
                    <li>Надавати необхідну інформацію для виконання робіт</li>
                    <li>Прийняти результати виконаних робіт</li>
                    <li>Не передавати третім особам результати робіт без згоди Виконавця</li>
                </ul>
            </section>

            <section id="section-5" class="terms-section">
                <h2>💰 5. Вартість та оплата</h2>
                <p>
                    Вартість послуг визначається відповідно до діючого прайс-листа
                    або індивідуально за домовленістю сторін.
                </p>
                <p>
                    <span class="terms-highlight">Оплата здійснюється:</span>
                </p>
                <ul>
                    <li>100% передоплата для послуг вартістю до 5 000 грн</li>
                    <li>50% передоплата, 50% після завершення робіт для послуг понад 5 000 грн</li>
                    <li>За індивідуальним графіком для довготривалих проєктів</li>
                </ul>
                <p>
                    Оплата може здійснюватися банківським переказом, онлайн-платежами
                    або іншими способами, узгодженими сторонами.
                </p>
            </section>

            <section id="section-6" class="terms-section">
                <h2>🛡️ 6. Гарантії та відповідальність</h2>
                <p>
                    Виконавець гарантує якість наданих послуг та несе відповідальність
                    за їх неналежне виконання в межах отриманої оплати.
                </p>
                <p>
                    Сторони звільняються від відповідальності у випадку форс-мажорних обставин:
                    стихійні лиха, війна, епідемія, дії влади тощо.
                </p>
                <p>
                    Терміни гарантії:
                </p>
                <ul>
                    <li>Консультаційні послуги — 30 днів</li>
                    <li>Розроблені рішення — 90 днів</li>
                    <li>Навчальні матеріали — 60 днів</li>
                </ul>
            </section>

            <section id="section-7" class="terms-section">
                <h2>🔒 7. Конфіденційність</h2>
                <p>
                    Сторони зобов'язуються не розголошувати конфіденційну інформацію,
                    отриману в процесі співробітництва, третім особам без письмової згоди.
                </p>
                <p>
                    Конфіденційною вважається будь-яка інформація про:
                </p>
                <ul>
                    <li>Бізнес-процеси та комерційні таємниці</li>
                    <li>Фінансовий стан сторін</li>
                    <li>Персональні дані співробітників та клієнтів</li>
                    <li>Технічні рішення та методології</li>
                </ul>
            </section>

            <section id="section-8" class="terms-section">
                <h2>⚖️ 8. Вирішення спорів</h2>
                <p>
                    Сторони докладають максимальних зусиль для вирішення спорів
                    шляхом переговорів та взаємних консультацій.
                </p>
                <p>
                    У разі неможливості досягнення згоди, спори вирішуються в судовому порядку
                    відповідно до чинного законодавства України.
                </p>
                <p>
                    Претензії приймаються протягом 30 днів з моменту надання послуг
                    в письмовому вигляді на електронну пошту або поштову адресу.
                </p>
            </section>

            <section id="section-9" class="terms-section">
                <h2>📄 9. Заключні положення</h2>
                <p>
                    Цей Договір набуває чинності з моменту акцепту оферти Замовником
                    та діє до повного виконання зобов'язань сторонами.
                </p>
                <p>
                    Питання, не врегульовані цим Договором, регулюються чинним
                    законодавством України.
                </p>
                <p>
                    Договір складено українською мовою. У разі перекладу на інші мови,
                    при розбіжностях пріоритет має текст українською мовою.
                </p>
            </section>

            <div class="terms-contact-box">
                <h3>📞 Контактна інформація</h3>
                <p>Маєте питання щодо договору? Зв'яжіться з нами!</p>
                <div class="terms-contact-info">
                    <div class="terms-contact-item">
                        📧 info@example.com
                    </div>
                    <div class="terms-contact-item">
                        📱 +38 (050) 123-45-67
                    </div>
                    <div class="terms-contact-item">
                        🏢 м. Київ, вул. Хрещатик, 1
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Плавна прокрутка до розділів
        const navLinks = document.querySelectorAll('.terms-nav a');

        navLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetSection = document.querySelector(targetId);

                if (targetSection) {
                    targetSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Підсвічування активного розділу
        const sections = document.querySelectorAll('.terms-section');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const activeNavLink = document.querySelector(`.terms-nav a[href="#${entry.target.id}"]`);

                    // Прибираємо активний клас з усіх посилань
                    navLinks.forEach(link => link.classList.remove('active'));

                    // Додаємо активний клас до поточного посилання
                    if (activeNavLink) {
                        activeNavLink.classList.add('active');
                    }
                }
            });
        }, { rootMargin: '-100px 0px -80% 0px' });

        sections.forEach(section => {
            observer.observe(section);
        });
    });
</script>

<?php get_footer(); ?>