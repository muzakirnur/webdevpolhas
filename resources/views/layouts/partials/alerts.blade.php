@if (session()->has('success'))
    <x-adminlte-alert theme="success" title="Success">
        {{ session('success') }}
    </x-adminlte-alert>
@endif
@if (session()->has('error'))
    <x-adminlte-alert theme="danger" title="Gagal">
        {{ session('error') }}
    </x-adminlte-alert>
@endif
