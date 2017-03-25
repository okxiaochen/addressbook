
$.getJSON("api/Handler.php",{
     type: "list",
     user: "1" ,
     strategy: "all"
    }, function(data) {
    $.post("template/profileRow.html",function(tmp) {
        for(var i=0;i<data.length;i++) {
            var ctmp = tmp;
            ctmp = ctmp.replace(/#name/g, data[i].name);
            ctmp = ctmp.replace(/#email/g, data[i].email);
            ctmp = ctmp.replace(/#phone/g, data[i].phone);
            $("tbody").append(ctmp);
        }
    })
})