<x-app>
    <div class="container mt-1">
        <div class="w-full max-w-lg p-6 mx-auto bg-white rounded-lg shadow-md">
            <h1 class="mb-4 text-xl font-semibold">Shopping Cart</h1>

            <!-- Cart Item 1 -->
            <div class="flex items-center justify-between py-4 border-b">
                <div class="flex items-center">
                    <img class="object-cover w-16 h-16 mr-4" src="https://via.placeholder.com/100" alt="Product 1">
                    <div>
                        <p class="font-semibold">Product 1</p>
                        <p class="text-sm text-gray-600">$10.00</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <button class="px-2 text-gray-600" onclick="decreaseQuantity('quantity1')">-</button>
                    <input id="quantity1" class="w-8 mx-2 text-center border" type="text" value="1" readonly>
                    <button class="px-2 text-gray-600" onclick="increaseQuantity('quantity1')">+</button>
                </div>
                <p class="font-semibold">$10.00</p>
                <button class="ml-4 text-sm text-red-500 hover:underline">Remove</button>
            </div>

            <!-- Cart Item 2 -->
            <div class="flex items-center justify-between py-4 border-b">
                <div class="flex items-center">
                    <img class="object-cover w-16 h-16 mr-4" src="https://via.placeholder.com/100" alt="Product 2">
                    <div>
                        <p class="font-semibold">Product 2</p>
                        <p class="text-sm text-gray-600">$15.00</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <button class="px-2 text-gray-600" onclick="decreaseQuantity('quantity2')">-</button>
                    <input id="quantity2" class="w-8 mx-2 text-center border" type="text" value="1" readonly>
                    <button class="px-2 text-gray-600" onclick="increaseQuantity('quantity2')">+</button>
                </div>
                <p class="font-semibold">$15.00</p>
                <button class="ml-4 text-sm text-red-500 hover:underline">Remove</button>
            </div>

            <!-- Cart Item 3 -->
            <div class="flex items-center justify-between py-4 border-b">
                <div class="flex items-center">
                    <img class="object-cover w-16 h-16 mr-4" src="https://via.placeholder.com/100" alt="Product 3">
                    <div>
                        <p class="font-semibold">Product 3</p>
                        <p class="text-sm text-gray-600">$20.00</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <button class="px-2 text-gray-600" onclick="decreaseQuantity('quantity3')">-</button>
                    <input id="quantity3" class="w-8 mx-2 text-center border" type="text" value="1" readonly>
                    <button class="px-2 text-gray-600" onclick="increaseQuantity('quantity3')">+</button>
                </div>
                <p class="font-semibold">$20.00</p>
                <button class="ml-4 text-sm text-red-500 hover:underline">Remove</button>
            </div>

            <!-- Total Price -->
            <div class="mt-6">
                <div class="flex justify-between">
                    <span class="font-semibold">Total</span>
                    <span class="font-semibold">$45.00</span>
                </div>
            </div>

            <!-- Checkout Button -->
            <button class="w-full py-2 mt-6 text-white bg-blue-500 rounded hover:bg-blue-600">
                Checkout
            </button>
        </div>
    </div>
</x-app>
