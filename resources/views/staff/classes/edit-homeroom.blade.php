@extends('staff.master')

@push('link')
    
@endpush

@section('title')
    SiMaput | Wali Kelas
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Setting Wali Kelas</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">
              
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Nama Guru</label>
                  <div class="col-sm-9">
                    <select class="form-select mr-sm-2" id="inlineFormCustomSelect" name="cls_homeroom_id" oninvalid="this.setCustomValidity('Tingkatan Wajib Diisi')" 
                  onchange="this.setCustomValidity('')" required>
                    <option selected value="" >Pilih...</option>
                    @foreach ($teacher as $teacher)
                      <option value="{{$teacher->usr_id}}">{{$teacher->name}}</option>
                    @endforeach
                </select>
                  </div>
                  @error('mjr_name')
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
