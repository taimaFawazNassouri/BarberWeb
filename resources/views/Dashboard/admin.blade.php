<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter by Day, Date Range, and Time</title>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- jQuery CDN -->
</head>
<style>
    /* General styles */
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
        background-color: #f4f4f4;
    }

    .filter-section {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
        justify-content: center;
        flex-wrap: wrap;
        /* Wrap items on smaller screens */
        border-radius: 8px;
    }

    .filter-item {
        display: flex;
        flex-direction: column;
        margin-top: 10px;
    }

    .filter-item label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    .filter-item input,
    .filter-item select {
        padding: 5px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    #filter-button {
        align-self: flex-end;
        padding: 10px 20px;
        background-color: #000;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }

    #filter-button:hover {
        background-color: #333;
    }

    .wrapper {
        width: 100%;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        margin: 0 auto;
    }

    .table-section {
        padding: 20px;
        overflow-x: auto;
    }

    table {
        max-width: -moz-fit-content;
        max-width: fit-content;
        white-space: nowrap;
        min-width: 100%;
        border-collapse: collapse;
        font-size: 0.9em;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #000;
        color: white;
    }

    #status-update-select {
        padding: 10px 15px;
        /* Adds padding inside the select box */
        margin-top: 15px;
        /* Adds margin to the top of the select box */
        border-radius: 4px;
        /* Rounds the corners of the select box */
        border: 1px solid #ccc;
        /* Adds a light border */
        background-color: #000;
        /* Light gray background */
        color: white;
        /* Darker text color */
        font-size: 0.9em,
            cursor: pointer;
        /* Changes the cursor to pointer on hover */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        /* Adds a subtle shadow for a 3D effect */
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        /* Smooth transition for background and shadow */
    }

    #status-update-select:hover {
        background-color: #e8e8e8;
        /* Slightly darker background on hover */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        /* Increases shadow on hover for a pop effect */
    }

    #status-update-select:focus {
        outline: none;
        /* Removes the default outline */
        border-color: #28a745;
        /* Changes border color when focused */
        box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        /* Adds a green glow when focused */
    }


    /* Responsive Design */
    @media (max-width: 768px) {
        .filter-section {
            flex-direction: column;
            /* Stack filters vertically on smaller screens */
            align-items: center;
        }

        table {
            font-size: 0.8em;
            /* Further reduce font size on smaller screens */
        }
    }

    * Responsive Design */ @media (max-width: 480px) {
        .filter-section {
            flex-direction: column;
            /* Stack filters vertically */
            align-items: center;
            /* Center the items */
            margin-bottom: 10px;
            /* Reduce margin below filters */
        }

        .filter-item {
            width: 100%;
            /* Make filter items full width */
            margin-top: 10px;
        }

        #filter-button {
            width: 100%;
            /* Make filter button full width */
            margin-top: 10px;
        }

        .table-section {
            width: 100%;
            /* Make table section full width */
            overflow-x: auto;
            /* Ensure table can scroll horizontally if needed */
        }

        table {
            font-size: 0.1em;
            /* Further reduce font size */
            border: 0;
            overflow-x: auto;
            /* Remove table border */
        }

        th,
        td {
            border: 1px solid #ddd;
            /* Add border to table cells */
        }

        #status-update-select {
            padding: 10px 15px;
            margin-top: 15px;
            width: 100%;
            /* Make select full width */
        }
    }
</style>

<body>
    <div class="filter-section">
        <div class="filter-item">
            <label for="day-filter">Filter by Day:</label>
            <select id="day-filter">
                <option value="">Select Day</option>
                <option value="MAA">MAA</option>
                <option value="DIN">DIN</option>
                <option value="WOE">WOE</option>
                <option value="DON">DON</option>
                <option value="VRI">VRI</option>
                <option value="ZAT">ZAT</option>
                <option value="ZON">ZON</option>
            </select>
        </div>

        <div class="filter-item">
            <label for="date-range">Filter by Date Range:</label>
            <input type="text" id="date-range" placeholder="Select date range">
        </div>

        <div class="filter-item">
            <label for="time-filter">Filter by Time:</label>
            <input type="time" id="time-filter">
        </div>
        <div class="filter-item">
            <label for="name-filter">Filter by Name:</label>
            <select id="name-filter">
                <option value="">Select Service</option>
                <option value="Klassieke haarsnit">Klassieke haarsnit</option>
                <option value="Fade haarsnit">Fade haarsnit</option>
                <option value="Baard">Baard</option>
                <option value="Haar en baard">Haar en baard</option>
                <option value="Kinderen">Kinderen</option>
                <option value="Broske">Broske</option>
            </select>
        </div>
        <div class="filter-item">
            <label for="status-filter">Filter by Status:</label>
            <select id="status-filter">
                <option value="">Select Status</option>
                <option value="0">Available</option>
                <option value="1">Taken</option>
                <option value="2">Not Available</option>
            </select>
        </div>
        <div class="filter-item">
            <label for="customer-filter">Filter by Customer Name:</label>
            <input type="text" id="customer-filter" placeholder="Enter customer name">
        </div>

        <button id="filter-button">Filter</button>
    </div>

    <form id="status-update-form" action="{{ route('updateStatus') }}" method="POST">
        @csrf
        <div class="wrapper">
            <div class="table-section">
                <table id="results-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Service Name</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Day</th>
                            <th>Month</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Results will be appended here -->
                    </tbody>
                </table>
                <select id="status-update-select">
                    <option value="">Select Action</option>
                    <option value="0">Update Status to 0 (Available)</option>
                    <option value="2">Update Status to 2 (Not Available)</option>
                </select>
            </div>
        </div>
    </form>


    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(function() {
            $('#date-range').daterangepicker({
                opens: 'left',
                format: 'YYYY-MM-DD', // Ensure the date format matches the database format
                locale: {
                    format: 'YYYY-MM-DD' // Display format in the input field
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Filter button click event
            $('#filter-button').on('click', function() {
                var day = $('#day-filter').val();
                var dateRange = $('#date-range').val();
                var time = $('#time-filter').val();
                var name = $('#name-filter').val();
                var status = $('#status-filter').val();
                var name_customer = $('#customer-filter').val();
                console.log('Status Filter Value:', status); // Log the status value


                $.ajax({
                    url: '{{ route('contentFetching') }}',
                    type: 'POST',
                    data: {
                        day: day,
                        dateRange: dateRange,
                        time: time,
                        name: name,
                        status: status,
                        name_customer: name_customer,
                    },
                    success: function(response) {
                        var tbody = $('#results-table tbody');
                        tbody.empty(); // Clear existing data

                        response.forEach(function(item) {
                            var statusText = '';
                            if (item.status == 0) {
                                statusText = 'Available';
                            } else if (item.status == 1) {
                                statusText = 'Taken';
                            } else {
                                statusText = 'Not Available';
                            }
                            var row = '<tr>' +
                                '<td><input type="checkbox" class="item-checkbox" data-id="' + item.id + '"></td>' +
                                '<td>' + item.name + '</td>' +
                                '<td>' + item.name_customer + '</td>' +
                                '<td>' + item.date + '</td>' +
                                '<td>' + item.time + '</td>' +
                                '<td>' + statusText + '</td>' +
                                '<td>' + item.day + '</td>' +
                                '<td>' + item.month + '</td>' +
                                '</tr>';
                            tbody.append(row);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred: " + error);
                        console.log(xhr.responseText);
                    }
                });
            });
            $(function() {
                // Handle "Select All" checkbox
                $('#select-all').on('change', function() {
                    var isChecked = $(this).is(':checked');
                    $('.item-checkbox').prop('checked', isChecked);
                });

                // Handle status update from select dropdown
                $('#status-update-select').on('change', function() {
                    var selectedStatus = $(this).val();

                    if (selectedStatus) {
                        updateStatus(selectedStatus);
                    }
                });

                function updateStatus(status) {
                    $('input[name="ids[]"]').remove(); // Clear previous hidden inputs

                    var selectedIds = [];
                    $('.item-checkbox:checked').each(function() {
                        selectedIds.push($(this).data('id'));
                    });

                    console.log('Selected IDs:', selectedIds); // Debugging

                    if (selectedIds.length === 0) {
                        alert('Please select at least one item.');
                        return;
                    }

                    // Append hidden inputs for each selected ID
                    selectedIds.forEach(function(id) {
                        $('<input>').attr({
                            type: 'hidden',
                            name: 'ids[]',
                            value: id
                        }).appendTo('#status-update-form');
                    });

                    $('<input>').attr({
                        type: 'hidden',
                        name: 'status',
                        value: status
                    }).appendTo('#status-update-form');

                    // Submit the form after appending the IDs and status
                    $('#status-update-form').submit();
                }
            });


        });
    </script>

</body>

</html>
