document.addEventListener("DOMContentLoaded", function () {
    fetchOrganizationTypes();

    const orgTypeDropdown = document.getElementById("orgType");
    const orgDropdown = document.getElementById("organization");

    // Event listener for organization type change
    orgTypeDropdown.addEventListener("change", function () {
        const selectedOrgType = orgTypeDropdown.value;
        if (selectedOrgType) {
            fetchOrganizationsByType(selectedOrgType); // Fetch organizations based on type
        }
    });
});

// Fetch and populate organization types
function fetchOrganizationTypes() {
    fetch("/api/organization-types") // Replace with your endpoint
        .then(response => response.json())
        .then(data => {
            const orgTypeDropdown = document.getElementById("orgType");
            data.forEach(orgType => {
                const option = document.createElement("option");
                option.value = orgType.id;
                option.textContent = orgType.name;
                orgTypeDropdown.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Error fetching organization types:", error);
        });
}

// Fetch and populate organizations by type
function fetchOrganizationsByType(orgTypeId) {
    fetch(`/api/organizations/byType/${orgTypeId}`) // Replace with your endpoint
        .then(response => response.json())
        .then(data => {
            const orgDropdown = document.getElementById("organization");
            orgDropdown.innerHTML = '<option value="" disabled selected>Select organization</option>'; // Clear existing options

            data.forEach(organization => {
                const option = document.createElement("option");
                option.value = organization.id;
                option.textContent = organization.name;
                orgDropdown.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Error fetching organizations:", error);
        });
}
