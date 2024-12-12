<!-- sidebar-component.blade.php -->
<div class="h-[calc(100dvh-77px)]   bg-white" x-data="{ hideSidebar: false }">
    <div class="flex flex-col h-full pt-0   w-full">
        <div
            class="flex min-h-0 flex-1 h-full  w-[221px] flex-col bg-blue-light md:border-r-[1px] border-r-0 border-r-grey-2 transition-all ease "
            :class="hideSidebar ? 'md:w-16 w-full' : 'w-[221px]'">
            <button
                class="group sidebar-item flex gap-3 items-center rounded-md p-5 h-md:py-3 text-sm leading-6 font-normal hover:bg-nav-active-bg text-grey-text-3 hover:text-primary"
                @click="hideSidebar = !hideSidebar"
            >
                <div :class="{ 'rotate-180': hideSidebar }" class="transition-transform ease-linear">

                    <livewire:svg-template
                        :classes="'stroke-black '"
                        :width="24"
                        :height="24"
                        :path="App\Enums\IconsEnums::TOGGLE_SIDEBAR"

                    />
                </div>


                <p class="text-base font-semibold whitespace-nowrap" x-show="!hideSidebar">
                    Hide sidebar
                </p>

            </button>

            <div class="flex flex-1 flex-col pb-4 h-md:pb-0">
                <nav class="flex-1">
                    @foreach ($navigation as $item)
                        <a href="{{ $item['href'] }}"
                           class="group sidebar-item flex gap-3 items-center rounded-md p-5 h-md:py-3 hover:bg-gray-100 text-grey-text-3 hover:text-blue-500 {{ $item['current'] ? 'bg-gray-100 text-blue-500' : '' }}">
                            <livewire:svg-template
                                :classes="$item['current'] ? 'stroke-blue-500 group-hover:stroke-blue-500' : 'stroke-black group-hover:stroke-blue-500'"
                                :width="24"
                                :height="24"
                                :path="$item['path']"
                                wire:key="unique-key-{{ $loop->index }}"
                            />
                            <p x-show="!hideSidebar" class="text-base h-md:text-sm font-semibold whitespace-nowrap">
                                {{ $item['name'] }}
                            </p>
                        </a>
                    @endforeach
                </nav>
            </div>
            <a href="/account"
               class="account group sidebar-item flex gap-3 items-center rounded-md p-5 h-md:p-3 hover:bg-nav-active-bg text-black hover:text-primary">
                <div class="min-w-8 min-h-8 rounded-full bg-blue-500 flex justify-center items-center">
                    @if($auth)
                        {{ $auth['initials'] }}
                    @endif

                </div>
                @if($auth)
                    <p
                        x-show="!hideSidebar"
                        class="text-base h-md:text-sm font-semibold whitespace-nowrap">
                        {{ $auth['fullName'] }}
                    </p>
                @endif

            </a>
            <button
                class="group sidebar-item md:flex hidden gap-3 items-center rounded-md p-5 h-md:py-3 hover:bg-nav-active-bg text-grey-text-3 hover:text-primary"
                wire:click="logout">
                <livewire:svg-template
                    :classes="'stroke-black'"
                    :width="24"
                    :height="24"
                    :path="App\Enums\IconsEnums::LOGOUT"

                />
                <p
                    x-show="!hideSidebar"

                    class="text-base h-md:text-sm font-semibold whitespace-nowrap">
                    Log out
                </p>
            </button>
        </div>
    </div>
</div>
