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
                <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Tingkatan</label>
                <div class="col-sm-9">
                  <select class="form-select mr-sm-2" id="inlineFormCustomSelect" name="cls_level" oninvalid="this.setCustomValidity('Tingkatan Wajib Diisi')" 
                  onchange="this.setCustomValidity('')" required>
                  @if ($classes->cls_level == "X")
                  <option value="X">X</option>
                  <option value="XI">XI</option>
                  <option value="XII">XII</option>
                  @elseif($classes->cls_level == "XI")
                  <option value="XI">XI</option>
                  <option value="X">X</option>
                  <option value="XII">XII</option>
                  @else
                  <option value="XII">XII</option>
                  <option value="X">X</option>
                  <option value="XI">XI</option>
                  @endif
                </select>
                </div>
                @error('mjr_name')
                  <div>error</div>
                @enderror
              </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Jurusan</label>
                  <div class="col-sm-9">
                    <select class="form-select mr-sm-2" id="inlineFormCustomSelect" name="cls_major_id" oninvalid="this.setCustomValidity('Tingkatan Wajib Diisi')" 
                  onchange="this.setCustomValidity('')" required>
                    <option selected value="{{$classes->cls_major->mjr_id}}" >{{$classes->cls_major->mjr_name}}</option>
                    @foreach ($major as $major)
                        
                        <option value="{{$major->mjr_id}}">{{$major->mjr_name}}</option>
                       
                    @endforeach
                </select>
                  </div>
                  @error('mjr_name')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nomor</label>
                  <div class="col-sm-9">
                    <input type="text" name="cls_number" value="{{$classes->cls_number}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('mjr_prefix')
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
