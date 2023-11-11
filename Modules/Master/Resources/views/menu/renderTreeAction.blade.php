@php
$structureTree = UtilsHelp::createStructureTree();
$hiddenTree = UtilsHelp::handleSidebar($structureTree);

ob_start();
echo UtilsHelp::renderTree($structureTree, null, $hiddenTree);
$outputTree = ob_get_clean();
@endphp

<div class="dd nestable-with-handle">
    {!! $outputTree !!}
</div>