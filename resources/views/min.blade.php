@extends('base')

@section('scripts')
<script type="application/javascript">
function updateSr() {
    $.get("{{ route('api_get_role', ['apiKey' => $apiKey, 'role' => $role]) }}", function(data) {
        $(".rank").html(data);
        if (data >= 4000) { $(".rank-img").attr("src", "{{ asset('rank/grandmaster.png') }}"); }
        else if (data >= 3500) { $(".rank-img").attr("src", "{{ asset('rank/master.png') }}"); }
        else if (data >= 3000) { $(".rank-img").attr("src", "{{ asset('rank/diamond.png') }}");}
        else if (data >= 2500) { $(".rank-img").attr("src", "{{ asset('rank/platinum.png') }}");}
        else if (data >= 2000) { $(".rank-img").attr("src", "{{ asset('rank/gold.png') }}");}
        else if (data >= 1500) { $(".rank-img").attr("src", "{{ asset('rank/silver.png') }}");}
        else { $(".rank-img").attr("src", "{{ asset('rank/bronze.png') }}"); }
    });
}
</script>
@endsection

@section('body')
<script>
    let loaded = false;
    $(document).ready(function() {
        if (!loaded) {
            updateSr();
            window.setInterval(updateSr, 5000);
            loaded = true;
        }
    });
</script>
<div style="font-size: 45px;"><img src="" alt="" class="rank-img rank-img-left" style="display: inline; width: auto; height: 1em;"><div id="rank" class="rank" style="display: inline;"></div><img src="" alt="" class="rank-img rank-img-right" style="display: inline; width: auto; height: 1em;"></div>
@endsection
