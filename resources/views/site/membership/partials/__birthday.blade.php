<div class="col-md-6">
    <label for="city" class="form-label">{{ __('تاريخ الميلاد') }}
        <div class="form-check d-inline-block mx-3">
            <input class="form-check-input" type="radio" name="calendar" id="georgian">
            <label class="form-check-label" for="georgian">
                ميلادي
            </label>
        </div>
        <div class="form-check d-inline-block">
            <input class="form-check-input" type="radio" name="calendar" id="hijri">
            <label class="form-check-label" for="hijri">
                هجري
            </label>
        </div>
    </label>
    <div class="row">
        <div class="col pe-1">
            <select name="day" class="form-select" disabled>
                <option selected="">{{ __('اليوم') }}</option>
            </select>
            @error('day')
                <span>
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="col px-1">
            <select name="month" class="form-select" disabled>
                <option selected="">{{ __('الشهر') }}</option>
            </select>
            @error('month')
                <span>
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="col ps-1">
            <select name="year" class="form-select" disabled>
                <option selected="">{{ __('السنة') }}</option>
            </select>
            @error('birth_date')
                <span class="msg-error">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>
