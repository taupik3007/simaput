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
                    <input type="text" name="prn_father_name" class="form-control" value="{{$parent->prn_father_name ?? ''}} " id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nama Ayah Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('prn_father_name')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Pekerjaan Ayah</label>
                  <div class="col-sm-9">
                    <input type="date" name="prn_father_occupation" class="form-control" value="{{$parent->prn_father_occupation ?? ''}}" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Pekerjaan Ayah Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('prn_faher_occupation')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">No Telp Ayah</label>
                  <div class="col-sm-9">
                    <input type="number" name="prn_father_phone" class="form-control" value="{{$parent->prn_father_phone ?? ''}}" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Format Pengisian Salah atau belum Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  
                  @error('prn_father_phone')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Ibu</label>
                  <div class="col-sm-9">
                    <input type="text" name="prn_mother_name" class="form-control" value="{{$parent->prn_mother_name ?? ''}}" id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Nama Ibu Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  
                  @error('prn_mother_name')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Pekerjaan Ibu</label>
                  <div class="col-sm-9">
                    <input type="text" name="prn_mother_occupation" class="form-control" value="{{$parent->prn_mother_occupation ?? ''}}"id="exampleInputText2" placeholder="" required oninvalid="this.setCustomValidity('Pekerjaan Ibu Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  
                  @error('prn_mother_occupation')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">No Telp Ibu (opsional)</label>
                  <div class="col-sm-9">
                    <input type="number" name="prn_mother_phone" class="form-control" value="{{$parent->prn_mother_phone ?? ''}}" id="exampleInputText2" placeholder=""  oninvalid="this.setCustomValidity('Format Pengisisan Salah')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                 
                  @error('prn_mother_phone')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">nama Wali (opsional)</label>
                  <div class="col-sm-9">
                    <input type="text" name="prn_guardian_name" class="form-control" value="{{$parent->prn_guardian_name ?? ''}}" id="exampleInputText2" placeholder="" oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  
                  @error('prn_guardian_name')
                    <div>error</div>
                  @enderror
                </div>
                
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Pekerjaan Wali (opsional)</label>
                  <div class="col-sm-9">
                    <input type="text" name="prn_guardian_occupation" class="form-control" value="{{$parent->prn_guardian_occupation ?? ''}}" id="exampleInputText2" placeholder=""  oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  
                  @error('prn_guardian_occupation')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">No Telp Wali (opsional)</label>
                  <div class="col-sm-9">
                    <input type="text" name="prn_guardian_phone" class="form-control" value="{{$parent->prn_guardian_phone ?? ''}}" id="exampleInputText2" placeholder=""  oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  
                  @error('prn_guardian_phone')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Status Orang Tua</label>
                  <div class="col-sm-9">
                    <select class="form-select mr-sm-2" id="inlineFormCustomSelect" name="prn_status" oninvalid="this.setCustomValidity('Status Orang Tua Wajib Diisi')" 
                  onchange="this.setCustomValidity('')" required>
                    <option  value="" >Pilih...</option>
                    <option  value="1" {{ optional($parent)->prn_status == 1 ? 'selected' : '' }} >Lengkap</option>
                    <option  value="2"{{ optional($parent)->prn_status == 2 ? 'selected' : '' }} >Yatim</option>
                    <option  value="3" {{ optional($parent)->prn_status == 3 ? 'selected' : '' }}>Piatu</option>
                    <option  value="4"{{ optional($parent)->prn_status == 4 ? 'selected' : '' }}>Yatim Piatu</option>


                    {{-- @foreach ($religion as $religion)
                      <option value="{{$religion->rlg_id}}">{{$religion->rlg_name}}</option>
                    @endforeach --}}
                </select>
                  </div>
                  @error('prn_status')
                    <div>error</div>
                  @enderror
                </div>
                 <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Biodata</label>
                  <div class="col-sm-9">
                    <select class="form-select mr-sm-2" id="inlineFormCustomSelect" name="prn_family_income_level" oninvalid="this.setCustomValidity('Penghasilan Keluarga Wajib Diisi')" 
                  onchange="this.setCustomValidity('')" required>
                    <option  value="" >Pilih...</option>
                    <option  value="1" {{ optional($parent)->prn_family_income_level == 1 ? 'selected' : '' }} >1</option>
                    <option  value="2"{{ optional($parent)->prn_family_income_level == 2 ? 'selected' : '' }} >2</option>
                    <option  value="3" {{ optional($parent)->prn_family_income_level == 3 ? 'selected' : '' }}>3</option>
                    <option  value="4"{{ optional($parent)->prn_family_income_level == 4 ? 'selected' : '' }} >4</option>


                    {{-- @foreach ($religion as $religion)
                      <option value="{{$religion->rlg_id}}">{{$religion->rlg_name}}</option>
                    @endforeach --}}
                </select>
                  </div>
                  @error('prn_family_income_level')
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
