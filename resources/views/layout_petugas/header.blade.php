<meta charset="utf-8" />
<meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

<title>@yield('title') | Minishop</title>


<meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
<meta name="keywords"
    content="dashboard, material, material design, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
<!-- Canonical SEO -->
{{-- <link rel="canonical" href="https://themeselection.com/item/materio-bootstrap-html-admin-template/"> --}}


<!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
{{-- <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5DDHKGP');
</script> --}}
<!-- End Google Tag Manager -->

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('assets/template') }}/assets/img/favicon/favicon.ico" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet">

<!-- Icons -->
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/fonts/materialdesignicons.css" />
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/fonts/flag-icons.css" />

<!-- Menu waves for no-customizer fix -->
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/libs/node-waves/node-waves.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/css/rtl/core.css"
    class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/css/rtl/theme-default.css"
    class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet"
    href="{{ asset('assets/template') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/libs/apex-charts/apex-charts.css" />
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/libs/tagify/tagify.css" />
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
<link rel="stylesheet" href="{{ asset('assets/template') }}/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">

<!-- Page CSS -->

<!-- Helpers -->
<script src="{{ asset('assets/template') }}/assets/vendor/js/helpers.js"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
{{-- <script src="{{ asset('assets/template') }}/assets/vendor/js/template-customizer.js"></script> --}}
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('assets/template') }}/assets/js/config.js"></script>
