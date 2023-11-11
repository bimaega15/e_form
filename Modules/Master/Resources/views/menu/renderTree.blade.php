@php
$structureTree = UtilsHelp::createStructureTree();
$hiddenTree = UtilsHelp::handleSidebar($structureTree);

ob_start();
echo UtilsHelp::renderTree($structureTree, null, $hiddenTree);
$outputTree = ob_get_clean();
@endphp

<div class="clearfix m-b-20">
    <div id="output_menu">
        <div class="dd nestable-with-handle">
            {!! $outputTree !!}
        </div>
    </div>
</div>
<script class="url_rendermenu_form" data-url="{{ route('master.menu.renderTree') }}"></script>
<script class="url_sortAndNested" data-url="{{ route('master.menu.sortAndNested') }}"></script>
<script src="{{ asset('js/master/menu/nested.js') }}"></script>