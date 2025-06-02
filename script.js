document.addEventListener("DOMContentLoaded", () => {
    const loginBtn = document.querySelector("button");
    const usernameInput = document.querySelector('input[type="text"]');
    const passwordInput = document.querySelector('input[type="password"]');
    const messageDiv = document.getElementById("login-message");

    const showMessage = (text, type = "error") => {
        messageDiv.textContent = text;
        messageDiv.className = `
            text-sm text-center mt-4 px-4 py-3 rounded-lg  font-medium shadow-md
            ${type === "success"
                ? "bg-green-100 text-green-800 border-green-300"
                : "bg-red-100 text-red-800 border-red-300"}
            zoom-out-animation
        `;

        messageDiv.hidden = false;

        // After 3 seconds, trigger zoom-in animation and hide
        setTimeout(() => {
            messageDiv.classList.remove("zoom-out-animation");
            messageDiv.classList.add("zoom-in-animation");

            // Hide after animation completes
            setTimeout(() => {
                messageDiv.hidden = true;
                messageDiv.classList.remove("zoom-in-animation");
            }, 400);
        }, 1500);
    };

    loginBtn.addEventListener("click", (e) => {
        e.preventDefault();

        const username = usernameInput.value.trim();
        const password = passwordInput.value.trim();

        if (!username || !password) {
            showMessage("⚠️ Please fill in all fields.");
            return;
        }

        loginBtn.disabled = true;
        loginBtn.textContent = "Logging in...";

        fetch("login.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showMessage("✅ " + data.message, "success");
                setTimeout(() => {
                    window.location.href = "admin/index.php";
                }, 1000);
            } else {
                showMessage("❌ " + data.message);
            }
        })
        .catch(() => {
            showMessage("❗ An error occurred. Please try again.");
        })
        .finally(() => {
            loginBtn.disabled = false;
            loginBtn.textContent = "LOGIN";
        });
    });

    // Enter key triggers login
    [usernameInput, passwordInput].forEach(input => {
        input.addEventListener("keypress", (e) => {
            if (e.key === "Enter") loginBtn.click();
        });
    });
});
