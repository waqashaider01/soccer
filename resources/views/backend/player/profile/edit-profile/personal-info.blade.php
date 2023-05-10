@php
    // dd($playerInfo);
    if ($playerInfo != null) {
        $name = explode(' ', $playerInfo->user->name);
    }
    
@endphp
<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{url('/player/personal-info/save')}}">
            @csrf
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name *</label>
                <input type="text" class="form-control" name="firstname" id="firstName" placeholder="{{ $name[0] ?? '' }}"
                    placeholder="Louis">
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name *</label>
                <input type="text" class="form-control" name="lastname" id="lastName" placeholder="{{ $name[1] ?? '' }}"
                    placeholder="Anetekhai">
            </div>
            @if ($playerInfo != null)
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender *</label>

                    <select id="gender" class="form-select" name="gender">
                        <option value="male" @if ($playerInfo->gender == 'male') selected @endif>Male</option>
                        <option value="female" @if ($playerInfo->gender == 'female') selected @endif>Female</option>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth *</label>
                    <input type="date" class="form-control" id="dob" name="dob"
                        value="{{ $playerInfo->dob ?? ''}}">
                </div>
                <div class="mb-3">
                    <label for="countryOfBirth" class="form-label">Country Of Birth *</label>
                    <select id="countryOfBirth" name="countryOfBirth" class="form-select">
                        <option value="" selected disabled>Select Country</option>
                        @if (count($countries) > 0)

                            @foreach ($countries as $country)
                                @if ($playerInfo->birth_country == $country->id)
                                    <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                @else
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endif
                            @endforeach

                        @endif
                    </select>
                </div>
            @endif
            <div class="mb-3">
                <label for="cityOfBirth" class="form-label">City Of Birth *</label>
                <select id="cityOfBirth" name="cityOfBirth" class="form-select">
                    <option value="" selected disabled>Select City</option>
                    @if ($cities != null)
                        @if ($playerInfo != null)

                            @foreach ($cities as $city)
                                @if ($playerInfo->birth_city == $city->id)
                                    <option value="{{ $city->id ?? ''}}" selected>{{ $city->name ?? '' }}</option>
                                @else
                                    <option value="{{ $city->id ?? '' }}">{{ $city->name ?? '' }}</option>
                                @endif
                            @endforeach
                        @endif

                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="countryOfCitizenship" class="form-label">Country Of Citizenship
                    *</label>
                <select id="countryOfCitizenship" name="countryOfCitizenship" class="form-select">
                    <option value="" selected disabled>Select Country</option>
                    @if (count($countries) > 0)

                        @foreach ($countries as $country)
                            @if ($playerInfo)
                                @if ($playerInfo->citizenship_country == $country->id)
                                    <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                @else
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endif
                            @endif
                        @endforeach


                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="height" class="form-label">Height *</label>
                <select id="height" class="form-select" name="height">
                    @if ($playerInfo != null)
                        <option value="121" @if ($playerInfo->height == '121') selected @endif>4' 0'' - (121 cm)
                        </option>
                        <option value="124" @if ($playerInfo->height == '124') selected @endif>4' 1'' - (124 cm)
                        </option>
                        <option value="127" @if ($playerInfo->height == '127') selected @endif>4' 2'' - (127 cm)
                        </option>
                        <option value="129" @if ($playerInfo->height == '129') selected @endif>4' 3'' - (129 cm)
                        </option>
                        <option value="132" @if ($playerInfo->height == '132') selected @endif>4' 4'' - (132 cm)
                        </option>
                        <option value="134" @if ($playerInfo->height == '134') selected @endif>4' 5'' - (134 cm)
                        </option>
                        <option value="137" @if ($playerInfo->height == '137') selected @endif>4' 6'' - (137 cm)
                        </option>
                        <option value="139" @if ($playerInfo->height == '139') selected @endif>4' 7'' - (139 cm)
                        </option>
                        <option value="142" @if ($playerInfo->height == '142') selected @endif>4' 8'' - (142 cm)
                        </option>
                        <option value="144" @if ($playerInfo->height == '144') selected @endif>4' 9'' - (144 cm)
                        </option>
                        <option value="147" @if ($playerInfo->height == '147') selected @endif>4' 10'' - (147 cm)
                        </option>
                        <option value="149" @if ($playerInfo->height == '149') selected @endif>4' 11'' - (149 cm)
                        </option>
                        <option value="152" @if ($playerInfo->height == '152') selected @endif>5' 0'' - (152 cm)
                        </option>
                        <option value="154" @if ($playerInfo->height == '154') selected @endif>5' 1'' - (154 cm)
                        </option>
                        <option value="157" @if ($playerInfo->height == '157') selected @endif>5' 2'' - (157 cm)
                        </option>
                        <option value="160" @if ($playerInfo->height == '160') selected @endif>5' 3'' - (160 cm)
                        </option>
                        <option value="162" @if ($playerInfo->height == '162') selected @endif>5' 4'' - (162 cm)
                        </option>
                        <option value="165" @if ($playerInfo->height == '165') selected @endif>5' 5'' - (165 cm)
                        </option>
                        <option value="167" @if ($playerInfo->height == '167') selected @endif>5' 6'' - (167 cm)
                        </option>
                        <option value="170" @if ($playerInfo->height == '170') selected @endif>5' 7'' - (170 cm)
                        </option>
                        <option value="172" @if ($playerInfo->height == '172') selected @endif>5' 8'' - (172 cm)
                        </option>
                        <option value="175" @if ($playerInfo->height == '175') selected @endif>5' 9'' - (175 cm)
                        </option>
                        <option value="177" @if ($playerInfo->height == '177') selected @endif>5' 10'' - (177 cm)
                        </option>
                        <option value="180" @if ($playerInfo->height == '180') selected @endif>5' 11'' - (180 cm)
                        </option>
                        <option value="182" @if ($playerInfo->height == '182') selected @endif>6' 0'' - (182 cm)
                        </option>
                        <option value="185" @if ($playerInfo->height == '185') selected @endif>6' 1'' - (185 cm)
                        </option>
                        <option value="187" @if ($playerInfo->height == '187') selected @endif>6' 2'' - (187 cm)
                        </option>
                        <option value="190" @if ($playerInfo->height == '190') selected @endif>6' 3'' - (190 cm)
                        </option>
                        <option value="193" @if ($playerInfo->height == '193') selected @endif>6' 4'' - (193 cm)
                        </option>
                        <option value="195" @if ($playerInfo->height == '195') selected @endif>6' 5'' - (195 cm)
                        </option>
                        <option value="198" @if ($playerInfo->height == '198') selected @endif>6' 6'' - (198 cm)
                        </option>
                        <option value="200" @if ($playerInfo->height == '200') selected @endif>6' 7'' - (200 cm)
                        </option>
                        <option value="203" @if ($playerInfo->height == '203') selected @endif>6' 8'' - (203 cm)
                        </option>
                        <option value="205" @if ($playerInfo->height == '205') selected @endif>6' 9'' - (205 cm)
                        </option>
                        <option value="208" @if ($playerInfo->height == '208') selected @endif>6' 10'' - (208 cm)
                        </option>
                        <option value="210" @if ($playerInfo->height == '210') selected @endif>6' 11'' - (210 cm)
                        </option>
                        <option value="213" @if ($playerInfo->height == '121') selected @endif>7' 0'' - (213 cm)
                        </option>
                        <option value="215" @if ($playerInfo->height == '121') selected @endif>7' 1'' - (215 cm)
                        </option>
                        <option value="218" @if ($playerInfo->height == '218') selected @endif>7' 2'' - (218 cm)
                        </option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Weight *</label>
                <select id="weight" class="form-select" name="weight">
                    @if ($playerInfo != null)
                        <option value="36" @if ($playerInfo->weight == '36') selected @endif>80 lbs (36kg)
                        </option>
                        <option value="38" @if ($playerInfo->weight == '38') selected @endif>85 lbs (38kg)
                        </option>
                        <option value="40" @if ($playerInfo->weight == '40') selected @endif>90 lbs (40kg)
                        </option>
                        <option value="43" @if ($playerInfo->weight == '43') selected @endif>95 lbs (43kg)
                        </option>
                        <option value="45" @if ($playerInfo->weight == '45') selected @endif>100 lbs (45kg)
                        </option>
                        <option value="47" @if ($playerInfo->weight == '47') selected @endif>105 lbs (47kg)
                        </option>
                        <option value="49" @if ($playerInfo->weight == '49') selected @endif>110 lbs (49kg)
                        </option>
                        <option value="52" @if ($playerInfo->weight == '52') selected @endif>115 lbs (52kg)
                        </option>
                        <option value="54" @if ($playerInfo->weight == '54') selected @endif>120 lbs (54kg)
                        </option>
                        <option value="56" @if ($playerInfo->weight == '56') selected @endif>125 lbs (56kg)
                        </option>
                        <option value="58" @if ($playerInfo->weight == '58') selected @endif>130 lbs (58kg)
                        </option>
                        <option value="63" @if ($playerInfo->weight == '63') selected @endif>140 lbs (63kg)
                        </option>
                        <option value="65" @if ($playerInfo->weight == '65') selected @endif>145 lbs (65kg)
                        </option>
                        <option value="68" @if ($playerInfo->weight == '68') selected @endif>150 lbs (68kg)
                        </option>
                        <option value="70" @if ($playerInfo->weight == '70') selected @endif>155 lbs (70kg)
                        </option>
                        <option value="72" @if ($playerInfo->weight == '72') selected @endif>160 lbs (72kg)
                        </option>
                        <option value="74" @if ($playerInfo->weight == '74') selected @endif>165 lbs (74kg)
                        </option>
                        <option value="77" @if ($playerInfo->weight == '77') selected @endif>170 lbs (77kg)
                        </option>
                        <option value="79" @if ($playerInfo->weight == '79') selected @endif>175 lbs (79kg)
                        </option>
                        <option value="81" @if ($playerInfo->weight == '81') selected @endif>180 lbs (81kg)
                        </option>
                        <option value="83" @if ($playerInfo->weight == '83') selected @endif>185 lbs (83kg)
                        </option>
                        <option value="86" @if ($playerInfo->weight == '86') selected @endif>190 lbs (86kg)
                        </option>
                        <option value="88" @if ($playerInfo->weight == '88') selected @endif>195 lbs (88kg)
                        </option>
                        <option value="90" @if ($playerInfo->weight == '90') selected @endif>200 lbs (90kg)
                        </option>
                        <option value="92" @if ($playerInfo->weight == '92') selected @endif>205 lbs (92kg)
                        </option>
                        <option value="95" @if ($playerInfo->weight == '95') selected @endif>210 lbs (95kg)
                        </option>
                        <option value="97" @if ($playerInfo->weight == '97') selected @endif>215 lbs (97kg)
                        </option>
                        <option value="99" @if ($playerInfo->weight == '99') selected @endif>220 lbs (99kg)
                        </option>
                        <option value="102" @if ($playerInfo->weight == '102') selected @endif>225 lbs (102kg)
                        </option>
                        <option value="104" @if ($playerInfo->weight == '104') selected @endif>230 lbs (104kg)
                        </option>
                        <option value="106" @if ($playerInfo->weight == '106') selected @endif>235 lbs (106kg)
                        </option>
                        <option value="108" @if ($playerInfo->weight == '108') selected @endif>240 lbs (108kg)
                        </option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                @if ($playerInfo != null)
                    <label for="profile" class="form-label">Profile Link *</label>
                    <input type="text" class="form-control" id="profile" name="profile"
                        value="{{ $playerInfo->profile_link ?? '' }}">
                @endif
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <a href="/dashboard/profile" class="btn cancel-btn">Cancel</a>
                <button type="submit" class="btn save-btn">Save</button>
            </div>

        </form>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="countryOfBirth"]').on('change', function() {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    url: '/admin/cities/ajax/' + countryID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="cityOfBirth"]').empty();
                        $('select[name="cityOfBirth"]').append(
                            '<option value="" selected disabled>Select City</option>');
                        $.each(data, function(key, value) {
                            $('select[name="cityOfBirth"]').append(
                                '<option value="' +
                                value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="cityOfBirth"]').empty();
            }
        });
    });
</script>
