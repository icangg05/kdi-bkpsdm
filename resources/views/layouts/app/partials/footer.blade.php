<footer class="pc-footer">
	<div class="footer-wrapper container-fluid">
		<div class="row align-items-center">
			<div class="col-sm-6 my-1">
				<p class="m-0">© {{ date('Y') }} BKPSDM Kota Kendari. Seluruh hak cipta dilindungi.</p>
			</div>
			<div class="col-sm-6 ms-auto my-1">
				<p class="m-0 text-sm-end">Dikembangkan oleh Dinas Kominfo Kota Kendari</p>
			</div>
		</div>
	</div>
</footer>

<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/icon/custom-font.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>

{{-- Preset tema dipasang sebagai atribut di <body>/<html>, bukan lewat enam
     pemanggilan skrip setelah muat: itu menyebabkan kedip tema, dan
     layout_rtl_change('false') menghapus atribut lang dari <html>.
     apexcharts.min.js + dashboard-default.js dilepas: tidak ada grafik di
     dashboard ini, hanya 528 KB JS yang menargetkan elemen demo template. --}}
