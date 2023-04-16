<ul class="nav nav-tabs mb-4">
    <li class="nav-item">
      <a class="nav-link @if(Request::get("tab") == "") active @endif" aria-current="page" href="{{ route("dashboard.module.show", $module->id) }}"  data-bs-toggle="tooltip" data-bs-placement="top" title="List of student who taken the assessment">Students</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(Request::get("tab") == "files") active @endif" href="{{ route("dashboard.module.show", [$module->id, 'tab' => "files"]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Downloadable files for passing students">Files</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(Request::get("tab") == "lesson") active @endif" href="{{ route("dashboard.module.show", [$module->id, 'tab' => 'lesson']) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Related lessons for the module">Lesson</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(Request::get("tab") == "assessment") active @endif" href="{{ route("dashboard.module.show", [$module->id, 'tab' => 'assessment']) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Manage assessment's module">Assesment</a>
    </li>
</ul>