/*
  <admin/buatartikel>
  **Get date indenesian time
*/
function getDate(){
    var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
  
    var tanggal = new Date().getDate();
    var xbulan = new Date().getMonth();
    var xtahun = new Date().getYear();
  
    var bulan = bulan[xbulan];
    var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;
    //document.getElementById("tanggalbuat").innerHTML = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;
    document.getElementById("tanggalbuat").value =
    document.getElementById("tanggalbuat").defaultValue = tanggal + ' ' + bulan + ' ' + tahun;
    document.getElementById("datestatus").innerHTML = + tanggal + ' ' + bulan + ' ' + tahun;
  }
  /*
    <admin/buatartikel>
    **Image preview
  */
  function showPreview(event) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("image-preview");
        preview.src = src;
        preview.style.display = "block";
    }
  }