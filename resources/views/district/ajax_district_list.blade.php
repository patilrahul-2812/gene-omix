    <option value="">Select District</option>
    @if(isset($district_list) && !empty($district_list))
        @foreach($district_list as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    @endif