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


  $(".select2").select2();

  $('#datepicker').datepicker({
   format: 'yyyy-mm-dd',
  autoclose: true,
  startDate: '0d',
  todayBtn : 'linked',
  todayHighlight : 'true'
});

$('#datepicker2').datepicker({
  format: 'yyyy-mm-dd',
  autoclose: true,
  todayBtn : 'linked',
  todayHighlight : 'true'
});

$(document).ready(function(){

  $("#start").datepicker({
   format: 'yyyy-mm-dd',
   autoclose: true,
   startDate: '0d',
   minDate:0,
   todayBtn : 'linked',
   todayHighlight : 'true',
   daysOfWeekDisabled: "0,6",
   beforeShowMonth: function (date){
                  if (date.getMonth() == 8) {
                    return false;
                  }
                }
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
   daysOfWeekDisabled: "0,6",
   beforeShowMonth: function (date){
                  if (date.getMonth() == 8) {
                    return false;
                  }
                }

  })
      .on('changeDate', function (selected) {
          var minDate = new Date(selected.date.valueOf());


      });

var predev1 =  new Date($("#start_predev").val());
    $("#start_predev").datepicker({

     format: 'yyyy-mm-dd',
     autoclose: true,
     startDate: '0d',
     todayBtn : 'linked',
     todayHighlight : 'true',
     daysOfWeekDisabled: "0,6",
     beforeShowMonth: function (date){
                    if (date.getMonth() == 8) {
                      return false;
                    }
                  }
    })

    .on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#end_predev').datepicker('setStartDate', minDate);
        var timeDiff = minDate.getTime() - predev1.getTime();
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
        var diff = diffDays;
        predev1 = minDate;
        var end_predev =  new Date($("#end_predev").val());
        var start_dev =  new Date($("#start_dev").val());
        var end_dev =  new Date($("#end_dev").val());
        var start_uat =  new Date($("#start_uat").val());
        var end_uat =  new Date($("#end_uat").val());
        var start_cr =  new Date($("#start_cr").val());
        var end_cr =  new Date($("#end_cr").val());
        var start_support =  new Date($("#start_support").val());
        var end_support =  new Date($("#end_support").val());
        var new_predev = new Date(end_predev.getFullYear(), end_predev.getMonth(), end_predev.getDate()+diff);
        var new_start_dev = new Date(start_dev.getFullYear(), start_dev.getMonth(), start_dev.getDate()+diff);
        var new_end_dev = new Date(end_dev.getFullYear(), end_dev.getMonth(), end_dev.getDate()+diff);
        var new_start_uat = new Date(start_uat.getFullYear(), start_uat.getMonth(), start_uat.getDate()+diff);
        var new_end_uat = new Date(end_uat.getFullYear(), end_uat.getMonth(), end_uat.getDate()+diff);
        var new_start_cr = new Date(start_cr.getFullYear(), start_cr.getMonth(), start_cr.getDate()+diff);
        var new_end_cr = new Date(end_cr.getFullYear(), end_cr.getMonth(), end_cr.getDate()+diff);
        var new_start_support = new Date(start_support.getFullYear(), start_support.getMonth(), start_support.getDate()+diff);
        var new_end_support = new Date(end_support.getFullYear(), end_support.getMonth(), end_support.getDate()+diff);
        $('#end_predev').datepicker('setDate', new_predev);
        $('#start_dev').datepicker('setDate', new_start_dev);
        $('#end_dev').datepicker('setDate', new_end_dev);
        $('#start_uat').datepicker('setDate', new_start_uat);
        $('#end_uat').datepicker('setDate', new_end_uat);
        $('#start_cr').datepicker('setDate', new_start_cr);
        $('#end_cr').datepicker('setDate', new_end_cr);
        $('#start_support').datepicker('setDate', new_start_support);
        $('#end_support').datepicker('setDate', new_end_support);

    });

var predev2 =  new Date($("#end_predev").val());
    $("#end_predev").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6",
      beforeShowMonth: function (date){
                     if (date.getMonth() == 8) {
                       return false;
                     }
                   }
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#start_dev').datepicker('setStartDate', minDate);

            var timeDiff = minDate.getTime() - predev2.getTime();
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            var diff = diffDays;
            predev2 = minDate;
            var start_dev =  new Date($("#start_dev").val());
            var end_dev =  new Date($("#end_dev").val());
            var start_uat =  new Date($("#start_uat").val());
            var end_uat =  new Date($("#end_uat").val());
            var start_cr =  new Date($("#start_cr").val());
            var end_cr =  new Date($("#end_cr").val());
            var start_support =  new Date($("#start_support").val());
            var end_support =  new Date($("#end_support").val());
            var new_start_dev = new Date(start_dev.getFullYear(), start_dev.getMonth(), start_dev.getDate()+diff);
            var new_end_dev = new Date(end_dev.getFullYear(), end_dev.getMonth(), end_dev.getDate()+diff);
            var new_start_uat = new Date(start_uat.getFullYear(), start_uat.getMonth(), start_uat.getDate()+diff);
            var new_end_uat = new Date(end_uat.getFullYear(), end_uat.getMonth(), end_uat.getDate()+diff);
            var new_start_cr = new Date(start_cr.getFullYear(), start_cr.getMonth(), start_cr.getDate()+diff);
            var new_end_cr = new Date(end_cr.getFullYear(), end_cr.getMonth(), end_cr.getDate()+diff);
            var new_start_support = new Date(start_support.getFullYear(), start_support.getMonth(), start_support.getDate()+diff);
            var new_end_support = new Date(end_support.getFullYear(), end_support.getMonth(), end_support.getDate()+diff);

            $('#start_dev').datepicker('setDate', new_start_dev);
            $('#end_dev').datepicker('setDate', new_end_dev);
            $('#start_uat').datepicker('setDate', new_start_uat);
            $('#end_uat').datepicker('setDate', new_end_uat);
            $('#start_cr').datepicker('setDate', new_start_cr);
            $('#end_cr').datepicker('setDate', new_end_cr);
            $('#start_support').datepicker('setDate', new_start_support);
            $('#end_support').datepicker('setDate', new_end_support);

        });

    $("#start_dev").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6",
      beforeShowMonth: function (date){
                     if (date.getMonth() == 8) {
                       return false;
                     }
                   }
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#end_dev').datepicker('setStartDate', minDate);

        });

var dev1 =  new Date($("#end_dev").val());
    $("#end_dev").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6",
      beforeShowMonth: function (date){
                     if (date.getMonth() == 8) {
                       return false;
                     }
                   }
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#start_uat').datepicker('setStartDate', minDate);

            var timeDiff = minDate.getTime() - dev1.getTime();
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            var diff = diffDays;
            dev1 = minDate;
            var start_uat =  new Date($("#start_uat").val());
            var end_uat =  new Date($("#end_uat").val());
            var start_cr =  new Date($("#start_cr").val());
            var end_cr =  new Date($("#end_cr").val());
            var start_support =  new Date($("#start_support").val());
            var end_support =  new Date($("#end_support").val());
            var new_start_uat = new Date(start_uat.getFullYear(), start_uat.getMonth(), start_uat.getDate()+diff);
            var new_end_uat = new Date(end_uat.getFullYear(), end_uat.getMonth(), end_uat.getDate()+diff);
            var new_start_cr = new Date(start_cr.getFullYear(), start_cr.getMonth(), start_cr.getDate()+diff);
            var new_end_cr = new Date(end_cr.getFullYear(), end_cr.getMonth(), end_cr.getDate()+diff);
            var new_start_support = new Date(start_support.getFullYear(), start_support.getMonth(), start_support.getDate()+diff);
            var new_end_support = new Date(end_support.getFullYear(), end_support.getMonth(), end_support.getDate()+diff);

            $('#start_uat').datepicker('setDate', new_start_uat);
            $('#end_uat').datepicker('setDate', new_end_uat);
            $('#start_cr').datepicker('setDate', new_start_cr);
            $('#end_cr').datepicker('setDate', new_end_cr);
            $('#start_support').datepicker('setDate', new_start_support);
            $('#end_support').datepicker('setDate', new_end_support);

        });

    $("#start_uat").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6",
      beforeShowMonth: function (date){
                     if (date.getMonth() == 8) {
                       return false;
                     }
                   }
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#end_uat').datepicker('setStartDate', minDate);
        });

var uat1 =  new Date($("#end_uat").val());
    $("#end_uat").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6",
      beforeShowMonth: function (date){
                     if (date.getMonth() == 8) {
                       return false;
                     }
                   }
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#start_cr').datepicker('setStartDate', minDate);

            var timeDiff = minDate.getTime() - uat1.getTime();
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            var diff = diffDays;
            uat1 = minDate;
            var start_cr =  new Date($("#start_cr").val());
            var end_cr =  new Date($("#end_cr").val());
            var start_support =  new Date($("#start_support").val());
            var end_support =  new Date($("#end_support").val());
            var new_start_cr = new Date(start_cr.getFullYear(), start_cr.getMonth(), start_cr.getDate()+diff);
            var new_end_cr = new Date(end_cr.getFullYear(), end_cr.getMonth(), end_cr.getDate()+diff);
            var new_start_support = new Date(start_support.getFullYear(), start_support.getMonth(), start_support.getDate()+diff);
            var new_end_support = new Date(end_support.getFullYear(), end_support.getMonth(), end_support.getDate()+diff);

            $('#start_cr').datepicker('setDate', new_start_cr);
            $('#end_cr').datepicker('setDate', new_end_cr);
            $('#start_support').datepicker('setDate', new_start_support);
            $('#end_support').datepicker('setDate', new_end_support);
        });

    $("#start_cr").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6",
      beforeShowMonth: function (date){
                     if (date.getMonth() == 8) {
                       return false;
                     }
                   }
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#end_cr').datepicker('setStartDate', minDate);
        });

var cr1 =  new Date($("#end_cr").val());
    $("#end_cr").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6",
      beforeShowMonth: function (date){
                     if (date.getMonth() == 8) {
                       return false;
                     }
                   }
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#start_support').datepicker('setStartDate', minDate);

            var timeDiff = minDate.getTime() - cr1.getTime();
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            var diff = diffDays;
            cr1 = minDate;
            var start_support =  new Date($("#start_support").val());
            var end_support =  new Date($("#end_support").val());
            var new_start_support = new Date(start_support.getFullYear(), start_support.getMonth(), start_support.getDate()+diff);
            var new_end_support = new Date(end_support.getFullYear(), end_support.getMonth(), end_support.getDate()+diff);

            $('#start_support').datepicker('setDate', new_start_support);
            $('#end_support').datepicker('setDate', new_end_support);

        });


    $("#start_support").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6",
      beforeShowMonth: function (date){
                     if (date.getMonth() == 8) {
                       return false;
                     }
                   }
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#end_support').datepicker('setStartDate', minDate);
        });
var support1 =  new Date($("#end_support").val());
var end_date =  new Date($("#end").val());

    $("#end_support").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayBtn : 'linked',
      daysOfWeekDisabled: "0,6",
      beforeShowMonth: function (date){
                     if (date.getMonth() == 8) {
                       return false;
                     }
                   }
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            var timeDiff = minDate.getTime() - support1.getTime();
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            var diff = diffDays;
            support1 = minDate;
            var new_end_date =  new Date($("#end").val());
            var new_end = new Date(new_end_date.getFullYear(), new_end_date.getMonth(), new_end_date.getDate()+diff);

            console.log(diff);

            $('#end').datepicker('setDate', new_end);

        });



});




});
