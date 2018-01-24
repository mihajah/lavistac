var data = {
   labels: ['Online'],
   series: [
      [542],
      [412]
   ]
};

var options = {
   seriesBarDistance: 10,
   axisX: {
      showGrid: false
   },
   height: "245px"
};

var responsiveOptions = [
   ['screen and (max-width: 640px)', {
      seriesBarDistance: 5,
      axisX: {
         labelInterpolationFnc: function (value) {
            return value[0];
         }
      }
   }]
];

Chartist.Bar('#chartActivity', data, options, responsiveOptions);
