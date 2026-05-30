@extends('backends.layout')
@section('backend_content')
    <div class="container">
        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Add/Edit Form --}}
        <div class="card p-2">
            <div class="card-header border-0 d-flex justify-content-between align-items-center">
                <h3 class="m-0" id="formTitle">Add Coding Skill</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.skills.skills.store') }}" method="POST" id="skillForm">
                    @csrf
                    <input type="hidden" name="_method" value="POST" id="methodField">
                    <input type="hidden" name="skill_id" id="skill_id">

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="skill_name">Skill Name</label>
                            <input type="text" name="skill_name" id="skill_name"
                                class="form-control @error('skill_name') is-invalid @enderror"
                                placeholder="Enter skill name" value="{{ old('skill_name') }}">
                            @error('skill_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="percentage">Skill Percentage</label>
                            <input type="number" name="percentage" id="percentage"
                                class="form-control @error('percentage') is-invalid @enderror"
                                placeholder="Enter skill percentage" value="{{ old('percentage') }}" min="0" max="100">
                            @error('percentage')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success" id="submitBtn">Add Skill</button>
                        <button type="button" class="btn btn-secondary" id="cancelBtn" style="display:none;"
                            onclick="resetForm()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Skills List --}}
        <div class="card p-2 mt-3">
            <div class="card-header border-0 d-flex justify-content-between align-items-center">
                <h3 class="m-0">Coding Skill List</h3>
            </div>
            <div class="card-body" style="overflow-x:auto;">
                @if($skills->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Skill Name</th>
                                <th>Percentage</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skills as $key => $skill)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $skill->name }}</td>
                                    <td>{{ $skill->percentage }}%</td>
                                    <td>
                                        <button
                                            onclick="editSkill({{ $skill->id }}, '{{ $skill->name }}', {{ $skill->percentage }})"
                                            class="btn btn-primary btn-sm">Edit</button>

                                        <form action="{{ route('dashboard.skills.skills.destroy', $skill->id) }}" method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Are you sure you want to delete this skill?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">No skills added yet.</p>
                @endif
            </div>
        </div>
    </div>

    @push('backend_js')
        <script>
            function editSkill(id, name, percentage) {
                document.getElementById('formTitle').innerText = 'Edit Coding Skill';
                document.getElementById('skill_name').value = name;
                document.getElementById('percentage').value = percentage;
                document.getElementById('skill_id').value = id;
                document.getElementById('methodField').value = 'PUT';
                document.getElementById('skillForm').action = `/dashboard/skills/skills/${id}`;
                document.getElementById('submitBtn').innerText = 'Update Skill';
                document.getElementById('cancelBtn').style.display = 'inline-block';
            }

            function resetForm() {
                document.getElementById('formTitle').innerText = 'Add Coding Skill';
                document.getElementById('skillForm').reset();
                document.getElementById('skill_id').value = '';
                document.getElementById('methodField').value = 'POST';
                document.getElementById('skillForm').action = '{{ route("dashboard.skills.skills.store") }}';
                document.getElementById('submitBtn').innerText = 'Add Skill';
                document.getElementById('cancelBtn').style.display = 'none';
            }
        </script>
    @endpush

@endsection
