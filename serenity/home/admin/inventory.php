<link rel="stylesheet" href="../../static/css/admin/inventory.css">

<section class="inventory hide">
            <div class="inventorySummary">
                <h2>Inventory Overview</h2>
                <div class="inventory-overview">
                    <p>Total Items: <span id="total-items">150</span></p>
                    <p>Low Stock Alerts: <span id="low-stock">10</span></p>
                    <p>Out of Stock: <span id="out-of-stock">5</span></p>
                </div>
            </div>
            <div class="inventoryUpdate">
                <h2>Inventory List</h2>
                <table class="inventory-table">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>SKU/ID</th>
                            <th>Quantity in Stock</th>
                            <th>Reorder Level</th>
                            <th>Supplier</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Shampoo</td>
                            <td>Hair Care</td>
                            <td>SKU12345</td>
                            <td>25</td>
                            <td>10</td>
                            <td>Beauty Supplies Co.</td>
                            <td>$10.00</td>
                            <td>
                                <button class="update-btn">Update</button>
                                <button class="delete-btn">Delete</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>

                <button class="add-item-btn ">Add New Item</button>
            </div>
        </section>
        <script>
            const inventory = [
    {
        name: 'Shampoo',
        category: 'Hair Care',
        sku: 'SKU12345',
        quantity: 25,
        reorderLevel: 10,
        supplier: 'Beauty Supplies Co.',
        price: 10.00
    }
    // Add more items as needed
];

// Function to render inventory table
function renderInventory() {
    const tableBody = document.querySelector('.inventory-table tbody');
    tableBody.innerHTML = ''; // Clear the existing rows

    inventory.forEach((item, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
        <td>${item.name}</td>
        <td>${item.category}</td>
        <td>${item.sku}</td>
        <td>${item.quantity}</td>
        <td>${item.reorderLevel}</td>
        <td>${item.supplier}</td>
        <td>$${item.price.toFixed(2)}</td>
        <td>
          <button class="update-btn" onclick="editItem(${index})">Update</button>
          <button class="delete-btn" onclick="deleteItem(${index})">Delete</button>
        </td>
      `;
        tableBody.appendChild(row);
    });
}

// Function to add a new item
function addItem(item) {
    inventory.push(item);
    renderInventory();
}

// Function to update an existing item
function updateItem(index, updatedItem) {
    inventory[index] = updatedItem;
    renderInventory();
}

// Function to delete an item
function deleteItem(index) {
    if (confirm('Are you sure you want to delete this item?')) {
        inventory.splice(index, 1);
        renderInventory();
    }
}

// Function to handle adding a new item
document.querySelector('.add-item-btn').addEventListener('click', () => {
    // Prompt for item details (in a real application, you might use a modal form)
    const name = prompt('Enter item name:');
    const category = prompt('Enter item category:');
    const sku = prompt('Enter SKU/ID:');
    const quantity = parseInt(prompt('Enter quantity in stock:'), 10);
    const reorderLevel = parseInt(prompt('Enter reorder level:'), 10);
    const supplier = prompt('Enter supplier name:');
    const price = parseFloat(prompt('Enter price per unit:'));

    if (name && category && sku && !isNaN(quantity) && !isNaN(reorderLevel) && supplier && !isNaN(price)) {
        addItem({ name, category, sku, quantity, reorderLevel, supplier, price });
    } else {
        alert('Please provide valid item details.');
    }
});

// Function to handle editing an item
function editItem(index) {
    const item = inventory[index];
    const name = prompt('Update item name:', item.name);
    const category = prompt('Update item category:', item.category);
    const sku = prompt('Update SKU/ID:', item.sku);
    const quantity = parseInt(prompt('Update quantity in stock:', item.quantity), 10);
    const reorderLevel = parseInt(prompt('Update reorder level:', item.reorderLevel), 10);
    const supplier = prompt('Update supplier name:', item.supplier);
    const price = parseFloat(prompt('Update price per unit:', item.price));

    if (name && category && sku && !isNaN(quantity) && !isNaN(reorderLevel) && supplier && !isNaN(price)) {
        updateItem(index, { name, category, sku, quantity, reorderLevel, supplier, price });
    } else {
        alert('Please provide valid item details.');
    }
}

// Initial render
renderInventory();

// Handle profile picture upload
document.getElementById('profile-picture-upload').addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file && document.getElementById('update-picture').checked) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('profile-picture').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
        </script>