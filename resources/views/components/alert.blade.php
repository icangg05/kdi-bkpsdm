@php
  $ikon = [
      'success' => 'ti ti-circle-check',
      'danger'  => 'ti ti-alert-circle',
      'warning' => 'ti ti-alert-triangle',
  ][$color] ?? 'ti ti-info-circle';
@endphp

<div class="alert alert-{{ $color }} d-flex align-items-start gap-2 bk-rise"
	role="{{ $color === 'danger' ? 'alert' : 'status' }}">
	<i class="{{ $ikon }}" aria-hidden="true"></i>
	<span>{{ $message }}</span>
</div>
