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
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Ayah</label>
                  <div class="col-sm-9">
                    <input type="text" name="bio_place_of_birth" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('bio_place_of_birth')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Pekerjaan Ayah</label>
                  <div class="col-sm-9">
                    <input type="date" name="bio_date_of_birth" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('bio_date_of_birth')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">No Telp Ayah</label>
                  <div class="col-sm-9">
                    <input type="text" name="bio_height" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  
                  @error('bio_height')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Ibu</label>
                  <div class="col-sm-9">
                    <input type="text" name="bio_weight" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  
                  @error('bio_weight')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Pekerjaan Ibu</label>
                  <div class="col-sm-9">
                    <input type="text" name="bio_weight" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  
                  @error('bio_weight')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">No Telp Ibu</label>
                  <div class="col-sm-9">
                    <input type="text" name="bio_weight" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                 
                  @error('bio_weight')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">nama Wali (opsional)</label>
                  <div class="col-sm-9">
                    <input type="text" name="bio_weight" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  
                  @error('bio_weight')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Wali (opsional)</label>
                  <div class="col-sm-9">
                    <input type="text" name="bio_weight" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  
                  @error('bio_weight')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Pekerjaan Wali (opsional)</label>
                  <div class="col-sm-9">
                    <input type="text" name="bio_weight" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  
                  @error('bio_weight')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">No Telp Wali (opsional)</label>
                  <div class="col-sm-9">
                    <input type="text" name="bio_weight" class="form-control" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  
                  @error('bio_weight')
                    <div>error</div>
                  @enderror
                </div>
                 <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Biodata</label>
                  <div class="col-sm-9">
                    <select class="form-select mr-sm-2" id="inlineFormCustomSelect" name="bio_religion_id" oninvalid="this.setCustomValidity('Tingkatan Wajib Diisi')" 
                  onchange="this.setCustomValidity('')" required>
                    <option selected value="" >Pilih...</option>
                    {{-- @foreach ($religion as $religion)
                      <option value="{{$religion->rlg_id}}">{{$religion->rlg_name}}</option>
                    @endforeach --}}
                </select>
                  </div>
                  @error('bio_religion_id')
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
