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
body {
    font-family: Arial, sans-serif;
    padding: 20px;
    background-color: #f4f4f4;
}

.filter-section {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
}

.filter-item {
    display: flex;
    flex-direction: column;
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
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

#filter-button:hover {
    background-color: #218838;
}

.table-section {
    background-color: white;
    padding: 20px;
    border-radius: 4px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f8f8f8;
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
            
        
        <button id="filter-button">Filter</button>
    </div>

    <form id="status-update-form" action="{{ route('updateStatus') }}" method="POST">
            @csrf
            <div class="table-section">
                <table id="results-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Service Name</th>
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
                <button type="submit" id="update-status-button">Update Status to 2</button>
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
            console.log('Status Filter Value:', status); // Log the status value


            $.ajax({
                url: '{{ route("contentFetching") }}',
                type: 'POST',
                data: {
                    day: day,
                    dateRange: dateRange,
                    time: time,
                    name: name,
                    status: status 
                },
                success: function(response) {
                    var tbody = $('#results-table tbody');
                    tbody.empty(); // Clear existing data

                    response.forEach(function(item) {
                        var row = '<tr>' +
                                  '<td><input type="checkbox" class="item-checkbox" data-id="' + item.id + '"></td>' +
                                  '<td>' + item.name + '</td>' +
                                  '<td>' + item.date + '</td>' +
                                  '<td>' + item.time + '</td>' +
                                  '<td>' + item.status + '</td>' +
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

   $('#status-update-form').on('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

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

    // Submit the form after appending the IDs
    this.submit();
});

});


    });
   

    </script>
   
</body>
</html>
