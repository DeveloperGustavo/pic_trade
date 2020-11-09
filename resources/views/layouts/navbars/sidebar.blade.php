<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal text-center">♥ {{ __('Pic Trade') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Início') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'extract') class="active " @endif>
                <a href="{{ route('transaction.index') }}">
                    <i class="tim-icons icon-chart-bar-32"></i>
                    <p>{{ __('Extrato') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'profile') class="active " @endif>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Editar dados') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
