$('.multi-field-wrapper').each(function() {
    var $wrapper = $('.multi-fields', this);
    $(".add-field", $(this)).click(function(e) {
        $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
    });
    $('.multi-field .remove-field', $wrapper).click(function() {
        if ($('.multi-field', $wrapper).length > 1)
            $(this).parent('.multi-field').remove();
    });
});

$(function () {
  //Initialize Select2 Elements
  $(".select2").select2({
    allowClear: true
  });

  $('#datepicker').datepicker({
   format: 'dd-mm-yyyy',
  autoclose: true,
  startDate: '0d',
  todayBtn : 'linked',
  todayHighlight : 'true'
});

$('#datepicker2').datepicker({
   format: 'dd-mm-yyyy',
  autoclose: true,
  todayBtn : 'linked',
  todayHighlight : 'true'
});

$(document).ready(function(){
  $("#start").datepicker({
    format: 'yyyy-mm-dd',
   autoclose: true,
   startDate: '0d',
   todayBtn : 'linked',
   todayHighlight : 'true',
   daysOfWeekDisabled: "0,6"
  })

  .on('changeDate', function (selected) {
      var minDate = new Date(selected.date.valueOf());
      $('#end').datepicker('setStartDate', minDate);
      $('#start_predev').datepicker('setStartDate', minDate);

  });

  $("#end").datepicker({
    format: 'yyyy-mm-dd',
   autoclose: true,
   startDate: '0d',
   todayBtn : 'linked',
   todayHighlight : 'true',
   daysOfWeekDisabled: "0,6"
  })
      .on('changeDate', function (selected) {
          var minDate = new Date(selected.date.valueOf());
          $('#start').datepicker('setEndDate', minDate);
          $('#end_predev').datepicker('setEndDate', minDate);
          $('#end_dev').datepicker('setEndDate', minDate);
          $('#end_uat').datepicker('setEndDate', minDate);
          $('#end_cr').datepicker('setEndDate', minDate);
          $('#end_support').datepicker('setEndDate', minDate);
          $('#start_predev').datepicker('setEndDate', minDate);
          $('#start_dev').datepicker('setEndDate', minDate);
          $('#start_uat').datepicker('setEndDate', minDate);
          $('#start_cr').datepicker('setEndDate', minDate);
          $('#start_support').datepicker('setEndDate', minDate);

      });

    $("#start_predev").datepicker({
     format: 'yyyy-mm-dd',
     autoclose: true,
     startDate: '0d',
     todayBtn : 'linked',
     todayHighlight : 'true',
     daysOfWeekDisabled: "0,6"
    })

    .on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#end_predev').datepicker('setStartDate', minDate);

    });

    $("#end_predev").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6"
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#start_predev').datepicker('setEndDate', minDate);
            $('#start_dev').datepicker('setStartDate', minDate);
        });

    $("#start_dev").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6"
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#end_dev').datepicker('setStartDate', minDate);
        });

    $("#end_dev").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6"
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#start_dev').datepicker('setEndDate', minDate);
            $('#start_uat').datepicker('setStartDate', minDate);
        });

    $("#start_uat").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6"
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#end_uat').datepicker('setStartDate', minDate);
        });

    $("#end_uat").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6"
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#start_uat').datepicker('setEndDate', minDate);
            $('#start_cr').datepicker('setStartDate', minDate);
        });

    $("#start_cr").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6"
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#end_cr').datepicker('setStartDate', minDate);
        });

    $("#end_cr").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6"
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#start_cr').datepicker('setEndDate', minDate);
            $('#start_support').datepicker('setStartDate', minDate);
        });


    $("#start_support").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6"
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#end_support').datepicker('setStartDate', minDate);
        });

    $("#end_support").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6"
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#start_support').datepicker('setEndDate', minDate);

        });


});


});
