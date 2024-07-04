<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style\contact.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <section class="col left">
                <div class="contactTitle">
                    <h2>Get in Touch</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex.</p>
                </div>
                <div class="contactInfo">
                    <div class="iconGroup">
                        <div class="details">
                            <span>Address:</span>
                            <span>123 Main St, Anytown, USA 12345</span>
                        </div>
                    </div>
                    <div class="iconGroup">
                        <div class="details">
                            <span>Phone:</span>
                            <span>+1 123 456 7890</span>
                        </div>
                    </div>
                    <div class="iconGroup">
                        <div class="details">
                            <span>Email:</span>
                            <span>info@example.com</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="col right">
                <form class="messageForm">
                    <div class="inputGroup halfWidth">
                        <input type="text" required>
                        <label>First Name</label>
                    </div>
                    <div class="inputGroup halfWidth">
                        <input type="text" required>
                        <label>Last Name</label>
                    </div>
                    <div class="inputGroup fullWidth">
                        <input type="email" required>
                        <label>Email</label>
                    </div>
                    <div class="inputGroup fullWidth">
                        <textarea required></textarea>
                        <label>Message</label>
                    </div>
                    <button type="submit">Send Message</button>
                </form>
            </section>
        </div>
    </div>

    <script src="./contact.js"></script>
</body>
</html>