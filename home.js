$("#dropdown").change(function() {
    //get the selected value
    var selectedValue = this.value();
    //make the ajax call
    $.ajax({
        url: 'orders.php',
        type: 'POST',
        data: {option : selectedValue},
        success: function() {
            console.log("Data sent!");
        }
    });
});
