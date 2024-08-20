<link rel="stylesheet" href="../../static/css/admin/review.css">
<section class="review hide">
<div class="reviewChart">
                <div class="total-reviews">
                    <h3>Total Reviews</h2>
                        <p class="review-count">325</p>
                </div>

                <div class="review-breakdown">
                    <h3>Review Breakdown</h3>
                    <div class="bar-chart">
                        <div class="bar">
                            <div class="bar-label">5-Star</div>
                            <div class="bar-fill" style="width: 70%;"></div>
                            <div class="bar-value">70%</div>
                        </div>
                        <div class="bar">
                            <div class="bar-label">4-Star</div>
                            <div class="bar-fill" style="width: 20%;"></div>
                            <div class="bar-value">20%</div>
                        </div>
                        <div class="bar">
                            <div class="bar-label">3-Star</div>
                            <div class="bar-fill" style="width: 5%;"></div>
                            <div class="bar-value">5%</div>
                        </div>
                        <div class="bar">
                            <div class="bar-label">2-Star</div>
                            <div class="bar-fill" style="width: 3%;"></div>
                            <div class="bar-value">3%</div>
                        </div>
                        <div class="bar">
                            <div class="bar-label">1-Star</div>
                            <div class="bar-fill" style="width: 2%;"></div>
                            <div class="bar-value">2%</div>
                        </div>
                    </div>
                </div>
                <div class="service-reviews">
                    <h3>Reviews by Service</h3>
                    <ul>
                        <li>Haircut: <span class="service-review-count">120</span></li>
                        <li>Manicure: <span class="service-review-count">85</span></li>
                        <li>Pedicure: <span class="service-review-count">65</span></li>
                        <li>Facial: <span class="service-review-count">55</span></li>
                    </ul>
                </div>
            </div>

<section class="reviewList">
                <h1>REVIEWS</h1>
                <div class="review-item">
                    <div class="review-content">
                        <p><strong>John Doe:</strong> Great service! I loved the haircut.</p>
                        <p>Rating: ⭐⭐⭐⭐⭐</p>
                    </div>

                    <!-- Respond Button -->
                    <button class="respond-btn primary" onclick="toggleResponseForm(this)">Respond</button>

                    <!-- Response Form -->
                    <div class="response-form hide">
                        <textarea class="response-text" placeholder="Type your response here..."></textarea>

                        <!-- Response Template Options -->
                        <select class="response-template" onchange="applyTemplate(this)">
                            <option value="">Select a template</option>
                            <option value="Thank you for your feedback!">Thank you for your feedback!</option>
                            <option
                                value="We're sorry to hear about your experience. Please contact us to resolve this issue.">
                                We're sorry to hear about your experience. Please contact us to resolve this issue.
                            </option>
                        </select>

                        <!-- Public or Private Response -->
                        <div class="response-options">
                            <label><input type="radio" name="response-type" value="public" checked> Public</label>
                            <label><input type="radio" name="response-type" value="private"> Private</label>
                        </div>

                        <!-- Send Response Button -->
                        <button class="send-response-btn primary" onclick="sendResponse(this)">Send Response</button>
                    </div>

                    <!-- Response Status Indicator -->
                    <p class="response-status">Awaiting Response</p>
                </div>
                <div class="review-item">
                    <div class="review-content">
                        <p><strong>John Doe:</strong> Great service! I loved the haircut.</p>
                        <p>Rating: ⭐⭐⭐⭐⭐</p>
                    </div>

                    <!-- Respond Button -->
                    <button class="respond-btn primary" onclick="toggleResponseForm(this)">Respond</button>

                    <!-- Response Form -->
                    <div class="response-form hide">
                        <textarea class="response-text" placeholder="Type your response here..."></textarea>

                        <!-- Response Template Options -->
                        <select class="response-template" onchange="applyTemplate(this)">
                            <option value="">Select a template</option>
                            <option value="Thank you for your feedback!">Thank you for your feedback!</option>
                            <option
                                value="We're sorry to hear about your experience. Please contact us to resolve this issue.">
                                We're sorry to hear about your experience. Please contact us to resolve this issue.
                            </option>
                        </select>

                        <!-- Public or Private Response -->
                        <div class="response-options">
                            <label><input type="radio" name="response-type" value="public" checked> Public</label>
                            <label><input type="radio" name="response-type" value="private"> Private</label>
                        </div>

                        <!-- Send Response Button -->
                        <button class="send-response-btn primary" onclick="sendResponse(this)">Send Response</button>
                    </div>

                    <!-- Response Status Indicator -->
                    <p class="response-status">Awaiting Response</p>
                </div>
                <div class="review-item">
                    <div class="review-content">
                        <p><strong>John Doe:</strong> Great service! I loved the haircut.</p>
                        <p>Rating: ⭐⭐⭐⭐⭐</p>
                    </div>

                    <!-- Respond Button -->
                    <button class="respond-btn primary" onclick="toggleResponseForm(this)">Respond</button>

                    <!-- Response Form -->
                    <div class="response-form hide">
                        <textarea class="response-text" placeholder="Type your response here..."></textarea>

                        <!-- Response Template Options -->
                        <select class="response-template" onchange="applyTemplate(this)">
                            <option value="">Select a template</option>
                            <option value="Thank you for your feedback!">Thank you for your feedback!</option>
                            <option
                                value="We're sorry to hear about your experience. Please contact us to resolve this issue.">
                                We're sorry to hear about your experience. Please contact us to resolve this issue.
                            </option>
                        </select>

                        <!-- Public or Private Response -->
                        <div class="response-options">
                            <label><input type="radio" name="response-type" value="public" checked> Public</label>
                            <label><input type="radio" name="response-type" value="private"> Private</label>
                        </div>

                        <!-- Send Response Button -->
                        <button class="send-response-btn primary" onclick="sendResponse(this)">Send Response</button>
                    </div>

                    <!-- Response Status Indicator -->
                    <p class="response-status ">Awaiting Response</p>
                </div>
            </section>



        </section>
        <script>
            function toggleResponseForm(button) {
    const responseForm = button.nextElementSibling;
    responseForm.classList.toggle('hide');
}

function applyTemplate(select) {
    const responseText = select.previousElementSibling;
    if (select.value) {
        responseText.value = select.value;
    }
}

function sendResponse(button) {
    const responseForm = button.parentElement;
    const responseText = responseForm.querySelector('.response-text').value;
    const responseType = responseForm.querySelector('input[name="response-type"]:checked').value;

    if (responseText.trim() === "") {
        alert("Please enter a response before sending.");
        return;
    }

    // Simulate sending the response
    alert(`Response sent as ${responseType}:\n${responseText}`);

    // Update the status indicator
    const responseStatus = responseForm.nextElementSibling;
    responseStatus.textContent = "Responded";
    responseStatus.style.color = "#4caf50";

    // Hide the response form after sending
    responseForm.classList.add('hide');
}
        </script>