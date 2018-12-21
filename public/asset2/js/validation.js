function h(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
    if ( (charCode<65 && charCode>32) || (charCode>90 && charCode<97) || (charCode>122 && charCode<127)){
        return false;
    }
    return true;
}

function n(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode>57 || charCode==45 || charCode==32 || (charCode>32 && charCode<=47)){
        return false;        
    }
    return true;
}

function hn(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if ((charCode>=0 && charCode<=47) || (charCode>=58 && charCode<=64) || (charCode>=91 && charCode<=96) || (charCode>=123)){
        return false;
    }
    return true;
}