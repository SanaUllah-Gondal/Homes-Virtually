<section class="contact" id="contact">
    <div class="container">
        <h2>Get in Touch</h2>
        <div class="contact-grid">
            <div class="contact-info">
                <h3>📍 Office</h3>
                <p><span>🏢</span> Dara Sikandar ka Hardo Bohat</p>
                <p><span>📞</span> +92 3150800007</p>
                <p><span>✉️</span> Salluoo6o4@gmail.com</p>
                <p><span>🌐</span> <a href="https://hometour.example" style="color:var(--accent);">hometour.example</a></p>
                <h3 style="margin-top:2rem;">🕒 Business Hours</h3>
                <p>Mon–Fri: 9 AM – 6 PM PST</p>
                <p>Sat: 10 AM – 2 PM PST</p>
            </div>
            <div>
                <form id="contactForm" action="api/send-contact.php" method="POST">
                    <input type="hidden" name="page" value="contact">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select id="subject" name="subject" required>
                            <option value="">— Select —</option>
                            <option>Demo Request</option>
                            <option>Partnership</option>
                            <option>Support</option>
                            <option>Careers</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit">Send Message</button>
                    <div id="formFeedback" class="form-feedback"></div>
                </form>
            </div>
        </div>
    </div>
</section>