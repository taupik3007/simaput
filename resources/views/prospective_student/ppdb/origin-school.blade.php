@extends('prospective_student.master')

@push('link')
    
@endpush

@section('title')
    SiMaput | Daftar Kelas
@endsection

@section('content')
      <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Tambah Jurusan</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">
              
               
                
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Sekolah Asal</label>
                  <div class="col-sm-9">
                    <input type="text" name="bio_place_of_birth" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('bio_place_of_birth')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">NPSN Sekolah Asal</label>
                  <div class="col-sm-9">
                    <input type="date" name="bio_date_of_birth" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('bio_date_of_birth')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nomor UN (opsional)</label>
                  <div class="col-sm-9">
                    <input type="text" name="bio_height" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                 
                  @error('bio_height')
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
@endsection



@push('script')
    
@endpush
