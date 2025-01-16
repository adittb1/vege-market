@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-100 to-green-200 py-20 px-6">
        <div class="container mx-auto text-center">
            <h3 class="text-5xl font-extrabold text-green-800 mb-6">Selamat Datang di Fresh Fruit Market ✨</h3>
            <p class="mt-4 text-gray-700 text-xl max-w-3xl mx-auto leading-relaxed">Sumber terpercaya untuk buah segar, organik, dan berkualitas tinggi. Rasakan nikmatnya buah segar langsung dari kebun!</p>
            <a href="#products" class="mt-8 inline-block bg-green-700 text-white py-4 px-8 rounded-full shadow-md hover:bg-green-800 hover:shadow-lg transition transform hover:scale-105">
                Lihat Produk Kami
            </a>
        </div>
    </div>


    <!-- About Section -->
    <div id="about" class="bg-green-50 py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-extrabold text-green-800 mb-8">Tentang Kami</h2>
            <p class="text-lg text-gray-700 leading-relaxed max-w-4xl mx-auto">
                Fresh Fruit Market berdiri dengan tujuan untuk menghadirkan buah-buahan segar, sehat, dan organik langsung dari petani terbaik ke tangan Anda. 
                Kami percaya bahwa kesehatan adalah investasi terbaik, dan makanan sehat dimulai dari buah yang berkualitas. 
                Dengan semangat untuk memberikan pelayanan terbaik, kami menawarkan beragam pilihan buah dengan harga terjangkau 
                dan kualitas yang tidak ada duanya. Bergabunglah dengan kami untuk menikmati pengalaman belanja buah yang mudah, menyenangkan, dan sehat!
            </p>
        </div>
    </div>
    <!-- tets -->
     <!-- test 2 -->
      <!-- test3 -->
    <!-- Products Section -->
    <div id="products" class="mt-16 container mx-auto">
        <h2 class="text-4xl font-bold text-gray-800 text-center mb-12">Pilihan Segar Kami 🍎</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
            @foreach($products as $product)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition transform hover:scale-105">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h3>
                        <p class="text-gray-600 mt-2 text-sm truncate">{{ Str::limit($product->description, 50) }}</p>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-green-700 font-bold text-xl">${{ $product->price }}</span>
                            @auth
                                <a href="{{ route('checkout.form', $product->product_id) }}" class="bg-green-600 text-white py-2 px-6 rounded-full hover:bg-green-700 text-sm">
                                    Add
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Subscribe Section -->
    <div class="bg-gradient-to-r from-green-600 to-green-800 text-white py-20 mt-20">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-extrabold">Bergabunglah dengan Klub Buah Kami! 🌟</h2>
            <p class="mt-6 text-lg max-w-3xl mx-auto leading-relaxed">
                Dapatkan penawaran eksklusif, buah segar terbaru, dan diskon mingguan langsung di email Anda.
            </p>
            <form class="mt-10 flex justify-center">
                <input type="email" placeholder="Masukkan email Anda" class="py-4 px-6 rounded-l-full text-gray-800 w-2/3 shadow-md focus:outline-none focus:ring-2 focus:ring-green-400">
                <button type="submit" class="bg-white text-green-700 py-4 px-8 rounded-r-full font-bold hover:bg-gray-200 transition shadow-md">
                    Berlangganan
                </button>
            </form>
        </div>
    </div>
@endsection
