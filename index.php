<?php
// index.php - QuickPOS Landing Page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickPOS - Modern Point of Sale System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #060D1F;
            color: #E8EDF5;
            line-height: 1.6;
        }

        /* === HEADER === */
        header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(6, 13, 31, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
            padding: 20px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.5rem;
            color: #ffffff;
            text-decoration: none;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #00D9A5, #0099FF);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #060D1F;
            font-size: 1.2rem;
        }

        .logo span { color: #00D9A5; }

        nav {
            display: flex;
            gap: 40px;
            align-items: center;
        }

        nav a {
            color: #7A8BA8;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        nav a:hover { color: #00D9A5; }

        .btn-signup {
            background: linear-gradient(135deg, #00D9A5, #00b388);
            color: #060D1F;
            padding: 12px 28px;
            border-radius: 100px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s;
            box-shadow: 0 8px 24px rgba(0, 217, 165, 0.3);
        }

        .btn-signup:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 36px rgba(0, 217, 165, 0.4);
        }

        /* === HERO === */
        .hero {
            position: relative;
            min-height: 90vh;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(0, 217, 165, 0.15) 0%, transparent 70%);
            top: -200px;
            left: -200px;
            z-index: 0;
        }

        .hero::after {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(0, 153, 255, 0.12) 0%, transparent 70%);
            bottom: -100px;
            right: -100px;
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 700px;
        }

        .hero h1 {
            font-family: 'Syne', sans-serif;
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 24px;
            background: linear-gradient(135deg, #ffffff 0%, #00D9A5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.2rem;
            color: #7A8BA8;
            margin-bottom: 36px;
            line-height: 1.8;
        }

        .btn-cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #00D9A5, #00b388);
            color: #060D1F;
            padding: 16px 40px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.2s;
            box-shadow: 0 12px 36px rgba(0, 217, 165, 0.3);
        }

        .btn-cta:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 48px rgba(0, 217, 165, 0.4);
        }

        /* === FEATURES === */
        .features {
            padding: 100px 0;
            position: relative;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-family: 'Syne', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .section-title p {
            font-size: 1.1rem;
            color: #7A8BA8;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
        }

        .feature-card {
            background: rgba(17, 29, 53, 0.5);
            border: 1px solid rgba(0, 217, 165, 0.2);
            border-radius: 16px;
            padding: 40px;
            text-align: center;
            transition: all 0.3s;
        }

        .feature-card:hover {
            background: rgba(17, 29, 53, 0.8);
            border-color: rgba(0, 217, 165, 0.5);
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 217, 165, 0.1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: rgba(0, 217, 165, 0.1);
            border: 2px solid rgba(0, 217, 165, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 1.8rem;
            color: #00D9A5;
        }

        .feature-card h3 {
            font-family: 'Syne', sans-serif;
            font-size: 1.3rem;
            margin-bottom: 12px;
            color: #ffffff;
        }

        .feature-card p {
            color: #7A8BA8;
            font-size: 0.95rem;
        }

        /* === PRICING === */
        .pricing {
            padding: 100px 0;
            position: relative;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }

        .pricing-card {
            background: rgba(17, 29, 53, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 16px;
            padding: 40px;
            text-align: center;
            transition: all 0.3s;
            position: relative;
        }

        .pricing-card.featured {
            background: rgba(0, 217, 165, 0.05);
            border-color: rgba(0, 217, 165, 0.4);
            transform: scale(1.05);
        }

        .pricing-card:hover {
            transform: translateY(-8px);
            border-color: rgba(0, 217, 165, 0.3);
        }

        .pricing-badge {
            display: inline-block;
            background: #00D9A5;
            color: #060D1F;
            padding: 8px 16px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.8rem;
            margin-bottom: 16px;
        }

        .pricing-card h3 {
            font-family: 'Syne', sans-serif;
            font-size: 1.4rem;
            margin-bottom: 12px;
            color: #ffffff;
        }

        .pricing-amount {
            font-size: 2.5rem;
            font-weight: 800;
            color: #00D9A5;
            margin: 20px 0;
        }

        .pricing-amount span {
            font-size: 1rem;
            color: #7A8BA8;
            font-weight: 400;
        }

        .pricing-features {
            list-style: none;
            margin: 30px 0;
            text-align: left;
        }

        .pricing-features li {
            color: #7A8BA8;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pricing-features li::before {
            content: '✓';
            color: #00D9A5;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .pricing-btn {
            display: inline-block;
            width: 100%;
            padding: 14px;
            background: rgba(0, 217, 165, 0.1);
            color: #00D9A5;
            border: 2px solid rgba(0, 217, 165, 0.3);
            border-radius: 100px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s;
            margin-top: 20px;
            cursor: pointer;
        }

        .pricing-card.featured .pricing-btn {
            background: #00D9A5;
            color: #060D1F;
            border-color: #00D9A5;
        }

        .pricing-btn:hover {
            background: #00D9A5;
            color: #060D1F;
            border-color: #00D9A5;
        }

        /* === CONTACT FORM === */
        .contact {
            padding: 100px 0;
            position: relative;
        }

        .contact-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(17, 29, 53, 0.5);
            border: 1px solid rgba(0, 217, 165, 0.2);
            border-radius: 20px;
            padding: 50px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #E8EDF5;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 14px 16px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(0, 217, 165, 0.2);
            border-radius: 10px;
            color: #E8EDF5;
            font-family: inherit;
            transition: all 0.2s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #00D9A5;
            box-shadow: 0 0 20px rgba(0, 217, 165, 0.2);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 140px;
        }

        .error-msg {
            display: none;
            color: #FF6B6B;
            font-size: 0.85rem;
            margin-top: 6px;
            padding: 10px;
            background: rgba(255, 107, 107, 0.1);
            border-left: 3px solid #FF6B6B;
        }

        .error-msg.show {
            display: block;
        }

        .form-group input.error {
            border-color: #FF6B6B;
        }

        .btn-submit {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #00D9A5, #00b388);
            color: #060D1F;
            border: none;
            border-radius: 100px;
            font-weight: 700;
            font-size: 1.05rem;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 8px 24px rgba(0, 217, 165, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 36px rgba(0, 217, 165, 0.4);
        }

        /* === FOOTER === */
        footer {
            background: rgba(6, 13, 31, 0.95);
            border-top: 1px solid rgba(255, 255, 255, 0.07);
            padding: 50px 0;
            margin-top: 100px;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .social-links {
            display: flex;
            gap: 20px;
        }

        .social-links a {
            width: 44px;
            height: 44px;
            background: rgba(0, 217, 165, 0.1);
            border: 1px solid rgba(0, 217, 165, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #00D9A5;
            transition: all 0.2s;
        }

        .social-links a:hover {
            background: #00D9A5;
            color: #060D1F;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.07);
            color: #7A8BA8;
        }

        /* === RESPONSIVE === */
        @media (max-width: 768px) {
            nav { display: none; }
            .hero h1 { font-size: 2rem; }
            .hero p { font-size: 1rem; }
            .section-title h2 { font-size: 1.8rem; }
            .contact-wrapper { padding: 30px; }
            .footer-content { flex-direction: column; gap: 20px; }
        }
    </style>
</head>
<body>

<!-- HEADER -->
<header>
    <div class="container">
        <div class="header-content">
            <a href="#" class="logo">
                <div class="logo-icon"><i class="fa-solid fa-bolt"></i></div>
                Quick<span>POS</span>
            </a>
            <nav>
                <a href="#features">Features</a>
                <a href="#pricing">Pricing</a>
                <a href="#contact">Contact</a>
                <a href="#" class="btn-signup">Sign Up</a>
            </nav>
        </div>
    </div>
</header>

<!-- HERO -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>The Modern POS for Tomorrow's Business</h1>
            <p>Lightning-fast checkout, real-time analytics, and seamless payments. Everything you need to scale your retail business.</p>
            <a href="#" class="btn-cta">
                <i class="fa-solid fa-zap"></i>
                Get Started Free
            </a>
        </div>
    </div>
</section>

<!-- FEATURES -->
<section id="features" class="features">
    <div class="container">
        <div class="section-title">
            <h2>Why Choose QuickPOS?</h2>
            <p>Built for modern retailers. Trusted by 5,000+ businesses worldwide.</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fa-solid fa-bolt"></i></div>
                <h3>Lightning Fast</h3>
                <p>Sub-second checkout. Never keep customers waiting again.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fa-solid fa-chart-line"></i></div>
                <h3>Real-Time Analytics</h3>
                <p>Watch your sales in real-time with beautiful dashboards.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
                <h3>Bank-Grade Security</h3>
                <p>Your data is encrypted and compliant with PCI-DSS.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fa-solid fa-cloud"></i></div>
                <h3>Cloud Synced</h3>
                <p>Access your data anywhere. Multiple device support included.</p>
            </div>
        </div>
    </div>
</section>

<!-- PRICING -->
<section id="pricing" class="pricing">
    <div class="container">
        <div class="section-title">
            <h2>Simple, Transparent Pricing</h2>
            <p>No hidden fees. Cancel anytime. Start free.</p>
        </div>
        <div class="pricing-grid">
            <!-- BASIC -->
            <div class="pricing-card">
                <h3>Starter</h3>
                <div class="pricing-amount">$29<span>/month</span></div>
                <ul class="pricing-features">
                    <li>Up to 50 transactions/day</li>
                    <li>1 User Account</li>
                    <li>Basic Reports</li>
                    <li>Email Support</li>
                </ul>
                <button class="pricing-btn">Choose Plan</button>
            </div>

            <!-- PRO (FEATURED) -->
            <div class="pricing-card featured">
                <div class="pricing-badge">MOST POPULAR</div>
                <h3>Professional</h3>
                <div class="pricing-amount">$99<span>/month</span></div>
                <ul class="pricing-features">
                    <li>Unlimited Transactions</li>
                    <li>Up to 10 Users</li>
                    <li>Advanced Analytics</li>
                    <li>Inventory Management</li>
                    <li>Priority Support</li>
                </ul>
                <button class="pricing-btn">Choose Plan</button>
            </div>

            <!-- ENTERPRISE -->
            <div class="pricing-card">
                <h3>Enterprise</h3>
                <div class="pricing-amount">Custom</div>
                <ul class="pricing-features">
                    <li>Unlimited Everything</li>
                    <li>Unlimited Users</li>
                    <li>Custom Integrations</li>
                    <li>Dedicated Account Manager</li>
                    <li>24/7 Support</li>
                </ul>
                <button class="pricing-btn">Contact Sales</button>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT FORM -->
<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <h2>Get in Touch</h2>
            <p>Have questions? We're here to help.</p>
        </div>
        <div class="contact-wrapper">
            <form id="contactForm" method="POST" action="submit.php">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="John Doe">
                    <div class="error-msg"></div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="john@example.com">
                    <div class="error-msg"></div>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Tell us how we can help..."></textarea>
                    <div class="error-msg"></div>
                </div>

                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="footer-content">
            <a href="#" class="logo">
                <div class="logo-icon"><i class="fa-solid fa-bolt"></i></div>
                Quick<span>POS</span>
            </a>
            <div class="social-links">
                <a href="#" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" title="LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#" title="GitHub"><i class="fa-brands fa-github"></i></a>
                <a href="#" title="Facebook"><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 QuickPOS. All rights reserved. | <a href="#" style="color: #00D9A5;">Privacy Policy</a></p>
        </div>
    </div>
</footer>

<script>
    // Form Validation
    const form = document.getElementById('contactForm');
    const inputs = form.querySelectorAll('input, textarea');

    form.addEventListener('submit', (e) => {
        let isValid = true;

        inputs.forEach(input => {
            const errorMsg = input.parentElement.querySelector('.error-msg');
            input.classList.remove('error');
            errorMsg.classList.remove('show');

            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('error');
                errorMsg.textContent = 'This field is required';
                errorMsg.classList.add('show');
            }

            if (input.type === 'email' && input.value.trim()) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(input.value.trim())) {
                    isValid = false;
                    input.classList.add('error');
                    errorMsg.textContent = 'Please enter a valid email address';
                    errorMsg.classList.add('show');
                }
            }
        });

        if (!isValid) {
            e.preventDefault();
        }
    });
</script>

</body>
</html>