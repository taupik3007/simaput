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
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Mapel</label>
                  <div class="col-sm-9">
                    <input type="text" name="subj_name" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity(' Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('subj_name')
                    <div>error</div>
                  @enderror
                </div>
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Tingkatan</label>
                <div class="col-sm-9">
                  <select class="form-select mr-sm-2"  id="inlineFormCustomSelect" name="subj_level" oninvalid="this.setCustomValidity('Tingkatan Wajib Diisi')" 
                  onchange="this.setCustomValidity('')" required>
                    <option selected value="" >Pilih...</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
                </div>
                @error('subj_level')
                  <div>error</div>
                @enderror
              </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Jurusan</label>
                  <div class="col-sm-9">
                    <select class="form-select mr-sm-2" id="inlineFormCustomSelect" name="subj_major_id" oninvalid="this.setCustomValidity('Tingkatan Wajib Diisi')" 
                  onchange="this.setCustomValidity('')" required>
                    <option selected value="" >Pilih...</option>
                    <option  value="0" >Normatif</option>
                    @foreach ($major as $major)
                      <option value="{{$major->mjr_id}}">{{$major->mjr_name}}</option>
                    @endforeach
                </select>
                  </div>
                  @error('subj_major_id')
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
