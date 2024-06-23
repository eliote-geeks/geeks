<form method="post" action="{{route('token-verify',$id)}}">
@csrf
    <input type ="number" name="token">
    <input type="hidden" name="action" value="{{$type}}">
    <button type="submit">
        Valider
    </button>
</form>