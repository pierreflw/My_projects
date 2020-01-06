var my_paint = function(){
	this.canvas = document.getElementById('myCanvas');
	this.ctx = this.canvas.getContext('2d');
	this.clic = false;
	this.basePosX = 0;
	this.basePosY = 0;
	this.newPosX = 0;
	this.newPosY = 0;
	this.type = "crayon";

	//Définit le trait du tracé
	this.ctx.lineWidth = document.getElementById("largeur").value;
	this.ctx.strokeStyle = document.getElementById("color").value;
	this.ctx.lineJoin = 'round';
	this.ctx.lineCap = 'round';

	//Crée un canvas a chaque debut de trait
	this.takeSnapshot = function() {
   	 	this.snapshot = this.ctx.getImageData(0, 0, this.canvas.width, this.canvas.height);
	}

	//Supprime le canvas lorsque le trait bouge a l'aide de la souris
	this.restoreSnapshot = function() {
	    this.ctx.putImageData(this.snapshot, 0, 0);
	}

	//Dessine le tracé.
	this.draw = function() {
		this.ctx.strokeStyle = document.getElementById("color").value;
		this.ctx.lineWidth = document.getElementById("largeur").value;
		this.ctx.lineTo(this.newPosX, this.newPosY);
		this.ctx.stroke();
	}

	this.eraser = function(){
		this.ctx.clearRect(this.newPosX, this.newPosY, 20, 20);
	}

	this.trait = function(){
		this.ctx.strokeStyle = document.getElementById("color").value;
		this.ctx.lineWidth = document.getElementById("largeur").value;
		this.restoreSnapshot();
		this.ctx.beginPath();
	    this.ctx.moveTo(this.basePosX, this.basePosY);
	    this.ctx.lineTo(this.newPosX, this.newPosY);
	    this.ctx.stroke();
	}

	this.circle = function() {
		this.ctx.strokeStyle = document.getElementById("color").value;
		this.ctx.lineWidth = document.getElementById("largeur").value;
		this.restoreSnapshot();
	    this.radius = Math.sqrt(Math.pow((this.newPosX - this.basePosX), 2) + Math.pow((this.newPosY - this.basePosY), 2));
	    this.ctx.beginPath();
	    this.ctx.arc(this.basePosX, this.basePosY, this.radius, 0, 2 * Math.PI, false);
	    if (document.getElementById('fill').checked) {
	    	this.ctx.fillStyle = document.getElementById("color").value;
	    	this.ctx.fill();
	    }
	    else{
	    	this.ctx.stroke();
	    }
	}

	this.square = function(){

		this.ctx.strokeStyle = document.getElementById("color").value;
		this.ctx.lineWidth = document.getElementById("largeur").value;
		this.restoreSnapshot();
		this.ctx.beginPath();
		this.ctx.rect(this.basePosX, this.basePosY, this.newPosX - this.basePosX, this.newPosY - this.basePosY);
		if (document.getElementById('fill').checked) {
			this.ctx.fillStyle = document.getElementById("color").value;
	    	this.ctx.fill();
	    }
	    else{
	    	this.ctx.stroke();
	    }
	}

	this.save = function(){

	}

	this.enterFile = function(e){
		var thi = this;
		this.reader = new FileReader();
		this.reader.onload = function(event){
			thi.img = new Image();
			thi.img.onload = function(){
				if (thi.img.width <= thi.canvas.width && thi.img.height <= thi.canvas.height) {
					thi.ctx.drawImage(thi.img, 0, 0);
				}
				else{
					thi.ctx.drawImage(thi.img, 0, 0, 800, 500);
				}
			}
			thi.img.src = event.target.result;
		}
	this.reader.readAsDataURL(e.target.files[0]);
	}
}

var paint = new my_paint();

// Déplacement du x et du y lors du clic
paint.canvas.addEventListener('mousedown', function(e){
	paint.basePosX = e.pageX - paint.canvas.offsetLeft;
	paint.basePosY = e.pageY - paint.canvas.offsetTop;
	paint.clic = true;
	if(paint.type == "crayon"){
		paint.ctx.beginPath();
		paint.ctx.moveTo(this.newPosX, this.newPosY);
		document.body.style.cursor="url('../img/brushCursor.png'),auto";
	}
	else if (paint.type == "eraser"){
		document.body.style.cursor="url('../img/eraserCursor.png'),auto";
	}
	else if(paint.type == "trait"){
		paint.takeSnapshot();
		document.body.style.cursor = "default";
	}
	else if(paint.type == "circle"){
		paint.takeSnapshot();
		document.body.style.cursor = "default";
	}
	else if(paint.type == "square"){
		paint.takeSnapshot();
		document.body.style.cursor = "default";
	}
}, false);

// Limite de dessin, espace en haut et a gauche du canvas + appel de la fonction si le click de la souris est actif.
paint.canvas.addEventListener('mousemove', function(e) {
	paint.newPosX = e.pageX - paint.canvas.offsetLeft;
	paint.newPosY = e.pageY - paint.canvas.offsetTop;
	if(paint.clic){
		if(paint.type == "crayon"){
			paint.draw();
			document.body.style.cursor = "url('../img/brushCursor.png'),auto";
		}
		else if(paint.type == "eraser"){
			paint.eraser();
			document.body.style.cursor = "url('../img/eraserCursor.png'),auto";
		}
		else if(paint.type == "trait"){
			paint.trait();
			document.body.style.cursor = "default";
		}
		else if(paint.type == "circle"){
			paint.circle();
			document.body.style.cursor = "default";
		}
		else if(paint.type == "square"){
			paint.square();
			document.body.style.cursor = "default";
		}
	}
}, false);

//Arret du dessin lors du lachement du clic.
paint.canvas.addEventListener('mouseup', function() {
	paint.clic = false;
}, false);

document.getElementById("crayon").addEventListener('click', function() {
	paint.type = "crayon";
	document.body.style.cursor = "url('../img/brushCursor.png'),auto";
}, false);

document.getElementById("eraser").addEventListener('click', function() {
	paint.type = "eraser";
	document.body.style.cursor = "url('../img/eraserCursor.png'),auto";
}, false);

document.getElementById("trait").addEventListener('click', function() {
	paint.type = "trait";
	document.body.style.cursor = "default";
}, false);

document.getElementById("circle").addEventListener('click', function() {
	paint.type = "circle";
	document.body.style.cursor = "default";
}, false);

document.getElementById("square").addEventListener('click', function() {
	paint.type = "square";
	document.body.style.cursor = "default";
}, false);

document.getElementById("save").addEventListener('click', function() {
	paint.save();
}, false);

document.getElementById("file").addEventListener('change', function() {
	paint.enterFile(event);
}, false);
