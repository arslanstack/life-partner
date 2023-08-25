@extends('layouts.main')
@section('content')
<style>
    .dots {
        padding: 0 5px;
    }

    /* Style for active page */
    .active {
        background-color: #007bff;
        color: #fff;
    }
</style>

<!-- ==========Breadcrumb-Section========== -->
<section class="breadcrumb-area profile-bc-area">
    <div class="container">
        <div class="content">
            <h2 class="title extra-padding">
                Community Members
            </h2>
        </div>
    </div>
</section>
<!-- ==========Breadcrumb-Section========== -->

<!-- ==========Community-Section========== -->
<section class="community-section inner-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="top-filter">
                    <div class="left">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-sliders-h"></i> Filter your search
                        </a>
                    </div>
                    <div class="right">
                        <span class="span">
                            Order By :
                        </span>
                        <div class="filter-right">
                            <select class="nice-select select-bar" onchange="reRoute(this)">
                                <option value="{{ route('members') }}" {{ request()->route()->getName() === 'members' ? "selected" : ''}}><a href="{{ route('members') }}">OLD</a></option>
                                <option value="{{ route('membersNew') }}" {{ request()->route()->getName() === 'membersNew' ? "selected" : ''}}><a href="{{ route('membersNew') }}">NEW</a></option>
                                <option value="{{ route('membersLatestActive') }}" {{ request()->route()->getName() === 'membersLatestActive' ? "selected" : ''}}><a href="{{ route('membersLatestActive') }}">Latest Active</a></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="user-cards-container">
            @include('user.member_card')
        </div>
        <!-- Data Loader -->
        <div class="auto-load text-center" style="display: none;">
            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <path fill="#000" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                </path>
            </svg>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter your search</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="search-form" action="search" method="GET">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Interested in: </label>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="interestedin" id="Sugar Daddy" value="Sugar Daddy">
                                    <label class="form-check-label" for="Sugar Daddy">
                                        Sugar Daddy
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="interestedin" id="Sugar Mommy" value="Sugar Mommy">
                                    <label class="form-check-label" for="Sugar Mommy">
                                        Sugar Mommy
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="interestedin" id="Sugar Daddy Mommy" value="Sugar Daddy Mommy">
                                    <label class="form-check-label" for="Sugar Daddy Mommy">
                                        Sugar Daddy Mommy
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="interestedin" id="Sugar Baby (Hombre/Man)" value="Sugar Baby (Hombre/Man)">
                                    <label class="form-check-label" for="Sugar Baby (Hombre/Man)">
                                        Sugar Baby (Man)
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="interestedin" id="Sugar Baby (Mujer/Women)" value="Sugar Baby (Mujer/Women)">
                                    <label class="form-check-label" for="Sugar Baby (Mujer/Women)">
                                        Sugar Baby (Women)
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="interestedin" id="Sugar Baby (Trans)" value="Sugar Baby (Trans)">
                                    <label class="form-check-label" for="Sugar Baby (Trans)">
                                        Sugar Baby (Trans)
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Body Type: </label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="Small" id="Small">
                                    <label class="form-check-label" for="Small">
                                        Small
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="Average" id="Average">
                                    <label class="form-check-label" for="Average">
                                        Average
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="Aethletic" id="Aethletic">
                                    <label class="form-check-label" for="Aethletic">
                                        Aethletic
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="Large" id="Large">
                                    <label class="form-check-label" for="Large">
                                        Large
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <input class="form-check-input mt-3" onchange="showAgeSlider(this)" type="checkbox" value="1" name="age" id="age">

                        <label for="age" class="col-form-label">Search by Age: </label>

                        <div class="row d-none" id="ageSlider">
                            <div class="wrapper">
                                <div class="values">
                                    <span id="range1">
                                        <span id="minAgeSpan">22</span>

                                    </span>
                                    <span> &dash; </span>
                                    <span id="range2">
                                        <span id="maxAgeSpan">40</span>

                                    </span>
                                </div>
                                <div class="container1">
                                    <div class="slider-track"></div>
                                    <input type="range" min="18" max="60" value="22" id="slider-1" name="minAge" oninput="slideOne()">
                                    <input type="range" min="18" max="60" value="40" id="slider-2" name="maxAge" oninput="slideTwo()">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input mt-3" onchange="showHeightSlider(this)" type="checkbox" value="1" name="height" id="height">

                        <label for="height" class="col-form-label">Search by Height: </label>

                        <div class="row d-none" id="heightSlider">
                            <div class="wrapper">
                                <div class="values">
                                    <span id="heightRange1">
                                        <span id="minHeightSpan">150</span>
                                    </span>
                                    <span> &dash; </span>
                                    <span id="heightRange2">
                                        <span id="maxHeightSpan">180</span>

                                    </span>
                                </div>
                                <div class="container1">
                                    <div class="slider-track height-slider-track"></div>
                                    <input type="range" min="100" max="200" value="150" id="heightSlider1" name="minHeight" oninput="slideHeightOne()">
                                    <input type="range" min="100" max="200" value="180" id="heightSlider2" name="maxHeight" oninput="slideHeightTwo()">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input mt-3" onchange="showWeightSlider(this)" type="checkbox" value="1" name="weight" id="weight">

                        <label for="weight" class="col-form-label">Search by Weight: </label>

                        <div class="row d-none" id="weightSlider">
                            <div class="wrapper">
                                <div class="values">
                                    <span id="weightRange1">
                                        <span id="minWeightSpan">55</span>
                                    </span>
                                    <span> &dash; </span>
                                    <span id="weightRange2">
                                        <span id="maxWeightSpan">85</span>
                                    </span>
                                </div>
                                <div class="container1">
                                    <div class="slider-track weight-slider-track"></div>
                                    <input type="range" min="40" max="120" value="55" id="weightSlider1" name="minWeight" oninput="slideWeightOne()">
                                    <input type="range" min="40" max="120" value="85" id="weightSlider2" name="maxWeight" oninput="slideWeightTwo()">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input mt-3" onchange="showChildSlider(this)" type="checkbox" value="1" name="children" id="children">

                        <label for="children" class="col-form-label">Search by Number of Children: </label>

                        <div class="row d-none" id="childSlider">
                            <div class="wrapper">
                                <div class="values">
                                    <span id="childrenRange1">
                                        <span id="minChildrenSpan">1</span>
                                    </span>
                                    <span> &dash; </span>
                                    <span id="childrenRange2">
                                        <span id="maxChildrenSpan">3</span>
                                    </span>
                                </div>
                                <div class="container1">
                                    <div class="slider-track children-slider-track"></div>
                                    <input type="range" min="0" max="8" value="1" id="childrenSlider1" name="minChildren" oninput="slideChildrenOne()">
                                    <input type="range" min="0" max="8" value="3" id="childrenSlider2" name="maxChildren" oninput="slideChildrenTwo()">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input" onchange="showLocationSection(this)" type="checkbox" value="1" name="searchByLocation" id="searchByLocation">
                        <label class="form-check-label" for="searchByLocation">
                            Search by My Location
                        </label>
                        <div class="row d-none" id="locationSection">
                            <div class="col-12 mt-2">
                                <label for="form-label">Distance (KM)</label>
                                <input type="number" class="form-control" onchange="checkLocation()" min="10" value="10" name="distance" id="distance">
                            </div>
                            <div class="col-12 mt-2">
                                <label for="form-label">Address</label>
                                <textarea class="form-control" id="address" rows="1" name="address" onchange="checkLocation()">{{(Auth()->user()->address ?? '')}}</textarea>

                            </div>
                            <div class="col-12 mt-2">
                                <label for="form-label">City</label>
                                <input type="text" class="form-control" value="{{(Auth()->user()->city ?? '')}}" readonly name="city" id="city">
                            </div>
                            <div class="col-12 mt-2">
                                <label for="form-label">State</label>
                                <input type="text" class="form-control" value="{{(Auth()->user()->state ?? '')}}" readonly name="state" id="state">
                            </div>
                            <div class="col-12 mt-2">
                                <label for="form-label">Country</label>
                                <input type="text" class="form-control" value="{{(Auth()->user()->country ?? '')}}" readonly name="country" id="country">
                            </div>
                            <div class="col-12 mt-2 d-none">
                                <label for="form-label">Latitude</label>
                                <input type="text" class="form-control" value="{{(Auth()->user()->latitude ?? '')}}" readonly name="latitude" id="latitude">
                            </div>
                            <div class="col-12 mt-2 d-none">
                                <label for="form-label">Longitude</label>
                                <input type="text" class="form-control" value="{{(Auth()->user()->longitude ?? '')}}" readonly name="longitude" id="longitude">
                            </div>

                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="custom-button3" id="resetBtn">Clear Form</button>
                <button type="button" id="formSubmitBtn" class="custom-button">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Slider Handling JS scripts -->
<script>
    function showHeightSlider(elm) {
        if (elm.checked) {
            $('#heightSlider').removeClass('d-none');
        } else {
            $('#heightSlider').addClass('d-none');
        }
    }

    function showAgeSlider(elm) {
        if (elm.checked) {
            $('#ageSlider').removeClass('d-none');
        } else {
            $('#ageSlider').addClass('d-none');
        }
    }

    function showWeightSlider(elm) {
        if (elm.checked) {
            $('#weightSlider').removeClass('d-none');
        } else {
            $('#weightSlider').addClass('d-none');
        }
    }

    function showChildSlider(elm) {
        if (elm.checked) {
            $('#childSlider').removeClass('d-none');
        } else {
            $('#childSlider').addClass('d-none');
        }
    }

    function showLocationSection(elm) {
        if (elm.checked) {
            $('#locationSection').removeClass('d-none');
        } else {
            $('#locationSection').addClass('d-none');
        }
    }
    window.onload = function() {
        fillColor();
        fillHeightColor();
        fillWeightColor();
        fillChildrenColor();
    }

    let sliderOne = document.getElementById("slider-1");
    let sliderTwo = document.getElementById("slider-2");
    let displayValOne = document.getElementById("range1");
    let displayValTwo = document.getElementById("range2");
    let sliderTrack = document.querySelector(".slider-track");
    let minGap = 0;

    // Function to update height slider values
    function slideOne() {
        if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
            sliderOne.value = parseInt(sliderTwo.value) - minGap;
        }
        displayValOne.textContent = sliderOne.value;
        fillColor();
    }

    function slideTwo() {

        if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
            sliderTwo.value = parseInt(sliderOne.value) + minGap;
        }
        displayValTwo.textContent = sliderTwo.value;
        fillColor();
    }

    function fillColor() {
        let minSliderValue = parseInt(sliderOne.min);
        let maxSliderValue = parseInt(sliderOne.max);

        let percent1 = ((sliderOne.value - minSliderValue) / (maxSliderValue - minSliderValue)) * 100;
        let percent2 = ((sliderTwo.value - minSliderValue) / (maxSliderValue - minSliderValue)) * 100;

        sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}%, #3264fe ${percent1}%, #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
    }



    let heightSlider1 = document.getElementById("heightSlider1");
    let heightSlider2 = document.getElementById("heightSlider2");
    let heightDisplayValOne = document.getElementById("heightRange1");
    let heightDisplayValTwo = document.getElementById("heightRange2");
    let heightSliderTrack = document.querySelector(".height-slider-track");

    // Function to update height slider values
    function slideHeightOne() {
        document.getElementById("height").checked = true;
        if (parseInt(heightSlider2.value) - parseInt(heightSlider1.value) <= minGap) {
            heightSlider1.value = parseInt(heightSlider2.value) - minGap;
        }
        heightDisplayValOne.textContent = heightSlider1.value;
        fillHeightColor();
    }

    function slideHeightTwo() {
        document.getElementById("height").checked = true;
        if (parseInt(heightSlider2.value) - parseInt(heightSlider1.value) <= minGap) {
            heightSlider2.value = parseInt(heightSlider1.value) + minGap;
        }
        heightDisplayValTwo.textContent = heightSlider2.value;
        fillHeightColor();
    }

    function fillHeightColor() {
        let minSliderValue = parseInt(heightSlider1.min);
        let maxSliderValue = parseInt(heightSlider1.max);

        let percent1 = ((heightSlider1.value - minSliderValue) / (maxSliderValue - minSliderValue)) * 100;
        let percent2 = ((heightSlider2.value - minSliderValue) / (maxSliderValue - minSliderValue)) * 100;

        heightSliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}%, #3264fe ${percent1}%, #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
    }
    let weightSlider1 = document.getElementById("weightSlider1");
    let weightSlider2 = document.getElementById("weightSlider2");
    let weightDisplayValOne = document.getElementById("weightRange1");
    let weightDisplayValTwo = document.getElementById("weightRange2");
    let weightSliderTrack = document.querySelector(".weight-slider-track");

    // Function to update weight slider values
    function slideWeightOne() {
        document.getElementById("weight").checked = true;
        if (parseInt(weightSlider2.value) - parseInt(weightSlider1.value) <= minGap) {
            weightSlider1.value = parseInt(weightSlider2.value) - minGap;
        }
        weightDisplayValOne.textContent = weightSlider1.value;
        fillWeightColor();
    }

    function slideWeightTwo() {
        document.getElementById("weight").checked = true;
        if (parseInt(weightSlider2.value) - parseInt(weightSlider1.value) <= minGap) {
            weightSlider2.value = parseInt(weightSlider1.value) + minGap;
        }
        weightDisplayValTwo.textContent = weightSlider2.value;
        fillWeightColor();
    }

    function fillWeightColor() {
        let minSliderValue = parseInt(weightSlider1.min);
        let maxSliderValue = parseInt(weightSlider1.max);

        let percent1 = ((weightSlider1.value - minSliderValue) / (maxSliderValue - minSliderValue)) * 100;
        let percent2 = ((weightSlider2.value - minSliderValue) / (maxSliderValue - minSliderValue)) * 100;

        weightSliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}%, #3264fe ${percent1}%, #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
    }

    let childrenSlider1 = document.getElementById("childrenSlider1");
    let childrenSlider2 = document.getElementById("childrenSlider2");
    let childrenDisplayValOne = document.getElementById("childrenRange1");
    let childrenDisplayValTwo = document.getElementById("childrenRange2");
    let childrenSliderTrack = document.querySelector(".children-slider-track");

    // Function to update children slider values
    function slideChildrenOne() {
        document.getElementById("children").checked = true;
        if (parseInt(childrenSlider2.value) - parseInt(childrenSlider1.value) <= minGap) {
            childrenSlider1.value = parseInt(childrenSlider2.value) - minGap;
        }
        childrenDisplayValOne.textContent = childrenSlider1.value;
        fillChildrenColor();
    }

    function slideChildrenTwo() {
        document.getElementById("children").checked = true;
        if (parseInt(childrenSlider2.value) - parseInt(childrenSlider1.value) <= minGap) {
            childrenSlider2.value = parseInt(childrenSlider1.value) + minGap;
        }
        childrenDisplayValTwo.textContent = childrenSlider2.value;
        fillChildrenColor();
    }

    function fillChildrenColor() {
        let minSliderValue = parseInt(childrenSlider1.min);
        let maxSliderValue = parseInt(childrenSlider1.max);

        let percent1 = ((childrenSlider1.value - minSliderValue) / (maxSliderValue - minSliderValue)) * 100;
        let percent2 = ((childrenSlider2.value - minSliderValue) / (maxSliderValue - minSliderValue)) * 100;

        childrenSliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}%, #3264fe ${percent1}%, #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
    }
</script>
<!-- Google places scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script>
    function initMap() {
        const input = document.getElementById('address');
        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.setFields(['geometry', 'formatted_address', 'address_components']);

        autocomplete.addListener('place_changed', () => {
            const place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

            const address = place.formatted_address;
            const city = getAddressComponent(place, 'locality');
            const state = getAddressComponent(place, 'administrative_area_level_1');
            const country = getAddressComponent(place, 'country');
            const latitude = place.geometry.location.lat();
            const longitude = place.geometry.location.lng();

            console.log('Address:', address);
            console.log('City:', city);
            console.log('State:', state);
            console.log('Country:', country);
            console.log('Latitude:', latitude);
            console.log('Longitude:', longitude);



            document.getElementById('address').value = address;
            document.getElementById('city').value = city;
            document.getElementById('state').value = state;
            document.getElementById('country').value = country;
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;

        });
    }

    function getAddressComponent(place, type) {
        for (const component of place.address_components) {
            if (component.types.includes(type)) {
                return component.long_name;
            }
        }
        return '';
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy2l4KGGTm4cTqoSl6h8UAOAob87sHBsA&libraries=places&callback=initMap" async defer></script>
<!--  Sorting Re routing from select -->
<script>
    function reRoute(elm) {
        window.location = elm.value;
    }
</script>

<script>
    // if (performance.navigation.type === 1) {} else {
    //     localStorage.clear();
    // }
    $(document).ready(function() {
        $("#resetBtn").click(function() {
            localStorage.clear();
            $('#search-form').trigger("reset");
            $('#ageSlider').addClass('d-none');
            $('#heightSlider').addClass('d-none');
            $('#weightSlider').addClass('d-none');
            $('#childSlider').addClass('d-none');
            $('#locationSection').addClass('d-none');
        });
        var storedSearchParams = localStorage.getItem('searchParameters');
        if (storedSearchParams) {
            var formData = JSON.parse(storedSearchParams);
            formData.forEach(function(item) {
                var inputField = $('[name="' + item.name + '"]');
                if (item.name === 'age') {
                    inputField.prop('checked', true);
                    showAgeSlider(inputField[0]);
                }
                if (item.name === 'children') {
                    inputField.prop('checked', true);
                    showChildSlider(inputField[0]);
                }
                if (item.name === 'height') {
                    inputField.prop('checked', true);
                    showHeightSlider(inputField[0]);
                }
                if (item.name === 'weight') {
                    inputField.prop('checked', true);
                    showWeightSlider(inputField[0]);
                }
                if (item.name === 'minChildren') {
                    $('#minChildrenSpan').text(item.value);
                }
                if (item.name === 'maxChildren') {
                    $('#maxChildrenSpan').text(item.value);
                }
                if (item.name === 'minHeight') {
                    $('#minHeightSpan').text(item.value);
                }
                if (item.name === 'maxHeight') {
                    $('#maxHeightSpan').text(item.value);
                }
                if (item.name === 'minWeight') {
                    $('#minWeightSpan').text(item.value);
                }
                if (item.name === 'maxWeight') {
                    $('#maxWeightSpan').text(item.value);
                }
                if (item.name === 'minAge') {
                    $('#minAgeSpan').text(item.value);
                }
                if (item.name === 'maxAge') {
                    $('#maxAgeSpan').text(item.value);
                }
                if (inputField.attr('type') === 'checkbox' || inputField.attr('type') === 'radio') {
                    inputField.prop('checked', true);
                    // If searchByLocation checkbox then show location section
                    if (item.name === 'searchByLocation') {
                        showLocationSection(inputField[0]);
                    }
                } else {
                    inputField.val(item.value);
                }
            });

            // Manually set the 'interestedin' radio button value
            var interestedinValue = formData.find(function(item) {
                return item.name === 'interestedin';
            });
            if (interestedinValue) {
                $('[name="interestedin"][value="' + interestedinValue.value + '"]').prop('checked', true);
            }

        }
        $('#formSubmitBtn').click(function(event) {
            var formData = $('#search-form').serializeArray();
            localStorage.setItem('searchParameters', JSON.stringify(formData));
            $('#search-form').submit();
        });
    });
</script>
<script>
    var ENDPOINT = "{{ request()->is('search*') ? '' : route('members') }}";
    if (ENDPOINT === '') {
        ENDPOINT = window.location.href;
    }
    
    var page = 1;
    var isLoading = false;
    console.log(ENDPOINT);
    $(window).scroll(function() {
        var container = $("#user-cards-container");
        var containerHeight = container.height();
        var scrollTop = $(window).scrollTop();
        var windowHeight = $(window).height();

        if (!isLoading && scrollTop + windowHeight >= container.offset().top + containerHeight - 20) {
            page++;
            infinteLoadMore(page);
        }
    });


    /*------------------------------------------
    --------------------------------------------
    call infinteLoadMore()
    --------------------------------------------
    --------------------------------------------*/
    function infinteLoadMore(page) {
        isLoading = true;
        $.ajax({
                url: ENDPOINT + "?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function() {
                    $('.auto-load').show();
                }
            })
            .done(function(response) {
                console.log("response recieved: " + response.html);
                if (response.html == '') {
                    $('.auto-load').html("We don't have more data to display :(");
                    return;
                    isLoading = false;
                }

                $('.auto-load').hide();
                $("#user-cards-container").append(response.html);
                isLoading = false;
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
                isLoading = false;
            });
    }
</script>
@endsection