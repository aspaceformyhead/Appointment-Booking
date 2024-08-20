<link rel="stylesheet" href="../../static/css/admin/settings.css">

<section class="account hide">
            <div class="settings-section">
                <h2>Account Settings</h2>

                <!-- Profile Picture Section -->
                <div class="profile-picture-section">
                    <h3>Profile Picture</h3>
                    <div class="profile-picture-container">
                        <img id="profile-picture" src="default-profile.png" alt="Profile Picture">
                        <input type="file" id="profile-picture-upload" accept="image/*">
                        <button id="remove-profile-picture" class="remove-btn">Remove Picture</button>
                    </div>
                </div>

                <!-- Settings Form -->
                <form id="settings-form">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" placeholder="Enter new username">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Enter new email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Enter new password">
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" id="confirm-password" name="confirm-password"
                            placeholder="Confirm new password">
                    </div>

                    <button type="submit" class="save-changes-btn">Save Changes</button>
                </form>
                <div id="status-message"></div>
            </div>


        </section>
        <script>
            document.getElementById('remove-profile-picture').addEventListener('click', function () {
    if (confirm('Are you sure you want to remove your profile picture?')) {
        document.getElementById('profile-picture').src = 'default-profile.png'; // Reset to default image
        document.getElementById('profile-picture-upload').value = ''; // Clear file input
        document.getElementById('update-picture').checked = false; // Uncheck update picture option
    }
});

// Handle form submission
document.getElementById('settings-form').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent default form submission

    const updateUsername = document.getElementById('update-username').checked;
    const updateEmail = document.getElementById('update-email').checked;
    const updatePassword = document.getElementById('update-password').checked;

    const username = updateUsername ? document.getElementById('username').value.trim() : null;
    const email = updateEmail ? document.getElementById('email').value.trim() : null;
    const password = updatePassword ? document.getElementById('password').value : null;
    const confirmPassword = updatePassword ? document.getElementById('confirm-password').value : null;

    // Validation
    if (updatePassword && password !== confirmPassword) {
        displayStatusMessage('Passwords do not match.');
        return;
    }

    // Prepare data to update
    const dataToUpdate = {};
    if (updateUsername) dataToUpdate.username = username;
    if (updateEmail) dataToUpdate.email = email;
    if (updatePassword) dataToUpdate.password = password;

    // Simulate an API request to update account information
    simulateApiUpdate(dataToUpdate)
        .then(response => {
            displayStatusMessage('Account information updated successfully.');
        })
        .catch(error => {
            displayStatusMessage('An error occurred while updating account information.');
        });
});



function displayStatusMessage(message) {
    const statusMessageElement = document.getElementById('status-message');
    statusMessageElement.textContent = message;
}
        </script>