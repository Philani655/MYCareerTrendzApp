// Declare the array first
const postalData = [];

// Fetch data from the PHP file
fetch('../php/teacher_postal_code_file.php')
    .then(response => response.json()) // Parse the response as JSON
    .then(data => {
        // Add data to the postalData array
        postalData.push(...data);
        
        // You can now work with the postalData, e.g., populate a table or process further
        populateTable(postalData);
    })
    .catch(error => {
        // Handle error if fetch fails (you can display a user-friendly message instead of logging)
        alert("An error occurred while fetching the data.");
    });


// Get DOM elements
const searchButton = document.getElementById('searchButton');
const modal = document.getElementById('postalCodeModal');
const closeModal = document.getElementsByClassName('close')[0];
const searchInput = document.getElementById('searchInput');
const tableBody = document.querySelector('#postalCodeTable tbody');
const postalCodeInput = document.getElementById('postalCode');
const suburbInput = document.getElementById('suburbName');
const areaInput = document.getElementById('areaInput');

// Function to populate the table in the modal
function populateTable(data) {
    tableBody.innerHTML = ''; // Clear the table body
    data.forEach(item => {
        const postalCode = item['STR_CODE'] || item['BOX-CODE']; // Use STR-CODE if available, otherwise BOX-CODE
        const description = `${item.SUBURB}, ${item.AREA}`; // Combine suburb and area for the description
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${postalCode}</td>
            <td>${description}</td>
        `;
        row.dataset.postalCode = postalCode; // Store postal code in the row for easy access
        row.dataset.suburb = item.SUBURB;
        row.dataset.area = item.AREA;
        row.addEventListener('click', handleRowClick); // Add click event to each row
        tableBody.appendChild(row);
    });
}

// Function to filter the table based on search input
function filterTable() {
    const query = searchInput.value.toLowerCase(); // Get the search query and convert it to lowercase

    // Filter postalData based on postalCode or description (suburb and area)
    const filteredData = postalData.filter(item => {
        // Convert postal code (STR_CODE) and BOX-CODE to string and match with query
        const postalCode = (item['STR_CODE'] || item['BOX-CODE']).toString();
        // Combine suburb and area to form the description
        const description = `${item.SUBURB}, ${item.AREA}`.toLowerCase();
        
        // Return true if postalCode or description matches the query
        return postalCode.includes(query) || description.includes(query);
    });

    // Populate the table with filtered data
    populateTable(filteredData);
}


// Function to handle row click
function handleRowClick(event) {
    const row = event.currentTarget;
    const postalCode = row.dataset.postalCode;
    const suburb = row.dataset.suburb;

    // Fill the form fields
    postalCodeInput.value = postalCode;
    suburbInput.value = suburb;

    // Close the modal
    modal.style.display = 'none';
}

// Open the modal when the search button is clicked
searchButton.addEventListener('click', () => {
    searchInput.value = ''; // Clear the search input
    populateTable(postalData); // Populate the table with all data initially
    modal.style.display = 'block'; // Show the modal
});

// Filter the table as the user types in the search input
searchInput.addEventListener('input', filterTable);

// Close the modal when the close button (x) is clicked
closeModal.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Close the modal when clicking outside of it
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});