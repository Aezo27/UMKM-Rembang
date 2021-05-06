//
// Buttons Datatable
//

var DatatableButtons = (function() {

	// Variables

	var $dtButtons = $('#datatable-buttons');


	// Methods

	function init($this) {

		// For more options check out the Datatables Docs:
		// https://datatables.net/extensions/buttons/

		var buttons = ["excel", "print"];

		// Basic options. For more options check out the Datatables Docs:
		// https://datatables.net/manual/options

		var options = {
			lengthChange: 1,
			dom: 'lBfrtip',
			scrollX: true,
			buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
        ],
			// select: {
			// 	style: "multi"
			// },
			language: {
				emptyTable: "Tidak ada data yang tersedia pada tabel ini",
				info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
				infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
				infoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
				infoThousands: "'",
				lengthMenu: "Tampilkan _MENU_ entri",
				loadingRecords: "Sedang memuat...",
				processing: "Sedang memproses...",
				search: "Cari:",
				zeroRecords: "Tidak ditemukan data yang sesuai",
				thousands: "'",
				aria: {
					sortAscending: ": aktifkan untuk mengurutkan kolom ke atas",
					sortDescending: ": aktifkan untuk mengurutkan kolom menurun"
				},
				autoFill: {
					cancel: "Batalkan",
					fill: "Isi semua sel dengan <i>%d<\/i>",
					fillHorizontal: "Isi sel secara horizontal",
					fillVertical: "Isi sel secara vertikal"
				},
				buttons: {
					collection: "Kumpulan <span class='ui-button-icon-primary ui-icon ui-icon-triangle-1-s'\/>",
					colvis: "Visibilitas Kolom",
					colvisRestore: "Kembalikan visibilitas",
					copy: "Salin",
					copyKeys: "Tekan ctrl atau u2318 + C untuk menyalin tabel ke papan klip.<br><br>To membatalkan, klik pesan ini atau tekan esc.",
					copySuccess: {
						1: "1 baris disalin ke papan klip",
						_: "%d baris disalin ke papan klip"
					},
					copyTitle: "Salin ke Papan klip",
					csv: "CSV",
					excel: "Excel",
					pageLength: {
						"-1": "Tampilkan semua baris",
						1: "Tampilkan 1 baris",
						_: "Tampilkan %d baris"
					},
					pdf: "PDF",
					print: "Cetak"
				},
				searchBuilder: {
					add: "Tambah Kondisi",
					button: {
						0: "Cari Builder",
						_: "Cari Builder (%d)"
					},
					clearAll: "Bersihkan Semua",
					condition: "Kondisi",
					data: "Data",
					deleteTitle: "Hapus filter",
					leftTitle: "Ke Kiri",
					logicAnd: "Dan",
					logicOr: "Atau",
					rightTitle: "Ke Kanan",
					title: {
						0: "Cari Builder",
						_: "Cari Builder (%d)"
					},
					value: "Nilai"
				},
				searchPanes: {
					clearMessage: "Bersihkan Semua",
					collapse: {
						0: "SearchPanes",
						_: "SearchPanes (%d)"
					},
					count: "{total}",
					countFiltered: "{shown} ({total})",
					emptyPanes: "Tidak Ada SearchPanes",
					loadMessage: "Memuat SearchPanes",
					title: "Filter Aktif - %d"
				},
				paginate: {
					previous: "<i class='fas fa-angle-left'>",
					next: "<i class='fas fa-angle-right'>"
				}
			}
		};

		// Init the datatable

		var table = $this.on( 'init.dt', function () {
			var device = getBrowserInfo(),
			horizontalScroll = 0,
			tableElement = $(this[0]),
			scrollBody = $('.dataTables_scrollBody'),
			scrollFoot = $('.dataTables_scrollFoot'),
			maxScrollLeft,
			start = { x:0 , y:0 },
			offset;

			// Compute the maxScrollLeft value
			tableElement.on('draw.dt', function() {
				maxScrollLeft = tableElement.width() - scrollBody.width() + 2;
			});

			// Disable TBODY scoll bars
			scrollBody.css({ 'overflow-x': 'hidden' });

			// Enable TFOOT scoll bars
			scrollFoot.css('overflow-x', 'auto');

			// Sync TFOOT scrolling with TBODY
			scrollFoot.on('scroll', function(event) {
				horizontalScroll = scrollFoot.scrollLeft();
				scrollBody.scrollLeft(horizontalScroll);
			});

			// Enable body scroll for touch devices
			if((device.isAndroid && !device.isChrome) || device.isiPad 
				|| (device.isMac && !device.isFF)) {
				// Enable for TBODY scoll bars
				scrollBody.css({ 'overflow-x': 'auto'});
			}

			// Fix for android chrome column misalignment on scrolling
			if(device.isAndroid && device.isChrome) {
				scrollBody[0].addEventListener("touchstart", touchStart, false);
				scrollBody[0].addEventListener("touchmove", touchMove, false);
				scrollFoot[0].addEventListener("touchstart", touchStart, false);
				scrollFoot[0].addEventListener("touchmove", touchMoveFooter, false);                    
			}

			// Fix for Mac OS dual scrollbar problem
			if(device.isMac && device.isFF) {
				scrollBody.on('wheel', function(event) {
					if(Math.abs(event.originalEvent.deltaY) < 3) {
						event.preventDefault();
					}
					performScroll(event.originalEvent.deltaX);
				});
			}

			/*
			* Performs the scroll based on the delta value supplied.
			* @param deltaX {Number}
			*/
			function performScroll(deltaX) {
				horizontalScroll = horizontalScroll + deltaX;
				if(horizontalScroll > maxScrollLeft) {
					horizontalScroll = maxScrollLeft;
				} else if(horizontalScroll < 0) {
					horizontalScroll = 0;
				}
				scrollFoot.scrollLeft(horizontalScroll);
			}

			/*
			* Computes the touch start position along with the maximum
			* scroll left position
			* @param e {object}
			*/
			function touchStart(e) {
				start.x = e.touches[0].pageX;
				start.y = e.touches[0].pageY;
			}

			/*
			* Computes the offset position and perform the scroll based
			* on the offset
			* @param e {Object}
			*/
			function touchMove(e) {
				offset = {};
				offset.x = start.x - e.touches[0].pageX;
				offset.y = start.y - e.touches[0].pageY;
				performScroll(offset.x / 3);
			}

			/*
			* Computes the offset position and perform the scroll based
			* on the offset
			* @param e {Object}
			*/
			function touchMoveFooter(e) {
				e.preventDefault();
				touchMove(e);
			}

			/**
			 * @getBrowserInfo
			 * @description
			 * To get browser information
			 *
			 * @return {Object}
			 */
			function getBrowserInfo() {
				return {
					isiPad: (/\(iPad.*os (\d+)[._](\d+)/i).test(navigator.userAgent) === true || navigator.platform.toLowerCase() === 'ipad',
					isAndroid: (/\(*Android (\d+)[._](\d+)/i).test(navigator.userAgent),
					isMac: navigator.platform.toUpperCase().indexOf('MAC') >= 0,
					isChrome: !!window.chrome,
					isFF: !!window.sidebar
				};
			};
			$('.dt-buttons .btn').removeClass('btn-secondary').addClass('btn-sm btn-default');
	    }).DataTable(options);
	}


	// Events

	if ($dtButtons.length) {
		init($dtButtons);
	}

})();

//
// Dropzone
//

'use strict';