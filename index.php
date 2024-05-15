<script>

var serverlink = "http://127.0.0.1:8000";
var sunuculink = "http://localhost/ai/"
var dosyaisim ="datas";

</script>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/papaparse/5.3.0/papaparse.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/shim.min.js" integrity="sha512-nPnkC29R0sikt0ieZaAkk28Ib7Y1Dz7IqePgELH30NnSi1DzG4x+envJAOHz8ZSAveLXAHTR3ai2E9DZUsT8pQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Enes ARSLAN</title>
  </head>
  <body class="bg-secondary">
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Python Veri Oluşturucu</a>
</nav>

<div class="container mt-3 mb-3" id="butonlar"></div>

<div class="container p-0" id="downloadexe">
<div class="card border border-dark">
  <div class="card-header font-weight-bold">
    Masaüstü Uygulaması
  </div>
  <div class="card-body">
    <p class="card-text">Offline olarak kullanmak için masaüstü uygulaması.</p>
    <a href="
https://drive.google.com/file/d/1bylDiE4autEw4k2Q_4rRczCelMnVdBxJ/view?usp=sharing" target="_blank" class="btn btn-success  btn-block"><i class="fa-solid fa-download"></i> İndir</a>
  </div>
</div>
</div>

<div id="datacontainer" class="container mt-3 border border-dark bg-light rounded pt-3 mb-3">

<form>
  <div class="form-group">
    <label for="exampleInputEmail1"><i class="fa-solid fa-key"></i> Api Adresi</label>
    <input type="number" class="form-control" id="api" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Api adresinizi kimseyle paylaşmayın.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><i class="fa-solid fa-database"></i> Veri Sayısı</label>
    <input type="number"  class="form-control" id="count">
    <small id="emailHelp" class="form-text text-muted">1 Veri Satırı = 1 Kredi.</small>

    <a id="olustur" class="btn btn-secondary mt-3 btn-block "> <i class="fa-solid fa-gears"></i> Veri Üret</a> 
  </div>
</div>

</form>
</div>


<div class="container p-0">
<table class="table table-striped table-bordered  table-dark">
  <thead>
    <tr>
      <th scope="col">Hasta Num</th>
      <th scope="col">Boğaz Ağrısı</th>
      <th scope="col">Burun Akıntısı</th>
      <th scope="col">Öksürük</th>
      <th scope="col">Ateş</th>
      <th scope="col">Enfeksiyon</th>
    </tr>
  </thead>
  <tbody>
   
  </tbody>
</table>
</div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>


$(document).ready(function(){
    $( "#olustur" ).on( "click", function() {
        
        var cnt = $('#count').val();
        var api = $('#api').val();

        document.getElementById("datacontainer").remove();
        document.getElementById("downloadexe").remove();

        $.get("http://127.0.0.1:8000/api?key="+api+"&token="+cnt, function(data, status){
            if (data[1] === undefined) {
    alert("Hatalı İstek !")
    location. reload() 
}
else{


        const csvFile = sunuculink+dosyaisim +'/'+data[0]+".csv";
        fetch(csvFile)
        .then(response => response.text())
        .then(data => {
            var rows = data.trim().split("\n");
            var tbody = document.querySelector('.table tbody');
            tbody.innerHTML = '';
            
            for (var i = 1; i < rows.length; i++) {
                var rowData = rows[i].split(",");
                var newRow = tbody.insertRow();
                rowData.forEach(cellData => {
                    var cell = newRow.insertCell();
                    cell.textContent = cellData;
                });
            }
        })
        .catch(error => console.error('Hata:', error));

    
const file = sunuculink+dosyaisim +'/'+data[0];

var butoncsv = document.createElement("button");
butoncsv.className = "btn btn-primary font-weight-bold"
butoncsv.innerHTML = "<i class='fa-solid fa-file-csv'></i> İndir CSV"; 
butoncsv.onclick = function() {
    window.location = file+".csv";
};

var butonex = document.createElement("button");
butonex.className = "btn btn-success ml-2 font-weight-bold"
butonex.innerHTML = "<i class='fa-solid fa-file-excel'></i> İndir Excel"; 
butonex.onclick = function() {
    window.location = file+".xlsx";
};

document.getElementById("butonlar").appendChild(butoncsv);
document.getElementById("butonlar").appendChild(butonex);

}  });

    })})
</script>

  </body>
</html>