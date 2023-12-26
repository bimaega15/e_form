@foreach ($notes as $item)
<div class="p-5 mb-2 box">
    <div class="text-base font-medium truncate">{{ $item->judul_notes }}</div>
    <div class="text-slate-400 mt-1">{{ UtilsHelp::formatHumansDate($item->tanggal_notes) }}</div>
    <div class="text-slate-500 text-justify mt-1">{!! $item->keterangan_notes !!}</div>
</div>
@endforeach
@if ($all_notes > 5)
<div class="p-5 mb-2 box">
    {!! $notes->links('vendor.pagination.tailwind') !!}
</div>
@endif