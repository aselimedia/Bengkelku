function changeImg(img) {
    document.getElementById("imgDisplay").innerHTML = "";
	document.getElementById('imgDisplay').style.backgroundImage = "url('" + img.src + "')";
	document.getElementById('imgDisplay').style.backgroundSize = "cover";
}