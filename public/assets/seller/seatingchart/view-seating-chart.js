var stage;
$.LoadingOverlay("show");
setTimeout(function(){
    $.LoadingOverlay("hide");
}, 3000);
stage = new Konva.Stage({
    container: 'playground',
    width: 2200,
    height: 2200,
});
$(document).ready(function() {
	setTimeout(function(){
		var json = $('#sketchpaddata').attr('value');
		json = format(json, "draggable");
		var layer = Konva.Node.create(json,'playground');
		stage.add(layer);
		//stage = Konva.Node.create(json, 'playground');
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
// $(".seatingchartedit").click(function(){
// 	var json = $("#sketchpaddata").attr('value');
// 	sessionStorage.removeItem(sketchpaddata);
// 	sessionStorage.setItem("sketchpaddata",json);
// })