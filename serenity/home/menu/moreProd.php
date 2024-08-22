
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../static/css/menu/moreProd.css">

<section class="moreProd" id="default">
            
                <div class="search">
                    <input type="text" placeholder="Search">
                    <i class="fa fa-search fa-4x " aria-hidden="true"></i>
                </div>
                <div class="categories">
                    <button class="category-btn secondary">All</button>
                    <button class="category-btn secondary">Categories</button>
                    <button class="category-btn secondary">Vegan</button>
                </div>
                <div id="product-container"></div> <!-- Container for dynamic product sections -->

        <div class="pagination">
            <button id="prevPage" class="secondary">Previous</button>
            <button id="nextPage" class="secondary">Next</button>
        </div>
        </section>
        <script>
            const products = [
    { id: 'prod1', name: 'Product 1', price: 'Rs.100', image: '../../static/images/inkeylsist1.png' },
    { id: 'prod2', name: 'Product 2', price: 'Rs.200', image: '../../static/images/inkeylsist1.png' },
    { id: 'prod3', name: 'Product 3', price: 'Rs.300', image: '../../static/images/inkeylsist1.png' },
    { id: 'prod4', name: 'Product 4', price: 'Rs.400', image: '../../static/images/inkeylsist1.png' },
    { id: 'prod5', name: 'Product 5', price: 'Rs.500', image: '../../static/images/inkeylsist1.png' },
    { id: 'prod6', name: 'Product 6', price: 'Rs.600', image: '../../static/images/inkeylsist1.png' },
    { id: 'prod7', name: 'Product 6', price: 'Rs.600', image: '../../static/images/inkeylsist1.png' },
    { id: 'prod8', name: 'Product 6', price: 'Rs.600', image: '../../static/images/inkeylsist1.png' },
    { id: 'prod9', name: 'Product 6', price: 'Rs.600', image: '../../static/images/inkeylsist1.png' },
    { id: 'prod10', name: 'Product 6', price: 'Rs.600', image: 'images/inkeylsist1.png' },
    { id: 'prod11', name: 'Product 6', price: 'Rs.600', image: 'images/inkeylsist1.png' },
    { id: 'prod12', name: 'Product 6', price: 'Rs.600', image: 'images/inkeylsist1.png' },
    { id: 'prod13', name: 'Product 6', price: 'Rs.600', image: 'images/inkeylsist1.png' },


    // Add more products as needed
];

function createProductSection(products, pageNumber, productsPerPage) {
    const startIndex = (pageNumber - 1) * productsPerPage;
    const endIndex = startIndex + productsPerPage;
    const paginatedProducts = products.slice(startIndex, endIndex);

    const section = document.createElement('section');
    section.className = 'bestSeller'; // Combining classes for grid layout

    paginatedProducts.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.className = 'products';

        const imageDiv = document.createElement('div');
        imageDiv.id = product.id;
        imageDiv.style.backgroundImage = `url(${product.image})`;

        const productInfo = document.createElement('p');
        productInfo.innerHTML = `${product.name} <br> Price: ${product.price} <br>`;

        const starDiv = document.createElement('div');
        starDiv.className = 'star';
        starDiv.innerHTML = '<span>⭐⭐⭐⭐⭐</span>';

        const button = document.createElement('button');
        button.className = 'secondary';
        button.textContent = 'Add To Cart';

        productDiv.appendChild(imageDiv);
        productDiv.appendChild(productInfo);
        productDiv.appendChild(starDiv);
        productDiv.appendChild(button);

        section.appendChild(productDiv);
    });

    return section;
}
const productsPerPage = 8; // Number of products per page
let currentPage = 1; // Start on the first page

function renderPage(pageNumber) {
    const mainContainer = document.getElementById('product-container'); // Assuming you have a container div with this ID
    mainContainer.innerHTML = ''; // Clear previous content

    const productSection = createProductSection(products, pageNumber, productsPerPage);
    mainContainer.appendChild(productSection);
}

// Initial render
renderPage(currentPage);

// Handle pagination buttons
document.getElementById('nextPage').addEventListener('click', () => {
    currentPage++;
    if (currentPage > Math.ceil(products.length / productsPerPage)) {
        currentPage = 1; // Loop back to the first page
    }
    renderPage(currentPage);
});

document.getElementById('prevPage').addEventListener('click', () => {
    currentPage--;
    if (currentPage < 1) {
        currentPage = Math.ceil(products.length / productsPerPage); // Loop to the last page
    }
    renderPage(currentPage);
});

        </script>