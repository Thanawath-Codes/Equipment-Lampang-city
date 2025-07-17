// Monitor_brand Monitor_model
$('#monitor_brand').on('change', function() {
    var monitor_brand_id = this.value;
    // console.log(monitor_brand_id);
    $.ajax({
        url: '../../../config/monitor/monitor_model.php',
        type: "POST",
        data: {
            monitor_brand_data: monitor_brand_id
        },
        success: function(result) {
            $('#monitor_model').html(result);
            console.log(result);
        }
    })
});

// Monitor_model Monitor_size
$('#monitor_model').on('change', function() {
    var monitor_model_id = this.value;
    // console.log(monitor_model_id);
    $.ajax({
        url: '../../../config/monitor/monitor_size.php',
        type: "POST",
        data: {
            monitor_model_data: monitor_model_id
        },
        success: function(data) {
            $('#monitor_size').html(data);
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

// Division Working
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