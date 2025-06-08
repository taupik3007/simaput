@extends('prospective_student.master')

@push('link')
    
@endpush

@section('title')
    SiMaput | Biodata
@endsection

@section('content')
      <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Biodata</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">
              <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <select class="form-select mr-sm-2" id="inlineFormCustomSelect" name="bio_gender" oninvalid="this.setCustomValidity('Jenis Kelamin Wajib Diisi')" 
                  onchange="this.setCustomValidity('')" required>
                   <option value="">Pilih..</option>
                   <option value="1" {{ optional($biodata)->bio_gender == 1 ? 'selected' : '' }}>Laki-Laki</option>
                   <option value="2" {{ optional($biodata)->bio_gender == 2 ? 'selected' : '' }}>Perempuan</option>

                </select>
                  </div>
                  @error('bio_gender')
                    <div>error</div>
                  @enderror
                </div>
               
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Agama</label>
                  <div class="col-sm-9">
                    <select class="form-select mr-sm-2" id="inlineFormCustomSelect" name="bio_religion_id" oninvalid="this.setCustomValidity('Agama Wajib Diisi')" 
                  onchange="this.setCustomValidity('')" required>
                    @if(isset($biodata))
                    <option selected value="{{$biodata->bio_religion_id}}" >{{$biodata->bio_religion->rlg_name}}</option>
                    @else
                    <option selected value="" >Pilih...</option>
                    @endif
                    @foreach ($religion as $religion)
                      <option value="{{$religion->rlg_id}}">{{$religion->rlg_name}}</option>
                    @endforeach
                </select>
                  </div>
                  @error('bio_religion_id')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-9">
                    <input type="text" name="bio_place_of_birth" value="{{$biodata->bio_place_of_birth ?? ''}}" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tempat Lahir Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('bio_place_of_birth')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-9">
                    <input type="date" name="bio_date_of_birth" class="form-control" value="{{$biodata->bio_date_of_birth ?? ''}}" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Tanggal Lahir Belum Di isi atau Format salah')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('bio_date_of_birth')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Tinggi badan</label>
                  <div class="col-sm-8">
                    <input type="text" name="bio_height" class="form-control" id="exampleInputText2" value="{{$biodata->bio_height ?? ''}}" placeholder="" required oninvalid="this.setCustomValidity('Tinggi Badan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  <div class="col-sm-1">cm</div>
                  @error('bio_height')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Berat Badan</label>
                  <div class="col-sm-8">
                    <input type="text" name="bio_weight" class="form-control" id="exampleInputText2" value="{{$biodata->bio_weight ?? ''}}" placeholder="" required oninvalid="this.setCustomValidity('Berat Badan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  <div class="col-sm-1">Kg</div>
                  @error('bio_weight')
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
