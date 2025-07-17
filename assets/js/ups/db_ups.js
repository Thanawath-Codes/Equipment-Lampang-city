
// Ups_brand Ups_model
$('#ups_brand').on('change', function() {
    var ups_brand_id = this.value;
    // console.log(ups_brand_id);
    $.ajax({
        url: '../../../config/ups/ups_model.php',
        type: "POST",
        data: {
            ups_brand_data: ups_brand_id
        },
        success: function(result) {
            $('#ups_model').html(result);
            console.log(result);
        }
    })
});

// Ups_model Electrical_capacity
$('#ups_model').on('change', function() {
    var ups_model_id = this.value;
    console.log(ups_model_id);
    $.ajax({
        url: '../../../config/ups/electrical_capacity.php',
        type: "POST",
        data: {
            ups_model_data: ups_model_id
        },
        success: function(data) {
            $('#electrical_capacity').html(data);
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

