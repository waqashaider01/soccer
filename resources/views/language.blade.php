<style>
    #google_translate_element {
        width: 300px;
        float: right;
        text-align: right;
        display: block
    }
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }
    body {
        top: 0px !important;
    }
    #goog-gt-tt {
        display: none !important;
        top: 0px !important;
    }
    .goog-tooltip skiptranslate {
        display: none !important;
        top: 0px !important;
    }
    .activity-root {
        display: hide !important;
    }
    .status-message {
        display: hide !important;
    }
    .language-change-div {
        background-color: white;
        border-radius: 4px;
        padding: 6.5px;
        display: block;
    }
    #language-change-text {
        color: #495057;
        margin-left: 10px;
    }
</style>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
        <span>Language</span>
    </a>
    <div class="dropdown-menu dropdown-menu-end">

        <a class="dropdown-item" href="{{ route('change-language', '1') }}">
        <img style="width: 40px; height:25px;" src="{{ asset('images/flags/United States.png') }}" alt="">
                
       <span class="mx-2">English</span>
       
            @if (session('googtrans') == '1')
                <i class="fas fa-check"></i>
            @endif
            
        </a>
        <div style="width:100%;height:1px;border:1px dashed #D5D6D8"></div>

        <a class="dropdown-item" href="{{ route('change-language', '2') }}">
            <img style="width: 40px; height:25px;" src="{{ asset('images/flags/Spain.png') }}" alt="">

        <span class="mx-2">Spanish</span>
            @if (session('googtrans') == '2')
                <i class="fas fa-check"></i>
            @endif
            
        </a>
        <div style="width:100%;height:1px;border:1px dashed #D5D6D8"></div>

        <a class="dropdown-item" href="{{ route('change-language', '3') }}">
            <img style="width: 40px; height:25px;" src="{{ asset('images/flags/Portugal.png') }}" alt="">

        <span class="mx-2">
            Portuguese
        </span>
            @if (session('googtrans') == '3')
                <i class="fas fa-check"></i>
            @endif
            
        </a>
        <div style="width:100%;height:1px;border:1px dashed #D5D6D8"></div>

        <a class="dropdown-item" href="{{ route('change-language', '4') }}">
            <img style="width: 40px; height:25px;" src="{{ asset('images/flags/Germany.png') }}" alt="">

        <span class="mx-2 border">German</span>
            @if (session('googtrans') == '4')
                <i class="fas fa-check"></i>
            @endif
            
        </a>
        <div style="width:100%;height:1px;border:1px dashed #D5D6D8"></div>

        <a class="dropdown-item" href="{{ route('change-language', '5') }}">
            <img style="width: 40px; height:25px;" src="{{ asset('images/flags/France.png') }}" alt="">

        <span class="mx-2">French</span>
            @if (session('googtrans') == '5')
                <i class="fas fa-check"></i>
            @endif
            
        </a>
        <div style="width:100%;height:1px;border:1px dashed #D5D6D8"></div>

        <a class="dropdown-item" href="{{ route('change-language', '6') }}">
            <img style="width: 40px; height:25px;" src="{{ asset('images/flags/Italy.png') }}" alt="">

        <span class="mx-2">Italian</span>
            @if (session('googtrans') == '6')
                <i class="fas fa-check"></i>
            @endif
            
        </a>
    </div>
</li>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
</script>
