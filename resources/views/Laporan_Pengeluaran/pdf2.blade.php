<!DOCTYPE html> 
<html  lang="{{ app()->getLocale() }}">
 <head> 
 	<title>List Harga Produk</title> <style>
/* -------------------------------------------------------------
Hartija Css Print Framework * Version: 1.0
-------------------------------------------------------------- */
body { 
	width:100% !important; 
	margin:0 !important; 
	padding:0 !important; 
	line-height: 1.45; 
	font-family: Garamond,"Times New Roman", 
	serif; color: #000; background: none; font-size: 14pt; 
}
/* Headings */ h1,h2,h3,h4,h5,h6 { page-break-after:avoid; 
	} h1{
		font-size:19pt;
		} h2{
			font-size:17pt;
			} h3{
				font-size:15pt;
				} h4,h5,h6{
					font-size:14pt;
				}
p, h2, h3 { 
	orphans: 3; widows: 3; 
}
code { 
	font: 12pt Courier, monospace; 
	} 
	blockquote {
	 margin: 1.2em;
	  padding: 1em;
	   font-size: 12pt; 
	   } hr {
	    background-color: #ccc; }
/* Images */ img { float: left; margin: 1em 1.5em 1.5em 0; max-width: 100% !important; } a img { border: none; }
/* Links */ a:link, a:visited { background: transparent; font-weight: 700; text-decoration: underline;col\ or:#333; } a:link[href^="http://"]:after, a[href^="http://"]:visited:after { content: " (" attr(href) ")\ "; font-size: 90%; }
abbr[title]:after { content: " (" attr(title) ")"; }
/* Don't show linked images */ a[href^="http://"] {color:#000; } a[href$=".jpg"]:after, a[href$=".jpeg"]:after, a[href$=".gif"]:after, a[href$=".png"]:after {\ content: " (" attr(href) ") "; display:none; }
/* Don't show links that are fragment identifiers, or use the `javascript:` pseudo protocol .\ . taken from html5boilerplate */ a[href^="#"]:after, a[href^="javascript:"]:after {content: "";}
/* Table */ table { margin: 1px; text-align:left; } th { border-bottom: 1px solid #333; font-weight: bold; } td { border-bottom: 1px solid #333; } th,td { padding: 4px 10px 4px 0; } tfoot { font-style: italic; } caption { background: #fff; margin-bottom:2em; text-align:left; } thead {display: table-header-group;} img,tr {page-break-inside: avoid;}
/* Hide various parts from the site #header, #footer, #navigation, #rightSideBar, #leftSideBar {display:none;} */
</style> 
</head> 
<body> 
	<h1 style="text-align: center;"><span style="background-color: #ffff00; color: #333399;"><strong>CV PUTRA ADIDARMA</strong></span></h1>
	<p style="text-align: center;"><span style="background-color: #ffffff; color: #000000;"><strong>Grand Sharon JL. Sharon Selatan II No. 11 Rt.03/11 Bandung</strong></span></p>
	<p style="text-align: center;"><span style="background-color: #ffffff; color: #000000;"><strong>Hp. 082338214191 / 082216786597 </strong></span></p>
	<p style="text-align: center;"><span style="background-color: #ffffff; color: #000000;"><strong>EMAIL : <a href="mailto:cvputraadidarma@yahoo.com">cvputraadidarma@yahoo.com</a></strong></span></p>
	<p style="text-align: right;"><span style="background-color: #ffffff; color: #000000;"><strong>Tanggal : <?php echo date('d F Y' , strtotime($dari));?> - <?php echo date('d F Y' , strtotime($sampai));?></strong></span></p>
	<p style="text-align: center;"><span style="background-color: #000080; color: #000000;"><strong>Laporan Pengeluaran</strong></span></p>
	<p style="text-align: left;"><span style="background-color: #ffffff; color: #333333;"><strong>A. SAYURAN DAN BUAH-BUAHAN</strong></span></p>
	<p style="text-align: left;">&nbsp;</p>
	<hr> 
	<table class="table mb-none"> 
		<thead> 
			<tr> 
				<th>Nama Barang Keluar</th>
				<th>Jenis</th>
				<th>Kuantitas</th>
				<th>Harga</th>
				<th>Total Harga</th>
				<th>Nama Supplier</th>
			</tr> 
		</thead> 
		<tbody> @foreach ($barang_masuks as $item) <tr> 
			<td>{{ $item->barang->nama_barang }}</td> 
			<td>{{ $item->barang->jenis }}</td> 	
			<td>{{ $item->kuantitas }}</td> 
			<td><?php echo 'Rp.'. number_format($item->harga,'2',',','.') ?></td> 
			<td><?php echo 'Rp.'. number_format($item->total,'2',',','.') ?></td> 
			<td>{{ $item->supplier->nama}}</td>
		</tr> @endforeach 
	</tbody> 
</table> 
			<h5>Total Barang Keluar : 
				{{$barang_masuks->sum('kuantitas')}}  	
			</h5>
			<h5>Total Uang Keluar : 
				Rp. {{number_format($barang_masuks->sum('total'),'2',',','.')}}
			</h5>
</body> 
</html>


