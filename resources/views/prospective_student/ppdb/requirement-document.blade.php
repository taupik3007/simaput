@extends('prospective_student.master')

@push('link')
    
@endpush

@section('title')
    SiMaput | Data Orang Tua
@endsection

@section('content')
      <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Data orang Tua</h4>
          </div>
          <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              
               
               @foreach($requirementDocument as $requirement)
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">{{$requirement->rqd_name}}</label>
                  <div class="col-sm-9">
                    <input type="file" name="files[{{$requirement->rqd_id}}]" class="form-control" value="" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Pekerjaan Ayah Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('prn_faher_occupation')
                    <div>error</div>
                  @enderror
                </div>
                @endforeach
                
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
