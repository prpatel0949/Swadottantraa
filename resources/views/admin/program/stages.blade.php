<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Stages</label>
            <select class="form-control" name="stage_ids[]" id="stage_ids" multiple>
                <option value="" disabled>Select Stage</option>
                @foreach ($program->stages as $stage)
                    <option value="{{ $stage->id }}" {{ (in_array($stage->id, $access) ? 'selected' : '') }}>{{ $stage->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>