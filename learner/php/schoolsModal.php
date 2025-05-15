    <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }
    .modal-content {
        font-family: "Montserrat", sans-serif;
        font-size: 12px;
        background-color: white;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        max-height: 500px;
        overflow-y: auto;
    }
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #f5f5f5;
        cursor: pointer;
    }
    .search-container {
        margin-bottom: 15px;
    }
    .search-container input {
        width: 90%;
        padding: 5px;
        box-sizing: border-box;
    }

    @media only screen and (max-width: 500px) {
        .modal {
            display: none;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            font-size: 10px;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 95%;
            max-height: 500px;
            overflow-y: auto;
        }
    }

    </style>

<!-- Modal for the pop-up -->
<div id="postalCodeModal" class="modal">
    <div class="modal-content">
        <span class="close">×</span>
        <h3>Search Criteria</h3>
        <p>PLEASE CLICK THE RELEVANT SCHOOL NAME TO SELECT THE APPROPRIATE VALUE:</p>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search by postal code or description...">
        </div>
        <table id="postalCodeTable">
            <thead>
                <tr>
                    <th>SCHOOL NAME</th>
                    <th>ADDRESS</th>
                    <th>TELEPHONE</th>
                    <th>EMAIL</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div> 