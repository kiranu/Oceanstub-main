// $(document).ready(function () {
// });

$("#section" ).dialog({
    autoOpen: false,
    modal: true
});
$("#ticketassignmessage" ).dialog({
    autoOpen: false,
    modal: true
});
$(".dailog-cancel").click(function(e){
    $("#ticketassignmessage").dialog('close');
})
var stage;
var slectedstagedetails;
var selectedga;
var selectedtwc;
var selectedtc;
var indseattable;
var secdetails;
var secindseat;
var rowdetails;
var otherdetails;
$(".ui-icon-closethick").click(function(e){
    selectedga = '';
    selectedtwc = '';
    indseattable = '';
    // sessionStorage.removeItem('classorid');
    // sessionStorage.removeItem('adddetails');
})
var layer;
$.LoadingOverlay("show");
setTimeout(function(){
    $.LoadingOverlay("hide");
}, 1500);
$("#playground").empty();
stage = new Konva.Stage({
    container: 'playground',
    width: 2200,
    height: 2200,
});
$(document).ready(function() {
	setTimeout(function(){
        var json;
        json = $('#sketchpaddatapriceleveladded').attr('value');
        var response = $('#respons_id').val();
        if(response!='' && response!= undefined ){
            $('#respons_save').val("Save Changes");
        }
        if(json =='') {
            json = $('#sketchpaddata').attr('value');
        }
		json = format(json, "draggable");
		layer = Konva.Node.create(json,'playground');
		stage.add(layer);
		//stage = Konva.Node.create(json, 'playground');
		stage.on('mousemove touchmove', function(e) {
    		return false;            
		});
		setpricelevel();
	}, 2000);
});
function format(json_string, key_to_skip) {
    return JSON.parse(json_string, function (key, value) {
        if (key !== key_to_skip) {
            return value;
        }
    });    
}
$(".seatingchartedit").click(function(){
	var json = $("#sketchpaddata").attr('value');
	sessionStorage.removeItem(sketchpaddata);
	sessionStorage.setItem("sketchpaddata",json);
})
// $("#section").dialog('open');
stage.on('mousedown touchstart', function(e) {
    shapecheck(e);
    shapeaddE = e;
})
function shapecheck(e) {
    $('.individual-seat-details-for-table-with-seats').css('display', 'none'); 
    if (e.target.attrs.showgaeditor == "yes") {
    	selectedga = e.target.attrs;
    	//$("#salepriorityforsection").empty();
    	//var ganame = "<option>"+e.target.attrs.ganame+"</option>";
    	$("#salepriorityforsection").val('');
    	$("#salepriorityforsection").val(e.target.attrs.ganame);
        $("#section").dialog('open');
    }
    else if (e.target.attrs.showtablewithoutchaireditor == "yes") {
        //console.log(e.target.attrs);
    	//$("#salepriorityforsection").empty();
    	//var tablewithoutchairname = "<option>"+e.target.attrs.tablewithoutchairname+"</option>";
    	//$("#salepriorityforsection").append(tablewithoutchairname);
    	$("#salepriorityforsection").val('');
    	$("#salepriorityforsection").val(e.target.attrs.tablewithoutchairname);
    	$("#section").dialog('open');
        selectedtwc = e.target.attrs;
    }
    else if (e.target.attrs.showtablewithchaireditor == "yes") {
        selectedtc = e.target.attrs;
        //console.log(selectedtc)
    	//$("#salepriorityforsection").empty();
    	//var tablewithchairname = "<option>"+e.target.attrs.tablewithchairname+"</option>";
    	//$("#salepriorityforsection").append(tablewithchairname);
    	$("#salepriorityforsection").val('');
    	$("#salepriorityforsection").val(e.target.attrs.tablewithchairname);
    	$("#section").dialog('open');
    }
    else if (e.target.attrs.type == "tablewithseats") {
        indseattable = e.target.attrs;
        //$("#salepriorityforsection").empty();
        // var tableseat = "<option>"+e.target.attrs.seatno+"</option>";
        // $("#salepriorityforsection").append(tableseat);
        $("#salepriorityforsection").val('');
    	$("#salepriorityforsection").val(e.target.attrs.seatno);
        $("#section").dialog('open');
    }
    else if (e.target.attrs.showsectioneditor == "yes") {
        secdetails = e.target.attrs;
        // $("#salepriorityforsection").empty();
        // var sectionname = "<option>"+e.target.attrs.sectionname+"</option>";
        // $("#salepriorityforsection").append(sectionname);
        $("#salepriorityforsection").val('');
    	$("#salepriorityforsection").val(e.target.attrs.sectionname);
        $("#section").dialog('open');
        // var section = stage.find("#"+e.target.attrs.id);
        // console.log(section[0].parent.children);
    }
    else if (e.target.attrs.showseateditor == "yes"){
        secindseat = e.target.attrs;
        // $("#salepriorityforsection").empty();
        // var sectionname = "<option>"+e.target.attrs.seatno+"</option>";
        // $("#salepriorityforsection").append(sectionname);
        $("#salepriorityforsection").val('');
    	$("#salepriorityforsection").val(e.target.attrs.seatno);
        $("#section").dialog('open');
    }
    else if (e.target.attrs.showroweditor == "yes"){
        secindseat = '';
        rowdetails = e.target.attrs;
        // $("#salepriorityforsection").empty();
        // var sectionname = "<option>"+e.target.attrs.rowname+"</option>";
        // $("#salepriorityforsection").append(sectionname);
        $("#salepriorityforsection").val('');
    	$("#salepriorityforsection").val(e.target.attrs.rowname);
        $("#section").dialog('open');
    }
    else if(e.target.attrs.showothereditor == "yes"){
        otherdetails = e.target.attrs;
        $("#salepriorityforsection").val('');
        $("#salepriorityforsection").val(e.target.attrs.stagename);
        $("#section").dialog('open');
    }
}
$(".section-save").click(function(e){
    $("#section").dialog('close');
    if(selectedga!='' && selectedga!= undefined ){
        if(selectedga.ticketAdded != true) {
            var selectedgear = stage.find("#"+selectedga.id);
            selectedgear.setAttr('ticketAdded', true);
            selectedgear.setAttr('ticketCount', selectedga.maxgacapacity);
            $(".innermessage").empty();
            var newstring = "<p>"+selectedga.ticketCount+" tickets added.</p>";
            $(".innermessage").append(newstring);
            layer.draw();
            $("#ticketassignmessage").dialog('open');
            //console.log(selectedga);
            var selectedgashape = stage.find("#"+selectedga.tt);
            //selectedgashape.hide();
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            selectedgashape.fill(colorvalue);
            //selectedgear.setAttr('PriceLevel', colorvalue);
            layer.draw();
            stage.add(layer);
            var priceval  = $("#alignmentforsection option:selected").val();
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
            var priceval = $("#alignmentforsection option:selected").val();
            var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
            selectedgear.setAttr('pricename', pricename);
            selectedgear.setAttr('PriceLevel', priceval);
            selectedgear.setAttr('ticketAdded', true);
            selectedgear.setAttr('ticketid', ticketid);
            var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
            if(variablepricename !=  undefined) {
                selectedgear.setAttr('variablepricename', variablepricename);
                var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
                selectedgear.setAttr('variableprice', variableprice);
            }
            else {
                selectedgear.setAttr('variablepricename', "novalue");
                selectedgear.setAttr('variableprice', "novalue");
            }
            var data = $('#seatingchartdataform').serialize();
            sessionStorage.setItem("adddetails", JSON.stringify(selectedga));
            sessionStorage.setItem("classorid", "id");
            //sectiondetailssave(data);
            selectedga = '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
            //console.log(json);
        }
        else if(selectedga!='') {
            $(".innermessage").empty();
            var newstring = "<p>"+selectedga.ticketCount+" tickets added already</p>";
            $(".innermessage").append(newstring);
            $("#ticketassignmessage").dialog('open');
            selectedga = '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
        }
    }
    else if(selectedtwc !='' && selectedtwc != undefined ) {
        if(selectedtwc.ticketAdded != true) {
            var selectedgear = stage.find("#"+selectedtwc.id);
            selectedgear.setAttr('ticketAdded', true);
            selectedgear.setAttr('ticketCount', selectedtwc.Toseatfortablewithoutchair);
            $(".innermessage").empty();
            var newstring = "<p>"+selectedtwc.Toseatfortablewithoutchair+" tickets added.</p>";
            $(".innermessage").append(newstring);
            layer.draw();
            $("#ticketassignmessage").dialog('open');
            console.log(selectedtwc.tt);
            var selectedgashape = stage.find("#"+selectedtwc.tt);
            //selectedgashape.hide();
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            selectedgashape.fill(colorvalue);
            var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
            selectedgear.setAttr('pricename', pricename);
            var priceval = $("#alignmentforsection option:selected").val();
            selectedgear.setAttr('PriceLevel', priceval);
            var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
            selectedgear.setAttr('ticketid', ticketid);
            var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
            if(variablepricename !=  undefined) {
                selectedgear.setAttr('variablepricename', variablepricename);
                var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
                selectedgear.setAttr('variableprice', variableprice);
            }
            else {
                selectedgear.setAttr('variablepricename', "novalue");
                selectedgear.setAttr('variableprice', "novalue");
            }
            layer.draw();
            stage.add(layer);
            
            //sectiondetailssave(data);
            selectedtwc = '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
        }
        else if(selectedtwc!='') {
            $(".innermessage").empty();
            var newstring = "<p>"+selectedtwc.Toseatfortablewithoutchair+" tickets added already</p>";
            $(".innermessage").append(newstring);
            $("#ticketassignmessage").dialog('open');
            selectedtwc = '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
        }
    }
    else if(selectedtc !='' && selectedtc != undefined ) {
        if(selectedtc.ticketAdded != true) {
            var selectedgear = stage.find("#"+selectedtc.id);
            console.log(selectedgear);
            selectedgear.setAttr('ticketAdded', true);
            selectedgear.setAttr('ticketCount', selectedtc.Toseatfortablewithchair);
            //console.log(selectedtc.tt);
            // var selectedgashape = stage.find("#"+selectedtc.tt);
            // //selectedgashape.hide();
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            // selectedgashape.fill(colorvalue);
            //selectedgear.setAttr('PriceLevel', colorvalue);
            // layer.draw();
            var count = 0;
            var tablegroup = stage.find("#"+selectedtc.tt);
            for(var i = 0; i< tablegroup[0].parent.children[0].children.length;i++) {
                if(tablegroup[0].parent.children[0].children[i].attrs.ticketAdded != true ){
                	var seat = stage.find("#"+tablegroup[0].parent.children[0].children[i].attrs.id);
                	seat.fill(colorvalue);
                	seat.setAttr('ticketAdded', true);
                	count++;
                    var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
                    seat.setAttr('ticketAdded', true);
                    seat.setAttr('pricename', pricename);
                    var priceval = $("#alignmentforsection option:selected").val();
                    seat.setAttr('PriceLevel', priceval);
                    var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
                    seat.setAttr('ticketid', ticketid);
                    var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
                    if(variablepricename !=  undefined) {
                        seat.setAttr('variablepricename', variablepricename);
                        var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
                        seat.setAttr('variableprice', variableprice);
                    }
                    else {
                        seat.setAttr('variablepricename', "novalue");
                        seat.setAttr('variableprice', "novalue");
                    }
                }
            }
            //console.log(selectedtc);
            $(".innermessage").empty();
            var newstring = "<p>"+count+" tickets added.</p>";
            $(".innermessage").append(newstring);
            // var priceval  = $("#alignmentforsection option:selected").val();
            // $('#seatingchartdataform input').val('');
            // $("#sectionname").val(selectedtc.tablewithchairname);
            // $("#pricelevel").val(priceval);
            // $("#maxcapacity").val(count);
            // $("#sectiontype").val("TableWthchair");
            // var priceval  = $("#alignmentforsection option:selected").val();
            // $('#seatingchartdataform input').val('');
            // $("#sectionname").val(selectedtc.tablewithchairname);
            // $("#pricelevel").val(priceval);
            // $("#maxcapacity").val(selectedtc.Toseatfortablewithchair);
            // $("#sectiontype").val("Tablewithchair");
            // var data = $('#seatingchartdataform').serialize();
            // sessionStorage.setItem("adddetails", JSON.stringify(selectedtc));
            // sessionStorage.setItem("classorid", "id");
            // var data = $('#seatingchartdataform').serialize();
            //sectiondetailssave(data);
            layer.draw();
            stage.add(layer);
            $("#ticketassignmessage").dialog('open');
            //layer.draw();
            selectedtc = '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
        }
        else if(selectedtc!='') {
        	var count = 0;
            var tablegroup = stage.find("#"+selectedtc.tt);
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            for(var i = 0; i< tablegroup[0].parent.children[0].children.length;i++) {
                if(tablegroup[0].parent.children[0].children[i].attrs.ticketAdded == false ){
                	//console.log(tablegroup[0].parent.children[0].children[i].attrs);
                	var seat = stage.find("#"+tablegroup[0].parent.children[0].children[i].attrs.id);
                	seat.fill(colorvalue);
                	seat.setAttr('ticketAdded', true);
                	count++;
                    var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
                    seat.setAttr('pricename', pricename);
                    var priceval = $("#alignmentforsection option:selected").val();
                    seat.setAttr('PriceLevel', priceval);
                    var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
                    seat.setAttr('ticketid', ticketid);
                    var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
                    if(variablepricename !=  undefined) {
                        seat.setAttr('variablepricename', variablepricename);
                        var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
                        seat.setAttr('variableprice', variableprice);
                    }
                    else {
                        seat.setAttr('variablepricename', "novalue");
                        seat.setAttr('variableprice', "novalue");
                    }
                	layer.draw();
                    stage.add(layer);
                }
            }
            if(count !=0){
            	$(".innermessage").empty();
            	var newstring = "<p>"+count+" tickets added.</p>";
            	$(".innermessage").append(newstring);
            	$("#ticketassignmessage").dialog('open');
                var priceval  = $("#alignmentforsection option:selected").val();
                $('#seatingchartdataform input').val('');
                $("#sectionname").val(selectedtc.tablewithchairname);
                $("#pricelevel").val(priceval);
                $("#maxcapacity").val(count);
                $("#sectiontype").val("TableWthchair");
                var data = $('#seatingchartdataform').serialize();
                //console.log(data);
                sectiondetailssave(data);
            	selectedtc = '';
                var json = layer.toJSON();
                $("#seatingchart_json").val(json);
                stage.add(layer);
            }
            else if( count == 0) {
            	$(".innermessage").empty();
            	var newstring = "<p>"+selectedtc.Toseatfortablewithchair+" tickets added already</p>";
            	$(".innermessage").append(newstring);
            	$("#ticketassignmessage").dialog('open');
            	selectedtc = '';
                var json = layer.toJSON();
                $("#seatingchart_json").val(json);
                stage.add(layer);
            }
        }
    }
    else if(indseattable!="" && indseattable != undefined) {
        var selectedgear = stage.find("#"+indseattable.id);
        selectedgear.setAttr('ticketAdded', true);
        selectedgear.setAttr('ticketCount', 1);
        $(".innermessage").empty();
        var newstring = "<p>1 tickets added.</p>";
        $(".innermessage").append(newstring);
        $("#ticketassignmessage").dialog('open');
        var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
        // selectedgear.setAttr('PriceLevel', colorvalue);
        selectedgear.fill(colorvalue);
        var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
        var priceval = $("#alignmentforsection option:selected").val();
        selectedgear.setAttr('pricename', pricename);
        selectedgear.setAttr('PriceLevel', priceval);
        var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
        selectedgear.setAttr('ticketid', ticketid);
        var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
        if(variablepricename !=  undefined) {
            selectedgear.setAttr('variablepricename', variablepricename);
            var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
            selectedgear.setAttr('variableprice', variableprice);
        }
        else {
            selectedgear.setAttr('variablepricename', "novalue");
            selectedgear.setAttr('variableprice', "novalue");
        }
        layer.draw();
        var priceval  = $("#alignmentforsection option:selected").val();
        // $('#seatingchartdataform input').val('');
        // $("#sectionname").val(selectedgear[0].parent.parent.children[3].attrs.tablewithchairname);
        // $("#pricelevel").val(priceval);
        // $("#maxcapacity").val(count);
        // $("#sectiontype").val("TableWthchair");
        //var data = $('#seatingchartdataform').serialize();
        //console.log(data);
        //sectiondetailssave(data);
        indseattable = '';
        var json = layer.toJSON();
        $("#seatingchart_json").val(json);
        stage.add(layer);
    }
    else if(secdetails !="" && secdetails != undefined){
        if(secdetails.ticketAdded != true) {
            var selectedgear = stage.find("#"+secdetails.id);
            selectedgear.setAttr('ticketAdded', true);
            var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            var priceval = $("#alignmentforsection option:selected").val();
            selectedgear.setAttr('PriceLevel', priceval);
            var count = 0;
            for(m=0;m<selectedgear[0].parent.children.length;m++){
                if(selectedgear[0].parent.children[m].attrs.type == "sectionrowgroup"){
                    for(n =0;n<selectedgear[0].parent.children[m].children.length; n++) {
                        if(selectedgear[0].parent.children[m].children[n].attrs.type == "rowindividualseats"){
                            //if(selectedgear[0].parent.children[m].children[n].attrs.ishide != undefined ){
                                if(selectedgear[0].parent.children[m].children[n].attrs.ishide != true ){
                                	if(selectedgear[0].parent.children[m].children[n].attrs.ticketAdded != true ){
                                    	count++;
                                    	var secindseats = stage.find("."+selectedgear[0].parent.children[m].children[n].attrs.name);
                                    	secindseats.fill(colorvalue);
                                    	secindseats.setAttr('PriceLevel', priceval);
                                        secindseats.setAttr('ticketAdded', true);
                                        var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
                                        secindseats.setAttr('ticketid', ticketid);
                                        var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
                                        if(variablepricename !=  undefined) {
                                            secindseats.setAttr('variablepricename', variablepricename);
                                            var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
                                            secindseats.setAttr('variableprice', variableprice);
                                        }
                                        else {
                                            secindseats.setAttr('variablepricename', "novalue");
                                            secindseats.setAttr('variableprice', "novalue");
                                        }
                                    }
                                }
                            //}
                        }
                    }
                }
            }
            //console.log(count)
            $(".innermessage").empty();
            var newstring = "<p>"+count+" tickets added.</p>";
            $(".innermessage").append(newstring);
            layer.draw();
            $("#ticketassignmessage").dialog('open');
            secdetails = '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
        }
        else if(secdetails!='') {
            $(".innermessage").empty();
            var selectedgear = stage.find("#"+secdetails.id);
            var count = 0;
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            var priceval = $("#alignmentforsection option:selected").val();
            for(m=0;m<selectedgear[0].parent.children.length;m++){
                if(selectedgear[0].parent.children[m].attrs.type == "sectionrowgroup"){
                    for(n =0;n<selectedgear[0].parent.children[m].children.length; n++) {
                        if(selectedgear[0].parent.children[m].children[n].attrs.type == "rowindividualseats"){
                            if(selectedgear[0].parent.children[m].children[n].attrs.ticketAdded != true ){
                                if(selectedgear[0].parent.children[m].children[n].attrs.ishide != true ){
                                    count++;
                                    var secindseats = stage.find("."+selectedgear[0].parent.children[m].children[n].attrs.name);
                                    secindseats.fill(colorvalue);
                                    secindseats.setAttr('PriceLevel', priceval);
                                    secindseats.setAttr('ticketAdded', true);
                                    secindseats.setAttr('pricename', pricename);
                                    var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
                                    secindseats.setAttr('ticketid', ticketid);
                                    var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
                                    if(variablepricename !=  undefined) {
                                        secindseats.setAttr('variablepricename', variablepricename);
                                        var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
                                        secindseats.setAttr('variableprice', variableprice);
                                    }
                                    else {
                                        secindseats.setAttr('variablepricename', "novalue");
                                        secindseats.setAttr('variableprice', "novalue");
                                    }
                                }
                            }
                        }
                    }
                }
            }
            if(count !=0) {
            	var newstring = "<p>"+count+" tickets added</p>";
            	$(".innermessage").append(newstring);
            	$("#ticketassignmessage").dialog('open');
                layer.draw();
            	secdetails = '';
                var json = layer.toJSON();
                $("#seatingchart_json").val(json);
                stage.add(layer);
        	}
        	else if(count == 0){
        		var newstring = "<p> tickets added already</p>";
            	$(".innermessage").append(newstring);
            	$("#ticketassignmessage").dialog('open');
            	secdetails = '';
                var json = layer.toJSON();
                $("#seatingchart_json").val(json);
                stage.add(layer);
        	}
        }
    }
    else if(secindseat!="" && secindseat != undefined) {
        //console.log(indseattable);
        var selectedgear = stage.find("."+secindseat.name);
        selectedgear.setAttr('ticketAdded', true);
        selectedgear.setAttr('ticketCount', 1);
        $(".innermessage").empty();
        var newstring = "<p>1 tickets added.</p>";
        $(".innermessage").append(newstring);
        $("#ticketassignmessage").dialog('open');
        var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
        var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
        var priceval = $("#alignmentforsection option:selected").val();
        selectedgear.setAttr('pricename', pricename);
        selectedgear.setAttr('PriceLevel', priceval);
        selectedgear.setAttr('ticketAdded', true);
        var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
        selectedgear.setAttr('ticketid', ticketid);
        var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
        if(variablepricename !=  undefined) {
            selectedgear.setAttr('variablepricename', variablepricename);
            var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
            selectedgear.setAttr('variableprice', variableprice);
        }
        else {
            selectedgear.setAttr('variablepricename', "novalue");
            selectedgear.setAttr('variableprice', "novalue");
        }
        selectedgear.fill(colorvalue);
        layer.draw();
        indseattable = '';
        var json = layer.toJSON();
        $("#seatingchart_json").val(json);
        stage.add(layer);
    }
    else if(rowdetails !="" && rowdetails != undefined) { 
        var rowseats = stage.find("#"+rowdetails.id);
        var count = 0;
        var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
        var priceval = $("#alignmentforsection option:selected").val();
        for(var l=0;l<rowseats[0].parent.children.length;l++){
            if(rowseats[0].parent.children[l].attrs.type == "rowindividualseats") {
                var rowfullseats = stage.find("."+rowseats[0].parent.children[l].attrs.name);
                rowfullseats.setAttr('PriceLevel', priceval);
                rowfullseats.setAttr('ticketAdded', true);
                var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
                rowfullseats.setAttr('pricename', pricename);
                var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
                selectedgear.setAttr('ticketid', ticketid);
                var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
                if(variablepricename !=  undefined) {
                    rowfullseats.setAttr('variablepricename', variablepricename);
                    var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
                    rowfullseats.setAttr('variableprice', variableprice);
                }
                else {
                    rowfullseats.setAttr('variablepricename', "novalue");
                    rowfullseats.setAttr('variableprice', "novalue");
                }
                rowfullseats.fill(colorvalue);
                layer.draw();
                count++;
            }
        }
        rowseats.setAttr('ticketAdded', true);
        rowseats.setAttr('ticketCount', count);
        $(".innermessage").empty();
        var newstring = "<p>" +count+ " tickets added.</p>";
        $(".innermessage").append(newstring);
        $("#ticketassignmessage").dialog('open');
        rowdetails = '';
        var json = layer.toJSON();
        $("#seatingchart_json").val(json);
        stage.add(layer);
    }
    else if (otherdetails != '' && otherdetails != undefined ) {
        var selectedgear = stage.find("#"+otherdetails.id);
            selectedgear.setAttr('ticketAdded', true);
            //selectedgear.setAttr('ticketCount', selectedga.maxgacapacity);
            $(".innermessage").empty();
            var newstring = "<p> tickets added.</p>";
            $(".innermessage").append(newstring);
            layer.draw();
            $("#ticketassignmessage").dialog('open');
            //console.log(selectedga);
            var selectedgashape = stage.find("#"+otherdetails.tt);
             var selectedgashape = stage.find("#"+selectedgashape[0].attrs.id);
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            selectedgashape.stroke(colorvalue);
            selectedgashape.fill(colorvalue);
            selectedgear.setAttr('PriceLevel', colorvalue);
            var priceval  = $("#alignmentforsection option:selected").val();
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
            var priceval = $("#alignmentforsection option:selected").val();
            selectedgear.setAttr('pricename', pricename);
            selectedgear.setAttr('PriceLevel', priceval);
            selectedgear.setAttr('ticketAdded', true);
            var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
            selectedgear.setAttr('ticketid', ticketid);
            var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
            if(variablepricename !=  undefined) {
                selectedgear.setAttr('variablepricename', variablepricename);
                var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
                selectedgear.setAttr('variableprice', variableprice);
            }
            else {
                selectedgear.setAttr('variablepricename', "novalue");
                selectedgear.setAttr('variableprice', "novalue");
            }
            var data = $('#seatingchartdataform').serialize();
            layer.draw();
            stage.add(layer);
            otherdetails = '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
    }
})
$(".delete-ticket").click(function(e){
    $("#section").dialog('close');
    if(selectedga!='' && selectedga!= undefined){
        if(selectedga.ticketAdded == true) {
            var selectedgear = stage.find("#"+selectedga.id);
            selectedgear.setAttr('ticketAdded', false);
            $(".innermessage").empty();
            var newstring = "<p>"+selectedga.ticketCount+" tickets deleted.</p>";
            $(".innermessage").append(newstring);
            selectedgear.setAttr('ticketCount', 0);
            var selectedgashape = stage.find("#"+selectedga.tt);
            //selectedgashape.hide();
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            selectedgashape.fill("#999");
            selectedgear.setAttr('PriceLevel', colorvalue);
            layer.draw();
            // //var id = $('#id').val();
            // $('#seatingchartdataform input').val('');
            // $("#ass_id").val(selectedga.data_id);
            // var data = $('#seatingchartdataform').serialize();
        	//sectiondetailsdelete(selectedga.data_id);
            $("#ticketassignmessage").dialog('open');
            selectedga = '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
        }
    }
    else if(selectedtwc!='' && selectedtwc!= undefined){
        if(selectedtwc.ticketAdded == true) {
            var selectedgear = stage.find("#"+selectedtwc.id);
            selectedgear.setAttr('ticketAdded', false);
            $(".innermessage").empty();
            var newstring = "<p>"+selectedtwc.ticketCount+" tickets deleted.</p>";
            $(".innermessage").append(newstring);
            selectedgear.setAttr('ticketCount', 0);
            var selectedgashape = stage.find("#"+selectedtwc.tt);
            //selectedgashape.hide();
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            selectedgashape.fill("#999");
            selectedgear.setAttr('PriceLevel', colorvalue);
            layer.draw();
            //layer.draw();
            $("#ticketassignmessage").dialog('open');
            //console.log(selectedtwc);
            //sectiondetailsdelete(selectedtwc.data_id);
            selectedtwc = '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
        }
    }
    else if(selectedtc!='' && selectedtc!= undefined){
        if(selectedtc.ticketAdded == true) {
            var selectedgear = stage.find("#"+selectedtc.id);
            selectedgear.setAttr('ticketAdded', false);
            selectedgear.setAttr('ticketCount', 0);
            var selectedgashape = stage.find("#"+selectedtc.tt);
            //selectedgashape.hide();
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            //selectedgashape.fill("#999");
            selectedgear.setAttr('PriceLevel', colorvalue);
            var count = 0;
            var tablegroup = stage.find("#"+selectedtc.tt);
            for(var i = 0; i< tablegroup[0].parent.children[0].children.length;i++) {
            	if(tablegroup[0].parent.children[0].children[i].attrs.ticketAdded == true) {
                	var seat = stage.find("#"+tablegroup[0].parent.children[0].children[i].attrs.id);
                	seat.fill("#666");
                	seat.setAttr('ticketAdded', false);
                	count++;
                }
            }
            $(".innermessage").empty();
            var newstring = "<p>"+count+" tickets deleted.</p>";
            $(".innermessage").append(newstring);
            //sectiondetailsdelete(selectedtc.data_id);
            layer.draw();
            //layer.draw();
            $("#ticketassignmessage").dialog('open');
            selectedtc = '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
        }
    }
    else if(indseattable!="" && indseattable != undefined) {
        var selectedgear = stage.find("#"+indseattable.id);
        selectedgear.setAttr('ticketAdded', false);
        selectedgear.setAttr('ticketCount', 0);
        $(".innermessage").empty();
        var newstring = "<p>1 tickets deleted.</p>";
        $(".innermessage").append(newstring);
        $("#ticketassignmessage").dialog('open');
        var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
        selectedgear.setAttr('PriceLevel', "Novalue");
        selectedgear.fill("#666");
        layer.draw();
        indseattable = '';
        var json = layer.toJSON();
        $("#seatingchart_json").val(json);
        stage.add(layer);
    }
    else if(secdetails !="" && secdetails != undefined){
        if(secdetails.ticketAdded == true) {
            var selectedgear = stage.find("#"+secdetails.id);
            selectedgear.setAttr('ticketAdded', false);
           // var colorvalue = $("#alignmentforsection option:selected").val();
            // selectedgashape.fill(colorvalue);
            selectedgear.setAttr('PriceLevel', "Novalue");
            var count = 0;
            for(m=0;m<selectedgear[0].parent.children.length;m++){
                if(selectedgear[0].parent.children[m].attrs.type == "sectionrowgroup"){
                    for(n =0;n<selectedgear[0].parent.children[m].children.length; n++) {
                        if(selectedgear[0].parent.children[m].children[n].attrs.type == "rowindividualseats"){
                            //if(selectedgear[0].parent.children[m].children[n].attrs.ishide != undefined ){
                                if(selectedgear[0].parent.children[m].children[n].attrs.ishide != true ){
                                    count++;
                                    var secindseats = stage.find("."+selectedgear[0].parent.children[m].children[n].attrs.name);
                                    secindseats.fill('#ddd');
                                    secindseats.setAttr('PriceLevel', "No value");
                                    secindseats.setAttr('ticketAdded','No value');
                                }
                            //}
                        }
                    }
                }
            }
           // console.log(count)
            $(".innermessage").empty();
            var newstring = "<p>"+count+" tickets deleted.</p>";
            $(".innermessage").append(newstring);
            layer.draw();
            $("#ticketassignmessage").dialog('open');
            secdetails = '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
        }
    }
    else if(secindseat!="" && secindseat != undefined) {
        var selectedgear = stage.find("."+secindseat.name);
        selectedgear.setAttr('ticketAdded', false);
        selectedgear.setAttr('ticketCount', 0);
        $(".innermessage").empty();
        var newstring = "<p>1 tickets deleted.</p>";
        $(".innermessage").append(newstring);
        $("#ticketassignmessage").dialog('open');
        var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
        selectedgear.setAttr('PriceLevel', "novalue");
        selectedgear.setAttr('ticketAdded','No value');
        selectedgear.fill("#ddd");
        layer.draw();
        secindseat = '';
        var json = layer.toJSON();
        $("#seatingchart_json").val(json);
        stage.add(layer);
    }
    else if(rowdetails !="" && rowdetails != undefined) { 
        var rowseats = stage.find("#"+rowdetails.id);
        var count = 0;
        //var colorvalue = $("#alignmentforsection option:selected").val();
        for(var l=0;l<rowseats[0].parent.children.length;l++){
            if(rowseats[0].parent.children[l].attrs.type == "rowindividualseats") {
                var rowfullseats = stage.find("."+rowseats[0].parent.children[l].attrs.name);
                if(rowfullseats[0].attrs.ticketAdded!= false) {
                    rowfullseats.setAttr('PriceLevel', "No value");
                    rowfullseats.setAttr('ticketAdded', false);
                    rowfullseats.fill("#ddd");
                    layer.draw();
                    count++;
                }
            }
        }
        rowseats.setAttr('ticketAdded', false);
        rowseats.setAttr('ticketCount', 0);
        $(".innermessage").empty();
        var newstring = "<p>" +count+ " tickets deleted.</p>";
        $(".innermessage").append(newstring);
        $("#ticketassignmessage").dialog('open');
        rowdetails = '';
        var json = layer.toJSON();
        $("#seatingchart_json").val(json);
        stage.add(layer);
    }
    if(otherdetails!='' && otherdetails!= undefined){
        if(otherdetails.ticketAdded == true) {
            var selectedgear = stage.find("#"+otherdetails.id);
            selectedgear.setAttr('ticketAdded', false);
            $(".innermessage").empty();
            var newstring = "<p>1 tickets deleted.</p>";
            $(".innermessage").append(newstring);
            selectedgear.setAttr('ticketCount', 0);
            var selectedgashape = stage.find("#"+otherdetails.tt);
            selectedgashape = stage.find("#"+selectedgashape[0].attrs.id);
            //selectedgashape.hide();
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            selectedgashape.fill("#0d66b6");
            selectedgashape.stroke("#0d66b6");
            selectedgear.setAttr('PriceLevel', "Novalue");
            layer.draw();
            // //var id = $('#id').val();
            // $('#seatingchartdataform input').val('');
            // $("#ass_id").val(selectedga.data_id);
            // var data = $('#seatingchartdataform').serialize();
            //sectiondetailsdelete(selectedga.data_id);
            $("#ticketassignmessage").dialog('open');
            selectedga = '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
        }
    }
})
$(".seat-block").click(function(e){
    $("#section").dialog('close');
    if(selectedga!=''){
        if(selectedga.ticketAdded == true) {
            var selectedgear = stage.find("#"+selectedga.id);
            selectedgear.setAttr('ticketAdded', false);
            $(".innermessage").empty();
            var newstring = "<p>"+selectedga.ticketCount+" tickets deleted.</p>";
            $(".innermessage").append(newstring);
            selectedgear.setAttr('ticketCount', 0);
            layer.draw();
            $("#ticketassignmessage").dialog('open');
            selectedga == '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
        }
        else {
            $(".innermessage").empty();
            var newstring = "<p>Ticket not added.</p>";
            $(".innermessage").append(newstring);
            layer.draw();
            $("#ticketassignmessage").dialog('open');
            selectedga = '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
        }
    }
})
$(".updateTicket").click(function(e){
    $("#section").dialog('close');
    if(selectedga!='' && selectedga != undefined && selectedga.ticketAdded == true){
        //console.log(selectedga);
        var selectedgear = stage.find("#"+selectedga.id);
        var selectedgashape = stage.find("#"+selectedga.tt);
        //selectedgashape.hide();
        var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
        selectedgashape.fill(colorvalue);
        selectedgear.setAttr('PriceLevel', colorvalue);
        layer.draw();
        $(".innermessage").empty();
        var newstring = "<p>"+selectedga.ticketCount+" tickets Updated.</p>";
        $(".innermessage").append(newstring);
        $("#ticketassignmessage").dialog('open');
        var priceval  = $("#alignmentforsection option:selected").val();
        var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
        var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
        var priceval = $("#alignmentforsection option:selected").val();
        selectedgear.setAttr('pricename', pricename);
        selectedgear.setAttr('PriceLevel', priceval);
        selectedgear.setAttr('ticketAdded', true);
        var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
        selectedgear.setAttr('ticketid', ticketid);
        var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
        if(variablepricename !=  undefined) {
            selectedgear.setAttr('variablepricename', variablepricename);
            var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
            selectedgear.setAttr('variableprice', variableprice);
        }
        else {
            selectedgear.setAttr('variablepricename', "novalue");
            selectedgear.setAttr('variableprice', "novalue");
        }
        var data = $('#seatingchartdataform').serialize();
        sectiondetailsupdate(data);
        //console.log(data);
        selectedga = '';
        var json = layer.toJSON();
        $("#seatingchart_json").val(json);
        stage.add(layer);
    }
    else if(selectedtwc!='' && selectedtwc != undefined && selectedtwc.ticketAdded == true){
        console.log(selectedtwc);
        var selectedgear = stage.find("#"+selectedtwc.id);
        var selectedgashape = stage.find("#"+selectedtwc.tt);
        //selectedgashape.hide();
        var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
        selectedgashape.fill(colorvalue);
        var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
        selectedgear.setAttr('pricename', pricename);
        var priceval = $("#alignmentforsection option:selected").val();
        selectedgear.setAttr('PriceLevel', priceval);
        var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
        selectedgear.setAttr('ticketid', ticketid);
        var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
        if(variablepricename !=  undefined) {
            selectedgear.setAttr('variablepricename', variablepricename);
            var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
            selectedgear.setAttr('variableprice', variableprice);
        }
        else {
            selectedgear.setAttr('variablepricename', "novalue");
            selectedgear.setAttr('variableprice', "novalue");
        }
        layer.draw();
        $(".innermessage").empty();
        var newstring = "<p>"+selectedtwc.ticketCount+" tickets Updated.</p>";
        $(".innermessage").append(newstring);
        $("#ticketassignmessage").dialog('open');
        //$('#seatingchartdataform input').val('');
        // console.log(selectedtwc);
        // $("#sectionname").val(selectedtwc.tablewithoutchairname);
        // $("#pricelevel").val(priceval);
        // $("#maxcapacity").val(selectedtwc.Toseatfortablewithoutchair);
        // $("#sectiontype").val("Tablewithoutchair");
        // $("#ass_id").val(selectedtwc.data_id);
        // var data = $('#seatingchartdataform').serialize();
        //sectiondetailsupdate(data);
        selectedtwc = '';
        var json = layer.toJSON();
        $("#seatingchart_json").val(json);
        stage.add(layer);
    }
    else if(selectedtc!='' && selectedtc != undefined && selectedtc.ticketAdded == true){
        var selectedgear = stage.find("#"+selectedtc.id);
        var selectedgashape = stage.find("#"+selectedtc.tt);
        //selectedgashape.hide();
        var priceval = $("#alignmentforsection option:selected").val();
        // selectedgashape.fill(colorvalue);
        var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
        selectedgear.setAttr('PriceLevel', priceval);
        var tablegroup = stage.find("#"+selectedtc.tt);
        var count = 0;
        for(var i = 0; i< tablegroup[0].parent.children[0].children.length;i++) {
            if(tablegroup[0].parent.children[0].children[i].attrs.ticketAdded == true ) {
            	var seat = stage.find("#"+tablegroup[0].parent.children[0].children[i].attrs.id);
            	seat.fill(colorvalue);
            	count++;
                var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
                seat.setAttr('pricename', pricename);
                var PriceLevel = $("#alignmentforsection option:selected").val();
                seat.setAttr('PriceLevel', PriceLevel);
                var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
                seat.setAttr('ticketid', ticketid);
                var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
                if(variablepricename !=  undefined) {
                    seat.setAttr('variablepricename', variablepricename);
                    var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
                    seat.setAttr('variableprice', variableprice);
                }
                else {
                    seat.setAttr('variablepricename', "novalue");
                    seat.setAttr('variableprice', "novalue");
                }
                console.log(seat);
            }
        }
        layer.draw();
        stage.add(layer);
        var priceval  = $("#alignmentforsection option:selected").val();
        // $('#seatingchartdataform input').val('');
        // $("#sectionname").val(selectedtc.tablewithchairname);
        // $("#pricelevel").val(priceval);
        // $("#maxcapacity").val(selectedtc.Toseatfortablewithchair);
        // $("#sectiontype").val("Tablewithchair");
        // $("#ass_id").val(selectedtc.data_id);
        // //console.log(selectedtc);
        // var data = $('#seatingchartdataform').serialize();
        sectiondetailsupdate(data);
        $(".innermessage").empty();
        var newstring = "<p>"+count+" tickets Updated.</p>";
        $(".innermessage").append(newstring);
        $("#ticketassignmessage").dialog('open');
        selectedtc = '';
        var json = layer.toJSON();
        $("#seatingchart_json").val(json);
        stage.add(layer);
    }
    if(indseattable!="" && indseattable != undefined && indseattable.ticketAdded == true) {
        var selectedgear = stage.find("#"+indseattable.id);
        selectedgear.setAttr('ticketAdded', true);
        selectedgear.setAttr('ticketCount', 1);
        $(".innermessage").empty();
        var newstring = "<p>1 tickets Updated.</p>";
        $(".innermessage").append(newstring);
        $("#ticketassignmessage").dialog('open');
        var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
        var Priceval = $("#alignmentforsection option:selected").val();
        var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
        selectedgear.setAttr('pricename', pricename);
        selectedgear.setAttr('PriceLevel', Priceval);
        var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
        selectedgear.setAttr('ticketid', ticketid);
        var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
        if(variablepricename !=  undefined) {
            selectedgear.setAttr('variablepricename', variablepricename);
            var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
            selectedgear.setAttr('variableprice', variableprice);
        }
        else {
            selectedgear.setAttr('variablepricename', "novalue");
            selectedgear.setAttr('variableprice', "novalue");
        }
        selectedgear.fill(colorvalue);
        layer.draw();
        indseattable = '';
        var json = layer.toJSON();
        $("#seatingchart_json").val(json);
        stage.add(layer);
    }
    if(secdetails!="" && secdetails != undefined) {
        var selectedgear = stage.find("#"+secdetails.id);
        selectedgear.setAttr('ticketAdded', true);
        var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
        var priceval = $("#alignmentforsection option:selected").val();
        selectedgear.setAttr('PriceLevel', priceval);
        var count = 0;
        for(m=0;m<selectedgear[0].parent.children.length;m++){
            if(selectedgear[0].parent.children[m].attrs.type == "sectionrowgroup"){
                for(n =0;n<selectedgear[0].parent.children[m].children.length; n++) {
                    if(selectedgear[0].parent.children[m].children[n].attrs.type == "rowindividualseats"){
                        if(selectedgear[0].parent.children[m].children[n].attrs.ticketAdded == true ){
                            if(selectedgear[0].parent.children[m].children[n].attrs.ishide != true ){
                                count++;
                                var secindseats = stage.find("."+selectedgear[0].parent.children[m].children[n].attrs.name);
                                secindseats.fill(colorvalue);
                                secindseats.setAttr('PriceLevel', priceval);
                                var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
                                secindseats.setAttr('ticketid', ticketid);
                                var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
                                if(variablepricename !=  undefined) {
                                    secindseats.setAttr('variablepricename', variablepricename);
                                    var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
                                    secindseats.setAttr('variableprice', variableprice);
                                }
                                else {
                                    secindseats.setAttr('variablepricename', "novalue");
                                    secindseats.setAttr('variableprice', "novalue");
                                }
                            }
                        }
                    }
                }
            }
        }
        $(".innermessage").empty();
        var newstring = "<p>"+count+" tickets updated.</p>";
        $(".innermessage").append(newstring);
        $("#ticketassignmessage").dialog('open');
        secdetails = '';
        layer.draw();
        stage.add(layer);
        var json = layer.toJSON();
        $("#seatingchart_json").val(json);
    }
    if(secindseat!="" && secindseat != undefined) {
        var selectedgear = stage.find("."+secindseat.name);
        if(secindseat.ticketAdded == true) {
            selectedgear.setAttr('ticketAdded', true);
            selectedgear.setAttr('ticketCount', 1);
            $(".innermessage").empty();
            var newstring = "<p>1 tickets Updated.</p>";
            $(".innermessage").append(newstring);
            $("#ticketassignmessage").dialog('open');
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            var PriceLevel = $("#alignmentforsection option:selected").val();
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
            selectedgear.setAttr('pricename', pricename);
            selectedgear.setAttr('PriceLevel', PriceLevel);
            selectedgear.fill(colorvalue);
            var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
            selectedgear.setAttr('ticketid', ticketid);
            var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
            if(variablepricename !=  undefined) {
                selectedgear.setAttr('variablepricename', variablepricename);
                var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
                selectedgear.setAttr('variableprice', variableprice);
            }
            else {
                selectedgear.setAttr('variablepricename', "novalue");
                selectedgear.setAttr('variableprice', "novalue");
            }
        }
        layer.draw();
        stage.add(layer);
        secindseat = '';
        var json = layer.toJSON();
        $("#seatingchart_json").val(json);
        stage.add(layer);
    }
    else if(rowdetails !="" && rowdetails != undefined) { 
        var rowseats = stage.find("#"+rowdetails.id);
        var count = 0;
        var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
        var PriceLevel = $("#alignmentforsection option:selected").val();
        for(var l=0;l<rowseats[0].parent.children.length;l++){
            if(rowseats[0].parent.children[l].attrs.type == "rowindividualseats") {
                if(rowseats[0].parent.children[l].attrs.ticketAdded == true) {
                    var rowfullseats = stage.find("."+rowseats[0].parent.children[l].attrs.name);
                    rowfullseats.setAttr('PriceLevel', PriceLevel);
                    rowfullseats.setAttr('ticketAdded', true);
                    var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
                    rowfullseats.setAttr('pricename', pricename);
                    rowfullseats.fill(colorvalue);
                    var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
                    rowfullseats.setAttr('ticketid', ticketid);
                    var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
                    if(variablepricename !=  undefined) {
                        rowfullseats.setAttr('variablepricename', variablepricename);
                        var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
                        rowfullseats.setAttr('variableprice', variableprice);
                    }
                    else {
                        rowfullseats.setAttr('variablepricename', "novalue");
                        rowfullseats.setAttr('variableprice', "novalue");
                    }
                    layer.draw();
                    stage.add(layer);
                    count++;
                }
            }
        }
        //rowseats.setAttr('ticketAdded', true);
        rowseats.setAttr('ticketCount', count);
        $(".innermessage").empty();
        var newstring = "<p>" +count+ " tickets updated.</p>";
        $(".innermessage").append(newstring);
        $("#ticketassignmessage").dialog('open');
        rowdetails = '';
        var json = layer.toJSON();
        $("#seatingchart_json").val(json);
        stage.add(layer);
    }
    else if (otherdetails != '' && otherdetails != undefined ) {
        if(otherdetails.ticketAdded == true) {
            var selectedgear = stage.find("#"+otherdetails.id);
            selectedgear.setAttr('ticketAdded', true);
            //selectedgear.setAttr('ticketCount', selectedga.maxgacapacity);
            $(".innermessage").empty();
            var newstring = "<p> tickets updated.</p>";
            $(".innermessage").append(newstring);
            layer.draw();
            $("#ticketassignmessage").dialog('open');
            //console.log(selectedga);
            var selectedgashape = stage.find("#"+otherdetails.tt);
             var selectedgashape = stage.find("#"+selectedgashape[0].attrs.id);
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            selectedgashape.stroke(colorvalue);
            selectedgashape.fill(colorvalue);
            selectedgear.setAttr('PriceLevel', colorvalue);
            var priceval  = $("#alignmentforsection option:selected").val();
            var colorvalue = $("#alignmentforsection option:selected").attr("data-color");
            var pricename = $("#alignmentforsection option:selected").attr("data-pricename");
            var priceval = $("#alignmentforsection option:selected").val();
            selectedgear.setAttr('pricename', pricename);
            selectedgear.setAttr('PriceLevel', priceval);
            selectedgear.setAttr('ticketAdded', true);
            var ticketid = $("#alignmentforsection option:selected").attr("data-ticketid");
            selectedgear.setAttr('ticketid', ticketid);
            var variablepricename = $("#alignmentforsection option:selected").attr("data-variablepricename");
            if(variablepricename !=  undefined) {
                selectedgear.setAttr('variablepricename', variablepricename);
                var variableprice = $("#alignmentforsection option:selected").attr("data-variableprice");
                selectedgear.setAttr('variableprice', variableprice);
            }
            else {
                selectedgear.setAttr('variablepricename', "novalue");
                selectedgear.setAttr('variableprice', "novalue");
            }
            var data = $('#seatingchartdataform').serialize();
            layer.draw();
            stage.add(layer);
            otherdetails = '';
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
        }
    }   
})
function setpricelevel(){
   var pricedetails = $("#pricedetails").val();
   pricedetails = JSON.parse(pricedetails);
   var variablepricelevel = $("#var_pricedetails").val();
   variablepricelevel = JSON.parse(variablepricelevel);
   $("#alignmentforsection").empty();
   var variabledetails;
   for(i=0;i<pricedetails.length;i++) {
        var variableadded = false;
        if(variablepricelevel != null) {
            for(m=0;m<variablepricelevel.length;m++) {
                if(variablepricelevel[m].parent_id == pricedetails[i].id) {
                    variableadded = true;
                    variabledetails = variablepricelevel[m];
                }
            }
        }
        if(variableadded == false) {
   		   var option = "<option data-ticketid="+pricedetails[i].id+" data-color="+pricedetails[i].color+"  value="+pricedetails[i].id+" data-pricename="+pricedetails[i].name+">"+pricedetails[i].name+"</option>";
   		   $("#alignmentforsection").append(option);
           variabledetails = '';
        }
        else if(variableadded == true) {
            var option = "<option data-ticketid="+pricedetails[i].id+" data-color="+pricedetails[i].color+"  value="+pricedetails[i].id+" data-pricename=" +pricedetails[i].name+" data-variableprice="+variabledetails.buy_price+" data-variablepricename="+variabledetails.name+">"+pricedetails[i].name+"</option>";
            $("#alignmentforsection").append(option);
             variabledetails = '';
        }
   }
}
function updateid(data){
    var classorid = sessionStorage.getItem('classorid');
    if(classorid !='') {
        sessionStorage.removeItem('classorid');
        if(classorid == "id") {
            var shapedetails = sessionStorage.getItem('adddetails');
            shapedetails = JSON.parse(shapedetails);
            sessionStorage.removeItem('adddetails');
            var shapeid = shapedetails.id;
            //console.log(data.id);
            var shape = stage.find("#"+shapedetails.id);
            shape.setAttr("data_id",data.id);
            layer.draw();
            var json = layer.toJSON();
            $("#seatingchart_json").val(json);
            stage.add(layer);
        }
    }
}
$(".seatingchartSvebtn").click(function(e){
    var json = layer.toJSON();
    $("#seatingchart_json").val(json);
    //console.log(json);
});
