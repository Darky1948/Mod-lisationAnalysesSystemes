<section class="row" style="margin-top:10px;" width="150000"> 
  <div class="col-lg-12" style="">
    <canvas id="myChart" width="<?php echo ($_SESSION['taillePopulation']*40); ?>" height="300px"></canvas>
  </div>
</section>
<input type="hidden" id="strClassesEncodePratique" name="strClassesEncodePratique" value="<?php if($afficherResultat){ echo $strClassesEncodePratique; } ?>">

<script type="text/javascript">
var ctx = document.getElementById('myChart').getContext('2d');
var tabPratique = document.getElementById('strClassesEncodePratique').value;
var valeursPratiques = tabPratique.split(" ");

var arrayLength = valeursPratiques.length;
var donnees = new Array(arrayLength);
for(var i = 0; i < arrayLength; i++) {
  var calc = {x:valeursPratiques[i], y:1};
  donnees.push(calc);
}

var scatterChart = new Chart(ctx, {
    type: 'line',
    data: {
        datasets: [{
            label: 'Processus de poisson',
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt', 
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: donnees
        }]
    },
    options: {
        scales: {
            xAxes: [{
              ticks: {
                    stepSize: 1,
                    autoSkip: false
              },
              type: 'linear',
              position: 'bottom'
            }],
            yAxes: [{
              display: false
            }]
        },
        showLines:false,
        responsive: false
    }
});

// go check that web site cuz u suck http://stackoverflow.com/questions/35854244/how-can-i-create-a-horizontal-scrolling-chart-js-line-chart-with-a-locked-y-axis
</script>