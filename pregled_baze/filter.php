<?php
session_start();
include('./config.php');
$serial_ex = $_POST['searchBox'];

if($serial_ex != ""){

?>



    <div class="container  container_table ">
 

 <table id="example" class="table table-striped table-bordered" >
     <thead>
         <tr class="table-head-1"    style="border: outset;" >
             <th colspan="10" style="border-right: solid;">Tablica Serijskih Brojeva</th>
             <th colspan="8" style="border-right: solid;">Tablica Tvornickih Brojeva</th>
             <th colspan="7" style="border-right: solid;">Tablica Isporucenih Pistolja</th>
             <th colspan="5" style="border-right: solid;">Tablica Proizvedenih Pistolja</th>
             <th colspan="2">Sifranik pozicije</th>
         </tr>
         <tr class="table-head-2" style="border: double">
             <th>Novi serijski broj</th>
             <th>Stari serijski broj</th>
             <th>Predmet rada</th>
             <th>Tvornicki broj</th>
             <th>Pozicija</th>
             <th>D/L</th>
             <th>Status</th>
             <th>Posljednja faza</th>
             <th>Kupac</th>
             <th style="border-right: solid;">Datum prijave</th>
             <th>Tvornicki Broj</th>
             <th>Novi Serijski Broj</th>
             <th>Stari Serijski Broj</th>
             <th>Datum Prijave</th>
             <th>D/L</th>
             <th>Status</th>
             <th>Faza</th>
             <th style="border-right: solid;">Pozicija</th>
             <th>Datum Isporuke</th>
             <th>Kupac</th>
             <th>Prebivalište/Sjedište kupca</th>
             <th>Vrsta</th>
             <th>Model</th>
             <th>Kalibar</th>
             <th style="border-right: solid;">Napomena</th>
             <th>Datum Proizvedeno</th>
             <th>Vrsta</th>
             <th>Model</th>
             <th>Kalibar</th>
             <th style="border-right: solid;">Napomena</th>
             <th>Naziv Predmeta rada</th>
             <th>Naziv Pozcijije</th>
         </tr>
     </thead>
     <tbody>
         <?php $ret = mysqli_query($con, "SELECT sb.novi_serijski_broj,
sb.stari_serijski_broj as stari_serijski_broj_sb,
sb.predmet_rada,
sb.tvornicki_broj,
sb.pozicija as pozicija_sb,
sb.dobar_los as dobar_los_sb,
sb.status as status_sb,
sb.posljednja_faza as posljendnja_faza_sb,
sb.kupac as kupac_sb,
sb.datum_prijave_sb,
tb.datum_prijave as datum_prijave_tb,
tb.tvornicki_broj as tvornicki_broj_tb,
tb.novi_serijski_broj as novi_serijski_broj_tb,
tb.dobar_los as dobar_los_tb,
tb.status as status_tb,
tb.faza as faza_tb,
tb.pozicija as pozicija_tb,
tb.serijski_broj as stari_serijski_broj_tb,
ip.datum_isporuke,
ip.oruzje_isporuceno as kupac_isporuceno,
ip.prebivaliste_sjediste as prebivaliste_sjediste_kupca,
ip.vrsta AS vrsta_isporuceno,
ip.model AS model_isporuceno,
ip.kalibar AS kalibar_isporuceno,
ip.napomena AS napomena_isporuceno,
pp.datum_proizvedeno,
pp.vrsta AS vrsta_proizvedeno,
pp.model AS model_proizvedeno,
pp.kalibar AS kalibar_proizvedeno,
pp.napomena AS napomena_proizvedeno,
sp.naziv_predmeta_rada ,
sp.naziv_pozicije 
FROM (
SELECT sb1.novi_serijski_broj,
    sb1.stari_serijski_broj,
    sb1.tvornicki_broj_1 AS tvornicki_broj,
    sb1.pozicija_1 AS pozicija,
    sb1.predmet_rada,
    sb1.dobar_los,
    sb1.status,
    sb1.posljednja_faza,
    sb1.kupac,
    sb1.datum_prijave AS datum_prijave_sb
FROM hs_tvornicki_brojevi.serijski_brojevi_2008_novi AS sb1
UNION
SELECT sb2.novi_serijski_broj,
    sb2.stari_serijski_broj,
    sb2.tvornicki_broj_2 AS tvornicki_broj,
    sb2.pozicija_2 AS pozicija,
    sb2.predmet_rada,
    sb2.dobar_los,
    sb2.status,
    sb2.posljednja_faza,
    sb2.kupac,
    sb2.datum_prijave AS datum_prijave_sb
FROM hs_tvornicki_brojevi.serijski_brojevi_2008_novi AS sb2
) AS sb
LEFT JOIN hs_tvornicki_brojevi.isporuceni_pistolji_3 AS ip
ON sb.novi_serijski_broj = ip.serijski_brojevi
LEFT JOIN hs_tvornicki_brojevi.proizvedeni_pistolji_3 AS pp
ON sb.novi_serijski_broj = pp.serijski_brojevi 
LEFT JOIN hs_tvornicki_brojevi.sifranik_pozicije_1_1 as sp 
on sb.pozicija  = sp.sifra_pozicija 
left join hs_tvornicki_brojevi.tvornicki_brojevi_2008 as tb
on sb.tvornicki_broj = tb.tvornicki_broj and sb.pozicija = tb.pozicija
where sb.novi_serijski_broj = '$serial_ex' or sb.stari_serijski_broj = '$serial_ex' or sb.tvornicki_broj = '$serial_ex'");
         while ($row = mysqli_fetch_array($ret)) { ?>
             <tr>
                 <td><?php echo $row['novi_serijski_broj']; ?></td>
                 <td><?php echo $row['stari_serijski_broj_sb']; ?></td>
                 <td><?php echo $row['predmet_rada']; ?></td>
                 <td><?php echo $row['tvornicki_broj']; ?></td>
                 <td><?php echo $row['pozicija_sb']; ?></td>
                 <td><?php echo $row['dobar_los_sb']; ?></td>
                 <td><?php echo $row['status_sb']; ?></td>
                 <td><?php echo $row['posljendnja_faza_sb']; ?></td>
                 <td><?php echo $row['kupac_sb']; ?></td>
                 <td><?php echo $row['datum_prijave_sb']; ?></td>
                 <td><?php echo $row['tvornicki_broj_tb']; ?></td>
                 <td><?php echo $row['novi_serijski_broj_tb']; ?></td>
                 <td><?php echo $row['stari_serijski_broj_tb']; ?></td>
                 <td><?php echo $row['datum_prijave_tb']; ?></td>
                 <td><?php echo $row['dobar_los_tb']; ?></td>
                 <td><?php echo $row['status_tb']; ?></td>
                 <td><?php echo $row['faza_tb']; ?></td>
                 <td><?php echo $row['pozicija_tb']; ?></td>
                 <td><?php echo $row['datum_isporuke']; ?></td>
                 <td><?php echo $row['kupac_isporuceno']; ?></td>
                 <td><?php echo $row['prebivaliste_sjediste_kupca']; ?></td>
                 <td><?php echo $row['vrsta_isporuceno']; ?></td>
                 <td><?php echo $row['model_isporuceno']; ?></td>
                 <td><?php echo $row['kalibar_isporuceno']; ?></td>
                 <td><?php echo $row['napomena_isporuceno']; ?></td>
                 <td><?php echo $row['datum_proizvedeno']; ?></td>
                 <td><?php echo $row['vrsta_proizvedeno']; ?></td>
                 <td><?php echo $row['model_proizvedeno']; ?></td>
                 <td><?php echo $row['kalibar_proizvedeno']; ?></td>
                 <td><?php echo $row['napomena_proizvedeno']; ?></td>
                 <td><?php echo $row['naziv_predmeta_rada']; ?></td>
                 <td><?php echo $row['naziv_pozicije']; ?></td>

             </tr>
         <?php } ?>
     </tbody>
 </table>

</div>

<?php     
}else{
    echo "Unesi Šifru";
} ?>