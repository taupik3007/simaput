@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    SiMaput | Tambah Jurusan
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
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Nama Persyaratan</label>
                  <div class="col-sm-9">
                    <input type="text" name="rqd_name" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Nama Persayratan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  
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
