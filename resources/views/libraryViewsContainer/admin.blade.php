@extends('master')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<!--  Default banel contents  -->
		<div class="panal-heading">Managing section</div>
		<div class="panel-body">
			<h2><br />Creating new section</h2><hr />
			
			<!--  Creating New Section  -->
			{!! Form::open(["url"=>"form","files"=>"true"]) !!}
			Enter the name of section : {!! Form::text("section_name") !!}<br />
			Upload the image : {!! Form::file("image") !!}<br />
			{!! Form::submit("Create",["class"=>"btn btn-info"]) !!}
			{!! Form::close() !!}
		
		</div>

		@if($user != null)
		<table class="table">
			<tr>
				<th><h3>Section Name</h3></th>
				<th><h3>Total Books</h3></th>
				<th><h3>Update</h3></th>
				<th><h3>Delete</h3></th>
			</tr>
			@foreach($sections as $section)

			<tr>
			<!--  Update the existing Section  -->

			{!! Form::open(["url"=>"form/$section->id","method"=>"patch"]) !!}
			<td>{!! Form::text("section_name",$section->section_name) !!}</td>
			<td> <span class="label label-default">{{ $section->books_total }}</span> </td>
			<td>
				{!! Form::submit("Update",["class"=>"btn btn-success"]) !!}
			</td>
			{!! Form::close() !!}
			<td>
				<!-- Delete Specific Section -->
				{!! Form::open(["url"=>"form/$section->id","method"=>"delete"]) !!}
			    {!! Form::submit("Delete",["class"=>"btn btn-danger"]) !!}
			    {!! Form::close() !!}
			</td>

		</tr>

		@endforeach
	</table>
	@enfif
	</div>
</div>

@stop