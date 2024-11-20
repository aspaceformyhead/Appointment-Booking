document.addEventListener("DOMContentLoaded", function () {
        fetchOrganization();
    });
    function fetchOrganization(){
        fetch("/api/organizations")
        .then(response => response.json())
        .then(data =>{
            console.log(data);
            const organizationSelect=document.getElementById("organization");
            data.forEach(organization => {
                const option=document.createElement("option");
            option.value=organization.id;
            option.textContent=organization.name;
        organizationSelect.appendChild(option);
    });

     })
     .catch(error=> {
        console.error("Error fetching organization:", error);
     })
    }