
// Computer_type Computer_case

  $('#computer_type').on('change', function() {
    var computer_type_id = this.value;
    console.log(computer_type_id);
    $.ajax({
        url: '../../../config/computer/computer_case.php',
        type: "POST",
        data: {
            computer_type_data: computer_type_id
        },
        success: function(result) {
            $('#computer_case').html(result);
            console.log(result);
        }
    })
});

// Computer_case Computer_model
$('#computer_case').on('change', function() {
    var computer_case_id = this.value;
    console.log(computer_case_id);
    $.ajax({
        url: '../../../config/computer/computer_model.php',
        type: "POST",
        data: {
            computer_case_data: computer_case_id
        },
        success: function(data) {
            $('#computer_model').html(data);
            console.log(data);
        }
    })
});

// Brand_cpu Spec_cpu
$('#brand_cpu').on('change', function() {
    var brand_cpu_id = this.value;
    console.log(brand_cpu_id);
    $.ajax({
        url: '../../../config/computer/spec_cpu.php',
        type: "POST",
        data: {
            brand_cpu_data: brand_cpu_id
        },
        success: function(result) {
            $('#spec_cpu').html(result);
            console.log(result);
        }
    })
});

// Storage_device Storage_spec
$('#storage_device').on('change', function() {
    var storage_device_id = this.value;
    console.log(storage_device_id);
    $.ajax({
        url: '../../../config/computer/storage_spec.php',
        type: "POST",
        data: {
            storage_device_data: storage_device_id
        },
        success: function(result) {
            $('#storage_spec').html(result);
            console.log(result);
        }
    })
});

// Storage_spec Ram_computer
$('#storage_spec').on('change', function() {
    var storage_spec_id = this.value;
    console.log(storage_spec_id);
    $.ajax({
        url: '../../../config/computer/ram_computer.php',
        type: "POST",
        data: {
            storage_spec_data: storage_spec_id
        },
        success: function(data) {
            $('#ram_computer').html(data);
            console.log(data);
        }
    })
});

// Ram_computer Microsoft_office
$('#ram_computer').on('change', function() {
    var ram_computer_id = this.value;
    console.log(ram_computer_id);
    $.ajax({
        url: '../../../config/computer/microsoft_office.php',
        type: "POST",
        data: {
            ram_computer_data: ram_computer_id
        },
        success: function(data) {
            $('#microsoft_office').html(data);
            console.log(data);
        }
    })
});

// Microsoft_office Os_computer
$('#microsoft_office').on('change', function() {
    var microsoft_office_id = this.value;
    // console.log(microsoft_office_id);
    $.ajax({
        url: '../../../config/computer/os_computer.php',
        type: "POST",
        data: {
            microsoft_office_data: microsoft_office_id
        },
        success: function(data) {
            $('#os_computer').html(data);
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