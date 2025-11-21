// ... (keep existing code: mobile menu, smooth scroll, dark mode, etc.)

// AJAX Contact Form Submission
if (contactForm) {
    contactForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;

        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';

        try {
            const response = await fetch('api/send-contact.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.status === 'success') {
                showFeedback(result.message, 'success');
                contactForm.reset();
            } else {
                showFeedback(result.message || 'An error occurred.', 'error');
            }
        } catch (err) {
            showFeedback('Network error. Please check your connection.', 'error');
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        }
    });

    function showFeedback(message, type) {
        if (!formFeedback) return;
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