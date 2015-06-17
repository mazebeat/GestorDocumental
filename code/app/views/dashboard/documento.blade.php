@extends('layouts.dashboard')

@section('title')
    Visualización de documentos
@endsection

@section('content')
	{{ HTML::preview($file); }}
@endsection
