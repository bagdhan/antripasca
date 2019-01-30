
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
	$.getJSON("test2.php", function(data) {
		$("ul").empty();
		$.each(data.result, function() {
			$("ul").append("<li>Nama : "+this['nama']+"</li><li>Kelas : "+this['kelas']+"</li><li>Jurusan : "+this['jurusan']+"</li><br />");
		});
	});
