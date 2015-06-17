@extends('layouts.dashboard')

@section('title')
Visualización carpeta cliente
@endsection

@section('page-title')
<i class="fa fa-folder"></i> Carpeta Cliente<span>Gestor Documental...</span>
@endsection

@section('breakcrumb')
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<h4>Información Cliente</h4>
		<div class="panel panel-black">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="rut">Rut Cliente</label>
							<input id="rut" class="form-control" type="text" readonly="readonly" value="{{ '16.6515.430-6' }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="cc">Cuenta Cliente</label>
							<input id="cc" class="form-control" type="text" readonly="readonly" value="{{ '888888888888' }}">
						</div>
					</div>
				</div>		
				<div class="form-group">
					<label class="control-label" for="client">Cliente</label>
					<input id="client" class="form-control" type="text" readonly="readonly" value="{{ 'Alexis San Martin Orellana' }}">
				</div>		
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<h4>Información Solicitud</h4>
		<div class="panel panel-black">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label" for="rut">ID Solicitud</label>
							<input id="rut" class="form-control" type="text" readonly="readonly" value="{{ '1' }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label" for="cc">Fecha Solicitud</label>
							<input id="cc" class="form-control" type="text" readonly="readonly" value="{{ '2014/01/28' }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label" for="cc">Fecha Carga</label>
							<input id="cc" class="form-control" type="text" readonly="readonly" value="{{ '2014/01/28' }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="client">Sucursal</label>
							<input id="client" class="form-control" type="text" readonly="readonly" value="{{ 'Ahumada' }}">
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="client">Estado</label>
							<input id="client" class="form-control" type="text" readonly="readonly" value="{{ 'Activo' }}">
						</div>	
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h4>Detalle Documentos</h4>
		<ul class="filemanager-options clearfix">
			<li>
				<div class="ckbox ckbox-default">
					<input type="checkbox" id="selectall" value="1"/>
					<label for="selectall">Todos</label>
				</div>
			</li>
			<li>
				<a href="{{ URL::to('#') }}" class="itemopt disabled tooltips" data-toggle="tooltip" data-placement="top" data-original-title="Email"><i class="fa fa-envelope-o fa-lg"></i></a>
			</li>
			<li>
				<a href="{{ URL::to('#') }}" class="itemopt disabled tooltips" data-toggle="tooltip" data-placement="top" data-original-title="Descargar"><i class="fa fa-download fa-lg"></i></a>
			</li>
			<li>
				<a href="{{ URL::to('#') }}" class="itemopt disabled tooltips" data-toggle="tooltip" data-placement="top" data-original-title="Imprimir"><i class="fa fa-print fa-lg"></i></a>
			</li>
			<li>
				<a href="{{ URL::to('#') }}" class="itemopt disabled tooltips" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="fa fa-trash-o fa-lg"></i></a>
			</li>
			<li>
				<a href="{{ URL::to('#') }}" class="itemopt disabled tooltips" data-toggle="tooltip" data-placement="top" data-original-title="Visualizar"><i class="fa fa-eye fa-lg"></i></a>
			</li>
			<li class="filter-type hidden-xs hidden-sm">
				Mostrar:
				<a href="{{ URL::to('#') }}" class="active">Todos</a>
				<a href="{{ URL::to('#') }}">Documentos</a>
				<a href="{{ URL::to('#') }}">Audio</a>
				<a href="{{ URL::to('#') }}">Images</a>
				<a href="{{ URL::to('#') }}">Videos</a>
			</li>
			<li class="hidden-md hidden-lg pull-right">
				<button data-toggle="dropdown" class="btn btn-xs dropdown-toggle" type="button">
					Mostar: <span class="caret"></span>
				</button>
				<ul role="menu" class="dropdown-menu">
					<li><a href="{{ URL::to('#') }}" class="active">Todos</a></li>
					<li><a href="{{ URL::to('#') }}">Documentos</a></li>
					<li><a href="{{ URL::to('#') }}">Audio</a></li>
					<li><a href="{{ URL::to('#') }}">Images</a></li>
					<li><a href="{{ URL::to('#') }}">Videos</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<div class="row filemanager">
			{{ HTML::load_documents($dir)  }}
		</div>
	</div>
	<div class="col-md-3">
		<div class="fm-sidebar">
			<button class="btn btn-primary btn-block">Almacenar Documento</button>
			<div class="mb30"></div>
			<h5 class="subtitle">Etiquetas</h5>
			{{ HTML::load_tags(array('name' => 'Word')) }}
		</div>
	</div>
</div>
@endsection


@section('file-style')
@endsection

@section('text-style')
@endsection

@section('file-script')
@endsection

@section('text-script')
<script>

	jQuery('.thmb').hover(function () {
		var t = jQuery(this);
		t.find('.ckbox').show();
		t.find('.fm-group').show();
	}, function () {
		var t = jQuery(this);
		if (!t.closest('.thmb').hasClass('checked')) {
			t.find('.ckbox').hide();
			t.find('.fm-group').hide();
		}
	});

	jQuery('.ckbox').each(function () {
		var t = jQuery(this);
		var parent = t.parent();
		if (t.find('input').is(':checked')) {
			t.show();
			parent.find('.fm-group').show();
			parent.addClass('checked');
		}
	});


	jQuery('.ckbox').click(function () {
		var t = jQuery(this);
		if (!t.find('input').is(':checked')) {
			t.closest('.thmb').removeClass('checked');
			enable_itemopt(false);
		} else {
			t.closest('.thmb').addClass('checked');
			enable_itemopt(true);
		}
	});

	jQuery('#selectall').click(function () {
		if (jQuery(this).is(':checked')) {
			jQuery('.thmb').each(function () {
				jQuery(this).find('input').attr('checked', true);
				jQuery(this).addClass('checked');
				jQuery(this).find('.ckbox, .fm-group').show();
			});
			enable_itemopt(true);
		} else {
			jQuery('.thmb').each(function () {
				jQuery(this).find('input').attr('checked', false);
				jQuery(this).removeClass('checked');
				jQuery(this).find('.ckbox, .fm-group').hide();
			});
			enable_itemopt(false);
		}
	});

	function enable_itemopt(enable) {
		if (enable) {
			jQuery('.itemopt').removeClass('disabled');
		} else {

		// check all thumbs if no remaining checks
		// before we can disabled the options
		var ch = false;
		jQuery('.thmb').each(function () {
			if (jQuery(this).hasClass('checked'))
				ch = true;
		});

		if (!ch)
			jQuery('.itemopt').addClass('disabled');
		}
	}

	//Replaces data-rel attribute to rel.
	//We use data-rel because of w3c validation issue
	jQuery('a[data-rel]').each(function () {
		jQuery(this).attr('rel', jQuery(this).data('rel'));
	});

	jQuery("a[rel^='prettyPhoto']").prettyPhoto();

</script>
@endsection
