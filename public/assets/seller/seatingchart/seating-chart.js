$.LoadingOverlay("show");
    // Hide it after 3 seconds
    setTimeout(function(){
        $.LoadingOverlay("hide");
        $(".cnc").css('display','block');
    }, 3000);
$(document).bind('fullscreenchange webkitfullscreenchange mozfullscreenchange msfullscreenchange', function (e) {
    var fullscreenElement = document.fullscreenElement || document.webkitFullscreenElement || document.mozFullscreenElement || document.msFullscreenElement;
    
    if (!fullscreenElement) {
        $("a[data-widget='fullscreen'] i").removeClass('fa-compress-arrows-alt');
        $("a[data-widget='fullscreen'] i").addClass('fa-expand-arrows-alt');
        $(".tooltips").css('display','none');
    } else {
        //alert('Entering full-screen mode...');
    }
});
function showloader() {
   $.LoadingOverlay("show");
   hideloader();
}
function hideloader() {
   setTimeout(function(){
        $.LoadingOverlay("hide");
    }, 2000); 
}
$(function () {
    $( "#stageoptions" ).dialog({
        autoOpen: false
    });
    $( "#generaladmissionoptions" ).dialog({
        autoOpen: false
    });
    $("#opener").click(function() {
        $("#stageoptions").dialog('open');
    });
});
/*need to change new js file*/
var scroll = 0;
ml = 0;
$("#play-ground").scroll(function (event) {
    $(".tooltips").css('display','none');
    scroll = $("#play-ground").scrollTop();
    ml = $("#play-ground").scrollLeft();
});
$(".nav-link").click(function(e){
    $('tooltips').css('display','none');
})
var stage,stage_edit_tooltip_option,selectedtableshape,selectedmenuoption,shapeaddE;
var slectedstagedetails,selectedgashape,selectedtablewithoutchair,selectedtablewithchair;
var geardetails,n = 1;
var selectedseatclass;
var windowwidth = $(window).width();
var windowheight = $(window).height();
stage = new Konva.Stage({
    container: 'play-ground',
    width: 2200,
    height: 2200,
});
var layer = new Konva.Layer();
var tr = new Konva.Transformer();
layer.add(tr);
/* rotate scale shape*/
var selectionRectangle = new Konva.Rect({
    fill: 'rgba(0,0,255,0.5)',
    id:'selectionrectangle'
});
var x1, y1, x2, y2;
layer.add(selectionRectangle);
/***end***/
stage.on('mouseover', function(e) {
    pos = stage.getPointerPosition();
    if (e.target.attrs.type == "tablewithseats") {
    } else {
    }
})
var pos = stage.getPointerPosition();
stage.on('mouseover', function(e) {
    pos = stage.getPointerPosition();
    if (e.target.attrs.category == "seats") {
        $('.seating-chart-tooltips').css('display','none');
        $('.individual-seat-details-for-table-with-seats').css('top', e.evt.screenY - 120 + 'px');
        var n = $("a[data-widget='fullscreen'] i").hasClass('fa-compress-arrows-alt');
        if( n == true) {
           $('.individual-seat-details-for-table-with-seats').css('top', e.evt.screenY - 50 + 'px');
        }
        $('.individual-seat-details-for-table-with-seats').css('left', e.evt.screenX - 60 + 'px');
        $('.seatno').text("Seat no :" + e.target.attrs.seatno);
        $('.individual-seat-details-for-table-with-seats').css('display', 'block');
    } else {
        $('.individual-seat-details-for-table-with-seats').css('display', 'none');
    }
})
stage.on('mousedown touchstart', function(e) {
    $('.seating-chart-tooltips, .ga-edit-tooltips, .tablewithoutchai-edit-tooltips, .tablewithchair-edit-tooltips, .section-edit-tooltips').css('display','none');
    $('.shaperotator').css('display','none');
    shapecheck(e);
    shapeaddE = e;
})
stage.on('dragstart', function(e) {
    $('.stage-edit-tooltips, .tooltips').css('display', 'none');
    $('.seating-chart-tooltips, .ga-edit-tooltips').css('display','none');
    if(e.evt.clientX > 700) {
    }
    var json = layer.toJSON();
    $("#sketchpaddata").val(json);
})
stage.on('dragend', function(e) {
    var json = layer.toJSON();
    $("#sketchpaddata").val(json);
})
function shapecheck(e) {
  if(e.target.attrs.type == undefined && e.target.attrs.stroke != 'rgb(0, 161, 255)') {
        tr.nodes([]);
        layer.draw();
    showpopupmenu(e);
  }
    else if (e.target.attrs.showstageeditor == "yes") {
        $('.seating-chart-tooltips').css('display', 'none');
        $('.tooltips').css("display","none");
        showstageeditor(e);
    }
    else if (e.target.attrs.showgaeditor == "yes") {
        $('.seating-chart-tooltips').css('display', 'none');
        $('.tooltips').css("display","none");
        showgaeditor(e);
    }
    else if (e.target.attrs.showtablewithoutchaireditor == "yes") {
        $('.seating-chart-tooltips').css('display', 'none');
        $('.tooltips').css("display","none");
        showtablewithoutchaireditor(e);
    }
    else if (e.target.attrs.showtablewithchaireditor == "yes") {
        $('.tooltips').css("display","none");
        showtablewithchaireditor(e);
    }
    else if (e.target.attrs.showsectioneditor == "yes") {
        $('.tooltip').css("display","none");
        showsectioneditor(e);
    }
    else if (e.target.attrs.showroweditor == "yes") {
        $('.tooltips').css("display","none");
        showroweditor(e);
    }
    else if (e.target.attrs.showseateditor == "yes") {
        $('.tooltips').css("display","none");
        seateditordetails(e);
    }
    else if (e.target.attrs.showothereditor == "yes") {
        $('.tooltips').css("display","none");
        showothereditortooltip(e);
    }
    else if(e.target.attrs.type == "lastrowincriment") {
        $('.tooltips').css("display","none");
        lastrowincriment(e);
    }
    else {
        $('.seating-chart-tooltips').css('display', 'none'); 
    }
}
function lastrowincriment(e) {
    var selectedsection = stage.find("#"+e.target.attrs.cc);
    var temp = selectedsection[0].children[selectedsection[0].children.length-1].children[0].attrs;
    var duplicateshapename = temp.rowname;
    var slugstatus = duplicateshapename.includes("_");
    var streetaddress = duplicateshapename.split('_')[0];
    if(slugstatus == false){
        slug = 1;
    }
    else {
        slug+=1;
    }
    //$('#stagename').val(streetaddress+"_"+slug);
    $("#rowname").val(streetaddress+"_"+slug);
    $("#fromseatforrow").val(temp.fromseatforrow);
    $("#Toseatforrow").val(temp.toseatforrow);
    document.getElementById("cOddEven").selectedIndex = temp.rowseatalloroddoreven - 1;
    document.getElementById("ascdes").selectedIndex = temp.ascdsc - 1;
    slectedstagedetails = e.target.attrs;
    rowsave();
}
function showothereditortooltip(e) {
    // var y, x;
    // if( scroll == 0) {
    //     y = e.evt.screenY - 210 + 70;
    // }
    // else {
    //     y = e.evt.screenY - 210 + 70;
    // }
    // if(ml > 0) {
    //     x = e.evt.screenX;
    // }
    // else {
    //     x = e.evt.screenX 
    // }
    // var n = $("a[data-widget='fullscreen'] i").hasClass('fa-compress-arrows-alt');
    // if( n == true) {
    //     y = y + 70;
    // }
    $('.other-edit-tooltips').css('top', e.evt.pageY - 70 + 'px');
    $('.other-edit-tooltips').css('left', e.evt.pageX + 'px');
    $('.other-edit-tooltips').css('display', 'block');
    slectedstagedetails = e.currentTarget.clickStartShape.attrs;
}
function seateditordetails(e){
    selectedseatclass = stage.find("."+e.target.attrs.name);
    $('.sectioname').text('');
    $('.rowname').text('');
    $('.seat').text('');
    //console.log(e.target.attrs);
    $('.rowname').text(e.target.attrs.rowname);
    $('.seat').text(e.target.attrs.seatno);
    //console.log(e);
    var vb = stage.find("#"+e.target.attrs.selectedsectionid);
    if( vb.length != 1){
        $('.sectioname').text(vb[1].attrs.sectionname);
    }
    if( vb.length == 1){
        var gear = stage.find('#'+vb[0].attrs.selectedsectionid);
        if(gear.length != 0) {
            if(gear[0].attrs.type !="lastrowincriment") {
                $('.sectioname').text(gear[1].attrs.sectionname);
            }
        }
        else {
            $('.sectioname').text(e.target.attrs.rowname);
        }
    }
    $('.tooltips').css('display','none');
    if(selectedseatclass[0].attrs.restricted == true) {
        $("#cRestricted").prop("checked", true);
    }
    else if (selectedseatclass[0].attrs.restricted == false) {
        $("#cRestricted").prop("checked", false);
    }
    $(".notavhideshow").css('display','block');
    $("#cHideSeat").prop("checked", false);
    if(selectedseatclass[0].attrs.right20px == true) {
        $("#righseatpixadd").prop("checked", true);
    }
    else {
        $("#righseatpixadd").prop("checked", false);
    }
    document.getElementById("cAccessibilityLevel").selectedIndex = selectedseatclass[0].attrs.accessibility;
    $("#seatpopup").dialog("open");
    var checkhiddenseatlist = stage.find("#"+selectedseatclass[0].attrs.id);
    $(".hidenseatdetails").empty();
    checkhiddenseatlist.forEach((seatitem) => {
        if(seatitem.attrs.ishide == true) {
            $(".hidenseatdetails").append('<span>'+seatitem.attrs.seatno+'</span');
        }
    });
}
function showstageeditor(e) {
    // var y, x;
    // if( scroll == 0) {
    //     y = e.evt.screenY - 210 + 70;
    // }
    // else {
    //     y = e.evt.screenY - 210 + 70;
    // }
    // if(ml > 0) {
    //     x = e.evt.screenX;
    // }
    // else {
    //     x = e.evt.screenX 
    // }
    // var n = $("a[data-widget='fullscreen'] i").hasClass('fa-compress-arrows-alt');
    // if( n == true) {
    //     y = y + 70;
    // }
    //console.log(e);
    $('.stage-edit-tooltips').css('top', e.evt.pageY - 70 + 'px');
    $('.stage-edit-tooltips').css('left', e.evt.pageX + 'px');
    $('.stage-edit-tooltips').css('display', 'block');
    slectedstagedetails = e.currentTarget.clickStartShape.attrs;
}
function showgaeditor(e) {
    // var y, x;
    // if( scroll == 0) {
    //     y = e.evt.screenY - 210 + 70;
    // }
    // else {
    //     y = e.evt.screenY - 210 + 70;
    // }
    // if(ml > 0) {
    //     x = e.evt.screenX;
    // }
    // else {
    //     x = e.evt.screenX 
    // }
    // var n = $("a[data-widget='fullscreen'] i").hasClass('fa-compress-arrows-alt');
    // if( n == true) {
    //     y = y + 70;
    // }
    $('.ga-edit-tooltips').css('top', e.evt.pageY - 70 + 'px');
    $('.ga-edit-tooltips').css('left', e.evt.pageX + 'px');
    $('.ga-edit-tooltips').css('display', 'block');
    slectedstagedetails = e.currentTarget.clickStartShape.attrs;
}
function showtablewithoutchaireditor(e) {
    // var y, x;
    // if( scroll == 0) {
    //     y = e.evt.screenY - 210 + 70;
    // }
    // else {
    //     y = e.evt.screenY - 210 + 70;
    // }
    // if(ml > 0) {
    //     x = e.evt.screenX;
    // }
    // else {
    //     x = e.evt.screenX 
    // }
    // var n = $("a[data-widget='fullscreen'] i").hasClass('fa-compress-arrows-alt');
    // if( n == true) {
    //     y = y + 70;
    // }
    $('.tablewithoutchai-edit-tooltips').css('top', e.evt.pageY - 70 + 'px');
    $('.tablewithoutchai-edit-tooltips').css('left', e.evt.pageX + 'px');
    $('.tablewithoutchai-edit-tooltips').css('display', 'block');
    slectedstagedetails = e.currentTarget.clickStartShape.attrs;
}
function showpopupmenu(e) {
    var y, x;
    if( scroll == 0) {
        y = e.evt.screenY - 210 + 70;
    }
    else {
        y = e.evt.screenY - 210 + 70;
    }
    if(y > 330) {
        y = 330;
    }
    if(ml > 0) {
        x = e.evt.screenX;
    }
    else {
        x = e.evt.screenX 
    }
    if( x>1005) {
        x = 1005;
    }
    var n = $("a[data-widget='fullscreen'] i").hasClass('fa-compress-arrows-alt');
    if( n == true) {
        y = y + 70;
    }
    $('.tooltips').css('display', 'none');
    $('.stage-edit-tooltips').css('display', 'none');
    $('.seating-chart-tooltips').css('top', y  + 'px');
    $('.seating-chart-tooltips').css('left', x + 'px');
    $('.seating-chart-tooltips').css('display', 'block');
}
function showtablewithchaireditor(e) {
    var y, x;
    if( scroll == 0) {
        y = e.evt.screenY - 210 + 70;
    }
    else {
        y = e.evt.screenY - 210 + 70;
    }
    if(ml > 0) {
        x = e.evt.screenX;
    }
    else {
        x = e.evt.screenX 
    }
    var n = $("a[data-widget='fullscreen'] i").hasClass('fa-compress-arrows-alt');
    if( n == true) {
        y = y + 70;
    }
    $('.tablewithchair-edit-tooltips').css('display', 'none');
    $('.tablewithchair-edit-tooltips').css('top', e.evt.pageY - 70 + 'px');
    $('.tablewithchair-edit-tooltips').css('left', e.evt.pageX + 'px');
    $('.tablewithchair-edit-tooltips').css('display', 'block');
    slectedstagedetails = e.currentTarget.clickStartShape.attrs;                        
}
function showsectioneditor(e) {
    // var y, x;
    // if( scroll == 0) {
    //     y = e.evt.screenY - 210 + 70;
    // }
    // else {
    //     y = e.evt.screenY - 210 + 70;
    // }
    // if(ml > 0) {
    //     x = e.evt.screenX;
    // }
    // else {
    //     x = e.evt.screenX 
    // }
    // var n = $("a[data-widget='fullscreen'] i").hasClass('fa-compress-arrows-alt');
    // if( n == true) {
    //     y = y + 70;
    // }
    $('.section-edit-tooltips').css('display', 'none');
    $('.section-edit-tooltips').css('top', e.evt.pageY - 70 + 'px');
    $('.section-edit-tooltips').css('left', e.evt.pageX + 'px');
    $('.section-edit-tooltips').css('display', 'block');
    slectedstagedetails = e.currentTarget.clickStartShape.attrs; 
}
function showroweditor(e) {
    slectedstagedetails = e.currentTarget.clickStartShape.attrs;
    $('.delete-row').css('display','inline-block');
    $('.insert-row-below').css('display','inline-block');
    $('.row-edit-save-save').css('display','inline-block');
    $('.row-save').css('display','none');
    $("#rowname").val(slectedstagedetails.rowname);
    $("#fromseatforrow").val(slectedstagedetails.fromseatforrow);
    $("#Toseatforrow").val(slectedstagedetails.toseatforrow);
    document.getElementById("cOddEven").selectedIndex = slectedstagedetails.rowseatalloroddoreven - 1;
    document.getElementById("ascdes").selectedIndex = slectedstagedetails.ascdsc - 1;
    $("#rowpopup").dialog("open");
}
$('.menuboxoptions').click(function(e){
    tr.nodes([]);
    layer.draw();
    $('.seating-chart-tooltips, .ga-edit-tooltips').css('display','none');
    selectedmenuoption = $(this).attr('id');
    if(selectedmenuoption == "addstageorshpe") {
        addstageorshpe();
    }
    else if(selectedmenuoption == "AddGeneralAdmissionSection") {
        addgeneraladmissionsection();
    }
    else if (selectedmenuoption == "addtablewithoutseats") {
        addtablewithoutseats();
    }
    else if (selectedmenuoption == "addtablewithseats") {
        addaddtablewithseats();
    }
    else if (selectedmenuoption == "SectionAdd") {
        addsection();
    }
    else if (selectedmenuoption == "other") {
        showother();
    }
})
function showother() {
    $("#othername").val('');
    selectedtableshape = "wheelchair";
    $('.wheelchair').addClass("selected");
    $('.wheelchair img').addClass("selected");
    $("#Other").dialog('open');
}
function addstageorshpe() {
    $(".imgSelectorstage  img").removeClass('selected');
    $(".imgSelectorstage  img.circle_tablestage").addClass('selected');
    selectedtableshape = "circle_tablestage";
    $("#stageoptions").dialog('open');
    $('#stagename').val('');
    $("#stagefillcolor").val('#eed189');
}
function addgeneraladmissionsection() {
    $("#generaladmissionfillcolor").val('#999999');
    $('#generaladmissionname').val('');
    $('#maxcapacitynumper').val('');
    document.getElementById("salepriorityforgeneraladmission").selectedIndex = 0;
    $('.imgSelectorgeneraladmission span').removeClass('selected');
    $('.imgSelectorgeneraladmission span.circle_table').addClass('selected');
    selectedgashape = "circle_table";
    $("#generaladmissionoptions").dialog('open');
}
function addtablewithoutseats() {
    $('#tablewithoutchairname').val('');
    $('#fromseatfortablewithoutchair').val('');
    $('#Toseatfortablewithoutchair').val('');
    $('.tableSelectorwithoutchair img').removeClass('selected');
    $('.tableSelectorwithoutchair img.circle_tablewithoutchair ').addClass('selected');
    selectedtablewithoutchair = "circle_tablewithoutchair";
    document.getElementById("salepriorityfortablewithoutchair").selectedIndex = 0;
    $("#tablewithoutchairfillcolor").val('#999999');
    $("#tablewithoutchairoptions").dialog('open');
}
function addaddtablewithseats(){
    $('#tablewithchairname').val('');
    $('#fromseatfortablewithchair').val('');
    $('#Toseatfortablewithchair').val('');
    $('.imgSelectortablewithchair span').removeClass('selected');
    document.getElementById("salepriorityfortablewithchair").selectedIndex = 0;
     $("#tablewithchairfillcolorseat").val('#ddd');
    $("#tablewithchairfillcolor").val('#eed189');
    $(".seatgroupOnly").addClass("selected");
    $("#tablewithchairoptions").dialog('open');
}
function addsection() {
    $("#sectionname").val('');
    document.getElementById("salepriorityforsection").selectedIndex = 0;
    document.getElementById("alignmentforsection").selectedIndex = 0;
    document.getElementById("sellpreferenceforsection").selectedIndex = 0;
    $("#section").dialog('open');
}
$('.imgSelectorstage img').click(function(e){
    $('.imgSelectorstage img').removeClass('selected');
    $(this).addClass('selected');
    selectedtableshape = $(this).attr('data-value');
})
$('.imgSelectorgeneraladmission span').click(function(e){
    $('.imgSelectorgeneraladmission span').removeClass('selected');
    $(this).addClass('selected');
    selectedgashape = $(this).attr('data-value');
})
$('.tableSelectorwithoutchair img').click(function(e){
    $('.tableSelectorwithoutchair img').removeClass('selected');
    $(this).addClass('selected');
    selectedtablewithoutchair = $(this).attr('data-value');
})
$('.imgSelectortablewithchair  span').click(function(e){
    $('.imgSelectortablewithchair  span').removeClass('selected');
    $(this).addClass('selected');
    selectedtablewithchair = $(this).attr('data-value');
})
$('.otherimage img').click(function(e){
    $('.otherimage span').removeClass('selected');
    $('.otherimage img').removeClass('selected');
    $(this).addClass('selected');
    var  nm = $(this).attr("data-other");
    if(nm == "wheelchair") {
        $('.wheelchair').addClass("selected");
    }
    else {
        $('.wheelchair').removeClass("selected");
    }
})
$('.dailog-cancel').click(function(e) {
    $("#stageoptions").dialog('close');
    $("#generaladmissionoptions").dialog('close');
    $("#tablewithoutchairoptions").dialog('close');
    $("#tablewithchairoptions").dialog('close');
    $("#section").dialog('close');
    $("#rowpopup").dialog('close');
    $("#Other").dialog('close');
    $("#Otherrename").dialog('close');
});
$('.stage-save').click(function(e) {
    var stagename = $('#stagename').val();
    if(stagename.trim() != '') {
        $("#stageoptions").dialog('close');
        if(selectedmenuoption == "addstageorshpe") {
            drawShapes();
        }
        else if (selectedmenuoption == "editshape"){
            var shape = stage.find('#'+slectedstagedetails.tt);
            var shapetext = stage.find('#'+slectedstagedetails.tt+'stagename');
            var stagename = $("#stagename").val();
            shapetext.text(stagename);
            var shapetextsave = stage.find('#'+slectedstagedetails.tt+'gear');
            var stagename = $("#stagename").val();
            shapetextsave.setAttr('stagename', stagename);
            var updatetableshape = stage.find('#'+slectedstagedetails.id);
            updatetableshape.setAttr('selectedtableshape', selectedtableshape);
            var pathfillcolor = $("#stagefillcolor").val();
            updatetableshape.setAttr('pathfillcolor', pathfillcolor);
            var selectedpath  = icons[selectedtableshape];
            tablescalex = 1.5;
            tablescaley = 1.5;
            borderwidth = 0.5;
            var stagecharactercount = stagename.length;
            var namelabelboxwidth = 100;
            if(stagecharactercount > 6) {
                namelabelboxwidth = 0;
                var c = Count(stagename);
                namelabelboxwidth = c[0] * 16 + c[1] * 11 + c[2] * 16 + 10;
            }
            else {
                namelabelboxwidth = 100;
            }
            var gearid = stage.find('#'+slectedstagedetails.id);
            gearid.width(namelabelboxwidth);
            shape.data(selectedpath);
            shape.fill(pathfillcolor);
            shape.draw();
            layer.draw();
        }
    }
    else {
        $("#editorerrorpopup").dialog('open');
    }
});
$('.other-save').click(function(e){
    var othername = $('#othername').val();
    if(othername.trim() != '') {
       $("#Other").dialog("close");
        if(selectedmenuoption == "other") {
            drawShapes();
        }
    }
    else {
        $("#editorerrorpopup").dialog("open");
    }
})
$(".general-save").click(function(e){
    var generaladmissionname = $('#generaladmissionname').val();
    var generalmaxcapacity = $('#maxcapacitynumper').val();
    if(generaladmissionname.trim() != '' && generalmaxcapacity.trim() != '') {
        $("#generaladmissionoptions").dialog('close');
        if(selectedmenuoption == "AddGeneralAdmissionSection") {
            drawShapes();
        }
        else if (selectedmenuoption == "editga"){
            var shape = stage.find('#'+slectedstagedetails.tt);
            var shapetext = stage.find('#'+slectedstagedetails.tt+'ganame');
            var ganame = $("#generaladmissionname").val();
            shapetext.text(ganame);
            var shapetextsave = stage.find('#'+slectedstagedetails.tt+'gear');
            shapetextsave.setAttr('ganame', ganame);
            var gasalepriority = $("#salepriorityforgeneraladmission").children("option:selected").val() - 1;
            shapetextsave.setAttr('gasalepriority', gasalepriority);
            var maxgacapacity = $("#maxcapacitynumper").val();
            var pathfillcolor =  $('#generaladmissionfillcolor').val();
            shapetextsave.setAttr('pathfillcolor', pathfillcolor);
            shapetextsave.setAttr('maxgacapacity', maxgacapacity);
            var updatetableshape = stage.find('#'+slectedstagedetails.id);
            updatetableshape.setAttr('selectedgashape', selectedgashape);
            var selectedpath  = icons[selectedgashape];
            if( selectedgashape == "rectangle_table" || selectedgashape == "elipsce_table") {
                shape.scaleX(5);
                shape.scaleY(4);
            }
            else if(selectedgashape == "l-shaped-table") {
                shape.scaleX(.5);
                shape.scaleY(.3);
            }
            else if(selectedgashape == "circle_table") {
                shape.scaleX(1.5);
                shape.scaleY(1.5);
            }
            var stagecharactercount = ganame.length;
            var namelabelboxwidth = 100;
            if(stagecharactercount > 6) {
                namelabelboxwidth = 0;
                var c = Count(ganame);
                namelabelboxwidth = c[0] * 16 + c[1] * 11 + c[2] * 12 + c[3] * 16 + 10;
            }
            else {
                namelabelboxwidth = 100;
            }
            var gearid = stage.find('#'+slectedstagedetails.id);
            gearid.width(namelabelboxwidth);
            shape.data(selectedpath);
            shape.fill(pathfillcolor);
            shape.draw();
            layer.draw();
        }
    }
    else {
        $("#editorerrorpopup").dialog('open');
    }
})
$(".tablewithoutchair-save").click(function(e){
    var tablewithoutchairname = $('#tablewithoutchairname').val();
    var fromseatfortablewithoutchair = $('#fromseatfortablewithoutchair').val();
    var toseatfortablewithoutchair= $('#Toseatfortablewithoutchair').val();
    var a = parseInt(fromseatfortablewithoutchair);
    var b = parseInt(toseatfortablewithoutchair);
    if(b >= a ) {
        if(tablewithoutchairname.trim() != '' && fromseatfortablewithoutchair.trim() != ''&& toseatfortablewithoutchair.trim() != '') {
            $("#tablewithoutchairoptions").dialog('close');
            if(selectedmenuoption == "addtablewithoutseats") {
                drawShapes();
            }
            else if (selectedmenuoption == "edittablewithoutchair"){
                var shape = stage.find('#'+slectedstagedetails.tt);
                var shapetext = stage.find('#'+slectedstagedetails.tt+'tablewithoutchairname');
                var tablewithoutchairname = $("#tablewithoutchairname").val();
                shapetext.text(tablewithoutchairname);
                var shapetextsave = stage.find('#'+slectedstagedetails.tt+'gear');
                shapetextsave.setAttr('tablewithoutchairname', tablewithoutchairname);
                var tablewithoutchairsalepriority = $("#salepriorityfortablewithoutchair").children("option:selected").val() - 1;
                shapetextsave.setAttr('tablewithoutchairsalepriority', tablewithoutchairsalepriority);
                var fromseatfortablewithoutchair = $("#fromseatfortablewithoutchair").val();
                shapetextsave.setAttr('fromseatfortablewithoutchair', fromseatfortablewithoutchair);
                var Toseatfortablewithoutchair = $("#Toseatfortablewithoutchair").val();
                shapetextsave.setAttr('Toseatfortablewithoutchair', Toseatfortablewithoutchair);
                shapetextsave.setAttr('selectedtablewithoutchair', selectedtablewithoutchair);
                var pathfillcolor = $("#tablewithoutchairfillcolor").val();
                shapetextsave.setAttr('pathfillcolor', pathfillcolor);
                var selectedpath  = icons[selectedtablewithoutchair];
                if( selectedgashape == "corner_tablewithoutchair") {
                    shape.scaleX(1.2);
                    shape.scaleY(1.2);
                }
                else {
                    shape.scaleX(0.8);
                    shape.scaleY(0.8);
                }
                var stagecharactercount = tablewithoutchairname.length;
                var namelabelboxwidth = 100;
                if(stagecharactercount > 6) {
                    namelabelboxwidth = 0;
                    var c = Count(tablewithoutchairname);
                    namelabelboxwidth = c[0] * 16 + c[1] * 11 + c[2] * 12 + c[3] * 16 + 10;
                }
                else {
                    namelabelboxwidth = 100;
                }
                var gearid = stage.find('#'+slectedstagedetails.id);
                gearid.width(namelabelboxwidth);
                shape.fill(pathfillcolor);
                shape.data(selectedpath);
                shape.draw();
                layer.draw();
            }
        }
        else {
            $("#editorerrorpopup").dialog("open");
        }
    }
    else {
        $("#editorerrorpopup").dialog('open');
    }
})
$(".tablewithchair-save").click(function(e){
    var tablewithchairname = $('#tablewithchairname').val();
    var fromseatfortablewithchair = $('#fromseatfortablewithchair').val();
    var toseatfortablewithchair= $('#Toseatfortablewithchair').val();
    var a = parseInt(fromseatfortablewithchair);
    var b = parseInt(toseatfortablewithchair);
    if(b >= a) {
        if(tablewithchairname.trim() != '' && fromseatfortablewithchair.trim() != ''&& toseatfortablewithchair.trim() != '') {
            $("#tablewithchairoptions").dialog('close');
            if(selectedmenuoption == "addtablewithseats") {
                drawShapes();
            }
            else if (selectedmenuoption == "editseatgroup"){
                var c = sessionStorage.getItem("slectedstagedetails");
                c = JSON.parse(c);
                //console.log(c.seatgroupid);
                var selectedseatgroup = stage.find('#'+c.seatgroupid);
                selectedseatgroup.destroy();
                sessionStorage.removeItem("slectedstagedetails");
                var pathfillcolorseat = $("#tablewithchairfillcolorseat").val();
                var shape = stage.find('#'+slectedstagedetails.cc);
                var seatgroup = new Konva.Group({
                    x: -10,
                    id: slectedstagedetails.seatgroupid,
                    type: "tablewithseats",
                    ctype: "tablewithseatscont",
                });
                var i=0, x;
                var k = 0;
                for(i=parseInt(fromseatfortablewithchair);i<=parseInt(toseatfortablewithchair);i++) {
                    k+=1;
                    var dt = new Date(); 
                    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
                    var circle = new Konva.Circle({
                        x: k * 20,
                        y: -12,
                        radius: 5,
                        id: time+k,
                        fill: pathfillcolorseat,
                        stroke: '#aaa',
                        strokeWidth: 1,
                        draggable: true,
                        seatno: i,
                        type: "tablewithseats",
                        category:"seats"
                    });
                    k++;
                    seatgroup.add(circle);
                }
                shape.add(seatgroup);
                layer.draw();
                var shape = stage.find('#'+slectedstagedetails.tt);
                var shapetext = stage.find('#'+slectedstagedetails.tt+'tablewithchairname');
                var tablewithoutchairname = $("#tablewithchairname").val();
                shapetext.text(tablewithoutchairname);
                var shapetextsave = stage.find('#'+slectedstagedetails.tt+'gear');
                shapetextsave.setAttr('tablewithchairname', tablewithchairname);
                var tablewithchairsalepriority = $("#salepriorityfortablewithchair").children("option:selected").val() - 1;
                shapetextsave.setAttr('tablewithchairsalepriority', tablewithchairsalepriority);
                var fromseatfortablewithchair = $("#fromseatfortablewithchair").val();
                shapetextsave.setAttr('fromseatfortablewithchair', fromseatfortablewithchair);
                var Toseatfortablewithchair = $("#Toseatfortablewithchair").val();
                shapetextsave.setAttr('Toseatfortablewithchair', Toseatfortablewithchair);
                shapetextsave.setAttr('selectedtablewithchair', selectedtablewithchair);
                var pathfillcolor = $("#tablewithchairfillcolor").val();
                shapetextsave.setAttr('pathfillcolor', pathfillcolor);
                shapetextsave.setAttr('pathfillcolorseat', pathfillcolorseat);
                var selectedpath  = icons[selectedtablewithchair];
                if (selectedtablewithchair == "circle_table") {
                    shape.scaleX(1.2);
                    shape.scaleY(1.2);
                    shape.strokeWidth(.5);
                }
                else if (selectedtablewithchair == "l-shaped-table") {
                    shape.scaleX(0.5);
                    shape.scaleY(0.3);
                    shape.strokeWidth(1.5);
                }
                else if (selectedtablewithchair == "noShape") {
                    tablescalex = 0.8;
                    shape.scaleY(0.8);
                    shape.strokeWidth(.25);
                }
                else {
                    shape.scaleX(4);
                    shape.scaleY(4);
                    shape.strokeWidth(.25);
                }
                var stagecharactercount = tablewithchairname.length;
                var namelabelboxwidth = 100;
                if(stagecharactercount > 6) {
                    namelabelboxwidth = 0;
                    var c = Count(tablewithchairname);
                    namelabelboxwidth = c[0] * 16 + c[1] * 11 + c[2] * 12 + c[3] * 16 + 10;
                }
                else {
                    namelabelboxwidth = 100;
                }
                var gearid = stage.find('#'+slectedstagedetails.id);
                gearid.width(namelabelboxwidth);
                shape.fill(pathfillcolor);
                shape.data(selectedpath);
                shape.draw();
                layer.draw();
            }
        }else {
            $("#editorerrorpopup").dialog("open");
        }
    }
    else {
        $("#editorerrorpopup").dialog("open");
    }
})
$('.section-save').click(function(e){
    var sectionname = $('#sectionname').val();
    if(sectionname.trim() != '') {
        $("#section").dialog('close');
        if(selectedmenuoption == "SectionAdd") {
            drawShapes();
        }
        else if (selectedmenuoption == "editsection"){
            var shape = stage.find('#'+slectedstagedetails.tt);
            var shapetext = stage.find('#'+slectedstagedetails.tt+'sectionname');
            var sectionname = $("#sectionname").val();
            shapetext.text(sectionname);
            var shapetextsave = stage.find('#'+slectedstagedetails.tt+'gear');
            shapetextsave.setAttr('sectionname', sectionname);
            var salepriorityforsection = $("#salepriorityforsection").children("option:selected").val() - 1;
            shapetextsave.setAttr('salepriorityforsection', salepriorityforsection);
            var alignmentforsection = $("#alignmentforsection").children("option:selected").val();
            shapetextsave.setAttr('alignmentforsection', alignmentforsection);
            var sellpreferenceforsection = $("#sellpreferenceforsection").children("option:selected").val();
            shapetextsave.setAttr('sellpreferenceforsection', sellpreferenceforsection);
            layer.draw();
            layer.draw();
            var kk = stage.find('#'+slectedstagedetails.id);
            var newid = stage.find("#"+slectedstagedetails.cc);
            var alignmentwidth;
            if(newid[0].attrs.type == "section"){
                alignmentwidth=  newid[0].attrs.width;
            }
            else if(newid[0].attrs.type == "lastrowincriment") {
                alignmentwidth = newid[0].parent.children[1].attrs.width;
            }
            if(alignmentwidth == undefined) {
                alignmentwidth = newid[0].children[1].attrs.width;
            }
            var alignmentwidthvalue;
            if (kk.length != 1) {
                if (kk[1].attrs.type == "section"){
                    alignmentwidthvalue = kk[1].attrs.alignmentforsection;
                }
            }
            else if (kk[0].attrs.type == "lastrowincriment") {
                alignmentwidthvalue = kk[0].parent.children[2].attrs.alignmentforsection;
            }
            if(alignmentwidthvalue == 0) {
                for(i = 4;i<newid[0].children.length;i++) {
                    var changeyid = stage.find('#'+newid[0].children[i].attrs.id);
                    changeyid.x(0);
                }
            }
            if(parseInt(alignmentwidthvalue) == 1) {
                for(i = 4;i<newid[0].children.length;i++) {
                    var changeyid = stage.find('#'+newid[0].children[i].attrs.id);
                    if(alignmentwidth/2 > ((changeyid[0].children[0].attrs.width)/2) ) {
                        changeyid.x((alignmentwidth/2) - ((changeyid[0].children[0].attrs.width)/2));
                    }
                    else if (alignmentwidth/2 <= ((changeyid[0].children[0].attrs.width)/2)) {
                        changeyid.x(((changeyid[0].children[0].attrs.width)/2) - (alignmentwidth/2));
                    }
                }
            }
            if(alignmentwidthvalue == 2) {
                for(i = 4;i<newid[0].children.length;i++) {
                    var changeyid = stage.find('#'+newid[0].children[i].attrs.id);
                    changeyid.x(alignmentwidth - changeyid[0].children[0].attrs.width);
                }
            }
            layer.draw();
        }
    }else {
        $("#editorerrorpopup").dialog("open");
    }
})
$('.alert-close-btn').click(function(e){
    $("#editorerrorpopup").dialog('close');
})
var icons = {
    "circle_table":"M25 0C11.1942 0 0 11.1942 0 25C0 38.8058 11.1942 50 25 50C38.8058 50 50 38.8058 50 25C50 11.1942 38.8058 0 25 0Z",
    "circle_tablestage":"M25 0C11.1942 0 0 11.1942 0 25C0 38.8058 11.1942 50 25 50C38.8058 50 50 38.8058 50 25C50 11.1942 38.8058 0 25 0Z,M12.2139 27.4365C12.2139 26.999 12.0589 26.6618 11.749 26.4248C11.4437 26.1878 10.89 25.9486 10.0879 25.707C9.28581 25.4655 8.64779 25.1966 8.17383 24.9004C7.26693 24.3307 6.81348 23.5879 6.81348 22.6719C6.81348 21.8698 7.13932 21.209 7.79102 20.6895C8.44727 20.1699 9.2972 19.9102 10.3408 19.9102C11.0335 19.9102 11.651 20.0378 12.1934 20.293C12.7357 20.5482 13.1618 20.9128 13.4717 21.3867C13.7816 21.8561 13.9365 22.3779 13.9365 22.9521H12.2139C12.2139 22.4326 12.0498 22.027 11.7217 21.7354C11.3981 21.4391 10.9333 21.291 10.3271 21.291C9.76204 21.291 9.32227 21.4118 9.00781 21.6533C8.69792 21.8949 8.54297 22.2321 8.54297 22.665C8.54297 23.0296 8.71159 23.335 9.04883 23.5811C9.38607 23.8226 9.94206 24.0596 10.7168 24.292C11.4915 24.5199 12.1136 24.7819 12.583 25.0781C13.0524 25.3698 13.3965 25.707 13.6152 26.0898C13.834 26.4681 13.9434 26.9124 13.9434 27.4229C13.9434 28.2523 13.6243 28.9131 12.9863 29.4053C12.3529 29.8929 11.4915 30.1367 10.4023 30.1367C9.68229 30.1367 9.01921 30.0046 8.41309 29.7402C7.81152 29.4714 7.34212 29.1022 7.00488 28.6328C6.6722 28.1634 6.50586 27.6165 6.50586 26.9922H8.23535C8.23535 27.5573 8.4222 27.9948 8.7959 28.3047C9.1696 28.6146 9.70508 28.7695 10.4023 28.7695C11.0039 28.7695 11.4551 28.6488 11.7559 28.4072C12.0612 28.1611 12.2139 27.8376 12.2139 27.4365ZM17.3818 20.8057V22.6035H18.6875V23.834H17.3818V27.9629C17.3818 28.2454 17.4365 28.4505 17.5459 28.5781C17.6598 28.7012 17.8604 28.7627 18.1475 28.7627C18.3389 28.7627 18.5326 28.7399 18.7285 28.6943V29.9795C18.3503 30.0843 17.9857 30.1367 17.6348 30.1367C16.3587 30.1367 15.7207 29.4326 15.7207 28.0244V23.834H14.5039V22.6035H15.7207V20.8057H17.3818ZM24.3818 30C24.3089 29.8587 24.2451 29.6286 24.1904 29.3096C23.6618 29.861 23.0146 30.1367 22.249 30.1367C21.5062 30.1367 20.9001 29.9248 20.4307 29.501C19.9613 29.0771 19.7266 28.5531 19.7266 27.9287C19.7266 27.1403 20.0182 26.5365 20.6016 26.1172C21.1895 25.6934 22.028 25.4814 23.1172 25.4814H24.1357V24.9961C24.1357 24.6133 24.0286 24.3079 23.8145 24.0801C23.6003 23.8477 23.2744 23.7314 22.8369 23.7314C22.4587 23.7314 22.1488 23.8271 21.9072 24.0186C21.6657 24.2054 21.5449 24.4447 21.5449 24.7363H19.8838C19.8838 24.3307 20.0182 23.9525 20.2871 23.6016C20.556 23.2461 20.9206 22.9681 21.3809 22.7676C21.8457 22.5671 22.363 22.4668 22.9326 22.4668C23.7985 22.4668 24.4889 22.6855 25.0039 23.123C25.5189 23.556 25.7832 24.1667 25.7969 24.9551V28.291C25.7969 28.9564 25.8903 29.4873 26.0771 29.8838V30H24.3818ZM22.5566 28.8037C22.8848 28.8037 23.1924 28.724 23.4795 28.5645C23.7712 28.4049 23.9899 28.1908 24.1357 27.9219V26.5273H23.2402C22.625 26.5273 22.1624 26.6344 21.8525 26.8486C21.5426 27.0628 21.3877 27.3659 21.3877 27.7578C21.3877 28.0768 21.4925 28.332 21.7021 28.5234C21.9163 28.7103 22.2012 28.8037 22.5566 28.8037ZM27.2461 26.2471C27.2461 25.0986 27.515 24.1826 28.0527 23.499C28.5951 22.8109 29.3128 22.4668 30.2061 22.4668C31.0492 22.4668 31.7122 22.7607 32.1953 23.3486L32.2705 22.6035H33.7676V29.7744C33.7676 30.7451 33.4645 31.5107 32.8584 32.0713C32.2568 32.6318 31.4434 32.9121 30.418 32.9121C29.8757 32.9121 29.3447 32.7982 28.8252 32.5703C28.3102 32.347 27.9183 32.0531 27.6494 31.6885L28.4355 30.6904C28.946 31.2965 29.5749 31.5996 30.3223 31.5996C30.8737 31.5996 31.3089 31.4492 31.6279 31.1484C31.9469 30.8522 32.1064 30.4147 32.1064 29.8359V29.3369C31.6279 29.8701 30.9899 30.1367 30.1924 30.1367C29.3265 30.1367 28.6178 29.7926 28.0664 29.1045C27.5195 28.4163 27.2461 27.4639 27.2461 26.2471ZM28.9004 26.3906C28.9004 27.1335 29.0508 27.7191 29.3516 28.1475C29.6569 28.5713 30.0785 28.7832 30.6162 28.7832C31.2861 28.7832 31.7829 28.4961 32.1064 27.9219V24.668C31.792 24.1074 31.2998 23.8271 30.6299 23.8271C30.083 23.8271 29.6569 24.0436 29.3516 24.4766C29.0508 24.9095 28.9004 25.5475 28.9004 26.3906ZM38.7373 30.1367C37.6846 30.1367 36.8301 29.8063 36.1738 29.1455C35.5221 28.4801 35.1963 27.596 35.1963 26.4932V26.2881C35.1963 25.5498 35.3376 24.8913 35.6201 24.3125C35.9072 23.7292 36.3083 23.2757 36.8232 22.9521C37.3382 22.6286 37.9124 22.4668 38.5459 22.4668C39.5531 22.4668 40.3301 22.7881 40.877 23.4307C41.4284 24.0732 41.7041 24.9824 41.7041 26.1582V26.8281H36.8711C36.9212 27.4388 37.124 27.9219 37.4795 28.2773C37.8395 28.6328 38.2907 28.8105 38.833 28.8105C39.5941 28.8105 40.2139 28.5029 40.6924 27.8877L41.5879 28.7422C41.2917 29.1842 40.8952 29.5283 40.3984 29.7744C39.9062 30.016 39.3525 30.1367 38.7373 30.1367ZM38.5391 23.7998C38.0833 23.7998 37.7142 23.9593 37.4316 24.2783C37.1536 24.5973 36.9759 25.0417 36.8984 25.6113H40.0635V25.4883C40.027 24.9323 39.8789 24.513 39.6191 24.2305C39.3594 23.9434 38.9993 23.7998 38.5391 23.7998Z",
    "rectangle_tablestage":"M0.25 2.25H20.25V18.75H0.25V2.25Z,M12.2139 27.4365C12.2139 26.999 12.0589 26.6618 11.749 26.4248C11.4437 26.1878 10.89 25.9486 10.0879 25.707C9.28581 25.4655 8.64779 25.1966 8.17383 24.9004C7.26693 24.3307 6.81348 23.5879 6.81348 22.6719C6.81348 21.8698 7.13932 21.209 7.79102 20.6895C8.44727 20.1699 9.2972 19.9102 10.3408 19.9102C11.0335 19.9102 11.651 20.0378 12.1934 20.293C12.7357 20.5482 13.1618 20.9128 13.4717 21.3867C13.7816 21.8561 13.9365 22.3779 13.9365 22.9521H12.2139C12.2139 22.4326 12.0498 22.027 11.7217 21.7354C11.3981 21.4391 10.9333 21.291 10.3271 21.291C9.76204 21.291 9.32227 21.4118 9.00781 21.6533C8.69792 21.8949 8.54297 22.2321 8.54297 22.665C8.54297 23.0296 8.71159 23.335 9.04883 23.5811C9.38607 23.8226 9.94206 24.0596 10.7168 24.292C11.4915 24.5199 12.1136 24.7819 12.583 25.0781C13.0524 25.3698 13.3965 25.707 13.6152 26.0898C13.834 26.4681 13.9434 26.9124 13.9434 27.4229C13.9434 28.2523 13.6243 28.9131 12.9863 29.4053C12.3529 29.8929 11.4915 30.1367 10.4023 30.1367C9.68229 30.1367 9.01921 30.0046 8.41309 29.7402C7.81152 29.4714 7.34212 29.1022 7.00488 28.6328C6.6722 28.1634 6.50586 27.6165 6.50586 26.9922H8.23535C8.23535 27.5573 8.4222 27.9948 8.7959 28.3047C9.1696 28.6146 9.70508 28.7695 10.4023 28.7695C11.0039 28.7695 11.4551 28.6488 11.7559 28.4072C12.0612 28.1611 12.2139 27.8376 12.2139 27.4365ZM17.3818 20.8057V22.6035H18.6875V23.834H17.3818V27.9629C17.3818 28.2454 17.4365 28.4505 17.5459 28.5781C17.6598 28.7012 17.8604 28.7627 18.1475 28.7627C18.3389 28.7627 18.5326 28.7399 18.7285 28.6943V29.9795C18.3503 30.0843 17.9857 30.1367 17.6348 30.1367C16.3587 30.1367 15.7207 29.4326 15.7207 28.0244V23.834H14.5039V22.6035H15.7207V20.8057H17.3818ZM24.3818 30C24.3089 29.8587 24.2451 29.6286 24.1904 29.3096C23.6618 29.861 23.0146 30.1367 22.249 30.1367C21.5062 30.1367 20.9001 29.9248 20.4307 29.501C19.9613 29.0771 19.7266 28.5531 19.7266 27.9287C19.7266 27.1403 20.0182 26.5365 20.6016 26.1172C21.1895 25.6934 22.028 25.4814 23.1172 25.4814H24.1357V24.9961C24.1357 24.6133 24.0286 24.3079 23.8145 24.0801C23.6003 23.8477 23.2744 23.7314 22.8369 23.7314C22.4587 23.7314 22.1488 23.8271 21.9072 24.0186C21.6657 24.2054 21.5449 24.4447 21.5449 24.7363H19.8838C19.8838 24.3307 20.0182 23.9525 20.2871 23.6016C20.556 23.2461 20.9206 22.9681 21.3809 22.7676C21.8457 22.5671 22.363 22.4668 22.9326 22.4668C23.7985 22.4668 24.4889 22.6855 25.0039 23.123C25.5189 23.556 25.7832 24.1667 25.7969 24.9551V28.291C25.7969 28.9564 25.8903 29.4873 26.0771 29.8838V30H24.3818ZM22.5566 28.8037C22.8848 28.8037 23.1924 28.724 23.4795 28.5645C23.7712 28.4049 23.9899 28.1908 24.1357 27.9219V26.5273H23.2402C22.625 26.5273 22.1624 26.6344 21.8525 26.8486C21.5426 27.0628 21.3877 27.3659 21.3877 27.7578C21.3877 28.0768 21.4925 28.332 21.7021 28.5234C21.9163 28.7103 22.2012 28.8037 22.5566 28.8037ZM27.2461 26.2471C27.2461 25.0986 27.515 24.1826 28.0527 23.499C28.5951 22.8109 29.3128 22.4668 30.2061 22.4668C31.0492 22.4668 31.7122 22.7607 32.1953 23.3486L32.2705 22.6035H33.7676V29.7744C33.7676 30.7451 33.4645 31.5107 32.8584 32.0713C32.2568 32.6318 31.4434 32.9121 30.418 32.9121C29.8757 32.9121 29.3447 32.7982 28.8252 32.5703C28.3102 32.347 27.9183 32.0531 27.6494 31.6885L28.4355 30.6904C28.946 31.2965 29.5749 31.5996 30.3223 31.5996C30.8737 31.5996 31.3089 31.4492 31.6279 31.1484C31.9469 30.8522 32.1064 30.4147 32.1064 29.8359V29.3369C31.6279 29.8701 30.9899 30.1367 30.1924 30.1367C29.3265 30.1367 28.6178 29.7926 28.0664 29.1045C27.5195 28.4163 27.2461 27.4639 27.2461 26.2471ZM28.9004 26.3906C28.9004 27.1335 29.0508 27.7191 29.3516 28.1475C29.6569 28.5713 30.0785 28.7832 30.6162 28.7832C31.2861 28.7832 31.7829 28.4961 32.1064 27.9219V24.668C31.792 24.1074 31.2998 23.8271 30.6299 23.8271C30.083 23.8271 29.6569 24.0436 29.3516 24.4766C29.0508 24.9095 28.9004 25.5475 28.9004 26.3906ZM38.7373 30.1367C37.6846 30.1367 36.8301 29.8063 36.1738 29.1455C35.5221 28.4801 35.1963 27.596 35.1963 26.4932V26.2881C35.1963 25.5498 35.3376 24.8913 35.6201 24.3125C35.9072 23.7292 36.3083 23.2757 36.8232 22.9521C37.3382 22.6286 37.9124 22.4668 38.5459 22.4668C39.5531 22.4668 40.3301 22.7881 40.877 23.4307C41.4284 24.0732 41.7041 24.9824 41.7041 26.1582V26.8281H36.8711C36.9212 27.4388 37.124 27.9219 37.4795 28.2773C37.8395 28.6328 38.2907 28.8105 38.833 28.8105C39.5941 28.8105 40.2139 28.5029 40.6924 27.8877L41.5879 28.7422C41.2917 29.1842 40.8952 29.5283 40.3984 29.7744C39.9062 30.016 39.3525 30.1367 38.7373 30.1367ZM38.5391 23.7998C38.0833 23.7998 37.7142 23.9593 37.4316 24.2783C37.1536 24.5973 36.9759 25.0417 36.8984 25.6113H40.0635V25.4883C40.027 24.9323 39.8789 24.513 39.6191 24.2305C39.3594 23.9434 38.9993 23.7998 38.5391 23.7998Z",
    "pentagon_tablestage":"M30 0L60 24.375L48.75 60H11.25L0 24.375L30 0Z,M18.2139 30.4365C18.2139 29.999 18.0589 29.6618 17.749 29.4248C17.4437 29.1878 16.89 28.9486 16.0879 28.707C15.2858 28.4655 14.6478 28.1966 14.1738 27.9004C13.2669 27.3307 12.8135 26.5879 12.8135 25.6719C12.8135 24.8698 13.1393 24.209 13.791 23.6895C14.4473 23.1699 15.2972 22.9102 16.3408 22.9102C17.0335 22.9102 17.651 23.0378 18.1934 23.293C18.7357 23.5482 19.1618 23.9128 19.4717 24.3867C19.7816 24.8561 19.9365 25.3779 19.9365 25.9521H18.2139C18.2139 25.4326 18.0498 25.027 17.7217 24.7354C17.3981 24.4391 16.9333 24.291 16.3271 24.291C15.762 24.291 15.3223 24.4118 15.0078 24.6533C14.6979 24.8949 14.543 25.2321 14.543 25.665C14.543 26.0296 14.7116 26.335 15.0488 26.5811C15.3861 26.8226 15.9421 27.0596 16.7168 27.292C17.4915 27.5199 18.1136 27.7819 18.583 28.0781C19.0524 28.3698 19.3965 28.707 19.6152 29.0898C19.834 29.4681 19.9434 29.9124 19.9434 30.4229C19.9434 31.2523 19.6243 31.9131 18.9863 32.4053C18.3529 32.8929 17.4915 33.1367 16.4023 33.1367C15.6823 33.1367 15.0192 33.0046 14.4131 32.7402C13.8115 32.4714 13.3421 32.1022 13.0049 31.6328C12.6722 31.1634 12.5059 30.6165 12.5059 29.9922H14.2354C14.2354 30.5573 14.4222 30.9948 14.7959 31.3047C15.1696 31.6146 15.7051 31.7695 16.4023 31.7695C17.0039 31.7695 17.4551 31.6488 17.7559 31.4072C18.0612 31.1611 18.2139 30.8376 18.2139 30.4365ZM23.3818 23.8057V25.6035H24.6875V26.834H23.3818V30.9629C23.3818 31.2454 23.4365 31.4505 23.5459 31.5781C23.6598 31.7012 23.8604 31.7627 24.1475 31.7627C24.3389 31.7627 24.5326 31.7399 24.7285 31.6943V32.9795C24.3503 33.0843 23.9857 33.1367 23.6348 33.1367C22.3587 33.1367 21.7207 32.4326 21.7207 31.0244V26.834H20.5039V25.6035H21.7207V23.8057H23.3818ZM30.3818 33C30.3089 32.8587 30.2451 32.6286 30.1904 32.3096C29.6618 32.861 29.0146 33.1367 28.249 33.1367C27.5062 33.1367 26.9001 32.9248 26.4307 32.501C25.9613 32.0771 25.7266 31.5531 25.7266 30.9287C25.7266 30.1403 26.0182 29.5365 26.6016 29.1172C27.1895 28.6934 28.028 28.4814 29.1172 28.4814H30.1357V27.9961C30.1357 27.6133 30.0286 27.3079 29.8145 27.0801C29.6003 26.8477 29.2744 26.7314 28.8369 26.7314C28.4587 26.7314 28.1488 26.8271 27.9072 27.0186C27.6657 27.2054 27.5449 27.4447 27.5449 27.7363H25.8838C25.8838 27.3307 26.0182 26.9525 26.2871 26.6016C26.556 26.2461 26.9206 25.9681 27.3809 25.7676C27.8457 25.5671 28.363 25.4668 28.9326 25.4668C29.7985 25.4668 30.4889 25.6855 31.0039 26.123C31.5189 26.556 31.7832 27.1667 31.7969 27.9551V31.291C31.7969 31.9564 31.8903 32.4873 32.0771 32.8838V33H30.3818ZM28.5566 31.8037C28.8848 31.8037 29.1924 31.724 29.4795 31.5645C29.7712 31.4049 29.9899 31.1908 30.1357 30.9219V29.5273H29.2402C28.625 29.5273 28.1624 29.6344 27.8525 29.8486C27.5426 30.0628 27.3877 30.3659 27.3877 30.7578C27.3877 31.0768 27.4925 31.332 27.7021 31.5234C27.9163 31.7103 28.2012 31.8037 28.5566 31.8037ZM33.2461 29.2471C33.2461 28.0986 33.515 27.1826 34.0527 26.499C34.5951 25.8109 35.3128 25.4668 36.2061 25.4668C37.0492 25.4668 37.7122 25.7607 38.1953 26.3486L38.2705 25.6035H39.7676V32.7744C39.7676 33.7451 39.4645 34.5107 38.8584 35.0713C38.2568 35.6318 37.4434 35.9121 36.418 35.9121C35.8757 35.9121 35.3447 35.7982 34.8252 35.5703C34.3102 35.347 33.9183 35.0531 33.6494 34.6885L34.4355 33.6904C34.946 34.2965 35.5749 34.5996 36.3223 34.5996C36.8737 34.5996 37.3089 34.4492 37.6279 34.1484C37.9469 33.8522 38.1064 33.4147 38.1064 32.8359V32.3369C37.6279 32.8701 36.9899 33.1367 36.1924 33.1367C35.3265 33.1367 34.6178 32.7926 34.0664 32.1045C33.5195 31.4163 33.2461 30.4639 33.2461 29.2471ZM34.9004 29.3906C34.9004 30.1335 35.0508 30.7191 35.3516 31.1475C35.6569 31.5713 36.0785 31.7832 36.6162 31.7832C37.2861 31.7832 37.7829 31.4961 38.1064 30.9219V27.668C37.792 27.1074 37.2998 26.8271 36.6299 26.8271C36.083 26.8271 35.6569 27.0436 35.3516 27.4766C35.0508 27.9095 34.9004 28.5475 34.9004 29.3906ZM44.7373 33.1367C43.6846 33.1367 42.8301 32.8063 42.1738 32.1455C41.5221 31.4801 41.1963 30.596 41.1963 29.4932V29.2881C41.1963 28.5498 41.3376 27.8913 41.6201 27.3125C41.9072 26.7292 42.3083 26.2757 42.8232 25.9521C43.3382 25.6286 43.9124 25.4668 44.5459 25.4668C45.5531 25.4668 46.3301 25.7881 46.877 26.4307C47.4284 27.0732 47.7041 27.9824 47.7041 29.1582V29.8281H42.8711C42.9212 30.4388 43.124 30.9219 43.4795 31.2773C43.8395 31.6328 44.2907 31.8105 44.833 31.8105C45.5941 31.8105 46.2139 31.5029 46.6924 30.8877L47.5879 31.7422C47.2917 32.1842 46.8952 32.5283 46.3984 32.7744C45.9062 33.016 45.3525 33.1367 44.7373 33.1367ZM44.5391 26.7998C44.0833 26.7998 43.7142 26.9593 43.4316 27.2783C43.1536 27.5973 42.9759 28.0417 42.8984 28.6113H46.0635V28.4883C46.027 27.9323 45.8789 27.513 45.6191 27.2305C45.3594 26.9434 44.9993 26.7998 44.5391 26.7998Z",
    "hexagon_tablestage":"M32.1429 0.502406C31.4913 0.173274 30.7523 0 30 0C29.2477 0 28.5087 0.173274 27.8571 0.502406L2.14286 13.9162C1.49136 14.2453 0.950353 14.7187 0.574204 15.2888C0.198055 15.8588 1.91109e-05 16.5055 0 17.1637V42.8363C1.91109e-05 43.4945 0.198055 44.1412 0.574204 44.7112C0.950353 45.2813 1.49136 45.7547 2.14286 46.0838L27.8571 59.4976C28.5087 59.8267 29.2477 60 30 60C30.7523 60 31.4913 59.8267 32.1429 59.4976L57.8571 46.0838C58.5086 45.7547 59.0496 45.2813 59.4258 44.7112C59.8019 44.1412 60 43.4945 60 42.8363V17.1637C60 16.5055 59.8019 15.8588 59.4258 15.2888C59.0496 14.7187 58.5086 14.2453 57.8571 13.9162L32.1429 0.502406Z,M19.2139 30.4365C19.2139 29.999 19.0589 29.6618 18.749 29.4248C18.4437 29.1878 17.89 28.9486 17.0879 28.707C16.2858 28.4655 15.6478 28.1966 15.1738 27.9004C14.2669 27.3307 13.8135 26.5879 13.8135 25.6719C13.8135 24.8698 14.1393 24.209 14.791 23.6895C15.4473 23.1699 16.2972 22.9102 17.3408 22.9102C18.0335 22.9102 18.651 23.0378 19.1934 23.293C19.7357 23.5482 20.1618 23.9128 20.4717 24.3867C20.7816 24.8561 20.9365 25.3779 20.9365 25.9521H19.2139C19.2139 25.4326 19.0498 25.027 18.7217 24.7354C18.3981 24.4391 17.9333 24.291 17.3271 24.291C16.762 24.291 16.3223 24.4118 16.0078 24.6533C15.6979 24.8949 15.543 25.2321 15.543 25.665C15.543 26.0296 15.7116 26.335 16.0488 26.5811C16.3861 26.8226 16.9421 27.0596 17.7168 27.292C18.4915 27.5199 19.1136 27.7819 19.583 28.0781C20.0524 28.3698 20.3965 28.707 20.6152 29.0898C20.834 29.4681 20.9434 29.9124 20.9434 30.4229C20.9434 31.2523 20.6243 31.9131 19.9863 32.4053C19.3529 32.8929 18.4915 33.1367 17.4023 33.1367C16.6823 33.1367 16.0192 33.0046 15.4131 32.7402C14.8115 32.4714 14.3421 32.1022 14.0049 31.6328C13.6722 31.1634 13.5059 30.6165 13.5059 29.9922H15.2354C15.2354 30.5573 15.4222 30.9948 15.7959 31.3047C16.1696 31.6146 16.7051 31.7695 17.4023 31.7695C18.0039 31.7695 18.4551 31.6488 18.7559 31.4072C19.0612 31.1611 19.2139 30.8376 19.2139 30.4365ZM24.3818 23.8057V25.6035H25.6875V26.834H24.3818V30.9629C24.3818 31.2454 24.4365 31.4505 24.5459 31.5781C24.6598 31.7012 24.8604 31.7627 25.1475 31.7627C25.3389 31.7627 25.5326 31.7399 25.7285 31.6943V32.9795C25.3503 33.0843 24.9857 33.1367 24.6348 33.1367C23.3587 33.1367 22.7207 32.4326 22.7207 31.0244V26.834H21.5039V25.6035H22.7207V23.8057H24.3818ZM31.3818 33C31.3089 32.8587 31.2451 32.6286 31.1904 32.3096C30.6618 32.861 30.0146 33.1367 29.249 33.1367C28.5062 33.1367 27.9001 32.9248 27.4307 32.501C26.9613 32.0771 26.7266 31.5531 26.7266 30.9287C26.7266 30.1403 27.0182 29.5365 27.6016 29.1172C28.1895 28.6934 29.028 28.4814 30.1172 28.4814H31.1357V27.9961C31.1357 27.6133 31.0286 27.3079 30.8145 27.0801C30.6003 26.8477 30.2744 26.7314 29.8369 26.7314C29.4587 26.7314 29.1488 26.8271 28.9072 27.0186C28.6657 27.2054 28.5449 27.4447 28.5449 27.7363H26.8838C26.8838 27.3307 27.0182 26.9525 27.2871 26.6016C27.556 26.2461 27.9206 25.9681 28.3809 25.7676C28.8457 25.5671 29.363 25.4668 29.9326 25.4668C30.7985 25.4668 31.4889 25.6855 32.0039 26.123C32.5189 26.556 32.7832 27.1667 32.7969 27.9551V31.291C32.7969 31.9564 32.8903 32.4873 33.0771 32.8838V33H31.3818ZM29.5566 31.8037C29.8848 31.8037 30.1924 31.724 30.4795 31.5645C30.7712 31.4049 30.9899 31.1908 31.1357 30.9219V29.5273H30.2402C29.625 29.5273 29.1624 29.6344 28.8525 29.8486C28.5426 30.0628 28.3877 30.3659 28.3877 30.7578C28.3877 31.0768 28.4925 31.332 28.7021 31.5234C28.9163 31.7103 29.2012 31.8037 29.5566 31.8037ZM34.2461 29.2471C34.2461 28.0986 34.515 27.1826 35.0527 26.499C35.5951 25.8109 36.3128 25.4668 37.2061 25.4668C38.0492 25.4668 38.7122 25.7607 39.1953 26.3486L39.2705 25.6035H40.7676V32.7744C40.7676 33.7451 40.4645 34.5107 39.8584 35.0713C39.2568 35.6318 38.4434 35.9121 37.418 35.9121C36.8757 35.9121 36.3447 35.7982 35.8252 35.5703C35.3102 35.347 34.9183 35.0531 34.6494 34.6885L35.4355 33.6904C35.946 34.2965 36.5749 34.5996 37.3223 34.5996C37.8737 34.5996 38.3089 34.4492 38.6279 34.1484C38.9469 33.8522 39.1064 33.4147 39.1064 32.8359V32.3369C38.6279 32.8701 37.9899 33.1367 37.1924 33.1367C36.3265 33.1367 35.6178 32.7926 35.0664 32.1045C34.5195 31.4163 34.2461 30.4639 34.2461 29.2471ZM35.9004 29.3906C35.9004 30.1335 36.0508 30.7191 36.3516 31.1475C36.6569 31.5713 37.0785 31.7832 37.6162 31.7832C38.2861 31.7832 38.7829 31.4961 39.1064 30.9219V27.668C38.792 27.1074 38.2998 26.8271 37.6299 26.8271C37.083 26.8271 36.6569 27.0436 36.3516 27.4766C36.0508 27.9095 35.9004 28.5475 35.9004 29.3906ZM45.7373 33.1367C44.6846 33.1367 43.8301 32.8063 43.1738 32.1455C42.5221 31.4801 42.1963 30.596 42.1963 29.4932V29.2881C42.1963 28.5498 42.3376 27.8913 42.6201 27.3125C42.9072 26.7292 43.3083 26.2757 43.8232 25.9521C44.3382 25.6286 44.9124 25.4668 45.5459 25.4668C46.5531 25.4668 47.3301 25.7881 47.877 26.4307C48.4284 27.0732 48.7041 27.9824 48.7041 29.1582V29.8281H43.8711C43.9212 30.4388 44.124 30.9219 44.4795 31.2773C44.8395 31.6328 45.2907 31.8105 45.833 31.8105C46.5941 31.8105 47.2139 31.5029 47.6924 30.8877L48.5879 31.7422C48.2917 32.1842 47.8952 32.5283 47.3984 32.7744C46.9062 33.016 46.3525 33.1367 45.7373 33.1367ZM45.5391 26.7998C45.0833 26.7998 44.7142 26.9593 44.4316 27.2783C44.1536 27.5973 43.9759 28.0417 43.8984 28.6113H47.0635V28.4883C47.027 27.9323 46.8789 27.513 46.6191 27.2305C46.3594 26.9434 45.9993 26.7998 45.5391 26.7998Z",
    "rectangle_table":"M0.25 2.25H20.25V18.75H0.25V2.25Z",
    "noShape":"",
    "elipsce_table":"M5.5 0C2.0305 0 0 2.235 0 5.5V11C0 14.4855 1.9295 16.5 5.5 16.5H14.5C18.2 16.5 20 14.4855 20 11V5.5C20 2.015 17.9695 0 14.5 0H5.5Z",
    "l-shaped-table":"M110 0H200V200H0V112H110V34V0Z",
    "rectangle_tablewithoutchair":"M26.1 63H99.9C100.987 63 102.03 62.73 102.799 62.2495C103.568 61.7689 104 61.1171 104 60.4375V24.5625C104 23.8829 103.568 23.2311 102.799 22.7505C102.03 22.27 100.987 22 99.9 22H26.1C25.0126 22 23.9698 22.27 23.2009 22.7505C22.432 23.2311 22 23.8829 22 24.5625V60.4375C22 61.1171 22.432 61.7689 23.2009 62.2495C23.9698 62.73 25.0126 63 26.1 63Z,M10 48C12.7614 48 15 45.7614 15 43C15 40.2386 12.7614 38 10 38C7.23858 38 5 40.2386 5 43C5 45.7614 7.23858 48 10 48Z,M116 48C118.761 48 121 45.7614 121 43C121 40.2386 118.761 38 116 38C113.239 38 111 40.2386 111 43C111 45.7614 113.239 48 116 48Z,M38 78C40.7614 78 43 75.7614 43 73C43 70.2386 40.7614 68 38 68C35.2386 68 33 70.2386 33 73C33 75.7614 35.2386 78 38 78Z,M63 78C65.7614 78 68 75.7614 68 73C68 70.2386 65.7614 68 63 68C60.2386 68 58 70.2386 58 73C58 75.7614 60.2386 78 63 78Z,M88 78C90.7614 78 93 75.7614 93 73C93 70.2386 90.7614 68 88 68C85.2386 68 83 70.2386 83 73C83 75.7614 85.2386 78 88 78Z,M63 17C65.7614 17 68 14.7614 68 12C68 9.23858 65.7614 7 63 7C60.2386 7 58 9.23858 58 12C58 14.7614 60.2386 17 63 17Z,M88 17C90.7614 17 93 14.7614 93 12C93 9.23858 90.7614 7 88 7C85.2386 7 83 9.23858 83 12C83 14.7614 85.2386 17 88 17Z,M38 17C40.7614 17 43 14.7614 43 12C43 9.23858 40.7614 7 38 7C35.2386 7 33 9.23858 33 12C33 14.7614 35.2386 17 38 17Z",
    "circle_tablewithoutchair":"M10 57C12.7614 57 15 54.7614 15 52C15 49.2386 12.7614 47 10 47C7.23858 47 5 49.2386 5 52C5 54.7614 7.23858 57 10 57Z,M96 57C98.7614 57 101 54.7614 101 52C101 49.2386 98.7614 47 96 47C93.2386 47 91 49.2386 91 52C91 54.7614 93.2386 57 96 57Z,M53 100C55.7614 100 58 97.7614 58 95C58 92.2386 55.7614 90 53 90C50.2386 90 48 92.2386 48 95C48 97.7614 50.2386 100 53 100Z,M53 14C55.7614 14 58 11.7614 58 9C58 6.23858 55.7614 4 53 4C50.2386 4 48 6.23858 48 9C48 11.7614 50.2386 14 53 14Z,M23 27C25.7614 27 28 24.7614 28 22C28 19.2386 25.7614 17 23 17C20.2386 17 18 19.2386 18 22C18 24.7614 20.2386 27 23 27Z,M83 27C85.7614 27 88 24.7614 88 22C88 19.2386 85.7614 17 83 17C80.2386 17 78 19.2386 78 22C78 24.7614 80.2386 27 83 27Z,M83 87C85.7614 87 88 84.7614 88 82C88 79.2386 85.7614 77 83 77C80.2386 77 78 79.2386 78 82C78 84.7614 80.2386 87 83 87Z,M23 87C25.7614 87 28 84.7614 28 82C28 79.2386 25.7614 77 23 77C20.2386 77 18 79.2386 18 82C18 84.7614 20.2386 87 23 87Z,M53 87C72.33 87 88 71.33 88 52C88 32.67 72.33 17 53 17C33.67 17 18 32.67 18 52C18 71.33 33.67 87 53 87Z",
    "corner_tablewithoutchair":"M9.55 35H55.45C56.1263 35 56.7749 34.8617 57.2531 34.6156C57.7313 34.3694 58 34.0356 58 33.6875V15.3125C58 14.9644 57.7313 14.6306 57.2531 14.3844C56.7749 14.1383 56.1263 14 55.45 14H9.55C8.8737 14 8.2251 14.1383 7.74688 14.3844C7.26866 14.6306 7 14.9644 7 15.3125V33.6875C7 34.0356 7.26866 34.3694 7.74688 34.6156C8.2251 34.8617 8.8737 35 9.55 35Z,M58 62.45V16.55C58 15.8737 57.8617 15.2251 57.6156 14.7469C57.3694 14.2687 57.0356 14 56.6875 14H38.3125C37.9644 14 37.6306 14.2687 37.3844 14.7469C37.1383 15.2251 37 15.8737 37 16.55V62.45C37 63.1263 37.1383 63.7749 37.3844 64.2531C37.6306 64.7313 37.9644 65 38.3125 65H56.6875C57.0356 65 57.3694 64.7313 57.6156 64.2531C57.8617 63.7749 58 63.1263 58 62.45Z,M24 44C26.2091 44 28 42.2091 28 40C28 37.7909 26.2091 36 24 36C21.7909 36 20 37.7909 20 40C20 42.2091 21.7909 44 24 44Z,M32 54C34.2091 54 36 52.2091 36 50C36 47.7909 34.2091 46 32 46C29.7909 46 28 47.7909 28 50C28 52.2091 29.7909 54 32 54Z,M24 12C26.2091 12 28 10.2091 28 8C28 5.79086 26.2091 4 24 4C21.7909 4 20 5.79086 20 8C20 10.2091 21.7909 12 24 12Z,M40 12C42.2091 12 44 10.2091 44 8C44 5.79086 42.2091 4 40 4C37.7909 4 36 5.79086 36 8C36 10.2091 37.7909 12 40 12Z,M64 35C66.2091 35 68 33.2091 68 31C68 28.7909 66.2091 27 64 27C61.7909 27 60 28.7909 60 31C60 33.2091 61.7909 35 64 35Z,M64 49C66.2091 49 68 47.2091 68 45C68 42.7909 66.2091 41 64 41C61.7909 41 60 42.7909 60 45C60 47.2091 61.7909 49 64 49Z",
    "square_tablewithoutchair":"M18.1 58H55.9C56.457 58 56.9911 57.7234 57.3849 57.2312C57.7788 56.7389 58 56.0712 58 55.375V18.625C58 17.9288 57.7788 17.2611 57.3849 16.7688C56.9911 16.2766 56.457 16 55.9 16H18.1C17.543 16 17.0089 16.2766 16.6151 16.7688C16.2212 17.2611 16 17.9288 16 18.625V55.375C16 56.0712 16.2212 56.7389 16.6151 57.2312C17.0089 57.7234 17.543 58 18.1 58Z,M37 12C39.7614 12 42 9.76142 42 7C42 4.23858 39.7614 2 37 2C34.2386 2 32 4.23858 32 7C32 9.76142 34.2386 12 37 12Z,M37 72C39.7614 72 42 69.7614 42 67C42 64.2386 39.7614 62 37 62C34.2386 62 32 64.2386 32 67C32 69.7614 34.2386 72 37 72Z,M67 42C69.7614 42 72 39.7614 72 37C72 34.2386 69.7614 32 67 32C64.2386 32 62 34.2386 62 37C62 39.7614 64.2386 42 67 42Z,M7 42C9.76142 42 12 39.7614 12 37C12 34.2386 9.76142 32 7 32C4.23858 32 2 34.2386 2 37C2 39.7614 4.23858 42 7 42Z",
    "wheelchair":"M8.03523 8.20838C8.03523 8.50857 7.91598 8.79647 7.70372 9.00873C7.49145 9.221 7.20355 9.34025 6.90336 9.34025C6.60317 9.34025 6.31527 9.221 6.103 9.00873C5.89074 8.79647 5.77148 8.50857 5.77148 8.20838V5.01913C5.77908 4.72398 5.90167 4.44347 6.11311 4.23741C6.32455 4.03134 6.60811 3.91602 6.90336 3.91602C7.1986 3.91602 7.48217 4.03134 7.69361 4.23741C7.90505 4.44347 8.02764 4.72398 8.03523 5.01913V8.20838Z,M7.70105 6.89936C7.26105 6.89936 6.9043 6.65011 6.9043 6.34311C6.9043 6.03611 7.26105 5.78711 7.70105 5.78711H9.9458C10.3858 5.78711 10.7428 6.03611 10.7428 6.34311C10.7428 6.65011 10.3858 6.89936 9.9458 6.89936H7.70105,M10.85 8.9678C10.6385 8.5883 10.7538 8.1213 11.1073 7.9248C11.4608 7.7278 11.9193 7.87505 12.1303 8.2538L13.208 10.1873C13.4195 10.5668 13.3033 11.0336 12.9503 11.2308C12.5968 11.4276 12.1388 11.28 11.9273 10.9013L10.85 8.9678Z,M13.1278 11.9043C12.8518 12.0641 12.4768 11.9306 12.2893 11.6078C12.1028 11.2851 12.1745 10.8933 12.4505 10.7338L13.8593 9.91809C14.1353 9.75834 14.5105 9.89209 14.698 10.2143C14.8845 10.5381 14.8123 10.9286 14.5365 11.0888L13.1278 11.9043Z,M6.76779 3.4809C7.40568 3.4809 7.92279 2.96379 7.92279 2.3259C7.92279 1.68801 7.40568 1.1709 6.76779 1.1709C6.1299 1.1709 5.61279 1.68801 5.61279 2.3259C5.61279 2.96379 6.1299 3.4809 6.76779 3.4809Z,M12.0901 8.49347C12.0901 8.71796 12.001 8.93326 11.8423 9.09204C11.6836 9.25082 11.4683 9.34009 11.2439 9.34022H6.97136C6.74934 9.33641 6.53771 9.24553 6.38205 9.08717C6.22639 8.92882 6.13916 8.71565 6.13916 8.4936C6.13916 8.27154 6.22639 8.05838 6.38205 7.90002C6.53771 7.74166 6.74934 7.65079 6.97136 7.64697H11.2439C11.355 7.64697 11.4651 7.66887 11.5678 7.71141C11.6705 7.75396 11.7638 7.81631 11.8423 7.89492C11.9209 7.97353 11.9833 8.06685 12.0258 8.16955C12.0683 8.27225 12.0901 8.38232 12.0901 8.49347Z,M11.2094 10.8422L11.1574 11.0597C10.7342 12.8345 9.16766 14.0747 7.34841 14.0747C5.18491 14.0747 3.42491 12.3147 3.42491 10.1512C3.42491 8.79621 4.11716 7.55471 5.27641 6.82996L5.33516 6.79346V5.79346L5.15291 5.88771C3.54441 6.71871 2.54541 8.35271 2.54541 10.1527C2.54541 12.8012 4.70016 14.956 7.34891 14.956C9.42741 14.956 11.2592 13.623 11.9069 11.6387L11.9309 11.5657L11.2094 10.8445",
    "exit":"M25.3169 24.2393H20.937V27.5205H26.0566V29H19.084V18.3359H26.0054V19.8301H20.937V22.7744H25.3169V24.2393ZM31.2349 22.1885L33.4761 18.3359H35.6147L32.3921 23.624L35.688 29H33.5273L31.2349 25.0889L28.9351 29H26.7817L30.085 23.624L26.855 18.3359H28.9937L31.2349 22.1885ZM39.0132 29H37.1675V18.3359H39.0132V29ZM48.7764 19.8301H45.4512V29H43.6128V19.8301H40.3169V18.3359H48.7764V19.8301Z,M26 42H42,M35 35L42 42L35 49",
    "toilet":"M14.6754 1.44467C14.4487 1.14973 14.1571 0.911053 13.8232 0.74721C13.4892 0.583368 13.122 0.498775 12.75 0.500013H12.3631L10.6131 7.25001H1.25V8.25001C1.25 9.70258 1.83175 11.0039 2.88803 11.9143C3.8875 12.7756 5.259 13.25 6.75 13.25H7.94137L7.69137 15.5H14V7.81376L15.1066 3.54548C15.2011 3.18574 15.2114 2.80903 15.1366 2.44466C15.0619 2.08029 14.904 1.73809 14.6754 1.44467V1.44467ZM13 14.5H8.80863L9.05863 12.25H6.75C4.10047 12.25 2.25 10.6051 2.25 8.25001H13V14.5ZM14.1386 3.29451L13.1131 7.25001H11.6462L13.1243 1.54889C13.4891 1.64781 13.8001 1.88656 13.99 2.21334C14.1799 2.54013 14.2333 2.92861 14.1387 3.29451H14.1386Z",
    "mantoilet":"M31.8875 21.775C33.4822 21.775 34.775 20.4822 34.775 18.8875C34.775 17.2928 33.4822 16 31.8875 16C30.2928 16 29 17.2928 29 18.8875C29 20.4822 30.2928 21.775 31.8875 21.775Z,M28.8 49.55C28.8 50.4131 29.3376 50.95 30.2 50.95C31.0645 50.95 31.6 50.4131 31.6 49.55V36.6H33V49.55C33 50.4117 33.5369 50.95 34.4 50.95C35.2631 50.95 35.8 50.4131 35.8 49.55V27.5H36.5V35.4198C36.5 37.0963 38.6042 37.0963 38.6 35.4198V26.9127C38.6 25.0605 37.2658 24 35.1 24H29.5C27.526 24 26 24.8533 26 26.8609V35.9C26 37.3 28.1 37.3 28.1 35.9V27.5H28.8V49.55Z",
    "womentoilet":"M31.8875 21.775C33.4822 21.775 34.775 20.4822 34.775 18.8875C34.775 17.2928 33.4822 16 31.8875 16C30.2928 16 29 17.2928 29 18.8875C29 20.4822 30.2928 21.775 31.8875 21.775Z,M39.3563 38.05L35.22 26.6841L35.1962 26.5672C35.1962 26.4013 35.3355 26.2669 35.5091 26.2669C35.6568 26.2669 35.7807 26.3656 35.8136 26.4972L38.6255 33.85C38.8124 34.2707 39.581 34.55 40.0864 34.55C40.7619 34.55 40.8319 33.2235 40.8172 33.15L38.0053 26.0751C37.761 24.4504 36.1202 23 34.2477 23H30.5832C28.7107 23 26.9488 24.4504 26.7038 26.0751L24.0179 33.2375C23.957 33.3768 24.0179 34.5941 24.7487 34.5941C25.3164 34.5941 26.0717 34.3743 26.2089 33.8724L28.9214 26.4776C28.9443 26.4178 28.9848 26.3662 29.0375 26.3298C29.0902 26.2933 29.1527 26.2736 29.2168 26.2732C29.389 26.2732 29.5283 26.4048 29.5283 26.57L29.5094 26.6757L25.4788 38.0514C25.4704 38.085 25.4788 38.8914 25.4788 38.9257C25.4788 39.1679 26.064 39.8007 26.3174 39.8007H28.9172V48.6172C28.9172 49.3452 29.5584 49.9507 30.3172 49.9507C31.076 49.9507 31.7172 49.3445 31.7172 48.6172V39.4437C31.7172 39.2456 33.1172 39.2519 33.1172 39.45V48.55C33.1172 49.278 33.7591 49.95 34.5172 49.95C35.2774 49.95 35.9172 49.2773 35.9172 48.55V39.8H38.6255C38.8789 39.8 39.3563 39.1672 39.3563 38.925C39.3563 38.869 39.3766 38.0983 39.3563 38.05Z",
    "toiletmanwomen":"M44.8875 23.775C46.4822 23.775 47.775 22.4822 47.775 20.8875C47.775 19.2928 46.4822 18 44.8875 18C43.2928 18 42 19.2928 42 20.8875C42 22.4822 43.2928 23.775 44.8875 23.775Z,M19.8875 23.775C21.4822 23.775 22.775 22.4822 22.775 20.8875C22.775 19.2928 21.4822 18 19.8875 18C18.2928 18 17 19.2928 17 20.8875C17 22.4822 18.2928 23.775 19.8875 23.775Z,M52.3563 40.05L48.22 28.6841L48.1962 28.5672C48.1962 28.4013 48.3355 28.2669 48.5091 28.2669C48.6568 28.2669 48.7807 28.3656 48.8136 28.4972L51.6255 35.85C51.8124 36.2707 52.581 36.55 53.0864 36.55C53.7619 36.55 53.8319 35.2235 53.8172 35.15L51.0053 28.0751C50.761 26.4504 49.1202 25 47.2477 25H43.5832C41.7107 25 39.9488 26.4504 39.7038 28.0751L37.0179 35.2375C36.957 35.3768 37.0179 36.5941 37.7487 36.5941C38.3164 36.5941 39.0717 36.3743 39.2089 35.8724L41.9214 28.4776C41.9443 28.4178 41.9848 28.3662 42.0375 28.3298C42.0902 28.2933 42.1527 28.2736 42.2168 28.2732C42.389 28.2732 42.5283 28.4048 42.5283 28.57L42.5094 28.6757L38.4788 40.0514C38.4704 40.085 38.4788 40.8914 38.4788 40.9257C38.4788 41.1679 39.064 41.8007 39.3174 41.8007H41.9172V50.6172C41.9172 51.3452 42.5584 51.9507 43.3172 51.9507C44.076 51.9507 44.7172 51.3445 44.7172 50.6172V41.4437C44.7172 41.2456 46.1172 41.2519 46.1172 41.45V50.55C46.1172 51.278 46.7591 51.95 47.5172 51.95C48.2774 51.95 48.9172 51.2773 48.9172 50.55V41.8H51.6255C51.8789 41.8 52.3563 41.1672 52.3563 40.925C52.3563 40.869 52.3766 40.0983 52.3563 40.05Z,M16.8 50.55C16.8 51.4131 17.3376 51.95 18.2 51.95C19.0645 51.95 19.6 51.4131 19.6 50.55V37.6H21V50.55C21 51.4117 21.5369 51.95 22.4 51.95C23.2631 51.95 23.8 51.4131 23.8 50.55V28.5H24.5V36.4198C24.5 38.0963 26.6042 38.0963 26.6 36.4198V27.9127C26.6 26.0605 25.2658 25 23.1 25H17.5C15.526 25 14 25.8533 14 27.8609V36.9C14 38.3 16.1 38.3 16.1 36.9V28.5H16.8V50.55Z"
}
function drawShapes() {
    if(selectedmenuoption == "addstageorshpe") {
        var tablescalex;
        var tablescaley;
        var borderwidth;
        var  y, x;
        if(scroll == 0) {
            y = shapeaddE.evt.screenY - 100;
        }
        else if(scroll > 0) {
            y = shapeaddE.evt.screenY + scroll - 100;
        }
        // if( y > 600) {
        //     y = 600;
        // }
        if( y > 2100) {
            y = 2100;
        }
        if(ml > 0) {
            x = shapeaddE.evt.screenX  + ml;
        }
        else {
            x = shapeaddE.evt.screenX; 
        }
        var checkclass = $("body").hasClass('sidebar-collapse');
        if(checkclass == false) {
            x = x - 230;
        }
        if( x > 2100) {
            x = 2100;
        }
        var group = new Konva.Group({
            x: x,
            y: y,
            draggable: true,
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            type: "stageshape",
            name:"rect",
            offset: {
              x: 50,
              y: 25,
            },
            dragBoundFunc: function (pos) {
                if( pos.x < 2100 ){
                    var newx = pos.x < 100 ? 100 : pos.x;
                    var newY;
                    newY = pos.y < 100 ? 100 : pos.y ;
                    if( pos.y > 1800 ) {
                        // console.log("shiftKey");
                        newY = pos.y >  2100 ? 2100 : pos.y ;
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                    else if( pos.y < 1900 ) {
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                 }
                if( pos.x > 1800){
                    var newx = pos.x > 2050 ? 2050 : pos.x;
                    var newY 
                    newY = pos.y < 100 ? 100 : pos.y;
                    if( pos.y > 1800 ) {
                        newY = pos.y > 2100 ? 2100 : pos.y ;
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                    else {
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                }
            },
        });
        tablescalex = 1.5;
        tablescaley = 1.5;
        borderwidth = 0.5;
        var selectedpath  = icons[selectedtableshape];
        var pathfillcolor =  $('#stagefillcolor').val();
        //var pathbordercolor =  $('#stagebordercolor').val();
        var path = new Konva.Path({
            fill: 'brown',
            data:  selectedpath,
            fill:pathfillcolor,
            stroke: '#333',
            width:'100',
            height:'100',
            radius:'100',
            type: "stageshape",
            //draggable:true,
            strokeWidth: borderwidth,
            name:'rect',
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            scale: {
                x: tablescalex,
                y: tablescaley,
            },
        });
        var stagename = $("#stagename").val();
        var stagel = new Konva.Text({
            text: stagename,
            fontFamily: 'roboto',
            fontSize: 18,
            padding: 0,
            fill: '#fff',
            x: 25,
            y: -23,
            zIndex: 3,
            type:'stage',
            gearorname: 'name',
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idstagename',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id'
        });
        var stagecharactercount = stagename.length;
        var namelabelboxwidth = 100;
        if(stagecharactercount > 6) {
            namelabelboxwidth = 0;
            var c = Count(stagename);
            namelabelboxwidth = c[0] * 16 + c[1] * 11 + c[2] * 12 + c[3] * 16 + 10;
        }
        else {
            namelabelboxwidth = 100;
        }
        var rect = new Konva.Rect({
            x: 0,
            y: -25,
            width: namelabelboxwidth,
            height: 20,
            fill: '#0d66b6',
            stroke: '#0d66b6',
            strokeWidth: 4,
            type:'stage',
            id:shapeaddE.evt.screenX + shapeaddE.evt.screenY +'idgear',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            cc: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            selectedtableshape: selectedtableshape,
            stagename: stagename,
        });
        var gearicon = new Konva.Path({
            x: 0,
            y: -27,
            width: 10,
            height: 10,
            radius: 10,
            scale: {
                x: 0.7,
                y: 0.7,
            },
            fill:'#fff',
            data: 'M17 19.125C18.1736 19.125 19.125 18.1736 19.125 17C19.125 15.8264 18.1736 14.875 17 14.875C15.8264 14.875 14.875 15.8264 14.875 17C14.875 18.1736 15.8264 19.125 17 19.125Z,M31.0108 14.6197L29.8917 11.0497C29.7708 10.6371 29.5681 10.253 29.2956 9.92048C29.0232 9.58792 28.6865 9.31364 28.3058 9.114C27.925 8.91436 27.5079 8.79345 27.0794 8.75849C26.6509 8.72353 26.2197 8.77523 25.8117 8.91051L25.33 9.06634C24.9527 9.19107 24.5508 9.22272 24.1585 9.15858C23.7663 9.09445 23.3954 8.93643 23.0775 8.69801L22.9217 8.58467C22.6114 8.3472 22.3613 8.04014 22.1915 7.68825C22.0217 7.33636 21.937 6.94949 21.9442 6.55884V6.16217C21.951 5.27254 21.6046 4.41655 20.9808 3.78217C20.6841 3.48248 20.3312 3.24435 19.9422 3.08147C19.5532 2.91858 19.1359 2.83414 18.7142 2.83301H15.1017C14.2349 2.84421 13.4077 3.19736 12.8001 3.81558C12.1925 4.4338 11.8537 5.26703 11.8575 6.13384V6.47384C11.8561 6.88506 11.7625 7.29073 11.5835 7.66096C11.4045 8.03118 11.1448 8.35653 10.8233 8.61301L10.6392 8.75467C10.2841 9.0233 9.86873 9.20115 9.42926 9.27275C8.98979 9.34434 8.53949 9.30753 8.11749 9.16551C7.72991 9.03138 7.31915 8.9773 6.91006 9.00652C6.50097 9.03574 6.10207 9.14766 5.73749 9.33551C5.3579 9.52391 5.02114 9.78841 4.74817 10.1126C4.47521 10.4367 4.27187 10.8136 4.15082 11.2197L2.98915 14.903C2.71976 15.7335 2.78885 16.6366 3.18141 17.4165C3.57397 18.1963 4.25831 18.7897 5.08582 19.068H5.31249C5.69422 19.2111 6.03684 19.4421 6.31252 19.7424C6.58821 20.0427 6.78919 20.4038 6.89916 20.7963L6.98415 21.023C7.14208 21.4567 7.19489 21.9217 7.13825 22.3797C7.08161 22.8378 6.91713 23.2759 6.65832 23.658C6.13446 24.3714 5.9135 25.2628 6.04349 26.1383C6.17349 27.0138 6.64394 27.8026 7.35249 28.333L10.285 30.5572C10.8403 30.9609 11.511 31.1745 12.1975 31.1663C12.3812 31.1843 12.5663 31.1843 12.75 31.1663C13.1751 31.084 13.5791 30.916 13.9371 30.6724C14.2951 30.4289 14.5998 30.1149 14.8325 29.7497L15.1583 29.2822C15.3869 28.9543 15.6893 28.6848 16.0412 28.4953C16.3931 28.3058 16.7846 28.2017 17.1842 28.1913C17.6029 28.181 18.0174 28.277 18.389 28.4702C18.7605 28.6634 19.0771 28.9477 19.3092 29.2963L19.4792 29.5372C19.7207 29.8966 20.0333 30.2029 20.3976 30.437C20.762 30.6711 21.1704 30.8282 21.5977 30.8985C22.025 30.9689 22.4623 30.951 22.8824 30.846C23.3026 30.741 23.6968 30.5511 24.0408 30.288L26.9167 28.1347C27.5966 27.6066 28.0488 26.8384 28.1805 25.9876C28.3122 25.1368 28.1135 24.2678 27.625 23.5588L27.2567 23.0205C27.0352 22.6783 26.8901 22.2923 26.8315 21.8889C26.7728 21.4855 26.8018 21.0742 26.9167 20.683C27.0337 20.2643 27.2509 19.8804 27.5496 19.5644C27.8482 19.2485 28.2193 19.01 28.6308 18.8697L28.9142 18.7705C29.734 18.486 30.4111 17.8939 30.8024 17.1193C31.1936 16.3447 31.2684 15.4484 31.0108 14.6197V14.6197ZM17 21.958C16.0193 21.958 15.0607 21.6672 14.2453 21.1224C13.4299 20.5775 12.7944 19.8032 12.4191 18.8971C12.0438 17.9911 11.9456 16.9942 12.1369 16.0324C12.3282 15.0705 12.8005 14.187 13.4939 13.4936C14.1874 12.8002 15.0708 12.3279 16.0327 12.1366C16.9945 11.9453 17.9914 12.0435 18.8975 12.4188C19.8035 12.7941 20.5779 13.4296 21.1227 14.245C21.6675 15.0604 21.9583 16.019 21.9583 16.9997C21.9583 18.3147 21.4359 19.5759 20.5061 20.5057C19.5762 21.4356 18.315 21.958 17 21.958V21.958Z',
            type:'stage',
            id:shapeaddE.evt.screenX + shapeaddE.evt.screenY +'idgear',
            brightness:'-1',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            cc: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            showstageeditor : 'yes',
            selectedtableshape: selectedtableshape,
            stagename: stagename,
            pathfillcolor:pathfillcolor
        });
        group.add(path);
        group.add(rect);
        group.add(gearicon);
        group.add(stagel);
        layer.add(group);
        stage.add(layer);
        selectedmenuoption = '';
    }
    if(selectedmenuoption == "other") {
        var tablescalex;
        var tablescaley;
        var  y, x;
        if(scroll == 0) {
            y = shapeaddE.evt.screenY - 100;
        }
        else if(scroll > 0) {
            y = shapeaddE.evt.screenY + scroll - 100;
        }
        // if( y > 600) {
        //     y = 600;
        // }
        if( y > 2100) {
            y = 2100;
        }
        if(ml > 0) {
            x = shapeaddE.evt.screenX  + ml;
        }
        else {
            x = shapeaddE.evt.screenX; 
        }
        var checkclass = $("body").hasClass('sidebar-collapse');
        if(checkclass == false) {
            x = x - 230;
        }
        if( x > 2100) {
            x = 2100;
        }
        var group = new Konva.Group({
            x: x,
            y: y,
            draggable: true,
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            type: "other",
            offset: {
              x: 50,
              y: 25,
            },
            dragBoundFunc: function (pos) {
                if( pos.x < 2100 ){
                    var newx = pos.x < 100 ? 100 : pos.x;
                    var newY;
                    newY = pos.y < 100 ? 100 : pos.y ;
                    if( pos.y > 1800 ) {
                        // console.log("shiftKey");
                        newY = pos.y >  2100 ? 2100 : pos.y ;
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                    else if( pos.y < 1900 ) {
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                 }
                if( pos.x > 1800){
                    var newx = pos.x > 2050 ? 2050 : pos.x;
                    var newY 
                    newY = pos.y < 100 ? 100 : pos.y;
                    if( pos.y > 1800 ) {
                        newY = pos.y > 2100 ? 2100 : pos.y ;
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                    else {
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                }
            },
        });
        selectedtableshape = $('.otherimage img.selected').attr('data-other');
        var selectedpath  = icons[selectedtableshape];
        if(selectedtableshape == "wheelchair") {
            var path = new Konva.Path({
                x:8,
                y:12,
                fill: 'brown',
                data:  selectedpath,
                fill:"#1B75BB",
                stroke: '#1B75BB',
                width:'100',
                height:'100',
                radius:'100',
                type: "stageshape",
                type: "other",
                //draggable:true,
                //name:'rect',
                strokeWidth: 1,
                id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
                scale: {
                    x: 2,
                    y: 2,
                },
            });
        }
        if(selectedtableshape == "exit") {
            var path = new Konva.Path({
                x:-8,
                y: 0,
                //fill: 'brown',
                data:  selectedpath,
                fill:"#1B75BBf",
                stroke: '#1B75BB',
                width:'100',
                height:'100',
                radius:'100',
                type: "stageshape",
                strokeWidth: 2,
                stroke:'#1B75BB',
                type: "other",
                //draggable:true,
                strokeWidth: 1,
                //name:'rect',
                id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
                scale: {
                    x: 1,
                    y: 1,
                },
            });
        }
        if(selectedtableshape == "mantoilet" || selectedtableshape == "womentoilet" || selectedtableshape == "toiletmanwomen") {
            var path = new Konva.Path({
                x:-8,
                y: 0,
                fill: 'brown',
                data:  selectedpath,
                fill:"#1B75BB",
                stroke: '#fff',
                width:'100',
                height:'100',
                radius:'100',
                type: "stageshape",
                stroke:'#fff',
                type: "other",
                //draggable:true,
                strokeWidth: 1,
                //name:'rect',
                id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
                scale: {
                    x: 1,
                    y: 1,
                },
            });
        }
        // if(selectedtableshape == "wheelchair") {
        //     var circle = new Konva.Rect({
        //         x: 0,
        //         y: 0,
        //         width: 40,
        //         height: 40,
        //         type: "other",
        //         //name:'rect',
        //         fill: '#1B75BB',
        //     });
        // }
        //if(selectedtableshape == "exit" || selectedtableshape == "wheelchair") {
            var circle = new Konva.Circle({
                x: 25,
                y: 30,
                radius: 28,
                type: "other",
                //name:'rect',
                //fill: '#000',
                stroke: '#1B75BB',
                strokeWidth:1
            });
        //}
        // if(selectedtableshape == "mantoilet" || selectedtableshape == "womentoilet" || selectedtableshape == "toiletmanwomen") {
        //     var circle = new Konva.Circle({
        //         x: 25,
        //         y: 32,
        //         radius: 28,
        //         type: "other",
        //         stroke:'#000',
        //         strokeWidth: 1
        //     });
        // }
        var stagename = $("#othername").val();
        var stagel = new Konva.Text({
            text: stagename,
            fontFamily: 'roboto',
            fontSize: 18,
            padding: 0,
            fill: '#fff',
            x: 25,
            y: -23,
            zIndex: 3,
            type:'stage',
            gearorname: 'name',
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idstagename',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id'
        });
        var stagecharactercount = stagename.length;
        var namelabelboxwidth = 100;
        if(stagecharactercount > 6) {
            namelabelboxwidth = 0;
            var c = Count(stagename);
            namelabelboxwidth = c[0] * 16 + c[1] * 11 + c[2] * 12 + c[3] * 16 + 10;
        }
        else {
            namelabelboxwidth = 100;
        }
        var rect = new Konva.Rect({
            x: 0,
            y: -25,
            width: namelabelboxwidth,
            height: 20,
            fill: '#0d66b6',
            stroke: '#0d66b6',
            strokeWidth: 4,
            type:'other',
            id:shapeaddE.evt.screenX + shapeaddE.evt.screenY +'idgear',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            cc: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            selectedtableshape: selectedtableshape,
            stagename: stagename,
        });
        var gearicon = new Konva.Path({
            x: 0,
            y: -27,
            width: 10,
            height: 10,
            radius: 10,
            scale: {
                x: 0.7,
                y: 0.7,
            },
            fill:'#fff',
            data: 'M17 19.125C18.1736 19.125 19.125 18.1736 19.125 17C19.125 15.8264 18.1736 14.875 17 14.875C15.8264 14.875 14.875 15.8264 14.875 17C14.875 18.1736 15.8264 19.125 17 19.125Z,M31.0108 14.6197L29.8917 11.0497C29.7708 10.6371 29.5681 10.253 29.2956 9.92048C29.0232 9.58792 28.6865 9.31364 28.3058 9.114C27.925 8.91436 27.5079 8.79345 27.0794 8.75849C26.6509 8.72353 26.2197 8.77523 25.8117 8.91051L25.33 9.06634C24.9527 9.19107 24.5508 9.22272 24.1585 9.15858C23.7663 9.09445 23.3954 8.93643 23.0775 8.69801L22.9217 8.58467C22.6114 8.3472 22.3613 8.04014 22.1915 7.68825C22.0217 7.33636 21.937 6.94949 21.9442 6.55884V6.16217C21.951 5.27254 21.6046 4.41655 20.9808 3.78217C20.6841 3.48248 20.3312 3.24435 19.9422 3.08147C19.5532 2.91858 19.1359 2.83414 18.7142 2.83301H15.1017C14.2349 2.84421 13.4077 3.19736 12.8001 3.81558C12.1925 4.4338 11.8537 5.26703 11.8575 6.13384V6.47384C11.8561 6.88506 11.7625 7.29073 11.5835 7.66096C11.4045 8.03118 11.1448 8.35653 10.8233 8.61301L10.6392 8.75467C10.2841 9.0233 9.86873 9.20115 9.42926 9.27275C8.98979 9.34434 8.53949 9.30753 8.11749 9.16551C7.72991 9.03138 7.31915 8.9773 6.91006 9.00652C6.50097 9.03574 6.10207 9.14766 5.73749 9.33551C5.3579 9.52391 5.02114 9.78841 4.74817 10.1126C4.47521 10.4367 4.27187 10.8136 4.15082 11.2197L2.98915 14.903C2.71976 15.7335 2.78885 16.6366 3.18141 17.4165C3.57397 18.1963 4.25831 18.7897 5.08582 19.068H5.31249C5.69422 19.2111 6.03684 19.4421 6.31252 19.7424C6.58821 20.0427 6.78919 20.4038 6.89916 20.7963L6.98415 21.023C7.14208 21.4567 7.19489 21.9217 7.13825 22.3797C7.08161 22.8378 6.91713 23.2759 6.65832 23.658C6.13446 24.3714 5.9135 25.2628 6.04349 26.1383C6.17349 27.0138 6.64394 27.8026 7.35249 28.333L10.285 30.5572C10.8403 30.9609 11.511 31.1745 12.1975 31.1663C12.3812 31.1843 12.5663 31.1843 12.75 31.1663C13.1751 31.084 13.5791 30.916 13.9371 30.6724C14.2951 30.4289 14.5998 30.1149 14.8325 29.7497L15.1583 29.2822C15.3869 28.9543 15.6893 28.6848 16.0412 28.4953C16.3931 28.3058 16.7846 28.2017 17.1842 28.1913C17.6029 28.181 18.0174 28.277 18.389 28.4702C18.7605 28.6634 19.0771 28.9477 19.3092 29.2963L19.4792 29.5372C19.7207 29.8966 20.0333 30.2029 20.3976 30.437C20.762 30.6711 21.1704 30.8282 21.5977 30.8985C22.025 30.9689 22.4623 30.951 22.8824 30.846C23.3026 30.741 23.6968 30.5511 24.0408 30.288L26.9167 28.1347C27.5966 27.6066 28.0488 26.8384 28.1805 25.9876C28.3122 25.1368 28.1135 24.2678 27.625 23.5588L27.2567 23.0205C27.0352 22.6783 26.8901 22.2923 26.8315 21.8889C26.7728 21.4855 26.8018 21.0742 26.9167 20.683C27.0337 20.2643 27.2509 19.8804 27.5496 19.5644C27.8482 19.2485 28.2193 19.01 28.6308 18.8697L28.9142 18.7705C29.734 18.486 30.4111 17.8939 30.8024 17.1193C31.1936 16.3447 31.2684 15.4484 31.0108 14.6197V14.6197ZM17 21.958C16.0193 21.958 15.0607 21.6672 14.2453 21.1224C13.4299 20.5775 12.7944 19.8032 12.4191 18.8971C12.0438 17.9911 11.9456 16.9942 12.1369 16.0324C12.3282 15.0705 12.8005 14.187 13.4939 13.4936C14.1874 12.8002 15.0708 12.3279 16.0327 12.1366C16.9945 11.9453 17.9914 12.0435 18.8975 12.4188C19.8035 12.7941 20.5779 13.4296 21.1227 14.245C21.6675 15.0604 21.9583 16.019 21.9583 16.9997C21.9583 18.3147 21.4359 19.5759 20.5061 20.5057C19.5762 21.4356 18.315 21.958 17 21.958V21.958Z',
            type:'stage',
            id:shapeaddE.evt.screenX + shapeaddE.evt.screenY +'idgear',
            brightness:'-1',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            cc: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            showothereditor : 'yes',
            selectedtableshape: selectedtableshape,
            stagename: stagename
        });
        group.add(circle);
        group.add(path);
        group.add(rect);
        group.add(gearicon);
        group.add(stagel);
        layer.add(group);
        stage.add(layer);
        selectedmenuoption = '';
        $('.otherimage img').removeClass("selected");
    }
    if(selectedmenuoption == "AddGeneralAdmissionSection") {
        var gasalepriority = $("#salepriorityforgeneraladmission").children("option:selected").val() - 1;
        var tablescalex;
        var tablescaley;
        var  y, x;
        if(scroll == 0) {
            y = shapeaddE.evt.screenY - 100;
        }
        else if(scroll > 0) {
            y = shapeaddE.evt.screenY + scroll - 100;
        }
        // if( y > 600) {
        //     y = 600;
        // }
        if( y > 2100) {
            y = 2100;
        }
        if(ml > 0) {
            x = shapeaddE.evt.screenX  + ml;
        }
        else {
            x = shapeaddE.evt.screenX; 
        }
        var checkclass = $("body").hasClass('sidebar-collapse');
        if(checkclass == false) {
            x = x - 230;
        }
        if( x > 2100) {
            x = 2100;
        }
        var group = new Konva.Group({
            x: x,
            y: y,
            draggable: true,
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            type: "gashape",
            offset: {
              x: 50,
              y: 25,
            },
            dragBoundFunc: function (pos) {
                if( pos.x < 2100 ){
                    var newx = pos.x < 100 ? 100 : pos.x;
                    var newY;
                    newY = pos.y < 100 ? 100 : pos.y ;
                    if( pos.y > 1800 ) {
                        // console.log("shiftKey");
                        newY = pos.y >  2100 ? 2100 : pos.y ;
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                    else if( pos.y < 1900 ) {
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                 }
                if( pos.x > 1800){
                    var newx = pos.x > 2050 ? 2050 : pos.x;
                    var newY 
                    newY = pos.y < 100 ? 100 : pos.y;
                    if( pos.y > 1800 ) {
                        newY = pos.y > 2100 ? 2100 : pos.y ;
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                    else {
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                }
            },
        });
        if (selectedgashape == "circle_table") {
            tablescalex = 1.5;
            tablescaley = 1.5;
        }
        else if (selectedgashape == "l-shaped-table") {
            tablescalex = .5;
            tablescaley = .3;
        }
        else {
            tablescalex = 5;
            tablescaley = 4;
        }
        var selectedpath  = icons[selectedgashape];
        var pathfillcolor =  $('#generaladmissionfillcolor').val();
        var path = new Konva.Path({
            fill: 'brown',
            data:  selectedpath,
            fill:pathfillcolor,
            stroke: '#333',
            strokeWidth: 0.25,
            name:'rect',
            //draggable: true,
            width:'100',
            height:'100',
            radius:'100',
            type: "gashape",
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            scale: {
                x: tablescalex,
                y: tablescaley,
            },
        });
        var ganame = $("#generaladmissionname").val();
        var stagel = new Konva.Text({
            text: ganame,
            fontFamily: 'roboto',
            fontSize: 18,
            padding: 0,
            fill: '#fff',
            x: 25,
            y: -23,
            zIndex: 3,
            type:'GA',
            gearorname: 'name',
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idganame',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id'
        });
        var stagecharactercount = ganame.length;
        var namelabelboxwidth = 100;
        if(stagecharactercount > 6) {
            namelabelboxwidth = 0;
            var c = Count(ganame);
            namelabelboxwidth = c[0] * 16 + c[1] * 11 + c[2] * 12 + c[3] * 16 + 10;
        }
        else {
            namelabelboxwidth = 100;
        }
        var rect = new Konva.Rect({
            x: 0,
            y: -25,
            width: namelabelboxwidth,
            height: 20,
            fill: '#0d66b6',
            stroke: '#0d66b6',
            strokeWidth: 4,
            type:'stage',
            id:shapeaddE.evt.screenX + shapeaddE.evt.screenY +'idgear',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            cc: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            ganame: ganame,
        });
        var maxgacapacity = $("#maxcapacitynumper").val();
        var gearicon = new Konva.Path({
            x: 0,
            y: -27,
            width: 10,
            height: 10,
            radius: 10,
            scale: {
                x: 0.7,
                y: 0.7,
            },
            fill:'#fff',
            data: 'M17 19.125C18.1736 19.125 19.125 18.1736 19.125 17C19.125 15.8264 18.1736 14.875 17 14.875C15.8264 14.875 14.875 15.8264 14.875 17C14.875 18.1736 15.8264 19.125 17 19.125Z,M31.0108 14.6197L29.8917 11.0497C29.7708 10.6371 29.5681 10.253 29.2956 9.92048C29.0232 9.58792 28.6865 9.31364 28.3058 9.114C27.925 8.91436 27.5079 8.79345 27.0794 8.75849C26.6509 8.72353 26.2197 8.77523 25.8117 8.91051L25.33 9.06634C24.9527 9.19107 24.5508 9.22272 24.1585 9.15858C23.7663 9.09445 23.3954 8.93643 23.0775 8.69801L22.9217 8.58467C22.6114 8.3472 22.3613 8.04014 22.1915 7.68825C22.0217 7.33636 21.937 6.94949 21.9442 6.55884V6.16217C21.951 5.27254 21.6046 4.41655 20.9808 3.78217C20.6841 3.48248 20.3312 3.24435 19.9422 3.08147C19.5532 2.91858 19.1359 2.83414 18.7142 2.83301H15.1017C14.2349 2.84421 13.4077 3.19736 12.8001 3.81558C12.1925 4.4338 11.8537 5.26703 11.8575 6.13384V6.47384C11.8561 6.88506 11.7625 7.29073 11.5835 7.66096C11.4045 8.03118 11.1448 8.35653 10.8233 8.61301L10.6392 8.75467C10.2841 9.0233 9.86873 9.20115 9.42926 9.27275C8.98979 9.34434 8.53949 9.30753 8.11749 9.16551C7.72991 9.03138 7.31915 8.9773 6.91006 9.00652C6.50097 9.03574 6.10207 9.14766 5.73749 9.33551C5.3579 9.52391 5.02114 9.78841 4.74817 10.1126C4.47521 10.4367 4.27187 10.8136 4.15082 11.2197L2.98915 14.903C2.71976 15.7335 2.78885 16.6366 3.18141 17.4165C3.57397 18.1963 4.25831 18.7897 5.08582 19.068H5.31249C5.69422 19.2111 6.03684 19.4421 6.31252 19.7424C6.58821 20.0427 6.78919 20.4038 6.89916 20.7963L6.98415 21.023C7.14208 21.4567 7.19489 21.9217 7.13825 22.3797C7.08161 22.8378 6.91713 23.2759 6.65832 23.658C6.13446 24.3714 5.9135 25.2628 6.04349 26.1383C6.17349 27.0138 6.64394 27.8026 7.35249 28.333L10.285 30.5572C10.8403 30.9609 11.511 31.1745 12.1975 31.1663C12.3812 31.1843 12.5663 31.1843 12.75 31.1663C13.1751 31.084 13.5791 30.916 13.9371 30.6724C14.2951 30.4289 14.5998 30.1149 14.8325 29.7497L15.1583 29.2822C15.3869 28.9543 15.6893 28.6848 16.0412 28.4953C16.3931 28.3058 16.7846 28.2017 17.1842 28.1913C17.6029 28.181 18.0174 28.277 18.389 28.4702C18.7605 28.6634 19.0771 28.9477 19.3092 29.2963L19.4792 29.5372C19.7207 29.8966 20.0333 30.2029 20.3976 30.437C20.762 30.6711 21.1704 30.8282 21.5977 30.8985C22.025 30.9689 22.4623 30.951 22.8824 30.846C23.3026 30.741 23.6968 30.5511 24.0408 30.288L26.9167 28.1347C27.5966 27.6066 28.0488 26.8384 28.1805 25.9876C28.3122 25.1368 28.1135 24.2678 27.625 23.5588L27.2567 23.0205C27.0352 22.6783 26.8901 22.2923 26.8315 21.8889C26.7728 21.4855 26.8018 21.0742 26.9167 20.683C27.0337 20.2643 27.2509 19.8804 27.5496 19.5644C27.8482 19.2485 28.2193 19.01 28.6308 18.8697L28.9142 18.7705C29.734 18.486 30.4111 17.8939 30.8024 17.1193C31.1936 16.3447 31.2684 15.4484 31.0108 14.6197V14.6197ZM17 21.958C16.0193 21.958 15.0607 21.6672 14.2453 21.1224C13.4299 20.5775 12.7944 19.8032 12.4191 18.8971C12.0438 17.9911 11.9456 16.9942 12.1369 16.0324C12.3282 15.0705 12.8005 14.187 13.4939 13.4936C14.1874 12.8002 15.0708 12.3279 16.0327 12.1366C16.9945 11.9453 17.9914 12.0435 18.8975 12.4188C19.8035 12.7941 20.5779 13.4296 21.1227 14.245C21.6675 15.0604 21.9583 16.019 21.9583 16.9997C21.9583 18.3147 21.4359 19.5759 20.5061 20.5057C19.5762 21.4356 18.315 21.958 17 21.958V21.958Z',
            type:'gasection',
            id:shapeaddE.evt.screenX + shapeaddE.evt.screenY +'idgear',
            brightness:'-1',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            cc: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            showgaeditor : 'yes',
            selectedgashape: selectedgashape,
            ganame: ganame,
            maxgacapacity: maxgacapacity,
            gasalepriority: gasalepriority,
            pathfillcolor: pathfillcolor
        });
        group.add(path);
        group.add(rect);
        group.add(gearicon);
        group.add(stagel);
        layer.add(group);
        stage.add(layer);
        selectedmenuoption = '';
    }
    if(selectedmenuoption == "addtablewithseats") {
        var tablescalex;
        var tablescaley;
        var tablewithchairname = $("#tablewithchairname").val();
        var borderwidth;
        var  y, x;
        if(scroll == 0) {
            y = shapeaddE.evt.screenY - 100;
        }
        else if(scroll > 0) {
            y = shapeaddE.evt.screenY + scroll - 100;
        }
        // if( y > 600) {
        //     y = 600;
        // }
        if( y > 2100) {
            y = 2100;
        }
        if(ml > 0) {
            x = shapeaddE.evt.screenX  + ml;
        }
        else {
            x = shapeaddE.evt.screenX; 
        }
        var checkclass = $("body").hasClass('sidebar-collapse');
        if(checkclass == false) {
            x = x - 230;
        }
        if( x > 2100) {
            x = 2100;
        }
        var group = new Konva.Group({
            x: x,
            y: y,
            draggable: true,
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            seatgroupname:tablewithchairname,
            type: "tablewithseats",
            ctype: "tablewithseatscont",
            offset: {
              x: 50,
              y: 25,
            },
            dragBoundFunc: function (pos) {
                if( pos.x < 2100 ){
                    var newx = pos.x < 100 ? 100 : pos.x;
                    var newY;
                    newY = pos.y < 100 ? 100 : pos.y ;
                    if( pos.y > 1800 ) {
                        // console.log("shiftKey");
                        newY = pos.y >  2100 ? 2100 : pos.y ;
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                    else if( pos.y < 1900 ) {
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                 }
                if( pos.x > 1800){
                    var newx = pos.x > 2050 ? 2050 : pos.x;
                    var newY 
                    newY = pos.y < 100 ? 100 : pos.y;
                    if( pos.y > 1800 ) {
                        newY = pos.y > 2100 ? 2100 : pos.y ;
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                    else {
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                }
            },
        });
        if (selectedtablewithchair == "circle_table") {
            tablescalex = 1.2;
            tablescaley = 1.2;
            borderwidth = 0.5;
        }
        else if (selectedtablewithchair == "l-shaped-table") {
            tablescalex = 0.5;
            tablescaley = 0.3;
            borderwidth = 1.5;
        }
        else if (selectedtablewithchair == "noShape") {
            tablescalex = 0.8;
            tablescaley = 0.8;
            borderwidth = 0;
        }
        else {
            tablescalex = 4;
            tablescaley = 4;
            borderwidth = 0.25;
        }
        var selectedpath  = icons[selectedtablewithchair];
        var pathfillcolor =  $('#tablewithchairfillcolor').val();
        var path = new Konva.Path({ 
            fill: 'brown',
            data:  selectedpath,
            fill: pathfillcolor,
            stroke: '#333',
            strokeWidth: borderwidth,
            name:'rect',
            //draggable: true,
            width:'50',
            height:'50',
            radius:'100',
            type: "tablewithoutseats",
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            scale: {
                x: tablescalex,
                y: tablescaley,
            },
        });
        var tablewithchairname = $("#tablewithchairname").val();
        var stagel = new Konva.Text({
            text: tablewithchairname,
            fontFamily: 'roboto',
            fontSize: 18,
            padding: 0,
            fill: '#fff',
            x: 25,
            y: -48,
            zIndex: 3,
            type:'tablewithseats',
            gearorname: 'name',
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idtablewithchairname',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id'
        });
        var stagecharactercount = tablewithchairname.length;
        var namelabelboxwidth = 100;
        if(stagecharactercount > 6) {
            namelabelboxwidth = 0;
            var c = Count(tablewithchairname);
            namelabelboxwidth = c[0] * 16 + c[1] * 11 + c[2] * 12 + c[3] * 16 + 10;
        }
        else {
            namelabelboxwidth = 100;
        }
        var rect = new Konva.Rect({
            x: 0,
            y: -50,
            width: namelabelboxwidth,
            height: 20,
            fill: '#0d66b6',
            stroke: '#0d66b6',
            strokeWidth: 4,
            type:'tablewithoutseats',
            id:shapeaddE.evt.screenX + shapeaddE.evt.screenY +'idgear',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            cc: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
        });
        var tablewithchairsalepriority = $("#salepriorityfortablewithchair").children("option:selected").val() - 1;
        var fromseatfortablewithchair = $("#fromseatfortablewithchair").val();
        var Toseatfortablewithchair  = $("#Toseatfortablewithchair").val();
        var pathfillcolorseat =  $('#tablewithchairfillcolorseat').val();
        var gearicon = new Konva.Path({
            x: 0,
            y: -52,
            width: 10,
            height: 10,
            radius: 10,
            scale: {
                x: 0.7,
                y: 0.7,
            },
            fill:'#fff',
            data: 'M17 19.125C18.1736 19.125 19.125 18.1736 19.125 17C19.125 15.8264 18.1736 14.875 17 14.875C15.8264 14.875 14.875 15.8264 14.875 17C14.875 18.1736 15.8264 19.125 17 19.125Z,M31.0108 14.6197L29.8917 11.0497C29.7708 10.6371 29.5681 10.253 29.2956 9.92048C29.0232 9.58792 28.6865 9.31364 28.3058 9.114C27.925 8.91436 27.5079 8.79345 27.0794 8.75849C26.6509 8.72353 26.2197 8.77523 25.8117 8.91051L25.33 9.06634C24.9527 9.19107 24.5508 9.22272 24.1585 9.15858C23.7663 9.09445 23.3954 8.93643 23.0775 8.69801L22.9217 8.58467C22.6114 8.3472 22.3613 8.04014 22.1915 7.68825C22.0217 7.33636 21.937 6.94949 21.9442 6.55884V6.16217C21.951 5.27254 21.6046 4.41655 20.9808 3.78217C20.6841 3.48248 20.3312 3.24435 19.9422 3.08147C19.5532 2.91858 19.1359 2.83414 18.7142 2.83301H15.1017C14.2349 2.84421 13.4077 3.19736 12.8001 3.81558C12.1925 4.4338 11.8537 5.26703 11.8575 6.13384V6.47384C11.8561 6.88506 11.7625 7.29073 11.5835 7.66096C11.4045 8.03118 11.1448 8.35653 10.8233 8.61301L10.6392 8.75467C10.2841 9.0233 9.86873 9.20115 9.42926 9.27275C8.98979 9.34434 8.53949 9.30753 8.11749 9.16551C7.72991 9.03138 7.31915 8.9773 6.91006 9.00652C6.50097 9.03574 6.10207 9.14766 5.73749 9.33551C5.3579 9.52391 5.02114 9.78841 4.74817 10.1126C4.47521 10.4367 4.27187 10.8136 4.15082 11.2197L2.98915 14.903C2.71976 15.7335 2.78885 16.6366 3.18141 17.4165C3.57397 18.1963 4.25831 18.7897 5.08582 19.068H5.31249C5.69422 19.2111 6.03684 19.4421 6.31252 19.7424C6.58821 20.0427 6.78919 20.4038 6.89916 20.7963L6.98415 21.023C7.14208 21.4567 7.19489 21.9217 7.13825 22.3797C7.08161 22.8378 6.91713 23.2759 6.65832 23.658C6.13446 24.3714 5.9135 25.2628 6.04349 26.1383C6.17349 27.0138 6.64394 27.8026 7.35249 28.333L10.285 30.5572C10.8403 30.9609 11.511 31.1745 12.1975 31.1663C12.3812 31.1843 12.5663 31.1843 12.75 31.1663C13.1751 31.084 13.5791 30.916 13.9371 30.6724C14.2951 30.4289 14.5998 30.1149 14.8325 29.7497L15.1583 29.2822C15.3869 28.9543 15.6893 28.6848 16.0412 28.4953C16.3931 28.3058 16.7846 28.2017 17.1842 28.1913C17.6029 28.181 18.0174 28.277 18.389 28.4702C18.7605 28.6634 19.0771 28.9477 19.3092 29.2963L19.4792 29.5372C19.7207 29.8966 20.0333 30.2029 20.3976 30.437C20.762 30.6711 21.1704 30.8282 21.5977 30.8985C22.025 30.9689 22.4623 30.951 22.8824 30.846C23.3026 30.741 23.6968 30.5511 24.0408 30.288L26.9167 28.1347C27.5966 27.6066 28.0488 26.8384 28.1805 25.9876C28.3122 25.1368 28.1135 24.2678 27.625 23.5588L27.2567 23.0205C27.0352 22.6783 26.8901 22.2923 26.8315 21.8889C26.7728 21.4855 26.8018 21.0742 26.9167 20.683C27.0337 20.2643 27.2509 19.8804 27.5496 19.5644C27.8482 19.2485 28.2193 19.01 28.6308 18.8697L28.9142 18.7705C29.734 18.486 30.4111 17.8939 30.8024 17.1193C31.1936 16.3447 31.2684 15.4484 31.0108 14.6197V14.6197ZM17 21.958C16.0193 21.958 15.0607 21.6672 14.2453 21.1224C13.4299 20.5775 12.7944 19.8032 12.4191 18.8971C12.0438 17.9911 11.9456 16.9942 12.1369 16.0324C12.3282 15.0705 12.8005 14.187 13.4939 13.4936C14.1874 12.8002 15.0708 12.3279 16.0327 12.1366C16.9945 11.9453 17.9914 12.0435 18.8975 12.4188C19.8035 12.7941 20.5779 13.4296 21.1227 14.245C21.6675 15.0604 21.9583 16.019 21.9583 16.9997C21.9583 18.3147 21.4359 19.5759 20.5061 20.5057C19.5762 21.4356 18.315 21.958 17 21.958V21.958Z',
            type:'tablewithoutchair',
            id:shapeaddE.evt.screenX + shapeaddE.evt.screenY +'idgear',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            cc: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            showtablewithchaireditor : 'yes',
            ctype:"tablewithseats",
            selectedtablewithchair: selectedtablewithchair,
            tablewithchairname: tablewithchairname,
            tablewithchairsalepriority: tablewithchairsalepriority,
            fromseatfortablewithchair: fromseatfortablewithchair,
            Toseatfortablewithchair: Toseatfortablewithchair,
            seatgroupid: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idseatgroup',
            pathfillcolor: pathfillcolor,
            pathfillcolorseat:pathfillcolorseat
        });
        var seatgroup = new Konva.Group({
            x: Toseatfortablewithchair - fromseatfortablewithchair - 30,
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idseatgroup',
            type: "tablewithseatscont",
        });
        var i, x;
        var k = 0;
        for(i=fromseatfortablewithchair;i<=Toseatfortablewithchair;i++) {
            k+=1;
            var dt = new Date();
            var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
            var circle = new Konva.Circle({
                x: k * 20,
                y: -12,
                radius: 5,
                id: time+k,
                fill: pathfillcolorseat,
                stroke: '#aaa',
                strokeWidth: 1,
                draggable: true,
                type: "tablewithseats",
                seatno:i,
                category:"seats"
            });
            seatgroup.add(circle);
            k++;
        }
        group.add(seatgroup);
        group.add(path);
        group.add(rect);
        group.add(gearicon);
        group.add(stagel);
        layer.add(group);
        stage.add(layer);
        selectedmenuoption = '';
    }
    if(selectedmenuoption == "addtablewithoutseats") {
        var tablescalex;
        var tablescaley;
        var  y, x;
        if(scroll == 0) {
            y = shapeaddE.evt.screenY - 100;
        }
        else if(scroll > 0) {
            y = shapeaddE.evt.screenY + scroll - 100;
        }
        // if( y > 600) {
        //     y = 600;
        // }
        if( y > 2100) {
            y = 2100;
        }
        if(ml > 0) {
            x = shapeaddE.evt.screenX  + ml;
        }
        else {
            x = shapeaddE.evt.screenX; 
        }
        var checkclass = $("body").hasClass('sidebar-collapse');
        if(checkclass == false) {
            x = x - 230;
        }
        if( x > 2100) {
            x = 2100;
        }
        var group = new Konva.Group({
            x: x,
            y: y,
            draggable: true,
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            type: "tablewithoutseats",
            offset: {
              x: 50,
              y: 25,
            },
            dragBoundFunc: function (pos) {
                if( pos.x < 2100 ){
                    var newx = pos.x < 100 ? 100 : pos.x;
                    var newY;
                    newY = pos.y < 100 ? 100 : pos.y ;
                    if( pos.y > 1800 ) {
                        // console.log("shiftKey");
                        newY = pos.y >  2100 ? 2100 : pos.y ;
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                    else if( pos.y < 1900 ) {
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                 }
                if( pos.x > 1800){
                    var newx = pos.x > 2050 ? 2050 : pos.x;
                    var newY 
                    newY = pos.y < 100 ? 100 : pos.y;
                    if( pos.y > 1800 ) {
                        newY = pos.y > 2100 ? 2100 : pos.y ;
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                    else {
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                }
            },
        });
        if (selectedtablewithoutchair == "circle_tablewithoutchair") {
            tablescalex = 0.8;
            tablescaley = 0.8;
        }
        else if (selectedtablewithoutchair == "corner_tablewithoutchair") {
            tablescalex = 1.2;
            tablescaley = 1.2;
        }
        else {
            tablescalex = 0.8;
            tablescaley = 0.8;
        }
        var selectedpath  = icons[selectedtablewithoutchair];
        var pathfillcolor =  $('#tablewithoutchairfillcolor').val();
        var path = new Konva.Path({
            fill: 'brown',
            data:  selectedpath,
            fill: pathfillcolor,
            stroke: '#333',
            strokeWidth: 1,
            name:'rect',
            //draggable: true,
            width:'50',
            height:'50',
            radius:'100',
            type: "tablewithoutseats",
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            scale: {
                x: tablescalex,
                y: tablescaley,
            },
        });
        var tablewithoutchairname = $("#tablewithoutchairname").val();
        var stagel = new Konva.Text({
            text: tablewithoutchairname,
            fontFamily: 'roboto',
            fontSize: 18,
            padding: 0,
            fill: '#fff',
            x: 25,
            y: -23,
            zIndex: 3,
            type:'tablewithoutseats',
            gearorname: 'name',
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idtablewithoutchairname',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id'
        });
        var stagecharactercount = tablewithoutchairname.length;
        var namelabelboxwidth = 100;
        if(stagecharactercount > 6) {
            namelabelboxwidth = 0;
            var c = Count(tablewithoutchairname);
            namelabelboxwidth = c[0] * 16 + c[1] * 11 + c[2] * 12 + c[3] * 16 + 10;
        }
        else {
            namelabelboxwidth = 100;
        }
        var rect = new Konva.Rect({
            x: 0,
            y: -25,
            width: namelabelboxwidth,
            height: 20,
            fill: '#0d66b6',
            stroke: '#0d66b6',
            strokeWidth: 4,
            type:'tablewithoutseats',
            id:shapeaddE.evt.screenX + shapeaddE.evt.screenY +'idgear',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            cc: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
        });
        var tablewithoutchairsalepriority = $("#salepriorityfortablewithoutchair").children("option:selected").val() - 1;
        var maxgacapacity = $("#maxcapacitynumper").val();
        var fromseatfortablewithoutchair = $("#fromseatfortablewithoutchair").val();
        var Toseatfortablewithoutchair  = $("#Toseatfortablewithoutchair").val();
        var gearicon = new Konva.Path({
            x: 0,
            y: -27,
            width: 10,
            height: 10,
            radius: 10,
            scale: {
                x: 0.7,
                y: 0.7,
            },
            fill:'#fff',
            data: 'M17 19.125C18.1736 19.125 19.125 18.1736 19.125 17C19.125 15.8264 18.1736 14.875 17 14.875C15.8264 14.875 14.875 15.8264 14.875 17C14.875 18.1736 15.8264 19.125 17 19.125Z,M31.0108 14.6197L29.8917 11.0497C29.7708 10.6371 29.5681 10.253 29.2956 9.92048C29.0232 9.58792 28.6865 9.31364 28.3058 9.114C27.925 8.91436 27.5079 8.79345 27.0794 8.75849C26.6509 8.72353 26.2197 8.77523 25.8117 8.91051L25.33 9.06634C24.9527 9.19107 24.5508 9.22272 24.1585 9.15858C23.7663 9.09445 23.3954 8.93643 23.0775 8.69801L22.9217 8.58467C22.6114 8.3472 22.3613 8.04014 22.1915 7.68825C22.0217 7.33636 21.937 6.94949 21.9442 6.55884V6.16217C21.951 5.27254 21.6046 4.41655 20.9808 3.78217C20.6841 3.48248 20.3312 3.24435 19.9422 3.08147C19.5532 2.91858 19.1359 2.83414 18.7142 2.83301H15.1017C14.2349 2.84421 13.4077 3.19736 12.8001 3.81558C12.1925 4.4338 11.8537 5.26703 11.8575 6.13384V6.47384C11.8561 6.88506 11.7625 7.29073 11.5835 7.66096C11.4045 8.03118 11.1448 8.35653 10.8233 8.61301L10.6392 8.75467C10.2841 9.0233 9.86873 9.20115 9.42926 9.27275C8.98979 9.34434 8.53949 9.30753 8.11749 9.16551C7.72991 9.03138 7.31915 8.9773 6.91006 9.00652C6.50097 9.03574 6.10207 9.14766 5.73749 9.33551C5.3579 9.52391 5.02114 9.78841 4.74817 10.1126C4.47521 10.4367 4.27187 10.8136 4.15082 11.2197L2.98915 14.903C2.71976 15.7335 2.78885 16.6366 3.18141 17.4165C3.57397 18.1963 4.25831 18.7897 5.08582 19.068H5.31249C5.69422 19.2111 6.03684 19.4421 6.31252 19.7424C6.58821 20.0427 6.78919 20.4038 6.89916 20.7963L6.98415 21.023C7.14208 21.4567 7.19489 21.9217 7.13825 22.3797C7.08161 22.8378 6.91713 23.2759 6.65832 23.658C6.13446 24.3714 5.9135 25.2628 6.04349 26.1383C6.17349 27.0138 6.64394 27.8026 7.35249 28.333L10.285 30.5572C10.8403 30.9609 11.511 31.1745 12.1975 31.1663C12.3812 31.1843 12.5663 31.1843 12.75 31.1663C13.1751 31.084 13.5791 30.916 13.9371 30.6724C14.2951 30.4289 14.5998 30.1149 14.8325 29.7497L15.1583 29.2822C15.3869 28.9543 15.6893 28.6848 16.0412 28.4953C16.3931 28.3058 16.7846 28.2017 17.1842 28.1913C17.6029 28.181 18.0174 28.277 18.389 28.4702C18.7605 28.6634 19.0771 28.9477 19.3092 29.2963L19.4792 29.5372C19.7207 29.8966 20.0333 30.2029 20.3976 30.437C20.762 30.6711 21.1704 30.8282 21.5977 30.8985C22.025 30.9689 22.4623 30.951 22.8824 30.846C23.3026 30.741 23.6968 30.5511 24.0408 30.288L26.9167 28.1347C27.5966 27.6066 28.0488 26.8384 28.1805 25.9876C28.3122 25.1368 28.1135 24.2678 27.625 23.5588L27.2567 23.0205C27.0352 22.6783 26.8901 22.2923 26.8315 21.8889C26.7728 21.4855 26.8018 21.0742 26.9167 20.683C27.0337 20.2643 27.2509 19.8804 27.5496 19.5644C27.8482 19.2485 28.2193 19.01 28.6308 18.8697L28.9142 18.7705C29.734 18.486 30.4111 17.8939 30.8024 17.1193C31.1936 16.3447 31.2684 15.4484 31.0108 14.6197V14.6197ZM17 21.958C16.0193 21.958 15.0607 21.6672 14.2453 21.1224C13.4299 20.5775 12.7944 19.8032 12.4191 18.8971C12.0438 17.9911 11.9456 16.9942 12.1369 16.0324C12.3282 15.0705 12.8005 14.187 13.4939 13.4936C14.1874 12.8002 15.0708 12.3279 16.0327 12.1366C16.9945 11.9453 17.9914 12.0435 18.8975 12.4188C19.8035 12.7941 20.5779 13.4296 21.1227 14.245C21.6675 15.0604 21.9583 16.019 21.9583 16.9997C21.9583 18.3147 21.4359 19.5759 20.5061 20.5057C19.5762 21.4356 18.315 21.958 17 21.958V21.958Z',
            type:'tablewithoutchair',
            id:shapeaddE.evt.screenX + shapeaddE.evt.screenY +'idgear',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            cc: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            showtablewithoutchaireditor : 'yes',
            selectedtablewithoutchair: selectedtablewithoutchair,
            tablewithoutchairname: tablewithoutchairname,
            maxgacapacity: maxgacapacity,
            pathfillcolor: pathfillcolor,
            tablewithoutchairsalepriority: tablewithoutchairsalepriority,
            fromseatfortablewithoutchair: fromseatfortablewithoutchair,
            Toseatfortablewithoutchair: Toseatfortablewithoutchair
        });
        group.add(path);
        group.add(rect);
        group.add(gearicon);
        group.add(stagel);
        layer.add(group);
        stage.add(layer);
        selectedmenuoption = '';
    }
    if(selectedmenuoption == "SectionAdd") {
        var  y, x;
        if(scroll == 0) {
            y = shapeaddE.evt.screenY - 100;
        }
        else if(scroll > 0) {
            y = shapeaddE.evt.screenY + scroll - 100;
        }
        // if( y > 600) {
        //     y = 600;
        // }
        if( y > 2100) {
            y = 2100;
        }
        if(ml > 0) {
            x = shapeaddE.evt.screenX  + ml;
        }
        else {
            x = shapeaddE.evt.screenX; 
        }
        var checkclass = $("body").hasClass('sidebar-collapse');
        if(checkclass == false) {
            x = x - 230;
        }
        if( x > 2100) {
            x = 2100;
        }
        var group = new Konva.Group({
            x: x,
            y: y,
            draggable: true,
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            type: "section",
            offset: {
              x: 50,
              y: 25,
            },
            dragBoundFunc: function (pos) {
                if( pos.x < 2100 ){
                    var newx = pos.x < 100 ? 100 : pos.x;
                    var newY;
                    newY = pos.y < 100 ? 100 : pos.y ;
                    if( pos.y > 1800 ) {
                        // console.log("shiftKey");
                        newY = pos.y >  2100 ? 2100 : pos.y ;
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                    else if( pos.y < 1900 ) {
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                 }
                if( pos.x > 1800){
                    var newx = pos.x > 2050 ? 2050 : pos.x;
                    var newY 
                    newY = pos.y < 100 ? 100 : pos.y;
                    if( pos.y > 1800 ) {
                        newY = pos.y > 2100 ? 2100 : pos.y ;
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                    else {
                        return {
                            x: newx,
                            y: newY,
                        };
                    }
                }
            },
        });
        var sectionname = $("#sectionname").val();
        var stagel = new Konva.Text({
            text: sectionname,
            fontFamily: 'roboto',
            fontSize: 18,
            padding: 0,
            fill: '#fff',
            x: 25,
            y: -23,
            zIndex: 3,
            type:'section',
            gearorname: 'name',
            id: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idsectionname',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id'
        });
        var rect = new Konva.Rect({
            x: 0,
            y: -25,
            width: 200,
            height: 20,
            fill: '#0d66b6',
            stroke: '#0d66b6',
            strokeWidth: 4,
            type:'section',
            id:shapeaddE.evt.screenX + shapeaddE.evt.screenY +'idgear',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            cc: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
        });
        var salepriorityforsection = $("#salepriorityforsection").children("option:selected").val() - 1;
        var alignmentforsection  =  $("#alignmentforsection").children("option:selected").val();
        var sellpreferenceforsection  =  $("#sellpreferenceforsection").children("option:selected").val();
        var gearicon = new Konva.Path({
            x: 0,
            y: -27,
            width: 10,
            height: 10,
            radius: 10,
            scale: {
                x: 0.7,
                y: 0.7,
            },
            fill:'#fff',
            data: 'M17 19.125C18.1736 19.125 19.125 18.1736 19.125 17C19.125 15.8264 18.1736 14.875 17 14.875C15.8264 14.875 14.875 15.8264 14.875 17C14.875 18.1736 15.8264 19.125 17 19.125Z,M31.0108 14.6197L29.8917 11.0497C29.7708 10.6371 29.5681 10.253 29.2956 9.92048C29.0232 9.58792 28.6865 9.31364 28.3058 9.114C27.925 8.91436 27.5079 8.79345 27.0794 8.75849C26.6509 8.72353 26.2197 8.77523 25.8117 8.91051L25.33 9.06634C24.9527 9.19107 24.5508 9.22272 24.1585 9.15858C23.7663 9.09445 23.3954 8.93643 23.0775 8.69801L22.9217 8.58467C22.6114 8.3472 22.3613 8.04014 22.1915 7.68825C22.0217 7.33636 21.937 6.94949 21.9442 6.55884V6.16217C21.951 5.27254 21.6046 4.41655 20.9808 3.78217C20.6841 3.48248 20.3312 3.24435 19.9422 3.08147C19.5532 2.91858 19.1359 2.83414 18.7142 2.83301H15.1017C14.2349 2.84421 13.4077 3.19736 12.8001 3.81558C12.1925 4.4338 11.8537 5.26703 11.8575 6.13384V6.47384C11.8561 6.88506 11.7625 7.29073 11.5835 7.66096C11.4045 8.03118 11.1448 8.35653 10.8233 8.61301L10.6392 8.75467C10.2841 9.0233 9.86873 9.20115 9.42926 9.27275C8.98979 9.34434 8.53949 9.30753 8.11749 9.16551C7.72991 9.03138 7.31915 8.9773 6.91006 9.00652C6.50097 9.03574 6.10207 9.14766 5.73749 9.33551C5.3579 9.52391 5.02114 9.78841 4.74817 10.1126C4.47521 10.4367 4.27187 10.8136 4.15082 11.2197L2.98915 14.903C2.71976 15.7335 2.78885 16.6366 3.18141 17.4165C3.57397 18.1963 4.25831 18.7897 5.08582 19.068H5.31249C5.69422 19.2111 6.03684 19.4421 6.31252 19.7424C6.58821 20.0427 6.78919 20.4038 6.89916 20.7963L6.98415 21.023C7.14208 21.4567 7.19489 21.9217 7.13825 22.3797C7.08161 22.8378 6.91713 23.2759 6.65832 23.658C6.13446 24.3714 5.9135 25.2628 6.04349 26.1383C6.17349 27.0138 6.64394 27.8026 7.35249 28.333L10.285 30.5572C10.8403 30.9609 11.511 31.1745 12.1975 31.1663C12.3812 31.1843 12.5663 31.1843 12.75 31.1663C13.1751 31.084 13.5791 30.916 13.9371 30.6724C14.2951 30.4289 14.5998 30.1149 14.8325 29.7497L15.1583 29.2822C15.3869 28.9543 15.6893 28.6848 16.0412 28.4953C16.3931 28.3058 16.7846 28.2017 17.1842 28.1913C17.6029 28.181 18.0174 28.277 18.389 28.4702C18.7605 28.6634 19.0771 28.9477 19.3092 29.2963L19.4792 29.5372C19.7207 29.8966 20.0333 30.2029 20.3976 30.437C20.762 30.6711 21.1704 30.8282 21.5977 30.8985C22.025 30.9689 22.4623 30.951 22.8824 30.846C23.3026 30.741 23.6968 30.5511 24.0408 30.288L26.9167 28.1347C27.5966 27.6066 28.0488 26.8384 28.1805 25.9876C28.3122 25.1368 28.1135 24.2678 27.625 23.5588L27.2567 23.0205C27.0352 22.6783 26.8901 22.2923 26.8315 21.8889C26.7728 21.4855 26.8018 21.0742 26.9167 20.683C27.0337 20.2643 27.2509 19.8804 27.5496 19.5644C27.8482 19.2485 28.2193 19.01 28.6308 18.8697L28.9142 18.7705C29.734 18.486 30.4111 17.8939 30.8024 17.1193C31.1936 16.3447 31.2684 15.4484 31.0108 14.6197V14.6197ZM17 21.958C16.0193 21.958 15.0607 21.6672 14.2453 21.1224C13.4299 20.5775 12.7944 19.8032 12.4191 18.8971C12.0438 17.9911 11.9456 16.9942 12.1369 16.0324C12.3282 15.0705 12.8005 14.187 13.4939 13.4936C14.1874 12.8002 15.0708 12.3279 16.0327 12.1366C16.9945 11.9453 17.9914 12.0435 18.8975 12.4188C19.8035 12.7941 20.5779 13.4296 21.1227 14.245C21.6675 15.0604 21.9583 16.019 21.9583 16.9997C21.9583 18.3147 21.4359 19.5759 20.5061 20.5057C19.5762 21.4356 18.315 21.958 17 21.958V21.958Z',
            type:'section',
            id:shapeaddE.evt.screenX + shapeaddE.evt.screenY +'idgear',
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            cc: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            showsectioneditor : 'yes',
            sectionname: sectionname,
            salepriorityforsection: salepriorityforsection,
            sellpreferenceforsection: sellpreferenceforsection,
            alignmentforsection: alignmentforsection
        });
        var rect1 = new Konva.Path({
            x: -5,
            y: -10,
            width: 20,
            height: 20,
            fill:'#0d66b6',
            data: 'M12 12H8M12 8V12V8ZM12 12V16V12ZM12 12H16H12Z,M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z',
            stroke: '#fff',
            strokeWidth: 2,
            // scale: {
            //     x: 0.9,
            //     y: 0.9,
            // },
            tt: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'id',
            id:'section'+shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
            type:"lastrowincriment",
            cc: shapeaddE.evt.screenX + shapeaddE.evt.screenY + 'idgroup',
        });
        geardetails =  '';
        geardetails = gearicon;
        group.add(rect1);
        rect1.hide();
        group.add(rect);
        group.add(gearicon);
        group.add(stagel);
        layer.add(group);
        stage.add(layer);
        selectedmenuoption = '';
    }
    var json = layer.toJSON();
    $("#sketchpaddata").val(json);
}
stage.on('mouseup touchend', function() {
    isPaint = false;
    var json = layer.toJSON();
    $("#sketchpaddata").val(json);
});
var shape = '';
var tempid = '';
stage.on('mouseover', function(e) {
    if(e.target.attrs.type == "stageshape") {
        tempid = e.target.attrs.id;
    }
    else if( shape != '' && tempid != e.target.attrs.tt) {
        tempid = '';
    }
})
$('.stage-edit-tooltips ul li').click(function(e){
    stage_edit_tooltip_option = $(this).attr('id');
    $('.stage-edit-tooltips').css('display','none');
    if(stage_edit_tooltip_option == "editshape") {
        $('#stagename').val('');
        $("#stageoptions").dialog('open');
        $('.imgSelectorstage span').removeClass('selected');
        $('#stagename').val(slectedstagedetails.stagename);
        $('#stagefillcolor').val(slectedstagedetails.pathfillcolor);
        $(".bnc").removeClass('selected');
        $("."+slectedstagedetails.selectedtableshape).addClass("selected");
        selectedtableshape = slectedstagedetails.selectedtableshape;
    }
    else if(stage_edit_tooltip_option == "deletestage"){
        deletemainmenuoption();
    }
    else if (selectedmenuoption == "Rotate"){
        rotateshape();
    }
    else if( selectedmenuoption == "duplicateshape") {
        if(slectedstagedetails.type == "stage") {
            selectedmenuoption = "addstageorshpe";
            $('#stagename').val('');
            $(".imgSelectorstage  span").removeClass('selected');
            $(".imgSelectorstage  span[data-value="+slectedstagedetails.selectedtableshape+"]").addClass('selected');
            selectedtableshape = slectedstagedetails.selectedtableshape;
            var duplicateshapename = slectedstagedetails.stagename;
            var slugstatus = duplicateshapename.includes("_");
            var streetaddress = duplicateshapename.split('_')[0];
            if(slugstatus == false){
                slug = 1;
            }
            else {
                slug+=1;
            }
            $('#stagename').val(streetaddress+"_"+slug);
            $("#stagefillcolor").val(slectedstagedetails.pathfillcolor);
            drawShapes();
        }
    }
    else if( selectedmenuoption == "resize") {
        $('.stage-edit-tooltips').css('display','none');
    }
})
$('.ga-edit-tooltips ul li').click(function(e){
    stage_edit_tooltip_option = $(this).attr('id');
    $('.ga-edit-tooltips').css('display','none');
    if(stage_edit_tooltip_option == "editga") {
        $('#generaladmissionname').val('');
        $('#maxcapacitynumper').val('');
        $('#generaladmissionfillcolor').val(slectedstagedetails.pathfillcolor);
        $("#generaladmissionoptions").dialog('open');
        $('.imgSelectorgeneraladmission span').removeClass('selected');
        document.getElementById("salepriorityforgeneraladmission").selectedIndex = slectedstagedetails.gasalepriority;
        $('#generaladmissionname').val(slectedstagedetails.ganame);
        $('#maxcapacitynumper').val(slectedstagedetails.maxgacapacity);
        $(".bsp").removeClass('selected');
        $('.'+slectedstagedetails.selectedgashape).addClass('selected');
        selectedgashape = slectedstagedetails.selectedgashape;
    }
    else if(stage_edit_tooltip_option == "deletega") {
        deletemainmenuoption();
    }
    else if (stage_edit_tooltip_option == "Rotate"){
        rotateshape();
    }
    else if( stage_edit_tooltip_option == "duplicatega") {
        if(slectedstagedetails.type == "gasection") {
            selectedmenuoption = "AddGeneralAdmissionSection";
            $('#generaladmissionname').val('');
            $("span.shapeselection").removeClass('selected');
            $(".imgSelectorgeneraladmission  span[data-value="+slectedstagedetails.selectedgashape+"]").addClass('selected');
            selectedgashape = slectedstagedetails.selectedgashape;
            selectedtableshape = slectedstagedetails.selectedgashape;
            var duplicateshapename = slectedstagedetails.ganame;
            var slugstatus = duplicateshapename.includes("_");
            var streetaddress = duplicateshapename.split('_')[0];
            if(slugstatus == false){
                slug = 1;
            }
            else {
                slug+=1;
            }
            $('#generaladmissionname').val(streetaddress+"_"+slug);
            document.getElementById("salepriorityforgeneraladmission").selectedIndex = slectedstagedetails.gasalepriority;
            $('#maxcapacitynumper').val(slectedstagedetails.maxgacapacity);
            $("#generaladmissionfillcolor").val(slectedstagedetails.pathfillcolor);
            drawShapes();
        }
    }
})
$('.tablewithoutchai-edit-tooltips ul li').click(function(e){
    stage_edit_tooltip_option = $(this).attr('id');
    $('.tablewithoutchai-edit-tooltips').css('display','none');
    if(stage_edit_tooltip_option == "edittablewithoutchair") {
        document.getElementById("salepriorityfortablewithoutchair").selectedIndex = slectedstagedetails.tablewithoutchairsalepriority;
        $("#tablewithoutchairname").val(slectedstagedetails.tablewithoutchairname);
        $("#fromseatfortablewithoutchair").val(slectedstagedetails.fromseatfortablewithoutchair);
        $("#Toseatfortablewithoutchair").val(slectedstagedetails.Toseatfortablewithoutchair);
        $(".mnc").removeClass("selected");
        var hn = slectedstagedetails.selectedtablewithoutchair;
        $("."+hn).addClass("selected");
        selectedtablewithoutchair = slectedstagedetails.selectedtablewithoutchair;
        $("#tablewithoutchairfillcolor").val(slectedstagedetails.pathfillcolor);
        $("#tablewithoutchairoptions").dialog('open');
    }
    else if(stage_edit_tooltip_option == "deletetablewithoutchair") {
        deletemainmenuoption();
    }
    else if (stage_edit_tooltip_option == "Rotate"){
        rotateshape();
    }
    else if( stage_edit_tooltip_option == "duplicatetablewithoutchair") {
        if(slectedstagedetails.type == "tablewithoutchair") {
            selectedmenuoption = "addtablewithoutseats";
            $(".tableSelectorwithoutchair  span").removeClass('selected');
            $(".tableSelectorwithoutchair  span[data-value="+slectedstagedetails.selectedtablewithoutchair+"]").addClass('selected');
            selectedtablewithoutchair = slectedstagedetails.selectedtablewithoutchair;
            var duplicateshapename = slectedstagedetails.tablewithoutchairname;
            var slugstatus = duplicateshapename.includes("_");
            var streetaddress = duplicateshapename.split('_')[0];
            if(slugstatus == false){
                slug = 1;
            }
            else {
                slug+=1;
            }
            $('#tablewithoutchairname').val(streetaddress+"_"+slug);
            document.getElementById("salepriorityfortablewithoutchair").selectedIndex = slectedstagedetails.tablewithoutchairsalepriority;
            $("#fromseatfortablewithoutchair").val(slectedstagedetails.fromseatfortablewithoutchair);
            $("#Toseatfortablewithoutchair").val(slectedstagedetails.Toseatfortablewithoutchair);
            $("#tableSelectorwithoutchair img[data-value='"+slectedstagedetails.selectedtablewithoutchair).addClass("selected");
            $('#tablewithoutchairfillcolor').val(slectedstagedetails.pathfillcolor);
            drawShapes();
        }
    }
})
$('.tablewithchair-edit-tooltips ul li').click(function(e){
    stage_edit_tooltip_option = $(this).attr('id');
    $('.tablewithchair-edit-tooltips').css('display','none');
    if(stage_edit_tooltip_option == "editseatgroup") {
        sessionStorage.setItem("slectedstagedetails", JSON.stringify(slectedstagedetails));
        document.getElementById("salepriorityfortablewithchair").selectedIndex = slectedstagedetails.tablewithchairsalepriority;
        $("#tablewithchairname").val(slectedstagedetails.tablewithchairname);
        $("#fromseatfortablewithchair").val(slectedstagedetails.fromseatfortablewithchair);
        $("#Toseatfortablewithchair").val(slectedstagedetails.Toseatfortablewithchair);
        $('.knmc').removeClass("selected");
        var hc = slectedstagedetails.selectedtablewithchair;
        $('.'+hc).addClass("selected");
        //console.log(slectedstagedetails);
        selectedtablewithchair = slectedstagedetails.selectedtablewithchair;
        $('#tablewithchairfillcolorseat').val(slectedstagedetails.pathfillcolorseat);
        $('#tablewithchairfillcolor').val(slectedstagedetails.pathfillcolor);
        $("#tablewithchairoptions").dialog('open');
    }
    else if(stage_edit_tooltip_option == "deleteseatgroup") {
        deletemainmenuoption();
    }
    else if (stage_edit_tooltip_option == "Rotate"){
        rotateshape();
    }
    else if( stage_edit_tooltip_option == "duplicateseatgroup") {
        if(slectedstagedetails.type == "tablewithoutchair") {
            selectedmenuoption = "addtablewithseats";
            $(".imgSelectortablewithchair  span").removeClass('selected');
            $(".imgSelectortablewithchair   span[data-value="+slectedstagedetails.selectedtablewithoutchair+"]").addClass('selected');
            selectedtablewithchair = slectedstagedetails.selectedtablewithchair;
            var duplicateshapename = slectedstagedetails.tablewithchairname;
            var slugstatus = duplicateshapename.includes("_");
            var streetaddress = duplicateshapename.split('_')[0];
            if(slugstatus == false){
                slug = 1;
            }
            else {
                slug+=1;
            }
            $('#tablewithchairname').val(streetaddress+"_"+slug);
            console.log(slectedstagedetails);
            document.getElementById("salepriorityfortablewithchair").selectedIndex = slectedstagedetails.tablewithchairsalepriority;
            $("#fromseatfortablewithchair").val(slectedstagedetails.fromseatfortablewithchair);
            $("#Toseatfortablewithchair").val(slectedstagedetails.Toseatfortablewithchair);
            $("#tablewithchairfillcolor").val(slectedstagedetails.pathfillcolor);
            $("#tablewithchairfillcolorseat").val(slectedstagedetails.pathfillcolorseat);
            $("#tableSelectorwithchair img[data-value='"+slectedstagedetails.selectedtablewithchair).addClass("selected");
            drawShapes();
        }
    }
})
$('.section-edit-tooltips ul li').click(function(e){
    stage_edit_tooltip_option = $(this).attr('id');
    $('.section-edit-tooltips').css('display','none');
    if(stage_edit_tooltip_option == "editsection") {
        document.getElementById("salepriorityforsection").selectedIndex = slectedstagedetails.salepriorityforsection;
        $("#sectionname").val(slectedstagedetails.sectionname);
        document.getElementById("alignmentforsection").selectedIndex = slectedstagedetails.alignmentforsection;
        document.getElementById("sellpreferenceforsection").selectedIndex = slectedstagedetails.sellpreferenceforsection;
        $("#section").dialog("open");
    }
    else if(stage_edit_tooltip_option == "deletesection") {
        deletemainmenuoption();
    }
    else if (stage_edit_tooltip_option == "Rotate"){
        rotateshape();
    }
    else if (stage_edit_tooltip_option == "addrow"){
        $('.delete-row').css('display','none');
        $('.insert-row-below').css('display','none');
        $("#rowname").val('');
        $("#fromseatforrow").val('');
        $("#Toseatforrow").val('');
        document.getElementById("cOddEven").selectedIndex = 0;
        document.getElementById("ascdes").selectedIndex = 0;
        $('.delete-row').css('display','none');
        $('.row-edit-save-save').css('display','none');
      $('.row-save').css('display','inline-block');
        $("#rowpopup").dialog("open");
    }
    else if (stage_edit_tooltip_option == "duplicatesection"){
        if(slectedstagedetails.type == "section") {
            document.getElementById("salepriorityforsection").selectedIndex = slectedstagedetails.salepriorityforsection;
            $("#sectionname").val(slectedstagedetails.sectionname);
            document.getElementById("alignmentforsection").selectedIndex = slectedstagedetails.alignmentforsection;
            document.getElementById("sellpreferenceforsection").selectedIndex = slectedstagedetails.sellpreferenceforsection;
            var duplicateshapename = slectedstagedetails.sectionname;
            var slugstatus = duplicateshapename.includes("_");
            var streetaddress = duplicateshapename.split('_')[0];
            if(slugstatus == false){
                slug = 1;
            }
            else {
                slug+=1;
            }
            $('#sectionname').val(streetaddress+"_"+slug);
            selectedmenuoption = "SectionAdd";
            drawShapes();
            var newid = stage.find("#"+slectedstagedetails.cc);
            slectedstagedetails ='';
            slectedstagedetails = geardetails.attrs;
            var m;
            for(m = 4;m<newid[0].children.length;m++) {
                //console.log("hello");
                var temp = newid[0].children[m].children[0].attrs;
                $("#rowname").val(temp.rowname);
                $("#fromseatforrow").val(temp.fromseatforrow);
                $("#Toseatforrow").val(temp.toseatforrow);
                document.getElementById("cOddEven").selectedIndex = temp.rowseatalloroddoreven - 1;
                document.getElementById("ascdes").selectedIndex = temp.ascdsc - 1;
                rowsave();
            }
            var newid = stage.find("#"+slectedstagedetails.cc);
            for(i = 4;i<newid[0].children.length;i++) {
                var changeyid = stage.find('#'+newid[0].children[i].attrs.id);
                changeyid.y((i - 4) * 25);
            }
            layer.draw();
        }
    }
})
$(".row-save").click(function(e){
    var rowname = $("#rowname").val();
    var fromseatforrow = $("#fromseatforrow").val();
    //alert(fromseatforrow);
    var toseatforrow = $("#Toseatforrow").val();
    //alert(toseatforrow);
    var rowseatalloroddoreven = $("#cOddEven").children("option:selected").val();
    //alert(rowseatalloroddoreven);
    if(rowname.trim() != '' && fromseatforrow.trim() != '' && toseatforrow.trim() != '') {
        if( rowseatalloroddoreven == 1){
            if(toseatforrow >= fromseatforrow) {
                rowsave();
            }
            else {
                $("#editorerrorpopup").dialog("open");
            }
        }
        if( rowseatalloroddoreven == 2){
            if(toseatforrow >= fromseatforrow) {
                if(toseatforrow % 2 == 1 && fromseatforrow % 2 == 1){
                    rowsave();
                }
                else {
                    $("#editorerrorpopup").dialog("open");
                }   
            }
            else {
                $("#editorerrorpopup").dialog("open");
            }
        }
        if( rowseatalloroddoreven == 3){
            if( parseInt(toseatforrow) >= parseInt(fromseatforrow)) {
                if( parseInt(toseatforrow) % 2 == 0 && parseInt(fromseatforrow) % 2 == 0){
                    rowsave();
                }
                else {
                    $("#editorerrorpopup").dialog("open");
                }   
            }
            else {
                $("#editorerrorpopup").dialog("open");
            }
        }
    } else {
        $("#editorerrorpopup").dialog("open");
    }
})
function rowsave() {
    var rowname = $("#rowname").val();
    var fromseatforrow = $("#fromseatforrow").val();
    //fromseatforrow = parseInt(fromseatforrow);
    var toseatforrow = $("#Toseatforrow").val();
    //toseatforrow = parseInt(toseatforrow);
    var dt = new Date();
    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    if(rowname.trim() != ''&& fromseatforrow.trim() != ''&& toseatforrow.trim() != '') {
        $("#rowpopup").dialog("close");
            var shape = stage.find('#'+slectedstagedetails.cc);
            // console.log(slectedstagedetails);
            var seatgroup = new Konva.Group({
                x: -1,
                id: time+n,
                class: time+n,
                width:10,
                type:"sectionrowgroup"
            });
            var rowseatalloroddoreven = $("#cOddEven").children("option:selected").val();
            var fromseatforrow = $('#fromseatforrow').val();
            fromseatforrow = parseInt(fromseatforrow);
            var toseatforrow = $('#Toseatforrow').val();
            toseatforrow = parseInt(toseatforrow);
            var ascdsc = $("#ascdes").children("option:selected").val();
            var rect = new Konva.Rect({
                width: 100,
                height: 20,
                stroke: '#0d66b6',
                type:"sectionrow",
                id:rowseatalloroddoreven+shape[0].children.length+slectedstagedetails.x+time,
                strokeWidth: 1,
                showroweditor: 'yes',
                fromseatforrow: fromseatforrow,
                toseatforrow:toseatforrow,
                rowname:rowname,
                selectedsectionid:slectedstagedetails.id,
                rowseatalloroddoreven:rowseatalloroddoreven,
                sectiongroupboxid:time+n,
                seatgroupid:slectedstagedetails.tt+shape[0].children.length+"sectionrowgroup",
                ascdsc:ascdsc
            });
            if( rowseatalloroddoreven == 1  && ascdsc == 1) {
                rect.width((30 + (toseatforrow - fromseatforrow)* 15));
                seatgroup.add(rect);
                var i=0, x;
                var k = 0;
                for(i=fromseatforrow;i<=toseatforrow;i++) {
                    k+=1;
                    var circle = new Konva.Circle({
                        x: k * 15,
                        y: 10,
                        radius: 5,
                        ishide:"novalue",
                        fill: '#ddd',
                        stroke: '#aaa',
                        strokeWidth: 1,
                        seatno: i,
                        name:i+k+slectedstagedetails.id + time,
                        rowname:rowname,
                        restricted:false,
                        accessibility:0,
                        selectedsectionid:slectedstagedetails.id,
                        showseateditor:'yes',
                        id: slectedstagedetails.tt+shape[0].children.length+"sectionrowgroup"+"seat",
                        type: "rowindividualseats",
                        category:"seats"
                    });
                    seatgroup.add(circle);
                }
                var kk = stage.find('#'+slectedstagedetails.id);
                if(kk[0].attrs.width > 30 + (toseatforrow - fromseatforrow)* 15) {
                }
                else {
                    kk.width(((30 + (toseatforrow - fromseatforrow)* 15)));
                }
            }
            if( rowseatalloroddoreven == 1  && ascdsc == 2) {
                rect.width((30 + (toseatforrow - fromseatforrow)* 15));
                seatgroup.add(rect);
                var i=0, x;
                var k = 0;
                for(i=toseatforrow;i>=fromseatforrow;i--) {
                    k+=1;
                    var circle = new Konva.Circle({
                        x: k * 15,
                        y: 10,
                        radius: 5,
                        ishide: "novalue",
                        fill: '#ddd',
                        stroke: '#aaa',
                        strokeWidth: 1,
                        seatno: i,
                        rowname:rowname,
                        restricted:false,
                        accessibility:0,
                        name:i+k+time+slectedstagedetails.id + time,
                        selectedsectionid:slectedstagedetails.id,
                        showseateditor:'yes',
                        id: slectedstagedetails.tt+shape[0].children.length+"sectionrowgroup"+"seat",
                        type: "rowindividualseats",
                        category:"seats"
                    });
                    seatgroup.add(circle);
                }
                var kk = stage.find('#'+slectedstagedetails.id);
                if(kk[0].attrs.width > 30 + (toseatforrow - fromseatforrow)* 15) {
                }
                else {
                    kk.width(((30 + (toseatforrow - fromseatforrow)* 15)));
                }
            }
            if( rowseatalloroddoreven == 2 && ascdsc == 1) {
                rect.width((30 + (toseatforrow - fromseatforrow)* 7.5));
                seatgroup.add(rect);
                var i=0, x;
                var k = 0;
                for(i=fromseatforrow;i<=toseatforrow;i++) {
                    k+=1;
                    var circle = new Konva.Circle({
                        x: k * 15,
                        y: 10,
                        radius: 5,
                        ishide: "novalue",
                        fill: '#ddd',
                        stroke: '#aaa',
                        strokeWidth: 1,
                        rowname:rowname,
                        restricted:false,
                        accessibility:0,
                        name:i+k+slectedstagedetails.id + time,
                        showseateditor:'yes',
                        seatno: i,
                        selectedsectionid:slectedstagedetails.id,
                        id: slectedstagedetails.tt+shape[0].children.length+"sectionrowgroup"+"seat",
                        type: "rowindividualseats",
                        category:"seats"
                    });
                    i++;
                    seatgroup.add(circle);
                }
                var kk = stage.find('#'+slectedstagedetails.id);
                if(kk[0].attrs.width > 30 + (toseatforrow - fromseatforrow)* 7.5) {
                }
                else {
                    kk.width(((30 + (toseatforrow - fromseatforrow)* 7.5)));
                }
            }
            if( rowseatalloroddoreven == 2 && ascdsc == 2) {
                rect.width((30 + (toseatforrow - fromseatforrow)* 7.5));
                seatgroup.add(rect);
                var i=0, x;
                var k = 0;
                for(i=toseatforrow;i>=fromseatforrow;i--) {
                    k+=1;
                    var circle = new Konva.Circle({
                        x: k * 15,
                        y: 10,
                        radius: 5,
                        ishide: "novalue",
                        fill: '#ddd',
                        stroke: '#aaa',
                        strokeWidth: 1,
                        rowname:rowname,
                        restricted:false,
                        accessibility:0,
                        name:i+k+slectedstagedetails.id + time,
                        showseateditor:'yes',
                        seatno: i,
                        selectedsectionid:slectedstagedetails.id,
                        id: slectedstagedetails.tt+shape[0].children.length+"sectionrowgroup"+"seat",
                        type: "rowindividualseats",
                        category:"seats"
                    });
                    i--;
                    seatgroup.add(circle);
                }
                var kk = stage.find('#'+slectedstagedetails.id);
                if(kk[0].attrs.width > 30 + (toseatforrow - fromseatforrow)* 7.5) {
                }
                else {
                    kk.width(((30 + (toseatforrow - fromseatforrow)* 7.5)));
                }
            }
            if( rowseatalloroddoreven == 3 && ascdsc == 1) {
                rect.width((30 + (toseatforrow - fromseatforrow)* 7.5 ));
                seatgroup.add(rect);
                var i=0, x;
                var k = 0;
                for(i=fromseatforrow;i<=toseatforrow;i++) {
                    k+=1;
                    var circle = new Konva.Circle({
                        x: k * 15,
                        y: 10,
                        radius: 5,
                        ishide: "novalue",
                        fill: '#ddd',
                        stroke: '#aaa',
                        strokeWidth: 1,
                        seatno: i,
                        rowname:rowname,
                        restricted:false,
                        accessibility:0,
                        name:i+k+slectedstagedetails.id + time,
                        showseateditor:'yes',
                        selectedsectionid:slectedstagedetails.id,
                        id: slectedstagedetails.tt+shape[0].children.length+"sectionrowgroup"+"seat",
                        type: "rowindividualseats",
                        category:"seats"
                    });
                    i++;
                    seatgroup.add(circle);
                }
                var kk = stage.find('#'+slectedstagedetails.id);
                if(kk[0].attrs.width > 30 + (toseatforrow - fromseatforrow) * 7.5 ) {
                }
                else {
                    kk.width(((30 + (toseatforrow - fromseatforrow)* 7.5)));
                }
            }
            if( rowseatalloroddoreven == 3 && ascdsc == 2) {
                rect.width((30 + (toseatforrow - fromseatforrow)* 7.5 ));
                seatgroup.add(rect);
                var i=0, x;
                var k = 0;
                for(i=toseatforrow;i>=fromseatforrow;i--) {
                    k+=1;
                    var circle = new Konva.Circle({
                        x: k * 15,
                        y: 10,
                        radius: 5,
                        ishide: "novalue",
                        fill: '#ddd',
                        stroke: '#aaa',
                        rowname:rowname,
                        strokeWidth: 1,
                        seatno: i,
                        name:i+k+slectedstagedetails.id + time,
                        showseateditor:'yes',
                        restricted:false,
                        accessibility:0,
                        selectedsectionid:slectedstagedetails.id,
                        id: slectedstagedetails.tt+shape[0].children.length+"sectionrowgroup"+"seat",
                        type: "rowindividualseats",
                        category:"seats"
                    });
                    i--;
                    seatgroup.add(circle);
                }
                var kk = stage.find('#'+slectedstagedetails.id);
                if(kk[0].attrs.width > 30 + (toseatforrow - fromseatforrow) * 7.5 ) {
                }
                else {
                    kk.width(((30 + (toseatforrow - fromseatforrow)* 7.5)));
                }
            }
            shape.add(seatgroup);
            layer.draw();
            n = n + 1;
            var newid = stage.find("#"+slectedstagedetails.cc);
            var rect1 = stage.find("#"+newid[0].children[0].attrs.id);
            for(i = 3;i<newid[0].children.length;i++) {
                var changeyid = stage.find('#'+newid[0].children[i].attrs.id);
                changeyid.y(((i - 3) * 25) - 25);
                rect1.y(((i - 3) * 25));
                //rect1.width(20);
            }
            if(newid[0].children.length > 3) {
                rect1.show();
                layer.draw();
            }
            else  {
                rect1.hide();
                layer.draw();
            }
            var alignmentwidth = stage.find('#'+newid[0].children[1].attrs.id);
            alignmentwidth = alignmentwidth[0].attrs.width;
            var alignmentwidthvalue;
            if (kk.length != 1) {
                if (kk[1].attrs.type == "section"){
                    alignmentwidthvalue = kk[1].attrs.alignmentforsection;
                }
            }
            else if (kk[0].attrs.type == "lastrowincriment") {
                alignmentwidthvalue = kk[0].parent.children[2].attrs.alignmentforsection;
            }
            if(alignmentwidthvalue == 0) {
                for(i = 4;i<newid[0].children.length;i++) {
                    var changeyid = stage.find('#'+newid[0].children[i].attrs.id);
                    changeyid.x(0);
                }
            }
            if(alignmentwidthvalue == 1) {
                for(i = 4;i<newid[0].children.length;i++) {
                    var changeyid = stage.find('#'+newid[0].children[i].attrs.id);
                    changeyid.x((alignmentwidth/2) - ((changeyid[0].children[0].attrs.width)/2));
                }
            }
            if(alignmentwidthvalue == 2) {
                for(i = 4;i<newid[0].children.length;i++) {
                    var changeyid = stage.find('#'+newid[0].children[i].attrs.id);
                    changeyid.x(alignmentwidth - changeyid[0].children[0].attrs.width);
                }
            }
            layer.draw();
    }
    var json = layer.toJSON();
    $("#sketchpaddata").val(json);
    showloader();
}
$('.row-edit-save-save').click(function(e){
    var rowname = $("#rowname").val();
    var fromseatforrow = $("#fromseatforrow").val();
    var toseatforrow = $("#Toseatforrow").val();
    var rowseatalloroddoreven = $("#cOddEven").children("option:selected").val();
    if(rowname.trim() != '' && fromseatforrow.trim() != '' && toseatforrow.trim() != '') {
        fromseatforrow = parseInt(fromseatforrow);
        toseatforrow = parseInt(toseatforrow);
        if( rowseatalloroddoreven == 1){
            if(toseatforrow >= fromseatforrow) {
                roweditsave();
            }
            else {
                $("#editorerrorpopup").dialog("open");
            }
        }
        if( rowseatalloroddoreven == 2){
            if(toseatforrow >= fromseatforrow) {
                if(toseatforrow % 2 == 1 && fromseatforrow % 2 == 1){
                    roweditsave();
                }
                else {
                    $("#editorerrorpopup").dialog("open");
                }   
            }
            else {
                $("#editorerrorpopup").dialog("open");
            }
        }
        if( rowseatalloroddoreven == 3){
            if(toseatforrow >= fromseatforrow) {
                if(toseatforrow % 2 == 0 && fromseatforrow % 2 == 0){
                    roweditsave();
                }
                else {
                    $("#editorerrorpopup").dialog("open");
                }   
            }
            else {
                $("#editorerrorpopup").dialog("open");
            }
        }
    }
    else {
        $("#editorerrorpopup").dialog("open");
    }
})
function roweditsave() {
    var dt = new Date();
    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    $("#rowpopup").dialog("close");
    var hideid = stage.find('#'+slectedstagedetails.seatgroupid+"seat");
    hideid.destroy();
    layer.draw();
    var rowname = $("#rowname").val();
    var rowseatalloroddoreven = $("#cOddEven").children("option:selected").val();
    var ascdsc = $("#ascdes").children("option:selected").val();
    var fromseatforrow = $('#fromseatforrow').val();
    fromseatforrow = parseInt(fromseatforrow);
    var toseatforrow = $('#Toseatforrow').val();
    toseatforrow = parseInt(toseatforrow);
    var rect = stage.find('#'+slectedstagedetails.id);
    rect.setAttr('rowseatalloroddoreven', rowseatalloroddoreven);
    rect.setAttr('fromseatforrow', fromseatforrow);
    rect.setAttr('toseatforrow', toseatforrow);
    rect.setAttr('rowname', rowname);
    rect.setAttr('ascdsc', ascdsc);
    var group = stage.find('#'+slectedstagedetails.sectiongroupboxid);
    if( rowseatalloroddoreven == 1 && ascdsc == 1) {
        rect.width((30 + (toseatforrow - fromseatforrow)* 15));
        var i=0, x;
        var k = 0;
        for(i=fromseatforrow;i<=toseatforrow;i++) {
            k+=1;
            var circle = new Konva.Circle({
                x: k * 15,
                y: 10,
                radius: 5,
                ishide: "novalue",
                fill: '#ddd',
                stroke: '#aaa',
                strokeWidth: 1,
                seatno: i,
                rowname:rowname,
                restricted:false,
                accessibility:0,
                name:i+k+slectedstagedetails.id + time,
                showseateditor:'yes',
                selectedsectionid:slectedstagedetails.id,
                //showseateditor:'yes',
                id: slectedstagedetails.seatgroupid+"seat",
                type: "rowindividualseats",
                category:"seats",
                //draggable:true
            });
            group.add(circle);
        }
        layer.draw();
        var kk = stage.find('#'+slectedstagedetails.selectedsectionid);
        if(kk[0].attrs.type == "section") {
            var tempwidthkk;
            tempwidthkk = kk[0].attrs.width;
            if(tempwidthkk > 30 + (toseatforrow - fromseatforrow)* 15) {
                var cc = stage.find('#'+slectedstagedetails.sectiongroupboxid);
                var tempwidth = 200;
                for(var i= 3; i<= cc[0].parent.children.length - 1;i++) {
                    if(cc[0].parent.children[i].children.length != 0) {
                        if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                            tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                        }
                    }
                }
                kk.width(tempwidth);
            }
            else if ((30 + (toseatforrow - fromseatforrow)* 15) > 200) {
                kk.width((30 + (toseatforrow - fromseatforrow)* 15));
            }
            else if(tempwidth < 200) {
                kk.width(200);
            }
        }
        if(kk[0].attrs.type == "lastrowincriment") {
            var tempwidthkk;
            var tempwidth = 200;
            tempwidthkk = kk[0].parent.children[1].attrs.width;
            if(tempwidthkk == undefined) {
                tempwidthkk = kk[0].attrs.width;
            }
            var scid = stage.find("#"+slectedstagedetails.sectiongroupboxid);
            if(tempwidthkk < 30 + (toseatforrow - fromseatforrow)* 15) {
                var cc = stage.find('#'+slectedstagedetails.selectedsectionid);
                //console.log(cc);
                for(var i= 4; i<= cc[0].parent.children.length - 1;i++) {
                    if(cc[0].parent.children[i].children.length != 0) {
                        if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                            tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                        }
                    }
                }
                var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                kk.width(tempwidth);
            }
            else if ((30 + (toseatforrow - fromseatforrow)* 15) < tempwidthkk) {
                var cc = stage.find('#'+slectedstagedetails.selectedsectionid);
                //console.log(cc);
                for(var i= 4; i<= cc[0].parent.children.length - 1;i++) {
                    if(cc[0].parent.children[i].children.length != 0) {
                        if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                            tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                        }
                    }
                }
                var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                kk.width(tempwidth);
            }
            else if(tempwidth < 200) {
                var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                kk.width(200);
            }
            layer.draw();
        }
    }
    if( rowseatalloroddoreven == 1 && ascdsc == 2) {
        rect.width((30 + (toseatforrow - fromseatforrow)* 15));
        var i=0, x;
        var k = 0;
        for(i=toseatforrow;i>=fromseatforrow;i--) {
            k+=1;
            var circle = new Konva.Circle({
                x: k * 15,
                y: 10,
                radius: 5,
                ishide: "novalue",
                fill: '#ddd',
                stroke: '#aaa',
                strokeWidth: 1,
                seatno: i,
                rowname:rowname,
                restricted:false,
                accessibility:0,
                name:i+k+slectedstagedetails.id + time,
                selectedsectionid:slectedstagedetails.id,
                showseateditor:'yes',
                id: slectedstagedetails.seatgroupid+"seat",
                type: "rowindividualseats",
                category:"seats"
            });
            group.add(circle);
        }
        layer.draw();
        var kk = stage.find('#'+slectedstagedetails.selectedsectionid);
        if(kk[0].attrs.type == "section") {
            var tempwidthkk;
            tempwidthkk = kk[0].attrs.width;
            if(tempwidthkk > 30 + (toseatforrow - fromseatforrow)* 15) {
                var cc = stage.find('#'+slectedstagedetails.sectiongroupboxid);
                var tempwidth = 200;
                for(var i= 3; i<= cc[0].parent.children.length - 1;i++) {
                    if(cc[0].parent.children[i].children.length != 0) {
                        if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                            tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                        }
                    }
                }
                kk.width(tempwidth);
            }
            else if ((30 + (toseatforrow - fromseatforrow)* 15) > 200) {
                kk.width((30 + (toseatforrow - fromseatforrow)* 15));
            }
            else if(tempwidth < 200) {
                kk.width(200);
            }
        }
        if(kk[0].attrs.type == "lastrowincriment") {
            var tempwidthkk;
            var tempwidth = 200;
            tempwidthkk = kk[0].parent.children[1].attrs.width;
            if(tempwidthkk == undefined) {
                tempwidthkk = kk[0].attrs.width;
            }
            var scid = stage.find("#"+slectedstagedetails.sectiongroupboxid);
            if(tempwidthkk < 30 + (toseatforrow - fromseatforrow)* 15) {
                var cc = stage.find('#'+slectedstagedetails.selectedsectionid);
                //console.log(cc);
                for(var i= 4; i<= cc[0].parent.children.length - 1;i++) {
                    if(cc[0].parent.children[i].children.length != 0) {
                        if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                            tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                        }
                    }
                }
                var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                kk.width(tempwidth);
            }
            else if ((30 + (toseatforrow - fromseatforrow)* 15) < tempwidthkk) {
                var cc = stage.find('#'+slectedstagedetails.selectedsectionid);
                //console.log(cc);
                for(var i= 4; i<= cc[0].parent.children.length - 1;i++) {
                    if(cc[0].parent.children[i].children.length != 0) {
                        if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                            tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                        }
                    }
                }
                var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                kk.width(tempwidth);
            }
            else if(tempwidth < 200) {
                var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                kk.width(200);
            }
            layer.draw();
        }
    }
    if( rowseatalloroddoreven == 2  && ascdsc == 1) {
        rect.width((30 + (toseatforrow - fromseatforrow)* 7.5));
        var i=0, x;
        var k = 0;
        for(i=fromseatforrow;i<=toseatforrow;i++) {
            k+=1;
            var circle = new Konva.Circle({
                x: k * 15,
                y: 10,
                radius: 5,
                ishide: "novalue",
                fill: '#ddd',
                stroke: '#aaa',
                strokeWidth: 1,
                seatno: i,
                rowname:rowname,
                restricted:false,
                accessibility:0,
                name:i+k+slectedstagedetails.id + time,
                selectedsectionid:slectedstagedetails.id,
                showseateditor:'yes',
                id: slectedstagedetails.seatgroupid+"seat",
                type: "rowindividualseats",
                category:"seats"
            });
            i++;
            group.add(circle);
        }
        layer.draw();
        var kk = stage.find('#'+slectedstagedetails.selectedsectionid);
        if(kk[0].attrs.type == "section") {
            var tempwidthkk;
            tempwidthkk = kk[0].attrs.width;
            if(tempwidthkk > 30 + (toseatforrow - fromseatforrow)* 7.5) {
                var cc = stage.find('#'+slectedstagedetails.sectiongroupboxid);
                var tempwidth = 200;
                for(var i= 3; i<= cc[0].parent.children.length - 1;i++) {
                    if(cc[0].parent.children[i].children.length != 0) {
                        if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                            tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                        }
                    }
                }
                kk.width(tempwidth);
            }
            else if ((30 + (toseatforrow - fromseatforrow)* 7.5) > 200) {
                kk.width((30 + (toseatforrow - fromseatforrow)* 7.5));
            }
            else if(tempwidth < 200) {
                kk.width(200);
            }
        }
        if(kk[0].attrs.type == "lastrowincriment") {
            var tempwidthkk;
            var tempwidth = 200;
            tempwidthkk = kk[0].parent.children[1].attrs.width;
            if(tempwidthkk == undefined) {
                tempwidthkk = kk[0].attrs.width;
            }
            var scid = stage.find("#"+slectedstagedetails.sectiongroupboxid);
            if(tempwidthkk < 30 + (toseatforrow - fromseatforrow)* 7.5) {
                var cc = stage.find('#'+slectedstagedetails.selectedsectionid);
                //console.log(cc);
                for(var i= 4; i<= cc[0].parent.children.length - 1;i++) {
                    if(cc[0].parent.children[i].children.length != 0) {
                        if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                            tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                        }
                    }
                }
                var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                kk.width(tempwidth);
            }
            else if ((30 + (toseatforrow - fromseatforrow)* 7.5) < tempwidthkk) {
                var cc = stage.find('#'+slectedstagedetails.selectedsectionid);
                //console.log(cc);
                for(var i= 4; i<= cc[0].parent.children.length - 1;i++) {
                    if(cc[0].parent.children[i].children.length != 0) {
                        if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                            tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                        }
                    }
                }
                var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                kk.width(tempwidth);
            }
            else if(tempwidth < 200) {
                var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                kk.width(200);
            }
            layer.draw();
        }
    }
    if( rowseatalloroddoreven == 2  && ascdsc == 2) {
        rect.width((30 + (toseatforrow - fromseatforrow)* 7.5));
        var i=0, x;
        var k = 0;
        for(i=toseatforrow;i>=fromseatforrow;i--) {
            k+=1;
            var circle = new Konva.Circle({
                x: k * 15,
                y: 10,
                radius: 5,
                ishide: "novalue",
                fill: '#ddd',
                stroke: '#aaa',
                strokeWidth: 1,
                seatno: i,
                rowname:rowname,
                restricted:false,
                accessibility:0,
                name:i+k+slectedstagedetails.id + time,
                selectedsectionid:slectedstagedetails.id,
                showseateditor:'yes',
                id: slectedstagedetails.seatgroupid+"seat",
                type: "rowindividualseats",
                category:"seats"
            });
            i--;
            group.add(circle);
        }
        layer.draw();
        var kk = stage.find('#'+slectedstagedetails.selectedsectionid);
        if(kk[0].attrs.type == "section") {
            var tempwidthkk;
            tempwidthkk = kk[0].attrs.width;
            if(tempwidthkk > 30 + (toseatforrow - fromseatforrow)* 7.5) {
                var cc = stage.find('#'+slectedstagedetails.sectiongroupboxid);
                var tempwidth = 200;
                for(var i= 3; i<= cc[0].parent.children.length - 1;i++) {
                    if(cc[0].parent.children[i].children.length != 0) {
                        if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                            tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                        }
                    }
                }
                kk.width(tempwidth);
            }
            else if ((30 + (toseatforrow - fromseatforrow)* 7.5) > 200) {
                kk.width((30 + (toseatforrow - fromseatforrow)* 7.5));
            }
            else if(tempwidth < 200) {
                kk.width(200);
            }
        }
        if(kk[0].attrs.type == "lastrowincriment") {
            var tempwidthkk;
            var tempwidth = 200;
            tempwidthkk = kk[0].parent.children[1].attrs.width;
            if(tempwidthkk == undefined) {
                tempwidthkk = kk[0].attrs.width;
            }
            var scid = stage.find("#"+slectedstagedetails.sectiongroupboxid);
            if(tempwidthkk < 30 + (toseatforrow - fromseatforrow)* 7.5) {
                var cc = stage.find('#'+slectedstagedetails.selectedsectionid);
                //console.log(cc);
                for(var i= 4; i<= cc[0].parent.children.length - 1;i++) {
                    if(cc[0].parent.children[i].children.length != 0) {
                        if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                            tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                        }
                    }
                }
                var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                kk.width(tempwidth);
            }
            else if ((30 + (toseatforrow - fromseatforrow)* 7.5) < tempwidthkk) {
                var cc = stage.find('#'+slectedstagedetails.selectedsectionid);
                //console.log(cc);
                for(var i= 4; i<= cc[0].parent.children.length - 1;i++) {
                    if(cc[0].parent.children[i].children.length != 0) {
                        if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                            tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                        }
                    }
                }
                var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                kk.width(tempwidth);
            }
            else if(tempwidth < 200) {
                var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                kk.width(200);
            }
            layer.draw();
        }
    }
        if( rowseatalloroddoreven == 3 && ascdsc == 1) {
            rect.width((30 + (toseatforrow - fromseatforrow)* 7.5));
            var i=0, x;
            var k = 0;
            for(i=fromseatforrow;i<=toseatforrow;i++) {
                k+=1;
                var circle = new Konva.Circle({
                    x: k * 15,
                    y: 10,
                    radius: 5,
                    ishide: "novalue",
                    fill: '#ddd',
                    stroke: '#aaa',
                    strokeWidth: 1,
                    seatno: i,
                    name:i+k+slectedstagedetails.id + time,
                    restricted:false,
                    accessibility:0,
                    rowname:rowname,
                    selectedsectionid:slectedstagedetails.id,
                    showseateditor:'yes',
                    id: slectedstagedetails.seatgroupid+"seat",
                    type: "rowindividualseats",
                    category:"seats"
                });
                i++;
                group.add(circle);
            }
            layer.draw();
            var kk = stage.find('#'+slectedstagedetails.selectedsectionid);
            if(kk[0].attrs.type == "section") {
                var tempwidthkk;
                tempwidthkk = kk[0].attrs.width;
                if(tempwidthkk > 30 + (toseatforrow - fromseatforrow)* 7.5) {
                    var cc = stage.find('#'+slectedstagedetails.sectiongroupboxid);
                    var tempwidth = 200;
                    for(var i= 3; i<= cc[0].parent.children.length - 1;i++) {
                        if(cc[0].parent.children[i].children.length != 0) {
                            if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                                tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                            }
                        }
                    }
                    kk.width(tempwidth);
                }
                else if ((30 + (toseatforrow - fromseatforrow)* 7.5) > 200) {
                    kk.width((30 + (toseatforrow - fromseatforrow)* 7.5));
                }
                else if(tempwidth < 200) {
                    kk.width(200);
                }
            }
            if(kk[0].attrs.type == "lastrowincriment") {
                var tempwidthkk;
                var tempwidth = 200;
                tempwidthkk = kk[0].parent.children[1].attrs.width;
                if(tempwidthkk == undefined) {
                    tempwidthkk = kk[0].attrs.width;
                }
                var scid = stage.find("#"+slectedstagedetails.sectiongroupboxid);
                if(tempwidthkk < 30 + (toseatforrow - fromseatforrow)* 7.5) {
                    var cc = stage.find('#'+slectedstagedetails.selectedsectionid);
                    //console.log(cc);
                    for(var i= 4; i<= cc[0].parent.children.length - 1;i++) {
                        if(cc[0].parent.children[i].children.length != 0) {
                            if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                                tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                            }
                        }
                    }
                    var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                    kk.width(tempwidth);
                }
                else if ((30 + (toseatforrow - fromseatforrow)* 7.5) < tempwidthkk) {
                    var cc = stage.find('#'+slectedstagedetails.selectedsectionid);
                    //console.log(cc);
                    for(var i= 4; i<= cc[0].parent.children.length - 1;i++) {
                        if(cc[0].parent.children[i].children.length != 0) {
                            if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                                tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                            }
                        }
                    }
                    var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                    kk.width(tempwidth);
                }
                else if(tempwidth < 200) {
                    var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                    kk.width(200);
                }
                layer.draw();
            }
        }
        if( rowseatalloroddoreven == 3 && ascdsc == 2) {
            rect.width((30 + (toseatforrow - fromseatforrow)* 7.5));
            var i=0, x;
            var k = 0;
            for(i=toseatforrow;i>=fromseatforrow;i--) {
                k+=1;
                var circle = new Konva.Circle({
                    x: k * 15,
                    y: 10,
                    radius: 5,
                    ishide: "novalue",
                    fill: '#ddd',
                    stroke: '#aaa',
                    strokeWidth: 1,
                    seatno: i,
                    rowname:rowname,
                    restricted:false,
                    accessibility:0,
                    name:i+k+slectedstagedetails.id + time,
                    selectedsectionid:slectedstagedetails.id,
                    showseateditor:'yes',
                    id: slectedstagedetails.seatgroupid+"seat",
                    type: "rowindividualseats",
                    category:"seats"
                });
                i--;
                group.add(circle);
            }
            layer.draw();
            var kk = stage.find('#'+slectedstagedetails.selectedsectionid);
            if(kk[0].attrs.type == "section") {
                var tempwidthkk;
                tempwidthkk = kk[0].attrs.width;
                if(tempwidthkk > 30 + (toseatforrow - fromseatforrow)* 7.5) {
                    var cc = stage.find('#'+slectedstagedetails.sectiongroupboxid);
                    var tempwidth = 200;
                    for(var i= 3; i<= cc[0].parent.children.length - 1;i++) {
                        if(cc[0].parent.children[i].children.length != 0) {
                            if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                                tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                            }
                        }
                    }
                    kk.width(tempwidth);
                }
                else if ((30 + (toseatforrow - fromseatforrow)* 7.5) > 200) {
                    kk.width((30 + (toseatforrow - fromseatforrow)* 7.5));
                }
                else if(tempwidth < 200) {
                    kk.width(200);
                }
            }
            if(kk[0].attrs.type == "lastrowincriment") {
                var tempwidthkk;
                var tempwidth = 200;
                tempwidthkk = kk[0].parent.children[1].attrs.width;
                if(tempwidthkk == undefined) {
                    tempwidthkk = kk[0].attrs.width;
                }
                var scid = stage.find("#"+slectedstagedetails.sectiongroupboxid);
                if(tempwidthkk < 30 + (toseatforrow - fromseatforrow)* 7.5) {
                    var cc = stage.find('#'+slectedstagedetails.selectedsectionid);
                    //console.log(cc);
                    for(var i= 4; i<= cc[0].parent.children.length - 1;i++) {
                        if(cc[0].parent.children[i].children.length != 0) {
                            if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                                tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                            }
                        }
                    }
                    var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                    kk.width(tempwidth);
                }
                else if ((30 + (toseatforrow - fromseatforrow)* 7.5) < tempwidthkk) {
                    var cc = stage.find('#'+slectedstagedetails.selectedsectionid);
                    //console.log(cc);
                    for(var i= 4; i<= cc[0].parent.children.length - 1;i++) {
                        if(cc[0].parent.children[i].children.length != 0) {
                            if ((cc[0].parent.children[i].children[0].attrs.width) > tempwidth ) {
                                tempwidth = cc[0].parent.children[i].children[0].attrs.width;
                            }
                        }
                    }
                    var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                    kk.width(tempwidth);
                }
                else if(tempwidth < 200) {
                    var kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
                    kk.width(200);
                }
                layer.draw();
            }
        }
        // var  mn = stage.find("#"+slectedstagedetails.selectedsectionid);
        // var rect1 = stage.find("#"+mn[0].attrs.id);
        //var newid = stage.find("#"+slectedstagedetails.tt);
        // var rect1 = stage.find("#"+newid[0].children[0].attrs.id);
        // rect1.width(20);
        // var newrect1 = stage.find('#'+kk[0].parent.children[0].attrs.id);
        // newrect1.width(20);
        layer.draw();
        var newid = stage.find("#"+slectedstagedetails.selectedsectionid);
        //console.log(newid);
        //var alignmentwidth = stage.find('#'+newid[0].children[1].attrs.id);
        var alignmentwidth;
        if(newid[0].attrs.type == "section"){
           alignmentwidth=  newid[0].attrs.width;
        }
        else if(newid[0].attrs.type == "lastrowincriment") {
            alignmentwidth = newid[0].parent.children[1].attrs.width;
        }

            var alignmentwidthvalue;
            if (kk.length != 1) {
                if (kk[1].attrs.type == "section"){
                    alignmentwidthvalue = kk[1].attrs.alignmentforsection;
                }
            }
            else if (kk[0].attrs.type == "lastrowincriment") {
                alignmentwidthvalue = kk[0].parent.children[2].attrs.alignmentforsection;
            }
            if(parseInt(alignmentwidthvalue) == 0) {
                for(i = 4;i<newid[0].children.length;i++) {
                    var changeyid = stage.find('#'+newid[0].children[i].attrs.id);
                    changeyid.x(0);
                }
            }
            if(parseInt(alignmentwidthvalue) == 1) {
                for(i = 4;i<newid[0].parent.children.length;i++) {
                    var changeyid = stage.find('#'+newid[0].parent.children[i].attrs.id);
                    if(alignmentwidth/2 > ((changeyid[0].children[0].attrs.width)/2) ) {
                        changeyid.x((alignmentwidth/2) - ((changeyid[0].children[0].attrs.width)/2));
                    }
                    else if (alignmentwidth/2 <= ((changeyid[0].children[0].attrs.width)/2)) {
                        changeyid.x(((changeyid[0].children[0].attrs.width)/2) - (alignmentwidth/2));
                    }
                }
            }
            if(parseInt(alignmentwidthvalue) == 2) {
                for(i = 4;i<newid[0].parent.children.length;i++) {
                    var changeyid = stage.find('#'+newid[0].parent.children[i].attrs.id);
                    changeyid.x(alignmentwidth - changeyid[0].children[0].attrs.width);
                }
            }
            layer.draw();
            var json = layer.toJSON();
            $("#sketchpaddata").val(json);
            showloader();
}
$('.delete-row').click(function(e){
  $("#rowpopup").dialog("close");
    var rowname = $("#rowname").val();
    if( rowname.trim() != '') {
      var deleteid =  stage.find("#"+slectedstagedetails.sectiongroupboxid);
      deleteid.destroy();
      layer.draw();
      var newid = stage.find("#"+slectedstagedetails.selectedsectionid);
      var rowresetid = stage.find('#'+newid[0].attrs.cc);
        var tempwidth = 200;
        var rect1 = stage.find("#"+rowresetid[0].children[0].attrs.id);
        if(rowresetid[0].attrs.type == "section") {
          for(i = 4;i<rowresetid[0].children.length;i++) {
            var changeyid = stage.find('#'+rowresetid[0].children[i].attrs.id);
            changeyid.y(((i - 3) * 25) - 25);
                rect1.y(((i - 3) * 25));
                if(changeyid[0].children.length != 0) {
                    if(changeyid[0].children[0].attrs.width > tempwidth) {
                       tempwidth =  changeyid[0].children[0].attrs.width;
                    }
                }
          }
        }
        if(rowresetid[0].children.length > 4) {
            rect1.show();
            layer.draw();
        }
        else if(rowresetid[0].children.length <= 4) {
            rect1.hide();
            layer.draw();
        }

        var kk = stage.find('#'+slectedstagedetails.selectedsectionid);
        if(kk[0].attrs.type == "lastrowincriment") {
            kk = stage.find("#"+kk[0].parent.children[1].attrs.id);
        }
        kk.width(tempwidth);
        //rect1.width(20);
        layer.draw();
        layer.draw();
        var newid = stage.find("#"+slectedstagedetails.selectedsectionid);
        var alignmentwidth;
        if(newid[0].attrs.type == "section"){
            alignmentwidth=  newid[0].attrs.width;
        }
        else if(newid[0].attrs.type == "lastrowincriment") {
            alignmentwidth = newid[0].parent.children[1].attrs.width;
        }
        var alignmentwidthvalue;
        if (kk.length != 1) {
            if (kk[1].attrs.type == "section"){
                alignmentwidthvalue = kk[1].attrs.alignmentforsection;
            }
        }
        else if (kk[0].attrs.type == "lastrowincriment") {
            alignmentwidthvalue = kk[0].parent.children[2].attrs.alignmentforsection;
        }
        if(alignmentwidthvalue == 0) {
            for(i = 4;i<newid[0].children.length;i++) {
                var changeyid = stage.find('#'+newid[0].children[i].attrs.id);
                changeyid.x(0);
            }
        }
        if(parseInt(alignmentwidthvalue) == 1) {
            for(i = 4;i<newid[0].parent.children.length;i++) {
                var changeyid = stage.find('#'+newid[0].parent.children[i].attrs.id);
                if(alignmentwidth/2 > ((changeyid[0].children[0].attrs.width)/2) ) {
                    changeyid.x((alignmentwidth/2) - ((changeyid[0].children[0].attrs.width)/2));
                }
                else if (alignmentwidth/2 <= ((changeyid[0].children[0].attrs.width)/2)) {
                    changeyid.x(((changeyid[0].children[0].attrs.width)/2) - (alignmentwidth/2));
                }
            }
        }
        if(parseInt(alignmentwidthvalue) == 2) {
            for(i = 4;i<newid[0].parent.children.length;i++) {
                var changeyid = stage.find('#'+newid[0].parent.children[i].attrs.id);
                changeyid.x(alignmentwidth - changeyid[0].children[0].attrs.width);
            }
        }
        layer.draw();
    }
    else {
        $("#editorerrorpopup").dialog("open");
    }
    var json = layer.toJSON();
    $("#sketchpaddata").val(json);
    showloader();
})
$(".other-edit-tooltips").click(function(e){
    stage_edit_tooltip_option = e.target.id;
    $('.other-edit-tooltips').css('display','none');
    if(stage_edit_tooltip_option == "Rename") {
        $("#Otherrename" ).dialog('open');
        $('#otherrename').val(slectedstagedetails.stagename);
    }
    if(stage_edit_tooltip_option == "deleteother") {
        deletemainmenuoption();
    }
    else if (stage_edit_tooltip_option == "Rotate"){
        rotateshape();
    }
})
$(".other-renamesave").click(function(e){
    var shape = stage.find('#'+slectedstagedetails.tt);
    var shapetext = stage.find('#'+slectedstagedetails.tt+'stagename');
    var stagename = $("#otherrename").val();
    shapetext.text(stagename);
    var shapetextsave = stage.find('#'+slectedstagedetails.tt+'gear');
    var stagename = $("#otherrename").val();
    shapetextsave.setAttr('stagename', stagename);
    var namelabelboxwidth = 100;
    var stagecharactercount = stagename.length;
    if(stagecharactercount > 6) {
        namelabelboxwidth = 0;
        var c = Count(stagename);
        namelabelboxwidth = c[0] * 16 + c[1] * 11 + c[2] * 12 + c[3] * 16 + 10;
    }
    else {
        namelabelboxwidth = 100;
    }
    var gearid = stage.find('#'+slectedstagedetails.id);
    gearid.width(namelabelboxwidth);
    layer.draw();
    // var shapetext = stage.find('#'+slectedstagedetails.tt+'stagename');
    // var stagename = $("#otherrename").val();
    // shapetext.text(otherrename);
    // var shapetextsave = stage.find('#'+slectedstagedetails.tt+'gear');
    // var stagename = $("#otherrename").val();
    // shapetextsave.setAttr('stagename', stagename);
    // layer.draw();
    $("#Otherrename" ).dialog('close');
    var json = layer.toJSON();
    $("#sketchpaddata").val(json);
})
function rotateshape() {
    var top = shapeaddE.evt.screenY + scroll - 250;
    if(top < 0 ) {
        top = 20;
    }
    var x;
    x = shapeaddE.evt.screenX - 20;
    // if(x > 870) {
    //     x = 870;
    // }
    x =  x + ml;
    if( x > 1800) {
        x = 1800;
    }
    // $('.shaperotator').css('top', top + 'px');
    // $('.shaperotator').css('left', x + 'px');
    $('.shaperotator').css('display','block');
}
function deletemainmenuoption() {
    var deletestageshape = stage.find("#"+slectedstagedetails.cc);
    deletestageshape.destroy();
    layer.draw();
    var json = layer.toJSON();
    $("#sketchpaddata").val(json);
}
var lastNum = 0;
function updateTextInput(value) {
    shapecc = stage.find('#'+slectedstagedetails.cc);
    if( value > 4 && value <356 ) {
        if(lastNum < value) {
            shapecc.rotate(value/38);
        } else {
            shapecc.rotate(-value/38);
        }
        lastNum = value;
    }
    else {
        shapecc.rotation(0);
        lastNum = value;
        layer.draw();
    }
    layer.draw();
    var json = layer.toJSON();
    $("#sketchpaddata").val(json);
}
stage.on('click tap', function(e) {
        if (selectionRectangle.visible()) {
            return;
        }
        if (e.target === stage) {
            tr.nodes([]);
            layer.draw();
            return;
        }
        if (!e.target.hasName('rect')) {
            return;
        }
        const metaPressed = e.evt.shiftKey || e.evt.ctrlKey || e.evt.metaKey;
        const isSelected = tr.nodes().indexOf(e.target) >= 0;
        if (!metaPressed && !isSelected) {
            tr.nodes([e.target]);
        } else if (metaPressed && isSelected) {
            const nodes = tr.nodes().slice();
            nodes.splice(nodes.indexOf(e.target), 1);
            tr.nodes(nodes);
        } else if (metaPressed && !isSelected) {
            const nodes = tr.nodes().concat([e.target]);
            tr.nodes(nodes);
        }
        layer.draw();
});
stage.on('mouseup touchend', function() {
        if (!selectionRectangle.visible()) {
            return;
        }
        setTimeout(() => {
            selectionRectangle.visible(false);
            layer.batchDraw();
        });

        var shapes = stage.find('.rect').toArray();
        var box = selectionRectangle.getClientRect();
        var selected = shapes.filter((shape) =>
            Konva.Util.haveIntersection(box, shape.getClientRect())
        );
        tr.nodes(selected);
        isPaint = false;
});
/*need to change new js file*/
$("#cHideSeat").click(function () {
    if ($(this).is(":checked")) {
        $('.notavhideshow').css('display','none');
    } else {
        $('.notavhideshow').css('display','block');
    }
});
/*need to change new js file*/
$("#cRestricted").change(function() {
    if(this.checked) {
    }else{
    }
});
$("#cUpdateSeat").click(function(e){
    if($("#cRestricted").is(':checked')) {
        selectedseatclass.stroke('blue');
        selectedseatclass.setAttr("restricted",true);
    }
    else {
        selectedseatclass.stroke('#aaa');
        selectedseatclass.setAttr("restricted",false);
    }
    if($("#cHideSeat").is(':checked')) {
        selectedseatclass.setAttr("ishide",true);
        selectedseatclass.hide();
    }
    else {
        selectedseatclass.setAttr("ishide",false);
    }
    var accessibility = document.getElementById("cAccessibilityLevel").selectedIndex;
    selectedseatclass.setAttr("accessibility",accessibility);
    var skil = $('.seatstrike');
    var visibleseats = new Array();
    skil.each(function(i) {
        visibleseats.push($(this).text());
    });
    var visibleseatsid = stage.find("#"+selectedseatclass[0].attrs.id);
    // console.log(visibleseatsid);
    var z;
    for(z = 0;z<=visibleseats.length;z++) {
        for(n=0;n<= visibleseatsid.length;n++) {
            if(visibleseatsid[n] != undefined) {
                if(visibleseats[z] == visibleseatsid[n].attrs.seatno) {
                    //console.log(visibleseatsid[n]);
                    var shownseat = stage.find("."+visibleseatsid[n].attrs.name);
                    shownseat.setAttr("ishide",false);
                    shownseat.show();

                }
            }
        }
    }
    if($("#righseatpixadd").is(':checked')) {
        if(selectedseatclass[0].attrs.right20px != true) {
            selectedseatclass.x(selectedseatclass[0].attrs.x + 20);
            selectedseatclass.setAttr("right20px",true);
            var seatno = selectedseatclass[0].attrs.seatno;
            var selectedseats = stage.find("#"+selectedseatclass[0].attrs.id);
            //console.log(selectedseats);
            for(var t=0;t<selectedseats.length;t++){
                if(selectedseats[t].attrs.seatno > seatno) {
                    //console.log(selectedseats[t]);
                    var shiftingseats = stage.find("."+selectedseats[t].attrs.name);
                    shiftingseats.x(selectedseats[t].attrs.x + 20);
                }
            }
            //console.log(selectedseatclass);
            var rowwidthchange = stage.find("#"+selectedseatclass[0].parent.children[0].attrs.id);
            rowwidthchange.width(selectedseatclass[0].parent.children[0].attrs.width + 20);
            var checkwidth = rowwidthchange[0].attrs.width;
            var label = stage.find("#"+rowwidthchange[0].attrs.selectedsectionid);
            var labelwidth = label[0].attrs.width;
            if(checkwidth > labelwidth ){
                label.width(checkwidth);
            }
        }
    }
    else {
        if(selectedseatclass[0].attrs.right20px == true) {
            selectedseatclass.x(selectedseatclass[0].attrs.x - 20);
            selectedseatclass.setAttr("right20px",false);
            var seatno = selectedseatclass[0].attrs.seatno;
            var selectedseats = stage.find("#"+selectedseatclass[0].attrs.id);
            //console.log(selectedseats);
            for(var t=0;t<selectedseats.length;t++){
                if(selectedseats[t].attrs.seatno > seatno) {
                    //console.log(selectedseats[t]);
                    var shiftingseats = stage.find("."+selectedseats[t].attrs.name);
                    shiftingseats.x(selectedseats[t].attrs.x - 20);
                }
            }
            var rowwidthchange = stage.find("#"+selectedseatclass[0].parent.children[0].attrs.id);
            rowwidthchange.width(selectedseatclass[0].parent.children[0].attrs.width - 20);
            var checkwidth = rowwidthchange[0].attrs.width;
            var label = stage.find("#"+rowwidthchange[0].attrs.selectedsectionid);
            var labelwidth = label[0].attrs.width - 20;
            if(checkwidth == labelwidth ){
                if(checkwidth>= 200) {
                    label.width(checkwidth);
                }
                else {
                    label.width(200);
                }
            }
        }
    }
    layer.draw();
    $("#seatpopup").dialog("close");
})
function Count(name)
{   
    var str = name;
    var upper = 0, lower = 0, number = 0, special = 0;
    for (var i = 0; i < str.length; i++)
    {
        if (str[i] >= 'A' && str[i] <= 'Z')
            upper++;
        else if (str[i] >= 'a' && str[i] <= 'z')
            lower++;
        else if (str[i]>= '0' && str[i]<= '9')
            number++;
        else
            special++;
    }
    return [upper,lower,number, special]
}
function checkgrag() {

}
// $(".hidenseatdetails span").click(function(e){
//     alert("hello");
// });
$(document).on('click','.hidenseatdetails span',function(e){
    $(this).toggleClass("seatstrike");
});
$(".seatingchartSvebtn").click(function(e){
    var json = layer.toJSON();
    $("#sketchpaddata").val(json);
})