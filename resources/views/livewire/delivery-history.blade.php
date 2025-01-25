<div class="py-12">
    <div class="space-y-4">
        <div class="mx-auto rounded-lg max-w-7xl sm:px-6 lg:px-8 dark:bg-gray-800">
            <div class="py-2">
                <form wire:submit.prevent="submitStatus" class="flex gap-2">
                    <input type="text" placeholder="Enter delivery status....." wire:model="status" x-ref="statusInput"
                        name="status" id="status" class="block w-full dark:text-black" />
                    <button
                        class="px-4 py-2 font-semibold text-blue-700 border border-blue-500 rounded hover:bg-blue-500 hover:text-white hover:border-transparent">
                        ENTER
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <div class="mx-auto rounded-lg max-w-7xl sm:px-6 lg:px-8 dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <h5 class="forge-h5">Package Delivery History</h5>
            </div>
            <div class="py-2">
                <table class="w-full text-left">

                    @if (count($packageStatuses) > 0)
                        <thead class="text-gray-500">
                            <tr class="h-10">
                                <th class="pr-4 font-normal">User</th>
                                <th class="w-full pr-4 font-normal">Written Status</th>
                                <th class="pr-4 font-normal">Time</th>
                                <th class="pr-4 font-normal">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="max-w-full text-white">
                            @foreach ($packageStatuses as $status)
                                <tr class="h-12 border-t border-gray-100 dark:border-gray-700">


                                    <td class="pr-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-32 text-truncate"> {{ $status['deliveryPersonnel'] }}</div>
                                        </div>
                                    </td>
                                    <td class="pr-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-32 text-truncate">{{ $status['deliveryStatus'] }}</div>
                                        </div>
                                    </td>
                                    <td class="pr-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-32 text-truncate">
                                                {{ Carbon\Carbon::parse($status['deliveryTime'])->diffForHumans() }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pr-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-32 text-truncate">

                                                @if ($status['deliveryStatus'] == 'Port')
                                                    <div
                                                        class="h-2 transition-all ease-in-out bg-blue-600 rounded-full transition-2s">
                                                    </div>
                                                @endif

                                                @if ($status['deliveryStatus'] == 'Processing')
                                                    <div
                                                        class="h-2 transition-all ease-in-out bg-yellow-600 rounded-full transition-2s">
                                                    </div>
                                                @endif

                                                @if ($status['deliveryStatus'] == 'Shipped')
                                                    <div
                                                        class="h-2 transition-all ease-in-out bg-pink-600 rounded-full transition-2s">
                                                    </div>
                                                @endif

                                                @if ($status['deliveryStatus'] == 'Delivered')
                                                    <div
                                                        class="h-2 transition-all ease-in-out bg-green-600 rounded-full transition-2s">
                                                    </div>
                                                @endif

                                                @if (!in_array($status['deliveryStatus'], ['Port', 'Processing', 'Shipped', 'Delivered']))
                                                    <div
                                                        class="h-2 transition-all ease-in-out bg-red-600 rounded-full transition-2s">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <h3> No History yet... </h3>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
