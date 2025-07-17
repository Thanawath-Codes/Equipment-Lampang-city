
// Printer_brand Printer_model
$('#printer_brand').on('change', function() {
    var printer_brand_id = this.value;
    console.log(printer_brand_id);
    $.ajax({
        url: '../../../config/printer/printer_model.php',
        type: "POST",
        data: {
            printer_brand_data: printer_brand_id
        },
        success: function(data) {
            $('#printer_model').html(data);
            console.log(data);
        }
    })
});

// Printer_model Printer_type
$('#printer_model').on('change', function() {
    var printer_model_id = this.value;
    console.log(printer_model_id);
    $.ajax({
        url: '../../../config/printer/printer_type.php',
        type: "POST",
        data: {
            printer_model_data: printer_model_id
        },
        success: function(data) {
            $('#printer_type').html(data);
            console.log(data);
        }
    })
});

// Printer_type Printer_kind
$('#printer_type').on('change', function() {
    var printer_type_id = this.value;
    console.log(printer_type_id);
    $.ajax({
        url: '../../../config/printer/printer_kind.php',
        type: "POST",
        data: {
            printer_type_data: printer_type_id
        },
        success: function(data) {
            $('#printer_kind').html(data);
            console.log(data);
        }
    })
});

// Printer_kind Connecting_printer
$('#printer_kind').on('change', function() {
    var printer_kind_id = this.value;
    console.log(printer_kind_id);
    $.ajax({
        url: '../../../config/printer/connecting_printer.php',
        type: "POST",
        data: {
            printer_kind_data: printer_kind_id
        },
        success: function(data) {
            $('#connecting_printer').html(data);
            console.log(data);
        }
    })
});

// Connecting_printer Color_printing
$('#connecting_printer').on('change', function() {
    var connecting_printer_id = this.value;
    console.log(connecting_printer_id);
    $.ajax({
        url: '../../../config/printer/color_printing.php',
        type: "POST",
        data: {
            connecting_printer_data: connecting_printer_id
        },
        success: function(data) {
            $('#color_printing').html(data);
            console.log(data);
        }
    })
});

// Color_printing Paper_size_printing
$('#color_printing').on('change', function() {
    var color_printing_id = this.value;
    console.log(color_printing_id);
    $.ajax({
        url: '../../../config/printer/paper_size_printing.php',
        type: "POST",
        data: {
            color_printing_data: color_printing_id
        },
        success: function(data) {
            $('#paper_size_printing').html(data);
            console.log(data);
        }
    })
});


// Department Segment
$('#department').on('change', function() {
    var department_id = this.value;
    // console.log(department_id);
    $.ajax({
        url: '../../../config/account/segment.php',
        type: "POST",
        data: {
            department_data: department_id
        },
        success: function(result) {
            $('#segment').html(result);
            console.log(result);
        }
    })
});

// Segment Division
$('#segment').on('change', function() {
    var segment_id = this.value;
    console.log(segment_id);
    $.ajax({
        url: '../../../config/account/division.php',
        type: "POST",
        data: {
            segment_data: segment_id
        },
        success: function(data) {
            $('#division').html(data);
            console.log(data);
        }
    })
});

// Division Work
$('#division').on('change', function() {
    var division_id = this.value;
    console.log(division_id);
    $.ajax({
        url: '../../../config/account/working.php',
        type: "POST",
        data: {
            division_data: division_id
        },
        success: function(data) {
            $('#working').html(data);
            console.log(data);
        }
    })
});

