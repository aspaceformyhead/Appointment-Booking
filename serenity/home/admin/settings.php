<link rel="stylesheet" href="serenity\static\css\admin\settings.css">

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