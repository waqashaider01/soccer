<div class="mb-3">
    <label for="physical-1" class="form-label">Acceleration</label> <br>
    <input id="physical-1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->acceleration }}" name="acceleration" />&nbsp;&nbsp;
    <b><span id="physicalValue-1"></span>%</b>
</div>
<div class="mb-3">
    <label for="physical-2" class="form-label">Agility</label> <br>
    <input id="physical-2" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->agility }}" name="agility" />&nbsp;&nbsp;
    <b><span id="physicalValue-2"></span>%</b>
</div>
<div class="mb-3">
    <label for="physical-3" class="form-label">Balance</label> <br>
    <input id="physical-3" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->balance }}" name="balance" />&nbsp;&nbsp;
    <b><span id="physicalValue-3"></span>%</b>
</div>
<div class="mb-3">
    <label for="physical-4" class="form-label">Jumping</label> <br>
    <input id="physical-4" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->jumping }}" name="jumping" />&nbsp;&nbsp;
    <b><span id="physicalValue-4"></span>%</b>
</div>
<div class="mb-3">
    <label for="physical-5" class="form-label">Natural Fitness</label> <br>
    <input id="physical-5" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->natural_fitness }}"
        name="naturalFitness" />&nbsp;&nbsp;
    <b><span id="physicalValue-5"></span>%</b>
</div>
<div class="mb-3">
    <label for="physical-6" class="form-label">Reflexes</label> <br>
    <input id="physical-6" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->reflexes }}" name="reflexes" />&nbsp;&nbsp;
    <b><span id="physicalValue-6"></span>%</b>
</div>
<div class="mb-3">
    <label for="physical-7" class="form-label">Speed/Pace</label> <br>
    <input id="physical-7" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->speed }}" name="speed" />&nbsp;&nbsp;
    <b><span id="physicalValue-7"></span>%</b>
</div>
<div class="mb-3">
    <label for="physical-8" class="form-label">Stamina</label> <br>
    <input id="physical-8" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->stamina }}" name="stamina" />&nbsp;&nbsp;
    <b><span id="physicalValue-8"></span>%</b>
</div>
<div class="mb-3">
    <label for="physical-9" class="form-label">Strength</label> <br>
    <input id="physical-9" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->strength }}" name="strength" />&nbsp;&nbsp;
    <b><span id="physicalValue-9"></span>%</b>
</div>
<div class="mb-3">
    <label for="physical-10" class="form-label">Goalkeeping (Goalkeepers Only)</label> <br>
    <input id="physical-10" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->goalkeeping }}"
        name="goalkeeping" />&nbsp;&nbsp;
    <b><span id="physicalValue-10"></span>%</b>
</div>
<script>
    var physicalValue1 = document.getElementById("physicalValue-1");
    physicalSlider1 = new Slider('#physical-1', {
        formatter: function(value) {
            physicalValue1.innerText = value;
            return value + "%";
        }
    });
    physicalSlider1.on("slide", function(sliderValue) {
        physicalValue1.innerText = sliderValue;
    });

    var physicalValue2 = document.getElementById("physicalValue-2");
    physicalSlider2 = new Slider('#physical-2', {
        formatter: function(value) {
            physicalValue2.innerText = value;
            return value + "%";
        }
    });
    physicalSlider2.on("slide", function(sliderValue) {
        physicalValue2.innerText = sliderValue;
    });

    var physicalValue3 = document.getElementById("physicalValue-3");
    physicalSlider3 = new Slider('#physical-3', {
        formatter: function(value) {
            physicalValue3.innerText = value;
            return value + "%";
        }
    });
    physicalSlider3.on("slide", function(sliderValue) {
        physicalValue3.innerText = sliderValue;
    });

    var physicalValue4 = document.getElementById("physicalValue-4");
    physicalSlider4 = new Slider('#physical-4', {
        formatter: function(value) {
            physicalValue4.innerText = value;
            return value + "%";
        }
    });
    physicalSlider4.on("slide", function(sliderValue) {
        physicalValue4.innerText = sliderValue;
    });

    var physicalValue5 = document.getElementById("physicalValue-5");
    physicalSlider5 = new Slider('#physical-5', {
        formatter: function(value) {
            physicalValue5.innerText = value;
            return value + "%";
        }
    });
    physicalSlider5.on("slide", function(sliderValue) {
        physicalValue5.innerText = sliderValue;
    });

    var physicalValue6 = document.getElementById("physicalValue-6");
    physicalSlider6 = new Slider('#physical-6', {
        formatter: function(value) {
            physicalValue6.innerText = value;
            return value + "%";
        }
    });
    physicalSlider6.on("slide", function(sliderValue) {
        physicalValue6.innerText = sliderValue;
    });

    var physicalValue7 = document.getElementById("physicalValue-7");
    physicalSlider7 = new Slider('#physical-7', {
        formatter: function(value) {
            physicalValue7.innerText = value;
            return value + "%";
        }
    });
    physicalSlider7.on("slide", function(sliderValue) {
        physicalValue7.innerText = sliderValue;
    });

    var physicalValue8 = document.getElementById("physicalValue-8");
    physicalSlider8 = new Slider('#physical-8', {
        formatter: function(value) {
            physicalValue8.innerText = value;
            return value + "%";
        }
    });
    physicalSlider8.on("slide", function(sliderValue) {
        physicalValue8.innerText = sliderValue;
    });

    var physicalValue9 = document.getElementById("physicalValue-9");
    physicalSlider9 = new Slider('#physical-9', {
        formatter: function(value) {
            physicalValue9.innerText = value;
            return value + "%";
        }
    });
    physicalSlider9.on("slide", function(sliderValue) {
        physicalValue9.innerText = sliderValue;
    });

    var physicalValue10 = document.getElementById("physicalValue-10");
    physicalSlider10 = new Slider('#physical-10', {
        formatter: function(value) {
            physicalValue10.innerText = value;
            return value + "%";
        }
    });
    physicalSlider10.on("slide", function(sliderValue) {
        physicalValue10.innerText = sliderValue;
    });
</script>
