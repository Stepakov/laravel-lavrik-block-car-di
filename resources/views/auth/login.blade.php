<x-layouts.guest title="Login">
    <x-form action="{{ route( 'auth.login.store' ) }}" method="POST">
        <x-form-input name="email" label="Email: " />
        <x-form-input type="password" name="password" label="Password: " />
        <x-form-checkbox name="remember" label="Remember me" />
        <button class="btn btn-success">Login</button>
    </x-form>
</x-layouts.guest>
