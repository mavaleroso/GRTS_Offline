var province = document.getElementById('bar').getContext('2d');
var category = document.getElementById('bar1').getContext('2d');



var barChart1 = new Chart(province, {
    type: 'bar',
    data: {},
    options: {
      title: {
              display: true,
              text: 'Grievance per Province'
      },
      scales: {
          yAxes: [{
              ticks: {
                  beginAtZero: true,
                  fontSize: 10
              }
          }],
          xAxes: [{
            ticks: {
              fontSize: 10
            }
          }]
      },
      responsive: true,
      maintainAspectRatio: false
  }
});

var barChart2 = new Chart(category, {
    type: 'horizontalBar',
    data: {},
    options: {
      title: {
              display: true,
              text: 'Grievance per Category'
      },
      scales: {
          yAxes: [{
              ticks: {
                  fontSize: 10
              }
          }],
          xAxes: [{
            ticks: {
              fontSize: 10,
              beginAtZero: true,
            }
          }]
      },
      responsive: true,
      maintainAspectRatio: false
  }
});

barGraph();
barGraph2();

function barGraph() {
    let province = [];
    let data1 = [];
    let data2 = []; 
    $.ajax({
      url: base_url + 'dashboard/fetch_provinces',
      method: 'POST',
      data: {},
      success: function(result) {
          let pname = '';
          let data = JSON.parse(result);
          $.each(data, function(k, v) {
            province.push(v.provName);
            data2.push(v.countOngoing);
          });
          addDataBar(barChart1, province, data2);

      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    });
  }

  function barGraph2() {
    let catName = [];
    let catFname = [];
    let data1 = [];
    let data2 = []; 
    $.ajax({
      url: base_url + 'dashboard/fetch_categories',
      method: 'POST',
      data: {},
      success: function(result) {
          let data = JSON.parse(result);
          $.each(data, function(k, v) {


            // var str = v.category_name;
            // var matches = str.match(/\b(\w)/g);
            // var acronym = matches.join('');
            // catName.push(acronym);
            catFname.push(v.catName);
            data2.push(v.countOngoing);
          });

          addDataBar(barChart2, catFname, data2);

      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    });
  }

  function addDataBar(chart, dataName, data2) {
    for(let i=0; i < dataName.length; i++) {
        chart.data.labels.push(dataName[i]);
    }

    if ((chart.id % 2) == 1) {
      var color = '#ec2F4B';
    } else if ((chart.id % 2) == 0) {
      var color = '#3F5EFB';
    }

    chart.data.datasets.push({
      label: 'On-going',
      backgroundColor: color,
      borderColor: color,
      data: data2
    });
    chart.update();
  }
