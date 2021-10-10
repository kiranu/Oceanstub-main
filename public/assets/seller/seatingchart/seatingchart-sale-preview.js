var stage;
var layer;
$("#ticketdetails").dialog({
    autoOpen: false,
    modal: true
});
$("#ticketdetailsbigpopup").dialog({
    autoOpen: false,
    modal: true
});
$("#rowoftikets").dialog({
    autoOpen: false,
    modal: true
});
$(".dailog-cancel").click(function(){
    $("#ticketdetails").dialog('close');
    $("#ticketdetailsbigpopup").dialog('close');
})
$.LoadingOverlay("show");
setTimeout(function(){
    $.LoadingOverlay("hide");
}, 1500);
stage = new Konva.Stage({
    container: 'playground',
    width: 2200,
    height: 2200,
});
$(document).ready(function() {
	setTimeout(function(){
		var json = $('#sketchpaddata').val();
		json = format(json, "draggable");
		layer = Konva.Node.create(json,'playground');
		stage.add(layer);
		stage.on('mousemove touchmove', function(e) {
    		return false;            
		});
	}, 2000);
});
function format(json_string, key_to_skip) {
    return JSON.parse(json_string, function (key, value) {
        if (key !== key_to_skip) {
            return value;
        }
    });    
}
stage.on('mouseover', function(e) {
    pos = stage.getPointerPosition();
    // console.log(e);
    if (e.target.attrs.type == "rowindividualseats" && e.target.attrs.category == "seats") {
        if(e.target.attrs.PriceLevel != "novalue" && e.target.attrs.PriceLevel != undefined ) {
            $('.individual-seat-details-for-table-with-seats').css('top', e.evt.pageY - 30 + 'px');
            $('.individual-seat-details-for-table-with-seats').css('left', e.evt.pageX  - 60 + 'px');
            $('.rowname-tooltip').text("Row :" +  e.target.attrs.rowname);
            $('.seatno').text("Seat : " +  e.target.attrs.seatno);
            $('.avaliability').text("Price :" + e.target.attrs.PriceLevel);
            $('.individual-seat-details-for-table-with-seats').css('display', 'block');
        }
    }
    else if(e.target.attrs.type == "tablewithseats") {
       $('.individual-seat-details-for-table-with-seats').css('display', 'none');  
        if(e.target.attrs.PriceLevel != "novalue" && e.target.attrs.PriceLevel != undefined ) {
            //if(e.target.attrs.ticketCount != 0 && e.target.attrs.ticketCount != undefined) {
            $('.individual-seat-details-for-table-with-seats').css('top', e.evt.pageY - 30 + 'px');
            $('.individual-seat-details-for-table-with-seats').css('left', e.evt.pageX  - 60 + 'px');
            $('.rowname-tooltip').text(' ');
            $('.seatno').text("Seat : " +  e.target.attrs.seatno);
            $('.avaliability').text("Price :" + e.target.attrs.PriceLevel);
            $('.individual-seat-details-for-table-with-seats').css('display', 'block');
            //}
        }
    }
    else if(e.target.attrs.type != "tablewithoutchair") {
        $('.individual-seat-details-for-table-with-seats').css('display', 'none');
        if(e.target.attrs.PriceLevel != "novalue" && e.target.attrs.PriceLevel != undefined ) {
            if(e.target.attrs.ticketCount != 0 && e.target.attrs.ticketCount != undefined) {
                $('.individual-seat-details-for-table-with-seats').css('top', e.evt.pageY - 30 + 'px');
                $('.individual-seat-details-for-table-with-seats').css('left', e.evt.pageX  - 60 + 'px');
                $('.rowname-tooltip').text(' ');
                $('.seatno').text("Maximum Seats :" +  e.target.attrs.ticketCount);
                $('.avaliability').text("Price :" + e.target.attrs.PriceLevel);
                $('.individual-seat-details-for-table-with-seats').css('display', 'block');
            }
        }
    }
    else if (e.target.attrs.ganame != "" && e.target.attrs.ganame != undefined){
        $('.individual-seat-details-for-table-with-seats').css('display', 'none');
        if(e.target.attrs.PriceLevel != "Novalue" && e.target.attrs.PriceLevel != undefined ) {
            if(e.target.attrs.ticketCount != 0 && e.target.attrs.ticketCount != undefined) {
                $('.individual-seat-details-for-table-with-seats').css('top', e.evt.pageY - 30 + 'px');
                $('.individual-seat-details-for-table-with-seats').css('left', e.evt.pageX  - 60 + 'px');
                $('.rowname-tooltip').text(' ');
                $('.seatno').text("Maximum Seats :" +  e.target.attrs.maxgacapacity);
                $('.avaliability').text("Price :" + e.target.attrs.PriceLevel);
                $('.individual-seat-details-for-table-with-seats').css('display', 'block');
            }
        }
    }
    else {
        $('.individual-seat-details-for-table-with-seats').css('display', 'none');
    }
})
stage.on('mousedown touchstart', function(e) {
    shapecheck(e);
    shapeaddE = e;
})
function shapecheck(e) {
    if(e.target.attrs.type == "rowindividualseats") {
        $(".rowride").css('display','inline');
        $(".seathide").css('display','inline');
        $('.individual-seat-details-for-table-with-seats').css('display', 'none'); 
        if(e.target.attrs.ticketAdded == true) {
            if(e.target.attrs.ishide != true) {
                $("#ticketdetailsbigpopup").dialog('open');
                //console.log(e.target.attrs);
                $(".ind-row-name").val(e.target.attrs.rowname);
                $(".ind-sec-seat-no").val(e.target.attrs.seatno);
                $(".ind-sec-seat-price").val(e.target.attrs.PriceLevel);
                var sectiondetails = stage.find("#"+e.target.attrs.selectedsectionid);
                // console.log(sectiondetails.length);
                if(sectiondetails.length == 2) {
                    $('.ind-sec-name').val(sectiondetails[1].attrs.sectionname);
                }
                else if(sectiondetails.length == 1) {
                    $('.ind-sec-name').val(sectiondetails[0].parent.children[2].attrs.sectionname);
                }
                $(".variablepricecontainer").empty();
                if(e.target.attrs.variablepricename != "novalue") {
                    console.log(e.target.attrs);
                    var querystring = "<h6>Choose ticket type:</h6>";
                    querystring += "<div><p><input type='radio' checked name='checkradio' class='pricevariation' value="+e.target.attrs.PriceLevel+"> <span>"+e.target.attrs.PriceLevel+" - </span>";
                    querystring += "<span>"+e.target.attrs.pricename+ "</span></p></div>";
                    querystring += "<div><p><input type='radio' name='checkradio' class='pricevariation' value="+e.target.attrs.variableprice+"> <span>"+e.target.attrs.variableprice+" - </span>";
                    querystring += "<span>"+ e.target.attrs.variablepricename + "</span></p></div>";
                    $(".variablepricecontainer").append(querystring);
                }
            }
        }
        //console.log(e);
    }
    else if(e.target.attrs.type == "sectionrow") {
        $(".rowride").css('display','inline');
        $(".seathide").css('display','inline');
        var rowdetails = e.target.attrs;
        console.log(rowdetails);
        var rowseats = stage.find("#"+rowdetails.id);
        var count = 0;
        var priceavg = 0;
        var firstseatprice = 0;
        var b =1;
        for(var l=0;l<rowseats[0].parent.children.length;l++){
            if(rowseats[0].parent.children[l].attrs.type == "rowindividualseats") {
                if(rowseats[0].parent.children[l].attrs.ticketAdded == true) {
                    var rowfullseats = stage.find("."+rowseats[0].parent.children[l].attrs.name);
                    // rowfullseats.setAttr('PriceLevel', colorvalue);
                    // rowfullseats.setAttr('ticketAdded', true);
                    // rowfullseats.fill(colorvalue);
                    // layer.draw();
                    // stage.add(layer);
                    if(b == 1) {
                        firstseatprice += parseInt(rowfullseats[0].attrs.PriceLevel);
                        b++;
                        $(".variablepricecontainer").empty();
                        if(rowseats[0].parent.children[l].attrs.variablepricename != "novalue" && rowseats[0].parent.children[l].attrs.variablepricename != undefined) {
                            console.log(e.target.attrs);
                            var querystring = "<h6>Choose ticket type:</h6>";
                            querystring += "<div><p><input type='radio' checked name='checkradio' name='pricevariation' value="+rowfullseats[0].attrs.PriceLevel+"> <span>"+rowfullseats[0].attrs.PriceLevel+" - </span>";
                            querystring += "<span>"+rowfullseats[0].attrs.pricename+ "</span></p></div>";
                            querystring += "<div><p><input type='radio' name='checkradio' name='pricevariation' value="+rowfullseats[0].attrs.variableprice+"> <span>"+rowfullseats[0].attrs.variableprice+" - </span>";
                            querystring += "<span>"+ rowfullseats[0].attrs.variablepricename + "</span></p></div>";
                            $(".variablepricecontainer").append(querystring);
                        }
                    }
                    count++;
                    priceavg += parseInt(rowfullseats[0].attrs.PriceLevel);
                }
            }
        }
        if(count != 0) {
            if((priceavg/count) == firstseatprice) {
                // $("#rowoftikets").dialog('open');
                $("#ticketdetailsbigpopup").dialog('open');
            }
            else {
                //alert("hello");
                $("#ticketdetailsbigpopup").dialog('close');
            }
        }
        //$("#ticketdetailsbigpopup").dialog('open');
        $(".ind-row-name").val(e.target.attrs.rowname);
        var seats = stage.find("#"+e.target.attrs.id);
        var seatnos = [];
        var l;
        for(n=0;n<=seats[0].parent.children.length;n++) {
            if(seats[0].parent.children[n] != undefined) {
                if(seats[0].parent.children[n].attrs.type == "rowindividualseats") {
                    if(seats[0].parent.children[n].attrs.ticketAdded == true) {
                        if(seats[0].parent.children[n].attrs.ishide != true) {
                            seatnos.push(seats[0].parent.children[n].attrs.seatno);
                        }
                    }
                }
            }
        }
        seatnos.join(',');
        //console.log(seatnos);
        $(".ind-sec-seat-no").val(seatnos);
        $(".ind-sec-seat-price").val(firstseatprice);
        var sectiondetails = stage.find("#"+e.target.attrs.selectedsectionid);
            // console.log(sectiondetails.length);
            if(sectiondetails.length == 2) {
                $('.ind-sec-name').val(sectiondetails[1].attrs.sectionname);
            }
            else if(sectiondetails.length == 1) {
                $('.ind-sec-name').val(sectiondetails[0].parent.children[2].attrs.sectionname);
            }
        }
        else if(e.target.attrs.type = "tablewithseats" && e.target.attrs.category == "seats" ) {
            $(".rowride").css('display','none');
            $(".seathide").css('display','inline');
            $('.individual-seat-details-for-table-with-seats').css('display', 'none'); 
            if(e.target.attrs.ticketAdded == true) {
                if(e.target.attrs.ishide != true) {
                    $("#ticketdetailsbigpopup").dialog('open');
                    //console.log(e.target.attrs);
                    $(".ind-row-name").val('');
                    $(".ind-sec-seat-no").val(e.target.attrs.seatno);
                    $(".ind-sec-seat-price").val(e.target.attrs.PriceLevel);
                    var sectiondetails = stage.find("#"+e.target.attrs.id);
                    $('.ind-sec-name').val(sectiondetails[0].parent.parent.attrs.seatgroupname);
                    $(".variablepricecontainer").empty();
                    if(e.target.attrs.variablepricename != "novalue" && e.target.attrs.variablepricename != undefined) {
                        var querystring = "<h6>Choose ticket type:</h6>";
                        querystring += "<div><p><input type='radio' checked name='checkradio' class='pricevariation' value="+e.target.attrs.PriceLevel+"> <span>"+e.target.attrs.PriceLevel+" - </span>";
                        querystring += "<span>"+e.target.attrs.pricename+ "</span></p></div>";
                        querystring += "<div><p><input type='radio' name='checkradio' class='pricevariation' value="+e.target.attrs.variableprice+"> <span>"+e.target.attrs.variableprice+" - </span>";
                        querystring += "<span>"+ e.target.attrs.variablepricename + "</span></p></div>";
                        $(".variablepricecontainer").append(querystring);
                    }
                }
            }
        }
        else if(e.target.attrs.type = "tablewithseats" && e.target.attrs.ctype == "tablewithseats"){
            $(".rowride").css('display','none');
            var firstpriceval = e.target.parent.children[0].children[0].attrs.PriceLevel;
            var avgpriceval = 0;
            var count = 0;
            for(var m=0;m<e.target.parent.children[0].children.length;m++) {
                if(e.target.parent.children[0].children[m].attrs.ticketAdded == true ) {
                    avgpriceval += parseInt(e.target.parent.children[0].children[m].attrs.PriceLevel);
                    //console.log(e.target.parent.children[0].children[m].attrs);
                    count++;
                    if (firstpriceval == "Novalue") {
                        if(avgpriceval != 0) {
                            firstpriceval = avgpriceval;
                        }
                    }
                }
            }
            if((avgpriceval/count) == firstpriceval) {
                $("#ticketdetailsbigpopup").dialog('open');
                var seatnos = [];
                var variablepriceflag = true;
                for(var m=0;m<e.target.parent.children[0].children.length;m++) {
                    if(e.target.parent.children[0].children[m].attrs.ticketAdded == true) {
                        seatnos.push(e.target.parent.children[0].children[m].attrs.seatno);
                        if(e.target.parent.children[0].children[m].attrs.variableprice == "novalue") {
                            variablepriceflag = false;
                        }
                        else if(e.target.parent.children[0].children[m].attrs.variableprice == undefined) {
                            variablepriceflag = false;
                        }
                    }
                }
                seatnos.join(',');
                $(".ind-sec-seat-no").val(seatnos);
                $('.ind-sec-seat-price').val(firstpriceval);
                $('.ind-sec-name').val(e.target.parent.attrs.seatgroupname);
                $(".variablepricecontainer").empty();
                if(variablepriceflag!= false) {
                    var querystring = "<h6>Choose ticket type:</h6>";
                    querystring += "<div><p><input type='radio' checked name='checkradio' class='pricevariation' value="+e.target.parent.children[0].children[0].attrs.PriceLevel+"> <span>"+e.target.parent.children[0].children[0].attrs.PriceLevel+" - </span>";
                    querystring += "<span>"+e.target.parent.children[0].children[0].attrs.pricename+ "</span></p></div>";
                    querystring += "<div><p><input type='radio' name='checkradio' class='pricevariation' value="+e.target.parent.children[0].children[0].attrs.variableprice+"> <span>"+e.target.parent.children[0].children[0].attrs.variableprice+" - </span>";
                    querystring += "<span>"+e.target.parent.children[0].children[0].attrs.variablepricename + "</span></p></div>";
                    $(".variablepricecontainer").append(querystring);
                }
            }
        }
        else if(e.target.attrs.showgaeditor == "yes"){
            if(e.target.attrs.ticketAdded != false) {
                $(".variablepricecontainer").empty();
                console.log(e.target.attrs);
                $("#ticketdetailsbigpopup").dialog('open');
                $(".rowride").css('display','none');
                $(".seathide").css('display','none');
                $('.ind-sec-name').val(e.target.attrs.ganame);
                $('.ind-sec-seat-price').val(e.target.attrs.PriceLevel);
                var seatquerystring = '<label for="noofseats">No of seats : </label>';
                seatquerystring += '<input type="number" value="1" class="garange" min="1" max='+e.target.attrs.maxgacapacity+' name="gaselectedseats">';
                $('.variablepricecontainer').append(seatquerystring);
                if(e.target.attrs.variablepricename !='' && e.target.attrs.variablepricename !='novalue') {
                    var seatquerystring = '';
                    querystring = "<h6>Choose ticket type:</h6>";
                    querystring += "<div><p><input type='radio' checked name='checkradio' class='pricevariation' checked value="+e.target.attrs.PriceLevel+"> <span>"+e.target.attrs.PriceLevel+" - </span>";
                    querystring += "<span>"+e.target.attrs.pricename+ "</span></p></div>";
                    querystring += "<div><p><input type='radio'' name='checkradio'  class='pricevariation' value="+e.target.attrs.variableprice+"> <span>"+e.target.attrs.variableprice+" - </span>";
                    querystring += "<span>"+e.target.attrs.variablepricename + "</span></p></div>";
                    $(".variablepricecontainer").append(querystring); 
                }
            }
        }
        else if (e.target.attrs.Toseatfortablewithoutchair != undefined) {
            if(e.target.attrs.ticketAdded != false) {
                $(".variablepricecontainer").empty();
                //console.log(e.target);
                $("#ticketdetailsbigpopup").dialog('open');
                $(".rowride").css('display','none');
                $(".seathide").css('display','none');
                //console.log(e.target.attrs);
                $('.ind-sec-name').val(e.target.attrs.tablewithoutchairname);
                $('.ind-sec-seat-price').val(e.target.attrs.PriceLevel);
                var seatquerystring = '';
                seatquerystring = '<label for="noofseats">No of seats : </label>';
                seatquerystring += '<input type="number" value="1" class="garange" min="1" max='+e.target.attrs.Toseatfortablewithoutchair+' name="gaselectedseats">';
                $('.variablepricecontainer').append(seatquerystring);
                if(e.target.attrs.variablepricename !='' && e.target.attrs.variablepricename !='novalue') {
                    var querystring = "<h6>Choose ticket type:</h6>";
                    querystring += "<div><p><input type='radio' checked name='checkradio' class='pricevariation' checked value="+e.target.attrs.PriceLevel+"> <span>"+e.target.attrs.PriceLevel+" - </span>";
                    querystring += "<span>"+e.target.attrs.pricename+ "</span></p></div>";
                    querystring += "<div><p><input type='radio'' name='checkradio'  class='pricevariation' value="+e.target.attrs.variableprice+"> <span>"+e.target.attrs.variableprice+" - </span>";
                    querystring += "<span>"+e.target.attrs.variablepricename + "</span></p></div>";
                    $(".variablepricecontainer").append(querystring); 
                }
            }
        }
        else if(e.target.attrs.showothereditor == "yes"){
            if(e.target.attrs.ticketAdded == true) {
                console.log(e.target.attrs);
                $(".variablepricecontainer").empty();
                //console.log(e.target);
                $("#ticketdetailsbigpopup").dialog('open');
                $(".rowride").css('display','none');
                //$(".seathide").css('display','none');
                //console.log(e.target.attrs);
                $(".ind-sec-seat-no").val(1);
                $('.ind-sec-name').val(e.target.attrs.stagename);
                $('.ind-sec-seat-price').val(e.target.attrs.PriceLevel);
                if(e.target.attrs.variablepricename !='' && e.target.attrs.variablepricename !='novalue') {
                    var querystring = "<h6>Choose ticket type:</h6>";
                    querystring += "<div><p><input type='radio' checked name='checkradio' class='pricevariation' checked value="+e.target.attrs.PriceLevel+"> <span>"+e.target.attrs.PriceLevel+" - </span>";
                    querystring += "<span>"+e.target.attrs.pricename+ "</span></p></div>";
                    querystring += "<div><p><input type='radio'' name='checkradio'  class='pricevariation' value="+e.target.attrs.variableprice+"> <span>"+e.target.attrs.variableprice+" - </span>";
                    querystring += "<span>"+e.target.attrs.variablepricename + "</span></p></div>";
                    $(".variablepricecontainer").append(querystring); 
                }
            }
        }

}
$('.seatadd').click(function(e){
    $("#ticketdetailsbigpopup").dialog('close');
    $("#ticketdetails").dialog('open');
    var pricevariation = document.querySelector('.pricevariation:checked');
    if(pricevariation != null){  
        $(".ind-sec-seat-price").val(pricevariation.value); 
    } else {
        //alert('Nothing checked'); 
    }
    $('.variablepricecontainer div').empty();
    var formdata = $("#seatsubdetails").serialize();
    buy_ticket_save(formdata);
})
document.querySelector(".garange").addEventListener("keypress", function (evt) {
    if (evt.which < 48 || evt.which > 57)
    {
        evt.preventDefault();
    }
});