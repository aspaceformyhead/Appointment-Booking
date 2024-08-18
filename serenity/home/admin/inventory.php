<link rel="stylesheet" href="serenity\static\css\admin\inventory.css">

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
                        <!-- Example Row -->
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