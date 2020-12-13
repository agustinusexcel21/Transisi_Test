<!DOCTYPE html>
<html>
<title>Atma-Auto</title>
<link rel="icon" href="{{ asset('image/logo.png') }}"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
table, td, th{  
  border: 3px solid #ddd;
  text-align: middle;
}

table {
  border-collapse: collapse;
  width: 100%;
  text-align: center;
  
}

th, td {
  padding: 15px;
}

input[type=text] {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
input[type=button], input[type=submit], input[type=reset] {
  background-color: #4d88ff;
  border: none;
  color: white;
  padding: 10px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 2px;
}

p{
  width: 100%;
  text-align: center;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="#home" class="w3-bar-item w3-button"><b>Atma Auto</b>Workshops</a><img src="{{ asset('image/logo.png') }}"style="width:4%">
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#projects" class="w3-bar-item w3-button">Sparepart</a>
      <a href="#transactions" class="w3-bar-item w3-button">Transaksi</a>
      <a href="#about" class="w3-bar-item w3-button">About</a>
      <a href="#contact" class="w3-bar-item w3-button">Contact</a>
      <a href="{{route('login')}}" class="w3-bar-item w3-button">Login</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="{{ asset('image/bengkel.jpg') }}" alt="Architecture" width="1500">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Atma Auto</b></span> <span class="w3-hide-small w3-text-light-grey"></span></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Sparepart</h3>
  </div>
  <form action="{{route('frontends.index')}}">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Berdasarkan Nama Sparepart" name="nama_sparepart">
                    <div class="input-group-append">
                        <input type="submit" value="Cari" class="btn btn-primary">
                    </div>
            </div>
        </form>
  <table id="myTable" class="table table-bordered">
  <thead>
        <tr>
            <th>Parts</th>
            <th onclick="sortTable(1)">Harga</th>
            <th onclick="sortTable(2)">Stock</th>
        </tr>
    </thead>

    <tbody>@foreach($spareparts as $sparepart)
        <tr>
            <td>
                @if($sparepart->gambar_sparepart)
                    <img src="{{asset('storage/' . $sparepart->gambar_sparepart)}}" width="150px"/>
                @else
                    No image
                @endif
                <pre></pre>
                {{$sparepart->nama_sparepart}} {{$sparepart->merk_sparepart}}
            </td>
            <td>
                {{$sparepart->harga_jual}}
            </td>
            <td>
                {{$sparepart->stock}}
            </td>
        </tr>
    @endforeach
    </tbody>
  </table>
  </div>

  <!-- Transactions Section -->
  <div class="w3-container w3-padding-32" id="transactions">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Riwayat Transaksi</h3>
  </div>

  <!-- About Section -->
  <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
    <p>ATMA-AUTO berdiri sejak 2019, berlokasi cukup strategis di Jl. Babarsari, Sleman Yogyakarta. ATMA-AUTO merupakan bengkel 
    independen dimana melayani berbagai merk sepeda motor seperti Yamaha, Honda dan Suzuki. Manajemen pengelolaan dan operasionalnya 
    dilaksanakan secara profesional serta berpengalaman pada bidang bisnis otomotif dan distribusi suku cadang sepeda motor. ATMA-AUTO 
    mempunyai tagline “ BIKIN MANTAP MOTOR ANDA “. Ini mempunyai arti bahwa ATMA-AUTO berusaha untuk memberikan pelayanan yang mantap 
    bagi Anda dan sepeda motor anda.
    </p>
  </div>

  <div class="w3-row-padding w3-grayscale">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="{{ asset('image/CEO.png') }}" alt="CEO" style="width:100%">
      <h3>John Doe</h3>
      <p class="w3-opacity">CEO & Founder</p>
      <p>Pendiri dan Pemilik Bengkel ATMA AUTO Direktur Bengkel ATMA AUTO</p>
      <!-- <p><button class="w3-button w3-light-grey w3-block">Contact</button></p> -->
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="{{ asset('image/mekanik_1.png') }}" alt="Mekanik_1" style="width:100%">
      <h3>Jane Doe</h3>
      <p class="w3-opacity">Mekanik</p>
      <p>Pernah membawa pebalap Richard Taroreh merebut prestasi podium juara UB150 saat ARRC 2017 Sentul, juga klasemen teratas kelas Sport 150 cc. 
      Temasuk di level Motorprix 2017 Jawa, kategori MP1 (150 cc) dan MP2 (125 cc).</p>
      <!-- <p><button class="w3-button w3-light-grey w3-block">Contact</button></p> -->
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="{{ asset('image/mekanik_2.png') }}" alt="Mekanik_2" style="width:100%">
      <h3>Mike Ross</h3>
      <p class="w3-opacity">Mekanik</p>
      <p>Best Mekanik Drag Bike 2017, Raih 4 Kategori Juara Umum</p>
      <!-- <p><button class="w3-button w3-light-grey w3-block">Contact</button></p> -->
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="{{ asset('image/mekanik_3.jpg') }}" alt="Mekanik_3" style="width:100%">
      <h3>Dan Star</h3>
      <p class="w3-opacity">Mekanik</p>
      <p>Mekanik terbaik di ajang 2018 Suzuki Motorcycle Service Skill Competition in Asia.</p>
      <!-- <p><button class="w3-button w3-light-grey w3-block">Contact</button></p> -->
    </div>
  </div>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-32" id="contact">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contact</h3>
    <p>Kami Siap Melayani Anda</p>
    <form action="/action_page.php" target="_blank">
      <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Email" required name="Email">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Subject" required name="Subject">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Comment" required name="Comment">
      <button class="w3-button w3-black w3-section" type="submit">
        <i class="fa fa-paper-plane"></i> SEND MESSAGE
      </button>
    </form>
  </div>
  
<!-- Image of location/map
<div class="w3-container">
  <img src="/siato/image/maps.jpg" class="w3-image" style="width:%" posistion="center">
</div> -->

<!-- End page content -->
</div>


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>Powered by <a href="https://www.uajy.ac.id" title="W3.CSS" target="_blank" class="w3-hover-text-blue">P3L-Atma Auto</a></p>
</footer>

<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

</body>
</html>
