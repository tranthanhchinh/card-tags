@extends('welcome')
@section('content')
    <div class="page-card">
       <img src="/uploads/{{ $cardDetail->avatar }}" width="100%"/>

        {!! '<p class="company">'.$cardDetail->company.'</p>' !!}
        {!! '<p>'.$cardDetail->name.'</p>' !!}
        {!! '<p>'.$cardDetail->position.'</p>' !!}
        {!! '<p>'.$cardDetail->phone.'</p>' !!}
        {!! '<p>'.$cardDetail->email.'</p>' !!}
        {!! '<p>'.$cardDetail->address.'</p>' !!}
        <p><a href="/vcard/{{ $cardDetail->slug }}" class="btn btn-primary">Save Contacts</a> </p>
    </div>
@endsection
