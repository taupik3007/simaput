@extends('prospective_student.master')

@push('link')
  <link rel="stylesheet" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
@endpush

@section('title')
    SiMaput | Alamat
@endsection

@section('content')
      <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Alamat</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">
              <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2"  class="form-label col-sm-3 col-form-label">Provinsi</label>
                  <div class="col-sm-9">
                    <select class="select2 form-control"  required name="adr_province" id="province">
                      <option value="">Pilih Provinsi..</option>
                      @foreach($province as $province)
                      <option value="{{ $province['code'] }}" {{ $selectedProvince == $province['code'] ? 'selected' : '' }}>{{ $province['name'] }}</option>
                      @endforeach
                    </select>
                  </div>
                  @error('adr_province')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2"  class="form-label col-sm-3 col-form-label">Kabupaten / Kota</label>
                  <div class="col-sm-9">
                    <select class="select2 form-control" required name="adr_regency" id="regency">
                      <option value="">Pilih Kabupaten / Kota</option>
                    </select>
                  </div>
                  @error('adr_regency')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Kecamatan</label>
                  <div class="col-sm-9">
                    <select class="select2 form-control" required  name="adr_district" id="district">
                      <option value="">Pilih Kecamatan</option>
                    </select>
                  </div>
                  @error('adr_district')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Desa</label>
                  <div class="col-sm-9">
                    <select class="select2 form-control" required name="adr_village" id="village">
                      <option value="">Pilih Desa</option>
                    </select>
                  </div>
                  @error('adr_village')
                    <div>error</div>
                  @enderror
                </div>

                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Deskripsi Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="adr_detail" required rows="3">{{$selectedDetail}}</textarea>
                  </div>
                  @error('prn_father_name')
                    <div>error</div>
                  @enderror
                </div>
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9">
                    <input type="submit" class="btn btn-primary" value="Kirim" id="">
                  </div>
                </div>
              </div>
          </form>
          
        </div>
      </div>
   </div>
   <script>
    $(document).ready(function () {
  let selectedProvince = '{{ $selectedProvince }}';
  let selectedRegency = '{{ $selectedRegency }}';
  let selectedDistrict = '{{ $selectedDistrict }}';
  let selectedVillage = '{{ $selectedVillage }}';

  if (selectedProvince) {
    $.get('/prospective-student/address/regencies/' + selectedProvince, function (data) {
      $('#regency').empty().append('<option value="">Pilih Kabupaten</option>');
      $.each(data, function (i, d) {
        $('#regency').append('<option value="' + d.code + '" ' + (d.code == selectedRegency ? 'selected' : '') + '>' + d.name + '</option>');
      });

      if (selectedRegency) {
        $.get('/prospective-student/address/districts/' + selectedRegency, function (data) {
          $('#district').empty().append('<option value="">Pilih Kecamatan</option>');
          $.each(data, function (i, d) {
            $('#district').append('<option value="' + d.code + '" ' + (d.code == selectedDistrict ? 'selected' : '') + '>' + d.name + '</option>');
          });

          if (selectedDistrict) {
            $.get('/prospective-student/address/villages/' + selectedDistrict, function (data) {
              $('#village').empty().append('<option value="">Pilih Desa</option>');
              $.each(data, function (i, d) {
                $('#village').append('<option value="' + d.code + '" ' + (d.code == selectedVillage ? 'selected' : '') + '>' + d.name + '</option>');
              });
            });
          }
        });
      }
    });
  }
});
   </script>



   <script>
$(document).ready(function() {
  // $('.select2').select2();

  $('#province').on('change', function() {
    let province_code = $(this).val();
    console.log(province_code);
    if(province_code) {
      $.ajax({
        url: '/prospective-student/address/regencies/' + province_code, // endpoint kabupaten
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          $('#regency').empty().append('<option value="">Pilih Kabupaten / Kota</option>');
          $('#district').empty().append('<option value="">Pilih Kecamatan</option>');
          $('#village').empty().append('<option value="">Pilih Desa</option>');
          // console.log("success");
          $.each(data, function(key, value) {
            $('#regency').append('<option value="'+ value.code +'">'+ value.name +'</option>');
          });
        }
      });
    } else {
      $('#regency, #district, #village').empty().append('<option value="">Select</option>');
    }
  });
  $('#regency').on('change', function() {
    let regency_code = $(this).val();
    console.log(regency_code);
    if(regency_code) {
      $.ajax({
        url: '/prospective-student/address/districts/' + regency_code, // endpoint kabupaten
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          
          $('#district').empty().append('<option value="">Pilih Kecamatan</option>');
          $('#village').empty().append('<option value="">Pilih Desa</option>');
          // console.log("success");
          $.each(data, function(key, value) {
            $('#district').append('<option value="'+ value.code +'">'+ value.name +'</option>');
          });
        }
      });
    } else {
      $(' #district, #village').empty().append('<option value="">Pilih Desa</option>');
    }
  });
  $('#district').on('change', function() {
    let district_code = $(this).val();
    console.log(district_code);
    if(district_code) {
      $.ajax({
        url: '/prospective-student/address/villages/' + district_code, // endpoint kabupaten
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          
         
          $('#village').empty().append('<option value="">Pilih Desa</option>');
          // console.log("success");
          $.each(data, function(key, value) {
            $('#village').append('<option value="'+ value.code +'">'+ value.name +'</option>');
          });
        }
      });
    } else {
      $(' #village').empty().append('<option value="">Pilih..</option>');
    }
  });
});
 
</script>
{{-- <script>
  document.getElementById('provinsi').on('change', function() {
            const id = this.value;
            fetch(`/prospective-student/address/regencies/${id}`)
                .then(res => res.json())
                .then(data => {
                    let options = '<option value="">-- Pilih Kabupaten --</option>';
                    data.forEach(item => {
                        options += `<option value="${item.id}">${item.name}</option>`;
                    });
                    document.getElementById('regency').innerHTML = options;
                    document.getElementById('district').innerHTML = '<option>-- Pilih Kecamatan --</option>';
                    document.getElementById('desa').innerHTML = '<option>-- Pilih Desa --</option>';
                });
        });

</script> --}}
@endsection




@push('script')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
  <script src="{{asset('assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="{{asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>
  <script src="{{asset('assets/js/forms/select2.init.js')}}"></script>
@endpush
