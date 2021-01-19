<!-- jQuery and bootstrtap js -->
<script src="{{ asset('assets/bundles/lib.vendor.bundle.js') }}"></script>

<!-- start plugin js file  -->
@yield('PluginScripts')

<!-- Start core js and page js -->
<script src="{{ asset('assets/js/core.js') }}"></script>
<script src="{{ asset('assets/js/buscar.js') }}"></script>
<script src="{{ asset('assets/js/page/notifications.js') }}"></script>

{{-- Mis Scripts --}}
@yield('myScripts')
