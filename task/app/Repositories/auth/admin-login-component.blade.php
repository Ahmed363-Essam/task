<form id="formAuthentication" wire:submit="Login" class="mb-3" wire>
    <div class="mb-3">
        <label for="email" class="form-label">Email </label>
        <input type="email" class="form-control" placeholder="Enter your email " autofocus wire:model.live="email" />
        <div>
            @error('email')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
    </div>

    <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Password</label>

        </div>
        <div class="input-group input-group-merge">
            <input type="password" class="form-control" name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password" wire:model.live="password" />


            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
        <div class="text-danger">
            @error('password')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>

    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember-me" />
            <label class="form-check-label" for="remember-me"> Remember Me </label>
        </div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">
            @include('admin.loading',[
                'btmName' => 'Log In'
            ])
        </button>
    </div>
</form>
