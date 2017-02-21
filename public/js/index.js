var donut = document.getElementById('donut');
var donutCtx = donut.getContext('2d');
var chart = new Chart(donutCtx).Doughnut([
        { value: 101342, color: '#1fc8f8' },
        { value: 55342, color: '#76a346' }
    ],
    { percentageInnerCutout: 50, animateScale: true, segmentShowStroke: false, animateRotate: false });

var data = { 
  labels: ['01/2013','02/2013','03/2013','04/2013','05/2013','06/2013','06/2013'],
   datasets: [
     { data: [100,210,220,300,200,190,192], fillColor: 'rgba(31,200,248,0.1)', strokeColor: '#1fc8f8', pointColor: '#1fc8f8', pointStrokeColor: '#1fc8f8' },
     { data: [130,200,190,150,140,210,0], fillColor: 'rgba(118,163,70,0.1)', strokeColor: '#76a346', pointColor: '#76a346', pointStrokeColor: '#76a346' }
    ]
};
           
var line = document.getElementById('line');
var lineCtx = line.getContext('2d');
var chart1 = new Chart(lineCtx).Line(data);

var line2 = document.getElementById('line2');
var line2Ctx = line2.getContext('2d');
var chart2 = new Chart(line2Ctx).Line(data);