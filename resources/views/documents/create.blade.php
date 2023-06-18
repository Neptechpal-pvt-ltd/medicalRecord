@extends('layouts.layout')

@section('content')
<h1 class="h2">Documents</h1>
<div class="row">
    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
        <div class="card">
            <div class="card-header">
                <span><strong>Add New Document</strong></span>
                <a class="btn btn-primary float-right" href="{{route('documents.index')}}">Back</a>
            </div>
            <div class="card-body">
                <form action="{{route('documents.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <strong>Basic Details:</strong>
                            </div>
                            <div class="col-md-6">
                                <label for="title" class="form-label">Father's Name</label>
                                <input type="text" class="form-control @error('father_name') is-invalid @enderror "
                                    id="father_name" name="father_name">
                                @error('father_name')
                                <div class="invalid-feedback">
                                    {{$errors->first('father_name')}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="title" class="form-label">Father's Name(Devnagari)</label>
                                <input type="text" class="form-control @error('father_name_dev') is-invalid @enderror "
                                    id="father_name_dev" name="father_name_dev">
                                @error('father_name_dev')
                                <div class="invalid-feedback">
                                    {{$errors->first('father_name_dev')}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="title" class="form-label">Mother's Name</label>
                                <input type="text" class="form-control @error('mother_name') is-invalid @enderror "
                                    id="mother_name" name="mother_name">
                                @error('mother_name')
                                <div class="invalid-feedback">
                                    {{$errors->first('mother_name')}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="title" class="form-label">Mother's Name(Devnagari)</label>
                                <input type="text" class="form-control @error('mother_name_dev') is-invalid @enderror "
                                    id="mother_name_dev" name="mother_name_dev">
                                @error('mother_name_dev')
                                <div class="invalid-feedback">
                                    {{$errors->first('mother_name_dev')}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="title" class="form-label">Father's Nationality</label>
                                <select name="father_nationality" id="father_nationality" class="selectize-select">
                                    @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                @error('father_nationality')
                                <div class="invalid-feedback">
                                    {{$errors->first('father_nationality')}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="title" class="form-label">Mother's Nationality</label>
                                <select name="mother_nationality" id="mother_nationality" class="selectize-select">
                                    @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                @error('mother_nationality')
                                <div class="invalid-feedback">
                                    {{$errors->first('mother_nationality')}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-6 col-form-label" for="gender">Gender</label>
                                <div class="col-md-12">
                                    <select name="gender" id="gender"
                                        class="form-control form-select @error('gender') is-invalid @enderror"
                                        value="{{ old('gender') }}">
                                        <option value="">None</option>
                                        <option {{old('gender')==='MALE' ? 'selected' : '' }} value="MALE">Male</option>
                                        <option {{old('gender')==='FEMALE' ? 'selected' : '' }} value="female">Female
                                        </option>
                                        <option {{old('gender')==='OTHER' ? 'selected' : '' }} value="other">Other
                                        </option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        {{$errors->first('gender')}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-6 col-form-label" for="nationality">Weight(In KG)<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="number" step="0.1" name="weight"
                                        class="form-control @error('weight') is-invalid @enderror"
                                        value="{{ old('weight') }}">
                                    @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        {{$errors->first('weight')}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-6 col-form-label">Birth Date<span
                                        class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" id="birth_date_bs" name="birth_date_bs"
                                            class="form-control @error('birth_date_bs') is-invalid @enderror"
                                            value="{{ old('birth_date_bs') }}">
                                        @error('birth_date_bs')
                                        <span class="invalid-feedback" role="alert">
                                            {{$errors->first('birth_date_bs')}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" id="birth_date" name="birth_date" readonly
                                            class="form-control @error('birth_date') is-invalid @enderror"
                                            value="{{ old('birth_date') }}">
                                        @error('birth_date')
                                        <span class="invalid-feedback" role="alert">
                                            {{$errors->first('bith_date_ad')}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-6 col-form-label">Birth Time<span
                                        class="text-danger">*</span></label>
                                <input type="time" id="birth_time" name="birth_time"
                                    class="form-control @error('birth_time') is-invalid @enderror"
                                    value="{{ old('birth_time') }}">
                                @error('birth_time')
                                <span class="invalid-feedback" role="alert">
                                    {{$errors->first('birth_time')}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12 mt-2">
                                <strong>Address Details:</strong>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-6 col-form-label" for="province_id">Province </label>
                                <div class="col-md-12">
                                    <select id="province_id" name="province_id"
                                        class="form-select @error('province_id') is-invalid @enderror"
                                        value="{{ old('province_id') }}">
                                        <option value="">Select Province</option>
                                        @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->province_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                    <span class="invalid-feedback" role="alert">
                                        {{$errors->first('province_id')}}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-6 col-form-label" for="district_id">District </label>
                                <div class="col-md-12">
                                    <select id="district_id" name="district_id"
                                        class="form-select @error('district_id') is-invalid @enderror"
                                        value="{{ old('district_id') }}">
                                        <option value="">Select District</option>
                                    </select>
                                    @error('district_id')
                                    <span class="invalid-feedback" role="alert">
                                        {{$errors->first('district_id')}}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-6 col-form-label" for="municipal_id">Municipality </label>
                                <div class="col-md-12">
                                    <select id="municipal_id" name="municipal_id"
                                        class="form-select @error('municipal_id') is-invalid @enderror"
                                        value="{{ old('municipal_id') }}">
                                        <option value="">Select Municipality</option>
                                    </select>
                                    @error('municipal_id')
                                    <span class="invalid-feedback" role="alert">
                                        {{$errors->first('municipal_id')}}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-6 col-form-label" for="ward_no">Ward No</label>
                                <div class="col-md-12">
                                    <input type="number" name="ward_no" id="t-ward"
                                        class="form-control @error('ward_no') is-invalid @enderror"
                                        value="{{ old('ward_no') }}" placeholder="Ward No">
                                    @error('ward_no')
                                    <span class="invalid-feedback" role="alert">
                                        {{$errors->first('ward_no')}}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-6 col-form-label" for="t_tole">Address</label>
                                <div class="col-md-12">
                                    <input type="text" name="address" id="t-tole"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address') }}" placeholder="Tole">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        {{$errors->first('address')}}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <strong>Registration Details:</strong>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-6 col-form-label">Registered Date<span
                                        class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" id="registered_date_bs" name="registered_date_bs"
                                            class="form-control @error('registered_date_bs') is-invalid @enderror"
                                            value="{{ old('registered_date_bs') }}">
                                        @error('registered_date_bs')
                                        <span class="invalid-feedback" role="alert">
                                            {{$errors->first('registered_date_bs')}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" id="registered_date_ad" name="registered_date_ad" readonly
                                            class="form-control @error('registered_date_ad') is-invalid @enderror"
                                            value="{{ old('registered_date_ad') }}">
                                        @error('registered_date_ad')
                                        <span class="invalid-feedback" role="alert">
                                            {{$errors->first('registered_date_ad')}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="title" class="form-label">Birth Certificate No</label>
                                <input type="text" class="form-control @error('certificate_no') is-invalid @enderror "
                                    id="certificate_no" name="certificate_no">
                                @error('certificate_no')
                                <div class="invalid-feedback">
                                    {{$errors->first('certificate_no')}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="title" class="form-label">IP No</label>
                                <input type="text" class="form-control @error('ip_no') is-invalid @enderror " id="ip_no"
                                    name="ip_no">
                                @error('ip_no')
                                <div class="invalid-feedback">
                                    {{$errors->first('ip_no')}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="approved_by" class="form-label">Approved By</label>
                                <input type="text" class="form-control @error('approved_by') is-invalid @enderror "
                                    id="approved_by" name="approved_by">
                                @error('approved_by')
                                <div class="invalid-feedback">
                                    {{$errors->first('approved_by')}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="verified_by" class="form-label">Verified By</label>
                                <input type="text" class="form-control @error('verified_by') is-invalid @enderror "
                                    id="verified_by" name="verified_by">
                                @error('verified_by')
                                <div class="invalid-feedback">
                                    {{$errors->first('verified_by')}}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js"
        type="text/javascript"></script>
<script>
    $('#province_id').on('change', function() {
            var provinceId = this.value;
            $("#district_id").html('');
            $.ajax({
                url: "{{ url('fetch-districts') }}",
                type: "POST",
                data: {
                    province_id: provinceId,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#district_id').html('<option value="">Select District</option>');
                    $.each(result.districts, function(key, value) {
                        $("#district_id").append('<option value="' + value
                            .id + '">' + value.district_name + '</option>');
                    });
                    $('#municipal_id').html(
                        '<option value="">Select Municipality</option>');
                }
            });
        });

        $('#district_id').on('change', function() {
            var districtId = this.value;
            $("#municipal_id").html('');
            $.ajax({
                url: "{{ url('fetch-municipalities') }}",
                type: "POST",
                data: {
                    district_id: districtId,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#municipal_id').html(
                        '<option value="">Select Municipality</option>');
                    $.each(res.municipalities, function(key, value) {
                        $("#municipal_id").append('<option value="' + value
                            .id + '">' + value.municipal_name + '</option>');
                    });
                }
            });
        });
        $('#birth_date_bs').nepaliDatePicker({
            onChange: function() {
                changeIntoAD('#birth_date_bs', '#birth_date');
            }
        });
        $('#registered_date_bs').nepaliDatePicker({
            onChange: function() {
                changeIntoAD('#registered_date_bs', '#registered_date_ad');
            }
        });
    function getNepaliDate(inputVal) {
            var dateInAd = NepaliFunctions.ConvertToDateObject(inputVal, "YYYY-MM-DD")
            var dateInBs = NepaliFunctions.AD2BS({
                year: dateInAd.year,
                month: dateInAd.month,
                day: dateInAd.day
            });
            return dateInBs;
        }

        function changeIntoAD(nepaliPickerId, englishPickerId) {
            var input = $(nepaliPickerId).val();
            dateAd = getEnglishDate(input);
            dateAd = NepaliFunctions.ConvertDateFormat({
                year: dateAd.year,
                month: dateAd.month,
                day: dateAd.day
            }, "YYYY-MM-DD");
            $(englishPickerId).val(dateAd);
        }

        function getEnglishDate(inputVal) {
            var dateInBs = NepaliFunctions.ConvertToDateObject(inputVal, "YYYY-MM-DD")
            var dateInAd = NepaliFunctions.BS2AD({
                year: dateInBs.year,
                month: dateInBs.month,
                day: dateInBs.day
            });
            return dateInAd;
        }
</script>
@endsection