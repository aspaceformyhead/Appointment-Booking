
<link rel="stylesheet" href="../../static/css/admin/inventory.css">
<?php
// Example inventory data (you can replace this with actual database fetching later)
include_once("../../app/model/fetchDB.php");
include_once("../../app/model/insert.php");

$inventory = fetchInventory($conn);



?>


    <section class="inventory hide" id="inventory">
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert"><?= $_SESSION['message'] ?></div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
        <div class="inventorySummary">
            <h3>Inventory Overview</h3>
            <div class="inventory-overview">
                <p>Total Items: <span id="total-items"><?= count($inventory) ?></span></p>
                <p>Low Stock Alerts: <span id="low-stock"><?= count(array_filter($inventory, fn($item) => $item['stock'] <= 0)) ?></span></p>
                <p>Out of Stock: <span id="out-of-stock"><?= count(array_filter($inventory, fn($item) => $item['stock'] == 0)) ?></span></p>
            </div>
        </div>
        <div class="inventoryUpdate">
            <h2>Inventory List</h2>
            <table class="inventory-table">
                <thead>
                    <tr>
                    <th>SKU/ID</th>

                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Quantity in Stock</th>
                        <th>Sold</th>
                        <th>Price</th>
                        <th>Image Path</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    foreach ($inventory as $item): ?>
                        <tr>
                        <td><?= htmlspecialchars($item['productID']) ?></td>
                        <td contenteditable="true" class="editable" data-field="prod_Name"><?= htmlspecialchars($item['prod_Name']) ?></td>
                        <td contenteditable="true" class="editable" data-field="category"><?= htmlspecialchars($item['category']) ?></td>
                        <td contenteditable="true" class="editable" data-field="stock"><?= htmlspecialchars($item['stock']) ?></td>
                        <td><?= htmlspecialchars($item['sold']) ?></td>
                        <td contenteditable="true" class="editable" data-field="price">Rs. <?= htmlspecialchars($item['price']) ?></td>
                        <td contenteditable="true" class="editable" data-field="prod_image"><?= htmlspecialchars($item['prod_image']) ?></td>
                        <td>
                            <button type="button" class="save-btn" data-id="<?= htmlspecialchars($item['productID']) ?>">Save</button>
                            <form method="POST" action="../../app/model/deleteDB.php" style="display:inline;">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($item['productID']) ?>">
                                <button type="submit" name="delete_item" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <form method="POST" action="../../app/model/insert.php" class="add-table">
                <h3>Add New Item</h3>
                <input type="text" name="sku" placeholder="ID/SKU" required>

                <input type="text" name="name" placeholder="Item Name" required>
                <input type="text" name="description" placeholder="Product Details" required>
                <input type="number" step="0.01" name="price" placeholder="Price" required>

                <input type="text" name="category" placeholder="Category" required>
                <input type="number" name="quantity" placeholder="Quantity in Stock" required>
                <input type="text"  name="img_url" placeholder="img path" >
                
                <button type="submit" name="add_item" class="add-item-btn">Add New Item</button>
            </form>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const saveButtons = document.querySelectorAll('.save-btn');

    saveButtons.forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('tr');
            const productId = this.getAttribute('data-id');
            const updatedData = {};

            row.querySelectorAll('.editable').forEach(cell => {
                const field = cell.getAttribute('data-field');
                updatedData[field] = cell.innerText.trim();
            });

            updatedData['id'] = productId;

            // Send the updated data to the server
            fetch('../../app/model/updateDB.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(updatedData),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Product updated successfully.');
                } else {
                    alert('Error updating product.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});

    </script>

