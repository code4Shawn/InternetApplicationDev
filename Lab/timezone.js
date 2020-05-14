$(document).ready(function(){

    /*returns the number of minutes ahead or behind greenwitch meridian*/
    var offset = new Date().getTimezoneOffset();

    //return the number of miliseconds since 1970/01/01
    var timestamp = new Date().getTime();

    //we convert our time to: Universal Time Coordinated
    var utcTime = timestamp + (6000 * offset);

    $('#offset').val(offset);
    $('#utcTime').val(utcTime);
})