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
            <h4 class="card-title mb-0">Tambah Penyelenggaraan PPDB</h4>
          </div>
          
          
              
          <form action="" method="post">
            @csrf
            <div class="card-body">
              @error('error')
          <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong class="text-center">{{ $message }} </strong> 
          </div>
      @enderror
      @error('sta_year')
          <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong class="text-center">{{ $message }} </strong> 
          </div>
      @enderror
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Tahun Ajaran</label>
                <div class="col-sm-9">
                  <select class="form-select mr-sm-2" id="inlineFormCustomSelect" name="sta_year" oninvalid="this.setCustomValidity('Tahun Ajaran Wajib Diisi')" 
                  onchange="this.setCustomValidity('')" required>
                    <option selected value="{{$studentAdmission->sta_year}}" >{{$studentAdmission->sta_year}}</option>
                    @for ($i = $year; $i < $loop; $i++)
                    @if($i." - ".$i+1 != $studentAdmission->sta_year)

                    <option value="{{$i}} - {{$i+1}}" >{{$i}} - {{$i+1}}</option>
                    @endif
                    @endfor
                </select>
                </div>
                @error('mjr_name')
                  <div>error</div>
                @enderror
              </div>
              <div class="mb-4 row align-items-center">
                <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Periode Penyelenggaraan</label>
                <div class="col-sm-4">
                  
                    <input name="sta_start" type="datetime-local" class="form-control" value="{{$studentAdmission->sta_start}}"  required oninvalid="this.setCustomValidity('Tanggal Awal Penyelenggaraan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                
                  
                </div>
                <div class="col-sm-1"> <center>-</center></div>
                <div class="col-sm-4">
                  
                  <input name="sta_ended" type="datetime-local" class="form-control" value="{{$studentAdmission->sta_ended}}"  required oninvalid="this.setCustomValidity('Tanggal akhir penyelenggaraan Wajib Diisi')" 
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
