@extends('repeter.navbar')


@section('title')
    stock
@endsection

@section('stock-active')
   class="active selected"
@endsection

@section('cdn')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script> 

<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  .container{
    display: flex;
    align-items: center;
    justify-content: space-around;
    /* flex-direction: column; */
    gap: 10px;
  }
  .chart{
    width: 700px;
    margin-bottom: 50px;
    padding: 2rem;
    border-radius: 10px;
    background: #252525;
    box-shadow: 0 0 16px rgba(0,0,0,0.5);
  }

</style>
@endsection

@section('content')
    <div class="container">
      <div class="chart">
        <canvas id="barchart" width="300" height="300"></canvas>
      </div>
      <div class="chart">
        <canvas id="circlechart" width="300" height="300"></canvas>
      </div>
    </div>


    
      <script>
  const ctx = document.getElementById('barchart');
  const ctx2 = document.getElementById('circlechart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
        
        '{{$produit[0]->name}}',
        '{{$produit[1]->name}}',
        '{{$produit[2]->name}}',
        '{{$produit[3]->name}}',
        '{{$produit[4]->name}}',
        '{{$produit[5]->name}}',
        '{{$produit[6]->name}}',
        '{{$produit[7]->name}}',
        '{{$produit[8]->name}}',
        '{{$produit[9]->name}}',
        '{{$produit[10]->name}}',
        '{{$produit[11]->name}}',
        '{{$produit[12]->name}}',
        '{{$produit[13]->name}}',
        '{{$produit[14]->name}}',
        '{{$produit[15]->name}}',

      ],
      datasets: [{
        label: '# of Votes',
        data: [
          {{$produit[0]->quantite}},
          {{$produit[1]->quantite}},
          {{$produit[2]->quantite}},
          {{$produit[3]->quantite}},
          {{$produit[4]->quantite}},
          {{$produit[5]->quantite}},
          {{$produit[6]->quantite}},
          {{$produit[7]->quantite}},
          {{$produit[8]->quantite}},
          {{$produit[9]->quantite}},
          {{$produit[10]->quantite}},
          {{$produit[11]->quantite}},
          {{$produit[12]->quantite}},
          {{$produit[13]->quantite}},
          {{$produit[14]->quantite}},
          {{$produit[15]->quantite}},

        ],
        backgroundColor: [
          'rgba(255, 99, 132, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(255, 206, 86, 0.6)',
          'rgba(75, 192, 10, 0.6)',
          'rgba(75, 56, 192, 0.6)',
          'rgba(0, 192, 192, 0.6)',
          'rgba(0, 192, 72, 0.6)',
          'rgba(86, 92, 72, 0.6)',
          'rgba(255, 99, 1, 0.6)',
          'rgba(54, 162, 35, 0.6)',
          'rgba(255, 206, 16, 0.6)',
          'rgba(75, 192, 101, 0.6)',
          'rgba(75, 56, 12, 0.6)',
          'rgba(0, 12, 192, 0.6)',
          'rgba(0, 12, 72, 0.6)',
          'rgba(86, 192, 72, 0.6)',

        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  new Chart(ctx2, {
    type: 'doughnut',
    data: {
      labels: [
        '{{$produit[0]->name}}',
        '{{$produit[1]->name}}',
        '{{$produit[2]->name}}',
        '{{$produit[3]->name}}',
        '{{$produit[4]->name}}',
        '{{$produit[5]->name}}',
        '{{$produit[6]->name}}',
        '{{$produit[7]->name}}',
        '{{$produit[8]->name}}',
        '{{$produit[9]->name}}',
        '{{$produit[10]->name}}',
        '{{$produit[11]->name}}',
        '{{$produit[12]->name}}',
        '{{$produit[13]->name}}',
        '{{$produit[14]->name}}',
        '{{$produit[15]->name}}',

      ],
      datasets: [{
        label: '# of Votes',
        data: [
          {{$produit[0]->quantite}},
          {{$produit[1]->quantite}},
          {{$produit[2]->quantite}},
          {{$produit[3]->quantite}},
          {{$produit[4]->quantite}},
          {{$produit[5]->quantite}},
          {{$produit[6]->quantite}},
          {{$produit[7]->quantite}},
          {{$produit[8]->quantite}},
          {{$produit[9]->quantite}},
          {{$produit[10]->quantite}},
          {{$produit[11]->quantite}},
          {{$produit[12]->quantite}},
          {{$produit[13]->quantite}},
          {{$produit[14]->quantite}},
          {{$produit[15]->quantite}},

        ],
        backgroundColor: [
          'rgba(255, 99, 132, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(255, 206, 86, 0.6)',
          'rgba(75, 192, 10, 0.6)',
          'rgba(75, 56, 192, 0.6)',
          'rgba(0, 192, 192, 0.6)',
          'rgba(0, 192, 72, 0.6)',
          'rgba(86, 92, 72, 0.6)',
          'rgba(255, 99, 1, 0.6)',
          'rgba(54, 162, 35, 0.6)',
          'rgba(255, 206, 16, 0.6)',
          'rgba(75, 192, 101, 0.6)',
          'rgba(75, 56, 12, 0.6)',
          'rgba(0, 12, 192, 0.6)',
          'rgba(0, 12, 72, 0.6)',
          'rgba(86, 192, 72, 0.6)',

        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
    
    
@endsection