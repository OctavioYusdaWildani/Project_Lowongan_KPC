<x-app-layout>
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Kontainer utama --}}
            <div class="overflow-hidden rounded-3xl bg-white bg-opacity-60 shadow-xl px-6 py-8 backdrop-blur-md flex flex-col lg:flex-row justify-between gap-8">
                
                {{-- Kolom kiri: Tentang --}}
                <div class="lg:w-2/3">
                    <h1 class="text-2xl md:text-3xl font-extrabold text-blue-900 border-b-4 border-[#CE0F2C] inline-block mb-4">About Kansai Paint</h1>
                    <p class="text-gray-800 mb-4">
                        KANSAI PAINT  is the largest paint industry in Japan since 1918, then developed the business in Indonesia since 1977, 
                        starting when we were established under the name PT Dayin Prima Paint. Then in 1996 it changed to PT Gajah Tunggal Prakarsa, 
                        and in 2012 it changed to PT Kansai Prakarsa Coatings.
                    </p>
                    <p class="text-gray-800 mb-4">
                        Our efforts for more than three decades have now received widespread recognition. Finally, 
                        it marked by the awarding of ISO 9001 Quality Management System certificates and ISO 14001 Environment Management System certificates for Paint and Resin units. 
                        This certification, which is an international recognition, is proof of our sincerity in doing business and our commitment to always create products that satisfy customers.</p>
                    <p class="text-gray-800 mb -4">
                        To ensure product availability in the market, we maintain the continuity of our distribution network nationwide. 
                        There are two distribution systems that we apply to meet different needs. Direct system, dealing directly with consumers from the industrial sector as well as special projects that often require a special specification paint supply. 
                        The indirect system relies on cooperation with dealers who are widely spread throughout Indonesia, so our products are easily available to consumers.
                    </p>
                    <p class="text-gray-800 mb-4">
                        The series of high quality paints from KANSAI PAINT are widely used for painting heavy equipment, industrial wood goods such as pianos and furniture, painting floors, 
                        to painting heavy duty products that function as a protector against weather changes and corrosion as well as the influence of materials. 
                    </p>
                    <p class="text-gray-800 mb-4">
                        KANSAI PAINT also provides high quality decorative paints, such as various types of wall paints that able to protect and beautify buildings, 
                        as well as iron and wood paints with the advantages of fast drying, excellent adhesion and gloss.
                    </p>
                </div>

                {{-- Kolom kanan: Gambar Produk --}}
                <div class="lg:w-1/3 flex flex-col gap-6">
                    <img src="{{ asset('kansaiproperty.png') }}" alt="Kansai Property" class="rounded-xl shadow-lg object-contain h-40">
                    <img src="{{ asset('kansaitropic.png') }}" alt="Kansai Tropic" class="rounded-xl shadow-lg object-contain h-40">
                    <img src="{{ asset('rainblock.png') }}" alt="Kansai Rain Block" class="rounded-xl shadow-lg object-contain h-40">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
