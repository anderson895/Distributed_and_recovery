$(document).ready(function() {

    $('#transaction-table').DataTable();

    $('#recover-btn').on('click', function() {
        window.location.href = 'recover.php'; // Replace with your desired URL
    });

    $('#listTransact-btn').on('click', function() {
        window.location.href = 'index.php'; // Replace with your desired URL
    });
});




function deleteRecord(orderId) {
    if (confirm("Are you sure you want to delete this record?")) {
        $.ajax({
            url: 'delete_order.php',
            type: 'POST',
            data: { order_id: orderId },
            success: function(response) {
                if (response.trim() === "success") {
                    // Reload the table data after successful deletion
                    location.reload();
                } else {
                    alert("Error: " + response);
                }
            },
            error: function(xhr, status, error) {
                alert("Request failed. Returned status of " + xhr.status);
            }
        });
    }
}


function recoverRecord(orderId) {
    if (confirm("Are you sure you want to Recover this record?")) {
        $.ajax({
            url: 'recover_order.php',
            type: 'POST',
            data: { order_id: orderId },
            success: function(response) {
                if (response.trim() === "success") {
                    // Reload the table data after successful deletion
                    location.reload();
                } else {
                    alert("Error: " + response);
                }
            },
            error: function(xhr, status, error) {
                alert("Request failed. Returned status of " + xhr.status);
            }
        });
    }
}

