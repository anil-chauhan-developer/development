(function($) {

    var switchStatus = false;
    var switchStatus = false;
    var switchStatus = false;
    $("#sun_status").on('change', function() {
        if ($(this).is(':checked')) {
          switchStatus = $(this).is(':checked');
          document.getElementById("sun_row").style.background = 'white';
          $("#sun_start_time").removeAttr("disabled");
          $("#sun_end_time").removeAttr("disabled");

          $("#sun_break_from").removeAttr("disabled");
          $("#sun_break_to").removeAttr("disabled");

        }else {
          switchStatus = $(this).is(':checked');           
          document.getElementById("sun_row").style.background = 'lightgray';
          $('#sun_start_time').attr("disabled", "disabled");
          $('#sun_end_time').attr("disabled", "disabled");

          $('#sun_break_from').attr("disabled", "disabled");
          $('#sun_break_to').attr("disabled", "disabled");
        }
    });

    $("#mon_status").on('change', function() {
        if ($(this).is(':checked')) {
          switchStatus = $(this).is(':checked');
          document.getElementById("mon_row").style.background = 'white';
          $("#mon_start_time").removeAttr("disabled");
          $("#mon_end_time").removeAttr("disabled");

          $("#mon_break_from").removeAttr("disabled");
          $("#mon_break_to").removeAttr("disabled");

        }else {
          switchStatus = $(this).is(':checked');           
          document.getElementById("mon_row").style.background = 'lightgray';
          $('#mon_start_time').attr("disabled", "disabled");
          $('#mon_end_time').attr("disabled", "disabled");

          $('#mon_break_from').attr("disabled", "disabled");
          $('#mon_break_to').attr("disabled", "disabled");
        }
    });

    $("#tue_status").on('change', function() {
        if ($(this).is(':checked')) {
          switchStatus = $(this).is(':checked');
          document.getElementById("tue_row").style.background = 'white';
          $("#tue_start_time").removeAttr("disabled");
          $("#tue_end_time").removeAttr("disabled");

          $("#tue_break_from").removeAttr("disabled");
          $("#tue_break_to").removeAttr("disabled");

        }else {
          switchStatus = $(this).is(':checked');           
          document.getElementById("tue_row").style.background = 'lightgray';
          $('#tue_start_time').attr("disabled", "disabled");
          $('#tue_end_time').attr("disabled", "disabled");

          $('#tue_break_from').attr("disabled", "disabled");
          $('#tue_break_to').attr("disabled", "disabled");
        }
    });

    $("#wed_status").on('change', function() {
        if ($(this).is(':checked')) {
          switchStatus = $(this).is(':checked');
          document.getElementById("wed_row").style.background = 'white';
          $("#wed_start_time").removeAttr("disabled");
          $("#wed_end_time").removeAttr("disabled");

          $('#wed_break_from').removeAttr("disabled", "disabled");
          $('#wed_break_to').removeAttr("disabled", "disabled");


        }else {
          switchStatus = $(this).is(':checked');           
          document.getElementById("wed_row").style.background = 'lightgray';
          $('#wed_start_time').attr("disabled", "disabled");
          $('#wed_end_time').attr("disabled", "disabled");

          $('#wed_break_from').attr("disabled", "disabled");
          $('#wed_break_to').attr("disabled", "disabled");
        }
    });

    $("#thus_status").on('change', function() {
        if ($(this).is(':checked')) {
          switchStatus = $(this).is(':checked');
          document.getElementById("thus_row").style.background = 'white';
          $("#thus_start_time").removeAttr("disabled");
          $("#thus_end_time").removeAttr("disabled");

          $('#thus_break_from').removeAttr("disabled", "disabled");
          $('#thus_break_to').removeAttr("disabled", "disabled");

        }else {
          switchStatus = $(this).is(':checked');           
          document.getElementById("thus_row").style.background = 'lightgray';
          $('#thus_start_time').attr("disabled", "disabled");
          $('#thus_end_time').attr("disabled", "disabled");

          $('#thus_break_from').attr("disabled", "disabled");
          $('#thus_break_to').attr("disabled", "disabled");
        }
    });

    $("#fri_status").on('change', function() {
        if ($(this).is(':checked')) {
          switchStatus = $(this).is(':checked');
          document.getElementById("fri_row").style.background = 'white';
          $("#fri_start_time").removeAttr("disabled");
          $("#fri_end_time").removeAttr("disabled");

          $("#fri_break_from").removeAttr("disabled");
          $("#fri_break_to").removeAttr("disabled");

        }else {
          switchStatus = $(this).is(':checked');           
          document.getElementById("fri_row").style.background = 'lightgray';
          $('#fri_start_time').attr("disabled", "disabled");
          $('#fri_end_time').attr("disabled", "disabled");

          $('#fri_break_from').attr("disabled", "disabled");
          $('#fri_break_to').attr("disabled", "disabled");
        }
    });

    $("#sat_status").on('change', function() {
        if ($(this).is(':checked')) {
          switchStatus = $(this).is(':checked');
          document.getElementById("sat_row").style.background = 'white';
          $("#sat_start_time").removeAttr("disabled");
          $("#sat_end_time").removeAttr("disabled");

          $("#sat_break_from").removeAttr("disabled");
          $("#sat_break_to").removeAttr("disabled");

        }else {
          switchStatus = $(this).is(':checked');           
          document.getElementById("sat_row").style.background = 'lightgray';
          $('#sat_start_time').attr("disabled", "disabled");
          $('#sat_end_time').attr("disabled", "disabled");

          $('#sat_break_from').attr("disabled", "disabled");
          $('#sat_break_to').attr("disabled", "disabled");
        }
    });

})(jQuery);