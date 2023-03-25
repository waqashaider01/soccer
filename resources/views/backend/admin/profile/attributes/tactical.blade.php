<div class="mb-3">
    <label for="tactical-1" class="form-label">Aggression</label> <br>
    <input id="tactical-1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->aggression }}" name="aggression" />&nbsp;&nbsp;
    <b><span id="tacticalValue-1"></span>%</b>
</div>
<div class="mb-3">
    <label for="tactical-2" class="form-label">Anticipation</label> <br>
    <input id="tactical-2" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->anticipation }}" name="anticipation" />&nbsp;&nbsp;
    <b><span id="tacticalValue-2"></span>%</b>
</div>
<div class="mb-3">
    <label for="tactical-3" class="form-label">Bravery</label> <br>
    <input id="tactical-3" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->bravery }}" name="bravery" />&nbsp;&nbsp;
    <b><span id="tacticalValue-3"></span>%</b>
</div>
<div class="mb-3">
    <label for="tactical-4" class="form-label">Composure</label> <br>
    <input id="tactical-4" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->composure }}" name="composure" />&nbsp;&nbsp;
    <b><span id="tacticalValue-4"></span>%</b>
</div>
<div class="mb-3">
    <label for="tactical-5" class="form-label">Concentration</label> <br>
    <input id="tactical-5" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->concentration }}"
        name="concentration" />&nbsp;&nbsp;
    <b><span id="tacticalValue-5"></span>%</b>
</div>
<div class="mb-3">
    <label for="tactical-6" class="form-label">Creativity</label> <br>
    <input id="tactical-6" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->creativity }}" name="creativity" />&nbsp;&nbsp;
    <b><span id="tacticalValue-6"></span>%</b>
</div>
<div class="mb-3">
    <label for="tactical-7" class="form-label">Decisions</label> <br>
    <input id="tactical-7" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->decisions }}" name="decisions" />&nbsp;&nbsp;
    <b><span id="tacticalValue-7"></span>%</b>
</div>
<div class="mb-3">
    <label for="tactical-8" class="form-label">Determination</label> <br>
    <input id="tactical-8" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->determination }}"
        name="determination" />&nbsp;&nbsp;
    <b><span id="tacticalValue-8"></span>%</b>
</div>
<div class="mb-3">
    <label for="tactical-9" class="form-label">Flair</label> <br>
    <input id="tactical-9" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->flair }}" name="flair" />&nbsp;&nbsp;
    <b><span id="tacticalValue-9"></span>%</b>
</div>
<div class="mb-3">
    <label for="tactical-10" class="form-label">Influence</label> <br>
    <input id="tactical-10" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->influence }}" name="influence" />&nbsp;&nbsp;
    <b><span id="tacticalValue-10"></span>%</b>
</div>
<div class="mb-3">
    <label for="tactical-11" class="form-label">Off the Ball</label> <br>
    <input id="tactical-11" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->off_the_ball }}" name="offTheBall" />&nbsp;&nbsp;
    <b><span id="tacticalValue-11"></span>%</b>
</div>
<div class="mb-3">
    <label for="tactical-12" class="form-label">Positioning</label> <br>
    <input id="tactical-12" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->positioning }}" name="positioning" />&nbsp;&nbsp;
    <b><span id="tacticalValue-12"></span>%</b>
</div>
<div class="mb-3">
    <label for="tactical-13" class="form-label">Team Work</label> <br>
    <input id="tactical-13" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->team_work }}" name="teamWork" />&nbsp;&nbsp;
    <b><span id="tacticalValue-13"></span>%</b>
</div>
<div class="mb-3">
    <label for="tactical-14" class="form-label">Work Rate</label> <br>
    <input id="tactical-14" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
        data-slider-step="1" data-slider-value="{{ $PlayerAttribute->work_rate }}" name="workRate" />&nbsp;&nbsp;
    <b><span id="tacticalValue-14"></span>%</b>
</div>
<script>
    var tacticalValue1 = document.getElementById("tacticalValue-1");
    tacticalSlider1 = new Slider('#tactical-1', {
        formatter: function(value) {
            tacticalValue1.innerText = value;
            return value + "%";
        }
    });
    tacticalSlider1.on("slide", function(sliderValue) {
        tacticalValue1.innerText = sliderValue;
    });

    var tacticalValue2 = document.getElementById("tacticalValue-2");
    tacticalSlider2 = new Slider('#tactical-2', {
        formatter: function(value) {
            tacticalValue2.innerText = value;
            return value + "%";
        }
    });
    tacticalSlider2.on("slide", function(sliderValue) {
        tacticalValue2.innerText = sliderValue;
    });

    var tacticalValue3 = document.getElementById("tacticalValue-3");
    tacticalSlider3 = new Slider('#tactical-3', {
        formatter: function(value) {
            tacticalValue3.innerText = value;
            return value + "%";
        }
    });
    tacticalSlider3.on("slide", function(sliderValue) {
        tacticalValue3.innerText = sliderValue;
    });

    var tacticalValue4 = document.getElementById("tacticalValue-4");
    tacticalSlider4 = new Slider('#tactical-4', {
        formatter: function(value) {
            tacticalValue4.innerText = value;
            return value + "%";
        }
    });
    tacticalSlider4.on("slide", function(sliderValue) {
        tacticalValue4.innerText = sliderValue;
    });

    var tacticalValue5 = document.getElementById("tacticalValue-5");
    tacticalSlider5 = new Slider('#tactical-5', {
        formatter: function(value) {
            tacticalValue5.innerText = value;
            return value + "%";
        }
    });
    tacticalSlider5.on("slide", function(sliderValue) {
        tacticalValue5.innerText = sliderValue;
    });

    var tacticalValue6 = document.getElementById("tacticalValue-6");
    tacticalSlider6 = new Slider('#tactical-6', {
        formatter: function(value) {
            tacticalValue6.innerText = value;
            return value + "%";
        }
    });
    tacticalSlider6.on("slide", function(sliderValue) {
        tacticalValue6.innerText = sliderValue;
    });

    var tacticalValue7 = document.getElementById("tacticalValue-7");
    tacticalSlider7 = new Slider('#tactical-7', {
        formatter: function(value) {
            tacticalValue7.innerText = value;
            return value + "%";
        }
    });
    tacticalSlider7.on("slide", function(sliderValue) {
        tacticalValue7.innerText = sliderValue;
    });

    var tacticalValue8 = document.getElementById("tacticalValue-8");
    tacticalSlider8 = new Slider('#tactical-8', {
        formatter: function(value) {
            tacticalValue8.innerText = value;
            return value + "%";
        }
    });
    tacticalSlider8.on("slide", function(sliderValue) {
        tacticalValue8.innerText = sliderValue;
    });

    var tacticalValue9 = document.getElementById("tacticalValue-9");
    tacticalSlider9 = new Slider('#tactical-9', {
        formatter: function(value) {
            tacticalValue9.innerText = value;
            return value + "%";
        }
    });
    tacticalSlider9.on("slide", function(sliderValue) {
        tacticalValue9.innerText = sliderValue;
    });

    var tacticalValue10 = document.getElementById("tacticalValue-10");
    tacticalSlider10 = new Slider('#tactical-10', {
        formatter: function(value) {
            tacticalValue10.innerText = value;
            return value + "%";
        }
    });
    tacticalSlider10.on("slide", function(sliderValue) {
        tacticalValue10.innerText = sliderValue;
    });

    var tacticalValue11 = document.getElementById("tacticalValue-11");
    tacticalSlider11 = new Slider('#tactical-11', {
        formatter: function(value) {
            tacticalValue11.innerText = value;
            return value + "%";
        }
    });
    tacticalSlider11.on("slide", function(sliderValue) {
        tacticalValue11.innerText = sliderValue;
    });

    var tacticalValue12 = document.getElementById("tacticalValue-12");
    tacticalSlider12 = new Slider('#tactical-12', {
        formatter: function(value) {
            tacticalValue12.innerText = value;
            return value + "%";
        }
    });
    tacticalSlider12.on("slide", function(sliderValue) {
        tacticalValue12.innerText = sliderValue;
    });

    var tacticalValue13 = document.getElementById("tacticalValue-13");
    tacticalSlider13 = new Slider('#tactical-13', {
        formatter: function(value) {
            tacticalValue13.innerText = value;
            return value + "%";
        }
    });
    tacticalSlider13.on("slide", function(sliderValue) {
        tacticalValue13.innerText = sliderValue;
    });

    var tacticalValue14 = document.getElementById("tacticalValue-14");
    tacticalSlider14 = new Slider('#tactical-14', {
        formatter: function(value) {
            tacticalValue14.innerText = value;
            return value + "%";
        }
    });
    tacticalSlider14.on("slide", function(sliderValue) {
        tacticalValue14.innerText = sliderValue;
    });
</script>
