
// Tablet_brand Tablet_model
$('#tablet_brand').on('change', function() {
    var tablet_brand_id = this.value;
    console.log(tablet_brand_id);
    $.ajax({
        url: '../../../config/tablet/tablet_model.php',
        type: "POST",
        data: {
            tablet_brand_data: tablet_brand_id
        },
        success: function(result) {
            $('#tablet_model').html(result);
            console.log(result);
        }
    })
});

// Tablet_model Tablet_cpu
$('#tablet_model').on('change', function() {
    var tablet_model_id = this.value;
    console.log(tablet_model_id);
    $.ajax({
        url: '../../../config/tablet/tablet_cpu.php',
        type: "POST",
        data: {
            tablet_model_data: tablet_model_id
        },
        success: function(data) {
            $('#tablet_cpu').html(data);
            console.log(data);
        }
    })
});

// Tablet_cpu Tablet_speed
$('#tablet_cpu').on('change', function() {
    var tablet_cpu_id = this.value;
    console.log(tablet_cpu_id);
    $.ajax({
        url: '../../../config/tablet/tablet_speed.php',
        type: "POST",
        data: {
            tablet_cpu_data: tablet_cpu_id
        },
        success: function(data) {
            $('#tablet_speed').html(data);
            console.log(data);
        }
    })
});

// Tablet_speed Tablet_ram
$('#tablet_speed').on('change', function() {
    var tablet_speed_id = this.value;
    console.log(tablet_speed_id);
    $.ajax({
        url: '../../../config/tablet/tablet_ram.php',
        type: "POST",
        data: {
            tablet_speed_data: tablet_speed_id
        },
        success: function(data) {
            $('#tablet_ram').html(data);
            console.log(data);
        }
    })
});

// Tablet_ram Tablet_rom
$('#tablet_ram').on('change', function() {
    var tablet_ram_id = this.value;
    console.log(tablet_ram_id);
    $.ajax({
        url: '../../../config/tablet/tablet_rom.php',
        type: "POST",
        data: {
            tablet_ram_data: tablet_ram_id
        },
        success: function(data) {
            $('#tablet_rom').html(data);
            console.log(data);
        }
    })
});

// Tablet_rom OS_tablet
$('#tablet_rom').on('change', function() {
    var tablet_rom_id = this.value;
    console.log(tablet_rom_id);
    $.ajax({
        url: '../../../config/tablet/os_tablet.php',
        type: "POST",
        data: {
            tablet_rom_data: tablet_rom_id
        },
        success: function(data) {
            $('#os_tablet').html(data);
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

