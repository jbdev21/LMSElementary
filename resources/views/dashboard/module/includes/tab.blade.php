<ul class="nav nav-tabs mb-4">
    <li class="nav-item">
      <a class="nav-link @if(Request::get("tab") == "") active @endif" aria-current="page" href="{{ route("dashboard.module.show", $module->id) }}">Students</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(Request::get("tab") == "files") active @endif" href="{{ route("dashboard.module.show", [$module->id, 'tab' => "files"]) }}">Files</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(Request::get("tab") == "lesson") active @endif" href="{{ route("dashboard.module.show", [$module->id, 'tab' => 'lesson']) }}">Lesson</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(Request::get("tab") == "assessment") active @endif" href="{{ route("dashboard.module.show", [$module->id, 'tab' => 'assessment']) }}">Assesment</a>
    </li>
</ul>