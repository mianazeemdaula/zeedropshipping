@extends('layouts.web')
@section('title', 'Contact Us | Zeedropshipping')
@section('content')
    <div class="p-8">
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-4">
            <div class="space-y-4">
                <div class="text-primary-300 uppercase text-lg">Contact Us</div>
                <div class="font-bold uppercase text-2xl">How Can I help you?</div>
                <div>
                    <p>For any questions or concerns, please contact us at:</p>
                </div>
                <div class="border p-2 max-w-fit rounded-md bg-white">
                    <i class="fa-solid fa-phone"></i>
                    <span class="mx-2">+92 315-9999547</span>
                </div>
                <div class="border p-2 max-w-fit rounded-md bg-white">
                    <i class="fa-solid fa-envelope"></i>
                    <span class="mx-2">support@zeedropshipping.com</span>
                </div>
                <div class="border p-2 max-w-fit rounded-md bg-white">
                    <i class="fa-brands fa-facebook"></i>
                    <span class="mx-2">zeedropshipping</span>
                </div>
            </div>

            <div class=" bg-gray-100 p-4 rounded-lg">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-2"
                        role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                <form action="{{ url('contact') }}" method="post">
                    @csrf
                    <div class="space-y-2">
                        <div class="font-bold uppercase text-2xl">Send Us a Message</div>
                        <div class="grid gap-4">
                            <div>
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="w-full p-1 border rounded-md"
                                    required>
                            </div>
                            <div>
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="w-full p-1 border rounded-md"
                                    required>
                            </div>
                            <div class="col-span-2">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" id="subject" class="w-full p-1 border  rounded-md"
                                    required>
                            </div>
                            <div class="col-span-2">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" class="w-full p-2 border  rounded-md" required></textarea>
                            </div>
                            <div class="col-span-2">
                                <button type="submit" class="bg-primary-600 text-white p-2 w-full">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-4 bg-gray-100 flex p-6 rounded-md justify-center items-center">
            <div class="bg-primary-200 rounded-full size-10 flex items-center justify-center">
                <i class="fa-solid fa-map-marker-alt text-primary-600"></i>
            </div>
            <div class="ml-4">
                <div class="font-bold">Our Address</div>
                <div>2nd Floor Fazal Trade Center 114-E Gulberg-III, Lahore, Pakistan</div>
            </div>
        </div>
    </div>
@endsection
