<div {{$attributes->merge(['class'=>'alert alert-'.$validateType])}} role="alert">
    <strong>{{$validateType}}!</strong> {{$message}}
</div>