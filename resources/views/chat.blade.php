<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chats') }}
        </h2>
    </x-slot>

    <div class="overflow-visible py-12">
        <div class="overflow-visible max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-visible bg-white p-4 dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto" >
                    <div class="h-screen">
                        <div class="flex border border-grey rounded shadow-lg h-full">

                            <!-- Left -->
                            <div class="w-1/3 border flex flex-col">

                                <!-- Contacts -->
                                <div class="bg-grey-lighter flex-1 overflow-auto">
                                    <div class="px-3 flex items-center bg-slate-200 cursor-pointer">
                                        <div>
                                            <img class="h-12 w-12 rounded-full"
                                                    src="https://darrenjameseeley.files.wordpress.com/2014/09/expendables3.jpeg"/>
                                        </div>
                                        <div class="ml-4 flex-1 border-b border-grey-lighter py-4">
                                            <div class="flex items-bottom justify-between">
                                                <p class="text-grey-darkest">
                                                    New Movie! Expendables 4
                                                </p>
                                                <p class="text-xs text-grey-darkest">
                                                    12:45 pm
                                                </p>
                                            </div>
                                            <p class="text-grey-dark mt-1 text-sm">
                                                Get Andrés on this movie ASAP!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="bg-white px-3 flex items-center hover:bg-slate-200 cursor-pointer">
                                        <div>
                                            <img class="h-12 w-12 rounded-full"
                                                    src="https://www.biography.com/.image/t_share/MTE5NDg0MDU1MTIyMTE4MTU5/arnold-schwarzenegger-9476355-1-402.jpg"/>
                                        </div>
                                        <div class="ml-4 flex-1 border-b border-grey-lighter py-4">
                                            <div class="flex items-bottom justify-between">
                                                <p class="text-grey-darkest">
                                                    Arnold Schwarzenegger
                                                </p>
                                                <p class="text-xs text-grey-darkest">
                                                    12:45 pm
                                                </p>
                                            </div>
                                            <p class="text-grey-dark mt-1 text-sm">
                                                I'll be back
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <!-- Right -->
                            <div class="w-2/3 border flex flex-col">

                                <!-- Messages -->
                                <div class="flex-1 overflow-auto" style="background-color: #DAD3CC">
                                    <div class="py-2 px-3">

                                        <div class="flex mb-2">
                                            <div class="rounded py-2 px-3" style="background-color: #F2F2F2">
                                                <p class="text-sm text-teal">
                                                    Sylverter Stallone
                                                </p>
                                                <p class="text-sm mt-1">
                                                    He is. Just invited him to join.
                                                </p>
                                                <p class="text-right text-xs text-grey-dark mt-1">
                                                    12:45 pm
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex justify-end mb-2">
                                            <div class="rounded py-2 px-3" style="background-color: #E2F7CB">
                                                <p class="text-sm mt-1">
                                                    Hi guys.
                                                </p>
                                                <p class="text-right text-xs text-grey-dark mt-1">
                                                    12:45 pm
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Input -->
                                <div class="bg-grey-lighter px-4 py-4 flex items-center">
                                    <div class="flex-1 mx-4">
                                        <input class="w-full border rounded px-2 py-2" type="text"/>
                                    </div>
                                    <div class="hover:">
                                        <img class="hover:blur-[1px] hover:cursor-pointer hover:scale-110 transition-all" width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/sent.png" alt="sent"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
