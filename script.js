// DOM Elements
const menuToggle = document.getElementById('menuToggle');
const mainNav = document.getElementById('mainNav');
const navLinks = document.querySelectorAll('nav a');
const themeToggle = document.getElementById('themeToggle');
const featureCards = document.querySelectorAll('.feature-card');
const contactForm = document.getElementById('contactForm');
const formFeedback = document.getElementById('formFeedback');

// 1. Mobile Menu Toggle
if (menuToggle && mainNav) {
    menuToggle.addEventListener('click', () => {
        mainNav.classList.toggle('active');
        // Animate hamburger → ×
        const spans = menuToggle.querySelectorAll('span');
        if (mainNav.classList.contains('active')) {
            spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
            spans[1].style.opacity = '0';
            spans[2].style.transform = 'rotate(-45deg) translate(5px, -5px)';
        } else {
            spans[0].style.transform = 'rotate(0)';
            spans[1].style.opacity = '1';
            spans[2].style.transform = 'rotate(0)';
        }
    });
}

// 2. Close mobile menu on nav link click
if (navLinks.length) {
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (mainNav) mainNav.classList.remove('active');
            // Reset hamburger
            const spans = document.querySelectorAll('#menuToggle span');
            if (spans.length) {
                spans[0].style.transform = 'rotate(0)';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'rotate(0)';
            }
        });
    });
}

// 3. Smooth Scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            const offsetTop = targetElement.offsetTop - 80; // account for sticky header
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
        }
    });
});

// 4. Dark Mode Toggle
if (themeToggle) {
    // Check localStorage or system preference
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
    const isDarkMode = savedTheme === 'dark' || (savedTheme === null && prefersDark);

    if (isDarkMode) {
        document.body.classList.add('dark-mode');
        themeToggle.textContent = '☀️';
    }

    themeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        const isDark = document.body.classList.contains('dark-mode');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        themeToggle.textContent = isDark ? '☀️' : '🌓';
    });
}

// 5. Scroll Animation for Feature Cards (Intersection Observer)
if (featureCards.length) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('appear');
            }
        });
    }, { threshold: 0.1 });

    featureCards.forEach(card => observer.observe(card));
}

// 6. Form Submission (Mock)
if (contactForm && formFeedback) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const fullname = document.getElementById('fullname')?.value.trim();
        const email = document.getElementById('email')?.value.trim();
        const subject = document.getElementById('subject')?.value;
        const message = document.getElementById('message')?.value.trim();

        // Validation
        if (!fullname || !email || !subject || !message) {
            showFeedback('Please fill in all fields.', 'error');
            return;
        }

        if (!/^\S+@\S+\.\S+$/.test(email)) {
            showFeedback('Please enter a valid email address.', 'error');
            return;
        }

        // Simulate sending
        showFeedback('Sending your message...', 'info');
        setTimeout(() => {
            showFeedback('✅ Message sent successfully! We’ll get back to you soon.', 'success');
            contactForm.reset();
        }, 1500);
    });

    function showFeedback(message, type) {
        formFeedback.textContent = message;
        formFeedback.className = 'form-feedback ' + type;
        formFeedback.style.display = 'block';

        if (type === 'success') {
            setTimeout(() => {
                formFeedback.style.display = 'none';
            }, 5000);
        }
    }
}