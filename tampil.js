$(document).ready(function() {
    selesai();
});
 
function selesai() {
	setTimeout(function() {
		update();
		selesai();
	}, 200);
}
 
function update() {
	$.getJSON("tampil.php", function(data) {
		$("table").empty();
		$.each(data.buff, function() {
			$("table").append(
				"<tr></tr><tr><td style='width:65px;'><font style='font-size:20px;' >"+this['id']+"</td><td style='width:305px;'><font style='font-size:20px;'>"+this['nrp']+"</td><td style='width:765px;'><font style='font-size:20px;'>"+this['nama']+"</td><td style='width:165px;'><font style='font-size:20px;'>"+this['loket']+"</td></tr><br />");
		});
	});
}
