<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Button Simulation') }}
        </h2>
    </x-slot>

    @php
        $coso = new Otp();
    @endphp

    <div class="overflow-visible py-12">
        <div class="overflow-visible w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-visible bg-white p-8 dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto justify-center">
                    <button type="button"
                        class="rounded-full bg-primary p-3 text-xs font-medium uppercase leading-normal text-green shadow-lg transition duration-150 ease-in-out hover:bg-primary-700 focus:bg-primary-700 focus:outline-none focus:ring-0 active:bg-primary-800"
                        data-te-toggle="modal" data-te-target="#exampleModal" data-te-ripple-init
                        data-te-ripple-color="green">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="h-64 w-64 xl:h-96 xl:w-96">
                            <path fill-rule="evenodd"
                                d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                                clip-rule="evenodd" />
                            <path
                                d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z" />
                        </svg>
                    </button>

                    <div data-te-modal-init
                    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                    id="exampleModal" tabindex="-1" aria-labelledby="exampleModal"
                    aria-hidden="true">
                    <div data-te-modal-dialog-ref
                        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                        <div
                            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                            <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                <form action="/api/call/solve" method="post">
                                    @csrf
                                    <div class="relative mb-3" data-te-input-wrapper-init>
                                        <input type="text" name="r"
                                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                            id="exampleFormControlInput1" placeholder="Solve call reason" />
                                        <label for="exampleFormControlInput1"
                                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                                            Solve call reason
                                        </label>
                                    </div>
                                    @if (Auth::user()->privilege == "Nurse")
                                        <select name="i" data-te-select-init>
                                            @foreach (Auth::user()->zone as $zone)
                                                <option value="{{$zone->id}}">Zone {{$zone->id}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="hidden" name="i" value="{{ Auth::user()->userZone->zone->id }}">
                                        <input type="hidden" name="p"
                                        value="{{ $coso->generate(App\Models\OtpCode::find(Auth::user()->userZone->zone->id)->passphrase, 6)->token }}">
                                    @endif
                                    <input
                                        class="inline-block rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                        data-te-ripple-init data-te-ripple-color="light" type="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Button trigger modal -->

            <!-- Modal -->

        </div>
    </div>

</x-app-layout>
