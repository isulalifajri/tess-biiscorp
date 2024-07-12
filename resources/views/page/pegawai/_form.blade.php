@push('css')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
@endpush
@if(request()->segment(count(request()->segments())) == 'edit') 
    <div class="mt-1">
        @if($data->image)
        <img src="{{ $data->pegawai_url}}" 
        class="img-preview img-fluid mb-3 col-sm-2 d-block" alt="{{ $data->image }}" id="myImg">
        @else
            <img class="img-preview img-fluid mb-3 col-sm-2" alt="default">
        @endif
        <div class="input-group input-group-merge">
            <input
            type="file"
            accept="image/png, image/gif, image/jpeg, image/jpg, image/webp"
            name="image"
            class="form-control @error('image') is-invalid @enderror"
            id="image-prv" onchange="previewImage()" />
        </div>
        <span style="font-size: 11px">*Only uploading image is allowed</span>
    </div>   
@endif

<div class="mt-1">
    <label class="form-label" for="name">Nama Pegawai</label>
    <div class="input-group input-group-merge">
        <input
        type="text"
        class="form-control @error('name') is-invalid @enderror"
        name="name"
        id="name"
        placeholder="Masukkan nama pegawai" value="{{ old('name', $data->name) }}" required />
    </div>
    @error('name')
      <div class="invalid-feedback d-block">
          {{ $message }}
      </div>
    @enderror
</div>

<div class="mt-1">
    <label class="form-label" for="stok">Jenis Kelamin</label>
    @php
        $jenis_kelamin = ['Laki-Laki', 'Perempuan'];  
    @endphp
    <select class="form-select @error('jenis_kelamin') is-invalid @enderror cursor-pointer jsn" name="jenis_kelamin" id="jenis_kelamin" required>
        <option value="">Pilih Jenis Kelamin</option>
        @foreach ($jenis_kelamin as $jk)
            <option value="{{ $jk }}" {{ old('jenis_kelamin', $data->jenis_kelamin) == $jk ? 'selected' : '' }}>{{ $jk }}</option>
        @endforeach
    </select>
        @error('jenis_kelamin')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>


<div class="mt-1">
    <label class="form-label" for="email">Email</label>
    <div class="input-group input-group-merge">
        <input
        type="email"
        class="form-control @error('email') is-invalid @enderror"
        name="email"
        id="email"
        placeholder="Masukkan email" value="{{ old('email', $data->email)}}" required />
    </div>
    @error('email')
      <div class="invalid-feedback d-block">
          {{ $message }}
      </div>
    @enderror
</div>

<div class="mt-1">
    <label class="form-label" for="no_telepon">No Telepon</label>
    <div class="input-group input-group-merge">
        <input
        type="text"
        class="form-control @error('no_telepon') is-invalid @enderror"
        name="no_telepon"
        id="no_telepon"
        placeholder="Masukkan no telepon" value="{{ old('no_telepon', $data->no_telepon) }}" required />
    </div>
    @error('no_telepon')
      <div class="invalid-feedback d-block">
          {{ $message }}
      </div>
    @enderror
</div>

<div class="mt-1">
    <label class="form-label" for="my-editor">Alamat</label>
    <div class="input-group-merge">
        <textarea name="address" class="my-editor form-control @error('description') is-invalid @enderror" 
        id="my-editor" style="font-size:20px; resize:none">{{ old('address', $data->address) }}</textarea>
    </div>
    @error('address')
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="mt-1">
    <label class="form-label" for="position">Posisi</label>
    <div class="input-group input-group-merge">
        <input
        type="text"
        class="form-control @error('position') is-invalid @enderror"
        name="position"
        id="position"
        placeholder="except:Web Developer"
        value="{{ old('position', $data->position) }}" required />
    </div>
    @error('position')
      <div class="invalid-feedback d-block">
          {{ $message }}
      </div>
    @enderror
</div>
<div class="mt-1">
    <label class="form-label" for="hire_date">Tanggal Mulai</label>
    <div class="input-group input-group-merge">
        <input
        type="date"
        class="form-control @error('hire_date') is-invalid @enderror"
        name="hire_date"
        id="hire_date"
        value="{{ old('hire_date', $data->hire_date) }}" required />
    </div>
    @error('hire_date')
      <div class="invalid-feedback d-block">
          {{ $message }}
      </div>
    @enderror
</div>
@if(request()->segment(count(request()->segments())) == 'create')    
    <div class="mt-1">
        <label class="form-label" for="image-prv">image</label>
        <img class="img-preview img-fluid mb-3 col-sm-2" alt="">
        <div class="input-group input-group-merge">
            <input
            type="file"
            accept="image/png, image/gif, image/jpeg, image/jpg, image/webp"
            name="image"
            class="form-control @error('image') is-invalid @enderror"
            id="image-prv" onchange="previewImage()" required />
        </div>
        <span style="font-size: 11px">*Only uploading image is allowed</span>
    </div>
@endif

@push('editor')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('address');
</script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.jsn').select2();
    });
</script>



<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

@endpush