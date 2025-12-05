 // message side animation
  document.addEventListener("DOMContentLoaded", () => {
    document
      .getElementById("contactForm")
      .addEventListener("submit", function (e) {
        e.preventDefault(); // form refresh আটকাবে
        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let subject = document.getElementById("subject").value.trim();
        let message = document.getElementById("message").value.trim();
        let msgBox = document.getElementById("floatingMsg");

        if (name === "" || email === "" || subject === "" || message === "") {
          // Error Message
          msgBox.textContent = "⚠️ Please fill the form";
          msgBox.className = "floating-message error show";
        } else {
          // Success Message
          msgBox.textContent = "✅ Message Sent Successful";
          msgBox.className = "floating-message success show";

          // Reset Form
          document.getElementById("contactForm").reset();
        }

        // Hide after 3s
        setTimeout(() => {
          msgBox.classList.remove("show");
        }, 3000);
      });
  });