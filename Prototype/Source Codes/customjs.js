$(function() {

    var a = $("#blkk").val();
    var b = $("#fl").val();
    var c = $("#rm").val();

    var m;
    var r = null;

    var o1, o2, o3;

    $("input").change(function() {
        var str = $("#datepicker").val();

        $.ajax({
                type: "GET",
                url: "getBookTime.php",
                data: "blk=" + a + "&floor=" + b + "&id=" + c + "&date=" + str,
                dataType: 'json',
                success: function(data) {
                        m = data;
                        // Start of second call
                        $.ajax({
                                type: "GET",
                                url: "getOriginalTime.php",
                                data: "blk=" + a + "&floor=" + b + "&id=" + c,
                                dataType: 'json',
                                success: function(data) {
                                        o1 = data;
                                        //console.log(o1);
                                        //console.log(m);
                                        $.ajax({
                                                type: "GET",
                                                url: "getInterval.php",
                                                data: "st=" + o1[0] + "&et=" + o1[1],
                                                dataType: 'json',
                                                success: function(data) {
                                                    o2 = data;
                                                }
                                            }) // End of third ajax 
                                            .done(function(data) {
                                                o2 = data;
                                                myCallback(m, o1, o2);
                                                console.log(m);
                                                console.log(o1);
                                                console.log(o2);
                                            }); // End of third ajax complete
                                    } // End of second success
                            }) // End of second ajax
                            .done(function(data) {
                                o1 = data;
                            }); // End of second ajax complete
                    } // End of first success
            }) // End of first ajax
            .done(function(data) {
                m = data;
            }); // End of first ajax complete

    });

    function myCallback(r1, r2, r3) {
        // m = r1 // get book time
        // o1 = r2 //get time range
        // o2 = r3 // get get time intervals
        var xhtml = [];
        var no = 0;

        if (r1.length == 0) {
            for (var a = 0; a < r3.length - 1; a++) {
                xhtml[no] = "<option>" + r3[a] + " - " + r3[a + 1] + "</option>";
                no++;
                //console.log(xhtml);
                $("#timing").html(xhtml);
            }
        } else {
            for (var i = 0; i < r3.length - 1; i++) {
                var ok;

                for (var j = 0; j < r1.length; j++) {

                    var za = r3[i];
                    var xa = r1[j].book_start_time;
                    var sa = r1[0].book_start_time;

                    var str1 = za.split(":");
                    var str2 = xa.split(":");
                    var str3 = sa.split(":");

                    var t1 = new Date();
                    var t2 = new Date();
                    var t3 = new Date();

                    t1.setHours(str1[0], str1[1], 0);
                    t2.setHours(str2[0], str2[1], 0);
                    t3.setHours(str3[0], str3[1], 0);

                    if (t1.getTime() == t3.getTime()) {
                        ok = true;
                    } else if (t1.getTime() == t2.getTime()) {
                        j++;
                        ok = true;
                    } else {
                        ok = false;
                    }
                }

                if (ok == false) {
                    xhtml[no] = "<option>" + r3[i] + " - " + r3[i + 1] + "</option>";
                    no++;
                    //console.log(xhtml);
                    $("#timing").html(xhtml);
                } else {
                    console.log(xhtml);
                }
            }
        }
    }
});



// without button
$(function() {

    var a = $("#blkk").val();
    var b = $("#fl").val();
    var c = $("#rm").val();

    var m;
    var r = null;

    var o1, o2, o3;

    //$("input").change(function() {
    var str = $("#datee").val();

    $.ajax({
            type: "GET",
            url: "getBookTime.php",
            data: "blk=" + a + "&floor=" + b + "&id=" + c + "&date=" + str,
            dataType: 'json',
            success: function(data) {
                    m = data;
                    // Start of second call
                    $.ajax({
                            type: "GET",
                            url: "getOriginalTime.php",
                            data: "blk=" + a + "&floor=" + b + "&id=" + c,
                            dataType: 'json',
                            success: function(data) {
                                    o1 = data;
                                    //console.log(o1);
                                    //console.log(m);
                                    $.ajax({
                                            type: "GET",
                                            url: "getInterval.php",
                                            data: "st=" + o1[0] + "&et=" + o1[1],
                                            dataType: 'json',
                                            success: function(data) {
                                                o2 = data;
                                            }
                                        }) // End of third ajax 
                                        .done(function(data) {
                                            o2 = data;
                                            myCallback(m, o1, o2);
                                            console.log(m);
                                            console.log(o1);
                                            console.log(o2);
                                        }); // End of third ajax complete
                                } // End of second success
                        }) // End of second ajax
                        .done(function(data) {
                            o1 = data;
                        }); // End of second ajax complete
                } // End of first success
        }) // End of first ajax
        .done(function(data) {
            m = data;
        }); // End of first ajax complete

    //});

    function myCallback(r1, r2, r3) {
        // m = r1 // get book time
        // o1 = r2 //get time range
        // o2 = r3 // get get time intervals
        var xhtml = [];
        var no = 0;
        var emp = ' ';
        $("#timing").html(emp);

        if (r1.length == 0) {
            for (var a = 0; a < r3.length - 1; a++) {
                xhtml[no] = "<option>" + r3[a] + " - " + r3[a + 1] + "</option>";
                no++;
                //console.log(xhtml);
                $("#timing").html(xhtml);
            }
        } else {
            for (var i = 0; i < r3.length - 1; i++) {
                var ok;

                for (var j = 0; j < r1.length; j++) {

                    var za = r3[i];
                    var xa = r1[j].book_start_time;
                    var sa = r1[0].book_start_time;

                    var str1 = za.split(":");
                    var str2 = xa.split(":");
                    var str3 = sa.split(":");

                    var t1 = new Date();
                    var t2 = new Date();
                    var t3 = new Date();

                    t1.setHours(str1[0], str1[1], 0);
                    t2.setHours(str2[0], str2[1], 0);
                    t3.setHours(str3[0], str3[1], 0);

                    if (t1.getTime() == t3.getTime()) {
                        ok = true;
                    } else if (t1.getTime() == t2.getTime()) {
                        j++;
                        ok = true;
                    } else {
                        ok = false;
                    }
                }

                if (ok == false) {
                    xhtml[no] = "<option>" + r3[i] + " - " + r3[i + 1] + "</option>";
                    no++;
                    //console.log(xhtml);
                    $("#timing").html(xhtml);
                } else {
                    console.log(xhtml);
                }
            }
        }
        console.log(xhtml);
    }
});

/*
$(function() {
    $("#datepicker").datepicker({
        onSelect: function(dateText, inst) {
            $("input[name='something']").val(dateText);
            $("#d").html(dateText);

            var str = $("#datepicker").val();

            $.ajax({
                    type: "GET",
                    url: "getBookTime.php",
                    data: "blk=" + a + "&floor=" + b + "&id=" + c + "&date=" + dateText,
                    dataType: 'json',
                    success: function(data) {
                            m = data;
                            // Start of second call
                            $.ajax({
                                    type: "GET",
                                    url: "getOriginalTime.php",
                                    data: "blk=" + a + "&floor=" + b + "&id=" + c,
                                    dataType: 'json',
                                    success: function(data) {
                                            o1 = data;
                                            //console.log(o1);
                                            //console.log(m);
                                            $.ajax({
                                                    type: "GET",
                                                    url: "getInterval.php",
                                                    data: "st=" + o1[0] + "&et=" + o1[1],
                                                    dataType: 'json',
                                                    success: function(data) {
                                                        o2 = data;
                                                    }
                                                }) // End of third ajax 
                                                .done(function(data) {
                                                    o2 = data;
                                                    myCallback(m, o1, o2);
                                                    console.log(m);
                                                    console.log(o1);
                                                    console.log(o2);
                                                }); // End of third ajax complete
                                        } // End of second success
                                }) // End of second ajax
                                .done(function(data) {
                                    o1 = data;
                                }); // End of second ajax complete
                        } // End of first success
                }) // End of first ajax
                .done(function(data) {
                    m = data;
                }); // End of first ajax complete
        }
    });

    function myCallback(r1, r2, r3) {
        // m = r1 // get book time
        // o1 = r2 //get time range
        // o2 = r3 // get get time intervals
        var xhtml = [];
        var no = 0;

        if (r1.length == 0) {
            for (var a = 0; a < r3.length - 1; a++) {
                xhtml[no] = "<option>" + r3[a] + " - " + r3[a + 1] + "</option>";
                no++;
                //console.log(xhtml);
                $("#timing").html(xhtml);
            }
        } else {
            for (var i = 0; i < r3.length - 1; i++) {
                var ok;

                for (var j = 0; j < r1.length; j++) {

                    var za = r3[i];
                    var xa = r1[j].book_start_time;
                    var sa = r1[0].book_start_time;

                    var str1 = za.split(":");
                    var str2 = xa.split(":");
                    var str3 = sa.split(":");

                    var t1 = new Date();
                    var t2 = new Date();
                    var t3 = new Date();

                    t1.setHours(str1[0], str1[1], 0);
                    t2.setHours(str2[0], str2[1], 0);
                    t3.setHours(str3[0], str3[1], 0);

                    if (t1.getTime() == t3.getTime()) {
                        ok = true;
                    } else if (t1.getTime() == t2.getTime()) {
                        j++;
                        ok = true;
                    } else {
                        ok = false;
                    }
                }

                if (ok == false) {
                    xhtml[no] = "<option>" + r3[i] + " - " + r3[i + 1] + "</option>";
                    no++;
                    //console.log(xhtml);
                    $("#timing").html(xhtml);
                } else {
                    console.log(xhtml);
                }
            }
        }
    }
});
*/