
        // Scanner_brand Scanner_model
        $('#scanner_brand').on('change', function() {
            var scanner_brand_id = this.value;
            console.log(scanner_brand_id);
            $.ajax({
                url: '../../../config/scanner/scanner_model.php',
                type: "POST",
                data: {
                    scanner_brand_data: scanner_brand_id
                },
                success: function(result) {
                    $('#scanner_model').html(result);
                    console.log(result);
                }
            })
        });

        // Scanner_model Printing_speed
        $('#scanner_model').on('change', function() {
            var scanner_model_id = this.value;
            console.log(scanner_model_id);
            $.ajax({
                url: '../../../config/scanner/printing_speed.php',
                type: "POST",
                data: {
                    scanner_model_data: scanner_model_id
                },
                success: function(data) {
                    $('#printing_speed').html(data);
                    console.log(data);
                }
            })
        });

        // Printing_speed Scanner_paper_size
        $('#printing_speed').on('change', function() {
            var printing_speed_id = this.value;
            console.log(printing_speed_id);
            $.ajax({
                url: '../../../config/scanner/scanner_paper_size.php',
                type: "POST",
                data: {
                    printing_speed_data: printing_speed_id
                },
                success: function(data) {
                    $('#scanner_paper_size').html(data);
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

