// Check stock level periodically and create notifications
setInterval(checkStockLevel, 60000); // Check every 1 minute

function checkStockLevel() {
  // Make an AJAX request to retrieve the stock count
  $.ajax({
    url: 'mvc/model/get_stock_count.php',
    method: 'GET',
    success: function(response) {
      var stockCount = parseInt(response); // Assuming the response is the stock count as an integer

      // Create a notification if the stock count is below a threshold
      var threshold = 5; // Set the threshold value
      if (stockCount < threshold) {
        var message = 'Stock is below ' + threshold;
        createNotification('Stock Alert', message);
      }

      // Create a notification if the stock count is 0
      if (stockCount === 0) {
        var message = 'Stock is 0';
        createNotification('Stock Alert', message);
      }
    },
    error: function() {
      console.log('Error retrieving stock count');
    }
  });
}
