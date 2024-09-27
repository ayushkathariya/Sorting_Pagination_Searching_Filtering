<x-app>
    <div class="container mt-1">
        <div class="flex items-center justify-between">
            <a href="{{ route('welcome') }}" class="font-semibold">Ecommerce App</a>
            <div class="cursor-pointer">
                <p class="relative px-4 rounded-full top-2 left-2">3</p>
                <img src="{{ asset('images/shopping-cart.svg') }}" alt="Shopping Cart" width="30">
            </div>
        </div>
        <div class="mt-2">
            <!-- Sort and Filter Form -->
            <form method="GET" action="{{ route('products.index') }}" class="p-4 mb-4 bg-gray-100 rounded shadow-md">
                <div class="flex flex-wrap -mx-2">
                    <!-- Search Input -->
                    <div class="w-full px-2 mb-4 md:w-1/4 md:mb-0">
                        <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                        <input type="text" name="q" id="search" value="{{ request()->q }}"
                            placeholder="Search products"
                            class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <!-- Category Filter -->
                    <div class="w-full px-2 mb-4 md:w-1/4 md:mb-0">
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select name="category" id="category"
                            class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $filterCategory == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Min Price Filter -->
                    <div class="w-full px-2 mb-4 md:w-1/4 md:mb-0">
                        <label for="min_price" class="block text-sm font-medium text-gray-700">Min Price</label>
                        <input type="number" name="min_price" id="min_price" value="{{ $minPrice }}"
                            class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="0">
                    </div>

                    <!-- Max Price Filter -->
                    <div class="w-full px-2 mb-4 md:w-1/4 md:mb-0">
                        <label for="max_price" class="block text-sm font-medium text-gray-700">Max Price</label>
                        <input type="number" name="max_price" id="max_price" value="{{ $maxPrice }}"
                            class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="1000">
                    </div>

                    <!-- Sort By -->
                    <div class="w-full px-2 mb-4 md:w-1/4 md:mb-0">
                        <label for="sort_by" class="block text-sm font-medium text-gray-700">Sort By</label>
                        <select name="sort_by" id="sort_by"
                            class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="title" {{ $sortField == 'title' ? 'selected' : '' }}>Title</option>
                            <option value="price" {{ $sortField == 'price' ? 'selected' : '' }}>Price</option>
                            <option value="created_at" {{ $sortField == 'created_at' ? 'selected' : '' }}>Date
                            </option>
                        </select>
                    </div>

                    <!-- Sort Order -->
                    <div class="w-full px-2 mb-4 md:w-1/4 md:mb-0">
                        <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                        <select name="order" id="order"
                            class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="asc" {{ $sortOrder == 'asc' ? 'selected' : '' }}>Ascending
                            </option>
                            <option value="desc" {{ $sortOrder == 'desc' ? 'selected' : '' }}>Descending
                            </option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="w-full px-2 md:w-1/4">
                        <button type="submit"
                            class="w-full px-4 py-2 mt-6 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                            Apply Filters
                        </button>
                    </div>

                    <!-- Reset Button -->
                    <div class="w-full px-2 md:w-1/4">
                        <button type="button" onclick="window.location='{{ route('products.index') }}'"
                            class="w-full px-4 py-2 mt-6 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                            Reset Filters
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div>
            <!-- Products Table -->
            {{-- <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-sm font-medium text-left text-gray-700">Title</th>
                            <th class="px-4 py-2 text-sm font-medium text-left text-gray-700">Description</th>
                            <th class="px-4 py-2 text-sm font-medium text-left text-gray-700">Price</th>
                            <th class="px-4 py-2 text-sm font-medium text-left text-gray-700">Category</th>
                            <th class="px-4 py-2 text-sm font-medium text-left text-gray-700">Image</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($products as $product)
                            <tr>
                                <td class="px-4 py-2 text-sm text-left text-gray-800">{{ $product->title }}
                                </td>
                                <td class="px-4 py-2 text-sm text-left text-gray-800">
                                    @if ($product->description)
                                        {{ Str::limit($product->description, 50) }}
                                    @else
                                        Null
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-sm text-left text-gray-800">{{ $product->price }}
                                </td>
                                <td class="px-4 py-2 text-sm text-left text-gray-800">
                                    {{ $product->category->title }}</td>
                                <td class="px-4 py-2 text-left">
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->title }}"
                                        class="object-cover w-16 h-16 rounded-md">
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-sm text-center text-gray-600">No
                                    products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div> --}}

            {{-- Products --}}
            <div>
                <p class="mb-3 text-xl font-semibold">Products</p>
                <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($products as $product)
                        <div
                            class="flex flex-col overflow-hidden border group rounded-xl border-slate-300 bg-slate-100 text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
                            <!-- Image -->
                            <div class="overflow-hidden h-44 md:h-64">
                                <img src="{{ Storage::Url($product->image) }}"
                                    class="object-cover transition duration-700 ease-out group-hover:scale-105"
                                    alt="CASIO G-SHOCK GA2100, Black face, black bands" />
                            </div>
                            <!-- Content -->
                            <div class="flex flex-col gap-4 p-6">
                                <!-- Header -->
                                <div class="flex flex-col justify-between gap-4 md:flex-row md:gap-12">
                                    <!-- Title & Rating -->
                                    <div class="flex flex-col">
                                        <h3 class="text-lg font-bold text-black lg:text-xl dark:text-white"
                                            aria-describedby="productDescription">{{ $product->title }}</h3>
                                        <!-- Rating -->
                                        <div class="flex items-center gap-1">
                                            <span class="sr-only">Rated 3 stars</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4 text-amber-500" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4 text-amber-500" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4 text-amber-500" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="size-4 text-slate-700/50 dark:text-slate-300/50"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="size-4 text-slate-700/50 dark:text-slate-300/50"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="text-xl"><span class="sr-only">Price</span>रू
                                        {{ $product->price }}</span>
                                </div>
                                <!-- Button -->
                                <button type="button"
                                    class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium tracking-wide text-center transition bg-blue-700 cursor-pointer whitespace-nowrap text-slate-100 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:opacity-100 active:outline-offset-0 dark:bg-blue-600 dark:text-slate-100 dark:focus-visible:outline-blue-600 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                        aria-hidden="true" class="size-3.5">
                                        <path fill-rule="evenodd"
                                            d="M5 4a3 3 0 0 1 6 0v1h.643a1.5 1.5 0 0 1 1.492 1.35l.7 7A1.5 1.5 0 0 1 12.342 15H3.657a1.5 1.5 0 0 1-1.492-1.65l.7-7A1.5 1.5 0 0 1 4.357 5H5V4Zm4.5 0v1h-3V4a1.5 1.5 0 0 1 3 0Zm-3 3.75a.75.75 0 0 0-1.5 0v1a3 3 0 1 0 6 0v-1a.75.75 0 0 0-1.5 0v1a1.5 1.5 0 1 1-3 0v-1Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $products->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>
</x-app>
