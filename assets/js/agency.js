// Department Segment
$('#department').on('change', function() {
  var department_id = this.value;
  $.ajax({
    url: '/Equipment-Lampang-city/application/config/account/segment.php',
    type: "POST",
    data: {
      department_data: department_id
    },
    success: function(result) {
      $('#segment').html(result);
      console.log(result);
    }
  });
});

// Segment Division
$('#segment').on('change', function() {
  var segment_id = this.value;
  console.log(segment_id);
  $.ajax({
    url: '/Equipment-Lampang-city/application/config/account/division.php',
    type: "POST",
    data: {
      segment_data: segment_id
    },
    success: function(data) {
      $('#division').html(data);
      console.log(data);
    }
  });
});

// Division Work
$('#division').on('change', function() {
  var division_id = this.value;
  console.log(division_id);
  $.ajax({
    url: '/Equipment-Lampang-city/application/config/account/working.php',
    type: "POST",
    data: {
      division_data: division_id
    },
    success: function(data) {
      $('#working').html(data);
      console.log(data);
    }
  });
});
