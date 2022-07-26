@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="col-8 p-5 mt-5 mb-5 m-auto border rounded-2">

            <h2 class="mb-4">Login</h2>

            @if (session('status'))
                <span>
                    {{ session('status') }}
                </span>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email">Email Address</label>
                    <input class="form-control @error('email') border-red @enderror" type="email" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}"/>

                    @error('email')
                        <span class="text-red mt-2 text-small">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input class="form-control @error('password') border-red @enderror" type="password" name="password" id="password" placeholder="Password" value=""/>

                    @error('password')
                        <span class="text-red mt-2 text-small">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary mb-3" type="submit">Login</button>
                </div>
            </form>    
        </div>
    </div>
@endsection