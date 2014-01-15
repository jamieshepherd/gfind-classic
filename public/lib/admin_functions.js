
function accept_pending(divid){
    $.ajax({
        type: "POST",
        url: "/app/core/actions/pending_accept.php",
        data: {query:divid},
        cache: false,
        success: function(){
            hide_div(divid);
        }
    });
}
function reject_pending(divid){
    $.ajax({
        type: "POST",
        url: "/app/core/actions/pending_reject.php",
        data: {query:divid},
        cache: false,
        success: function(){
            hide_div(divid);
        }
    });
}
function accept_edit(divid){
    $.ajax({
        type: "POST",
        url: "/app/core/actions/edit_accept.php",
        data: {query:divid},
        cache: false,
        success: function(){
            hide_div(divid);
        }
    });
}
function reject_edit(divid){
    $.ajax({
        type: "POST",
        url: "/app/core/actions/edit_reject.php",
        data: {query:divid},
        cache: false,
        success: function(){
            hide_div(divid);
        }
    });
}
function report_clear(divid){
    $.ajax({
        type: "POST",
        url: "/app/core/actions/report_clear.php",
        data: {query:divid},
        cache: false,
        success: function(){
            hide_div(divid);
        }
    });
}
function release_accept(divid){
    $.ajax({
        type: "POST",
        url: "/app/core/actions/release_accept.php",
        data: {query:divid},
        cache: false,
        success: function(){
            hide_div(divid);
        }
    });
}
function release_reject(divid){
    $.ajax({
        type: "POST",
        url: "/app/core/actions/release_reject.php",
        data: {query:divid},
        cache: false,
        success: function(){
            hide_div(divid);
        }
    });
}
function hide_div(divid){
    $('#item'+divid).fadeOut(100);
}