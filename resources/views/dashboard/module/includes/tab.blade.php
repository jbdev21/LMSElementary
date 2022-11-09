<ul class="nav nav-tabs mb-4">
    <li class="nav-item">
      <a class="nav-link @if(Request::get("tab") == "") active @endif" aria-current="page" href="{{ route("dashboard.module.show", $module->id) }}">Student</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(Request::get("tab") == "files") active @endif" href="{{ route("dashboard.module.show", [$module->id, 'tab' => "files"]) }}">Files</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(Request::get("tab") == "pre-assessment") active @endif" href="{{ route("dashboard.module.show", [$module->id, 'tab' => 'pre-assessment']) }}">Pre-assessment</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(Request::get("tab") == "post-assessment") active @endif" href="{{ route("dashboard.module.show", [$module->id, 'tab' => 'post-assessment']) }}">Post-assessment</a>
    </li>
</ul>