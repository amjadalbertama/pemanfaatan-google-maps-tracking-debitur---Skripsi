@extends('admin')

@section('title', 'DummyPTA1')

@section('breadcumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Data Debitur</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<!-- <li class="active">
						<a href="{{ url('homei') }}">Home </a>/ ... /
						<a href="{{ url('ddebitur') }}"> Data Debitur </a>/ ... /
						<a href="#" title="You're here"> Edit Debitur</a>
					</li> -->
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="content mt-3">
	<div class="animated fadeIn">
		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					Edit Data Debitur - {{ $debitur->nama_debitur }} 
				</div>
				<div class="pull-right">
					<a href="{{ url('ddebitur') }}" class="btn btn-secondary btn-sm">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>

			<div class="card-body">
				<div class="row">
					<form action="{{ url('ddebitur/'.$debitur->id) }}" method="post">
							@method('patch')
							@csrf
					<!-- <div class="col-md-4 offset-md-1"> -->
						

						<div class="col-md-5 offset-md-1" style="  margin-top: 20px;" >
							<div class="page-title">
                                <h2 class="text-center">Data Personalia</h2>
                            </div><br>
							<div class="form-group">
								<label>No Kontrak</label>
								<input type="text" name="no_kontrak" class="form-control @error('no_kontrak') is-invalid @enderror" value="{{ old('no_kontrak', $debitur->no_kontrak) }}" placeholder="contoh Penulisan -> 1000399489" required autofocus readonly>
								@error('no_kontrak')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label>Nama Nasabah Debitur</label>
								<input type="text" name="nama_debitur" class="form-control @error('nama_debitur') is-invalid @enderror" value="{{ old('nama_debitur', $debitur->nama_debitur) }}" placeholder="Ditulis Nama Lengkap" required >
								@error('nama_debitur')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group col-md-6">
								<label>Tanggal Lahir</label>
								<input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir', $debitur->tgl_lahir) }}"  required>
								@error('tgl_lahir')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">		
							<label for="kelamin">Jenis Kelamin :</label> <br>
								<div class="form-check form-check-inline @error('kelamin') is-invalid @enderror" required>
									<label for="kelamin">
										<input type="radio" name="kelamin" value="L" {{ old('kelamin', $debitur->kelamin)=='L' ? 'checked' : '' }} id="kelamin"> Laki-Laki <br>
										<input type="radio" name="kelamin" value="P" {{ old('kelamin', $debitur->kelamin)=='P' ? 'checked' : '' }} id="kelamin"> Perempuan
									</label>
									@error('kelamin')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
							
							<div class="form-group col-md-6">
								<label>No KTP</label>
								<input type="text" name="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror" value="{{ old('no_ktp', $debitur->no_ktp) }}" placeholder="Tuliskan Nomer NIK"  required>
								@error('no_ktp')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                            <div class="form-group col-md-6">
								<label>No NPWP</label>
								<input type="text" name="no_npwp" class="form-control @error('no_npwp') is-invalid @enderror" value="{{ old('no_npwp', $debitur->no_npwp) }}" placeholder="Tuliskan Nomer NPWP" required>
								@error('no_npwp')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">		
							<label for="kelamin">Kewarganegaraan:</label> <br>
								<div class="form-check form-check-inline @error('kewarganegaraan') is-invalid @enderror" required>
									<label for="kewarganegaraan">
										<input type="radio" name="kewarganegaraan" value="warga negara indonesia" {{ old('kewarganegaraan', $debitur->kewarganegaraan)=='warga negara indonesia' ? 'checked' : ''}} id="kewarganegaraan"> Warga Negara Indonesia 
										<input style=" margin-left: 15px;" type="radio" name="kewarganegaraan" value="warga negara asing" {{ old('kewarganegaraan', $debitur->kewarganegaraan)=='warga negara asing' ? 'checked' : ''}} id="kewarganegaraan"> Warga Negara Asing
									</label>
									@error('kewarganegaraan')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
							
							<div class="form-group">		
							<label for="status_perkawinan">Status Perkawinan:</label> <br>
								<div class="form-check form-check-inline @error('status_perkawinan') is-invalid @enderror" required>
									<label for="status_perkawinan">
										<input type="radio" name="status_perkawinan" value="menikah"{{ old('status_perkawinan', $debitur->status_perkawinan)=='menikah' ? 'checked' : '' }}" id="status_perkawinan"> Menikah
										<input style="margin-left: 15px;" type="radio" name="status_perkawinan" value="belum menikah"{{ old('status_perkawinan', $debitur->status_perkawinan)=='belum menikah' ? 'checked' : '' }} id="status_perkawinan"> Belum Menikah
										<input style="margin-left: 15px;" type="radio" name="status_perkawinan" value="duda/janda"{{ old('status_perkawinan', $debitur->status_perkawinan)=='duda/janda' ? 'checked' : '' }} id="status_perkawinan"> Duda/Janda
									</label>
									@error('kelamin')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Jumlah Tanggungan : </label>
								<div class="form-group row offset-md-1">
									<input type="text" name="jmlh_tanggungan" class="form-control @error('jmlh_tanggungan') is-invalid @enderror col-md-1" value="{{ old('jmlh_tanggungan', $debitur->jmlh_tanggungan) }}"  required> <p style=" margin-top: 10px; margin-left: 10px;">Orang </p> </input>
									@error('jmlh_tanggungan')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="form-group">		
							<label for="kelamin">Pendidikan Terakhir:</label> <br>
								<div class="form-check form-check-inline @error('pendidikan_terakhir') is-invalid @enderror" required>
									<label for="pendidikan_terakhir">
										<input type="radio" name="pendidikan_terakhir" value="SMA"{{ old('pendidikan_terakhir', $debitur->pendidikan_terakhir)=='SMA' ? 'checked' : ''}} id="pendidikan_terakhir">SMA
										<input style=" margin-left: 15px;" type="radio" name="pendidikan_terakhir" value="Akademi/Diploma"{{ old('pendidikan_terakhir', $debitur->pendidikan_terakhir)=='Akademi/Diploma' ? 'checked' : ''}} id="pendidikan_terakhir">Akademi/Diploma
										<input style=" margin-left: 15px;" type="radio" name="pendidikan_terakhir" value="S1"{{ old('pendidikan_terakhir', $debitur->pendidikan_terakhir)=='S1' ? 'checked' : ''}} id="pendidikan_terakhir">S1
										<input style=" margin-left: 15px;" type="radio" name="pendidikan_terakhir" value="S2/S3"{{ old('pendidikan_terakhir', $debitur->pendidikan_terakhir)=='S2/S3' ? 'checked' : ''}} id="pendidikan_terakhir">S2/S3
										<input style=" margin-left: 15px;" type="radio" name="pendidikan_terakhir" value="Lainya"{{ old('pendidikan_terakhir', $debitur->pendidikan_terakhir)=='Lainya' ? 'checked' : ''}} id="pendidikan_terakhir">Lainnya
									</label>
									@error('kelamin')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Alamat KTP</label>
								<input type="textarea" name="alamat_ktp" class="form-control @error('alamat_ktp') is-invalid @enderror" value="{{ old('alamat_ktp', $debitur->alamat_ktp) }}" placeholder="Tuliskan Alamat Lengkap Sesuai KTP" required>
								@error('alamat_ktp')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group col-md-6">
								<label>Kelurahan</label>
								<input type="textarea" name="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror" value="{{ old('kelurahan', $debitur->kelurahan) }}" placeholder="Tuliskan Kelurahan Sesuai KTP" required>
								@error('kelurahan')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group col-md-6">
								<label>Kecamatan</label>
								<input type="textarea" name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" value="{{ old('kecamatan', $debitur->kecamatan) }}" placeholder="Tuliskan Kecamatan Sesuai KTP" required>
								@error('kecamatan')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group col-md-6">
								<label>Provinsi</label>
								<input type="textarea" name="provinsi" class="form-control @error('provinsi') is-invalid @enderror" value="{{ old('provinsi', $debitur->provinsi) }}" placeholder="Tuliskan Provinsi Sesuai KTP" required>
								@error('provinsi')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group col-md-6">
								<label>Kota</label>
								<input type="textarea" name="kota" class="form-control @error('kota') is-invalid @enderror" value="{{ old('kota', $debitur->kota) }}" placeholder="Tuliskan Kota Sesuai KTP" required>
								@error('kota')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group col-md-6">
								<label>Kodepos</label>
								<input type="textarea" name="kodepos" class="form-control @error('kodepos') is-invalid @enderror" value="{{ old('kodepos', $debitur->kodepos) }}" placeholder="Tuliskan kodepos Sesuai KTP" required>
								@error('kodepos')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-5 " style="margin-top: 60px;">
							
							<div class="center" style="color: blue; font-size: 13px;" >
								*Apabila ALAMAT TINGGAL Sama Dengan ALAMAT KTP Maka Ditulis Ulang*
							</div>
							<div class="form-group" >
								<label>Alamat Tinggal</label>
								<input type="textarea" name="alamat_tinggal" class="form-control @error('alamat_tinggal') is-invalid @enderror" value="{{ old('alamat_tinggal', $debitur->alamat_tinggal) }}" placeholder="Tuliskan Alamat Tinggal Saat Ini" required>
								@error('alamat_tinggal')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							 <div class="form-group col-md-6">
								<label>Kelurahan</label>
								<input type="textarea" name="kelurahan_at" class="form-control @error('kelurahan_at') is-invalid @enderror" value="{{ old('kelurahan_at', $debitur->kelurahan_at) }}" placeholder="Tuliskan Kelurahan Tinggal Saat ini" required>
								@error('kelurahan_at')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group col-md-6">
								<label>Kecamatan</label>
								<input type="textarea" name="kecamatan_at" class="form-control @error('kecamatan_at') is-invalid @enderror" value="{{ old('kecamatan_at', $debitur->kecamatan_at) }}" placeholder="Tuliskan Kecamatan Tinggal Saat ini" required>
								@error('kecamatan_at')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group col-md-6">
								<label>Provinsi</label>
								<input type="textarea" name="provinsi_at" class="form-control @error('provinsi_at') is-invalid @enderror" value="{{ old('provinsi_at', $debitur->provinsi_at) }}" placeholder="Tuliskan Provinsi Tinggal Saat ini" required>
								@error('provinsi_at')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group col-md-6">
								<label>Kota</label>
								<input type="textarea" name="kota_at" class="form-control @error('kota_at') is-invalid @enderror" value="{{ old('kota_at', $debitur->kota_at) }}" placeholder="Tuliskan Kota Tinggal Saat ini" required>
								@error('kota_at')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group col-md-6">
								<label>Kodepos</label>
								<input type="textarea" name="kodepos_at" class="form-control @error('kodepos_at') is-invalid @enderror" value="{{ old('kodepos_at', $debitur->kodepos_at) }}" placeholder="Tuliskan Kodepos Tinggal Saat ini" required>
								@error('kodepos_at')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							
							<div class="form-group col-md-6">
								<label>Latitude</label>
									<input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" value="{{ old('latitude', $debitur->latitude) }}" required>
									@error('latitude')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
									
							</div>
								
							<div class="form-group col-md-6">
									<label>Longitude</label>
									<input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" value="{{ old('longitude', $debitur->longitude) }}" required>
									@error('longitude')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
									
							</div> <br>
							<div class="form-group col-md-6">
								<label>No Seluler</label>
								<input type="text" name="no_seluler" class="form-control @error('no_seluler') is-invalid @enderror" value="{{ old('no_seluler', $debitur->no_seluler) }}" required>
								@error('no_seluler')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group" >		
								<label for="status_hunian">Status Hunian:</label> <br>
								<div class="form-check form-check-inline @error('status_hunian') is-invalid @enderror" required>
									<label for="status_hunian">
										<input  type="radio" name="status_hunian" value="kontrak/sewa" {{ old('status_hunian', $debitur->status_hunian)=='kontrak/sewa' ? 'checked' : ''}} id="status_hunian"> Kontrak/Sewa
										<input style=" margin-left: 15px;" type="radio" name="status_hunian" value="milik pribadi" {{ old('status_hunian', $debitur->status_hunian)=='milik pribadi' ? 'checked' : ''}} id="status_hunian"> Milik Pribadi
										<input style=" margin-left: 15px;" type="radio" name="status_hunian" value="milik keluarga" {{ old('status_hunian', $debitur->status_hunian)=='milik keluarga' ? 'checked' : ''}} id="status_hunian"> Milik Keluarga
										<input style=" margin-left: 15px;" type="radio" name="status_hunian" value="rumah dinas" {{ old('status_hunian', $debitur->status_hunian)=='rumah dinas' ? 'checked' : ''}} id="status_hunian"> Rumah Dinas
										<input style=" margin-left: 15px;" type="radio" name="status_hunian" value="kos" {{ old('status_hunian', $debitur->status_hunian)=='kos' ? 'checked' : ''}} id="status_hunian"> Kos
									</label>
									@error('kelamin')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Lama Tinggal : </label>
								<div class="form-group row offset-md-1">
									<input type="text" name="lama_tinggal_thn" class="form-control @error('lama_tinggal_thn') is-invalid @enderror col-md-1" value="{{ old('lama_tinggal_thn', $debitur->lama_tinggal_thn) }}" required> <p style=" margin-left: 10px; margin-top: 10px;">Tahun</p>
									@error('lama_tinggal_thn')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror

									<input style=" margin-left: 15px;" type="text" name="lama_tinggal_bln" class="form-control @error('lama_tinggal_bln') is-invalid @enderror col-md-1" value="{{ old('lama_tinggal_bln', $debitur->lama_tinggal_bln) }}"   required>  <p style=" margin-left: 10px; margin-top: 10px;">Bulan</p>
									@error('lama_tinggal_bln')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $debitur->email) }}"   required>
								@error('email')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							
							<div class="form-group">
								<label>No. Telpon Rumah</label>
								<input type="text" name="no_telp_rumah" class="form-control @error('no_telp_rumah') is-invalid @enderror" value="{{ old('no_telp_rumah', $debitur->no_telp_rumah) }}"   required>
								@error('no_telp_rumah')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label>Nama Ibu Kandung</label>
								<input type="text" name="nama_ibu_kandung" class="form-control @error('nama_ibu_kandung') is-invalid @enderror" value="{{ old('nama_ibu_kandung', $debitur->nama_ibu_kandung) }}"   required>
								@error('nama_ibu_kandung')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
						</div>
						
					</div><br>
							<!-- data agunan -->
					<!-- <div class="row" style="border: 1px solid black; padding-bottom: 30px;"hidden>
						<div class="col-md-5 offset-md-1" style="margin-top: 20px;">
									<div class="page-title" style="">
										<h2 class="text-center" >Data Angunan</h2>
									</div><br>
							<div class="form-group">
								<label>No. Agreement</label>
								<input type="text" name="no_agreement" class="form-control @error('no_agreement') is-invalid @enderror" value="{{ old('no_agreement', $debitur->no_agreement) }}"  required>
								@error('no_agreement')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group col-md-6"hidden>
								<label>Tanggal kontrak</label>
								<input type="date" name="tgl_kontrak" class="form-control @error('tgl_kontrak') is-invalid @enderror" value="{{ old('tgl_kontrak', $debitur->tgl_kontrak) }}" required>
								@error('tgl_kontrak')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                            <div class="form-group col-md-6"hidden>
								<label>Tanggal Berakhir</label>
								<input type="date" name="tgl_berakhir" class="form-control @error('tgl_berakhir') is-invalid @enderror" value="{{ old('tgl_berakhir, $debitur->tgl_berakhir') }}"  required>
								@error('tgl_berakhir')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							
                            <div class="form-group col-md-6"hidden>
								<label>Bunga</label>
									<div class="form-group row offset-md-1">
										<input type="text" name="bunga" class="form-control @error('bunga') is-invalid @enderror col-md-2" value="{{ old('bunga', $debitur->bunga) }}" required> <p style=" margin-left: 10px; margin-top: 10px;">%</p>
										@error('bunga')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
							</div>
							<div class="form-group col-md-6"hidden>
								<label>Tenor</label>
									<div class="form-group row offset-md-1">
										<input type="text" name="tenor" class="form-control @error('tenor') is-invalid @enderror col-md-2" value="{{ old('tenor', $debitur->tenor) }}" required> <p style=" margin-left: 10px; margin-top: 10px;">Bulan</p>
										@error('tenor')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
							</div>
						</div>

							<div class="col-md-5"hidden> 
								<div class="form-group" style="margin-top: 80px;">
									<label>Angsuran/Bulan</label>
									<input type="text" name="angsuran_bulan" class="form-control @error('angsuran_bulan') is-invalid @enderror" value="{{ old('angsuran_bulan', $debitur->angsuran_bulan) }}" required>
									@error('angsuran_bulan')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group"hidden>
									<label>Total Pinjaman</label>
									<input type="text" name="total_pinjaman" class="form-control @error('total_pinjaman') is-invalid @enderror" value="{{ old('total_pinjaman', $debitur->total_pinjaman) }}"  required>
									@error('total_pinjaman')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group"hidden>
									<label>Sisa Pinjaman</label>
									<input type="text" name="sisa_pinjaman" class="form-control @error('sisa_pinjaman') is-invalid @enderror" value="{{ old('sisa_pinjaman', $debitur->sisa_pinjaman) }}"  required>
									@error('sisa_pinjaman')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-grup" hidden>
								<label> Kolektabilitas </label>
								<select type="text" class="form-control @error('kolektabilitas') is-invalid @enderror" id="kolektabilitas" name="kolektabilitas" required>
									<option value="{{ ($debitur->kolektabilitas) }}">{{ ($debitur->kolektabilitas) }}</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								</div><br>
								<br>
							</div>
</div> -->
							<center><button type="submit" class="btn btn-success" style="width: 120px; border-radius: 5px;">Update</button></center>










							
							
							
							
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
<script>
						
							
			// var tes = new Array("");

			function initMap() {

				// const datas = require('dummypta1');
				// var connection = new ActiveXObject("dummypta1.Connection") ;
				// connection.Open(connectionstring);
				// var debitur = new ActiveXObject("dummypta1.Recordset");

				// debitur.Open("SELECT * FROM debitur", connection);

			
				var addres = document.querySelector("[name=alamat_ktp]");
				var latInputnew = document.querySelector("[name=latitude]");
				var lngInputnew = document.querySelector("[name=longitude]");
				var latInput = document.getElementById("latitude").value;
				var lngInput = document.getElementById("longitude").value;
				// console.log(latInput);
				
				var latlng = new google.maps.LatLng(latInput, lngInput);
				console.log(latlng);
				// var url = `/api/gmaps`;
				// var query_mysql = document.querySelector("SELECT * FROM debitur");
				// var datas = document.querySelector("koneksi.php");
				// var datas = array(query_mysql);

				var map = new google.maps.Map(document.getElementById("map"), {
				zoom: 13,
				center: latlng,
				});

				var marker = new google.maps.Marker({
				position: latlng,
				map: map,
				draggable : true,
				});

				google.maps.event.addListener(marker, 'dragend', function(){

				latInputnew.value = marker.getPosition().lat();
				lngInputnew.value = marker.getPosition().lng();
				addres.value = marker.getGeometry().location();
				});


				// sebaran lokasi Kolektor   
				
				

				// Sebaran Lokasi Debitur


					// perhitungan haversine

					// for (i in datas){
					// var items = document.getElementsByTagName('jarak');
					// var lokasit = datas[i].locd;

					// var latkol = latInput;
					// var lngkol = lngInput;
					// var latdeb = datas[i].lock[0];
					// var lngdeb = datas[i].lock[1];
					// console.log(latInput);
					

					// var earth_radius = 6372;
					// var r = 3.14 / 180;
					// var td = document.querySelector("[name=jarak]");
					// var x1 = (latdeb - latkol);
					// var x2 = (lngdeb - lngkol);
					
					// var dlat = x1 * r;
					// var dlng = x2 * r;
					// var a    = Math.sin(dlat/2) * Math.sin(dlat/2) + Math.cos(latkol * r) * Math.cos(latdeb * r) * Math.sin(dlng/2) * Math.sin(dlng/2) ;
					// var c    = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
					// var distance = earth_radius * c;
					
					// console.log(distance);

					// tes = distance;

					// for (var i = 0; i <= tes.length; i++) {
						// tes[i].innerHTML = tes[i].style.height;
						// document.getElementById('jarak').innerHTML += tes[i];
					// 	console.log(tes[i]);
					// }
					// console.log(distance);

					// console.log(td.value);
					// }
				
			}

	</script>
@endsection