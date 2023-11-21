@php
$structureTree = UtilsHelp::createStructureTree();
$hiddenTree = UtilsHelp::handleSidebar($structureTree);
ob_start();
UtilsHelp::renderSidebar($structureTree, null, $hiddenTree);
$outputSidebar = ob_get_clean();
@endphp
<nav class="side-nav">
    <a href="#" class="intro-x flex items-center pl-5 pt-4 mt-3">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('backend') }}/dist/images/logo.svg">
        <span class="hidden xl:block text-white text-lg ml-3"> Tinker </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        {!! $outputSidebar !!}
    </ul>
</nav>