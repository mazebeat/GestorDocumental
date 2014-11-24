{{-- AngularJS --}}
	{{ HTML::script('http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js') }}
	{{ HTML::script('https://code.angularjs.org/1.2.26/i18n/angular-locale_es-cl.js') }}
{{----}}
{{--{{ HTML::script('js/angular-1.3.2/angular.min.js') }}--}}
{{--{{ HTML::script('js/angular-1.3.2/i18n/angular-locale_es-cl.js') }}--}}
{{-- Angular Directives --}}
{{ HTML::script('js/angular-debounce.js') }}
{{ HTML::script('js/chosen.js') }}
{{ HTML::script('js/treeView.js') }}
{{ HTML::script('js/angular-utf8-base64.min.js') }}
{{-- Main app --}}
{{ HTML::script('js/app.js') }}
<script>
    gestorDocumental.factory('rootFactory', function () {
        var servicio = {
            raiz: "{{ Request::root() }}"
        };

        return servicio;
    });
</script>
{{ HTML::script('js/factories.js') }}
{{ HTML::script('js/directives.js') }}
{{ HTML::script('js/controllers.js') }}
