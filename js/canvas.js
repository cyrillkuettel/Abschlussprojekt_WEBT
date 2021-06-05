   // TODO: 
   var canvas;
   var c;

   function drawCanvas(x, y) {
       canvas = document.getElementById('myCanvas');;
       var width = canvas.width;
       var height = canvas.height; // just to adjust dynamically, if for some peculiar reason, the dimensions change abruptly. 

       c = canvas.getContext('2d')
       c.fillStyle = "red";
/*
       c.beginPath();
       c.moveTo(0, 0);
       c.lineTo(width, 0);
       // squares the surrounding of the canvas
       c.lineTo(width, height);
       c.lineTo(0, height);
       c.lineTo(width, height);
       c.moveTo(0, height);
       c.lineTo(0, 0);
       c.stroke();
       //c.fillStyle = "#33ee99";
       // c.fill();
       */
   }

   function drawEllipse(x, y, radius, color, optionalLineWidth = '18', strokeStyle = "#454545") {

       //if (typeof optionalLineWidth === 'undefined') { optionalLineWidth = '9'; }
       c.beginPath();
       c.fillStyle = color;
       c.strokeStyle = "#454545";
       c.lineWidth = optionalLineWidth;
       c.arc(x, y, radius, 0, 2 * Math.PI, true);
       c.fill();
       c.stroke();
   }

   function drawBikeFrame() {
       c.beginPath();
       c.lineWidth = 17;
       c.moveTo(200, 380);
       c.lineTo(330, 380);
       c.moveTo(200, 380);
       c.lineTo(310, 210); // diagonal line up 
       c.lineTo(505, 200); // querLinie 
       c.moveTo(368, 370);
       c.lineTo(300, 190); // Stange wo der Sattel drauf ist
       c.moveTo(390, 360);
       c.lineTo(502, 215); // von Tretlager zu Lenker
       c.moveTo(570, 380);
       c.lineTo(500, 230);
       c.moveTo(500, 230);
       c.lineTo(498, 175);
       c.strokeStyle = '#44a6c6';
       c.stroke();
       c.closePath();
   }

   function drawTretlager() {
       c.lineCap = "round";
       drawEllipse(368, 385, 30, "white", '18', "black"); // Kranz vorne
       //drawEllipse(368, 389, 5, "#454545", '18',); // Tretlager 
       c.beginPath();
       c.lineWidth = 17;
       c.moveTo(365, 388);
       c.lineTo(330, 454);
       c.moveTo(322, 455);
       c.lineTo(343, 455);
       c.moveTo(380, 347);
       c.lineTo(390, 325);
       c.moveTo(380, 325);
       c.lineTo(395, 325);
       c.strokeStyle = "#454545";
       c.stroke();
       c.closePath();
   }

   function drawSattel() {
       c.beginPath();
       c.lineCap = "butt";
       c.lineWidth = 17;
       c.moveTo(300, 190);
       c.lineTo(282, 142);
       c.lineCap = "round";
       c.moveTo(253, 140); // "Primitiver Sattel"
       c.lineTo(330, 140);
       c.lineCap = "square";
       c.moveTo(498, 175);
       c.lineTo(498, 170);
       c.lineCap = "round";
       c.moveTo(498, 175);
       c.lineTo(498, 155);
       c.moveTo(485, 155);
       c.quadraticCurveTo(500, 160, 560, 140) // Lenker
       c.strokeStyle = "#454545";
       c.stroke();
       c.closePath();
   }

   drawCanvas();
   drawEllipse(200, 380, 100, "black");
   drawEllipse(200, 380, 100, "white");
   drawEllipse(200, 380, 100, "white");
   drawEllipse(200, 380, 20, "#44a6c6", "1");
   drawEllipse(575, 380, 100, "black");
   drawEllipse(575, 380, 100, "white");
   drawEllipse(575, 380, 100, "white");
   drawEllipse(575, 380, 20, "#44a6c6", "1");
   drawBikeFrame();
   drawTretlager();
   drawSattel();