@extends('layout') @section('content')
<div class="container mx-auto mt-10 pb-10">
    <div class="mt-5 md:col-span-2 md:mt-0 shadow">
        <div class="bg-gray-50 px-4 py-6 sm:px-6 sm:rounded-md">
            <span class="block text-md font-medium text-gray-700">Update your details</span>
        </div>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div class="overflow-hidden">
                <div class="bg-white px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                            <input value="{{Auth::user()->email}}" disabled type="text" name="email" id="email-address" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input value="{{Auth::user()->username}}" disabled type="text" name="username" id="username" autocomplete="username" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                            <input value="{{Auth::user()->first_name}}" type="text" name="first_name" id="first_name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                            @if ($errors->has('first_name'))
                            <p class="mt-2 text-sm text-pink-600" id="first_name-error">{{ $errors->first('first_name') }}</p>
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                            <input value="{{Auth::user()->last_name}}" type="text" name="last_name" id="last_name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                            @if ($errors->has('last_name'))
                            <p class="mt-2 text-sm text-pink-600" id="first_name-error">{{ $errors->first('last_name') }}</p>
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input value="{{Auth::user()->phone}}" type="tel" name="phone" id="phone" autocomplete="phone" pattern="[0-9]{8,10}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                            @if ($errors->has('phone'))
                            <p class="mt-2 text-sm text-pink-600" id="first_name-error">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                            <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                                <option disabled value {{ !in_array(Auth::user()->country, array("United States", "Mexico", "Canada")) ? "selected" : "" }}>Select a country</option>
                                <option {{ Auth::user()->country == "United States" ? "selected" : "" }}>United States</option>
                                <option {{ Auth::user()->country == "Canada" ? "selected" : "" }}>Canada</option>
                                <option {{ Auth::user()->country == "Mexico" ? "selected" : "" }}>Mexico</option>
                            </select>
                            @if ($errors->has('country'))
                            <p class="mt-2 text-sm text-pink-600" id="first_name-error">{{ $errors->first('country') }}</p>
                            @endif
                        </div>

                        <div class="col-span-6">
                            <label for="address_1" class="block text-sm font-medium text-gray-700">Address Line 1</label>
                            <input value="{{Auth::user()->address_1}}" type="text" name="address_1" id="address_1" autocomplete="address_1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                            @if ($errors->has('address_1'))
                            <p class="mt-2 text-sm text-pink-600" id="first_name-error">{{ $errors->first('address_1') }}</p>
                            @endif
                        </div>
                        <div class="col-span-6">
                            <label for="address_2" class="block text-sm font-medium text-gray-700">Address Line 2</label>
                            <input value="{{Auth::user()->address_2}}" type="text" name="address_2" id="address_2" autocomplete="address_2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                            @if ($errors->has('address_2'))
                            <p class="mt-2 text-sm text-pink-600" id="first_name-error">{{ $errors->first('address_2') }}</p>
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input value="{{Auth::user()->city}}" type="text" name="city" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                            @if ($errors->has('city'))
                            <p class="mt-2 text-sm text-pink-600" id="first_name-error">{{ $errors->first('city') }}</p>
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label for="state" class="block text-sm font-medium text-gray-700">State / Province</label>
                            <input value="{{Auth::user()->state}}" type="text" name="state" id="state" autocomplete="state" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                            @if ($errors->has('state'))
                            <p class="mt-2 text-sm text-pink-600" id="first_name-error">{{ $errors->first('state') }}</p>
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label for="zip" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                            <input value="{{Auth::user()->zip}}" type="text" name="zip" id="zip" autocomplete="postal-code" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                            @if ($errors->has('zip'))
                            <p class="mt-2 text-sm text-pink-600" id="first_name-error">{{ $errors->first('zip') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="mt-10 md:col-span-2 shadow">
        <div class="bg-gray-50 px-4 py-6 sm:px-6 sm:rounded-md">
            <span class="block text-md font-medium text-gray-700">Update your password</span>
        </div>
        <form action="{{ route('password_change') }}" method="POST">
            @csrf
            <div class="overflow-hidden">
                <div class="bg-white px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Current password</label>
                            <input type="password" name="current_password" id="current_password" autocomplete="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                            @if ($errors->has('current_password'))
                            <p class="mt-2 text-sm text-pink-600" id="first_name-error">{{ $errors->first('current_password') }}</p>
                            @endif
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="new_password" class="block text-sm font-medium text-gray-700">New password</label>
                            <input type="password" name="new_password" id="new_password" autocomplete="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                            @if ($errors->has('new_password'))
                            <p class="mt-2 text-sm text-pink-600" id="first_name-error">{{ $errors->first('new_password') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
