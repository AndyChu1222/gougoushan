$(document).ready(function(){
    var len = 30; // 超過30個字以"..."取代
    $(".limit").each(function(i){
        if($(this).text().length>len){
            var text=$(this).text().substring(0,len-1)+"...";
            $(this).text(text);
        }
    });
    var len2 = 4; 
    $(".limit2").each(function(i){
        if($(this).text().length>len2){
            var text=$(this).text().substring(0,len2-1)+"...";
            $(this).text(text);
        }
    });
});
function showdiv(id){
	var a = document.getElementById(id);
	if (a) {
		if (id=="newsedit") {
						if (a.style.display == 'none') {
			              a.style.display = 'block';
			              document.getElementById("news").style.backgroundColor = '#e5ffbb';
			              document.getElementById("tour").style.backgroundColor = 'white';
			              document.getElementById("adopt").style.backgroundColor = 'white';
			              document.getElementById("donmon").style.backgroundColor = 'white';
			              document.getElementById("voltime").style.backgroundColor = 'white';
			              document.getElementById("pet").style.backgroundColor = 'white';
			          	}
			          	var b = document.getElementById("touredit");
			          	var d = document.getElementById("voltimeedit");
			          	var e = document.getElementById("donmonedit");
			          	var f = document.getElementById("adoptedit");
			          	var g = document.getElementById("petedit");
			          	b.style.display = 'none';
			          	d.style.display = 'none';
			          	e.style.display = 'none';
			          	f.style.display = 'none';
			          	g.style.display = 'none';
		}
		if (id=="touredit") {
						if (a.style.display == 'none') {
			              a.style.display = 'block';
			              document.getElementById("news").style.backgroundColor = 'white';
			              document.getElementById("adopt").style.backgroundColor = 'white';
			              document.getElementById("donmon").style.backgroundColor = 'white';
			              document.getElementById("voltime").style.backgroundColor = 'white';
			              document.getElementById("pet").style.backgroundColor = 'white';
			          	}
			          	var b = document.getElementById("newsedit");
			          	var d = document.getElementById("voltimeedit");
			          	var e = document.getElementById("donmonedit");
			          	var f = document.getElementById("adoptedit");
			          	var g = document.getElementById("petedit");
			          	b.style.display = 'none';
			          	d.style.display = 'none';
			          	e.style.display = 'none';
			          	f.style.display = 'none';
			          	g.style.display = 'none';
		}
		if (id=="voltimeedit") {
						if (a.style.display == 'none') {
			              a.style.display = 'block';
			              document.getElementById("news").style.backgroundColor = 'white';
			              document.getElementById("tour").style.backgroundColor = 'white';
			              document.getElementById("adopt").style.backgroundColor = 'white';
			              document.getElementById("donmon").style.backgroundColor = 'white';
			              document.getElementById("voltime").style.backgroundColor = '#e5ffbb';
			              document.getElementById("pet").style.backgroundColor = 'white';
			          	}
			          	var b = document.getElementById("touredit");
			          	var d = document.getElementById("newsedit");
			          	var e = document.getElementById("donmonedit");
			          	var f = document.getElementById("adoptedit");
			          	var g = document.getElementById("petedit");
			          	b.style.display = 'none';
			          	d.style.display = 'none';
			          	e.style.display = 'none';
			          	f.style.display = 'none';
			          	g.style.display = 'none';
		}
		if (id=="donmonedit") {
						if (a.style.display == 'none') {
			              a.style.display = 'block';
			              document.getElementById("news").style.backgroundColor = 'white';
			              document.getElementById("tour").style.backgroundColor = 'white';
			              document.getElementById("adopt").style.backgroundColor = 'white';
			              document.getElementById("donmon").style.backgroundColor = '#e5ffbb';
			              document.getElementById("voltime").style.backgroundColor = 'white';
			              document.getElementById("pet").style.backgroundColor = 'white';
			          	}
			          	var b = document.getElementById("touredit");
			          	var d = document.getElementById("voltimeedit");
			          	var e = document.getElementById("newsedit");
			          	var f = document.getElementById("adoptedit");
			          	var g = document.getElementById("petedit");
			          	b.style.display = 'none';
			          	d.style.display = 'none';
			          	e.style.display = 'none';
			          	f.style.display = 'none';
			          	g.style.display = 'none';
		}
		if (id=="adoptedit") {
						if (a.style.display == 'none') {
			              a.style.display = 'block';
			              document.getElementById("news").style.backgroundColor = 'white';
			              document.getElementById("tour").style.backgroundColor = 'white';
			              document.getElementById("adopt").style.backgroundColor = '#e5ffbb';
			              document.getElementById("donmon").style.backgroundColor = 'white';
			              document.getElementById("voltime").style.backgroundColor = 'white';
			              document.getElementById("pet").style.backgroundColor = 'white';
			          	}
			          	var b = document.getElementById("touredit");
			          	var d = document.getElementById("voltimeedit");
			          	var e = document.getElementById("donmonedit");
			          	var f = document.getElementById("newsedit");
			          	var g = document.getElementById("petedit");
			          	b.style.display = 'none';
			          	d.style.display = 'none';
			          	e.style.display = 'none';
			          	f.style.display = 'none';
			          	g.style.display = 'none';
		}
		if (id=="petedit") {
						if (a.style.display == 'none') {
			              a.style.display = 'block';
			              document.getElementById("news").style.backgroundColor = 'white';
			              document.getElementById("tour").style.backgroundColor = 'white';
			              document.getElementById("adopt").style.backgroundColor = 'white';
			              document.getElementById("donmon").style.backgroundColor = 'white';
			              document.getElementById("voltime").style.backgroundColor = 'white';
			              document.getElementById("pet").style.backgroundColor = '#e5ffbb';
			          	}
			          	var b = document.getElementById("touredit");
			          	var d = document.getElementById("voltimeedit");
			          	var e = document.getElementById("donmonedit");
			          	var f = document.getElementById("newsedit");
			          	var g = document.getElementById("adoptedit");
			          	b.style.display = 'none';
			          	d.style.display = 'none';
			          	e.style.display = 'none';
			          	f.style.display = 'none';
			          	g.style.display = 'none';
		}
	}
}
function fileValidation() {
    var fileInput = document.getElementById('file1');
    for (var i=0;i<fileInput.files.length;i++){
    	var filePath = fileInput.files[i].name;
    	var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.JPG|\.PNG|\.bmp|\.JPEG|\.GIF|\.BMP)$/;
	    if (!allowedExtensions.exec(filePath)) {
	        alert('您上傳的檔案非圖檔，請重新上傳。');
	        fileInput.value = '';
	        return false;
	    } 
    }
    //參考網址
    //https://stackoverflow.com/questions/14390757/check-all-extensions-from-a-multiple-upload-file-input
    //https://www.geeksforgeeks.org/file-type-validation-while-uploading-it-using-javascript/
}
function fileValidation2() {
    var fileInput = document.getElementById('file2');
    for (var i=0;i<fileInput.files.length;i++){
    	var filePath = fileInput.files[i].name;
    	var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.JPG|\.PNG|\.bmp|\.JPEG|\.GIF|\.BMP)$/;
	    if (!allowedExtensions.exec(filePath)) {
	        alert('您上傳的檔案非圖檔，請重新上傳。');
	        fileInput.value = '';
	        return false;
	    } 
    }
    //參考網址
    //https://stackoverflow.com/questions/14390757/check-all-extensions-from-a-multiple-upload-file-input
    //https://www.geeksforgeeks.org/file-type-validation-while-uploading-it-using-javascript/
}