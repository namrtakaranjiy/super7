"use strict"

$(document).on('change', '#booking_select', function(){
    $("#my-bookings-form").trigger("submit");
});